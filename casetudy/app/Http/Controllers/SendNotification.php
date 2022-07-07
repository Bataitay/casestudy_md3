<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Auth;
// use iterable;

class SendNotification extends Controller
{
    public function create()
    {
        return view('Backend.dashboard.notificaton');
    }

    public function store(Request $request)
    {
        if (auth()->user()) {
            $user = User::first();
            $data = $request->only([
                'title',
                'content',
            ]);
            $user->notify(new TestNotification($data));
        }
        return view('Backend.dashboard.notificaton');
    }
    public function readed($id){
        if($id){
            auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        }
        return back();
    }
}
