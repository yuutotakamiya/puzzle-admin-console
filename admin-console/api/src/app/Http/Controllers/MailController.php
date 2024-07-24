<?php

namespace App\Http\Controllers;

use App\Http\Resources\MailResource;
use App\Models\Mail;
use Illuminate\Http\Request;


class MailController extends Controller
{
    public function index(Request $request)
    {
        $mails= Mail::findOrFail($request->user_id);
        return response()->json(
            MailResource::collection($mails));

    }
}
