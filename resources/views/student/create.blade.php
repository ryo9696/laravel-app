<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>学生登録</title>
</head>

<body>

<h1>学生登録</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/student/store" method="POST">

    @csrf

    <p>
        名前<br>
        <input type="text" name="name" value="{{ old('name') }}">
    </p>

    <p>
        年齢<br>
        <input type="number" name="age" value="{{ old('age') }}">
    </p>

    <p>
        メール<br>
        <input type="email" name="email" value="{{ old('email') }}">
    </p>

    <button type="submit">
        登録
    </button>

</form>

</body>

</html>