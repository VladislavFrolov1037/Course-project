<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Статус встречи</title>
</head>
<body>
<p>Здравствуйте, {{ $meeting->name }}</p>

@if($meeting->status_id == 1)
    <p>Ваша заявка на встречу была успешно получена. Мы обязательно рассмотрим её в ближайшее время и дадим обратную
        связь</p>
@elseif($meeting->status_id == 2)
    <p>Ваша заявка на встречу была одобрена. Встреча запланирована на {{ $meeting->date }}, {{ $meeting->time }} по
        адресу {{ $meeting->advertisement->address->address }} {{ $meeting->advertisement->address->house_number }}</p>
@elseif($meeting->status_id == 3)
    <p>Ваша заявка на встречу была отклонена, попробуйте еще раз. Встреча отклонена по причине: {{ $reason }}</p>
@endif

<p>Недвижимость Мгн</p>
</body>
</html>
