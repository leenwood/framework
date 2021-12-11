<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        *{	margin: 0;	padding: 0;	box-sizing: border-box;}
        body{	height: 100vh; }
        .authorization_div_main{	max-width: 30%;	display: flex;	align-items: center;	justify-content: center;	border: 1px solid rgba(38, 38, 38, 0.2);	padding: 20px;	border-radius: 6px;	-webkit-box-shadow: 0px 0px 15px -1px rgba(34, 60, 80, 0.05) inset;	-moz-box-shadow: 0px 0px 15px -1px rgba(34, 60, 80, 0.05) inset;	box-shadow: 0px 0px 15px -1px rgba(34, 60, 80, 0.05) inset;}
        .authorization_input{	outline: none;}
        .btn_border {	border: 1px solid rgba(38, 38, 38, 0.2);	float: right;}.msg_form {	color: rgba(128, 0, 0, 1);;	padding: 2%;	text-align: center;	text-transform: uppercase;	background-color: rgba(222, 55, 55, 0.3);}
        form label {	margin-bottom: 4px;	text-align: center;}.footer {	background-color: rgba(64, 64, 64, 0.6);	min-height: 30px;	display: block;	margin-top: auto;}
        .page {	overflow: hidden;	display: flex;	flex-direction: column;	min-height: 100vh;	width: 100%;}.header {	background-color: rgba(250, 250, 250, 1);	min-height: 50px;	display: block;	padding: 10px 20px;}
        .footer__content {	margin: 0 auto;	width: 60%;	padding: 10px 20px;	line-height: 1;}
        .main__page__content {	margin: 0 auto;	width: 70%;	border: 1px solid black;}
        .head_main_page {	width: 100%;}
        .photo_prof {	display: inline-block;	border: 1px solid black;	width: 260px;	height: 350px;	width: 30%;}
        .info_prof {	width: 60%;	border: 1px solid black;	display: inline-block;	vertical-align: center;	text-align: center;}
        .warning {
            padding: 5px;
            background-color: #ECD5D8;
            color: #BC2A4D;
        }
        body {
            display: flex;	align-items: center;	justify-content: center;
        }
    </style>
</head>
<body>
<div class="authorization_div_main">
    <form action="/admin/newUser" method="POST">
        <label><?php echo $formName ?></label> <br>
        <label for="newUser[name]">Введите имя</label> <br>
        <input type="text" name="newUsers[name]"> <br> <br>
        <label for="newUser[surname]">Введите Фамилию</label> <br>
        <input type="text" name="newUsers[surname]"> <br> <br>
        <label for="newUser[password]">Введите Пароль</label> <br>
        <input type="text" name="newUsers[password]"> <br> <br>
        <label for="newUser[homeSq]">Введите размер площади</label> <br>
        <input type="text" name="newUsers[homeSq]"> <br> <br>
        <label for="newUser[roots]">Введите уровень доступа</label> <br>
        <input type="text" name="newUsers[roots]"> <br>
        <br>
        <button class="btn btn-success" type="submit">Submit</button>
        <button formaction="/admin/newUser" class="btn btn-danger btn_border" type="submit" name="changeInfo">Cancel</button>
    </form>
</div>
</body>
</html>
<form action=""></form>

<?php
