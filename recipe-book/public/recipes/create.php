<?php require_once __DIR__ . '/../../src/handlers/submit.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить рецепт</title>
</head>
<body>
    <h1>Новый рецепт</h1>
    <form method="POST">
        <label>Название: <input type="text" name="title" required></label><br><br>
        <label>Категория:
            <select name="category">
                <option value="Завтрак">Завтрак</option>
                <option value="Обед">Обед</option>
                <option value="Ужин">Ужин</option>
            </select>
        </label><br><br>
        <label>Описание: <textarea name="description" required></textarea></label><br><br>
        <label>Ингредиенты: <textarea name="ingredients" required></textarea></label><br><br>
        <label>Шаги: <textarea name="steps" required></textarea></label><br><br>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>
