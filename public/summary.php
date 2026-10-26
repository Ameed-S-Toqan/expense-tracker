<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/includes/db.php';

$pageTitle = 'Summary';
$currentPage = 'summary';

try {
    $query = $pdo->query(
        'SELECT c.id, c.name,
                COALESCE(SUM(e.amount), 0) AS category_total
         FROM categories c
         LEFT JOIN expenses e ON e.category_id = c.id
         GROUP BY c.id, c.name
         ORDER BY c.id ASC'
    );
    $rows = $query->fetchAll();
    $grandTotal = (float)$pdo->query('SELECT COALESCE(SUM(amount), 0) FROM expenses')->fetchColumn();
} catch (PDOException $exception) {
    error_log('Unable to load summary: ' . $exception->getMessage());
    http_response_code(500);
    exit('Unable to load the spending summary. Please check the database setup.');
}

require dirname(__DIR__) . '/includes/header.php';
?>
<section class="page-heading mb-4">
    <p class="eyebrow mb-2">UNDERSTAND YOUR HABITS</p>
    <h1 class="display-6 fw-bold mb-1">Summary</h1>
    <p class="text-secondary mb-0">See how your spending is distributed by category.</p>
</section>

<section class="card app-card">
    <div class="card-body p-4 p-md-5">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2 mb-4">
            <div>
                <h2 class="h4 fw-bold mb-1">Spending by category</h2>
                <p class="text-secondary mb-0">Each bar represents a share of your total spending.</p>
            </div>
            <div class="summary-total">
                <span class="small text-secondary d-block">Total spending</span>
<span class="h3 fw-bold mb-0"><?= number_format($grandTotal, 2) ?> ILS</span>            </div>
        </div>

        <?php if ($grandTotal <= 0): ?>
            <div class="alert alert-light border" role="status">
                No spending has been recorded yet. Add an expense to see your category summary.
            </div>
        <?php endif; ?>

        <div class="category-summary-list">
            <?php foreach ($rows as $row): ?>
                <?php
                    $categoryTotal = (float)$row['category_total'];
                    $percentage = $grandTotal > 0 ? ($categoryTotal / $grandTotal) * 100 : 0;
                    $barWidth = max(0, min(100, $percentage));
                ?>
                <div class="category-summary-item">
                    <div class="d-flex justify-content-between align-items-start gap-3 mb-2">
                        <div>
                            <h3 class="h6 fw-bold mb-1"><?= e($row['name']) ?></h3>
                            <span class="small text-secondary"><?= number_format($percentage, 1) ?>% of total</span>
                        </div>
<span class="fw-bold text-nowrap"><?= number_format($categoryTotal, 2) ?> ILS</span>                    </div>
                    <div class="progress" role="progressbar" aria-label="<?= e($row['name']) ?> spending share" aria-valuenow="<?= number_format($barWidth, 1, '.', '') ?>" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: <?= number_format($barWidth, 4, '.', '') ?>%"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="card-footer total-footer px-4 px-md-5 py-3 d-flex justify-content-between align-items-center">
        <span class="text-secondary fw-semibold">Total expenses</span>
<span class="h4 fw-bold mb-0"><?= number_format($grandTotal, 2) ?> ILS</span>    </div>
</section>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
