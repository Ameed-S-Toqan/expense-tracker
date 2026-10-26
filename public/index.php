<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/includes/db.php';

$pageTitle = 'Expenses';
$currentPage = 'expenses';

try {
    $statement = $pdo->query(
        'SELECT e.id, e.expense_date, e.description, e.amount, c.name AS category_name
         FROM expenses e
         INNER JOIN categories c ON c.id = e.category_id
         ORDER BY e.expense_date DESC, e.id DESC'
    );
    $expenses = $statement->fetchAll();
    $totalStatement = $pdo->query('SELECT COALESCE(SUM(amount), 0) FROM expenses');
    $grandTotal = (float)$totalStatement->fetchColumn();
} catch (PDOException $exception) {
    error_log('Unable to load expenses: ' . $exception->getMessage());
    http_response_code(500);
    exit('Unable to load expenses right now. Please check the database setup and try again.');
}

require dirname(__DIR__) . '/includes/header.php';
?>
<section class="page-heading d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
    <div>
        <p class="eyebrow mb-2">YOUR MONEY, AT A GLANCE</p>
        <h1 class="display-6 fw-bold mb-1">Expenses</h1>
        <p class="text-secondary mb-0">Review the expenses you have recorded.</p>
    </div>
    <a class="btn btn-primary btn-lg" href="add_expense.php">+ Add Expense</a>
</section>

<section class="card app-card">
    <div class="card-header bg-white border-0 pt-4 px-4">
        <h2 class="h5 mb-0">Recent transactions</h2>
    </div>
    <div class="card-body px-0 pt-3">
        <?php if (!$expenses): ?>
            <div class="empty-state mx-4 mb-3">
                <div class="empty-icon" aria-hidden="true">↗</div>
                <h3 class="h5">No expenses yet</h3>
                <p class="text-secondary mb-3">Add your first expense to start tracking your spending.</p>
                <a class="btn btn-outline-primary" href="add_expense.php">Add your first expense</a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead><tr><th scope="col" class="ps-4">Date</th><th scope="col">Description</th><th scope="col">Category</th><th scope="col" class="text-end pe-4">Amount</th></tr></thead>
                    <tbody>
                    <?php foreach ($expenses as $expense): ?>
                        <tr>
                            <td class="ps-4 text-secondary text-nowrap"><?= e($expense['expense_date']) ?></td>
                            <td class="fw-semibold"><?= e($expense['description']) ?></td>
                            <td><span class="category-pill"><?= e($expense['category_name']) ?></span></td>
                            <td class="text-end pe-4 amount-cell"><?= number_format((float)$expense['amount'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <div class="card-footer total-footer px-4 py-3 d-flex justify-content-between align-items-center">
        <span class="text-secondary fw-semibold">Total expenses</span>
        <span class="h4 fw-bold mb-0"><?= number_format($grandTotal, 2) ?></span>
    </div>
</section>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
