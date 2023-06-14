<?php

namespace App\Repository;

use App\Enity\Category;
use App\Enity\Article;
use App\Repository\Database;

/**
 * Summary of CategoryRepository
 */
class CategoryRepository
{

    // liste mes category

    /**
     * Summary of findAll
     * @return Category[]
     */
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM category");
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new Category($item['lable'], $item['id']);
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

    public function findById(int $id): ?Category
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM category WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();
        foreach ($query->fetchAll() as $item) {
            return new Category($item['lable'], $item['id']);
        }
        return null;

    }

}