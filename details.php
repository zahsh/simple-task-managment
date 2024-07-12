<?php require_once "includes/aside.php" ?>
<?php 
    $showTask = showTask();
?>
    <main class="details">
        <h1>details</h1>    
         <p>name : <span><?= $showTask['name'] ?></span></p>
         <p>category : <span><?= $showTask['category'] ?></span></p>
         <p>content : <span><?= $showTask['content'] ?></span></p>
         <p>date / time : <span><?= $showTask['datetime'] ?></span></p>
         <p>status : <span><?= $showTask['status'] ?></span></p>
    </main>
</body>
</html>