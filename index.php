<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PHP Assignment 1">
    <meta name="robots" content="noindex, nofollow">
    <title>Order page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/style.css">
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="view.php">View</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="container">
    <section class="form-row row justify-content-center">
        <!-- section with a form, which collects 7 parameters: name, tel, email, address, pizza type, size
        and quantity -->
        <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
            <h2>Input your order info:</h2>
            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="p_name" class="form-control" id="input1">
                </div>
            </div>
            <div class="form-group">
                <label for="input2" class="col-sm-2 control-label">Telephone</label>
                <div class="col-sm-10">
                    <input type="tel" name="tel" class="form-control" id="input2">
                </div>
            </div>
            <div class="form-group">
                <label for="input3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="input3">
                </div>
            </div>
            <div class="form-group">
                <label for="input4" class="col-sm-2 control-label">Delivery Address</label>
                <div class="col-sm-10">
                    <input type="text" name="p_address" class="form-control" id="input4">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <select name="p_type" class="form-control">
                        <option>Select Your Pizza</option>
                        <option value="Veggie">Veggie</option>
                        <option value="Pepperoni">Pepperoni</option>
                        <option value="Brooklyn">Brooklyn</option>
                        <option value="BBQ Chicken">BBQ Chicken</option>
                        <option value="Hawaiian">Hawaiian</option>
                        <option value="Deluxe">Deluxe</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Pizza Size</label>
                <div class="col-sm-10">
                    <select name="p_size" class="form-control">
                        <option>Select Your size</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Big">Big</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Number of pizzas</label>
                <div class="col-sm-10">
                    <select name="quantity" class="form-control">
                        <option>Select number of pizzas</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
            <!-- submit button to send the order -->
            <div class="form-group">
                <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Submit">
            </div>
        </form>
        <div class="form-group submit-message">
            <!-- after submit button is pressed, info will be sent to the table and user
            will get confirmation message. Otherwise error message will be displayed-->
            <?php
            require_once ('database.php');
            if(isset($_POST) & !empty($_POST)){
                $p_name=$database->sanitize($_POST['p_name']);
                $tel=$database->sanitize($_POST['tel']);
                $email=$database->sanitize($_POST['email']);
                $p_address=$database->sanitize($_POST['p_address']);
                $p_type=$database->sanitize($_POST['p_type']);
                $p_size=$database->sanitize($_POST['p_size']);
                $quantity=$database->sanitize($_POST['quantity']);
                $res=$database->create($p_name, $tel, $email, $p_address, $p_type, $p_size, $quantity);
                if($res){
                    echo "<p>Order confirmed</p>";
                }
                else{
                    echo "<p>Sorry, we are having an issue. Please call us at 705-123-4567</p>";
                }
            }
            ?>
        </div>
    </section>
</main>
</body>
</html>