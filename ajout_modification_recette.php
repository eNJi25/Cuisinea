<?php
require_once 'templates/header.php';
require_once 'lib/recipe.php';
require_once 'lib/tools.php';

if (isset($_POST['saveRecipe'])) {
    $res = saveRecipe($pdo, $_POST['category'], $_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], null);
    var_dump($res);
}
?>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label" for="title">Titre de la recette :</label>
        <input class="form-control" type="text" name="title" id="title">
    </div>
    <div class="mb-3">
        <label class="form-label" for="description">Description :</label>
        <textarea class="form-control" type="text" name="description" id="description" rows="10" cols="20"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label" for="ingredients">Ingredients :</label>
        <textarea class="form-control" type="text" name="ingredients" id="ingredients" rows="10" cols="20"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label" for="instructions">Instructions :</label>
        <textarea class="form-control" type="text" name="instructions" id="instructions" rows="10" cols="20"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label" for="category">Catégorie :</label>
        <select class="form-select" name="category" id="category">
            <option value="1">Entrée</option>
            <option value="2">Plat</option>
            <option value="3">Dessert</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="image">Image :</label>
        <input type="file" name="image" id="image">
    </div>
    <input type="submit" value="Enregistrer" name="saveRecipe" class="btn btn-primary">
</form>

<?php require_once 'templates/footer.php'; ?>