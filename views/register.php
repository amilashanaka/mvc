<?php

use app\core\form\Form;

?>
<h1> Register</h1>

<!-- <form action="" method="post"> -->

<?php $form=Form::begin('','post')?>

<?php echo $form->field($model,'username') ?>

<?php echo $form->field($model,'email') ?>
<?php echo $form->field($model,'password') ?>
<?php echo $form->field($model,'confoirm_password') ?>

<button type="submit" class="btn btn-primary">Register</button>

<?php Form::end() ?>



<!-- <div class="mb-3">
    <label for="username" class="form-label">User Name</label>
    <input type="text" class="form-control <?=$model->hasError('username')? ' is-invalid': '' ?>" name="username" value="">

  <div class="invalid-feedback">
    <?=$model->getFirstError('username')?>
  </div>

  </div>



  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" value="" >
   
  </div>


  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" >
   
  </div>

  
  <div class="mb-3">
    <label for="confoirm_password" class="form-label">Confoirm Password</label>
    <input type="password" class="form-control" name="confoirm_password" >
   
  </div>

  <button type="submit" class="btn btn-primary">Register</button>
</form> -->