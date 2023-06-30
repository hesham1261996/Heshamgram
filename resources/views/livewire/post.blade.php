<div class="card">
    <div class="card-header">
        <img src="{{$post->owner->image}}" alt="" class="w-9 h-9 mr-3 rounded-full" >
        <a href="/{{$post->owner->username}}" class="font-blod">{{$post->owner->username}}</a>
    </div>
    <div class="card-body">
        <div class="max-h-[35rem] overflow-hidden">
            <img src="storage/{{$post->image}}" class="h-auto w-full object-cover" alt="{{$post->description}}">
        </div>
        <div class="p-3 flex flex-row">
            <livewire:like  :post='$post'/>
            <a href="/p/{{$post->slug}}" class="grow">
                <i class="bx bx-comment text-3xl hover:text-gry-400 cursor-pointer mr-3"></i>
            </a>
        </div>
        <livewire:likeby :post='$post' /> 
        <div class="p-3">
            <a href="{{$post->owner->username}}" class="font-bold">{{$post->owner->username}}</a>
            {{$post->description}}
        </div>
        
        @if ($post->comments()->count() > 0)
            <a href="/p/{{$post->slug}}" class="p3 font-bold text-sn text-gray-500">
                {{__('View all ' . $post->comments()->count()) . ' comments'}}
            </a>
        @endif
        <div class="p-3 text-gray-400 uppercase text-xs">
            {{$post->created_at->diffForHumans()}}
        </div>
    </div>

    <div class="card-footer">
        <form action="/p/{{$post->slug}}/comment" method="post">
        @csrf
            <div class="flex flex-row">
                <textarea name="body" id="comment_body" placeholder="Add a comment  ..."
                class="h-5 grow resize-none overflow-hidden border-none bg-none p-0 placeholder-gray-400 outline-0 focus:ring-0"></textarea>
                <button type="submit" class="bg-white border-none text-blue-500 ml-5">{{__('Post')}}</button>
            </div>

        </form>
    </div>
</div>
