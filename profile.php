<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>
    <?php 
        // Carico le informazioni dell'utente loggato per visualizzarle nella sidebar (mobile)
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $userid = mysqli_real_escape_string($conn, $userid);
        $query = "SELECT * FROM users WHERE id = $userid";
        $res_1 = mysqli_query($conn, $query);
        $userinfo = mysqli_fetch_assoc($res_1);   
    ?>

    <head>
        <link rel='stylesheet' href='profile.css'>
        <script src='profile_preferiti.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <title>NBA<?php echo $userinfo['name']." ".$userinfo['surname'] ?></title>
    </head>

    <body>
    <div id="overlay">
    </div>
        <header>
            <nav>
                <div class="nav-container">
                    <div id="logo">
                    
                    </div>
                    <div id="links">
          <a href='home.php'>HOME</a>
          <a href='film.php'>CHE VUOI GURDARE STASERA?</a>
          <a href='ricercamusica.php'>MORE RELAX?MUSIC!!</a>
          <a href='profile.php' class='button'>PROFILO</a>
         
                        <div id="separator"></div>
                        <a href='logout.php' class='button'>LOGOUT</a>
                    </div>
                    <div id="menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="userInfo">
                    <div class="avatar" style="background-image: url(<?php echo $userinfo['propic'] == null ? "assets/default_avatar.png" : $userinfo['propic'] ?>)">
                    </div>
                    <h1><?php echo $userinfo['name']." ".$userinfo['surname'] ?></h1>
                </div>               
            </nav>
        </header>

        <section class="container">
            <div class="prefe"><h1>i miei film preferiti:</h1></div>
            <div id="results">
                
            </div>
    </section>

    </body>
</html>

<?php mysqli_close($conn); ?>