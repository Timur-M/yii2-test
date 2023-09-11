<?php

$con = 'pgsql:host=localhost;port=5432;dbname=testdb';

$pdo = new \PDO($con,'dbuser','366774');

$query = $pdo->prepare("SELECT e.*,er.* FROM employees as e LEFT JOIN employee_roles as er ON e.employee_role_id = er.employee_role_id");
$query->execute();
$array = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>test 2</title>
        <style type="text/css">
            table{
                border-collapse:collapse;
            }
            td,th{
                padding:5px;
                border:1px solid black;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>№ п/п</th>
                <th>Роль</th>
                <th>ФИО</th>
                <th>Email</th>
            </tr>
            
            <?php foreach($array as $i=>$a){?>
                <tr>
                    <td><?=$i+1?></td>
                    <td><?=$a['employee_role_name']?></td>
                    <td><?=$a['employee_full_name']?></td>
                    <td><?=$a['employee_email']?></td>
                </tr>
            <?}?>
            
        </table>
    </body>
</html>