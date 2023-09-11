<?php
use yii\helpers\Html;

//var_dump($employee->role);
?>


<h1><?=$employee->employee_full_name?></h1>
<div>роль: <?=$employee->role->employee_role_name?></div>
<div>e-mail: <?=$employee->employee_email?></div>

<h1>Новая заявка</h1>

<?= $this->render('form',['employee' => $employee])?>