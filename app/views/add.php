<h3>Добавление задачи администратору</h3>
<br>
<?php
    $statuses = $this->view_data;
?>
<form action="/tasks/addpost" method="post">
    <p>
        <label for="user">Пользователь:</label>
        <input type="text" id="user" name="user" class="box1" required>    
        &nbsp;
        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" class="box1" required>
    </p>
    <p>
        <label for="content">Задача:</label>
        <input type="text" id="content" name="content" class="box2" required>
    </p>
    <p>
        <label for="sdate">Дата и Время постановки задачи:</label>
        <input type="date" id="sdate" name="sdate" required>
        <input type="time" id="stime" name="stime" required>
    </p>
    <p>
        <label for="status">Начальный статус задачи:</label>
        <select name="status" id="status">
            <?php foreach ($statuses as $status) { ?>
                <option value="<?=$status['id']?>">
                    <?=$status['name']?>
                </option>
            <?php } ?>
        </select>
    </p>
    <p>
        <input type="submit" value="Сохранить" class="b1">
        <input type="reset" value="Очистить" class="b1">
    </p>
</form>
<style>
    label, input {
        font-size: 14pt;
        font-style: italic;
        font-weight: normal;
    }
    .b1 {
        width: 200px;
        margin: 5px;
    }
    label {
        color: darkcyan;
    }
    .box1 {
        width: 300px;
    }
    .box2 {
        width: 750px;
    }
    select, option {
        font-size: 14pt;
        font-style: italic;
        width: 200px;
        margin: 5px;
        color: purple;
    }
</style>