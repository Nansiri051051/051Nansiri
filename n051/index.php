<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการนักศึกษา</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .container {
            max-width: 900px;
        }
    </style>
</head>

<body>
    <?php
    $products = [
        ['no' => 1, 'id' => '664230051', 'name' => 'นันศิริ', 'lastname' => 'พุกภูษา', 'email' => '051@gmail.com', 'tel' => '0623456789', 'created_at' => '06:00', 'age' => 20],
        ['no' => 2, 'id' => '664230052', 'name' => 'โชคดี', 'lastname' => 'มีชัย', 'email' => '052@gmail.com', 'tel' => '0623456754', 'created_at' => '08:30', 'age' => 21],
        ['no' => 3, 'id' => '664230053', 'name' => 'ทุเรียน', 'lastname' => 'หมอนทอง', 'email' => '053@gmail.com', 'tel' => '0623456421', 'created_at' => '09:00', 'age' => 20],
        ['no' => 4, 'id' => '664230054', 'name' => 'ดีใจ', 'lastname' => 'ใจดี', 'email' => '054@gmail.com', 'tel' => '0623456028', 'created_at' => '09:50', 'age' => 23],
    ];


    if (isset($_POST['age']) && !empty($_POST['age'])) {
        $filterAge = $_POST['age'];
        $filterProducts = array_filter($products, function ($product) use ($filterAge) {
            return $product['age'] == $filterAge;
        });
        $filterProducts = array_values($filterProducts); 
    } else {
        $filterProducts = $products;
    }
    ?>
    <div class="container mt-5">
        <h1>รายการนักศึกษา</h1>
        <form action="" method="POST" class="mb-3">
            <div>
                <input type="number" name="age" placeholder="กรอกอายุ" class="form-control mb-2">
                <button type="submit" class="btn btn-success mt-2">Filter</button>
            </div>
        </form>

        <table id="productTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Created At</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filterProducts as $product) : ?>
                    <tr>
                        <td><?= $product["no"] ?></td>
                        <td><?= $product["id"] ?></td>
                        <td><?= $product["name"] ?></td>
                        <td><?= $product["lastname"] ?></td>
                        <td><?= $product["email"] ?></td>
                        <td><?= $product["tel"] ?></td>
                        <td><?= $product["created_at"] ?></td>
                        <td><?= $product["age"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#productTable');
    </script>
</body>

</html>
