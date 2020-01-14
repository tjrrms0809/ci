<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Board</title>
</head>
<body>
    <h2>게시판</h2>

    <table>
        <thead>
            <tr>
                <th>num</th>
                <th>name</th>
                <th>message</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row ): ?>
                <tr>
                    <td><?= $row['num'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['msg'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <form action="http://localhost/ci/Intro/insertBoard" method="post">
        <input type="text" name="name">
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body>
</html>