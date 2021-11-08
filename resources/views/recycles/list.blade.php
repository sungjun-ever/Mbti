{{-- 게시물 목록  --}}
<div class="w-10/12 mx-auto pt-8">
    <div class="pb-4">
        <span class="xl:text-2xl text-xl text-black font-bold">
            @if($post->board_name == 'frees')
                자유게시판
            @elseif($post->board_name == 'suggests')
                건의게시판
            @elseif($post->board_name == 'temps')
                임시게시판
            @elseif($post->board_name == 'anonymous')
                익명게시판
            @else
                {{strtoupper($post->board_name)}}
            @endif
        </span>
    </div>
    <table class="w-full table-fixed">
        <tr>
            <td class="w-7/12"></td>
            <td class="w-1/12"></td>
            <td class="w-1/12 xl:table-cell hidden"></td>
        </tr>
        @foreach($posts as $post)
            <tr class="border-b">
                <td class="pl-2 truncate">
                    <a href="{{route($post->board_name.'.show', $post->id)}}"
                       class="text-lg hover:no-underline hover:text-green-600 hover:font-bold">{{$post->title}}</a>
                </td>
                @if($post->board_name == 'anonymous')
                    <td class="text-center xl:text-base text-xs">{{$post->user->anony_name}}</td>
                @else
                    <td class="text-center xl:text-base text-xs">{{$post->user->name}}</td>
                @endif
                <td class="w-1/12 xl:table-cell hidden">{{$post->created_at->format('Y-m-d')}}</td>
            </tr>
        @endforeach
    </table>
    <div class="pt-10">
        {{$posts->links()}}
    </div>
</div>
