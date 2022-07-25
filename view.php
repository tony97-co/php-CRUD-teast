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

?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View Proudact: <b><?php echo $proudact['name'] ?></b></h3>
        </div>
        <div class="card-body">
            <a class="btn btn-secondary" href="update.php?id=<?php echo $proudact['id'] ?>">Update</a>
            <form style="display: inline-block" method="POST" action="delete.php">
                <input type="hidden" name="id" value="<?php echo $proudact['id'] ?>">
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
        <table class="table">
            <tbody>
            <tr>
                <th>Name:</th>
                <td><?php echo $proudact['name'] ?></td>
            </tr>
          
            </tbody>
        </table>
    </div>
</div>


<?php include 'partials/footer.php' ?>
