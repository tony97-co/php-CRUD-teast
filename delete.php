<?php
include 'partials/header.php';
require __DIR__ . '/proudacts/proudacts.php';


if (!isset($_POST['id'])) {
    include "partials/not_found.php";
    exit;
}
$proudactId = $_POST['id'];
deleteProudact($proudactId);

header("Location: index.php");
