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
                    fileListTag += "<li>" + fileList[i].name.split('.')[0] + '.' + fileList[i].name.split('.')[1].toLowerCase() + "</li>"
                }
                $('#fileList').html(fileListTag);
            }
        });
    });
</script>
<div class="w-11/12 pt-6 mx-auto">
    <div>
        <form action="{{route($boardName.'.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="title"></label>
            <input id="title" type="text" name="title"
                   class="w-full py-2 pl-2 text-lg rounded-md outline-none border-2 focus:border-green-700
                            @error('title') border-2 border-red-600 @enderror"
                   value="{{old('title') ? old('title') : ''}}"
                   placeholder="제목을 입력해주세요." autofocus>
            <label for="editor"></label>
            <textarea name="story" id="editor">{{old('story') ? old('story') : ''}}</textarea>
            {{--  이미지 첨부 --}}
            <input id="uploadFiles" type="file" multiple="multiple" name="image[]" class="mt-4">
            <div class="mt-2">jpeg, jpg, bmp, png 형식만 가능합니다.</div>
            {{--  이미지 목록 --}}
            <ul id="fileList" class="mt-2"></ul>
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
                    'undo',
                    'redo'
                ]
            },
            language: 'ko',
        });
</script>
