<table id="da-ex-datatable-numberpaging" class="da-table">
<thead>
    <tr>
        <th>ID. Transaksi</th>
        <th>Nama Order</th>
        <th>Tanggal Ambil</th>
        <th>Jenis Cetak</th>
        <th>Jenis Bahan</th>
        <th>Ukuran</th>
        <th>Keterangan</th>
        <th>Qty</th>
        <th>File</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
	<?php
	include_once("koneksi/conn.php");
	$tampildat="SELECT A.id_detail_transaksi, A.nama_order, A.tgl_pesan, A.tgl_ambil, B.jenis_cetak, C.nama_bahan, A.nama_file, A.size_file, A.ukuran, A.keterangan, A.qty FROM detail_transaksi A, jenis_cetak B, jenis_bahan C WHERE A.id_jenis_cetak = B.id_jenis_cetak AND A.id_jenis_bahan = C.id_jenis_bahan AND divisi='Design' AND status='CONFIRM' ORDER BY A.id_detail_transaksi ASC";
	$q = mysql_query($tampildat)or die (mysql_error());
	
	while($sql = mysql_fetch_array($q))
	{
	?>
	
		<tr>
			<td><?php echo $sql['id_detail_transaksi']; ?></td>
			<td><?php echo $sql['nama_order']; ?></td>
			<td><?php echo $sql['tgl_ambil']; ?></td>
			<td><?php echo $sql['jenis_cetak']; ?></td>
			<td><?php echo $sql['nama_bahan']; ?></td>
			<td><?php echo $sql['ukuran']; ?></td>
			<td><?php echo $sql['keterangan']; ?></td>
			<td><?php echo $sql['qty']; ?></td>
			
			<?php
			$id=$sql['id_detail_transaksi'];
			if($sql['nama_file']=="")
			{
				$fileup="Design Baru";
			}
			else
			{
			$fileup="<a class='da-button blue' href='upload_folder/$sql[nama_file]'>Download</a>";
			}
			?>
			<td><?php echo"$fileup"; ?></td>
			<td><a class="da-button green" href="kerjakan_design.php?us=<?php echo"$id"; ?>">Kerjakan</a></td>
		</tr>
	<?php
	}
	
	?>
	</tbody>
</table>