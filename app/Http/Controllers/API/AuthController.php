<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Functions\ResponseHelper;
use App\Functions\WhatsApp;
use App\Http\Requests\API\DeviceTokenRequest;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\OTPRequest;
use App\Http\Requests\API\CheckNumberRequest;
use App\Http\Requests\API\UpdateProfileRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Functions\Upload;

class AuthController extends BaseController
{

    public function Login(LoginRequest $request)
    {
        if (Auth('client')->attempt($request->only('phone', 'password') + ['deleted_at' => null])) {
            $Client = Auth('client')->user();
            if (!$Client->DeviceTokens()->where(['device_token' => $request->device_token])->exists()) {
                $Client->DeviceTokens()->create([
                    'device_token' => $request->device_token,
                ]);
            }
            $success['token'] = $Client->createToken('ClientToken')->plainTextToken;
            $success['user'] = ClientResource::make($Client);
            return ResponseHelper::make($success, __('loginSuccessfully'));
        } else {
            return ResponseHelper::make(NULL, __('emailPasswordIncorrect'), false, 404);
        }
    }

    public function Register(RegisterRequest $request)
    {
        $client = Client::where('phone', $request->get('phone'))->first();
        if ($client) {
            $client->deleted_at = NULL;
            $client->save();
        } else {
            $client = Client::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request['password']),
                'status' => 1,
            ]);
        }
        if (!$client->DeviceTokens()->where(['device_token' => $request->device_token])->exists()) {
            $client->DeviceTokens()->create([
                'device_token' => $request->device_token,
            ]);
        }
        $success['token'] = $client->createToken('ClientToken')->plainTextToken;
        $success['user'] = ClientResource::make($client);
        return ResponseHelper::make($success, __('User successfully Added'));
    }

    public function DeviceToken(DeviceTokenRequest $request)
    {
        $this->CheckAuth();
        if (!$this->user->DeviceTokens()->where(['device_token' => $request->device_token])->exists()) {
            $this->user->DeviceTokens()->create([
                'device_token' => $request->device_token,
            ]);
        }
        $success['token'] = $this->user->createToken('ClientToken')->plainTextToken;
        $success['user'] = ClientResource::make($this->user);
        return ResponseHelper::make($success, __('addedSuccessfully'));
    }


    public function UpdateProfile(UpdateProfileRequest $request)
    {
        $this->CheckAuth();
        $this->user->update($request->only('phone', 'email', 'name'));
        if ($request->password)
            $this->user->update(['password' => bcrypt($request['password'])]);
        if ($request->image)
            $this->user->update(['image' => Upload::UploadFile($img, 'clients')]);

        $success['token'] = $this->user->createToken('ClientToken')->plainTextToken;
        $success['user'] = ClientResource::make($this->user->refresh());
        return ResponseHelper::make($success, __('User successfully Added'));

    }

    public function Sendotp($lang, OTPRequest $request)
    {
        return ResponseHelper::make(WhatsApp::SendOTP($request->phone));
    }

    public function CheckNumber($lang, CheckNumberRequest $request)
    {
        $Client = Client::where('phone', 'LIKE', '%' . $request->phone . '%')->first();
        $success['exist'] = $Client ? 1 : 0;
        $success['token'] = $Client ? $Client->createToken('ClientToken')->plainTextToken : NULL;
        $success['user'] = $Client ? ClientResource::make($Client) : NULL;
        return ResponseHelper::make($success);
    }

    public function Logout()
    {
        $this->CheckAuth();
        $this->user->DeviceTokens()->where('device_token', request()->device_token)->delete();
        $this->user->tokens()->where('token', request()->bearerToken())->delete();
        return ResponseHelper::make(null, __('logoutSuccessfully'));
    }

    public function lang($lang)
    {
        $this->CheckAuth();
        $this->user->lang = $lang;
        $this->user->save();
        return ResponseHelper::make(null, __('User successfully Added'));
    }


    public function DeleteAccount()
    {
        $this->CheckAuth();
        $this->user->DeviceTokens()->where('device_token', request()->device_token)->delete();
        $this->user->tokens()->delete();
        $this->user->delete();
        return ResponseHelper::make(null, __('DeletedSuccessfully'));
    }
}
