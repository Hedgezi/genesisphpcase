<?php

namespace App\Http\Controllers;

use App\Mail\BTCRate;
use App\Services\RateService;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{

    public function __construct(
        private RateService $rateService,
        private SubscriptionService $subscriptionService,
    )
    {

    }



    public function subscribe(Request $request): Response
    {
        $request->validate(['email' => 'required|email']); # email will be passed through, only if it matches email syntax

        $this->subscriptionService->createFileIfNotExist(base_path() . $this->subscriptionService->filePath);

        $fileDb = fopen(base_path() . $this->subscriptionService->filePath, 'r+');
        while (!feof($fileDb)) # loop to check is given email already in file
        {
            if (fgets($fileDb) == $request->input('email') . "\n")
            {
                fclose($fileDb);
                return response("", 409);
            }
        }
        fwrite($fileDb, $request->input('email') . "\n");
        fclose($fileDb);
        return response("", 200);
    }

    public function sendEmails(Request $request): Response
    {
        $this->subscriptionService->createFileIfNotExist(base_path() . $this->subscriptionService->filePath);

        # get emails as array
        $emailArray = array();
        $fileDb = fopen(base_path() . $this->subscriptionService->filePath, 'r');
        while (!feof($fileDb)) # loop to check is given email already in file
        {
            $emailArray[] = trim(fgets($fileDb));
        }
        fclose($fileDb);
        array_pop($emailArray); # need to delete one extra empty item
        if (count($emailArray) == 0) {
            return \response("", 200);
        }

        foreach ($emailArray as $email) {
            Mail::to($email)->send(new BTCRate($this->rateService));
        }

        return \response("", 200);
    }
}
