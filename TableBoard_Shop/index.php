<?php
    # TODO: MySQL 데이터베이스 연결 및 레코드 가져오기!
    // MySQL 데이터베이스 연결
    $connect = mysql_connect("localhost", "leehomin", "1234");
    // DB 선택
    mysql_select_db("leehomin_db", $connect);
    // sql 쿼리 string 생성
    $sql = "select * from tableboard_shop order by num asc";
    // sql 쿼리 실행
    $result = mysql_query($sql);
    // 선택된 sql 갯수
    /** @var TYPE_NAME $numofrow */
    $numsofrow = mysql_num_rows($result); //출력값 result를 numsofrow로 받음

?>

<!-- 출처 : https://colorlib.com/wp/template/responsive-table-v1/ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table V01</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <a href="board_form.php" style="border: 1px; padding: 10px; background: #36304a; display: block; width: 100px; text-align: center; float: right; border-radius: 10px; margin-bottom: 5px;"> Add </a>
            <div class="table100">
                <table>
                    <thead>
                    <tr class="table100-head">
                        <th class="column1">Date</th>
                        <th class="column2">Order ID</th>
                        <th class="column3">Name</th>
                        <th class="column4">Price</th>
                        <th class="column5">Quantity</th>
                        <th class="column6">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    # TODO : 아래 표시되는 내용을, MySQL 테이블에 있는 레코드로 대체하기!
                    # Note : column6 에 해당하는 Total 은 Price 값과 Quantity 값의 곱으로 표시!
                    for($i=0;$i<$numsofrow;$i++) {
                        /** @var TYPE_NAME $row */
                        $row = mysql_fetch_row($result);
                        echo '<tr onclick="location.href = (\'board_form.php?num='; echo $i+1;echo '\')">';
                        echo '<td class="column1">'; echo $row[1]; echo '</td>';
                        echo '<td class="column2">'; echo $row[2]; echo '</td>';
                        echo '<td class="column3">'; echo $row[3]; echo '</td>';
                        echo '<td class="column4">'; echo '$'; echo $row[4]; echo '</td>';
                        echo '<td class="column5">'; echo $row[5]; echo '</td>';
                        echo '<td class="column6">'; echo '$'; echo $row[4]*$row[5]; echo '</td>';
                        echo '</tr>';
                    } // result를 받은numsofrow를 반복문을통해 출력, 마지막 total 값은 곱하기 출력해서 편하게 출력
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>