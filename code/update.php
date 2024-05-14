<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('tes.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('tes.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    $post["nfilm"] = isset($_POST["nfilm"]) ? $_POST["nfilm"] : "";
    $post["dfilm"] = isset($_POST["dfilm"]) ? $_POST["dfilm"] : "";
    $post["jtfilm"] = isset($_POST["jtfilm"]) ? $_POST["jtfilm"] : "";
    $post["genre"] = isset($_POST["genre"]) ? $_POST["genre"] : "";

    if ($jsonfile) {
        unset($all["records"][$id]);
        $all["records"][$id] = $post;
        $all["records"] = array_values($all["records"]);
        file_put_contents("tes.json", json_encode($all));
    }
    header("Location:crud.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="tutorial-boostrap-merubaha-warna">
 <meta name="author" content="ilmu-detil.blogspot.com">
 <title>Update</title>
 <link rel="stylesheet" href="style.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
 <style type="text/css">
 .navbar-default {
  background-color: #3b5998;
  font-size:18px;
  color:#ffffff;
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- /.navbar -->

<div class="container">
    <div class="row">
        <div class="row">
        <h3 class="center">Update a Film</h3>
</div>
<?php if (isset($_GET["id"])): ?>
<form method="POST" action="update.php" enctype="multipart/form-data" class="mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id" />

            <div class="mb-3">
                <label for="inputFName" class="form-label">Nama Film</label>
                <input type="text" class="form-control" required="required" id="inputFName" value="<?php echo $jsonfile["nfilm"]; ?>" name="nfilm">
            </div>

            <div class="mb-3">
                <label for="inputLName" class="form-label">Durasi Film</label>
                <input type="text" class="form-control" required="required" id="inputLName" value="<?php echo $jsonfile["dfilm"]; ?>" name="dfilm">
            </div>

            <div class="mb-3">
                <label for="inputAge" class="form-label">Jadwal Tayang</label>
                <input type="time" required="required" class="form-control" id="inputAge" value="<?php echo $jsonfile["jtfilm"]; ?>" name="jtfilm">
            </div>

            <div class="mb-3">
                <label for="inputGenre" class="form-label">Genre</label>
                <select class="form-select" required="required" id="inputGenre" name="genre">
                    <option>Please Select</option>
                    <?php
                    $genres = [
                        "Drama", "Comedy", "Horror", "Adventure", "Action",
                        "Animation", "Documentary", "Family", "Friendship",
                        "Romantic", "Fantasy", "Science Fiction", "Thriller",
                        "Mystery", "Biography", "Musical", "Noir"
                    ];
                    foreach ($genres as $genre) {
                        $selected = ($jsonfile["genre"] == $genre) ? "selected" : "";
                        echo "<option value='$genre' $selected>$genre</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-secondary" href="crud.php">Back</a>
            </div>
        </div>
    </div>
</form>
<?php endif; ?>

    </div> 
</div> 
<script>
</script>
</body>
</html> 