<?php
        if($total>0){
        
         
        
        while ($row_total = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row_total);
            
             echo "<div style='width: 70rem; position: relative;left: 350px; padding-top:50px ' class='coment'>";
                echo"<div style='width: 65rem; position: relative;left: 49px; padding-top:10px; border:2px solid #E0E0E0;border-radius: 50px 20px;  background-color: #4a4ac5;'>";
                 echo " <p style='position: relative;left: 40px; padding-top:3px ; color:white'><strong>{$row_total['name']} :</strong></p>";
                 echo " <p style='position: relative;left: 60px; padding-top:3px ; color:white'>{$row_total['content']}</p>";
                 echo " <p style='position: relative;left: 760px; padding-top:3px; color:white '>{$row_total['created']}</p>";
             echo"</div>";
             echo"</div>";
        }
    }
    else{
        echo "error";
    }
?>