<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSF Bank</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="./css/responsive.css">
    
</head>
<body>
    <nav class="navbar">
        <div class="logo" id="homePage">
            <img src="./image/logo.png" alt="The Spark Bank" >
        </div>
        <div>
            <ul class="item">
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="customers.php">View all users</a></li>
                <li><a href="transactionHistory.php">Transaction history</a></li>
            </ul>
        </div>
    </nav>
    <div>
        <h1 class="noselect" style="cursor: pointer;">Welcome to The Spark Bank</h1>
    </div>
    <section class="main" id="home">
        <div class="content">
            <h1>Get & Send money easily</h1>
            <p>This bank management system where we can easily Transfer Money to our family and friends. We can also view the transction history and balance in our account. So enjoy This Banking System Website!</p>
            <button class="btn" id="customers">Our Customers</button>
        </div>
        <div class="image">

        </div>
    </section>
    <section id="services">
        <h3>Our Services</h3>
        <div class="card">
            <div class="card_content">
                <img src="./image/transaction.jpeg " alt="">
                <button id="customersPage" class="btn">View Customers</button>
            </div>
            <div class="card_content">
                <img src="./image/customer.jpeg" alt="">
                <button class="btn" id="transactionPage">See transaction history</button>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer">© 2021. Made by Joli Patel <br>
        For The Project of The Spark Foundation</div>
    </footer>
    <script type="text/javascript">
        document.getElementById("customers").onclick = function () {
            location.href = "customers.php";
        };
        document.getElementById("customersPage").onclick = function () {
            location.href = "customers.php";
        };
        document.getElementById("transactionPage").onclick = function () {
            location.href = "transactionHistory.php";
        };
        document.getElementById("homePage").onclick = function () {
            location.href = "index.php";
        };
    </script>
</body>
</html>