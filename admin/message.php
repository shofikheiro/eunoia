<?php include("inc_header.php") ?>
<section class="adminhome">
    <?php
    $sukses = "";
    $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    if ($op == 'delete') {
        $id = $_GET['id'];
        $sql1   = "delete from message where id = '$id'";
        $q1     = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses     = "Berhasil hapus data";
        }
    }
    ?>
    <h1>Messages</h1>
    <?php
    if ($sukses) {
    ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $sukses ?>
        </div>
    <?php
    }
    ?>
    <form class="row g-3" method="get">
        <div class="col-auto">
            <input type="text" class="form-control" placeholder="Insert a Keyword" name="katakunci" value="<?php echo $katakunci ?>" />
        </div>
        <div class="col-auto">
            <input type="submit" name="cari" value="Find a message" class="btn btn-secondary" />
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-sm-1">#</th>
                <th class="col-sm-1">Email</th>
                <th class="col-sm-1">Name</th>
                <th class="col-sm-2">Address</th>
                <th class="col-sm-1">Birth Place</th>
                <th class="col-sm-1">Birth Date</th>
                <th class="col-sm-1">Gender</th>
                <th class="col-sm-1">Phone</th>
                <th class="col-sm-3">Messages</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqltambahan = "";
            $per_halaman = 5;
            if ($katakunci != '') {
                $array_katakunci = explode(" ", $katakunci);
                for ($x = 0; $x < count($array_katakunci); $x++) {
                    $sqlcari[] = "(nama_lengkap like '%" . $array_katakunci[$x] . "%' or details like '%" . $array_katakunci[$x] . "%')";
                }
                $sqltambahan    = " where " . implode(" or ", $sqlcari);
            }
            $sql1   = "select * from message $sqltambahan";
            $page   = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $mulai  = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
            $q1     = mysqli_query($koneksi, $sql1);
            $total  = mysqli_num_rows($q1);
            $pages  = ceil($total / $per_halaman);
            $nomor  = $mulai + 1;
            $sql1   = $sql1 . " order by id desc limit $mulai,$per_halaman";
            $q1     = mysqli_query($koneksi, $sql1);

            while ($r1 = mysqli_fetch_array($q1)) {
            ?>
                <tr>
                    <td><?php echo $nomor++ ?></td>
                    <td><?php echo $r1['email'] ?></td>
                    <td><?php echo $r1['nama_lengkap'] ?></td>
                    <td><?php echo $r1['alamat'] ?></td>
                    <td><?php echo $r1['tempat_lahir'] ?></td>
                    <td><?php echo $r1['tanggal_lahir'] ?></td>
                    <td><?php echo $r1['jk'] ?></td>
                    <td><?php echo $r1['no_telepon'] ?></td>
                    <td><?php echo $r1['details'] ?></td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            $cari = isset($_GET['cari']) ? $_GET['cari'] : "";

            for ($i = 1; $i <= $pages; $i++) {
            ?>
                <li class="page-item">
                    <a class="page-link" href="message.php ?katakunci=<?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </nav>
</section>
<?php include("inc_footer.php") ?>