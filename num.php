<?php include "config/database.php"?>
<?php
    if(isset($_POST["submit"])){
        $number = $_POST['number'];
        $query = "INSERT INTO user value('$number')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<script>alert('success')</script>";
        }else{
            echo "fail";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP</h1>
    <form action="num.php" method="POST">
        <input type="text" placeholder="write something" name="number">
        <button type="submit" name="submit">Submit </button>
    </form>
</body>
</html>