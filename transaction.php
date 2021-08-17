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
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="./css/transaction.css">
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="./css/responsive.css">
    
</head>
<body style="background-color:#ecedf9">
    <nav class="navbar navbar-customer" style="background-color:#4f6f8d">
        <div class="logo" id="homePage">
            <!-- logo -->
            <p class="noselect" style="cursor: pointer;" >The Spark Bank</p>
        </div>
        <div>
            <ul class="item">
                <li><a href="index.php">Home</a></li>
                <li><a href="transactionHistory.php">Transaction history</a></li>
            </ul>
        </div>
    </nav>
    <div class="mainSection" style="background-color:#4f6f8d">
        <h2>Transaction details</h2>
        <form action="" method="post">

            <?php 
            global $sender;
            $customerId = $_GET['id'];
            $selectquery = "SELECT * FROM customers WHERE ID = '$customerId'";
            $showdata = mysqli_query($con, $selectquery);
            if($bool = mysqli_fetch_array($showdata)){
                // echo $bool['Name'];
                $money = $bool['CURRENT_BALANCE'];
                $sender = $bool['NAME'];
            }
            ?>
        <table class="table">
            <tr>
                <td>
                    <p class="form-field">Transfer from:</p>
                </td>
                <td>
                <?php echo $sender . '(' . $bool['CURRENT_BALANCE'] . ')'; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="form-field">Transfer to: </p>
                </td>
                <td>
                    <select name="customers" id="customerlist" class="input">
                        
                        <?php 
                        $selectquery = "SELECT NAME,CURRENT_BALANCE FROM customers WHERE NOT ID = '$customerId'";
                        $showdata = mysqli_query($con, $selectquery);
                        
                        while($transferTo = mysqli_fetch_array($showdata)){
                            ?>
                        <option value="<?php echo $transferTo['NAME']; ?>" ><?php echo $transferTo['NAME'] . '(' . $transferTo['CURRENT_BALANCE'] . ')'; ?></option>
                        <?php
                        }
                        global $getMax;
                        $getMaxQuery = mysqli_query($con, "SELECT `CURRENT_BALANCE` FROM `customers` WHERE `NAME` = '$receiver'");
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="form-field">Enter amount: </p>
                </td>
                <td>
                    <input type="number" name="amount" id="amt" placeholder="Enter amount" class="input" required min="1" max=<?php echo "$money"; ?>>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn"> Transfer</button>
        
        </form>
        <?php
            global $update;
            global $receiver;
            if(!empty($_POST['amount'])){
                $transfer = $_POST['amount'];
                // $add = $_POST['amount'];
                $amount = $money - $transfer;
                $receiver = $_POST['customers'];
                //get money
                $getMoneyQuery = "SELECT `CURRENT_BALANCE` FROM `customers` WHERE `NAME` = '$receiver'";
                $getMoney = mysqli_query($con, $getMoneyQuery);
                // echo $getMoneyQuery;
                // echo $getMoney;
                if($amt = mysqli_fetch_array($getMoney)){
                    // echo $amt[0];
                    $addmoney = $amt[0] + $transfer; 
                }

                // echo $addmoney;
                $updatequery = "UPDATE `customers` SET `CURRENT_BALANCE` = '$amount' WHERE `ID` = '$customerId'";
                $update = mysqli_query($con, $updatequery);
                
                $updateToQuery = "UPDATE `customers` SET `CURRENT_BALANCE` = '$addmoney' WHERE `NAME` = '$receiver'";
                $updateTo = mysqli_query($con, $updateToQuery);

                $TransactionHistoryQuery = "INSERT INTO `transaction` (`SENDER`, `RECEIVER`, `AMOUNT`, `DATE-TIME`) VALUES ('$sender','$receiver','$transfer', current_timestamp());";
                $TransactionHistory = mysqli_query($con, $TransactionHistoryQuery);
            }
            if($update){
        ?>      
                <script type="text/javascript">
                    alert("Transaction Successful");
                    window.location.href = "transactionHistory.php";
                </script>
            <?php } ?>

    </div>
    <script>
        document.getElementById("homePage").onclick = function () {
            location.href = "index.php";
        };
    </script>
</body>
</html>