
<div class="row">
    <div class="col-md-3">
        <?= $this->render('left_menu')?>
    </div>
    <div class="col-md-9">
        <h1>Заявка №<?=$request->request_id?></h1>
        
        <form action="/admin/update_request" method="post">

            <div>
                <div>Отправитель</div>
                <div>
                    <select name="sender_id">
                        <?php foreach($employees as $employee){?>
                            <option value="<?=$employee->employee_id?>"
                                <?=$employee->employee_id == $request->request_sender_id ? 'selected' : ''?>>
                                <?=$employee->employee_full_name?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
        

            <div>
                <div>Получатель</div>
                <div>
                    <select name="receiver_id">
                        <?php foreach($employees as $employee){?>
                            <option value="<?=$employee->employee_id?>"
                                <?=$employee->employee_id == $request->request_receiver_id ? 'selected' : ''?>>
                                <?=$employee->employee_full_name?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div>
                <div>Заявка</div>
                <div>
                    <textarea name="content"><?=$request->request_content?></textarea>
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

            <input type="hidden" name="request_id" value="<?=$request->request_id?>">

        </form>
    </div>
</div>

