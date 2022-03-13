<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$db = new PDO("mysql:host=localhost;dbname=je",'root','whwpdms');

$boardNo = $_POST['boardNo'];
$rewriter = $_POST['rewriter'];
$recontent = $_POST['recontent'];

$sql = 'SELECT MAX(replyNo) AS replyNo FROM test_reply WHERE boardNo = ?';
$result = $db->prepare($sql);
$result->execute(array($boardNo));
$tmp = $result->fetch(PDO::FETCH_ASSOC);
$originNo = $tmp['replyNo'];
$originNo = $originNo + 1;
$redate = date('Y-m-d H:i:s');

$groupOrd = 0;
$depth = 0;

$sql2 = 'INSERT INTO test_reply (boardNo, originNo, groupOrd, depth, rewriter, recontent, redate) VALUES (?,?,?,?,?,?,?)';
$result2 = $db->prepare($sql2);
$result2->execute(array($boardNo, $originNo, $groupOrd, $depth, $rewriter, $recontent, $redate));
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <div>
            <button onclick="location.href='je_reply_view.php?no=<?=$boardNo?>'">게시글로</button>
        </div>
    </body>
</html>