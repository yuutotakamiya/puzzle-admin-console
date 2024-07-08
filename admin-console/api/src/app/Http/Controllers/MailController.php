<?php

namespace App\Http\Controllers;

use App\Http\Resources\MailResource;
use App\Models\Mail;

class MailController extends Controller
{
    public function index()
    {
        $mails= Mail::all();
        return response()->json(
            MailResource::collection($mails));

    }
}
