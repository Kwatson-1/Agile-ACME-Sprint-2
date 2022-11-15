<?php

require_once 'config.php';

$products = [];

$products[] = [
              'Artist' => 'Paul Cezanne',
              'Lifespan' => '1839–1906',
              'Thumbnail' => file_get_contents("thumbnail/cezanne.png"),
			  'Portrait' => file_get_contents("portrait/cezanne.png")
              ];

$products[] = [
              'Artist' => 'Leonardo da Vinci',
              'Lifespan' => '1452–1519',
              'Thumbnail' => file_get_contents("thumbnail/davinci.png"),
			  'Portrait' => file_get_contents("portrait/davinci.png")
              ];

$products[] = [
              'Artist' => 'Salvador Dali',
              'Lifespan' => '1904-1989',
              'Thumbnail' => file_get_contents("thumbnail/dali.png" ),
			  'Portrait' => file_get_contents("portrait/dali.png")
              ];
$products[] = [
              'Artist' => 'Michelangelo',
              'Lifespan' => '1475–1564',
              'Thumbnail' => file_get_contents("thumbnail/michelangelo.png" ),
			  'Portrait' => file_get_contents("portrait/michelangelo.png")
              ];
$products[] = [
              'Artist' => 'Claude Monet',
              'Lifespan' => '1840-1926',
              'Thumbnail' => file_get_contents("thumbnail/monet.png" ),
			  'Portrait' => file_get_contents("portrait/monet.png")
              ];
$products[] = [
              'Artist' => 'Pablo Picasso',
              'Lifespan' => '1881–1973',
              'Thumbnail' => file_get_contents("thumbnail/picasso.png" ),
			  'Portrait' => file_get_contents("portrait/picasso.png")
              ];
$products[] = [
              'Artist' => 'Raphael',
              'Lifespan' => '1483–1520',
              'Thumbnail' => file_get_contents("thumbnail/raphael.png" ),
			  'Portrait' => file_get_contents("portrait/raphael.png")
              ];
$products[] = [
              'Artist' => 'Rembrandt',
              'Lifespan' => '1606–1669',
              'Thumbnail' => file_get_contents("thumbnail/rembrandt.png" ),
			  'Portrait' => file_get_contents("portrait/rembrandt.png")
              ];
$products[] = [
              'Artist' => 'August Renoir',
              'Lifespan' => '1841–1919',
              'Thumbnail' => file_get_contents("thumbnail/renoir.png" ),
			  'Portrait' => file_get_contents("portrait/renoir.png")
              ];
$products[] = [
              'Artist' => 'Vincent Van Gogh',
              'Lifespan' => '1853–1890',
              'Thumbnail' => file_get_contents("thumbnail/vangogh.png" ),
			  'Portrait' => file_get_contents("portrait/vangogh.png")
              ];
$products[] = [
              'Artist' => 'Jan Vermeer',
              'Lifespan' => '1632–1675',
              'Thumbnail' => file_get_contents("thumbnail/vermeer.png"),
			  'Portrait' => file_get_contents("portrait/vermeer.png")
              ];

$sql = "INSERT INTO `Artist_Data`(Artist, Lifespan, Thumbnail, Portrait) 
VALUES (:Artist, :Lifespan, :Thumbnail, :Portrait)";

foreach ($products as $product) {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($product);
}

echo "Records inserted successfully";