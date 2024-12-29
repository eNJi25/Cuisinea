<?php
require_once 'templates/header.php';
require_once 'lib/recipe.php';
require_once 'lib/tools.php';
require_once 'lib/category.php';

$errors = [];
$messages = [];
$recipe = [
    'title' => '',
    'description' => '',
    'ingredients' => '',
    'instructions' => '',
    'category_id' => '',
];

$categories = getCategories($pdo);

if (isset($_POST['saveRecipe'])) {
    $fileName = null;

    // Si le fichier a été envoyé
    if (isset($_FILES['file']) && $_FILES['file']['tmp_name'] != '') {

        // La méthode getimagsize va retourner false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // Si c'est une image on traite

            $fileName = uniqid() . '-' . slugify($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], RECIPE_IMG_PATH . $fileName);
        } else {
            // Sinon on afficher une erreur
            $errors[] = 'Le fichier doit être une image';
        }
    }

    if (!$errors) {
        $res = saveRecipe($pdo, $_POST['category'], $_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], $fileName);

        if ($res) {
            $messages[] = 'La recette a bien été enregistrée.';
        } else {
            $errors[] = 'La recette n\'a pas été enregistrée.';
        }
    }
    $recipe = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'ingredients' => $_POST['ingredients'],
        'instructions' => $_POST['instructions'],
        'category_id' => $_POST['category']
    ];
}

?>

<h1>Ajouter une recette</h1>

<?php foreach ($messages as $message) { ?>
    <div class="alert alert-success">
        <?= $message ?>
    </div>
<?php } ?>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php } ?>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label" for="title">Titre de la recette :</label>
        <input class="form-control" type="text" name="title" id="title" value="<?= $recipe['title'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label" for="description">Description :</label>
        <textarea class="form-control" type="text" name="description" id="description" rows="10" cols="20"><?= $recipe['description'] ?></textarea>
    </div>
    <div class=" mb-3">
        <label class="form-label" for="ingredients">Ingredients :</label>
        <textarea class="form-control" type="text" name="ingredients" id="ingredients" rows="10" cols="20"><?= $recipe['ingredients'] ?></textarea>
    </div>
    <div class=" mb-3">
        <label class="form-label" for="instructions">Instructions :</label>
        <textarea class="form-control" type="text" name="instructions" id="instructions" rows="10" cols="20"><?= $recipe['instructions'] ?></textarea>
    </div>
    <div class=" mb-3">
        <label class="form-label" for="category">Catégorie :</label>
        <select class="form-select" name="category" id="category">
            <?php foreach ($categories as $category) { ?>
                <option value="<?= $category['id']; ?>" <?php if ($recipe['category_id'] == $category['id']) {
                                                            echo 'selected="selected"';
                                                        } ?>><?= $category['name'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="file">Image :</label>
        <input type="file" name="file" id="file">
    </div>
    <input type="submit" value="Enregistrer" name="saveRecipe" class="btn btn-primary">
</form>

<?php require_once 'templates/footer.php'; ?>