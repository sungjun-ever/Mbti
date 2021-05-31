<div class="mt-3">
    <a href="{{route($mbtiName.'.index')}}" class="text-2xl inline-block">
        <button type="submit" class="hover:text-green-600 px-1 border-b-2 border-black">{{strtoupper($mbtiName)}}</button>
    </a>
    <div class="mt-3">
        @foreach($mbtis as $mbti)
            <div class="text-base w-9/12 border-b border-gray-200 pb-1 pl-1">
                <a href="{{route($mbtiName.'.show', $mbti->id)}}" class="hover:text-green-my hover:no-underline">{{$mbti->title}}</a>
            </div>
        @endforeach
    </div>
</div>
