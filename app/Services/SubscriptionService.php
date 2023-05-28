<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SubscriptionService
{
    public string $filePath = '/emails.txt';
    public function createFileIfNotExist(string $fileName): void
    {
        if (!file_exists(base_path() . $this->filePath))
        {
            $createFile = fopen(base_path() . $this->filePath, 'x');
            fclose($createFile);
        }
    }
}
