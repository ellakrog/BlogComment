<form style="width: 40rem; position: relative;left: 650px; padding-top:50px "; action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="hidden" name="id_user" value="<?= $_SESSION["user"]["id_user"]; ?>">
        <input type="hidden" name="id_blog" value="<?= $id_blog; ?>">
        
        <div class="headlines-comment">
            <h5>Write a comment</h5>
        </div>
        <div class="form-group">
        <label for="content">Comment</label>
        <textarea class="form-control" id="content"  name="content"  rows="3" placeholder="Write a good comment!"></textarea>
        </div>
        
        <br>
        <button type="submit" class="btn btn-primary">Comment</button>
     </form>
     