<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Password;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Link reset password telah dikirim ke email Anda.']);
        }

        return response()->json(['message' => 'Gagal mengirim link reset password.'], 400);
    }

}
