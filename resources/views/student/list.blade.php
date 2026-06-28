<x-app-layout>

    <x-slot name="header">
        <div class="mb-4">
            <p>
                ようこそ、
                <strong>{{ Auth::user()->name }}</strong>
                さん
            </p>

            <p class="text-sm text-gray-500">
                {{ Auth::user()->email }}
            </p>
        </div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            学生一覧
        </h2>
        @if (session('success'))
            <div style="color: green; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <p class="mb-4">
                    <a href="{{ route('student.create') }}">
                        学生を登録する
                    </a>
                </p>

                <table border="1" cellpadding="5">

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

                                <a href="{{ route('student.edit', $student->id) }}">
                                    編集
                                </a>

                                <form
                                    action="{{ route('student.destroy', $student->id) }}"
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

            </div>

        </div>

    </div>

</x-app-layout>