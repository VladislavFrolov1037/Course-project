<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        * {
            font-family: "DejaVu Sans", serif;
        }

        .logo {
            width: 150px;
            height: auto;
        }

        .content {
            margin-top: 20px;
        }
    </style>
    <title>Document</title>
</head>
<body>
<h1>Недвижимость Мгн</h1>
<div class="content">
    <h3>Здравствуйте {{ $meeting->name }}</h3>
    <p>Ваша заявка на встречу была одобрена. <br> Встреча запланирована на {{ $meeting->date }}, {{ $meeting->time }} по
        адресу {{ $meeting->advertisement->address->address }} {{ $meeting->advertisement->address->house_number }}</p>
    <p>Наши контактные данные в случае возникновения вопросов: <br>
        Телефон: +71234567892 <br>
        Почта: vladoperation@bk.ru</p>
</div>
</body>
</html>

