<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('id', '<>', auth()->id())->orderBy('name')->get();

        return view('dashboard', compact('users'));
    }
}