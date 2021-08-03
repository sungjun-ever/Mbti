<div class="w-11/12 pt-12 mx-auto">
    <div class="pt-8">
        <span class="xl:text-2xl text-xl border-b-2 border-black">
             @if($boardName == 'frees')
                자유게시판
            @elseif($boardName== 'suggests')
                건의게시판
            @elseif($boardName == 'temps')
                임시게시판
            @elseif($boardName == 'anonymous')
                익명게시판
            @else
                {{strtoupper($boardName)}}
            @endif
        </span>
    </div>
    <div class="text-right pt-8 ">
        <a href="{{route($boardName.'.create')}}" class="hover:text-green-800">
            <i class="xi-pen pr-1 "></i><button>글쓰기</button>
        </a>
    </div>
    <div class="mt-16" style="min-height: 300px">
        <table class="w-full table-fixed">
            <tr>
                <td class="w-7/12"></td>
                <td class="md:w-1/12"></td>
                <td class="w-1/12 xl:table-cell hidden"></td>
            </tr>
            @foreach($posts as $post)
                <tr class="border-b">
                    <td class="pl-2 py-1 text-base truncate">
                        <a href="{{route($post->board_name.'.show', $post->id)}}"
                           class="hover:no-underline hover:text-green-800" >{{$post->title}}</a>
                    </td>
                    <td class="text-center xl:text-base text-xs truncate">{{$post->user->name}}</td>
                    <td class="w-1/12 xl:table-cell hidden">{{$post->created_at->format('Y-m-d')}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="mt-4 text-right">
        <form action="{{route($boardName.'.search')}}" method="get">
            @csrf
            <select name="content" class="border-2 border-green-my focus:outline-none rounded-md mr-2">
                <option value="title">제목</option>
                <option value="story">내용</option>
                <option value="board_name">게시판</option>
            </select>
            <input type="search" name="search"
                   class="border-2 border-green-my focus:outline-none rounded-md pl-1 h-7">
            <button><i class="xi-search text-lg hover:text-green-800"></i></button>
        </form>
    </div>
    <div class="mt-16">
        {{$posts->links()}}
    </div>
</div>
