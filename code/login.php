<?php

// Fungsi untuk memeriksa login
function checkLogin($username, $password) {
    // Baca data admin dari file JSON
    $admins = json_decode(file_get_contents('admin.json'), true);

    // Loop melalui data admin
    foreach ($admins as $admin) {
        // Memeriksa apakah username dan password cocok
        if ($admin['username'] === $username && $admin['password'] === $password) {
            return true; // Login berhasil
        }
    }

    return false; // Login gagal
}

// Proses login jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memeriksa login
    if (checkLogin($username, $password)) {
        // Jika login berhasil, arahkan ke halaman crud.php
        header("Location: crud.php");
        exit; // Pastikan untuk keluar dari skrip setelah mengarahkan
    } else {
        echo "Login gagal. Silakan coba lagi.";
        // Tampilkan pesan kesalahan atau form login kembali
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<div class="flex min-h-full flex-col justify-center px-6 lg:px-8 items-center w-full h-screen">
        <label class="text-center">
            <h1 class="font-bold text-2xl">Login to Admin Panel</h1>
        </label>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" autocomplete="current-username" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit" name="login" value="login" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>