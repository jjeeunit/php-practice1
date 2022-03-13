<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$replyNo = $_GET['replyNo'];

$db = new PDO("mysql:host=localhost;dbname=je",'root','whwpdms');
$sql2 = 'SELECT * FROM test_reply WHERE replyNo = ?';
$result2 = $db->prepare($sql2);
$result2->execute(array($replyNo));
$tmp2 = $result2->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>댓글 수정</title>
</head>
<body>
    <h1>댓글 수정</h1>
    <div>
        <form name="je_reply_update_server" action="je_reply_update_server.php" method="post">
            <input type="hidden" name = "replyNo" value="<?=$tmp2['replyNo']?>">
            <input type="hidden" name = "boardNo" value="<?=$tmp2['boardNo']?>">
            <div>
                <textarea name="rewriter" id="rewriter" cols="30" rows="10" placeholder="작성자"><?php echo $tmp2['rewriter']?></textarea><br>
                <textarea name="recontent" id="recontent" cols="30" rows="10" placeholder="내용"><?php echo $tmp2['recontent']?></textarea><br>
                <button type="submit">수정</button>
            </div>
        </form>
    </div>
</body>
</html>
