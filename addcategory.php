<?php require_once "includes/aside.php" ?>
<?php addCategory(); ?>
    <main>
        <h1>add category</h1>
        <?php if(isset($_GET['mess'])) : ?>
            <div class="alert alert-success">Category added successfully</div>
        <?php endif ?>
        <?php if(isset($_GET['error'])) : ?>
            <div class="alert alert-danger">The name field cannot be empty</div>
        <?php endif ?>
        <?php if(isset($_GET['add'])) : ?>
            <div class="alert alert-warning">This category has already been registered</div>
        <?php endif ?>
        <form method="post">
            <label for="name">name</label>
            <input type="text" name="name">
            <button class="btn" type="submit" name="addCategory">add</button>
        </form>
    </main>
</body>
</html>