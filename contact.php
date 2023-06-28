<?php include("inc_header.php") ?>

<!-- ======= Contact Section ======= -->
<?php

if (isset($_POST['simpan'])) {
    $email          = $_POST['email'];
    $nama_lengkap   = $_POST['nama_lengkap'];
    $alamat         = $_POST['alamat'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $jk             = $_POST['jk'];
    $no_telepon     = $_POST['no_telepon'];
    $details        = $_POST['details'];

    if ($email == '' or $nama_lengkap == '' or $alamat == '' or $tempat_lahir == '' or $tanggal_lahir == '' or $jk == '' or $no_telepon == '' or $details) {
        $err .= "<p1>Fill all field!</p>";
    }

    $simpansql = "INSERT INTO message(email,nama_lengkap,alamat,tempat_lahir,tanggal_lahir,jk,no_telepon,details) 
                        VALUES('$email','$nama_lengkap','$alamat','$tempat_lahir','$tanggal_lahir','$jk','$no_telepon','$details')";

    echo "$simpansql";
    $result = mysqli_query($koneksi, $simpansql);


    if ($result) {
        echo "<script>alert('Data Berhasil Disimpan');window.location='home.php'</script>";
    }

    if ($email != '') {
        $sql1   = "select email from members where email = '$email'";
        $q1     = mysqli_query($koneksi, $sql1);
        $n1     = mysqli_num_rows($q1);
        if ($n1 > 0) {
            $err .= "<li>Email yang kamu masukkan sudah terdaftar.</li>";
        }

        //validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err .= "<li>Email yang kamu masukkan tidak valid.</li>";
        }
    }
} else {
    $email          = "";
    $nama_lengkap   = "";
    $alamat         = "";
    $tempat_lahir   = "";
    $tanggal_lahir  = "";
    $jk             = "";
    $no_telepon     = "";
    $details        = "";
}
?>
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Contact</h2>
            <p>If you wanna know more about our company, let's get our contact down below</p>
        </div>

        <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch">
                <div class="info">
                    <div class="address">
                        <h4>Location:</h4>
                        <p>Jl. Rawamangun Muka, RT.11/RW.14, Rawamangun, Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                    </div>

                    <div class="email">
                        <h4>Email:</h4>
                        <p>eunoia_jkt@gmail.com</p>
                    </div>

                    <div class="phone">
                        <h4>Call:</h4>
                        <p>(021) 4898486</p>
                    </div>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5239964225443!2d106.87696291399504!3d-6.194377262409019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4ed14403213%3A0x2412a91a0f6a01c8!2sUniversitas%20Negeri%20Jakarta!5e0!3m2!1sid!2sid!4v1671963847991!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="" method="POST" role="form" class="php-email-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Full Name</label>
                            <input type="text" name="nama_lengkap" class="form-control" id="name" value="<?php echo $nama_lengkap ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Number Phone</label>
                            <input type="number" name="no_telepon" class="form-control" value="<?php echo $no_telepon ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Birth Place</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="name" value="<?php echo $tempat_lahir ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Born Date</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $tanggal_lahir ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Gender</label>
                        <br>
                        <input type="radio" name="jk" value="Laki-Laki <?php echo $jk ?>">Male
                        <input type="radio" name="jk" value="Perempuan <?php echo $jk ?>">Female
                    </div>
                    <div class="form-group">
                        <label for="name">Your Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>">

                    </div>
                    <div class="form-group">
                        <label for="name">Address</label>
                        <textarea class="form-control" name="alamat" rows="6" value="<?php echo $alamat ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Messages</label>
                        <textarea class="form-control" name="details" rows="6" value="<?php echo $details ?>"></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit" name="simpan">Send Submit</button></div>
                </form>
            </div>

        </div>

    </div>
</section>
<!-- End Contact Section -->
<?php include_once("inc_footer.php") ?>