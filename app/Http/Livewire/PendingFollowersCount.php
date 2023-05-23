<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PendingFollowersCount extends Component
{
    protected $listeners  = ['toggelFollow'=> '$refresh' , 'requestcomfitmed'=> '$refresh' , 'requestdelte' => '$refresh' ] ;

    public function getCountProperty(){
        return auth()->user()->pending_followers()->count();
    }
    public function render()
    {
        return view('livewire.pending-followers-count');
    }
}
