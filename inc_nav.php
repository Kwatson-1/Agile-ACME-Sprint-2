<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Acme Art Gallery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Painting Collection</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <hr>
                        <!--Sprint 2 Start-->
                        <li class="nav-item">
                            <a class="nav-link" href="all_artists.php">All Artists</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Artists by Media</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="Artist_by_media_oil.php">Oil</a></li>
                                <li><a class="dropdown-item" href="Artist_by_media_pen_ink.php">Pen-Ink</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Artists by Style</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="Style_impressionism.php">Impressionism</a></li>
                                <li><a class="dropdown-item" href="Style_mannerism.php">Mannerism</a></li>
                                <li><a class="dropdown-item" href="Style_still-life.php">Still-life</a></li>
                                <li><a class="dropdown-item" href="Style_portrait.php">Portrait</a></li>
                                <li><a class="dropdown-item" href="Style_realism.php">Realism</a></li>
                                <li><a class="dropdown-item" href="Style_cubism.php">Cubism</a></li>
                                <li><a class="dropdown-item" href="Style_surrealism.php">Surrealism</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"> <!-- Original:  href="crud.php" -->
                            <a class="nav-link" href="Artist_form.php">Update Artist Database</a>
                        </li>
                        <!--Sprint 2 Finish-->
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="all-paintings.php">All Paintings</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Paintings by Artist</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="Artist_august-renoir.php">August Renoir</a></li>
                                <li><a class="dropdown-item" href="Artist_michelangelo.php">Michelangelo</a></li>
                                <li><a class="dropdown-item" href="Artist_vincent-van-gogh.php">Vincent Van Gogh</a></li>
                                <li><a class="dropdown-item" href="Artist_leonardo-da-vinci.php">Leonardo da Vinci</a></li>
                                <li><a class="dropdown-item" href="Artist_claude-monet.php">Claude Monet</a></li>
                                <li><a class="dropdown-item" href="Artist_pablo-picasso.php">Pablo Picasso</a></li>
                                <li><a class="dropdown-item" href="Artist_salvador-dali.php">Salvador Dali</a></li>
                                <li><a class="dropdown-item" href="Artist_paul-cezanne.php">Paul Cezanne</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Paintings by Style</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="Style_impressionism.php">Impressionism</a></li>
                                <li><a class="dropdown-item" href="Style_mannerism.php">Mannerism</a></li>
                                <li><a class="dropdown-item" href="Style_still-life.php">Still-life</a></li>
                                <li><a class="dropdown-item" href="Style_portrait.php">Portrait</a></li>
                                <li><a class="dropdown-item" href="Style_realism.php">Realism</a></li>
                                <li><a class="dropdown-item" href="Style_cubism.php">Cubism</a></li>
                                <li><a class="dropdown-item" href="Style_surrealism.php">Surrealism</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"> <!-- Original:  href="crud.php" -->
                            <a class="nav-link" href="crud.php">Update Painting Database</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>