<?php

namespace App\Repository;

use App\Enity\Comment;
use App\Repository\Database;

/**
 * Summary of CommentRepository
 */
class CommentRepository
{
    /**
     * Summary of findAll
     * @return Comment[]
     */
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM  commentaire");
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new Comment($item['note'], $item['description'], $item['id'], $item['date']);
        }
        return $list;
    }
    public function finByArticle(int $id): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM commentaire  WHERE id_article=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        foreach ($query->fetchAll() as $item) {
            $list[] = new Comment($item['note'], $item['description'], $item['id'], $item['date']);
        }
        return $list;
    }


    public function findByComent(int $id): ?Comment
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM commentaire c
         INNER JOIN article ON article.id = c.id_article GROUP BY article.id;");
        // $query->bindValue(":id", $id);
        $query->execute();
        //  nom de colone injast na dakhelesh ke por mikonim
        foreach ($query->fetchAll() as $item) {
            return new Comment($item['note'], $item['description'], $item['date'], $item['id']);
        }
        return null;

    }


    public function findById(int $id): ?Comment
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM commentaire");

        $query->bindValue(":id", $id);
        $query->execute();
        foreach ($query->fetchAll() as $item) {
            return new Comment($item['note'], $item['description'], $item['date'], $item['id']);
        }
        return null;



    }


    public function persist(Comment $comment)
    {
        $connection = Database::getConnection();
        $query = $connection->prepare("INSERT INTO commentaire (note) VALUES (:note)");
        $query->bindValue(':lable', $comment->getNote());
        $query->execute();
        $comment->setId($connection->lastInsertId());
    }



}