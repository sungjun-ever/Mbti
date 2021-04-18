<div class="w-11/12 pt-12 mx-auto">
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
                <td class="w-1/12"></td>
            </tr>
            @foreach($mbtis as $mbti)
                <tr class="border-b">
                    <td class="pl-2 truncate"><a href="{{route('mbtis.'.$mbtiName.'.show', $mbti->id)}}" class="text-lg">{{$mbti->title}}</a>
                    </td>
                    <td class="text-center">{{$mbti->user_name}}</td>
                    <td class="">{{$mbti->created_at->format('Y-m-d')}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="mt-16">
        {{$mbtis->links()}}
    </div>
</div>
