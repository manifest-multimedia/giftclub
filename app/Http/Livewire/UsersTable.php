<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UsersTable extends Component
{
    public function render()
    {
        $users=User::paginate(15);
        return view('livewire.users-table', compact('users'));
    }
}
