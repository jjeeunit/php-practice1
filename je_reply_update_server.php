<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$rewriter = $_POST['rewriter'];
$recontent = $_POST['recontent'];
$replyNo = $_POST['replyNo'];
$boardNo = $_POST['boardNo'];

$db = new PDO("mysql:host=localhost;dbname=je",'root','whwpdms');
$sql = 'UPDATE test_reply SET rewriter = ?, recontent = ? WHERE replyNo =?'; 
$result = $db->prepare($sql);
$result->execute(array($rewriter, $recontent, $replyNo));
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