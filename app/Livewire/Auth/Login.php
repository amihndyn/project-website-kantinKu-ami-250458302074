<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $nim;
    public $password;

    public function login()
    {
        $this->validate([
            'nim' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'nim' => $this->nim,
            'password' => $this->password
        ])) {
            return redirect()->route('dashboard'); // ubah sesuai route kamu
        }

        session()->flash('error', 'nim atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
