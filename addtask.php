<?php require_once "includes/aside.php" ?>
<?php
    $showCategories = showCategories();
    addTask($showCategories);
?>
    <main>
        <?php if(isset($_GET['add'])): ?>
            <div class="alert alert-danger">All fields must be filled with valid value</div>
        <?php endif ?>
        <h1>add task</h1>
        <form method="post">
            <label for="name">name</label>
            <input type="text" name="name" id="name">
            <label for="category">category</label>
            <select name="category" id="category">
                <?php if(!empty($showCategories)) : ?>
                    <?php foreach($showCategories as $cat) : ?>
                        <option value="<?= $cat['name'] ?>"><?= $cat['name'] ?></option>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
            <label for="content">content</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
            <button class="btn" type="submit" name="addTask">add</button>
        </form>
    </main>
</body>
</html>