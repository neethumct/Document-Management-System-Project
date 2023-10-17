<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;

class Register extends Component
{
    public $fname,
        $lname,
        $email,
        $password;
    public function render()
    {
        return view('livewire.user.register')->layout('layouts.user-login');
    }
    public function create()
    {
        $users = new User();
        $this->validate([
            'fname' => ['required', 'string', 'min:3', 'max:10'],
            'lname' => ['required', 'string', 'min:3', 'max:10'],
            'email' => ['required', 'email', 'unique:users'],
           // 'password' => ['required', 'string', 'min:3', 'max:12'],
            'password'=>[
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
        ]);

        $users->fname = $this->fname;
        $users->lname = $this->lname;
        $users->email = $this->email;
        $users->password = Hash::make($this->password);

        $result = $users->save();
        if ($result) {
            session()->flash('success', 'registration Successfully');
            $this->fname = '';
            $this->lname = '';
            $this->email = '';
            $this->password = '';
            $this->c_password = '';
            return redirect(route('user.login'));
        }
    }
}
