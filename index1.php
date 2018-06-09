<?php
require __DIR__.'/src/php/functions.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
  <!-- Charset -->
  <meta charset="UTF-8" />
  <!-- Titre -->
  <title class="notranslate">De l'informatique, des astuces et des tutoriels - <?php echo $config['site']['name']; ?></title>
  <!--Description-->
  <meta name="description" content="Retrouvez tous les articles de <?php echo $config['site']['name']; ?> sur la programmation, le développement web, le high tech et bien plus encore sur <?php echo $config['site']['domain']; ?> !" />
  <!-- Modification rendu mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
  <!-- Icones -->
  <link rel="apple-touch-icon" sizes="180x180" href="src/images/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="src/images/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="src/images/favicons/favicon-16x16.png">
  <link rel="manifest" href="src/images/favicons/site.webmanifest">
  <link rel="mask-icon" href="src/images/favicons/safari-pinned-tab.svg" color="#00a0ce">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="src/css/style.css" />
  	<!--[if lt IE 9]>
    	<script src="src/js/html5ie.js"></script>
  	<![endif]-->
</head>

<body>
  <!-- Header -->
  <header>
    <!-- Menu top -->
    <nav>
      <ul>
        <li><a href="#">A propos</a></li>
        <li><a href="#">Nos partenaires</a></li>
        <li><a href="#">Faire un don</a></li>
        <li><a href="#" onclick="tarteaucitron.userInterface.openPanel();">Gestion des cookies</a></li>
        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#" title="Google +"><i class="fab fa-google-plus-g"></i></a></li>
        <li><a href="#" title="Discord"><i class="fab fa-discord"></i></a></li>
      </ul>
    </nav>
    <!-- Branding -->
    <div>
      <a href="<?php echo $config['site']['domain']; ?>"><img src="src/images/logo/favicon.png" alt="" style="width: 100px;" /> </a>
      <h1 class="notranslate title"><a href="<?php echo $config['site']['domain']; ?>"><?php echo $config['site']['name']; ?></a></h1>
      <p class="description"><b>Retrouvez tout nos articles sur la programmation, le développement web, le high tech et bien plus encore !</b></p>
    </div>
    <!-- Menu down -->
    <nav>
      <ul>
        <li class="left"><a href="#"><i class="fas fa-home"></i> Accueil</a></li>
        <li class="left"><a href="#"><i class="fas fa-lock"></i> Connexion</a></li>
        <li class="left"><a href="#"><i class="fas fa-sign-in-alt"></i> Inscription</a></li>
        <li class="left">
          <a href="#"><i class="fas fa-tag"></i> Catégories <i class="fas fa-caret-down"></i></a>
          <ul>
            <li>
              <a href="#">Systèmes d'exploitation <i class="fas fa-caret-down"></i></a>
              <ul>
                <li><a href="#">Windows</a></li>
                <li><a href="#">Linux</a></li>
                <li><a href="#">MacOS</a></li>
                <li><a href="#">Android</a></li>
                <li><a href="#">iOS</a></li>
              </ul>
            </li>
            <li><a href="#">Logiciels</a></li>
            <li><a href="#">Programmation</a></li>
            <li><a href="#">Matériel</a></li>
            <li><a href="#">Internet</a></li>
            <li><a href="#">Jeux Vidéo</a></li>
            <li><a href="#">High Tech</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fas fa-globe"></i> News</a></li>
        <li>
          <form method="POST" action="#">
            <input type="search" name="search" />
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>
        </li>
      </ul>
    </nav>
  </header>

  <!-- Main content -->
  <main>
    <!-- Articles -->
    <article>
      <h1><i class="fas fa-newspaper"></i> Nos dernières publications :</h1>
      <section>
        <img src="src/images/logo/favicon.png" alt="Image" style="width: 200px;" /> 
        <header>
          <h2><a href="#">FLARE : Trouvez vos coéquipiers pour jouer en ligne !</a></h2>
          <address><i class="fas fa-user"></i><a href="#" rel="author">LéoGarret</a></address>
          <time datetime="2018-02-25 13:57"><i class="fas fa-pencil-alt"></i>25/02/2018 à 13:57</time>
          <i class="fas fa-folder-open"></i><a href="" rel="tag">Internet</a>
        </header>
        <p>Si vous êtes un joueur qui a l'habitude de faire des parties en ligne, vous devez surement avoir le même problème que moi : ne pas trouver de bons coéquipiers. Heureusement, Flare est là pour...</p>
      </section>
    </article>
  </main>

  <!-- Footer -->
  <footer>
    <!-- Footer top -->
    <article>
      <!-- Translate -->
      <section>
        <h3><i class="fas fa-share-square"></i> Traduction :</h3>
        <ul>
          <li><div id="google_translate_element"></div></li>
        </ul>
      </section>
      <!-- Usefull links -->
      <section>
        <h3><i class="fas fa-link"></i> Les liens utiles :</h3>
        <ul>
          <li><a href="#">Nous contacter</a></li>
          <li><a href="#">Conditions Générales d'Utilisation & Mentions Légales</a></li> 
        </ul>
      </section>
      <!-- Sign in newsletter --> 
      <section> 
        <h3><i class="fas fa-envelope"></i> S'inscrire à la newsletter :</h3>
        <p>Recevez un mail une fois par semaine listant les derniers articles publiés !</p>
        <form method="POST" action="#">
          <label for="email">Votre email :</label>
          <input type="email" name="email" id="email" />
          <input type="submit" value="M'inscrire" />
        </form>
      </section>
    </article>
    <!-- Footer down -->
    <article>
      <p><span class="notranslate">Le Monde Du PC </span>| Version : 2.0</p>
    </article>
  </footer>

  <!-- Javascript -->
  <script src="src/tarteaucitron/tarteaucitron.js"></script>
  <script src="src/js/vanilla.js"></script> 
  <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>