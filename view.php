<?php
require_once('database.php');
$res=$database->read();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All orders</title>
    <meta name="description" content="This week we will be using OOP PHP to create our CRUD application">
    <meta name="robots" content="noindex, nofollow">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/style.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <!-- navbar with pizza logo and two option: new order and all orders-->
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="./img/pizza-logo.png" alt="header logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">New order</a></li>
                    <li class="nav-item"><a class="nav-link" href="view.php">All orders</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <!-- container with table, which retrieves information from sql database with previous orders -->
    <div class="row">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Type</th>
                <th>Size</th>
                <th>Quantity</th>
            </tr>
            <?php
            while($r=mysqli_fetch_assoc($res)){
                ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><?php echo $r['p_name']; ?></td>
                    <td><?php echo $r['tel']; ?></td>
                    <td><?php echo $r['email']; ?></td>
                    <td><?php echo $r['p_address']; ?></td>
                    <td><?php echo $r['p_type']; ?></td>
                    <td><?php echo $r['p_size']; ?></td>
                    <td><?php echo $r['quantity']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>