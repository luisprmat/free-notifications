<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Notifications\MessageSent;
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

        $message = Message::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id
        ]);

        $user = User::find($request->to_user_id);
        $user->notify(new MessageSent($message));

        $request->session()->flash('flash.banner', 'Tu mensaje fue enviado!');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }

    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }
}
