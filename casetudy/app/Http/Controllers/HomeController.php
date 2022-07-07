<?php

namespace App\Http\Controllers;

use App\Events\SendMessager;
use App\Models\Messager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class HomeController extends Controller
{

    public function index()
    {
        return view('Backend.dashboard.policy');
    }
    public function chat()
    {
        return view('Backend.chat.messager');
    }
    public function messagers()
    {
        return Messager::with('user')->get();
    }
    public function messagerStore(Request $request)
    {
        $user = Auth::user();
        $messagers = $user->messagers()->create([
            'messager' => $request->messager
        ]);
        broadcast(new SendMessager($user, $messagers))->toOthers();

        return 'messager sendt';
    }
}
