<?php
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );

 $db = new PDO("mysql:host=localhost;dbname=je", 'root', 'whwpdms');
 $utitle = $_POST['utitle'];
 $naming = $_POST['naming'];
 $uname = $_POST['uname'];
 $ucontent = $_POST['ucontent'];
 
 $sql = 'INSERT INTO board1 (utitle, naming, uname, ucontent) VALUES (?,?,?,?)';
 $result = $db->prepare($sql);
 $result->execute(array($utitle, $naming, $uname, $ucontent));
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <div>
            <button onclick="location.href='je_write_view.php'">목록으로</button>
        </div>
    </body>
</html>