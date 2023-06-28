<?php include("inc_header.php") ?>
<section class="adminhome">
    <?php
    $nama       = "";

    $isi        = "";
    $foto       = "";
    $foto_name  = "";

    $error      = "";
    $sukses     = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = "";
    }

    if ($id != "") {
        $sql1   = "select * from partners where id = '$id'";
        $q1     = mysqli_query($koneksi, $sql1);
        $r1     = mysqli_fetch_array($q1);
        $nama   = $r1['nama'];
        $isi    = $r1['isi'];
        $foto   = $r1['foto'];

        if ($isi == '') {
            $error  = "The Data Not Found";
        }
    }

    if (isset($_POST['simpan'])) {
        $nama      = $_POST['nama'];
        $isi        = $_POST['isi'];

        if ($nama == '' or $isi == '') {
            $error     = "Input all field";
        }
        if ($_FILES['foto']['name']) {
            $foto_name = $_FILES['foto']['name'];
            $foto_file = $_FILES['foto']['tmp_name'];

            $detail_file = pathinfo($foto_name);
            $foto_ekstensi = $detail_file['extension'];
            $ekstensi_yang_diperbolehkan = array("jpg", "jpeg", "png", "gif");
            if (!in_array($foto_ekstensi, $ekstensi_yang_diperbolehkan)) {
                $error = "Ekstention allowed is jpg, jpeg, png and gif";
            }
        }

        if (empty($error)) {
            if ($foto_name) {
                $direktori = "../gambar";

                @unlink($direktori . "/$foto");
                $foto_name = "partners_" . time() . "_" . $foto_name;
                move_uploaded_file($foto_file, $direktori . "/" . $foto_name);

                $foto = $foto_name;
            } else {
                $foto_name = $foto;
            }

            if ($id != "") {
                $sql1   = "update partners set nama = '$nama',foto='$foto_name',isi='$isi',tgl_isi=now() where id = '$id'";
            } else {
                $sql1    = "insert into partners(nama,foto,isi) values ('$nama','$foto_name','$isi')";
            }

            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Input data Success";
            } else {
                $error      = "Input data Failed";
            }
        }
    }


    ?>
    <h1>Input Data Partners Admin Page</h1>
    <div class="mb-3 row">
        <a href="partners.php">
            << Back to Partners Admin Page</a>
    </div>
    <?php
    if ($error) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
    <?php
    }
    ?>
    <?php
    if ($sukses) {
    ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $sukses ?>
        </div>
    <?php
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Instantion</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="nama" value="<?php echo $nama ?>" name="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-7">
                <?php
                if ($foto) {
                    echo "<img src='../gambar/$foto' style='max-height:100px;max-width:100px'/>";
                }
                ?>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="isi" class="col-sm-2 col-form-label">Details</label>
            <div class="col-sm-7">
                <textarea name="isi" class="form-control" id="summernote"><?php echo $isi ?></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-7">
                <input type="submit" name="simpan" value="Submit Data" class="btn btn-primary" />
            </div>
        </div>
    </form>
</section>
<?php include("inc_footer.php") ?>