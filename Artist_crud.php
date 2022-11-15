<!doctype html>

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

<?php
include_once('inc_nav.php');
include_once('connection.php');

if (class_exists('Connection')) {
  try {
    $database = new Connection();
  } catch (Exception $e) {
    echo "Connection failed because: " . $e->getMessage();
  }
}
$db = $database->open();

$artist = $_POST["InputArtist"];
$lifespan = $_POST["InputLifespan"];
$thumbnail = $_POST["InputThumbnail"];
$portrait = $_POST["InputPortrait"];

$targetDir = "uploads/";

$fileName = basename($_FILES["InputThumbnail"]["name"]);
$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image1 = $_FILES['InputThumbnail']['tmp_name']; 
            $imgContent1 = addslashes(file_get_contents($image1)); 
        }

$fileName2 = basename($_FILES["InputPortrait"]["name"]);  
$fileType2 = pathinfo($fileName2, PATHINFO_EXTENSION);
$targetFilePath = $targetDir . $fileName;
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType2, $allowTypes)){ 
            $image2 = $_FILES['InputPortrait']['tmp_name']; 
            $imgContent2 = addslashes(file_get_contents($image2)); 
        }


if (isset($_POST["buttonAdd"])) {
  try {
    if (!empty($_POST["InputArtist"]) || !empty($_POST["InputLifespan"]) || !empty($_POST["InputThumbnail"]) || !empty($_POST["InputPortrait"])) {
  	  $sql = "INSERT INTO Artist_Data (Artist, Lifespan, Thumbnail, Portrait) VALUES ('$artist', '$lifespan', '$imgContent1', '$imgContent2')";
   	  $result = $db->query($sql);
      echo "Artist added successfully.";
    } else{
      echo "Please ensure all fields are filled out.";
    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

} else if (isset($_POST["buttonEdit"])) {
  try {
    if (!empty($_POST["InputArtist"])) {
      $sql = "UPDATE Artist_Data SET Lifespan='$lifespan', Thumbnail='$imgContent1', Portrait='$imgContent2' WHERE Artist='$artist'";
      $result = $db->query($sql);
    echo "Artist edited successfully.";
    } else {
      echo 'please fill out all fields';
    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

} else if (isset($_POST["buttonDelete"])) {
  try {
    $sql = "DELETE FROM Artist_Data WHERE Artist = '$artist'";
    $result = $db->query($sql);
  echo "Artist deleted successfully.";
  
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

$database->close();

?>

</html>