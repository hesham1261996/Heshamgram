<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PendingFollowersList extends Component
{
    protected $followers ; 
    protected $listeners  = ['toggelFollow'=> '$refresh' , 'requestcomfitmed'=> '$refresh' , 'requestdelte' => '$refresh' ] ;

    public function confirm($id){
        $this->followers = User::find($id) ; 
        auth()->user()->confirm($this->followers);
        $this->emit('requestcomfitmed');
    }
    
    public function DeleteFollowRequest($id){
        $this->followers = User::find($id);
        auth()->user()->deleteFollowRequest($this->followers);
        $this->emit('requestdeltecomfitmed');

    }
    public function render()
    {
        return view('livewire.pending-followers-list');
    }
}
