<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php

session_start();
function Connection()
{
    $connection = new mysqli('127.0.0.1', 'root', '', 'php_student_managment');
    return $connection;
}

function Register()
{
    if (isset($_POST['btn_register'])) {
        // echo 123;
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $avatar = $_FILES['avatar']['name'];

        // echo $username . $email . $password . $avatar;
        if (!empty($username) && !empty($email) && !empty($password) && !empty($avatar)) {
            $avatar = rand(1, 999) . '-' . $avatar;
            $path = './assets/avatar/' . $avatar;
            move_uploaded_file($_FILES['avatar']['tmp_name'], $path);

            $password = md5($password);

            $sql = "INSERT INTO `users`(`username`, `email`, `password`, `avatar`) VALUES ('$username','$email','$password','$avatar')";
            $result = Connection()->query($sql);

            if ($result) {
                header('location:login.php');
            }
        } else {
            echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Error!",
                            text: "Please fill all fields.",
                            icon: "error",
                            button: "Done",
                        });
                    });
                </script>
            ';
        }
    }
}
Register();

function Login()
{
    if (isset($_POST['btn_login'])) {
        $nameEmail = $_POST['name_email'];
        $password = $_POST['password'];

        // echo $nameEmail . $password;

        if (!empty($nameEmail) && !empty($password)) {
            $password = md5($password);
            $sql = "SELECT * FROM `users` WHERE (`email`='$nameEmail' OR `username`='$nameEmail') AND `password`='$password'";

            $result = Connection()->query($sql);
            $row = mysqli_fetch_assoc($result);

            if (!empty($row)) {
                $_SESSION['users'] = $row['id'];
                header('location:index.php');
            } else {
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Error!",
                                text: "Wrong Username, Email, or Password!!",
                                icon: "error",
                                button: "Done",
                            });
                        });
                    </script>                        
                ';
            }
        } else {
            echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Error!",
                            text: "Please fill all fields.",
                            icon: "error",
                            button: "Done",
                        });
                    });
                </script>            
            ';
        }
    }
}
Login();