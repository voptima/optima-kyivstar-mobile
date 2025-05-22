<?php
namespace App\Services;

use Illuminate\Support\Facades\Log;

class SmsService
{
    public static function send(string $phone, string $message): bool
    {
        if (app()->environment('staging') && $message === 'Your code: 000000') {
            return true;
        }
        try {
            Log::info('Send SMS via Mobizon', compact('phone', 'message'));
            return true;
        } catch (\Exception $e) {
            Log::info('Send SMS via Smsfly', compact('phone', 'message'));
            return true;
        }
    }
}
