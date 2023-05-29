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
    <title>NBA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ricercamusica.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="spotify.js" defer="true"></script>
  </head>
  
  <body>
    <div id="overlay" class="hidden">
    </div>
    <nav>
        <div id="logo">
        NBA
        </div>
        <div id="links">
        
        <ul class="navbar">
          <li><a href='home.php'>HOME</a></li>
          <li><a href='film.php'>CHE VUOI GURDARE STASERA?</a></li>
          <li><a href='ricercamusica.php'>MORE RELAX?MUSIC!!</a></li>
          <li><a href='shop.php'>SHOP</a></li>
          <li><a href='profile.php' class='button'>PROFILO</a></li>
          <li><a href='logout.php' class='button'>ESCI</a></li>
          <div class="underline"></div>
        </ul>
    
        </div>
        <div id="menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </nav>
<header>

</header>
<section id="search">
    <form id="form_musica">
                <h2>Search all your music on Spotify!</h2>
                <div>
                    <input type='text'  onkeyup = "search()"placeholder="Type here" id='album'  >
                    <input type='submit' id='submit' value = "">
             
                </div>    
                <div class="flex-container">
            </div>   
            </form>
      
    </section>
    <section class="container">

            <div id="results">
                
            </div>
    </section>
    <footer>
      <nav>
        <div class="footer-container">
          <div class="footer-col">
            
            <p>sebastiano rossitto</p>
            <p>1000016688</p>
          </div>
          <div class="footer-col">
            <strong>ARTISTI</strong>
            <p>SOCIAL</p>
            <p>CONTATTI</p>
          </div>
          <div class="footer-col">
            <strong>CLASSIFICHE</strong>
            <p>TOP 100 GLOBAL</p>
            <p>TOP 100 ITALIA</p>
          </div>
      </nav>
    <div class="social">   
        <a href="https://www.facebook.com/nba/?locale=it_IT" class="fa fa-facebook"></a>
        <a href="https://twitter.com/NBA/header_photo" class="fa fa-twitter"></a>
        <a href="https://www.instagram.com/nba/" class="fa fa-instagram"></a>
    </div>
</footer>
  </body>
  </html>
