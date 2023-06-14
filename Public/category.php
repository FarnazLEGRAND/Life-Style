<?php
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;

require '../vendor/autoload.php';
include "../include/Header.php";

$repository = new ArticleRepository();
$articles = $repository->findAll();

$repoCat = new CategoryRepository();
$category = $repoCat->findAll();


?>

<title>lister tt les articles</title>

<main>
    <section>

        <div class="container-fluid">
            <?php foreach ($category as $item): ?>
                <h1>
                    <?= ($item->getLable()) ?>
                </h1>


                <div class="row g-3">
                    <?php foreach ($articles as $item): ?>
                        <div class="col-md-4">
                            <div class="card h-100">

                                <div class="card-body">
                                    <h4 class="card-title">
                                        <?= $item->getTitre() ?>
                                    </h4>
                                    <div>

                                        <img src="../assets/img/<?= ($item->getPicname()) ?>" class="card-img-top" width="100%"
                                            height="100%">
                                    </div>

                                    <p class="card-text text-end">
                                        <?= htmlspecialchars($item->getAuthor()) ?>
                                    </p>

                                    <a href="article.php?id=<?= $item->getId() ?>" class="card-link">Plus Info</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>

    </section>
</main>

<?php







include('../include/footer.php');