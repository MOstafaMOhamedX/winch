<?php

namespace App\Http\Controllers\API\driver;

use Illuminate\Support\Facades\Auth;
use App\Functions\ResponseHelper;
use App\Functions\WhatsApp;
use App\Http\Requests\API\DeviceTokenRequest;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\OTPRequest;
use App\Http\Requests\API\CheckNumberRequest;
use App\Http\Requests\API\UpdateProfileRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use App\Functions\Upload;
use App\Http\Controllers\API\BaseController;


class AuthController extends BaseController
{

    public function Login(LoginRequest $request)
    {
        if (Auth('driver')->attempt($request->only('phone', 'password') + ['deleted_at' => null])) {
            $Driver = Auth('driver')->user();
            if (!$Driver->DriverDeviceTokens()->where(['device_token' => $request->device_token])->exists()) {
                $Driver->DriverDeviceTokens()->create([
                    'device_token' => $request->device_token,
                ]);
            }
            $success['token'] = $Driver->createToken('ClientToken')->plainTextToken;
            $success['user'] = DriverResource::make($Driver);
            return ResponseHelper::make($success, __('loginSuccessfully'));
        } else {
            return ResponseHelper::make(NULL, __('emailPasswordIncorrect'), false, 404);
        }
    }

    public function Register(RegisterRequest $request)
    {

        $driver = Driver::where('phone', $request->get('phone'))->first();
        if ($driver) {
            $driver->deleted_at = NULL;
            $driver->save();
        } else {
            $driver = Driver::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request['password']),
                'status' => 1,
            ]);
        }
        if (!$driver->DriverDeviceTokens()->where(['device_token' => $request->device_token])->exists()) {
            $driver->DriverDeviceTokens()->create([
                'device_token' => $request->device_token,
            ]);
        }
        $success['token'] = $driver->createToken('ClientToken')->plainTextToken;
        $success['user'] = DriverResource::make($driver);
        return ResponseHelper::make($success, __('User successfully Added'));
    }

    public function DeviceToken(DeviceTokenRequest $request)
    {
        $this->CheckAuth();
        if (!$this->user->DriverDeviceTokens()->where(['device_token' => $request->device_token])->exists()) {
            $this->user->DriverDeviceTokens()->create([
                'device_token' => $request->device_token,
            ]);
        }
        $success['token'] = $this->user->createToken('ClientToken')->plainTextToken;
        $success['user'] = DriverResource::make($this->user);
        return ResponseHelper::make($success, __('addedSuccessfully'));
    }


    public function UpdateProfile(UpdateProfileRequest $request)
    {
        $this->CheckAuth();
        $this->user->update($request->only('phone', 'email', 'name'));
        if ($request->password)
            $this->user->update(['password' => bcrypt($request['password'])]);
        if ($request->image)
            $this->user->update(['image' => Upload::UploadFile($img, 'drivers')]);

        $success['token'] = $this->user->createToken('ClientToken')->plainTextToken;
        $success['user'] = DriverResource::make($this->user->refresh());
        return ResponseHelper::make($success, __('User successfully Added'));

    }

    public function Sendotp($lang, OTPRequest $request)
    {
        return ResponseHelper::make(WhatsApp::SendOTP($request->phone));
    }

    public function CheckNumber($lang, CheckNumberRequest $request)
    {
        $Driver = Driver::where('phone', 'LIKE', '%' . $request->phone . '%')->first();
        $success['exist'] = $Driver ? 1 : 0;
        $success['token'] = $Driver ? $Driver->createToken('ClientToken')->plainTextToken : NULL;
        $success['user'] = $Driver ? DriverResource::make($Driver) : NULL;
        return ResponseHelper::make($success);
    }

    public function Logout()
    {
        $this->CheckAuth();
        $this->user->DriverDeviceTokens()->where('device_token', request()->device_token)->delete();
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
        $this->user->DriverDeviceTokens()->where('device_token', request()->device_token)->delete();
        $this->user->tokens()->delete();
        $this->user->delete();
        return ResponseHelper::make(null, __('DeletedSuccessfully'));
    }
}
