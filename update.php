<?php
include 'partials/header.php';
require __DIR__ . '/proudacts/proudacts.php';

if (!isset($_GET['id'])) {
    include "partials/not_found.php";

    exit;
}
$proudactId = $_GET['id'];

$proudact = getProudactById($proudactId);
if (!$proudact) {
    include "partials/not_found.php";
    exit;
}

$errors = [
    'name' => "",
   
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proudact = array_merge($proudact, $_POST);

    $isValid = validateProudact($proudact, $errors);

    if ($isValid) {
        $proudact = updateProudact($_POST, $proudactId);
        uploadImage($_FILES['picture'], $proudact);
        header("Location: index.php");
    }
}

?>

<?php include '_form.php' ?>
