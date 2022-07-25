<?php
require 'proudacts/proudacts.php';

$proudacts = getProudacts();

include 'partials/header.php';
?>


<div class="container">
    <p>
        <a class="button-create" href="create.php">Add new Proudact</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
        
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($proudacts as $proudact): ?>
            <tr>
                <td>
                    <?php if (isset($proudact['extension'])): ?>
                        <img style="width: 60px" src="<?php echo "proudacts/images/${proudact['id']}.${proudact['extension']}" ?>" alt="">
                    <?php endif; ?>
                </td>
                <td><?php echo $proudact['name'] ?></td>
               
                
                <td>
                    <a href="view.php?id=<?php echo $proudact['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                    <a href="update.php?id=<?php echo $proudact['id'] ?>"
                       class="btn btn-sm btn-outline-secondary">Update</a>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $proudact['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php' ?>

