<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="./css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

</head>
<body style="background-color:#ecedf9">
    <nav class="navbar navbar-customer" style="background-color:#4f6f8d">
        <div class="logo" id="homePage">
            <!-- logo -->
            <p class="noselect"style="cursor: pointer;">The Spark Bank</p>
        </div>
        <div>
            <ul class="item">
                <li><a href="index.php">Home</a></li>
                <li><a href="transactionHistory.php">Transaction history</a></li>
            </ul>
        </div>
    </nav>
    <h1>List of customers</h1>
    <div >
        <table class="main-table">
            <thead>
                <tr style="background-color:#4f6f8d">
                    <th>Sr. no.</th>
                    <th>Name</th>
                    <th>Email-id</th>
                    <th>Current Balance</th>
                    <th>Transfer</th>
                </tr>
            </thead>
            <tbody>
            <?php
                 $server = "sql303.epizy.com";
                 $username = "epiz_29454923";
                 $password = "d9VAkgTnRdmHOE";
                 $db = "epiz_29454923_tsfbanksystem";

                //to establish connection
                $con = mysqli_connect($server, $username, $password,$db);

                //to check
                if(!$con){
                    die("Connection to this database failed due to " . mysqli_connect_error());
                }
                // else{
                //      echo "Coonnection successful";
                //  }

                $selectquery = "select * from customers";
                $query = mysqli_query($con, $selectquery);
                $rownum = mysqli_num_rows($query);

                while($res = mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?php echo $res['ID'] ?></td>
                        <td><?php echo $res['NAME'] ?></td>
                        <td><?php echo $res['EMAIL'] ?></td>
                        <td><?php echo $res['CURRENT_BALANCE'] ?></td>
                        <td><button style="padding: 4px;"><a style="text-decoration: none; color: black;" href="transaction.php?id=<?php echo $res['ID'] ?>"><p>Transfer now</p></a></button></td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        document.getElementById("homePage").onclick = function () {
            location.href = "index.php";
        };
    </script>
</body>
</html>