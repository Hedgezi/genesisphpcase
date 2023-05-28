<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RateService
{
    public string $link = "https://bitpay.com/api/rates/btc";
    public function getRate(): int
    {
        $response = Http::get($this->link);

        if (!$response->successful())
        {
            return -1;
        }

        $allData = $response->json();

        return $allData[159]['rate'];
    }
}
