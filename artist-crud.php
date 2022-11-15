<?php
require_once("connection.php");
require_once("generateThumbnail.php");
// Initialise variables
$artist = $lifespan = $thumbnail = $portrait = "";
$artist_err = $lifespan_err = $portrait_err = $database_err = $success_msg = "";
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate artist name
    $input_artist = trim($_POST["InputArtist"]);
    if (empty($input_artist)) {
        $artist_err = "Please enter a name";
    } else {
        $artist = $input_artist;
    }
    // Validate lifespan
    $input_lifespan = trim($_POST["InputLifeSpan"]);
    if (empty($input_lifespan)) {
        $lifespan_err = "Please enter a lifespan";
    } else {
        $lifespan = $input_lifespan;
    }
    // Check if file was uploaded without errors
    if(isset($_FILES["InputPortrait"]) && $_FILES["InputPortrait"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["InputPortrait"]["name"];
        $filetype = $_FILES["InputPortrait"]["type"];
        $filesize = $_FILES["InputPortrait"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) 
            $portrait_err = ("Error: Please select a valid file format.");
    
        // Verify file size - 16MB maximum
        $maxsize = 16777215;
        if($filesize > $maxsize)
            $portrait_err = ("Error: File size is larger than the allowed limit.");
    
        // Verify MIME type of the file
        if(in_array($filetype, $allowed)){
            $uploaded_file = $_FILES["InputPortrait"]["tmp_name"];
            $portrait = file_get_contents($uploaded_file);
        } else{
            $portrait_err = "Error: There was a problem uploading your file. Please try again."; 
        }
        // Create portrait thumbnail
        list($width, $height, $type) = getimagesize($portrait);
        $input_portrait = load_portrait($portrait, $type);
        $output_thumbnail = resize_image(100, $input_portrait, $width, $height);
    	ob_start();
        imagepng($output_thumbnail);
    	$thumbnail = ob_get_contents();
    	ob_end_clean();
    } else{
        $portrait_err = "Error: " . $_FILES["InputPortrait"]["error"];
    }

    $database = new Connection();
	$db = $database->open();
    if (empty($artist_err) && empty($lifespan_err) && empty($portrait_err)) {
    	try {
        	$details[] = [
            	'Artist' => $artist,
            	'Lifespan' => $lifespan,
            	'Thumbnail' => $thumbnail,
            	'Portrait' => $portrait
        	];
        	$sql = "INSERT INTO Artist_Data(Artist, Lifespan, Thumbnail, Portrait)
        	VALUES(:Artist, :Lifespan, :Thumbnail, :Portrait)";
        	foreach ($details as $details) {
            	$stmt = $db->prepare($sql);
            	$stmt->execute($details);
        	}
        	$success_msg = "Artist successfully added to the database";
        } catch (PDOException $e) {
        	$database_err = $e->getMessage();
        }
    }
    $database->close();
}
?>
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
    <title>Artist CRUD | Assessment Three</title>
</head>

<body>
    <?php
    include_once('inc_nav.php');
    ?>

    <div class="container-fluid" id="containerStyle">
        <div class="p-3 my-3 border border-info rounded">
            <h2>Update Artist Database</h2>
           <!-- <form action="create.php" method="POST">    COMMENT: use multipart/form-data when your form includes any <input type="file"> elements-->
        	<?php
                if(!empty($database_err)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $database_err; ?>
                    </div>
                    <?php
                } elseif (!empty($success_msg)){
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success_msg; ?>
                    </div>
                    <?php
                }
            ?>
        	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
			    <div class="form-group">
                    <label for="InputArtist">Artist Name</label>
                    <input type="text" class="form-control <?php echo (!empty($artist_err)) ? 'is-invalid' : ''; ?>" name="InputArtist" placeholder="Enter the artist's name:">
                    <span class="invalid-feedback"><?php echo $artist_err;?></span>
                    <br>
                </div>
                <div class="form-group">
                    <label for="InputLifeSpan">Lifespan</label>
                    <input type="text" class="form-control <?php echo (!empty($lifespan_err)) ? 'is-invalid' : ''; ?>" name="InputLifeSpan" placeholder="Enter the artist lifespan:">
                    <span class="invalid-feedback"><?php echo $lifespan_err;?></span>
                    <br>
                </div>
                <div class="form-group">
                    <label for="InputPortrait">Portrait</label>
                    <input type="file" class="form-control <?php echo (!empty($portrait_err)) ? 'is-invalid' : ''; ?>" name="InputPortrait" placeholder="Portrait of the artist:">
                    <span class="invalid-feedback"><?php echo $portrait_err;?></span>
                    <br>
                </div>
                <div>
                <input type="submit" value="Add" name="buttonAdd" class="btn btn-success">
				<!--<input type="submit" value="Edit"name="buttonEdit" class="btn btn-success">
				<input type="submit" value="Delete"name="buttonDelete" class="btn btn-success">-->
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