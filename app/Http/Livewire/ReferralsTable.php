<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
 


class ReferralsTable extends Component
{

    use WithPagination; 

    public function render()
    {
        $id=referrals('list'); 

        return view('livewire.referrals-table', ['list'=>$list=User::where('referred_by', $id)->paginate(10)]);
    }
}
