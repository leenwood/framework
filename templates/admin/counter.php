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

<?php if (!empty($error)): ?>
    <div class="warning"><?php echo $error ?></div>
<?php endif; ?>

<table>
    <tr>
        <td>ID</td>
        <td>currValue</td>
        <td>prevValue</td>
    </tr>

    <?php  foreach ($counter as $id => $value): ?>
        <tr>
            <td><?php echo $value[$id][0] ?></td>
            <td><?php echo $value[$id]['curValue'] ?></td>
            <td><?php echo $value[$id]['prevValue'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="/admin" class="btn btn-primary">Панель администратора</a> <br />
</body>
</html>