<?php

$recipes = [
    ['title' => 'Mousse au chocolat', 'description' => 'Une super mousse pour les petits comme pour les grands.', 'image' => '1-chocolate-au-mousse.jpg'],
    ['title' => 'Gratin Dauphinois', 'description' => 'Pour les amateurs de pomme de terre, c\'est trés bon!', 'image' => '2-gratin-dauphinois.jpg'],
    ['title' => 'Salade', 'description' => 'Pour de nouveau rentrer dans ses jeans, c\'est la recette idéal!!', 'image' => '3-salade.jpg'],
];

function getRecipeByID(PDO $pdo, int $id)
{

    $query = $pdo->prepare("SELECT * FROM recipes WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}

function getRecipeImage(string $image)
{
    if ($image === null) {
        return ASSETS_IMG_PATH . 'recipe_default.jpg';
    } else {
        return RECIPE_IMG_PATH . $image;
    }
}
