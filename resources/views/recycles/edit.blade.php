<script>
    $(document).ready(function(){
        $('#uploadFiles').change(function(){
            let fileList = $('#uploadFiles')[0].files;
            let arr = Array.prototype.slice.call(fileList);

            for(let i=0; i<fileList.length; i++){
                if(!checkExtension(fileList[i].name,fileList[i].size)) { //확장자 체크
                    return false
                }
            }

            preview(arr);
        });

        function checkExtension(fileName,fileSize){
            let extensions = ['jpeg', 'jpg', 'bmp', 'png'];
            let maxSize = 20971520;  //20MB

            if(fileSize >= maxSize){
                alert('파일 사이즈 초과');
                $("input[type='file']").val("");  //파일 초기화
                return false;
            }

            if(!extensions.includes(fileName.split('.')[1].toLowerCase())){
                alert('업로드 불가능한 파일이 있습니다.');
                $("input[type='file']").val("");  //파일 초기화
                return false;
            }
            return true;
        }

        function preview(arr){
            arr.forEach(function(f){

                //파일명이 길면 파일명...으로 처리
                let fileName = f.name;
                if(fileName.length > 12){
                    fileName = fileName.substring(0,9)+"...";
                }

                //div에 이미지 추가
                let str = '<div id="'+f.name+'" class="relative float-left w-2/3" style="min-height: 120px;">';

                //이미지 파일 미리보기
                if(f.type.match('image.*')){
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        str += '<img src="'+e.target.result+'" title="'+f.name+'"/>';
                        str += '<input type="checkbox" class="absolute xl:bottom-8 bottom-5 right-1 w-5" value="'+f.name+'">';
                        str += '</div>';
                        $(str).appendTo('#preview');
                    }
                    reader.readAsDataURL(f);
                }else{
                    str += '<img src="/resources/img/fileImg.png" title="'+f.name+'"/>';
                    $(str).appendTo('#preview');
                }
            });
        }

        $('#deleteImgBtn').click(function (){
            if(!confirm('사진을 삭제하시겠습니까?')){
                return false
            }
            let value = [];
            $.each($("input:checked"), function (){
                let name = $(this).val().split('.')[0];
                value.push($(this).val());
                $('#'+name).remove();
            });
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
            <div class="mt-2">형식: jpeg, jpg, bmp, png | 크기: 20MB 이하</div>

            {{--  이미지 목록 --}}
            @if($post->image_name)
                <div class="pt-4 text-lg border-b-2">사진 목록</div>
                <div id="preview" class="mt-2 grid grid-cols-4">
                    @foreach($files = array_diff(scandir(public_path($post->image_url)), array('.', '..')) as $file)
                        @php
                            $name = preg_split('/\./', $file, -1, PREG_SPLIT_NO_EMPTY);
                        @endphp
                        <div id="{{$name[0]}}" class="relative float-left w-2/3" style="min-height: 120px">
                            <img src="{{asset($post->image_url).'/'.$file}}" alt="{{$file}}" >
                            <input type="checkbox" class="absolute xl:bottom-8 bottom-5 right-1 w-5" value="{{$file}}">
                        </div>
                    @endforeach
                </div>
                <div class="mb-8">
                    <button type="button" id="deleteImgBtn"
                            class="px-3 py-1 bg-red-500 hover:bg-red-800 text-white rounded-md">
                        체크 파일 삭제
                    </button>
                </div>
            @endif
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
