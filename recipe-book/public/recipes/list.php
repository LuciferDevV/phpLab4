<?php
require_once __DIR__ . '/../../src/core.php';

$recipes = getAllRecipes();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все рецепты</title>
</head>
<body>
    <h1>Список всех рецептов</h1>
    <a href="/index.php">← Назад</a>
    <ul>
        <?php foreach ($recipes as $recipe): ?>
            <li>
                <strong><?= htmlspecialchars($recipe['title']) ?></strong>
                (<?= htmlspecialchars($recipe['category']) ?>) — <?= htmlspecialchars($recipe['description']) ?><br>
                <strong>Ингредиенты:</strong><br>
                <ul>
                    <?php foreach (explode("\n", $recipe['ingredients']) as $ingredient): ?>
                        <li><?= htmlspecialchars($ingredient) ?></li>
                    <?php endforeach; ?>
                </ul>
                <strong>Шаги приготовления:</strong><br>
                <ol>
                    <?php foreach (explode("\n", $recipe['steps']) as $step): ?>
                        <li><?= htmlspecialchars($step) ?></li>
                    <?php endforeach; ?>
                </ol>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
</body>
</html>
