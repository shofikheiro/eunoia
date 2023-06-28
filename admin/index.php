<?php include("inc_header.php") ?>
<section id="heroadmin" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Welcome at EUNOIA Admin Page</h1>
                <h2>
                    Hi <b><?php echo $_SESSION['admin_username'] ?></b>,<br>
                    This is Admin Page of Eunoia Profile Website
                </h2>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="../gambar/smart.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>
</section>
<?php include("inc_footer.php") ?>