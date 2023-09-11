

<div class="row">
    <div class="col-md-3">
        <?= $this->render('left_menu')?>
    </div>
    <div class="col-md-9">

        <form action="/admin/update_employee" method="post">

            
                <div>
                    <div>Роль</div>
                    <div>
                        <select name="employee_role_id">
                            <?php foreach($roles as $role){?>
                                <option value="<?=$role->employee_role_id?>" 
                                <?=$role->employee_role_id == $employee->employee_role_id ? 'selected' : ''?>>
                                <?=$role->employee_role_name?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            

                <div>
                    <div>ФИО</div>
                    <div>
                        <input type="text" name="employee_name" value="<?=$employee->employee_full_name?>" required>
                    </div>
                </div>

                <div>
                    <div>E-mail</div>
                    <div>
                        <input type="text" name="employee_email" value="<?=$employee->employee_email?>" required>      
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div>
                            <button name="update">Сохранить</button>
                        </div>

                        <div>
                            <button name="delete" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="employee_id" value="<?=$employee->employee_id?>">
        </form>

        <?//php if (Yii::$app->session->hasFlash('success')){?>
            
        <?//php } ?>
    </div>
</div>