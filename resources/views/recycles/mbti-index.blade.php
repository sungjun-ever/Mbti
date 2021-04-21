<div class="w-11/12 pt-12 mx-auto">
    <div class="pt-8">
        <span class="xl:text-2xl text-xl border-b-2 border-blue-300">{{strtoupper($mbtiName)}}</span>
    </div>
    <div class="text-right pt-8">
        <a href="{{route('mbtis.'.$mbtiName.'.create')}}">
            <i class="xi-pen pr-1"></i><button class="">글쓰기</button>
        </a>
    </div>
    <div class="mt-16 min-h-30">
        <table class="w-full table-fixed">
            <tr>
                <td class="w-7/12"></td>
                <td class="w-1/12"></td>
                <td class="w-1/12 xl:table-cell hidden"></td>
            </tr>
            @foreach($mbtis as $mbti)
                <tr class="border-b">
                    <td class="pl-2 truncate"><a href="{{route('mbtis.'.$mbtiName.'.show', $mbti->id)}}" class="text-lg">{{$mbti->title}}</a>
                    </td>
                    <td class="text-center xl:text-base text-xs">{{$mbti->user_name}}</td>
                    <td class="w-1/12 xl:table-cell hidden">{{$mbti->created_at->format('Y-m-d')}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="mt-16">
        {{$mbtis->links()}}
    </div>
</div>
