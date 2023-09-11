
<div class="row">
    <div class="col-md-3">
        <?= $this->render('left_menu')?>
    </div>
    <div class="col-md-9">
        <h1>Заявки</h1>
        <ul>
            <?php foreach ($requests as $request){ ?>
                <li>
                    <a href="/admin/request/<?= $request->request_id?>">Заявка №<?= $request->request_id?></a>
                </li>
            <?php } ?>
        </ul>

        <form action="/admin/new_request" method="post">

    
        <div>
            <div>Отправитель</div>
            <div>
                <select name="sender_id">
                    <?php foreach($employees as $employee){?>
                        <option value="<?=$employee->employee_id?>"><?=$employee->employee_full_name?></option>
                    <?php }?>
                </select>
            </div>
        </div>
    

        <div>
            <div>Получатель</div>
            <div>
                <select name="receiver_id">
                    <?php foreach($employees as $employee){?>
                        <option value="<?=$employee->employee_id?>"><?=$employee->employee_full_name?></option>
                    <?php }?>
                </select>
            </div>
        </div>

        <div>
            <div>Заявка</div>
            <div>
                <textarea name="content"></textarea>
            </div>
        </div>

        <div>
            <button>Создать</button>
        </div>
        </form>
    </div>
</div>

