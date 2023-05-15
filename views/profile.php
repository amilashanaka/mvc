
<?php

$this->title='profile';

?>
<h1> Profile</h1>


<form action="" method="post">

<div class="mb-3">
    <label for="subject" class="form-label">Subject</label>
    <input type="text" class="form-control" name="subject">
  </div>

  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea  class="form-control" name="content"></textarea>
  </div>

  <div class="mb-3">
    <label for="e-mail" class="form-label">Email address</label>
    <input type="email" class="form-control" name="e-mail" >
   
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>