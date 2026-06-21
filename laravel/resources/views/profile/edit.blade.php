<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <meta charset="UTF-8">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 15px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .title {
            font-size: 20px;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            padding: 8px 12px;
            border: none;
            background: #2563eb;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .danger {
            background: #dc2626;
        }

        a {
            color: #374151;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1 style="margin-bottom:20px;">Профиль</h1>

    <!-- BACK -->
    <div class="title">
        <a href="{{ route('home') }}">Back to site</a>
    </div>

    <!-- PROFILE INFO -->
    <div class="card">
        <div class="title">Информация профиля</div>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <label>Имя</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}">

            <label>Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}">

            <button type="submit">Сохранить</button>
        </form>
    </div>

    <!-- PASSWORD -->
    <div class="card">
        <div class="title">Пароль</div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <label>Текущий пароль</label>
            <input type="password" name="current_password">

            <label>Новый пароль</label>
            <input type="password" name="password">

            <label>Повтор пароля</label>
            <input type="password" name="password_confirmation">

            <button type="submit">Обновить пароль</button>
        </form>
    </div>

    <!-- DELETE -->
    <div class="card">
        <div class="title">Удаление аккаунта</div>

        <form method="POST" action="{{ route('profile.destroy') }}"
              onsubmit="return confirm('Удалить аккаунт?')">

            @csrf
            @method('DELETE')

            <button type="submit" class="danger">
                Удалить аккаунт
            </button>
        </form>
    </div>

</div>

</body>
</html>
