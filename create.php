<?php
include 'partials/header.php';
require __DIR__ . '/proudacts/proudacts.php';

$proudact = [
    'id' => '',
    'name' => ''
   
];

$errors = [
    'name' => ""
];
$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proudact = array_merge($proudact, $_POST);

    $isValid = validateProudact($proudact, $errors);

    if ($isValid) {
        $proudact = createProudact($_POST);

        uploadImage($_FILES['picture'], $proudact);

        header("Location: index.php");
    }
}

?>

<?php include '_form.php' ?>

