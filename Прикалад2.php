<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders Table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-3">Таблиця замовлень</h1>

        <?php
        $dsn = 'mysql:host=localhost:8889;dbname=car_firm';
        $username = 'root';
        $password = 'root';

        try {
            $dbConnection = new PDO($dsn, $username, $password);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Помилка підключення до бази даних: ' . $e->getMessage();
            exit;
        }

        $tableName = 'Замовлення'; // Замініть на назву вашої таблиці замовлень

        $sql = "SELECT * FROM $tableName";

        $stmt = $dbConnection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php if ($results): ?>
            <table class="table table-striped mt-3">
                <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <?php foreach ($row as $value): ?>
                                <td><?= $value ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="mt-3">Таблиця порожня або не існує</p>
        <?php endif; ?>
    </div>
</body>
</html>
