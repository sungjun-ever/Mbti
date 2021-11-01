<h1>MBTI 홈페이지</h1>
CRUD 기능을 구현한 기본적인 게시판형 홈페이지입니다.

<img src="https://img.shields.io/packagist/php-v/laravel/laravel"/>&nbsp;
<img src="https://img.shields.io/badge/laravel-red?style=flat-square&logo=laravel&logoColor=white"/>&nbsp;
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
댓글을 지원하는 게시판인경우 CommentController.php 파일이 있습니다.<br>
이미지 저장을 지원하는 경우 <a href="https://github.com/sungjun-ever/Mbti/blob/master/app/Http/Controllers/StoreImageController.php">StoreImageController.php</a> 파일에 있는 static 메서드를 사용합니다.
<p>
<ul>
<li><a href="https://github.com/sungjun-ever/Mbti/blob/master/app/Http/Controllers/Mbti">MBTI 컨트롤러</a></li><br>
<li><a href="https://github.com/sungjun-ever/Mbti/tree/master/app/Http/Controllers/Free">자유게시판 컨트롤러</a></li><br>
<li><a href="https://github.com/sungjun-ever/Mbti/tree/master/app/Http/Controllers/Anonymous">익명게시판 컨트롤러</a></li><br>
<li><a href="https://github.com/sungjun-ever/Mbti/tree/master/app/Http/Controllers/Suggest">건의게시판 컨트롤러</a></li><br>
<li><a href="https://github.com/sungjun-ever/Mbti/blob/master/app/Http/Controllers/TempController.php">임시게시판 컨트롤러</a></li><br>
</ul>
</p>
</div>
<br>
<h3>Model</h3>
<hr/>
<div>
각 게시판마다 하나의 모델 파일이 있으며 댓글을 지원하는 경우 별도의 파일이 있습니다.
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
유저페이지에서는 자신의 개인정보 및 비밀번호 변경이 가능합니다. 또한, 자신이 작성한 게시물 및 댓글 확인이 가능합니다.<br>
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
Link: <a href="https://github.com/sungjun-ever/Mbti/blob/master/app/Http/Func/GetBoardName.php">GetBoardName.php</a>
</div>
