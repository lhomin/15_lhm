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
