<html>
<head>
    <meta charset="UTF-8">
    <title><?php $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            margin: 20px;
        }
        td {
            text-align: center;
        }
        table
        {
            width: 60%;
        }
    </style
</head>
<body>
<a href="/admin/users" class="btn btn-primary">back to articles list</a>
<a href="/admin/change/user/counters?id=<?php echo $user[0] ?>" class="btn btn-cancel">Поменять информацию о счетчиках</a>
<h1>Имя <?php echo $user[1] ?></h1>
<p>Фамилия <?php echo $user[2] ?> </p>
<p>Номер лицевого счета <span style="color: #400200; font-weight: bold; text-decoration: underline;"><?php echo $user[0] ?> </span></p>
<p>Площадь жилого помещения <span style="color: #400200; font-weight: bold; text-decoration: underline;"><?php echo $user[4] ?> </span></p>
Таблица счетчиков:
<table>
    <tr>
        <td>ID счетчика</td>
        <td>Тип счетчика</td>
    </tr>

    <?php foreach ($counters as $id => $counter): ?>
        <tr>
            <td><a href="/admin/counter?id=<?php echo $counter[0] ?>"><?php echo $counter[0] ?></a></td>
            <td><?php echo $counter[2] ?></a></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>


<?php
