<!doctype html>
<html lang="en">
<!-- Name: Kristiin Tribbeck
     ID: 30045325
     Description: creation of a multi-page client-server website for a local art gallery called Acme Arts.
-->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Optimize code for mobile devices first and then scale up components as necessary using CSS media queries. -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Paintings | Assessment Three</title>
    <!-- Linking HTML to CSS -->
    <link rel="stylesheet" href="assessment_3.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Grey with black text-->
    <?php
    include_once('inc_nav.php');
    ?>
    <!-- START PHP -->
    <?php
    session_start();
    if (isset($_SESSION['message'])) {
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
        <!--Testing Search bar Start -->
        <form class="d-flex mt-3" role="search" action="all-paintings.php" method="GET">
            <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
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
            <?php
            $search = $_GET['search'];
            include_once('connection.php');
            $database = new Connection();
            $db = $database->open();
            try {
                $sql = "SELECT Id, Title, Year_Painted, Media, Artist, Style, Painting FROM Painting_Data WHERE Title LIKE '%$search%'";
                $row = $db->query($sql);
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
            } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
            }
            $database->close();
            ?>
            </tbody>
        </table>
    </div>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>