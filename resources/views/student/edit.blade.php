<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>学生編集</title>
</head>

<body>

<h1>学生編集</h1>

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li style="color:red">{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="/student/{{ $student->id }}" method="POST">

    @csrf

    @method('PUT')

    <p>
        名前<br>
        <input
            type="text"
            name="name"
            value="{{ old('name', $student->name) }}">
    </p>

    <p>
        年齢<br>
        <input
            type="number"
            name="age"
            value="{{ old('age', $student->age) }}">
    </p>

    <p>
        メール<br>
        <input
            type="email"
            name="email"
            value="{{ old('email', $student->email) }}">
    </p>

    <button type="submit">

        更新

    </button>

</form>

</body>

</html>