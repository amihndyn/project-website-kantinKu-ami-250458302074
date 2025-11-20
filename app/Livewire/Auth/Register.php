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

    public function register()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:password_confirmation'
        ]);

        User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Akun berhasil dibuat. Silakan login.');

        return redirect()->route('login');
    }

    public function render()
    {
        // Assign layout agar $slot di layouts.app bisa dipakai
        return view('livewire.auth.register')
            ->layout('layouts.app', [
                'title' => 'Daftar - KantinKu'
            ]);
    }
}
