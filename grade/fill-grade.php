<!DOCTYPE html>
<html lang="en">
        <?php
        $connection = mysqli_connect("localhost", "root", "", "portal");

        $query = "select * from roster";
        $result = mysqli_query($connection, $query);
        
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
                height: 120%;
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
            #ave{
                width: 10%;
            }
            
        </style>
</head>
<body>
        <header class="row">
            <h1 id="heading"><a href="../index.html">ABC University</a></h1>
        </header>
        <div class="container">
            <ul>
                <li id="li-usr"><a href="#"></a></li>
                <li id="li-log"><a href="../teacher/login.html">Logout</a></li>
            </ul>
            <form role="form" class="form-inline" action="fill-grade-logic.php" method="POST">
                <div class="form-group">
                        <label for="student">Student</label>
                        <!-- <select class="form-control" name="std_name">
                            <option>Abebe Banteyirgu</option>
                            <option>bob marley</option>
                            <option>belachew girma</option>
                            <option>gete zeru</option>
                            <option>tewodros yesmaw</option>
                            <option>Mekite</option>
                            <option>meyisaw kassa</option>
                            <option>geru gebre</option>
                        </select> -->
                    <input type="text" class="form-control" name="std_name">
                    <label for="course">Course</label>
                    <select class="form-control" name="crs_name">
                        <option>Programming</option>
                        <option>Logic</option>
                        <option>Writing</option>
                    </select>                    
                    <label for="aver">Average</label>
                    <input type="text" id="ave" class="form-control" name="ave">
                    <label for="grd">Grade</label>
                    <select class="form-control" name="grd">
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>F</option>
                        <option>NG</option>
                    </select>
                </div><br>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            <table class="table table-striped table-bordered">
                    <!-- <caption>Student's Grade</caption> -->
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Average</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                        <?php
                            while($row = mysqli_fetch_array($result)):;
                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><?php echo $row[3]; ?></td>
                        </tr>   
                        <?php endwhile; ?>                     
                    </tbody>
                </table>
        </div>
        
    
        <script src="../jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
            mysqli_close($connection);
        ?>
    </body>
</html>