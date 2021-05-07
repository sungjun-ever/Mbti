<div class="w-10/12 mx-auto pt-8">
    <div class="pb-4">
        <span class="xl:text-2xl text-xl text-blue-500 font-bold">
            @if($post->board_name == 'frees')
                자유게시판
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
                <td class="pl-2 truncate"><a href="{{route($post->board_name.'.show', $post->id)}}" class="text-lg">{{$post->title}}</a>
                </td>
                <td class="text-center xl:text-base text-xs">{{$post->user->name}}</td>
                <td class="w-1/12 xl:table-cell hidden">{{$post->created_at->format('Y-m-d')}}</td>
            </tr>
        @endforeach
    </table>
    <div class="pt-10">
        {{$posts->links()}}
    </div>
</div>
