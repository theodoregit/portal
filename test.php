<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
</head>
<body>
    <?php
        echo "hello world";
        $item = 5;
        $item2 = 6;
        echo $item;
        $str = "string ";
        $str2 = "example";
        echo "<br/>";
        
        if($item > $item2){
            echo $item;
        }
        elseif($item < $item2){
            echo $item2;
        }
        else{
            echo "equal";
        }

        echo "<br/>";
        $var3 = 10;
        while($var3 >= 0){
            echo $var3;
            echo "<br/>";
            $var3  -= 1;
        }
        echo "<br/>";
        for($var4 = 0; $var4 < 10; $var4++){
            echo $var4;
            
        }
        echo "<br/>";
        function foo(){
            echo "my first php function.";
        }
        foo();
        echo "<br/>";
        function add($num1, $num2){
            return $num1 + $num2;
        }
        echo add(5, 9);
        
    ?>
    <?php
    //let's connect mysql server

    $connection = mysqli_connect("localhost", "root", "", "portal");

    //check the connectivity
    if(mysqli_connect_errno()){
        die("Database connection failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
    }

    //close the connection
    mysqli_close($connection);


    function add($no1, $no2){
        return $no1 + $no2;
    }

    a
?>

</body>
</html>