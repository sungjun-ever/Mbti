<div class="pt-16 min-h-screen">
    <div class="w-10/12 mx-auto border-b-2 border-blue-300">
        <p class="truncate text-xl font-bold pb-1">
            {{$mbti->title}}
        </p>
    </div>
    <div class="w-10/12 mx-auto my-4 h-screen">
        <p class="text-lg">
            {{$mbti->story}}
        </p>
    </div>
    @auth()
        @if($mbti->user_id == auth()->user()->id)
            <div class="w-10/12 mx-auto my-4 text-lg">
                <span class="hover:text-blue-300"><a href="{{route('mbtis.enfj.edit', $mbti->id)}}"><i class="xi-pen-o pr-2"></i><button>수정</button></a></span>
                <form action="{{route('mbtis.enfj.destroy', $mbti->id)}}" method="post" class="inline-block">
                    @csrf
                    @method('delete')
                    <span class="hover:text-red-300"><i class="xi-cut pr-2 pl-4"></i>
                            <button type="submit">삭제</button>
                        </span>
                </form>
            </div>
        @endif
    @endauth
</div>
