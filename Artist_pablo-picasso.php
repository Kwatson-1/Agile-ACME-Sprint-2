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
      /* test below file to check if footer works. 
      include_once('footer.php'); */
    ?>
    <!--PHP START-->
 <?php 
 session_start();
 if(isset($_SESSION['message'])){
     ?>
     <div class="alert alert-info text-center" style="margin-top:20px;">
         <?php echo $_SESSION['message']; ?>
     </div>
     <?php

     unset($_SESSION['message']);
 }
?>
<!--FINISH PHP-->

    <!--Start of table.-->
    <div class="container-fluid" id="containerStyle">
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
             $sql = "SELECT Id, Title, Year_Painted, Media, Artist, Style, Painting FROM Painting_Data WHERE Artist = 'Pablo Picasso'";
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
    <!-- <footer>
        <div class="row">
            <div class="col-md-6 ms-2">
                <p>Copyright &copy; Kristiin Tribbeck </p>
            </div>
        </div>
    </footer> -->
    <?php
    include_once('footer.php');
    ?>
    <!--FOOTER END -->
</body>

</html>