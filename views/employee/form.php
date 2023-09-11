<form action="/handler" method="post">

    <?php if(isset($employees)){?>
    <div>
        <div>Получатель</div>
        <div>
            <select name="receiver_id" id="receiver_selector">
                <option value="0">Выберите получателя из списка</option>
                <?php foreach($employees as $employee){?>
                    <option value="<?=$employee->employee_id?>"><?=$employee->employee_full_name?></option>
                <?php }?>
            </select>
        </div>
        <div id="receiver_info"></div>
    </div>
    <?php } else {?>
    
        <input type="hidden" name="receiver_id" value="<?=$employee->employee_id?>">
    <?php } ?>

    <div>
        <div>Отправитель</div>
        <div>
            ФИО: <input type="text" name="sender_name" required><br>
            email: <input type="text" name="sender_email" required>    
        </div>
    </div>

    <div>
        <div>Заявка</div>
        <div>
            <textarea name="content" required></textarea>  
        </div>
    </div>

    <div>
        <button>Отправить</button>
    </div>
</form>