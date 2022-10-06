<?php
require 'layout.php';
//connect to database 
$objConnect = mysqli_connect("localhost","root","")or die("can't connect to database");
$db = mysqli_select_db($objConnect, "mydb");
mysqli_query($objConnect, "SET NAMES utf8");

if($objConnect->connect_error)
{
    die("connection failed". $conn->connect_error);

}

//select data from table 
$sql = "SELECT * FROM promotion";
$result = $objConnect->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Promotion</title>
</head>

<body>
    <?php echo $navbar ;?>
    <div class="container">
        <h1>Promotion</h1><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">รายละเอียก</th>
                    <th scope="col-4">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["promotion_name"]."</td>"."<td>".$row["description"]."</td>"."<td><a class='btn btn-info' href='editPromotion.php?promotion_id=$row[promotion_id]'>"."Edit</a></td>";
                            echo "</tr>";    
                        }
                    }else {
                        echo "0 results";
                    }
                    $objConnect->close();
                ?>
            </tbody>
        </table>
        <a class="btn btn-success" href='insertPromotion.php'>Add New Promotion</a>
    </div>
</body>

</html>