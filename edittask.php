<?php require_once "includes/aside.php" ?>
<?php
    if(isset($_GET['editid'])) {
        $showCategories = showCategories();
        $showTask = showTask($_GET['editid']);
        editTask($showCategories);
    }
?>
    <main>

        <h1>add task</h1>
        <form method="post">
            <label for="name">name</label>
            <input type="text" name="name" id="name" value="<?= $showTask['name'] ?>">
            <label for="category">category</label>
            <select name="category" id="category">
                <?php if(!empty($showCategories)) : ?>
                    <?php foreach($showCategories as $cat) : ?>
                        <?php if($showTask['category'] == $cat['name'] ): ?>
                            <option selected value="<?= $cat['name'] ?>"><?= $cat['name'] ?></option>
                        <?php else: ?>
                            <option value="<?= $cat['name'] ?>"><?= $cat['name'] ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
            <label for="content">content</label>
            <textarea name="content" id="content" cols="30" rows="10"><?= $showTask['content'] ?></textarea>
            <button class="btn" type="submit" name="edittask">edit</button>
        </form>
    </main>
</body>
</html>