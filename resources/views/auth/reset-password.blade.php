<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex justify-center items-center">
    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-xl font-bold text-indigo-700 text-center mb-4">Atur Ulang Kata Sandi</h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-4">
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" required
                       class="w-full border rounded p-2" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Password Baru</label>
                <input type="password" name="password" required
                       class="w-full border rounded p-2" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                       class="w-full border rounded p-2" />
            </div>

            <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
                Reset Password
            </button>
        </form>

    </div>
</div>

</body>
</html>
