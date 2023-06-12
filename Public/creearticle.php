<?php
use App\Repository\ArticleRepository;

require '../vendor/autoload.php';
include "../include/Header.php";


$repository = new ArticleRepository();

 if(!empty($_POST['titre']) && !empty($_POST['picname']) && !empty($_POST['contenu'])&& !empty($_POST['author'])) {
     $product = new ArticleRepository(($_POST['titre'],$_POST['picname'],$_POST['contenu'], $_POST['autor'],$_POST['datepub'],$_POST['id']));
     $repository->persist($article);

    }else{
        echo 'il y a quelque chose qui cloche';
    }

    







?>
    <div class="row">
    form action="" method="POST" enctype="multipart/form-data" class="col-6 mt-4" style="margin: auto">

<h2 style="text-align: center"> Bienvenu chez Lifestyle, Ajouter Votre Article</h2>

<div class="group log-input">
    <label for="name">Titre votre Article : </label>
    <input id="name" type="text" name="titre">
</div>

<div class="group log-input">
    <label for="info">Contenu votre Article : </label>
    <textarea id="info" type="text" name="contenu"></textarea>
</div>

<div class="group log-input">
    <label for="design">Authore : </label>
    <input id="design" type="text" name="author">
</div>

<div class="group log-input">
    <label for="price">prix de produit : </label>
    <input id="price" type="text" name="price">
</div>

<div class="group log-input">
    <label for="pic">pic. : </label>
    <input id="pic" type="file" name="photo">
</div>



<button type="submit" name="submit" value="ok" class="btn btn-outline-secondary"> ajouter vos article </button>

</form>

    </div>
        <?php
        include('../include/footer.php');
    