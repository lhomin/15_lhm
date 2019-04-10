# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!
```
create table tableboard_shop(
 num int not null auto_increment,
 date datetime,
 orderid char(200),
 name char(200),
 price int not null,
 quantity int not null,
 primary key(num)
);
```
[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
```
Note: 
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
```    
## index.php 수정
[여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.]
```
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
```
## board_form.php 수정
[여기에 board_form.php 를 어떻게 수정했는지, 설명을 작성하세요.]
```
<?php
#TODO: update form 인 경우, form 에 정보 표시
if(isset($_GET[num])) {
    #TODO: MySQL 테이블에서, num에 해당하는 레코드 가져오기
    $connect = mysql_connect("localhost", "leehomin", "1234");
    // DB 선택
    mysql_select_db("leehomin_db", $connect);
    // sql 쿼리 string 생성
    $sql = "select * from tableboard_shop where num = $_GET[num]";
    // sql 쿼리 실행
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);
}
?>

<?php
                if(isset($_GET[num])) {
                    echo "<form method=\"POST\" action=\"function/update.php?num=$_GET[num]\">";
                } else {
                    echo "<form method=\"POST\" action=\"function/insert.php\">";
                }
            ?>
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
						<tr>
                            <?php
                            if(isset($_GET[num])) { //update 의 경우!
                                ?>
                                <td class="column1"> <input name="date" type="text" value="<? echo $row[1]; ?>" /> </td>
                                <td class="column2"> <input name="order_id" type="number" value="<? echo $row[2]; ?>" /> </td>
                                <td class="column3"> <input name="name" type="text" value="<?  echo $row[3]; ?>" /> </td>
                                <td class="column4"> <input name="price" type="number" placeholder="$" style="text-align: right;" value="<? echo $row[4]; ?>" /> </td>
                                <td class="column5"> <input name="quantity" type="number" value="<? echo $row[5]; ?>" style="text-align: right;" /> </td>
                                <td class="column6"> $<span id="total"> <? echo $row[4]*$row[5]; ?> </span> </td>
                                <?php
                            } else {
                                ?>
                                <td class="column1"> <input name="date" type="text" /> </td>
                                <td class="column2"> <input name="order_id" type="number" /> </td>
                                <td class="column3"> <input name="name" type="text" /> </td>
                                <td class="column4"> <input name="price" type="number" placeholder="$" style="text-align: right;" /> </td>
                                <td class="column5"> <input name="quantity" type="number" value="1" style="text-align: right;" /> </td>
                                <td class="column6"> $<span id="total"></span> </td>
                                <?php
                            }
                            ?>
						</tr>
						</tbody>
					</table>
				</div>
                <?php
                    if(isset($_GET[num])) {
                ?>
                    <a href="function/delete.php?num=<? echo $_GET[num] ?>" style="border: 1px; padding: 10px; background: #36304a; display: block; width: 100px; text-align: center; float: right; border-radius: 10px; margin-top: 5px; margin-left: 5px; color: #007bff;"> Delete </a>
                    <input style="border: 1px; padding: 10px; background: #36304a; display: block; width: 100px; text-align: center; float: right; border-radius: 10px; margin-top: 5px; margin-left: 5px; color: #007bff; cursor: pointer;" type="submit" value="Update">
                <?php
                    } else {
                ?>
				    <input style="border: 1px; padding: 10px; background: #36304a; display: block; width: 100px; text-align: center; float: right; border-radius: 10px; margin-top: 5px; margin-left: 5px; color: #007bff; cursor: pointer;" type="submit" value="Insert">
                <?php
                    }
                ?>
			</form>
		</div>
	</div>
</div>
num값이 밀리지 않게 설정 예를 들어 12345 가 있는데 3이 빠져도 12X45가 되도록 유지
```
## function
### insert.php 수정
[여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.]
```
<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, POST로 받아온 내용 입력하기!
$connect = mysql_connect("localhost", "leehomin", "1234");
// DB 선택
mysql_select_db("leehomin_db", $connect);
// sql 쿼리 string 생성
$sql = "insert into tableboard_shop(date,orderid, name, price, quantity) 
             values('$_POST[date]','$_POST[order_id]','$_POST[name]','$_POST[price]','$_POST[quantity]')";
// sql 쿼리 실행
$result = mysql_query($sql);
# 참고 : 에러 메시지 출력 방법
if(!$result) {
    echo "<script> alert('ERROR!!'); </script>";
}
mysql_close();

?>

<script>
    location.replace('../index.php');
</script>
```
### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.]
```
<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드를 POST로 받아온 내용으로 수정하기!
$connect = mysql_connect("localhost", "leehomin", "1234");
// DB 선택
mysql_select_db("leehomin_db", $connect);
// sql 쿼리 string 생성
$sql = "update tableboard_shop set date ='$_POST[date]',orderid ='$_POST[order_id]', name='$_POST[name]',price='$_POST[price]',quantity='$_POST[quantity]' where num = $_GET[num]";
// sql 쿼리 실행
$result = mysql_query($sql);
# 참고 : 에러 메시지 출력 방법
if(!$result) {
    echo "<script> alert('update - error message') </script>";
}

?>

<script>
    location.replace('../index.php');
</script>
```
### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]
```
<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드 삭제하기!
$connect = mysql_connect("localhost", "leehomin", "1234");
// DB 선택
mysql_select_db("leehomin_db", $connect);
// sql 쿼리 string 생성
$sql = "delete from tableboard_shop where num = $_GET[num]";
// sql 쿼리 실행
$result = mysql_query($sql);

$sql2 = "set @cnt =0";
$sql3 =  "update tableboard_shop set tableboard_shop.num = @cnt:=@cnt+1";
$sql4 =  "alter table tableboard_shop auto_increment=1";

$result2 = mysql_query($sql2);
$result3 = mysql_query($sql3);
$result4 = mysql_query($sql4);
# 참고 : 에러 메시지 출력 방법

if(!$result || !$result2 || !$result3 || !$result4) {
    echo "<script> alert('delete - error message') </script>";
}//계속 값을 auto_increment와 result로 최신화 시키는 것은 중간 값이 사라지면그부분을 num으로 연결시켜야 하기 때문

mysql_close();

?>

<script>
    location.replace('../index.php');
</script>
```