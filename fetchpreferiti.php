<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) exit;

    header('Content-Type: application/json');

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $userid = mysqli_real_escape_string($conn, $userid);
    
        $query = "SELECT userId ,title,img from preferiti where userId = $userid";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    $songArray = array();
    while($entry = mysqli_fetch_assoc($res)) {
        // Scorro i risultati ottenuti e creo l'elenco di post
        $songArray[] = array('userId' => $entry['userId'],
                            'title' => $entry['title'], 'img' => $entry['img']);
    }
    echo json_encode($songArray);
    
    exit;


?>