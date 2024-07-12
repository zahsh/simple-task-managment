<?php require_once "includes/aside.php" ?>
<?php
    $showCategories = showCategories();
    deleteCategory();
?>
    <main>
        <?php if(isset($_GET['edit'])) :?>
            <div class="alert alert-success">Category edited successfully</div>
        <?php endif ?>
        <?php if(isset($_GET['error'])) : ?>
            <div class="alert alert-danger">Category could not be added successfully</div>
        <?php endif ?>
        <?php if(isset($_GET['delete'])) : ?>
            <div class="alert alert-success">Category removed successfully</div>
        <?php endif ?>
        <h1>categories</h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <?php if(!empty($showCategories)) : ?>
                <tbody>
                    <?php foreach($showCategories as $cat): ?>
                    <tr>
                        <td><?= $cat['id'] ?></td>
                        <td><?= $cat['name'] ?></td>
                        <td><a href="editcategory.php?id=<?= $cat['id'] ?>" class="btn edi">edit</a></td>
                        <td><a href="categorylist.php?deleteCategory=<?= $cat['id'] ?>" class="btn del">delete</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            <?php else : ?>
                <div class="alert alert-danger">There is no category</div>
            <?php endif ?>
        </table>
    </main>
</body>
</html>