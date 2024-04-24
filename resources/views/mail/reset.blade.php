<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Восстановление пароля</title>
</head>
<body>
<p>Здравствуйте, {{ $user->name }}!</p>

<p>Вы получили это письмо, потому что запросили восстановление пароля для вашей учетной записи.</p>

<p>Ваш пароль: {{ $password }}</p>

<p>Если вы не запрашивали сброс пароля, просто проигнорируйте это письмо.</p>

<p>С наилучшими пожеланиями,<br>Ваша команда сайта</p>
</body>
</html>
