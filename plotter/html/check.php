<?php
    include_once '../../db.php';
    session_start();
    
    //$obj = json_decode($_GET["b"],false);

    $uid = $_SESSION['id'];
        
        $s = "SELECT * FROM token order by token_num DESC LIMIT 1";
        $r = mysqli_query($conn,$s);
        $n = mysqli_fetch_assoc($r);
        $n1 = $n['token_num']+1;
    
        $empty = "SELECT * FROM token";
        $result = mysqli_query($conn,$empty);
        $num_of_ppl = mysqli_num_rows($result);

        $tnum = 0;    

        if($num_of_ppl == 0){
            //no users found
            $d = time();
            $sql = "INSERT INTO token VALUES ('$uid','$d','$n1')";
            $result = mysqli_query($conn,$sql);
            $tnum = 1;
        }
        else if($num_of_ppl > 0)
        {
            //check whether he is there in the queue or not
            $sql = "SELECT * FROM token WHERE u_id IN ('$uid')";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_num_rows($result);

            if($num_of_ppl == 1 && $row == 1){
                //he is the only 1 left
                $tnum = 1;
            }

            if($row == 0){
                //he is here for the first time
                $d = time();
                $sql = "INSERT INTO token VALUES ('$uid','$d','$n1')";
                $result = mysqli_query($conn,$sql);
                $tnum = 0;
                
            }else if($num_of_ppl > 1){
                //check if he is the first among them
                $sql2 = "SELECT * FROM token ORDER BY ttoken ASC";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_assoc($result2);
                if($row2['u_id']== $uid)
                    $tnum =1;
                else{
                    $tnum = 0;
                }
            }

        }
        $t = Array($tnum);
        echo json_encode($t);
?>