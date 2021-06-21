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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    
    <!-- FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

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



<div>
<?php
    // Connecting to Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "table";
    $mysqli = new mysqli($servername, $username, $password, $database);

    $query = "SELECT * FROM transactions";

    //Showing the contents of the 'transactions' table in tabular form.
    echo '<table> 
        <h1 class= "t-title"> Transaction History</h1>
        <thead>
        <tr> 
            <th> S. No. </th> 
            <th> Sender </th> 
            <th> Receiver </th> 
            <th> Amount </th> 
            <th> Time </th> 
        </tr>
        </thead>';

    echo '<tbody>';

    //Fetching table 'transactions'
    $counter= 1;
    if ($result = $mysqli->query($query)) {

        while ($row = $result->fetch_assoc()) {
            $sender = $row["Name1"];
            $receiver= $row["Name2"];
            $amount= $row["Amount"];
            $time = $row["Time"];

            echo '<tr>';
            echo '<td>'.$counter++.'</td>';
            echo '<td>'.$sender.'</td>';
            echo '<td>'.$receiver.'</td>';
            echo '<td>'.$amount.'</td>';
            echo '<td>'.$time.'</td>';
            echo '</tr>';
        }
        echo '</tbody>';

        $result->free();
    }
    echo '</table>';
?>
</div>
</body>
</html>