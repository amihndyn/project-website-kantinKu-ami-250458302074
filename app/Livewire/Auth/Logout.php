<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}