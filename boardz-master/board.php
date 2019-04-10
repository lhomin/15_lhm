<!-- 구글 검색 : galley board css => CSS Only Pinterest-like Responsive Board Layout - Boardz.css | CSS ... -->
<!-- 출처 : https://www.cssscript.com/css-pinterest-like-responsive-board-layout-boardz-css/ -->
<?php

// MySQL 데이터베이스 연결 readme로
$connect = mysql_connect("localhost", "leehomin", "1234");
// DB 선택
mysql_select_db("leehomin_db", $connect);
// sql 쿼리 string 생성
$sql = "select * from boardz where title like '%$_POST[search]%'";
// sql 쿼리 실행
$result = mysql_query($sql);
$num = mysql_num_rows($result); // 사진 값
$row = mysql_fetch_array($result);
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Boardz Demo</title>
    <meta name="description" content="Create Pinterest-like boards with pure CSS, in less than 1kB.">
    <meta name="author" content="Burak Karakan">
    <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
    <link rel="stylesheet" href="src/boardz.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wingcss/0.1.8/wing.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<div class="seventyfive-percent  centered-block">
    <!-- Sample code block -->
    <div>
        <hr class="seperator">

        <!-- Example header and explanation -->
        <div class="text-center">
            <h2>Beautiful <strong>Boardz</strong></h2>
            <div style="display: block; width: 50%; margin-right: auto; margin-left: auto; position: relative;">
                <form class="example" action="board.php" method="post">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <!--<hr class="seperator fifty-percent">-->

        <!-- Example Boardz element. -->
        <div class="boardz centered-block beautiful">
                    </li>
            <?php
            if($num==7) { //num 7 -> 입력값에 아무것도 입력안되있을때 사진 전체 출력
                echo '
            <!-- Example Boardz element. -->
            <div class="boardz centered-block beautiful">
                <ul>
                    <li>
                        <h1></h1>
                        <img src="http://2.bp.blogspot.com/-pINYV0WlFyA/VUK-QcGbU5I/AAAAAAAABcU/fNy2pd2cFRk/s1600/WEB-Jack-White-Poster-Creative.png" alt="demo image"/>

                    <li>
                        <img src="http://payload140.cargocollective.com/1/10/349041/5110553/Florrie.jpg" alt="demo image"/>
                    </li>
                </ul>
                <ul>
                    <li>
                        <h1></h1>
                        <img src="http://wpmedia.ottawacitizen.com/2015/11/01.jpg?quality=55&strip=all&w=840&h=630&crop=1" alt="demo image"/>
                    </li>
                    <li>
                        <h1></h1>
                        <img src="https://s-media-cache-ak0.pinimg.com/736x/8c/ee/ff/8ceeff967c03c7cf4f86391dd6366544.jpg" alt="demo image"/>
                    </li>

                </ul>
                <ul>
                    <li>
                        <h1></h1>
                        <img src="https://s-media-cache-ak0.pinimg.com/originals/87/16/8c/87168cbbf07cb54a9793bebaa20b1bde.jpg" alt="demo image"/>
                    </li>
                    <li>
                        <h1></h1>
                        Ex nostrud verterem mea, duo no delicata neglegentur. Audire integre rationibus ut pri, ex cibo oblique euismod sit, cibo iracundia vix at. Legimus torquatos definiebas an nec, mazim postulant at sit. Ne qui quando vocent accusata, nam tritani fierent no. Ea per vocent voluptatibus.

                        <br />

                        <img src="https://s-media-cache-ak0.pinimg.com/736x/22/95/48/229548086245c332443109ca9f2e0890.jpg" alt="demo image"/>

                    </li>
                    <li>
                        <h1></h1>

                        <br />

                        <img src="https://inspirationfeeed.files.wordpress.com/2014/01/ca402f7410884454ec5c303336e8591d1.jpg" alt="demo image"/>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="seperator">

    </div>
</body>
</html>';
}
else {
if($num>0) // 1,2,3 자리까지 출력
{
echo '<ul>';
    for($i=0;$i<$num;$i++) {
    if($i%3==0) {
    echo '<li>';
        echo '<h1>'; $data = mysql_result($result, $i, title); echo $data; echo '</h1>';
        echo '<img src="';$data = mysql_result($result, $i, image_url); echo $data; echo '" alt="demo image"/>';
        echo '</li>';
    }
    }
    echo '</ul>';
}

if($num>1) // 1자리까지 사진 철력
{
echo '<ul>';
    for($i=0;$i<$num;$i++) {
    if($i%3==1) {
    echo '<li>';
        echo '<h1>'; $data = mysql_result($result, $i, title); echo $data; echo '</h1>';
        echo '<img src="';$data = mysql_result($result, $i, image_url); echo $data; echo '" alt="demo image"/>';
        echo '</li>';
    }
    }
    echo '</ul>';
}

if($num>2) // 1,2사진까지 출력
{
echo '<ul>';
    for($i=0;$i<$num;$i++) {
    if($i%3==2) {
    echo '<li>';
        echo '<h1>'; $data = mysql_result($result, $i, title); echo $data; echo '</h1>';
        echo '<img src="';$data = mysql_result($result, $i, image_url); echo $data; echo '" alt="demo image"/>';
        echo '</li>';
    }
    }
    echo '</ul>';
}
}
?>
</div>
</div>

<hr class="seperator">

</div>
</body>
</html>