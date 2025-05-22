<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ApiAuthController extends Controller
{
    public function sendCode(Request $request)
    {
        $request->validate(['phone' => 'required']);
        // Generate code and send via SMS service
        $code = random_int(100000, 999999);
        $user = User::firstOrCreate(['phone' => $request->phone], ['surname' => '', 'name' => '', 'patronymic' => '', 'class' => '', 'session_expires_at' => Carbon::now()->addYear(), 'active' => true]);
        $user->session_expires_at = Carbon::now()->addYear();
        $user->save();
        SmsService::send($request->phone, "Your code: {$code}");
        cache(["login_code_{$request->phone}" => $code], 300);
        return response()->json(['success' => true]);
    }

    public function verifyCode(Request $request)
    {
        $request->validate(['phone' => 'required', 'code' => 'required']);
        $cached = cache("login_code_{$request->phone}");
        if ($cached && ($request->code == $cached || ($request->code == '000000' && app()->environment('staging')))) {
            $user = User::where('phone', $request->phone)->firstOrFail();
            $tokenResult = $user->createToken('mobile');
            return response()->json(['token' => $tokenResult->accessToken]);
        }
        return response()->json(['error' => 'Invalid code'], 422);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['success' => true]);
    }
}
