<?php
use App\Repository\ArticleRepository;

require '../vendor/autoload.php';
include "../include/Header.php";
?>

<title>Accueil</title>
<div class="text-center text-dark p-3">
  <main>
    <article>
      <marquee behavior="" direction="">
        <h1>Bienvenu chez vous</h1>
      </marquee>
      <img src="../assets/img/loop-symbol-inspirational-view.jpg" alt="">
      <h2>Bienvenue dans la « social Life » !</h2>
      <p>"La vie sans musique est tout simplement une erreur, une fatigue, un exil."
        <br>"La musique est une révélation plus haute que toute sagesse et toute philosophie."
        <br> "S'il y a quelqu'un qui doit tout à Bach, c'est bien Dieu.".
      </p>
    </article>
  </main>
</div>

<?php
include('../include/footer.php');