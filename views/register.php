<?php

use app\core\form\Form;

?>
<h1> Register</h1>

<?php $form=Form::begin('','post')?>

<?php echo $form->field($model,'username') ?>

<?php echo $form->field($model,'email') ?>
<?php echo $form->field($model,'password')->passwordField() ?>
<?php echo $form->field($model,'confoirm_password')->passwordField() ?>

<button type="submit" class="btn btn-primary">Register</button>

<?php Form::end() ?>
