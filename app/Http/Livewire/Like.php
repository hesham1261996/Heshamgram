<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Like extends Component
{

    public $post ;

    public function toggel_likes(){

        auth()->user()->likes()->toggle($this->post);

        return $this->emit('LikeToggel') ;
    }
    public function render()
    {
        return view('livewire.like');
    }
}
