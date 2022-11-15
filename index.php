<!doctype html>
<html lang="en">
<head>
<?php
	include_once('head.php');
?>
</head>

<body>
    <!-- Grey with black text -->
    <?php
	  include_once('inc_nav.php');
      // test below file to check if footer works. 
      // include_once('footer.php');
    ?>
    <!--MAIN BODY START (Make it into a separate file as well (?) i.e., like the navbar)-->
    <div class="container-fluid" id="containerStyle">
        <div class="p-3 my-3 border border-info rounded">
            <h2>Assessment Three Group Project</h2>
            <p class="lead">Name: Kristiin Tribbeck, Kyle Watson, Kirsten Kurniadi<br>
                ID: 30045325<br>
                Assessment details: This website utilises the Bootstrap framework to display of a multi-page
                client-server website
                for a local art gallery called Acme Arts. The knowledge base data is hosted on a MySQL server
                which populates the various web pages. This assessment is split into three sprints.
                <ul>
                    <li>Sprint 1 - Kristiin Tribbeck - Paintings Section</li>
                    <li>Sprint 2 - Kyle Watson - Artists Section</li>
                    <li>Sprint 3 - Kirsten Kurniadi</li>
                </ul>
            </p>
        </div>
    </div>
<?php
include_once('footer.php');
?>
</body>

</html>