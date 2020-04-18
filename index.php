<?php
include '../koneksi.php';
$sql = "SELECT * FROM anggota ORDER BY nama";
        
$res=mysqli_query($kon, $sql);

$pinjam=array();

while ($data = mysqli_fetch_assoc($res)) {
    $pinjam[]=$data;
}

include '../aset/header.php'
?>

<center><a href="tambah.php"><span class="badge badge-info">Tambah Anggota</span></a></center>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title"><i class="fas fa-edit"></i>Data Anggota</h2>
                    </div>
                    <div class="card-body">
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th>
      <th scope="col">Aksi</th>
      
    </tr>
  </thead>
  <tbody>
     <?php
          $no=1;
          foreach($pinjam as $p){
              ?>
              <tr>
                  <th scope="row"><?=$no;?></th>
                  <td><?=$p['nama'];?></td>
                  <td><?= $p['kelas'];?></td>
                   <td>
                     <a href="detail.php?id_anggota=<?php echo $p['id_anggota']; ?>"  class="badge badge-success">Detail</a>
                     <a href="edit.php?id_anggota=<?php echo $p['id_anggota']; ?>" class="badge badge-warning">Edit</a>
                     <a href="hapus.php?id_anggota=<?php echo $p['id_anggota']; ?>" class="badge badge-danger">Hapus</a>
                   </td>
                 </tr>
          <?php
          $no++;
                        }
     ?>

  </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include '../aset/footer.php';
?>