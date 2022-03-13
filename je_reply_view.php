<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$no = $_GET['no'];
$db = new PDO("mysql:host=localhost;dbname=je",'root','whwpdms');
$sql = 'SELECT * FROM board1 WHERE no = ?';
$result = $db->prepare($sql);
$result->execute(array($no));
$tmp = $result->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 댓글</title>
</head>
<body>
    <table border=1>
        <form id="board" name="je_reply_server" action="je_reply_server.php" method="post">
            <tr>
                <td>제목</td>
                <td><?php echo $tmp['utitle']?></td>
            </tr>
            <tr>
                <td>작성자</td>
                <td><?php echo $tmp['naming']?></td>
            </tr>
            <tr>
                <td>이름</td>
                <td><?php echo $tmp['uname']?></td>
            </tr>
            <tr>
                <td>내용</td>
                <td><?php echo $tmp['ucontent']?></td>
            </tr>
        </form>
    </table>
    <?php 
    $sql2 = 'SELECT * FROM test_reply WHERE boardNo = ? ORDER BY originNo DESC, groupOrd ASC';
    $result2 = $db->prepare($sql2);
    $result2->execute(array($no));
    foreach ($result2->fetchAll(PDO::FETCH_ASSOC) as $tmp2){
    ?>
    <table>
        <tr>
            <td>--------------------</td>
        </tr>
        <tr>
            <td>replyNo</td>
            <td><?php echo $tmp2['replyNo']?></td>
        </tr>
        <tr>
            <td>깊이</td>
            <td><?php echo $tmp2['depth']?></td>
        </tr>
        <tr>
            <td>작성자</td>
            <td><?php echo $tmp2['rewriter']?></td>
        </tr>
        <tr>
            <td>댓글</td>
            <td><?php echo $tmp2['recontent']?></td>
        </tr>
        <tr>
            <td>날짜</td>
            <td><?php echo $tmp2['redate']?></td>
        </tr>
    <?php } ?>
    </table>
    <p>&nbsp;</p>
    <div>
        <form id="reply" name="re_reply_server.php" action="je_reply_server.php" method="post">
            <input type="hidden" name = "boardNo" value="<?=$tmp['no']?>">
            작성자:<input type = "text" name="rewriter" size="20" maxlength="20"><br>
            <textarea name="recontent" id="recontent" cols="30" rows="10" placeholder="댓글을 달아주세요."></textarea>
            <button type="submit">댓글달기</button>
        </form>
    </div>
</body>
</html>