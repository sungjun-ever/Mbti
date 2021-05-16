<div class="w-11/12 pt-6 mx-auto">
    <div>
        <form action="{{route($boardName.'.store')}}" method="post">
            @csrf
            @if($boardName == 'suggests')
                <label for="secret_checkbox" class="text-base">비밀글</label>
                <input type="checkbox" id="secret_checkbox" name="secret_checkbox" class="w-4 h-4 align-middle">
            @endif
            <label for="title"></label>
            <input id="title" type="text" name="title"
                   class="w-full py-2 pl-2 text-lg rounded-md outline-none border-2 focus:border-blue-300
                            @error('title') border-2 border-red-600 @enderror"
                   value="{{old('title') ? old('title') : ''}}"
                   placeholder="제목을 입력해주세요.">
            <label for="editor"></label>
            <textarea name="story" id="editor"></textarea>
{{--            <textarea id="story" name="story"--}}
{{--                      class="px-2 pt-2 border-2 focus:border-blue-300 rounded-md outline-none w-full resize-none text-lg--}}
{{--                             @error('story') border-2 border-red-600 @enderror"--}}
{{--                      rows="24" placeholder="내용을 입력해주세요.">{{old('story') ? old('story') : ''}}</textarea>--}}
            <div class="mt-4 text-center">
                <button type="submit" class="px-4 py-2 mr-4 text-lg rounded-lg text-gray-50 bg-blue-400 hover:bg-blue-800">작성</button>
                <button class="px-4 py-2 text-lg rounded-lg text-gray-50 bg-red-400 hover:bg-red-800">취소</button>
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
                    'bulletedList',
                    'numberedList',
                    '|',
                    'imageUpload',
                    'insertTable',
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
        } )
</script>
