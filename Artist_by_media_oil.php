<!doctype html>
<html lang="en">

<head>
    <?php
    include_once('head.php');
    ?>
</head>

<body>
    <?php
    include_once('inc_nav.php');

    ?>
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
    <div class="container-fluid" id="containerStyle">
        <table class="table table-hover" style="margin-top:20px;">
            <thead class="table-secondary">
                <th>Artist</th>
                <th>Lifespan</th>
                <th>Media</th>
                <th>Portrait</th>
            </thead>
            <tbody>
                <?php
                include_once('connection.php');

                $database = new Connection();
                $db = $database->open();
                try {
                    // Needs reference to a Join to display style in the column.
                    // $sql = "SELECT Artist, Lifespan, Style, Thumbnail FROM Artist_Data WHERE Media = 'oil'";
                    //$sql = "SELECT Painting_Data.Artist, Painting_Data.Media, Artist_Data.Thumbnail, Artist_Data.Lifespan FROM Painting_Data LEFT JOIN Artist_Data ON Painting_Data.Artist = Artist_Data.Artist WHERE Media = 'oil' ORDER BY Painting_Data.Artist";
                	  $sql = "SELECT Artist_Data.Artist, Painting_Data.Media, Artist_Data.Lifespan, Painting_Data.Style, Artist_Data.Thumbnail FROM Artist_Data INNER JOIN Painting_Data ON Artist_Data.Artist=Painting_Data.Artist GROUP BY Artist";
                    foreach ($db->query($sql) as $row) {
                ?>
                        <tr>
                            <td><?php echo $row['Artist']; ?></td>
                            <td><?php echo $row['Lifespan']; ?></td>
                            <td><?php echo $row['Media']; ?></td>
                            <td><?php echo '<img class="thumb" src="data:image/png;base64,' . base64_encode($row['Thumbnail']) . '"/>'; ?></td>
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