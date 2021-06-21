<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Accounts</title>

    <!-- BOOTSTRAP CDN-->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    
    <!-- CSS LINKING FILE-->
    <link rel="stylesheet" href="assets/CSS/customers.css">

    <!-- FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <body>
        <!--NAVBAR-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="nav-brand" href="./index.html">Bank of Sparks</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-item nav-link" href="./index.html">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="./customers.php">Customers</a>
                <a class="nav-item nav-link" href="./transactions.php">Transaction</a>
              </div>
            </div>
          </nav>
    
    <!--UPDATE AND VALIDATE TRANSACTIONS-->
<div>
    <?php
    // Input from User
    $id1 = $_POST['sender'];
    $id2 = $_POST['receiver'];
    $amount = $_POST['amount'];
    $balance = 0;

    //Connecting to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "table";
    $mysqli = new mysqli($servername, $username, $password, $database);

    //Fetching Sender details from table
    if( $result = $mysqli->query( "SELECT * FROM customers WHERE ID = $id1" ) ) {
        while( $row = $result->fetch_assoc() ) {
            $Sen_balance = $row['Balance'];
            $Sen_Name = $row['Name'];
        }
        $result->close();
    }

    //Fetching Receiver details from table
    if( $result = $mysqli->query( "SELECT * FROM customers WHERE ID = $id2" ) ) {
        while( $row = $result->fetch_assoc() ) {
            $Rec_balance = $row['Balance'];
            $Rec_Name = $row['Name'];
        }
        $result->close();
    }
    

    // Checking if sender and receiver are same or not.
    if ($id1 == $id2){
        $message = 'ERROR: The sender and receiver are the same ';
    }

    // Checking if sender has sufficient balance
    else if ($amount > $Sen_balance){
        $message = 'ERROR: Insufficient balance!';
    }

    // Transfer of money between sender and receiver
    else{
        $Sen_newAmount = $Sen_balance - $amount;
        $Rec_newAmount = $Rec_balance + $amount;
        
        $query2 = "INSERT INTO transactions (Name1, Name2, Amount) VALUES ('$Sen_Name','$Rec_Name',$amount)";
        $query3 = "UPDATE customers SET Balance = $Sen_newAmount WHERE ID = $id1";
        $query4 = "UPDATE customers SET Balance = $Rec_newAmount WHERE ID = $id2";
        if($result = $mysqli->query($query2)){
            $mysqli->query($query3);
            $mysqli->query($query4);

            $message = 'Success! The transaction is complete.';
        }
        else{
            $message = 'Database error, Try again!';
        }    
    }

    // Checking whether the transaction was successful or not
    echo '<div class = "transaction-details">';
    echo '<h2>Transaction Details </h2><br><br>';
    echo '<b>Sender : </b>'.$Sen_Name.'<br>';
    echo '<b>Receiver : </b>'.$Rec_Name.'<br>';
    echo '<b>Amount to be transferred : </b>'.$amount.'<br><br>';
    echo '<b>Message : </b><br>';
    echo $message;

    // BUTTONS =>
    echo '<div class = "h-row">
            <a href = "transfer.php" class = "h-button">Go Back</a>
            <a href = "transactions.php" class = "h-button">Transaction Records</a>
            <a href = "customers.php" class = "h-button">Customer List</a>
    
         </div>';

    echo '</div>'; 
    ?>
</div>
</body>
</html>