<?php 
/** @var $model \app\models\User */
use app\core\form\Form;
?>

<h1> Login</h1>


<?php $form=Form::begin('','post')?>

<?php echo $form->field($model,'username') ?>

<?php echo $form->field($model,'email') ?>
<?php echo $form->field($model,'password')->passwordField() ?>


<button type="submit" class="btn btn-primary">Loginn</button>

<?php Form::end() ?>