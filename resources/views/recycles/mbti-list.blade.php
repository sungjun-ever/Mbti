<div class="w-10/12 mx-auto pt-8">
    <div class="pb-4">
        <span class="xl:text-2xl text-xl text-blue-500 font-bold">{{strtoupper($mbti->mbtiSort)}}</span>
    </div>
    <table class="w-full table-fixed">
        <tr>
            <td class="w-7/12"></td>
            <td class="w-1/12"></td>
            <td class="w-1/12 xl:table-cell hidden"></td>
        </tr>
        @foreach($mbtis as $mbti)
            <tr class="border-b">
                <td class="pl-2 truncate"><a href="{{route('mbtis.'.$mbti->mbtiSort.'.show', $mbti->id)}}" class="text-lg">{{$mbti->title}}</a>
                </td>
                <td class="text-center xl:text-base text-xs">{{$mbti->user_name}}</td>
                <td class="w-1/12 xl:table-cell hidden">{{$mbti->created_at->format('Y-m-d')}}</td>
            </tr>
        @endforeach
    </table>
    <div class="pt-10">
        {{$mbtis->links()}}
    </div>
</div>
