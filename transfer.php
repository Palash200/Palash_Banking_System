<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Accounts</title>

    <!-- Bootstrap CDN-->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    
    <!-- CSS Linking file-->
    <link rel="stylesheet" href="assets/CSS/customers.css">

    <!-- FONTS-->
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
 

    <!--FORM-->
    <div>
        <?php
        // Connection to Database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "table";
        $mysqli = new mysqli($servername, $username, $password, $database);

        // Form creation 
        echo '<form method = "post" action = "handler.php">';
        echo '<h2 style = " margin-left : 10px;"> Transfer Money</h2><br>';

        // Senders dropdown menu
        echo '<select name = "sender" required>';
        echo '<option selected disabled value = "">Choose Sender</option>';

        // Sender's List to choose from
        $query = "SELECT * FROM customers";

            if ($result = $mysqli->query($query)) {

                while ($row = $result->fetch_assoc()) {
                    $id = $row["ID"];
                    $name = $row["Name"];
                    $email = $row["Email"];
                    $balance = $row["Balance"];

                    echo '<option value ='.$id.'>'.$name.'</option>';

                }

        $result->free();
        }
        echo '</select>';

        // Receiver's dropdown menu
        echo '<select name = "receiver" required>';
        echo '<option selected disabled value = "">Choose Receiver</option>';
 
            // Receiver's options
            if ($result = $mysqli->query($query)) {

                while ($row = $result->fetch_assoc()) {
                    $id = $row["ID"];
                    $name = $row["Name"];
                    $email = $row["Email"];
                    $balance = $row["Balance"];

                    echo '<option value ='.$id.' required>'.$name.'</option>';

                }

            $result->free();
        }
        echo '</select>';
        echo '<br>';

        // AMOUNT LABEL
        echo '<label for = "amount"> Enter the amount :</label>';
        echo '<input name = "amount" type = "number" required>';
        echo '<br>';

        // SUBMIT BUTTON
        echo '<input type = "submit" name = "submit" class = "h-button">';
        
        echo '</form>';

        
        ?>

</div>

        