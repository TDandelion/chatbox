<style type="text/css">
    
    #display_box{
        width: 90%;
        height: auto;
        padding: 10px;
        border: 1px solid black;
        margin: 20px;
    }
    
    #display_name{
        color:whitesmoke;
        font-weight: bold;
    }
    
    #title{
        text-align: center;
        color: #000000
    }
    
</style>

<?php

include 'db.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if(isset($_POST['done'])){
    $myDb = new Database();
    
    
    $name = $_POST['name'];
    $comment = $_POST['comment'];        
    
    $sql = "INSERT INTO comments (name, comment) values('{$name}','{$comment}')";
    
    $result = $myDb->query($sql);
    //$result = mysqli_query($myDb->connect(), $sql);
    
    if(!$result){
        echo "not inserted";
    }else{
        echo "inserted";
    }
}

if(isset($_POST['display'])){
    $myDb = new Database();
    $sql = "SELECT * from comments";
    //$result = mysqli_query($myDb->connect(), $sql);
    $result = $myDb->query($sql);
    ?>
        <h1 id="title">Chatbox</h1>    
    <?php
    
    while($row = mysqli_fetch_array($result)){
        ?>
        <div id="display_box">
            <p id="display_name"><?php echo $row['name'];?></p>
            <p><?php echo $row['comment'];?></p>
        </div>    
        <?php
    }
    
}