<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 등록</title>
</head>
<body>
    <table border=1 align=center>
        <form action="je_write_server.php" method="post">
            <tr>
                <td>제목</td>
                <td><input type="text" name="utitle"></td>
            </tr>
            <tr>
                <td>작성자</td>
                <td><input type="text" name="naming"></td>
            </tr>
            <tr>
                <td>이름</td>
                <td><input type="text" name="uname"></td>
            </tr>
            <tr>
                <td>내용</td>
                <td><input type="text" name="ucontent"></td>
            </tr>
            <tr>
                <td><input type="submit" value="등록"><input type="reset" value="취소"></td>
            </tr>
        </form>
    </table>
</body>
</html>