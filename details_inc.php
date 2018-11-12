<?php
    include_once 'db.php';
    session_start();

    
    $user = $_SESSION['id'];

    $first = mysqli_real_escape_string($conn, $_POST['fname']);
	$last = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $showing = mysqli_real_escape_string($conn, $_POST['showing']);

    $change = (int)$showing;
  
        $sql = "SELECT * from users4 WHERE u_id='$user'";
        $result = mysqli_query($conn,$sql);
        $result_check = mysqli_num_rows($result);

			if($result_check == 0){
                echo 'user not found!';
                if($_SESSION['teacher'] == 1){
                    header("Location: tech_pro.php?wrong password");
                }else{
                    header("Location: stud_pro.php?wrong password");
                }
				exit();
            }
            else{
                if(empty($first) || empty($last) || empty($email) || empty($phone)){
                    if($_SESSION['teacher'] == 1){
                        header("Location: tech_pro.php?empty_fields");
                        exit();
                    }else{
                        header("Location: stud_pro.php?empty_fields");
                        exit();
                    }
                }
                $sql = "UPDATE users4 SET fname='$first' WHERE u_id='$user'";
                $result = mysqli_query($conn,$sql);
                $sql = "UPDATE users4 SET lname='$last' WHERE u_id='$user'";
                $result = mysqli_query($conn,$sql);
                $sql = "UPDATE users4 SET email='$email' WHERE u_id='$user'";
                $result = mysqli_query($conn,$sql);
                $sql = "UPDATE users4 SET phone='$phone' WHERE u_id='$user'";
                $result = mysqli_query($conn,$sql);

                if($change == 1){
                    $pwd = mysqli_real_escape_string($conn, $_POST['c_pwd']);
                    $newpwd = mysqli_real_escape_string($conn,$_POST['n_pwd']);
                    $repwd = mysqli_real_escape_string($conn,$_POST['ren_pwd']);
                    
                    if(empty($pwd) || empty($newpwd) || empty($repwd)){
                        if($_SESSION['teacher'] == 1){
                            header("Location: tech_pro.php?empty_fields");
                            exit();
                        }else{
                            header("Location: stud_pro.php?empty_fields");
                            exit();
                        }
                    }
                    if(password_verify($pass,$row['pass'])){
                        //check whether the two passwords are same
                        if($newpwd === $repwd){
                            $hashpwd = password_hash($newpwd,PASSWORD_DEFAULT);
                            $sql = "UPDATE users4 SET pass='$hashpwd' WHERE u_id='$user'";
                            $result = mysqli_query($conn,$sql);
                        }
                        else{
                            if($_SESSION['teacher'] == 1){
                                header("Location: tech_pro.php?passwords_do_not_match");
                                exit();
                            }else{
                                header("Location: stud_pro.php?passwords_do_not_match");
                                exit();
                            }
                        }
                    }
                    else{
                        if($_SESSION['teacher'] == 1){
                            header("Location: tech_pro.php?wrong_password");
                            exit();
                        }else{
                            header("Location: stud_pro.php?wrong_password");
                            exit();
                        }
                    }
                }
                else{
                    if($_SESSION['teacher'] == 1){
                        header("Location: tech_pro.php?details_changed");
                        exit();
                    }else{
                        header("Location: stud_pro.php?details_changed");
                        exit();
                    }
                }
            }
?> 