<?php
include 'header.php';
include_once 'function.php';
if(isset($_POST['username']) && isset($_POST['password']))
 {
       $form_user=$_POST['username'];
       $form_pass=$_POST['password'];
       $user=getUserByUsername($form_user);

       /*debugger($user,true);*/

       if($form_user==$user['username'] && md5($form_pass)==($user['password']))
        { 
           $_SESSION['is_logged_in']=1;
           $_SESSION['success']="welcome to home page!";
           $_SESSION['user_id']=$user['id'];
           $_SESSION['user_role']=$user['role_id'];
           header("location:index.php");
           exit;
        }
        else
            { 
                $_SESSION['error']="Invalid username and password";
                header("location:login.php");
                exit;
            }
       
 }
 else
     {  $value=FALSE;
        $_SESSION['error']="you need to log in first";
        header("location:login.php");
        exit;
     }
?>
