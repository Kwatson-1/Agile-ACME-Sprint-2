<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Optimize code for mobile devices first and then scale up components as necessary using CSS media queries. -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Linking HTML to CSS -->
    <link rel="stylesheet" href="assessment_3.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="crudfunctions.js"></script>
    <title>Home | Assessment Three</title>
</head>

<body>
    <?php
    include_once('inc_nav.php');
    ?>

    <div class="container-fluid" id="containerStyle">
        <div class="p-3 my-3 border border-info rounded">
            <h2>Update Painting Database</h2>
           <!-- <form action="create.php" method="POST">    COMMENT: use multipart/form-data when your form includes any <input type="file"> elements-->
            <form action="create.php" method="POST" enctype="multipart/form-data">
			        <div class="form-group">
                        <label for="InputID">ID</label>
                        <input type="number" class="form-control" name="ID" placeholder="Enter the painting ID:">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="InputTitle">Title</label>
                        <input type="text" class="form-control" name="InputTitle" placeholder="Enter the painting name:">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="InputPainting">Painting</label>
                        <input type="file" class="form-control"name="InputPainting" placeholder="Enter the binary data for the image:">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="InputYearPainted">Year Painted</label>
                        <input type="number" class="form-control" name="InputYearPainted" placeholder="Enter the year the painting was painted:">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="InputMedia">Media Type</label>
                        <input type="text" class="form-control" name="InputMedia" placeholder="Enter the media type of the painting:">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="InputArtist">Artist Name</label>
                        <input type="text" class="form-control" name="InputArtist" placeholder="Enter the artist name of the painting:">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="InputStyle">Painting Style</label>
                        <input type="text" class="form-control" name="InputStyle" placeholder="Enter the style of the painting:">
                        <br>
                    </div>
                    <div>
                    <input type="submit" value="Add" name="buttonAdd" class="btn btn-success">
					<input type="submit" value="Edit"name="buttonEdit" class="btn btn-success">
					<input type="submit" value="Delete"name="buttonDelete" class="btn btn-success">
                    <br>
                    </div>
                </form>
        </div>
    </div>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>