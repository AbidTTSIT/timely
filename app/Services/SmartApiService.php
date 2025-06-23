<?php

namespace App\Services;

use GuzzleHttp\Client;
use OTPHP\TOTP;

class SmartApiService
{

    protected $client;
    protected $jwtToken;

    public function authenticate()
    {
        try {
            // generate the 6-digit TOTP using your secret
            $totp = TOTP::create(env('SMARTAPI_TOTP_SECRET'));
            $totpCode = $totp->now();

            $response = $this->client->post('secure/login/v1/userSession', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => [
                    "appkey" => env('SMARTAPI_KEY'),
                    'secretkey' => env('SMARTAPI_SECRET'),
                    "clientcode" => env('SMARTAPI_CLIENT_CODE'),
                    "password" => env('SMARTAPI_PASSWORD'),
                    "totp" => $totpCode,
                ]
            ]);
            dd($totpCode);

            $data = json_decode($response->getBody(), true);

            if (!isset($data['data']['jwtToken'])) {
                dd('Login Failed:', $data);
            }

            $this->jwtToken = $data['data']['jwtToken'];
        } catch (\Exception $e) {
            dd('API Exception:', $e->getMessage());
        }
    }
}
