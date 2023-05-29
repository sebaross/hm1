<?php
    /*******************************************************
        Inserisce nel database il post da pubblicare 
    ********************************************************/
    require_once 'auth.php';
    //require_once 'auth2.php';

    if (!$userid = checkAuth()) exit;
   // if (!$id = checkAuth()) exit;

    preferiti();

    function preferiti() {
        global $dbconfig, $userid,$id;

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        # Costruisco la query
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        //$nome = mysqli_real_escape_string($conn, $_GET['nome']);
        $title = mysqli_real_escape_string($conn, $_GET['title']);
        //$set = mysqli_real_escape_string($conn, $_POST['set']);
        //$price = mysqli_real_escape_string($conn, $_GET['price']);
        //$rarity = mysqli_real_escape_string($conn, $_GET['rarity']);
        $img = mysqli_real_escape_string($conn, $_GET['img']);

        # Eseguo
        $query = "DELETE FROM preferiti WHERE id='$id' and user=$userid";
        error_log($query);

        # Se corretta, ritorna un JSON con {ok: true}
        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('ok' => true));
            exit;
        }

        mysqli_close($conn);
        echo json_encode(array('ok' => false));
    }