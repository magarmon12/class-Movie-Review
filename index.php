<?php 
require_once 'vendor/autoload.php';
// classes used in this page
use Johannes\Classproject\App;
use Johannes\Classproject\Book;

// create app from App class
$app = new App();

// get items from database
$book = new Book();
$items = $book -> get();

$site_name = $app -> site_name;
// create data variables
$page_title = "$site_name Book Club";
// checking if user is logged in
$isauthenticated = false;
if( isset( $_SESSION['email'] ) ) {
    $isauthenticated = true;
}
// Loading the twig template
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment( $loader );
$template = $twig -> load( 'page.twig' );
// render the ouput
echo $template -> render( [ 
    'title' => $page_title, 
    'website_name' => $site_name,
    'items' => $items,
    'loggedin' => $isauthenticated
] );
?>