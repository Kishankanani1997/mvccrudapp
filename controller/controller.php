<?php
require_once("model/model.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
error_reporting(0);

class controller extends model
{
    public function __construct()
    {
        parent ::__construct();
        //here fetching the data in users state dropdown list
        $showstate=$this->selectallthedata('tbl_state');

        //here fetching the data in user city dropdown list
        $showcity=$this->selectallthedata('tbl_city');

        //here we add user in user data or tbl_user
        if(isset($_POST["submit"]))
        {
            require 'phpmailer/Exception.php';
            require 'phpmailer/PHPMailer.php';
            require 'phpmailer/SMTP.php';
            try 
            {
                $email=$_POST["email"];
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 3;									
                $mail->isSMTP();											
                $mail->Host	 = 'smtp.gmail.com;';					
                $mail->SMTPAuth = true;					
                $mail->Username = 'kishankanani59@gmail.com';				
                $mail->Password = 'apxuvgluxiipyplr';						
                $mail->SMTPSecure = 'tls';							
                $mail->Port	 = 587;
                $mail->setFrom('kishankanani59@gmail.com', 'Kishan Patel');
                $mail->addAttachment('assets/img/image.png','new.png');

                $mail->addAddress($_POST["email"]);
                $mail->isHTML(true);
                $mail->Subject = 'Thanks for Creating Account with us we will get in touch with you shortly.';
                $mail->Body = "<p>Thank you for choosing us. Your support means a lot to us. Have a Nice Day & keep Shopping with us.</p>";
                $mail->send();

            }
            catch (Exception $e)
            {
                echo "Message could not be sent . Mailer Error:" .$mail->ErrorInfo;
            }    
            // here we will upload file or image
            $name=$_POST["name"];
            $email=$_POST["email"];
            $pass=base64_encode($_POST["pass"]);
            $cpass=base64_encode($_POST["cpass"]);
            $number=$_POST["number"];
            $tmp_name=$_FILES["img"]["tmp_name"];
            $path="upload/users/".$_FILES["img"]["name"];
            move_uploaded_file($tmp_name,$path);
            $state=$_POST["state"];
            $city=$_POST["city"];

            if($pass==$cpass)
            {   
                $data=array("name"=>$name,"email"=>$email,"password"=>$pass,"number"=>$number,"photo"=>$path,"state_id"=>$state,"city_id"=>$city);
                $check=$this->insertallthedata('tbl_user',$data);

                    if($check)
                {
                    echo "<script>
                    alert('User succefully Added');
                    window.location='./';
                    </script>";
                }
            }
                else
                {
                    echo "<script>
                        alert('Confirm Password does not match try again');
                        window.loaction='./';
                        </script>";
                }
        }

        // show all data 
        $shwdata=$this->selectallthedata('tbl_user');

        
        // here we write code for logged in as customer or user 
        if(isset($_POST["login"]))
        {
            $email=$_POST["email"];
            $pass=base64_encode($_POST["pass"]);
            $login=$this->loginuser('tbl_user',$email,$pass);

            if($login)
            {
               echo "<script>
               alert('You are Logged in Successfully')
               window.location='manage-profile';
               </script>";
            }
            else 
            {

                echo "<script>
                alert('Your email and password are Incorrect try again')
                window.location='login-here';
                </script>";
            }
        }

        // manage profile or show profile of looged in user
        if(isset($_SESSION["user_id"]))
        {
            $id=$_SESSION["user_id"];
            $showuser1=$this->selectallthedata1('tbl_user','tbl_state','tbl_city','user_id','tbl_user.state_id=tbl_state.state_id','tbl_user.city_id=tbl_city.city_id',$id);
        }

        //code for  forgot passowrd 
        if(isset($_POST["forgot"]))
        {
            require 'phpmailer/Exception.php';
            require 'phpmailer/PHPMailer.php';
            require 'phpmailer/SMTP.php'; 
        try
            {
                $email=$_POST["email"];
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 3;									
                $mail->isSMTP();											
                $mail->Host	 = 'smtp.gmail.com;';					
                $mail->SMTPAuth = true;					
                $mail->Username = 'kishankanani59@gmail.com';				
                $mail->Password = 'apxuvgluxiipyplr';						
                $mail->SMTPSecure = 'tls';							
                $mail->Port	 = 587;
                $mail->setFrom('kishankanani59@gmail.com', 'Forgot Password');
            
                $mail->addAddress($_POST["email"]);
                $mail->isHTML(true);
                $check=$this->forgotpassword('tbl_user','email',$email);
                $mail->Subject = 'The Password you have forgot is mailed to you.';
                $mail->Body = "<p>Your Forgotted Passsword is :$check</p>";
                $mail->send();

                echo "<script>
                alert('We successfully send password on your email Address');
                window.location ='login-here';  
                </script>";
            }
            catch (Exception $e)
            {
                    echo "<script>
                     alert('Your email does not register with us try again')
                     window.location='forgetpassword';
                    </script>";

                echo "Message could not be sent . Mailer Error:" .$mail->ErrorInfo;
            }

        }

        // here we write code to remove the profile
        if(isset($_GET["remove"]))
        {
            $removeid=$_GET["remove"];
            $id=array("user_id"=>$removeid);
            $check=$this->removeprofile('tbl_user',$id);
            if($check)
            {
                // unset($_SESSION["user_id"]);
                // unset($_SESSION["name"]);
                // unset($_SESSION["email"]);
                // session_destroy();
                echo "<script>
                alert('Your account removed successfully')
                window.location='login-here';
                </script>";  
            }  
            else
            {  
                echo "<script>
                alert('something went wrong')
                window.location='./';
                </script>";
            }
        }

        // here we write code for updating the data
        // if(isset($_POST["update"]))
        // {
        //     $id=$_SESSION["user_id"];

        //     $name=$_POST["name"];
        //     $email=$_POST["email"];
        //     $pass=base64_encode($_POST["pass"]);
        //     $cpass=base64_encode($_POST["cpass"]);
        //     $number=$_POST["number"];
        //     $tmp_name=$_FILES["img"]["tmp_name"];
        //     $path="upload/users/".$_FILES["img"]["name"];
        //     move_uploaded_file($tmp_name,$path);
        //     $state=$_POST["state"];
        //     $city=$_POST["city"];

        //     $check=$this->updatedata('tbl_user',$name,$email,$pass,$number,$path,$state,$city,'user_id',$id);
        //     if($check)
        //     {
        //         echo "<script>
        //         alert('Account updated succesfully')
        //         window.location='manage-profile';
        //         </script>";
        //     }
        //     else
        //     {
        //         echo "<script>
        //         alert('Some Items does not work properly')
        //         window.location='manage-profile';
        //         </script>";
        //     }
        // }


        // here we write code for change password
        if(isset($_POST["change"]))
        {
            $id=$_SESSION["user_id"];
            $oldpass=base64_encode($_POST["oldpass"]);
            $newpass=base64_encode($_POST["newpass"]);
            $conpass=base64_encode($_POST["conpass"]);
            $check=$this->changepassword('tbl_user',$oldpass,$newpass,$conpass,'user_id',$id);

            if($check)
            {
                unset($_SESSION["user_id"]);
                unset($_SESSION["email"]);
                unset($_SESSION["name"]);
                session_destroy();
                echo "<script>
                alert('You have changed your password successfully')
                window.location ='login-here';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Your old password, new password & confirm password does not match correctly')
                window.location ='change-password';
                </script>";
            }
        }

        // here we write code for user logout
        if(isset($_GET["logout"]))
        {
            $check=$this->logout();
            if($check)
            {
                echo "<script> 
                alert('You are successfully logout')
                window.location='login-here';
                </script>";
            }
        }

        


        // load tempelate here
        if(isset($_SERVER["PATH_INFO"]))
        {
            switch($_SERVER["PATH_INFO"])
            {
                case'/':
                    require_once("index.php");
                    require_once("header.php");
                    require_once("content.php");
                    require_once("register.php");
                    break;

                case '/login-here':
                    require_once("index.php");
                    require_once("header.php");
                    require_once("login.php");
                    require_once("register.php");
                    break;

                case '/manage-profile':
                    require_once("index.php");
                    require_once("header.php");
                    require_once("manageprofile.php");   
                    break; 

                case '/manage-notification':
                    require_once("index.php");
                    require_once("header.php");
                    require_once("managenotification.php");   
                    break;  

                case '/change-password':
                    require_once("index.php");
                    require_once("header.php");
                    require_once("changepassword.php");   
                    break;  
                    
                case '/forgot-password':
                    require_once("index.php");
                    require_once("header.php");
                    require_once("forgotpassword.php");   
                    require_once("register.php");
                    break;        
                
                default:
                    require_once("index.php");
                    require_once("header.php");
                    require_once("404.php");
                    break;   

            }
        }
    }
}
$obj= new controller;
?>