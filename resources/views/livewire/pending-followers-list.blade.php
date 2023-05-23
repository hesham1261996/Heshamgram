<div>
    <ul class="overflow">

        @forelse (auth()->user()->pending_followers() as $pending)
            <li class="flex flex-row w-full p-3 items-center text-sm">
                <div class="">
                    <img src="{{$pending->image}}" class="w-8 h-8 mr-2 rounded-full border border-neutral-300" alt="">
                </div>
                <div class="flex flex-col grow">
                    <div class="font-bold">
                        <a href="{{$pending->username}}">{{$pending->username}}</a>
                    </div>
                    <div class="text-sm text-neutral-500">
                        {{$pending->name}}
                    </div>
                </div>
                <button class="border border-blue-500 bg-blue-500 text-white px-2 py-1 rounded mr-2"
                    wire:click="confirm({{$pending->id}})"> 
                    {{__('confirm')}}
                </button>
                <button class="border border-gray-500 px-2 py-1 rounded"
                    wire:click="DeleteFollowRequest({{$pending->id}})">
                    {{__('Delete')}}
                </button>
            </li>
        @empty
            <div class="w-full p-3 text-center">
                {{"No pending follow request"}}
            </div>
        @endforelse
    </ul>
</div>
