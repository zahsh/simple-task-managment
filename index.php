<?php require_once "includes/aside.php" ?>
<?php 
    $showTasks =  showTasks();
    deleteTask();
    doneTask();
    undoneTask();
?>
    <main>
         <?php if(isset($_GET['edit'])): ?>
            <div class="alert alert-success">task changed</div>
        <?php endif ?>
        <h1>tasks</h1>
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
                            <?php if($task['status'] == 0) : ?>
                                <td><a href="index.php?doneid=<?= $task['id'] ?>" class="btn done">done</a></td>
                            <?php else :  ?>
                                <td><a href="index.php?undoneid=<?= $task['id'] ?>" class="btn done">undone</a></td>
                            <?php endif ?>
                            <td><a href="details.php?detailid=<?= $task['id'] ?>" class="btn det">details</a></td>
                            <td><a href="edittask.php?editid=<?= $task['id'] ?>" class="btn edi">edit</a></td>
                            <td><a href="index.php?deleteid=<?= $task['id'] ?>" class="btn del">delete</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            <?php endif ?>
        </table>
    </main>
</body>
</html>