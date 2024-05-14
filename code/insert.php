<?php
if (!empty($_POST)) {
    // Proses file gambar yang diunggah
    $gambar = $_FILES['gambar']['name'];
    $gambar_temp = $_FILES['gambar']['tmp_name'];
    $gambar_path = 'uploads/' . $gambar; // Tentukan path penyimpanan gambar
    
    // Pindahkan file yang diunggah ke lokasi penyimpanan yang ditentukan
    move_uploaded_file($gambar_temp, $gambar_path);
    
    // Menyiapkan data untuk disimpan dalam file JSON
    $new_entry = [
        "nfilm" => $_POST['nfilm'],
        "dfilm" => $_POST['dfilm'],
        "jtfilm" => $_POST['jtfilm'],
        "genre" => $_POST['genre'],
        "gambar" => $gambar // Menambahkan nama file gambar ke dalam data
    ];

    // Baca file JSON
    $file = file_get_contents('tes.json');
    $data = json_decode($file, true);

    // Tambahkan data baru ke dalam array records
    $data["records"][] = $new_entry;

    // Simpan kembali data ke dalam file JSON
    file_put_contents("tes.json", json_encode($data));

    // Redirect ke halaman utama
    header("Location: crud.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tutorial-boostrap-merubaha-warna">
    <meta name="author" content="ilmu-detil.blogspot.com">
    <title>Create</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
        .navbar-default {
            background-color: #3b5998;
            font-size: 18px;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">XXI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="crud.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /.navbar -->
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
                <h3>Create a Film</h3>
                <form method="POST" action="" class="mt-5 mb-5" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="inputFName" class="form-label">Nama Film</label>
                        <input type="text" class="form-control" required="required" id="inputFName" name="nfilm" placeholder="Nama Film">
                        <span class="help-block"></span>
                    </div>

                    <div class="mb-3">
                        <label for="inputGambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="inputGambar" name="gambar">
                        <span class="help-block"></span>
                    </div>


                    <div class="mb-3">
                        <label for="inputDurasi" class="form-label">Durasi Film</label>
                        <input type="text" class="form-control" required="required" id="inputLDurasi" name="dfilm" placeholder="Durasi Film">
                        <span class="help-block"></span>
                    </div>

                    <div class="mb-3">
                        <label for="inputAge" class="form-label">Jadwal Tayang</label>
                        <input type="time" required="required" class="form-control" id="inputTime" name="jtfilm" placeholder="Jadwal Tayang">
                        <span class="help-block"></span>
                    </div>

                    <div class="mb-3">
                        <label for="inputGenre" class="form-label">Genre</label>
                        <select class="form-select" required="required" id="inputGenre" name="genre">
                            <option>Please Select</option>
                            <option value="Drama">Drama</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Horror">Horror</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Action">Action</option>
                            <option value="Animation">Animation</option>
                            <option value="Documentary">Documentary</option>
                            <option value="Family">Family</option>
                            <option value="Friendship">Friendship</option>
                            <option value="Romantic">Romantic</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Science Fiction">Science Fiction</option>
                            <option value="Thriller">Thriller</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Biography">Biography</option>
                            <option value="Musical">Musical</option>
                            <option value="Noir">Noir</option>
                        </select>
                        <span class="help-block"></span>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Create</button>
                        <a class="btn btn btn-default" href="crud.php">Back</a>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>

</html>