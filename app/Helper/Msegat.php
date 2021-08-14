<?php

namespace App\Helper;

use Illuminate\Support\Facades\Http;

class Msegat
{
    private string $apiKey = 'bfda1b3eb4f5ed8290d14b337d816b4e';
    private string $userName = 'sezzars';
    private string $userSender = 'OTP';
    private string $msgEncoding = 'UTF8';

    public function send(string $number, string $msg)
    {
        return Http::post('https://www.msegat.com/gw/sendsms.php', [
            "userName" => $this->userName,
            "numbers" => "201116535030",
            "userSender" => "OTP",
            "apiKey" => "$this->apiKey",
            "msg" => "رمز التحقق: 1234"
        ])->body();
    }

    public function senderInquiry()
    {
        return Http::post('https://www.msegat.com/gw/senders.php', [
            'userName' => $this->userName,
            'apiKey' => $this->apiKey,
            'msgEncoding' => $this->msgEncoding
        ]);
    }

    public function balance()
    {
        return Http::asForm()->post('https://www.msegat.com/gw/Credits.php', [
            'userName' => $this->userName,
            'apiKey' => $this->apiKey,
        ]);
    }

    public function addNewSender()
    {
        return Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('https://www.msegat.com/gw/senders.php', [
            'userName' => $this->userName,
            'apiKey' => $this->apiKey,
            'senderName' => 'Bills'
        ]);
    }
}
