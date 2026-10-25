<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/includes/db.php';

$pageTitle = 'Add Expense';
$currentPage = 'add';
$errors = [];
$description = '';
$amount = '';
$categoryId = '';
$expenseDate = date('Y-m-d');

try {
    $categories = $pdo->query('SELECT id, name FROM categories ORDER BY id ASC')->fetchAll();
} catch (PDOException $exception) {
    error_log('Unable to load categories: ' . $exception->getMessage());
    http_response_code(500);
    exit('Unable to load expense categories. Please check the database setup.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = trim((string)($_POST['description'] ?? ''));
    $amount = trim((string)($_POST['amount'] ?? ''));
    $categoryId = trim((string)($_POST['category_id'] ?? ''));
    $expenseDate = trim((string)($_POST['expense_date'] ?? ''));

    if ($description === '') {
        $errors['description'] = 'Please enter a description.';
    } elseif (mb_strlen($description) > 255) {
        $errors['description'] = 'Description must be 255 characters or fewer.';
    }

    if ($amount === '' || !is_numeric($amount) || (float)$amount <= 0) {
        $errors['amount'] = 'Enter an amount greater than zero.';
    } elseif (!is_finite((float)$amount) || (float)$amount > 99999999.99) {
        $errors['amount'] = 'Enter a valid amount within the supported limit.';
    }

    $validCategoryIds = array_map(static fn(array $category): string => (string)$category['id'], $categories);
    if ($categoryId === '' || !ctype_digit($categoryId) || !in_array($categoryId, $validCategoryIds, true)) {
        $errors['category_id'] = 'Please select a valid category.';
    }

    $dateObject = DateTimeImmutable::createFromFormat('!Y-m-d', $expenseDate);
    $dateErrors = DateTimeImmutable::getLastErrors();
    $dateIsValid = $dateObject !== false
        && ($dateErrors === false || ($dateErrors['warning_count'] === 0 && $dateErrors['error_count'] === 0))
        && $dateObject->format('Y-m-d') === $expenseDate;
    if (!$dateIsValid) {
        $errors['expense_date'] = 'Please enter a valid date.';
    }

    if (!$errors) {
        try {
            $insert = $pdo->prepare(
                'INSERT INTO expenses (description, amount, category_id, expense_date)
                 VALUES (:description, :amount, :category_id, :expense_date)'
            );
            $insert->execute([
                ':description' => $description,
                ':amount' => number_format((float)$amount, 2, '.', ''),
                ':category_id' => (int)$categoryId,
                ':expense_date' => $expenseDate,
            ]);
            header('Location: index.php?added=1');
            exit;
        } catch (PDOException $exception) {
            error_log('Unable to save expense: ' . $exception->getMessage());
            $errors['general'] = 'The expense could not be saved. Please try again.';
        }
    }
}

require dirname(__DIR__) . '/includes/header.php';
?>
<section class="page-heading mb-4">
    <p class="eyebrow mb-2">RECORD A TRANSACTION</p>
    <h1 class="display-6 fw-bold mb-1">Add Expense</h1>
    <p class="text-secondary mb-0">Enter the details below to add a new expense.</p>
</section>

<div class="row justify-content-center">
    <div class="col-lg-8 col-xl-7">
        <section class="card app-card">
            <div class="card-body p-4 p-md-5">
                <?php if ($errors): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Please review the form.</strong>
                        <?php if (isset($errors['general'])): ?><div><?= e($errors['general']) ?></div><?php endif; ?>
                        <ul class="mb-0 mt-2">
                            <?php foreach ($errors as $field => $message): ?>
                                <?php if ($field !== 'general'): ?><li><?= e($message) ?></li><?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form id="expense-form" method="post" action="add_expense.php" novalidate>
                    <div class="mb-4">
                        <label for="description" class="form-label">Description</label>
                        <input class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>" id="description" name="description" type="text" maxlength="255" placeholder="e.g. Lunch" value="<?= e($description) ?>" required aria-describedby="description-feedback">
                        <div class="invalid-feedback" id="description-feedback"><?= e($errors['description'] ?? 'Please enter a description.') ?></div>
                    </div>

                    <div class="mb-4">
                        <label for="amount" class="form-label">Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">Amount</span>
                            <input class="form-control <?= isset($errors['amount']) ? 'is-invalid' : '' ?>" id="amount" name="amount" type="number" min="0.01" max="99999999.99" step="0.01" placeholder="0.00" value="<?= e($amount) ?>" required aria-describedby="amount-feedback">
                            <div class="invalid-feedback" id="amount-feedback"><?= e($errors['amount'] ?? 'Enter an amount greater than zero.') ?></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select <?= isset($errors['category_id']) ? 'is-invalid' : '' ?>" id="category_id" name="category_id" required aria-describedby="category-feedback">
                            <option value="">Select a category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= e($category['id']) ?>" <?= (string)$categoryId === (string)$category['id'] ? 'selected' : '' ?>><?= e($category['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback" id="category-feedback"><?= e($errors['category_id'] ?? 'Please select a category.') ?></div>
                    </div>

                    <div class="mb-4">
                        <label for="expense_date" class="form-label">Date</label>
                        <input class="form-control <?= isset($errors['expense_date']) ? 'is-invalid' : '' ?>" id="expense_date" name="expense_date" type="date" value="<?= e($expenseDate) ?>" required aria-describedby="date-feedback">
                        <div class="invalid-feedback" id="date-feedback"><?= e($errors['expense_date'] ?? 'Please choose a valid date.') ?></div>
                    </div>

                    <div class="d-flex flex-column flex-sm-row gap-2 pt-2">
                        <button class="btn btn-primary btn-lg" type="submit">Save Expense</button>
                        <a class="btn btn-light btn-lg" href="index.php">Cancel</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
