<div class="mt-3">
    <a href="{{route('mbtis.'.$mbtiName.'.index')}}" class="text-2xl inline-block">
        <button type="submit" class="hover:text-blue-400 px-1 border-b-2 border-blue-400">{{strtoupper($mbtiName)}}</button>
    </a>
    <div class="mt-3">
        @foreach($mbtis as $mbti)
            <div class="text-base w-9/12 border-b border-gray-200 pb-1 pl-1">
                <a href="{{route('mbtis.'.$mbtiName.'.show', $mbti->id)}}"><button>{{$mbti->title}}</button></a>
            </div>
        @endforeach
    </div>
</div>
