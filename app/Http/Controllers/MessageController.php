<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|min:10',
            'body' => 'required|min:10',
            'to_user_id' => 'required|exists:users,id'
        ], [
            'to_user_id.required' => 'Debes seleccionar un usuario',
            'to_user_id.exists' => 'Este usuario no existe en nuestro sistema'
        ], [
            'to_user_id' => 'usuario'
        ]);

        return $request->all();
    }

    public function show(Message $message)
    {
        return view('messages.show', compact('messages'));
    }
}
