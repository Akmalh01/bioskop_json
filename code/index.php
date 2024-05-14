<?php
$getfile = file_get_contents('tes.json');
$jsonfile = json_decode($getfile, true); // Tambahkan parameter true untuk mendapatkan array asosiatif

// Mengecek apakah JSON berhasil di-decode atau tidak
if ($jsonfile === null) {
    die("Gagal membaca file JSON.");
}

$films = $jsonfile['records']; // Mengakses array records dari file JSON
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bioskop</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/output.css">
</head>

<body>
    <nav class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Icon when menu is closed. -->
                        <!--
                          Heroicon name: menu

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                        <!-- Icon when menu is open. -->
                        <!--
                          Heroicon name: x

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="#" class="navbar-brand text-gray-900">XXI</a>
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="home.php" class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        </div>

                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="login.php" class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Admin</a>
                        </div>

                    </div>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <form class="flex items-center">
                        <input type="text" class="block w-full py-2 px-3 border border-gray-300 rounded-l-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:placeholder-gray-400 sm:text-sm" placeholder="Search" id="searchInput" aria-label="Search">
                        <button type="button" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-r-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="searchData()">Search</button>
                        <button type="button" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-md ml-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" onclick="resetSearch()" id="resetButton" style="display: none;">Reset</button>

                    </form>
                </div>

            </div>
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="text-gray-900 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
            </div>
        </div>
    </nav>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-full lg:px-8">
            <div class="flex justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Daftar Film Yang Tersedia</h2>
                <div class="mb-3">
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <?php foreach ($films as $film) : ?>
    <!-- Film -->
    <div class="group relative">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
            <img src="uploads/<?= $film['gambar'] ?>" alt="<?= $film['nfilm'] ?>" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="mt-4 flex justify-between">
            <div>
                <h3 class="text-sm text-gray-700"><?= $film['nfilm'] ?></h3>
                <p class="mt-1 text-sm text-gray-500">Durasi: <?= $film['dfilm'] ?> menit</p>
                <p class="mt-1 text-sm text-gray-500">Jam Tayang: <?= $film['jtfilm'] ?></p>
                <p class="mt-1 text-sm text-gray-500">Genre: <?= $film['genre'] ?></p>
            </div>
            <div>
                <!-- Tombol untuk memesan tiket -->
                <form action="pesan.php" method="post">
                    <input type="hidden" name="film_id" value="<?= $film['id'] ?>"> <!-- Sesuaikan dengan id film -->
                    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Pesan Tiket
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

            </div>

        </div>
    </div>

    <!-- <script src="script.js"></script> -->
    <script>
        // Global variable to store original films data
        let originalFilms = <?= json_encode($films) ?>;

        function searchData() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const filteredFilms = originalFilms.filter(film => film.nfilm.toLowerCase().includes(searchTerm));
            displayFilms(filteredFilms);
            showResetButton();
        }

        function resetSearch() {
            document.getElementById('searchInput').value = '';
            displayFilms(originalFilms);
            hideResetButton();
        }

        function displayFilms(films) {
            const filmContainer = document.querySelector('.grid.grid-cols-1');
            filmContainer.innerHTML = '';
            films.forEach(film => {
                const filmElement = `
            <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                    <img src="uploads/${film.gambar}" alt="${film.nfilm}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div class="mt-2 flex justify-center">
                        <h3 class="text-lg font-bold text-gray-800">${film.nfilm}</h3>
                    </div>
                </div>
            </div>
        `;
                filmContainer.innerHTML += filmElement;
            });
        }

        function showResetButton() {
            document.getElementById('resetButton').style.display = 'inline-block';
        }

        function hideResetButton() {
            document.getElementById('resetButton').style.display = 'none';
        }

        // Initial display of films on page load
        displayFilms(originalFilms);
    </script>

</body>

</html>