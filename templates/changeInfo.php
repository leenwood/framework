<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="authorization_div_main">
    <form action="/add" method="POST">
        <label>Смена данных о счетчике</label> <br>
        <label for="GVScounter">Показания ГВС</label> <br>
        <input type="number" name="counters[GVS]"> <br>
        <label for="HVScounter">Показания ХВС</label> <br>
        <input type="number" name="counters[HVS]"> <br>
        <label for="ELEcounter">Показания Э/Э</label> <br>
        <input type="number" name="counters[ELE]"> <br>
        <br>
        <button class="btn btn-success" type="submit">Submit</button>
        <button formaction="/" class="btn btn-danger btn_border" type="submit" name="changeInfo">Cancel</button>
    </form>
</div>
</body>
</html>


<?php
