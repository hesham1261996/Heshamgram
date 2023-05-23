<div>
    @if ($follow_state == "Pending")
        <div wire:click="toggel_follow" class="w-30 cursor-pointer bg-gray-400 text-white text-sm font-bold py-1 px-3 text-center rounded">
            {{__('Panding')}}
        </div>
    @else
    <a wire:click="toggel_follow" 
        class="{{$classes}} w-30 cursor-pointer text-sm font-bold py-1 px-3 tesxt-center rounded">
    {{$follow_state}}
    </a>
    @endif
</div>
