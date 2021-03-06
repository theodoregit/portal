<!DOCTYPE html>
<html lang="en">
    <?php
        $connection = mysqli_connect("localhost", "root", "", "portal");

        //let's use our session variable
        session_start();
        $new_comer = $_SESSION["idnumber"];
        $queried_name = "";
        
        $query2 = "select fullname from students ";
        $query2 .= "where idnumber = '{$new_comer}'";

        $result2 = mysqli_query($connection, $query2);
        while($row = mysqli_fetch_assoc($result2)){
            $queried_name = $row["fullname"];
        }
        $underscored = str_replace(" ", "_", $queried_name);

        $query = "select * from {$underscored}";
        $result = mysqli_query($connection, $query);
        // echo $underscored;


        //let's calculate the GPA here
        $query3 = "select grade from {$underscored}";
        $result3 = mysqli_query($connection, $query3);
        $sum = 0;
        while($row = mysqli_fetch_assoc($result3)){
            $grd = $row["grade"];
            switch($grd){
                case 'A':
                    $sum += 4;
                    break;
                case 'B':
                    $sum += 3;
                    break;
                case 'C':
                    $sum += 2;
                    break;
                case 'D':
                    $sum += 1;
                    break;
                default:
                    $sum += 0;
                    break;
            }
        }
        $gpa = $sum / 3;
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>abc-university-view-grade</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />    
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
            body{
                background-image: url("../img/Desktop-Backgrounds-Hd.jpg");
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center;
                
            }
            #heading{
                font-size: 110px;
                margin-left: 5%;
                color: cadetblue;
                border-bottom: white solid;
                border-right: white solid;
                border-radius: 75px;
            }
            #heading a{
                text-decoration-line: none;
                text-decoration-color: cadetblue;            
            }
            .container{
                margin-top: 10px;
                text-align: center;
                width: 80%;
                height: 450px;
                border: rgb(131, 179, 180);
                background-color: rgb(131, 179, 180);
                opacity: 0.7;
                border-radius: 15px;
            }
            .img-rounded{
                float: left;
                margin-top: 5px;
            }
            h2{
                font-size: 40px;
                font-family: sans-serif;
                margin-top: 20px;
                margin-right: 30%;
            }
            form{
                margin-top: 95px;
            }
            .row{
                margin-top: 25px;
            }
            #login{
                margin-right: 10%;
            }
            #clear{
                margin-left: 10%;
            }
            ul{
                list-style: none;
                display: inline;
            }
            li{
                display: inline;
            }
            #li-usr{
                float: left;
                color: black;
                font-size: 45px;
            }
            #li-log{
                float: right;
                margin-top: 5px;
            }
            #li-usr a{
                text-decoration-line: none;
                color: black;
            }
            #li-log a{
                text-decoration-line: none;
                color: rgb(245, 243, 243);
                background-color: rgb(0, 2, 3);
                font-size: 20px;
                border-radius: 5px;
                text-align: center;                
            }
            #li-log a :hover{
                color: black;
                background-color: rgb(245, 243, 243);
            }
            .table{
                margin-top: 80px;
            }
            
        </style>
</head>
<body>
        <header class="row">
            <h1 id="heading"><a href="../index.html">ABC University</a></h1>
        </header>
        <div class="container">
            <ul>
                <li id="li-usr"><a href="#">
                    <?php
                        echo $queried_name;
                    ?>
                </a></li>
                <li id="li-log"><a href="../student/login.html">Logout</a></li>
            </ul>
            <table class="table table-striped table-bordered">
                <!-- <caption>Student's Grade</caption> -->
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Average</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <?php
                    while($row = mysqli_fetch_array($result)):;
                ?>
                <tbody>
                    <tr class="success">
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                    </tr>
                    <?php endwhile; ?>
                    <!-- <tr class="danger">
                        <td>Writing</td>
                        <td>45</td>
                        <td>D</td>
                    </tr>
                    <tr class="warning">
                        <td>Logic</td>
                        <td>50</td>
                        <td>C</td>
                    </tr> -->
                </tbody>
            </table>
            <table>
                <tr>
                    <td>GPA</td>
                    <td>=</td>
                    <td>
                        <?php
                            echo $gpa;
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    
        <script src="../jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <?php
            mysqli_close($connection);
        ?>
    </body>
</html>