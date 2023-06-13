<?php
use App\Enity\Comment;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;

require '../vendor/autoload.php';
include "../include/Header.php";

$repoComentaire = new CommentRepository();
$comment = $repoComentaire->finByArticle($_GET["id"]);

$repository = new ArticleRepository();
$article = $repository->findById($_GET["id"]);
?>
<title>ecrire des commentaires sur d'un article</title>
<main>
    <section>
        <div id="Keepitsimpl" class="music">
            <h1>Music <br>Keep it simple</h1>
        </div>
        <div class="image-grid2">
            <div>
                <h3>
                    <?= $article->getTitre() ?>
                </h3>
                <p>
                    <?= $article->getContenu() ?>
                </p>
                <p>
                    <?= $article->getAuthor() ?>
                </p>
            </div>
            <div>
                <img src="../assets/img/<?= $article->getPicname() ?>" class="card-img-top" width="100%" height="100%">
            </div>
        </div>


        <div class="image-grid2">
            <form action="" method="POST" enctype="">
                <h3>Ecivez-vous votre Commentaire</h3>
                <div>
                    <label for="category">Note : </label>
                    <select name="category" id="category">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div>
                    <textarea>votre Commentaire</textarea>
                </div>
                <div>
                    <button type="submit" name="submit" value="ok" class="btn btn-outline-secondary" style="background-color:  #BFA674; color:#000
            ;"> ajouter vos commentaire
                    </button>
            </form>
        </div>
        </div>
        <h3>Voici tout les commentaires</h3>

        <?php foreach ($comment as $item): ?>
            <p>
                <?= $item->getNote() ?>
                <?= $item->getDescription() ?>
            </p>
        <?php endforeach; ?>

        </div>
    </section>
</main>


<?php
if (!empty($_POST['note']) && !empty($_POST['description'])) {
    $comment = new Comment(
        $_POST['note'],
        $_POST['description']
    );
    $repoComentaire->persist($comment);
}


include('../include/footer.php');