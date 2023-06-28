<?php include_once("inc_header.php") ?>

<!-- untuk partners -->
<section id="partners">
    <div class="partners">
        <div class="row">
            <h2>Partners</h2>
        </div>

        <div class="partner-list">
            <?php
            $sql1   = "select * from partners order by id asc";
            $q1     = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_assoc($q1)) {
            ?>
                <div class="kartu-partner">
                    <a href="<?php echo buat_link_partners($r1['id']) ?>">
                        <img src="<?php echo url_dasar() . "/gambar/" . partners_foto($r1['id']) ?>" />
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<?php include_once("inc_footer.php") ?>