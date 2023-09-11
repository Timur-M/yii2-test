<?php
use yii\helpers\Html;

?>
<h1>Список пользователей</h1>
<ul>
<?php foreach ($employees as $employee){ ?>
    <li>
        <a href="/<?=base64_encode('user_'.$employee->employee_id)?>"><?= $employee->employee_full_name?></a>
    </li>
<?php } ?>
</ul>
<hr>
<a href="/request">Отправить заявку</a>

