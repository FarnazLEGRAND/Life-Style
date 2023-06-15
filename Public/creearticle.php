<?php
use App\Enity\Article;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;

require '../vendor/autoload.php';
include "../include/Header.php";


$repoCat = new CategoryRepository();
$category = $repoCat->findAll();

$repository = new ArticleRepository();

?>
<Title>Poster votre article</Title>
<main>
    <aside class="content">
        <div class="text-center text-dark p-3">
            <div class="row">
                <form action="" method="POST" enctype="multipart/form-data" class="col-6 mt-4" style="margin: auto">
                    <h2 style="text-align: center">Bienvenu chez Lifestyle, Poster votre Article</h2>
                    <!-- je peux comme ca appeller mon Id quant je veux -->


                    <div class="group log-input">
                        <!-- <label for="name">Titre votre Article : </label> -->
                        <input id="name" type="text" name="titre" value="" placeholder="Titre votre Article :">
                    </div>

                    <div class="group log-input">
                        <!-- <label for="picname">pic. : </label> -->
                        <input id="picname" type="text" name="picname" placeholder="pic">

                    </div>
                    <div class="group log-input">
                        <!-- <label for="contenu">Contenu votre Article : </label> -->
                        <textarea id="contenu" type="text" name="contenu"
                            placeholder="Contenu votre Article : "></textarea>
                    </div>
                    <div class="group log-input">
                        <!-- <label for="author">Authore : </label> -->
                        <input id="author" type="text" name="author" placeholder="Author">
                    </div>
                    <div class="group log-input">
                        <label for="category">Category : </label>
                        <br>
                        <select name="category" id="category">
                            <?php foreach ($category as $item): ?>
                                <option value="<?= htmlspecialchars($item->getId()) ?>"><?= htmlspecialchars($item->getLable()) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>
                    <button type="submit" name="submit" value="ok" class="btn btn-outline-secondary"
                        style="background-color:  #BFA674; color:#00 ;">
                        ajouter vos article
                    </button>
                </form>
            </div>
        </div>
    </aside>
</main>
<?php
if (!empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['author'])) {
    $article = new Article(
        $_POST['titre'],
        $_POST['picname'],
        $_POST['contenu'],
        $_POST['author']
    );
    $repository->persist($article);

} else {
    echo 'il y a quelque chose qui cloche';
}


include('../include/footer.php');