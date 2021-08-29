<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MessageController extends Controller
{
    public function store(Request $request)
    {

    }

    public function show(Message $message)
    {
        return view('messages.show', compact('messages'));
    }
}
