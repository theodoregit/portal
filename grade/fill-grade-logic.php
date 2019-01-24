<?php
    $connection = mysqli_connect("localhost", "root", "", "portal");

    //check the connectivity
    if(mysqli_connect_errno()){
        die("Database connection failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
    }

    //hold the values from $_POST
    $student_name = $_POST["std_name"];
    $underscored = str_replace(" ", "_", $student_name);
    $course = $_POST["crs_name"];
    $average = $_POST["ave"];
    $converted = floatval($average);
    $grade = $_POST["grd"];  

    echo $underscored;

    //fetch name of students from database and assign to the option DOM element
    $query1 = "select fullname from students";
    $result1 = mysqli_query($connection, $query1);
    while($row = mysqli_fetch_assoc($result1)){
        $std_name_queried = $row["fullname"];
        if($std_name_queried == $student_name){
            // $query2 = "update " .$underscored. " set average = " .$converted. ", grade = " .$grade. " where course = " .$course. "";
            $query2 = "update {$underscored} set ";
            $query2 .= "average = {$converted}, ";
            $query2 .= "grade = '{$grade}' ";
            $query2 .= "where course = '{$course}'";
            $result2 = mysqli_query($connection, $query2);

            //let's write the query to fill up the table
            $query3 = "insert into roster values('{$student_name}', '{$course}', {$average}, '{$grade}')";
            // $query3 .= "valeues({$student_name}, ";
            // $query3 .= "{$course}, {$average}, {$grade})";

            $result3 = mysqli_query($connection, $query3);
            
            if(!$result2 || !$result3){
                echo "Error";
            }
            else{
                header("Location: fill-grade.php");
            }
        }
    }





    mysqli_close($connection);
?>