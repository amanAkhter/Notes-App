<?php
include "./database.php";

if (isset($_POST["submit"])) {
    if(!isset($_POST["hiddenName"])){

        $title = $_POST["title"];
        $noteBody = $_POST["noteBody"];

        $sql = "INSERT INTO `notes-app-table`(`Title`, `Note`) VALUES ('$title', '$noteBody')";

        $res = mysqli_query($con, $sql);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notes-App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyNotes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <form class="border border-success p-2 mb-2 border-opacity-25 my-4 rounded-4 px-4 py-3" method="POST">
            <div class="mb-3 my-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter the title of your note" name="title">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea type="text" class="form-control" id="body" style="height: 150px;" placeholder="Enter the body of your note" name="noteBody"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <div class="container d-grid">
        <div class="row m-4">
            <h1 class="text-center fw-bold">Your Notes</h1>

            <?php
            include './edit_note.php';

            $sql = "SELECT * FROM `notes-app-table`";
            $res = mysqli_query($con, $sql);

            $notesZero = true;

            while ($fetch = mysqli_fetch_assoc($res)) {
                $notesZero = false;
                echo '<div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">' . $fetch["Title"] . '</h5>
                        <p class="card-text text-muted">' . $fetch["Note"] . '</p>
                        <a class="btn btn-primary editBtn" data-bs-toggle="modal" id ="'. $fetch["Sr No."] .' " data-bs-target="#exampleModal">Edit</a>
                        <a href="./delete.php?id=' . $fetch["Sr No."] . '" class="btn btn-danger">Delete</a>
                    </div>
                </div>';
            }

            if ($notesZero) {
                echo '<div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">No Notes Available</h5>
                        
                        
                        
                    </div>
                </div>';
            }
            ?>

        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="index.js"></script>
</body>
</html>