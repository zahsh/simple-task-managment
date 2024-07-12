<?php

$connect = new PDO("mysql:host=localhost;dbname=taskmgr",'root','');

function checkCategory($name) {
    global $connect;
    $sqlName = "SELECT name FROM category WHERE name = ?";
    $resultName = $connect->prepare($sqlName);
    $resultName->bindValue(1,$name);
    $resultName->execute();
    if($resultName->rowCount()) {
        return true;
    } else {
        return false;
    }
}

//  add category function
function addCategory() {
    global $connect;
    if(isset($_POST['addCategory'])) {
        if(!empty($_POST['name'])) {
            $name = trim($_POST['name']);
            if(! checkCategory($name)) {
                $sql = "INSERT INTO category SET name = ?";
                $result = $connect->prepare($sql);
                $result->bindValue(1,$name);
                $result->execute();
                header("location:addcategory.php?mess=true");
            } else {
                header("location:addcategory.php?add=false");
            }
        } else {
            header("location:addcategory.php?error=false");
        }
    }
}

function showCategories() {
    global $connect;
    $sql = "SELECT * FROM category ORDER BY id ASC";
    $result = $connect->prepare($sql);
    $result->execute();
    if($result->rowCount()) {
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

function showCategory() {
    global $connect;
    if(isset($_GET['id'])) {
        $sql = "SELECT * FROM category WHERE id = ?";
        $result = $connect->prepare($sql);
        $result->bindValue(1,$_GET['id']);
        $result->execute();
        if($result->rowCount()) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}

function editCategory() {
    global $connect;
    if(isset($_POST['editCategory'])) {
        if(!empty($_POST['name'])) {
            $name = $_POST['name'];
            if(!checkCategory($name)) {
                $sql = "UPDATE category SET name = ? WHERE id = ?";
                $result = $connect->prepare($sql);
                $result->bindValue(1,$name);
                $result->bindValue(2,$_GET['id']);
                $result->execute();
                if($result->rowCount()) {
                    header("location:categorylist.php?edit=true");
                    return $result;
                } else {
                    return false;
                }
            } else {
                header("location:categorylist.php?add=false");
            }
        } else {
            header("location:categorylist.php?error=false");
        }
    }
} 

function deleteCategory() {
    global $connect;
    if(isset($_GET['deleteCategory']) && isset($_GET['deleteCategory'])) {
        $sql = "DELETE FROM category WHERE id = ?";
        $result = $connect->prepare($sql);
        $result->bindValue(1,$_GET['deleteCategory']);
        $result->execute();
        if($result->rowCount()) {
            header("location:categorylist.php?delete=success");
            return $result;
        } else {
            return false;
        }
    }
}

// add task
function addTask($category) {
    global $connect;
    if(isset($_POST['addTask'])) {
        if(!empty($_POST['name']) && !empty($_POST['content']) && in_array($_POST['category'],array_column($category,'name'))) {
            $sql = "INSERT INTO task SET name = ? , category = ? , content = ?";
            $result = $connect->prepare($sql);
            $result->bindValue(1,$_POST['name']);
            $result->bindValue(2,$_POST['category']);
            $result->bindValue(3,$_POST['content']);
            $result->execute();
            header("location:index.php?add=success");
        } else {
            header("location:addtask.php?add=false");
        }
    }
}

function showTasks() {
    global $connect;
    $sql = "SELECT * FROM task";
    $result = $connect->query($sql);
    $result->execute();
    if($result->rowCount()) {
        return $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

