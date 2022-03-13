<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>댓글</th>
            <th>NO</th>
            <th>제목</th>
            <th>작성자</th>
            <th>이름</th>
            <th>내용</th>
        </tr>
<?php
$db = new PDO("mysql:host=localhost;dbname=je", 'root', 'whwpdms');
$sql = 'SELECT * FROM board1';
$result = $db->prepare($sql);
$result->execute(array());
    foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $tmp){ ?>
        <tr>
            <td><a href="je_reply_view.php?no=<?=$tmp['no']?>">댓글</a></td>
            <td><?php echo $tmp['no']?></td>
            <td><?php echo $tmp['utitle']?></td>
            <td><?php echo $tmp['naming']?></td>
            <td><?php echo $tmp['uname']?></td>
            <td><?php echo $tmp['ucontent']?></td>
        </tr>
<?php } ?>
    </table>
</body>
</html>