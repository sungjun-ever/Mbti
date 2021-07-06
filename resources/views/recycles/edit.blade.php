<script>
    $(document).ready(function(){
        $('#uploadFiles').change(function(){
            let fileList = $('#uploadFiles')[0].files;
            let fileListTag = '';
            let extensions = ['jpeg', 'jpg', 'bmp', 'png'];
            for(let i=0; i<fileList.length; i++){
                if(!extensions.includes(fileList[i].name.split('.')[1].toLowerCase())){
                    alert(`${fileList[i].name.split('.')[1]}는 첨부할 수 없는 이미지 형식입니다.`)
                    $('#uploadFiles').val(null);
                    $('#fileList').empty();
                    break
                } else {
                    fileListTag += "<div>" + fileList[i].name.split('.')[0] + '.' + fileList[i].name.split('.')[1].toLowerCase() + "</div>"
                }
                $('#fileList').html(fileListTag);
            }
        });
    });
</script>

<div class="w-11/12 pt-6 mx-auto">
    <div>
        <form action="{{route($post->board_name.'.update', $post->id)}}" method="post">
            @method('PUT')
            @csrf
            <label for="title"></label>
            <input id="title" type="text" name="title"
                   class="w-full py-2 pl-2 text-lg rounded-md outline-none border-2 focus:border-green-700 truncate
                           @error('title') border-2 border-red-600 @enderror"
                   value="{{old('title') ? old('title') : $post->title}}" autofocus>
            <label for="story"></label>
            <textarea name="story" id="editor">{{old('story') ? old('story') : $post->story}}</textarea>
            {{--  이미지 첨부 --}}
            <input id="uploadFiles" type="file" multiple="multiple" name="image[]" class="mt-4">
            <div class="mt-2">jpeg, jpg, bmp, png 형식만 가능합니다.</div>
            {{--  이미지 목록 --}}
            <div class="pt-4 text-lg border-b-2">사진 목록</div>
            <div id="fileList" class="mt-2 grid grid-cols-4 mb-16">
                @if($post->image_name)
                    @foreach($files = array_diff(scandir(public_path($post->image_url)), array('.', '..')) as $file)
                        <div class="relative float-left w-2/3 h-2/3" >
                            <img src="{{asset($post->image_url).'/'.$file}}" alt="{{$file}}">
                            <input type="checkbox" class="absolute -bottom-3 right-1" value="{{$file}}">
                        </div>
                    @endforeach
                @endif
            </div>
            @if($post->board_name == 'suggests')
                <div class="mt-4">
                    <label for="post_password" class="text-base">비밀번호</label>
                    <input type="password" id="post_password" name="post_password" placeholder="비밀번호는 필수입니다."
                           class="border-2 border-blue-300 py-1 w-4/12 pl-1" required>
                </div>
            @endif
            <div class="mt-4 text-center">
                <button type="submit" class="px-4 py-2 mr-4 text-lg rounded-lg text-gray-50 bg-blue-400 hover:bg-blue-800">수정</button>
                <button type="button" onclick="history.back()"
                        class="px-4 py-2 text-lg rounded-lg text-gray-50 bg-red-400 hover:bg-red-800">취소</button>
            </div>
        </form>
    </div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'alignment',
                    'fontColor',
                    'fontSize',
                    'fontFamily',
                    'horizontalLine',
                    'underline',
                    '|',
                    'imageUpload',
                    'undo',
                    'redo'
                ]
            },
            language: 'ko',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            simpleUpload: {
                // The URL that the images are uploaded to.
                uploadUrl: '/uploadFile',

                // Enable the XMLHttpRequest.withCredentials property.
                withCredentials: true,

                // Headers sent along with the XMLHttpRequest to the upload server.
                headers: {
                    'X-CSRF-TOKEN': 'CSRF-Token',

                }
            }
        })

</script>
