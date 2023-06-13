<?php
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;

require '../vendor/autoload.php';
include "../include/Header.php";

$repository = new ArticleRepository();

$articles = $repository->findAll();


?>



<main>
    <section>
        <title>lister tt les articles</title>
        <div class="container-fluid">
            <h1>All Article</h1>
            <div class="row g-3">
                <?php foreach ($articles as $item): ?>
                    <div class="col-md-4">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="card-title">
                                    <?= $item->getTitre() ?>
                                </h4>
                                <div>
                            
                                <img src="../assets/img/<?= ($item->getPicname()) ?>" class="card-img-top"
                                 width="100%"
                                 height="100%">
                                 </div>
                                <p>
                                    <?= htmlspecialchars($item->getContenu()) ?>
                                </p>
                                <p class="card-text text-end">
                                    <?= htmlspecialchars($item->getAuthor()) ?>
                                </p>
                          
                                <a href="article.php?id=<?= $item->getId() ?>" class="card-link">Commentaire</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
</body>


<?php
include('../include/footer.php');