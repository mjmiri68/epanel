<?php

namespace App\Livewire\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();
            if ($user->is_admin) {
                return $this->redirect('/admin/dashboard', navigate: true);
            } else {
                return $this->redirect('/dashboard', navigate: true);
            }
        } else {
            session()->flash('error', 'Invalid credentials');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
