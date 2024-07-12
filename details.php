<?php require_once "includes/aside.php" ?>
<?php 
    if(isset($_GET['detailid'])) {
        $showTask = showTask($_GET['detailid']);
    }
?>
    <main class="details">
        <h1>details</h1>    
         <p>name : <span><?= $showTask['name'] ?></span></p>
         <p>category : <span><?= $showTask['category'] ?></span></p>
         <p>content : <span><?= $showTask['content'] ?></span></p>
         <p>date / time : <span><?= $showTask['datetime'] ?></span></p>
         <?php if($showTask['status'] == 0) :  ?>
            <p>status : <span>undone</span></p>
            <?php else : ?>
            <p>status : <span>done</span></p>
         <?php endif ?>
    </main>
</body>
</html>