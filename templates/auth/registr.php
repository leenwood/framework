<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="authorization_div_main">
    <form action="/" method="POST">
        <label>Sign up</label>
        <input type="text" name="lastname" class="authorization_input form-control" placeholder="Имя"><br>
        <input type="text" name="surname" class="authorization_input form-control" placeholder="Фамилия"><br>
        <input type="text" name="ploshad" class="authorization_input form-control" placeholder="Введите площадь">
        <div style="margin-top: 4px; broder: 1px solid #e5e5e5; border-radius: 6px;padding: 7px; max-width: 300px;text-align: left; background-color: #e9e9e9;"><span style="">Указывайте только числовые значения, например: 10.23</span></div> <br>
        <input type="password" name="password" class="authorization_input form-control" placeholder="Confirm Password"><br>
        <button class="btn btn-success" type="submit">Sign in</button>
        <button formaction="/" class="btn btn-danger btn_border" type="submit">Cancel</button>
    </form>
</div>
</body>
</html>

<?php
