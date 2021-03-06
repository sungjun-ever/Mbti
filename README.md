<h1>MBTI 홈페이지</h1>
CRUD 기능을 구현한 기본적인 게시판형 홈페이지입니다.

<img src="https://img.shields.io/packagist/php-v/laravel/laravel"/>&nbsp;
<img src="https://img.shields.io/badge/laravel-red?style=flat-square&logo=laravel&logoColor=white"/>&nbsp;
<img src="https://img.shields.io/badge/javascript-green?style=flat-square&logo=javascript&logoColor=white"/>&nbsp;
<img src="https://img.shields.io/badge/jquery-blue?style=flat-square&logo=jquery&logoColor=white"/>&nbsp;
<br>
<h3>View</h3>
<hr/>
<div>
    게시판은 총 5가지의 게시판이 있습니다.<br>
    성격유형 게시판, 자유게시판, 익명게시판, 건의게시판, 임시게시판으로 구성되어있습니다.<br>
    <div>
    중복되는 view 파일은 라라벨 템플릿의 @include 기능을 사용했습니다.<br>
    재사용되는 파일들은 recycles 폴더 안에 따로 관리했습니다.<br>
    Link: <a href="https://github.com/sungjun-ever/Mbti/tree/master/resources/views/recycles">recycles 폴더</a>
</div>
</div>
<br>
<h3>Controller</h3>
<hr/>
<div>
컨트롤러는 각 게시판마다 별도로 관리했습니다.<br>
컨트롤러는 CRUD를 지원하는 메서드로 구성되어있고, 검색 기능을 지원하는 경우 search 메서드가 있습니다.<br>
댓글을 지원하는 게시판인 경우, 각 디렉토리에 게시판명+CommentController.php 파일이 있습니다.<br>
이미지 저장, 수정, 삭제 지원하는 경우 <a href="https://github.com/sungjun-ever/Mbti/blob/master/app/Http/Func/HandleImage.
php">HandleImage.php</a>파일에 있는 static 메서드를 사용합니다.
<ul>
<li><a href="https://github.com/sungjun-ever/Mbti/blob/master/app/Http/Controllers/Mbti">MBTI 컨트롤러</a></li>
    <p>
        3개의 파일로 구성되어 있습니다.<br> 
        MbtiController.php 파일은 전체 mbti 게시판의 목록과 글을 제어합니다.<br>
        MbtiSortController.php 파일은 각 성격 유형별 게시판의 CRUD 기능을 담당합니다.<br>
        MbtiCommentController.php 파일은 각 게시글의 댓글 기능을 제어합니다.
    </p>
<li><a href="https://github.com/sungjun-ever/Mbti/tree/master/app/Http/Controllers/Free">자유게시판 컨트롤러</a></li><br>
<li><a href="https://github.com/sungjun-ever/Mbti/tree/master/app/Http/Controllers/Anonymous">익명게시판 컨트롤러</a></li>
<p>
    익명게시판 구성도 다른 게시판과 같습니다.<br>
    차이점은 사용자에게 익명 이름을 주기 위해서<br>
    <a href="https://github.com/sungjun-ever/Mbti/blob/master/app/Http/Func/HandleAnonymousName.
    php">HandleAnonymousName.php</a> 파일에 있는 static 메서드를 사용합니다.<br>
    user 테이블에서 유저가 익명 이름이 없거나, 날짜가 다른 경우 익명 이름을 줍니다.
</p>
<li><a href="https://github.com/sungjun-ever/Mbti/tree/master/app/Http/Controllers/Suggest">건의게시판 컨트롤러</a></li><br>
<li><a href="https://github.com/sungjun-ever/Mbti/blob/master/app/Http/Controllers/TempController.php">임시게시판 컨트롤러</a></li>
<p>
    임시게시판 게시물은 관리자 페이지에서 게시물을 임시게시판으로 옮겼을 때 생성됩니다.
</p>
</ul>
</div>
<h3>Model</h3>
<hr/>
<div>
각 게시판마다 하나의 모델 파일이 있으며 댓글을 지원하는 경우 별도의 파일이 있습니다.<br>
또한, 라라벨 엘로퀀트에서 지원하는 관계 정의를 사용했습니다.<br>
Link: <a href="https://github.com/sungjun-ever/Mbti/tree/master/app/Models">Model 폴더</a>
</div>
<br>
<h3>Auth</h3>
<hr/>
<div>
로그인 기능은 라라벨에서 지원하는 Auth 기능을 기본으로 사용했습니다.<br>
추가적으로 구글 소셜 로그인 기능을 구현했습니다.<br>
Link: 
<a href="https://github.com/sungjun-ever/Mbti/blob/master/app/Http/Controllers/Auth/LoginController.php">LoginController</a>
</div>
<br>
<h3>유저 페이지</h3>
<hr/>
<div>
유저페이지에서는 자신의 개인정보 및 비밀번호 변경이 가능합니다.<br>
또한, 자신이 작성한 게시물 및 댓글 확인이 가능합니다.<br>
Link: 
<a href="https://github.com/sungjun-ever/Mbti/blob/master/app/Http/Controllers/UserController.php">UserController</a>
</div>
<br>
<h3>관리자 페이지</h3>
<hr/>
<div>
관리자 페이지에서는 게시물, 댓글 확인이 가능하고 사용자 차단 기능을 제공합니다.<br>
또한, 게시물을 임시 게시판으로 이동시킬 수 있습니다.<br>
Link: <a href="https://github.com/sungjun-ever/Mbti/tree/master/app/Http/Controllers/Admin">AdminController</a>
</div>
<br>
<h3>Trait</h3>
<hr/>
<div>
게시판 이름을 가져오는 메서드는 trait를 상속해 사용하게 했습니다.<br>
게시판 이름을 가져오는 메서드를 따로 만든 이유는, 중복되는 view 파일을 @include를 이용해 재활용하기 때문에 
route()내에 변수로 넣어주기 위해서 입니다.<br>
Link: <a href="https://github.com/sungjun-ever/Mbti/blob/master/app/Http/Func/GetBoardName.php">GetBoardName.php</a><br>
Link: <a href="https://github.com/sungjun-ever/Mbti/blob/master/resources/views/recycles/index.blade.php">@include 
view 파일</a>
</div>
<br>
<h3>Packages</h3>
<hr/>
<div>
이미지 리사이즈 기능 등을 위해 사용했습니다.<br>
Link: <a href="http://image.intervention.io/getting_started/installation">Intervention Image</a>
</div>
