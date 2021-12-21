<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
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
    </style>
</head>
<body>
    <table>
        <thead>
        <tr>
            <td>ID</td>
            <td>Значение за текущий месяц</td>
            <td>Значение за прошлый месяц</td>
            <td>Количество потраченного ресурса</td>
            <td>К опалте</td>
        </tr>
        </thead>
        <tbody>
        <?php IF(isset($values)): ?>
            <?php foreach ($values as $id => $items): ?>
            <tr>
                <td>
                    <?php echo $id ?>
                </td>
                <td>
                    <?php echo $items['curValue'] ?>
                </td>
                <td>
                    <?php echo $items['prevValue'] ?>
                </td>
                <td>
                    <?php echo floatval($items['curValue']) - floatval($items['prevValue']) ?>
                </td>
                <td>
                    <?php echo (floatval($items['curValue']) - floatval($items['prevValue'])) * 1.5 ?>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
        Нет чеков.
        <?php ENDIF; ?>
        </tbody>
    </table>
    <a href="/">Back to main</a>
</body>
</html>


<?php
