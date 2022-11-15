<!doctype html>
<html lang="en">
<head>
<?php
	include_once('head.php');
?>
</head>
<body>
    <!-- Grey with black text-->
    <?php
	  include_once('inc_nav.php');
    ?>
  <!-- START PHP -->
 <?php 
    if(isset($_SESSION['message'])){
        ?>
     <div class="alert alert-info text-center" style="margin-top:20px;">
         <?php echo $_SESSION['message']; ?>
     </div>
     <?php

     unset($_SESSION['message']);
 }
?>
<!-- FINISH PHP-->

  <!--Start of table.-->
  <div class="container-fluid" id="containerStyle">
      <!--Testing Search bar Start, Added action attribte for CrudTest....1) Original File name="InsertValuesTest.php, -->
  <form class="d-flex mt-3" role="search" action="searchPaintings.php" action="addValues.php" method="GET">
        <input class="form-control me-2" type="text" name="search" name="submit" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
<!--Search Bar Finish -->
    <table class="table table-hover" style="margin-top:20px;">
      <thead class="table-secondary">
		<th>ID</th>
        <th>Title</th>
        <th>Year</th>
        <th>Media</th>
        <th>Artist</th>
        <th>Style</th>
        <th>Thumbnail</th>
      </thead>
      <tbody>
        <!--PHP START-->
     <?php
         //include our connection
         include_once('connection.php');

         $database = new Connection();
         $db = $database->open();
         try{	
             $sql = 'SELECT Id, Title, Year_Painted, Media, Artist, Style, Painting FROM Painting_Data';
             foreach ($db->query($sql) as $row) {
                 ?>
                 <tr>
					 <td><?php echo $row['Id']; ?></td>
                     <td><?php echo $row['Title']; ?></td>
                     <td><?php echo $row['Year_Painted']; ?></td>
                     <td><?php echo $row['Media']; ?></td>
                     <td><?php echo $row['Artist']; ?></td>
                     <td><?php echo $row['Style']; ?></td>
                     <td><?php echo '<img class="thumb" src="data:image/png;base64,'.base64_encode($row['Painting']).'"/>'; ?></td>
                 </tr>
                 <?php 
             }
         }
         catch(PDOException $e){
             echo "There is some problem in connection: " . $e->getMessage();
         }
         //close connection
         $database->close();
     ?>
    <!--FINISH PHP-->
      </tbody>
    </table>
  </div>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>