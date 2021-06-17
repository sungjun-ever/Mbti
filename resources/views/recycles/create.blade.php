<div class="w-11/12 pt-6 mx-auto">
    <div>
        <form action="{{route($boardName.'.store')}}" method="post">
            @csrf
            <label for="title"></label>
            <input id="title" type="text" name="title"
                   class="w-full py-2 pl-2 text-lg rounded-md outline-none border-2 focus:border-green-700
                            @error('title') border-2 border-red-600 @enderror"
                   value="{{old('title') ? old('title') : ''}}"
                   placeholder="제목을 입력해주세요." autofocus>
            <label for="editor"></label>
            <textarea name="story" id="editor">{{old('story') ? old('story') : ''}}</textarea>
            @if($boardName == 'suggests')
                <div class="mt-4">
                    <label for="post_password" class="text-base">비밀번호</label>
                    <input type="password" id="post_password" name="post_password" placeholder="비밀번호는 필수입니다."
                            class="border-2 border-blue-300 py-1 w-4/12 pl-1" required>
                </div>
            @endif
            <div class="mt-4 text-center">
                <button type="submit" class="px-4 py-2 mr-4 text-lg rounded-lg text-gray-50 bg-green-my hover:bg-green-800">작성</button>
                <button type="button" onclick="history.back()"
                        class="px-4 py-2 text-lg rounded-lg text-gray-50 bg-red-400 hover:bg-red-800">취소</button>
            </div>
        </form>
    </div>
</div>
<script>
    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new UploadAdapter(loader)
        }
    }
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            extraPlugins: [MyCustomUploadAdapterPlugin],
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

            simpleUpload: {
                // The URL that the images are uploaded to.
                uploadUrl: 'http://127.0.0.1:8000/api/image/upload',

                // Enable the XMLHttpRequest.withCredentials property.
                withCredentials: true,

                // Headers sent along with the XMLHttpRequest to the upload server.
                headers: {
                    'X-CSRF-TOKEN': 'CSRF-Token',
                }
            }
        })

</script>
