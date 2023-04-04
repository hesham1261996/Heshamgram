<x-app-layout>
    <div class="h-screen md:flex md:flex-row">
        {{-- left side --}}
        <div class="h-full md:w-7/12 bg-black flex items-center">
            <img src="/image/{{$post->image}}" alt="{{$post->description}}" class="max-h-screen object-cover mx-auto">
        </div>
        {{-- right side --}}
        <div class="flex w-full flex-col bg-white md:w-5/12">
            {{-- Top --}}
            <div class="border-b-2">
                <div class="flex items-center p-5">
                    <img src="{{$post->owner->image}}" alt="{{$post->owner->name}}" class="mr-5 h-10 w-10 rounded-full">
                    <div class="grow">
                        <a href="/{{$post->owner->username}}" class="font-bold">{{$post->owner->username}}</a>
                    </div>
                    @if ($post->owner->id === auth()->id() )
                    <a href="/p/{{$post->slug}}/edit"><i class=' bx bx-message-square-edit text-xl'></i></a>
                    @endif
                    <form action="/p/{{$post->slug}}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('are you sure?')">
                            <i class="bx bx-message-square-x ml-2 text-xl text-red-600"></i>
                        </button>
                    </form>
                </div>
            </div>
            {{-- middle --}}
            <div class="grow overflow-y-auto">
                <div class="flex items-start p-5">
                    <img src="{{$post->owner->image}}" class="mr-5 h-10 rounded-full">
                    <div>
                        <a href="/{{$post->owner->username}}" class="font-bold">{{$post->owner->username}}</a>
                        {{$post->description}}
                    </div>

                </div>
                {{-- comments --}}
                <div >
                    @foreach ($post->comments as $comment)
                        <div class="flex items-start p-5 py-2">
                            <img src="{{$comment->owner->image}}" class="h-100 mr-5 w-10 rounded-full">
                            <div class="flex flex-col">
                                <div>
                                    <a href="/{{$comment->owner->username}}" class="font-bold">{{$comment->owner->username}}</a>
                                    {{$comment->body}}
                                </div>
                                <div>
                                    <div class="mt-1 text-sm font-bold text-gray-400">
                                        {{$comment->created_at->shortAbsoluteDiffForHumans()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="border-t-2 p-5">
                <form action="/p/{{$post->slug}}/comment" method="post">
                @csrf
                <div class="flex flex-row">
                    <textarea name="body" id="comment_body" placeholder="Add a comment  ..."
                    class="h-5 grow resize-none overflow-hidden border-none bg-none p-0 paceholder-gray-400 outline-0 focus:ring-0"></textarea>
                    <button type="submit" class="ml-5 border-none bg-white text-blue-500">Post</button>
                </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>