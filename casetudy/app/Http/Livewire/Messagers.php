<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Messager;
use Livewire\Component;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Messagers extends Component
{
    public $messager;
    public $sender;
    public $users;
    public $allmessagers;
    public function render()
    {
        $this->users = User::all();
        $sender = $this->sender;
        $this->allmessagers;
        return view('Backend.livewire.messagers', [
            'users' => $this->users,
            'sender' => $sender,
        ]);
    }
    public function mountdata(){
        if(isset($this->sender->id)){
            $this->allmessagers = Messager::where('user_id', auth()->id())->where('receiver_id', $this->sender->id)
            ->orWhere('user_id', $this->sender->id)->where('receiver_id',auth()->id())->orderBy('id', 'DESC')->get();

            $notseen = Messager::where('user_id', $this->sender->id)->where('receiver_id',auth()->id());
            $notseen->update(['is_seen'=>true]);
        }else{
            $this->allmessagers = '';
        }
    }
    public function reForm()
    {
        $this->messager = '';
    }
    public function SendMessage()
    {
        $data = new Messager;
        $data->messager = $this->messager;
        $data->user_id = auth()->id();
        $data->receiver_id =  $this->sender->id;
        $data->save();

        $this->reForm();
    }
    public function getUser($id)
    {
        $user = User::find($id);
        $this->sender = $user;
        $this->allmessagers = Messager::where('user_id', auth()->id())->where('receiver_id', $id)
        ->orWhere('user_id', $id)->where('receiver_id',auth()->id())->orderBy('id', 'DESC')->get();
    }
}
