<?php
$pageTitle = $pageTitle ?? 'Expense Tracker';
$currentPage = $currentPage ?? '';
if (!function_exists('e')) {
    function e(mixed $value): string {
        return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A simple expense tracker to record expenses and understand spending by category.">
    <title><?= e($pageTitle) ?> | Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark app-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php"><span class="brand-mark">E</span> Expense Tracker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-controls="mainNavigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavigation">
<ul class="navbar-nav ms-auto gap-lg-2" aria-label="Main navigation - Add Expense">                <li class="nav-item"><a class="nav-link <?= $currentPage === 'expenses' ? 'active' : '' ?>" <?= $currentPage === 'expenses' ? 'aria-current="page"' : '' ?> href="index.php">Expenses</a></li>
                <li class="nav-item"><a class="nav-link <?= $currentPage === 'add' ? 'active' : '' ?>" <?= $currentPage === 'add' ? 'aria-current="page"' : '' ?> href="add_expense.php">Add Expense</a></li>
                <li class="nav-item"><a class="nav-link <?= $currentPage === 'summary' ? 'active' : '' ?>" <?= $currentPage === 'summary' ? 'aria-current="page"' : '' ?> href="summary.php">Summary</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="container py-4 py-lg-5">
