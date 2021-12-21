<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            display: flex;	align-items: center;	justify-content: center;
        }
    </style>
</head>
<body>
<div class="authorization_div_main">
    <form action="/admin/change/user/counters/confirm?id=<?php echo $id ?>" method="POST">
        <label>Подтвердите действие</label> <br>
        <br>
        <br>
        <button class="btn btn-success" type="submit">Submit</button>
        <button formaction="/admin" class="btn btn-danger btn_border" type="submit" name="changeInfo">Cancel</button>
    </form>
</div>
</body>
</html>