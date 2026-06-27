<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>学生一覧</title>
</head>

<body>

<h1>学生一覧</h1>

<table border="1">

    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>年齢</th>
        <th>メールアドレス</th>
    </tr>

    @foreach ($students as $student)

        <tr>

            <td>{{ $student->id }}</td>

            <td>{{ $student->name }}</td>

            <td>{{ $student->age }}</td>

            <td>{{ $student->email }}</td>

        </tr>

    @endforeach

</table>

</body>

</html>