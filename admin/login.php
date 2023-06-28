<?php
session_start();
if (isset($_SESSION['admin_username']) != '') {
    header("location:index.php");
    exit();
}
include("../inc/inc_koneksi.php");

$username   = "";
$password   = "";
$err        = "";

if (isset($_POST['Login'])) {
    $username       = $_POST['username'];
    $password       = $_POST['password'];

    if ($username == '' or $password == '') {
        $err    = "Silakan masukkan semua isian";
    } else {
        $sql1   = "select * from admin where username = '$username'";
        $q1     = mysqli_query($koneksi, $sql1);
        $r1     = mysqli_fetch_array($q1);
        $n1     = mysqli_num_rows($q1);

        if ($n1 < 1) {
            $err = "Username tidak ditemukan";
        } elseif ($r1['password'] != md5($password)) {
            $err = "Password yang kamu masukkan tidak sesuai";
        } else {
            $_SESSION['admin_username']     = $username;
            header("location:index.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Login Admin</title>
</head>

<body class="login">
    <section>
        <div class="container">
            <form method="POST" class="justify-content-center">
                <h1>Login Admin</h1>
                <?php
                if ($err) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo $err ?>
                    </div>
                <?php
                }
                ?>
                <div class="form-group col-md-4 offset-md-4">
                    <div class="row">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Anda" value="<?php echo $username ?>" />
                    </div>
                    <div class="row">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="Login">Login</button>
            </form>
        </div>
    </section>
</body>

</html>