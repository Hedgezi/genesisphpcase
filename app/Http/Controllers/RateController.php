<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\RateService;

class RateController extends Controller
{

    public function __construct(
        private RateService $rateService,
    )
    {

    }

    public function rate(Request $request): Response
    {
        $actualRate = $this->rateService->getRate();

        if ($actualRate == -1)
        {
            return response("Error", "400");
        }
        return response(strval($actualRate), "200");
    }
}
