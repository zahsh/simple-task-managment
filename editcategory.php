<?php require_once "includes/aside.php" ?>
<?php
    $showCategory = showCategory();
     editCategory();
?>
    <main>
        <?php if(isset($_GET['add'])) : ?>
            <div class="alert alert-warning">This category has already been registered</div>
        <?php endif ?>
        <form method="post">
            <label for="name">name</label>
            <input type="text" readonly value="<?= $showCategory['id'] ?>" >
            <input type="text" name="name" value="<?= $showCategory['name'] ?>">
            <button class="btn" type="submit" name="editCategory">edit</button>
        </form>
    </main>
</body>
</html>