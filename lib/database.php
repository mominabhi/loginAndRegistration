<?php
/**
 * Created by PhpStorm.
 * User: momin
 * Date: 8/2/2018
 * Time: 7:30 PM
 */
session_start();

class database
{
    public function __construct()
    {
        $hostName = "localhost";
        $userName = "root";
        $pass = "";
        $dbName = "user_data";
        $this->conn = mysqli_connect($hostName, $userName, $pass, $dbName);


    }

    public function registration($data)
    {
        $name = $data['name'];
        $user_name = $data['user_name'];
        $email = $data['email'];
        $password = md5($data['password']);
        if ($name == "" OR $user_name == "" OR $email == "" OR $password == "") {
            $msg = "<div class='alert alert-danger'>User Name is too Short.</div>";
            return $msg;
        }
        if (strlen($user_name) < 3) {
            $msg = "<div class='alert alert-danger'>User Name is too Short.</div>";
            return $msg;
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
            $msg = "<div class='alert alert-danger'><strong>ERROR!!</strong>Invalid Email.</div>";
            return $msg;
        }
        $query = "INSERT INTO tbl_user_info(name,user_name,email,password) VALUES ('$name','$user_name','$email','$password')";
        $connected = mysqli_query($this->conn, $query);
        if (isset($connected)) {
            $msg = "<div class='alert alert-success'> Data Inserted Successfully</div>";
            return $msg;
        }

    }

    public function read()
    {
        $query = "SELECT * FROM tbl_user_info";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function login($data)
    {
        $email = $data['email'];
        $pass = md5($data['password']);
        $query = "SELECT * FROM tbl_user_info WHERE email='$email' and password='$pass'";
        $result = mysqli_query($this->conn, $query);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['email'] = $email;

            if (isset($_SESSION['email'])) {
                $data = mysqli_fetch_assoc($result);
                $_SESSION['userName'] = $data['user_name'];
                $_SESSION['name'] = $data['name'];
                header("Location:index.php");

            }
//            else {
//                header("Location:login.php");
//            }
        } else {
            echo " <div class='alert alert-danger'>Invalid Email and Password</div>";
        }


    }

    public function view_profile($id)
    {
        $query = "SELECT * FROM tbl_user_info WHERE id='$id'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function update($data)
    {
        $query = "UPDATE tbl_user_info SET name='$data[name]',user_name='$data[user_name]',email='$data[email]' WHERE id='$data[id]'";
        mysqli_query($this->conn, $query);
        header("Location:index.php");
    }

    public function checkpassword($id, $old_pass)
    {
        $query = "SELECT password FROM tbl_user_info WHERE id='$id' AND password='$old_pass'";
        $result = mysqli_query($this->conn, $query);
        return $result->num_rows;
    }

    public function changePassword($data)
    {
        $old_pass = md5($data['old_password']);
        $pass = md5($data['password']);
        $id = $data['id'];
        $chek = $this->checkpassword($id, $old_pass);
        if ($chek == 0) {
            echo "<div class='alert alert-danger'>Please Enter the old password in rightly</div>";
        } else {
            $query = "UPDATE tbl_user_info SET password='$pass' WHERE id='$data[id]'";
            mysqli_query($this->conn, $query);
            echo "<div class='alert alert-success'>Password Changed.</div>";

        }


    }

}