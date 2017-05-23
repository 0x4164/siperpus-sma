<body style="padding-top:50px;">
<div class="row">
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-body">
    <form id="form-cari" class="form" action="pencarianpustaka.php" method="POST">
      <div class="form-group">
        <label for="keyword">Kata kunci</label><input type="text" class="form-control" name="keyword" size="100">
      </div>
      <div class="form-group">
      <select name="kategori" class="form-control">
      <option value="-">-- Cari Berdasarkan --</option>
       <option value="judul">Judul Buku</option>
       <option value="penulis">Nama Penulis</option>
       <option value="isbn">ISBN</option>
      </select>
      </div>
      <!-- <div class="form-group"> -->
      <input type="submit" class="form-control" value="Cari" name="cari"/>
    <!-- </div> -->
    </form>
    </div>
    </div>
  </div>
</div>

<div class="row">
<table width="513" border="0" align="center" class="table table-bordered">
<?php
  if (isset($_POST['cari'])) {
  	include_once ("database.php");
    /*
  	echo "<tr bgcolor='#FFFFCC'>
  	<td width='10'>no</td>
  	<td width='880'>judul</td>
  	<td width='220'>penulis</td>
  	<td width='330'>isbn</td>
  	</tr>";
    */
?>
<div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i>
    </div>
    <div class="card-block">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
          <thead>
            <!-- <tr bgcolor="#FFFFCC"> -->
            <tr>
            	<th>no</th>
            	<th>judul</th>
            	<th>penulis</th>
            	<th>isbn</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            	<th>no</th>
            	<th>judul</th>
            	<th>penulis</th>
            	<th>isbn</th>
            </try>
          </tfoot>
          <tbody>
    <?php
    $a=1;
    $keyword = $_POST['keyword'];
    $kategori = $_POST['kategori'];
    $query;
    // if($kategori=="-"&&$keyword=""){
    //   $query="select * from buku";
    // }else
    if($kategori=="-"){
      $kategori="judul";
      $query="select * from buku where ".$kategori." like '%".$keyword."%' ";
    }else{
      $query="select * from buku where ".$kategori." like '%".$keyword."%' ";
    }
    $eksekusi=$db->query($query);

  	while($data=$eksekusi->fetch(PDO::FETCH_ASSOC)){
    	echo "<tr>";
    	echo "<td>".$a."</td>";
    	echo "<td>".$data['judul']."</td>";
    	echo "<td>".$data['penulis']."</td>";
    	echo "<td>".$data['isbn']."</td>";
    	echo "</tr>";
  	   $a++;
  	}
  	// echo "</table>";
    ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="assets/js/sb-admin.min.js"></script>
<?php
}
?>
