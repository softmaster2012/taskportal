<h4>
    <a href="/tasks/add">Добавить задачу</a>
</h4>
<?php
    $tasks = $this->view_data;
?>
<table width="100%" border="1">
    <tr>
        <th>Id</th>
        <th>Пользователь</th>
        <th>E-Mail</th>
        <th>Задача</th>
        <th>Дата начала</th>
        <th>Дата заврешения</th>
        <th>Статус</th>
    </tr>
    <?php foreach($tasks as $x) { ?>
    <tr>
        <td><?=$x['id']?></td>
        <td><?=$x['user']?></td>
        <td><?=$x['email']?></td>
        <td><?=$x['content']?></td>
        <td><?=$x['start_date']?></td>
        <td><?=$x['fin_date']?></td>
        <td><?=$x['status']?></td>
    </tr>
    <?php } ?>
</table>
<style>
    table {
        margin-top: 20px;
    }
    th, td {
        font: 13pt "Comic Sans MS";
        text-align: center;
        padding: 3px;
    }
    th {
        color: navy;
        background-color: #EEEEEE;
    }
</style>
