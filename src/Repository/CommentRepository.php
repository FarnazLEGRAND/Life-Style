<?php

namespace App\Repository;

use App\Enity\Comment;

use App\Repository\Database;

class CommentRepository{
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM  commentaire");
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new Comment($item['note'],$item['description'],$item['date'],$item['id']);
        }
        return $list;
    }

    public function findById(int $id): ?Comment
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM commentaire c
         INNER JOIN article ON article.id = c.id_article GROUP BY article.id;" );
        // $query->bindValue(":id", $id);
        $query->execute();
//  nom de colone injast na dakhelesh ke por mikonim
        foreach ($query->fetchAll() as $item) {
            return new Comment($item['note'],$item['description'],$item['date'],$item['id']);
        }
        return null;

    }


}


