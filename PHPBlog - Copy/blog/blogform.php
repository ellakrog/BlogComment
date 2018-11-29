

 <form class="blog" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="city">City Name</label>
    <input type="text" class="form-control" name="city"  placeholder="Enter city name">
    </div>
  <div class="form-group">
    <label for="culture">Culture</label>
    <textarea class="form-control" name="culture" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="food">Food</label>
    <textarea class="form-control" name="food" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="lenguage">Lenguage</label>
    <textarea class="form-control" name="lenguage" rows="3"></textarea>
  </div>
  
  <div class="form-group">
    <label for="nightlife">Night Life</label>
    <textarea class="form-control" name="nightlife" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="education">Education</label>
    <textarea class="form-control" name="education" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="people">People</label>
    <textarea class="form-control" name="people" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="blog_image">Picture</label>
    <input type="file"  name="blog_image"  />
  </div>

  <div class="form-group">
  <input type="hidden" name="id_user" value="<?= $_SESSION["user"]["id_user"]; ?>"></div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>