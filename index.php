<?php

define("_RECIPE_IMG_PATH_", "uploads/recipes/");

$recipes = [
    ['title' => 'Mousse au chocolat', 'description' => 'Une super pousse pour les petits comme pour ls grands.', 'image' => '1-chocolate-au-mousse.jpg'],
    ['title' => 'Gratin Dauphinois', 'description' => 'Pour les amateurs de pomme de terre, c\'est trés bon!', 'image' => '2-gratin-dauphinois.jpg'],
    ['title' => 'Salade', 'description' => 'Pour de nouveau rentrer dans ses jeans, c\'est la recette idéal!!', 'image' => '3-salade.jpg'],
];

require_once 'templates/header.php';
?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="assets/images/logo-cuisinea.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="350" loading="lazy">
    </div>
    <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Cuisinea - Découvrez nos recettes</h1>
        <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet id ad eveniet modi accusantium ex, possimus temporibus maiores magni. Doloribus vero mollitia doloremque commodi libero asperiores repellat magni, in beatae?</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Toutes les recettes</button>
        </div>
    </div>
</div>
<div class="row">
    <?php foreach ($recipes as $key => $recipe) { ?>

        <div class="col-md-4">
            <div class="card">
                <img src="<?= _RECIPE_IMG_PATH_ . $recipe['image'] ?>" class="card-img-top" alt="<?= $recipe['title'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $recipe['title'] ?></h5>
                    <p class="card-text"><?= $recipe['description'] ?></p>
                    <a href="#" class="btn btn-primary">Voir la recette</a>
                </div>
            </div>
        </div>

    <?php } ?>
</div>

<?php require_once 'templates/footer.php'; ?>