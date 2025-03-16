<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        session()->flash('success', 'Registration successful. You can now login.');

        return $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
