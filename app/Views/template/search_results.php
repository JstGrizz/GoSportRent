<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h2>Search Results for: "<?= esc($query) ?>"</h2>

    <?php if (!empty($results)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Unit Code</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Cost per Day</th>
                    <th>Cost per Month</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $unit): ?>
                    <tr>
                        <td><?= esc($unit['name']); ?></td>
                        <td><?= esc($unit['unit_code']); ?></td>
                        <td><?= esc($unit['category_name']); ?></td>
                        <td><?= esc($unit['stock']); ?></td>
                        <td><?= esc($unit['cost_rent_per_day']); ?></td>
                        <td><?= esc($unit['cost_rent_per_month']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No results found for "<?= esc($query) ?>".</p>
    <?php endif; ?>
</body>

</html>