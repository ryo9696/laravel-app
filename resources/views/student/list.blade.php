<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>学生一覧</title>
</head>

<body>

<h1>学生一覧</h1>

<p>
    <a href="/student/create">
        学生を登録する
    </a>
</p>

<table border="1">

    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>年齢</th>
        <th>メールアドレス</th>
        <th>操作</th>
    </tr>

    @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->age }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <a href="/student/{{ $student->id }}/edit">
                    編集
                </a>
                <form
                    action="/student/{{ $student->id }}"
                    method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        onclick="return confirm('本当に削除しますか？')">
                        削除
                    </button>
                </form>
            </td>
        </tr>
    @endforeach

</table>

</body>

</html>