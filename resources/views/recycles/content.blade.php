<div class="pt-16 min-h-screen">
    <div class="w-10/12 mx-auto border-b-2 border-green-my">
        <p class="truncate text-xl font-bold pb-1">
            {{$post->title}}
        </p>
    </div>
    <div class="w-10/12 mx-auto my-4 h-screen">
        <p class="text-lg">
            {!! $post->story !!}
        </p>
    </div>
    @auth()
        @if($post->user_id == auth()->user()->id)
            <div class="w-10/12 mx-auto my-4 text-lg">
                <span class="hover:text-blue-300">
                    <a href="{{route($post->board_name.'.edit', $post->id)}}"><i class="xi-pen-o pr-2"></i><button>수정</button></a>
                </span>
                <form action="{{route($post->board_name.'.destroy', $post->id)}}" method="post" class="inline-block">
                    @csrf
                    @method('delete')
                    <span class="hover:text-red-300"><i class="xi-cut pl-4"></i>
                        <button type="submit" onclick="if(!confirm('삭제하시겠습니까?')) return false">삭제</button>
                    </span>
                </form>
            </div>
        @endif
    @endauth
</div>

