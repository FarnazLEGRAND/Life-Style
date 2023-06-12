<?php

namespace App\Repository;

use App\Enity\Category;
use App\Enity\Article;
use App\Repository\Database;

class CategoryRepository{

    // liste mes article
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM category");
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new Category($item['lable'],$item['id']);
        }
        return $list;
    }

    public function persist(Category $category)
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO category (lable) VALUES (:lable)");
        $query->bindValue(':lable', $category->getLable());
       

        $query->execute();

        $category->setId($connection->lastInsertId());
    }
}