<?php
$getfile = file_get_contents('tes.json');
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ilmu-detil.blogspot.com">
    <title>Bioskop</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" id="searchInput" aria-label="Search">
                    <button class="btn btn-outline-success" type="button" onclick="searchData()">Search</button>
                    <button class="btn btn-outline-secondary" type="button" onclick="resetSearch()" id="resetButton" style="display: none;">Reset</button>
                </form>
            </div>
        </div>
    </nav>
    </br></br></br></br>
    <div class="container">
        <div class="jumbotron">
            <h3>Jadwal Tayang Film</h3>
            <p>Cek jadwal film yang akan tayang pada hari ini</p>
        </div>
    </div>
    <div class="container">
        <div class="btn-toolbar">
            <a class="btn btn-primary" href="insert.php"><i class="icon-plus"></i> Insert Data</a>
            <div class="btn-group"> </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Nama Film</th>
                        <th>Durasi Film</th>
                        <th>Jadwal Tayang</th>
                        <th>Genre</th>
                        <th>Gambar</th> <!-- Kolom untuk menampilkan gambar -->
                        <th>Action</th>
                    </tr>
                    <?php $no = 0;
                    foreach ($jsonfile->records as $index => $obj) : $no++;  ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $obj->nfilm; ?></td>
                            <td><?php echo $obj->dfilm; ?> Menit</td>
                            <td><?php echo $obj->jtfilm; ?> WIB</td>
                            <td><?php echo $obj->genre; ?></td>
                            <td><img src="uploads/<?php echo $obj->gambar; ?>" alt="<?php echo $obj->nfilm; ?>" style="width:100px;"></td> <!-- Tampilkan gambar -->
                            <td>
                                <a class="btn btn-xs btn-primary" href="update.php?id=<?php echo $index; ?>">Edit</a>
                                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $index; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <div id="searchResults"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

</body>

</html>
