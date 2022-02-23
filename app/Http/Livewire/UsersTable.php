<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersTable extends Component
{
    public function render()
    {
        $users=[];
        return view('livewire.users-table', compact('users'));
    }
}
