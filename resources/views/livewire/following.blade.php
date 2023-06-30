<div>
    <li class="flex flex-col md:flex-row text-center rtl:ml-5r">
        <div class="md:mr-1 font-bold md:font-normal md:rtl:ml-1">
            {{$this->count}}
        </div>
        <button onclick="livewire.emit('openModal', 'following-modal', {{ json_encode(['userId' => $userId]) }})" class="text-neutral-500 md:text-black ">
            {{__('following')}}
        </button>
    </li>
</div>
