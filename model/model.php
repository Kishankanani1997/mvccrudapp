<?php
class model 
{
    public $connection="";
    public function __construct()
    {
        session_start();
        // database connection
        try
        {

            // local connection
             $this->connection=new mysqli("localhost","root","","mvcappdata");
            //echo "Connection success";

            // server connection
            //$this->connection=new mysqli("sql201.byethost32.com","b32_33349345","K12345","b32_33349345_mvcappdata");

        }
        catch(Exceptions $e)
        {
            die(mysqli_error($this->connection,$e));
        }
    }

    // here we create a member function to select all data
    public function selectallthedata($table)
    {
        $select="select * from $table";
        $execute=mysqli_query($this->connection,$select);
        while($fetch=mysqli_fetch_array($execute))
        {
            $arr[]=$fetch;
        }
        return $arr;
    } 

    // here we create a member function to insert all data
    public function insertallthedata($table,$data)
    {
        $column=array_keys($data);
        $column1=implode(",",$column);
        
        $value=array_values($data);
        $value1=implode("','",$value);

        $insert="insert into $table($column1) values('$value1')";
        $execute=mysqli_query($this->connection,$insert);
        return $execute; 
    }

    // create a member function for loggin as customer
    public function loginuser($table,$email,$pass)
    {
        $select="select * from $table where email='$email' and password='$pass'";
        $exe=mysqli_query($this->connection,$select);
        $fetch=mysqli_fetch_array($exe);
        $no_rows=mysqli_num_rows($exe);
        if($no_rows==1)
        {
            $_SESSION["user_id"]=$fetch["user_id"];
            $_SESSION["name"]=$fetch["name"];
            $_SESSION["email"]=$fetch["email"];
            return true;
        }
        else 
        {
            return false;
        }
    }


       // create a member function for select one data with join
       public function selectallthedata1($table,$table1,$table2,$column,$where,$where1,$id)
       {
           $select="select * from $table join $table1 on $where join $table2 on $where1 where $column='$id'";
           $execute=mysqli_query($this->connection,$select);
           $fetch=mysqli_fetch_array($execute);
           $arr[]=$fetch;
           return $arr;
       } 

       //here we create a member function for forgot password
       public function forgotpassword($table,$column,$email)
       {
        
            $select="select password from $table where $column='$email'";
            $execute=mysqli_query($this->connection,$select);
            $fetch=mysqli_fetch_array($execute);
            $num_rows=mysqli_num_rows($execute);
            $pass=base64_decode($fetch["password"]);
            if($num_rows==1)
            {
                return $pass;
            }
            else
            {
                return false;
            }
       }


       // here we create member function for updating data
    //    public function updatedata($table,$name,$email,$pass,$number,$path,$state,$city,$column,$id)
    //    {
        
    //     $update="update $table set name='$name',email='$email',password='$pass',number='$number',photo='$path',state_id='$state',city_id='$city' where $column='$id'";
    //     $execute=mysqli_query($this->connection,$update);
    //     return $execute;

    //    }


       // here we create member function for removing the profile
       public function removeprofile($table,$id)
       {
        $column=array_keys($id);
        $column1=implode(",",$column);
        
        $value=array_values($id);
        $value1=implode("','",$value);

        $delete="delete from $table where $column1='$value1'"; 
        $exe=mysqli_query($this->connection,$delete);
        return $exe;
       }


       // here we create a member function for changing the password
       public function changepassword($table,$oldpass,$newpass,$conpass,$column,$id)
       {
        $select="select password from $table where $column='$id'";
        $execute=mysqli_query($this->connection,$select);
        $fetch=mysqli_fetch_array($execute);
        $pass=$fetch["password"];
        if($pass==$oldpass && $newpass==$conpass)
        {
            $update="update $table set password='$newpass' where $column='$id'";
            $execute=mysqli_query($this->connection,$update);
            return $execute;
        }
        else 
        {
            return false;
        }
       }

        // here we create member function for user logout
        public function logout()
        {
            unset($_SESSION["user_id"]);
            unset($_SESSION["name"]);
            unset($_SESSION["email"]);
            session_destroy();
            return true;
        }

}
?>