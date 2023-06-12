<?php

namespace App\Repository;

use App\Enity\Article;
use App\Enity\Category;
use App\Repository\Database;

class ArticleRepository{

    // liste mes article
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM article");
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new Article($item['titre'],$item['picname'],$item['contenu'], $item['author'],$item['datepub'],$item['id']);
        }
        return $list;
    }

    
// poseter un article
    public function persist(Article $article)
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO article (titre,picname,contenu,author,datepub) VALUES (:titre,:picname,:contenu,:author,:detabub)");
        $query->bindValue(':titre', $article->getTitre());
        $query->bindValue('picname',$article->getPicname());
        $query->bindValue('contenu',$article->getContenu());
        $query->bindValue('author',$article->getAuthor());
        $query->bindValue(':datepub',$article->getDatepub());

        $query->execute();

        $article->setId($connection->lastInsertId());
    }
    // Lister les articles par catégorie
    public function findById(int $id): ?Article
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM article a
         INNER JOIN category ON category.id = a.id_category;");
        // $query->bindValue(":id", $id);
        $query->execute();
//  nom de colone injast na dakhelesh ke por mikonim
        foreach ($query->fetchAll() as $item) {
            return new Article($item['titre'],$item['picname'],$item['contenu'], $item['author'],$item['datepub'],$item['id']);
        }
        return null;

    }

}

