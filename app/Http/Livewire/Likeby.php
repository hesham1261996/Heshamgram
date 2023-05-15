<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Likeby extends Component
{
    protected $listeners = ['LikeToggel' => 'getLikesProperty'] ;

    public $post ; 
    
    // Computed Property

    public function getLikesProperty(){
        return $this->post->likes()->count();
    }
    
    public function getFirstusernameproperty(){
        return $this->post->likes()->first()->username ; 
    }
    
    public function render()
    {
        return view('livewire.likeby');
    }
}
