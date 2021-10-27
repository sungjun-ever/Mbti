<h1>MBTI 홈페이지</h1>
CRUD를 사용한 기본적인 게시판형 홈페이지입니다.
<br>
<p>
<img src="https://img.shields.io/badge/php-3766AB?style=flat-square&logo=php&logoColor=white"/>&nbsp
<img src="https://img.shields.io/badge/laravel-850000?style=flat-square&logo=laravel&logoColor=black"/>&nbsp
</p>
<hr/>
<div>
    중복되는 CRUD 파일은 라라벨 템플릿의 @include 기능을 사용했습니다.<br>
    재사용되는 파일들은 recycles 폴더 안에 따로 관리했습니다.<br>
    Link: <a href="https://github.com/sungjun-ever/Mbti/tree/master/resources/views/recycles">recycles 폴더</a>
</div>
<br>
<h3>View</h3>
<hr/>
<div>
    게시판은 총 5가지의 게시판이 있습니다.<br>
    성격유형 게시판, 자유게시판, 익명게시판, 건의게시판, 임시게시판으로 구성되어있습니다.<br>
    Link: <a href="https://github.com/sungjun-ever/Mbti/tree/master/resources/views/recycles/show.blade.php">recycles/show.blade.php</a>
</div>
<br>
<h3>Controller</h3>
<hr/>
<div>
컨트롤러는 각 게시판마다 별도로 관리했습니다.<br>
컨트롤러는 CRUD를 지원하는 메서드로 구성되어있고, 검색 기능을 지원하는 경우 search 메서드가 있습니다.
댓글을 지원하는 게시판인경우 CommentController.php 파일이 있습니다.<br>
이미지 저장을 지원하는 경우 **<a href="">StoreImageController.php</a>** 파일에 있는 static 메서드를 사용합니다.
<p>
    1. <a href="#">MBTI 컨트롤러</a><br>
    2. <a href="#">자유게시판 컨트롤러</a><br>
    3. <a href="#">익명게시판 컨트롤러</a><br>
    4. <a href="#">건의게시판 컨트롤러</a><br>
    5. <a href="#">임시게시판 컨트롤러</a><br>
</p>
</div>
<br>
<h3>Model</h3>
<hr/>
<div>
각 게시판마다 하나의 모델 파일이 있으며 댓글을 지원하는 경우 별도의 파일이 있습니다.<br>
또한, 라라벨 엘로퀀트에서 지원하는 관계 정의를 사용했습니다.<br>
Link: <a href="#">Model 폴더</a>
</div>
