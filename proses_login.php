<?php  
   session_start();
   include "koneksi.php";
   
   $username = isset($_POST['username']) ? htmlentities($_POST['username']) : "";
   $password = isset($_POST['password']) ? md5(htmlentities($_POST['password'])) : "";
   
   if (!empty($_POST['submit_validate'])) {
       $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'");
       $hasil = mysqli_fetch_array($query);
       
       if ($hasil) {
           $_SESSION['username_dorawingo'] = $username;
           $_SESSION['level_dorawingo'] = $hasil['level'];
           header('location:../main.php');
        }else{ ?>
        <script>
            alert('username atau password yang anda masukkan salah');
            window.location='../login.php'
        </script>
    <?php
        }
    }
?>