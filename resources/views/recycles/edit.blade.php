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
