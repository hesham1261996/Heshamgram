<div>
        <a wire:click='toggel_likes'>

            @if ($post->liked(auth()->user()))
                <i class="bx bxs-heart text-red-600 text-3xl hover-text-400 cursor-pointer mr-3"></i>
            @else
                <i class="bx bx-heart text-3xl hover-text-400 cursor-pointer mr-3"></i>
            @endif
        </a>
    
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
