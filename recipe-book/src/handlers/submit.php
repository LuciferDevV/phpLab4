<?php
require_once __DIR__ . '/../core.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handleRecipeSubmission($_POST);
}
