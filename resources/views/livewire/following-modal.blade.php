<div class="max-h-90 flex flex-col">

    <div class="flex w-full items-center border-b border-b-neutral-100 p-2">
        <h1 class="text-lg font-bold text-center pb-2 grow">{{__('Following')}}</h1>
        <button wire:click="$emit('closeModal')"><i class="bx bx-x text-xl"></i></button>
    </div>
    <ul class="overflow">

        @forelse ($this->following_list as $following)
            <li class="flex flex-row w-full p-3 items-center text-sm">
                <div class="">
                    <img src="{{$following->image}}" class="w-8 h-8 mr-2 rounded-full  rtl:ml-2 border border-neutral-300" alt="">
                </div>
                <div class="flex flex-col grow rtl:text-right">
                    <div class="font-bold">
                        <a href="{{$following->username}}">{{$following->username}}</a>
                    </div>
                    <div class="text-sm text-neutral-500">
                        {{$following->name}}
                    </div>
                </div>
                @auth
                <button class="border border-gray-500 px-2 py1 rounded" wire:click="unfollow({{$following->id}})">
                    {{__("unfollow")}}
                </button>
                @endauth
            </li>
        @empty
            <div class="w-full p-3 text-center">
                {{"You are not following anyone"}}
            </div>
        @endforelse
    </ul>
</div>
