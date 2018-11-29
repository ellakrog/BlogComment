<?php

if($_POST){
  
$id_user = $_POST['id_user'];
$id_blog= $_POST['id_blog'];
$content= $_POST['content'];

if($comment->create($id_user,$id_blog,$content)){
       
       header("Location: ../blog/oneBlog.php?id_blog={$id_blog}");
       echo "Success!";
      
     
   
       
     
    }else{
        echo "<div class='alert alert-danger' role='alert'>Unable to comment.</div>";
    }
   
    
   
   }
   ?>