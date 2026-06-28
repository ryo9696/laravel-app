<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            学生編集
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>・{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('student.update', $student->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-semibold">
                            名前
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $student->name) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">
                            年齢
                        </label>

                        <input
                            type="number"
                            name="age"
                            value="{{ old('age', $student->age) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">
                            メールアドレス
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $student->email) }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="flex gap-3">

                        <button
                            type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded">
                            更新
                        </button>

                        <a
                            href="{{ route('student.list') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded">
                            戻る
                        </a>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>