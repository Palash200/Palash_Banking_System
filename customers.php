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
 
    <!--TRANSFER BUTTON-->
    <div style="display : block; text-align : center; margin : auto auto 20px auto">
        <h1 class="c-title">Customer Table</h1>
        <a href="transfer.php" class="h-button">Transfer Money</a>
    </div>


    <!-- TABLE  -->
    <div>
        <?php
    
        // Establishing Connection to Database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "table";
        $mysqli = new mysqli($servername, $username, $password, $database);

        // Displaying the Table
        $query = "SELECT * FROM customers";

        echo '<table> 
            <thead>
            <tr> 
                <th> ID </th> 
                <th> Name </th> 
                <th> Email </th> 
                <th> Balance </th> 
            </tr>
            </thead>';

            echo '<tbody>';

            if ($result = $mysqli->query($query)) {

                while ($row = $result->fetch_assoc()) {
                    $id = $row["ID"];
                    $name= $row["Name"];
                    $email = $row["Email"];
                    $balance= $row["Balance"];

                    echo '<tr>';
                    echo '<td>'.$id.'</td>';
                    echo '<td>'.$name.'</td>';
                    echo '<td>'.$email.'</td>';
                    echo '<td>'.$balance.'</td>';
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