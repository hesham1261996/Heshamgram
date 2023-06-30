<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowButton extends Component
{

    public $post ; 
    public $userId ;
    protected $user ; 
    public $follow_state ;
    public $classes ;

    public function mount(){
        $this->user = User::find($this->userId);
        $this->see_follow_state() ;
    }
    public function toggel_follow(){

        $this->user = User::find($this->userId);
        
        auth()->user()->toggel_follow($this->user);
        $this->see_follow_state() ;
        $this->emit('toggleFollow');
    }

    protected function see_follow_state(){
        if(auth()->user()->is_pending($this->user)) {
            $this->follow_state = __('Pending') ;
        }elseif(auth()->user()->is_following($this->user)){
            $this->follow_state = __('Unfollow') ;
        }else{
            $this->follow_state = __('Follow') ;
        }
    }
 
    public function render()
    {
        return view('livewire.follow-button');
    }
}
