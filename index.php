<?php require_once "includes/aside.php" ?>
<?php 
    $showTasks =  showTasks();
?>
    <main>
        <h1>tasks</h1>
        <?php if(isset($_GET['add'])): ?>
            <div class="alert alert-success">Task added successfully</div>
        <?php endif ?>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>category</th>
                    <th>status</th>
                    <th>details</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <?php if(!empty($showTasks)) : ?>
                <tbody>
                    <?php foreach($showTasks as $task) : ?>
                        <tr>
                            <td><?= $task['id'] ?></td>
                            <td><?= $task['name'] ?></td>
                            <td><?= $task['category'] ?></td>
                            <td>done</td>
                            <td><a href="#" class="btn det">details</a></td>
                            <td><a href="#" class="btn edi">edit</a></td>
                            <td><a href="#" class="btn del">delete</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            <?php endif ?>
        </table>
    </main>
</body>
</html>