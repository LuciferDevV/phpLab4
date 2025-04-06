<?php
require_once __DIR__ . '/../src/core.php';

$recipes = getAllRecipes();
$latest = array_slice(array_reverse($recipes), 0, 2);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Книга рецептов</title>
</head>
<body>
    <h1>Добро пожаловать в книгу рецептов!</h1>
    <a href="/recipes/create.php">Добавить рецепт</a>
    <h2>Последние рецепты:</h2>
    <?php if (empty($latest)): ?>
        <p>Пока рецептов нет.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($latest as $recipe): ?>
                <li>
                    <strong><?= htmlspecialchars($recipe['title']) ?></strong>
                    (<?= htmlspecialchars($recipe['category']) ?>) — <?= htmlspecialchars($recipe['description']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="/recipes/list.php">Смотреть все рецепты</a>
</body>
</html>
