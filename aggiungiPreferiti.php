<?php
    
    require_once 'auth.php';
    if (!$userid = checkAuth()) exit;

    preferiti();

    function preferiti() {
        global $dbconfig, $userid;

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        # Costruisco la query
        $userid = mysqli_real_escape_string($conn, $userid);
        $title = mysqli_real_escape_string($conn, $_GET['title']);
        $img = mysqli_real_escape_string($conn, $_GET['img']);
                
        $query = "SELECT * FROM preferiti WHERE img= '$img' and title='$title' and userId= '$userid' ";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        # if song is already present, do nothing
        if(mysqli_num_rows($res) > 0) {
            echo json_encode(array('ok' => true));
            exit;
        } 

        $query = "INSERT INTO preferiti (userId ,title, img)
        VALUES('$userid','$title','$img' )";
        error_log($query);

        # Se corretta, ritorna un JSON con {ok: true}
        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('ok' => true));
            exit;
        }

        mysqli_close($conn);
        echo json_encode(array('ok' => false));
    }