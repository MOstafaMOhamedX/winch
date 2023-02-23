<?php

namespace App\Functions;

class WhatsApp
{
    public static function SendOTP($phone)
    {
        $otp = rand(100000, 999999);

        $body = '';
        $body .= '%0a *Winch* %0a';
        $body .= '%0a *Your Verification Code Is* '.$otp.' %0a';
        $body .= '%0a Powered By *Emcan Solutions*';

        self::SendWhatsApp($phone, $body);

        return $otp;
    }

    public static function SendWhatsApp($number, $message)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.ultramsg.com/instance2806/messages/chat',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "token=11ioqo70gg6nbs6d&to=$number&body=$message&priority=1&referenceId=",
            CURLOPT_HTTPHEADER => [
                'content-type: application/x-www-form-urlencoded',
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
    }
}
