<?php

namespace App\Repository;

use App\Enity\Article;
use App\Enity\Category;
use App\Repository\Database;

class ArticleRepository{

    // liste mes article
        /**
     * Summary of findAll
     * @return Article[]
     */
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM article");
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new Article($item['titre'],$item['picname'],$item['contenu'], $item['author'],$item['id']);
        }
        return $list;
    }

    
// poseter un article
    public function persist(Article $article)
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO article(titre,picname,contenu,author,datepub) VALUES (:titre,:picname,:contenu,:author,:datepub)");
        $query->bindValue(':titre',$article->getTitre());
        $query->bindValue(':picname',$article->getPicname());
        $query->bindValue(':contenu',$article->getContenu());
        $query->bindValue(':author',$article->getAuthor());
        $query->bindValue(':datepub',$article->getDatepub());

        $query->execute();

        $article->setId($connection->lastInsertId());
    }
    // Lister les articles par catégorie
    public function findByCategory(int $id): array{
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM article  WHERE id_category=:id");
        $query->bindValue(":id", $id);
        foreach ($query->fetchAll() as $item) {
            $list[] = new Article($item['titre'],$item['picname'],$item['contenu'], $item['author'],$item['id']);
        }
        return $list;
    } 

    public function findById(int $id):?Article {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM article WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();
    foreach ($query->fetchAll() as $item) {
        return new Article($item['titre'],$item['picname'],$item['contenu'], $item['author'],$item['id'],$item['datepub']);
    }
    return null;

}

}

