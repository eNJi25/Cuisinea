<?php
require_once 'templates/header.php';
require_once 'lib/recipe.php';
?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="assets/images/logo-cuisinea.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="350" loading="lazy">
    </div>
    <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Cuisinea - Découvrez nos recettes</h1>
        <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet id ad eveniet modi accusantium ex, possimus temporibus maiores magni. Doloribus vero mollitia doloremque commodi libero asperiores repellat magni, in beatae?</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="recettes.php"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Toutes les recettes</button></a>
        </div>
    </div>
</div>
<div class="row">
    <?php foreach ($recipes as $key => $recipe) {
        include 'templates/recipe_part.php';
    } ?>
</div>

<?php require_once 'templates/footer.php'; ?>