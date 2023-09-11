
<div class="row">
    <div class="col-md-3">
        <?= $this->render('left_menu')?>
    </div>
    <div class="col-md-9">
        <h1>Пользователи</h1>
        <ul>
            <?php foreach ($employees as $employee){ ?>
                <li>
                    <a href="/admin/user/<?= $employee->employee_id?>"><?= $employee->employee_full_name?></a>
                </li>
            <?php } ?>
        </ul>

        <form action="/admin/new_employee" method="post">

    
        <div>
            <div>Роль</div>
            <div>
                <select name="employee_role_id">
                    <?php foreach($roles as $role){?>
                        <option value="<?=$role->employee_role_id?>"><?=$role->employee_role_name?></option>
                    <?php }?>
                </select>
            </div>
        </div>
    

        <div>
            <div>ФИО</div>
            <div>
                <input type="text" name="employee_name" required>
            </div>
        </div>

        <div>
            <div>E-mail</div>
            <div>
                <input type="text" name="employee_email" required>      
            </div>
        </div>

        <div>
            <button>Создать</button>
        </div>
        </form>
    </div>
</div>

