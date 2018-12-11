<?php
    include_once 'db.php';
    session_start();

    $un = mysqli_real_escape_string($conn,$_POST['user']);
    $picnum = mysqli_real_escape_string($conn,$_POST['picnum']);


    $sql = "SELECT * FROM users4 WHERE u_id = '$un'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    /* $sql2 = "SELECT count(*) as cnt FROM ppics WHERE u_id = '$un'";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result2); */
    
    $picloc = "plotterpics/test".$un.$picnum.".png";
    echo $picloc;
?>

<html>
    <head>
        <style>
            .imgplace{
                width: 1000px;
                height: 500px;
                border: solid 2px black;
            }
        </style>
    </head>
    <body>
        <h1> 2D - Plotter Experiment </h1>
        <h4> Done by <?php echo $row['fname']." ".$row['lname']; ?> </h4><br><br>
        <img class="imgplace" src="<?php echo $picloc; ?>">

    </body>
</html>