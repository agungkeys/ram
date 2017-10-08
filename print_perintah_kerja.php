<?php
	include_once("koneksi/conn.php");
	
	$id = $_GET['us'];
	$tampildat=("SELECT A.id_transaksi, A.nama_customer, A.telp, A.nama_kasir, A.ppn, A.bayar, A.total, A.tanggal, B.nama_order, B.tgl_pesan, B.tgl_ambil, C.jenis_cetak, D.nama_bahan, B.ukuran, B.keterangan, B.qty, B.harga FROM transaksi A, detail_transaksi B, jenis_cetak C, jenis_bahan D WHERE A.id_transaksi=B.id_transaksi AND B.id_jenis_cetak=C.id_jenis_cetak AND B.id_jenis_bahan=D.id_jenis_bahan AND A.id_transaksi='$id'");
	$q = mysql_query($tampildat)or die (mysql_error());
	while($sql = mysql_fetch_array($q))
	{
	$idt 		= $sql['id_transaksi'];
	$nc			= $sql['nama_customer'];
	$telpc 		= $sql['telp'];
	$ppn 		= $sql['ppn'];
	$byr		= $sql['bayar'];
	$totbyr		= $sql['total'];
	$namakasir	= $sql['nama_kasir'];
	$tglperintah	= $sql['tanggal'];
	}
	$tglper=$tglperintah; 
	$jaditglper=date('d-m-Y', strtotime($tglper));
	
	if($ppn == "Ya"){
	$ppnnya = $totbyr*10/100;
	$ketppn ="10%";	
	}
	if($ppn == "Tidak"){
	$ppnnya = 0;
	$ketppn ="0%";
	}
	$totalharusbayar= $totbyr+$ppnnya;
	$kembalian = $byr - $totalharusbayar;
	
	if($totalharusbayar > $byr)
	{
		$tulisan1 ="DP";
		$tulisan2 ="Kurang";
	}else{
		$tulisan1 ="Bayar";
		$tulisan2 ="Kembalian";
	}
	
	function terbilang($angka) {
	$angka = (float)$angka;
	$bilangan = array(
			'',
			'Satu',
			'Dua',
			'Tiga',
			'Empat',
			'Lima',
			'Enam',
			'Tujuh',
			'Delapan',
			'Sembilan',
			'Sepuluh',
			'Sebelas'
	);
 
	if ($angka < 12) {
		return $bilangan[$angka];
	} else if ($angka < 20) {
		return $bilangan[$angka - 10] . ' Belas';
	} else if ($angka < 100) {
		$hasil_bagi = (int)($angka / 10);
		$hasil_mod = $angka % 10;
		return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
	} else if ($angka < 200) {
		return sprintf('Seratus %s', terbilang($angka - 100));
	} else if ($angka < 1000) {
		$hasil_bagi = (int)($angka / 100);
		$hasil_mod = $angka % 100;
		return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], terbilang($hasil_mod)));
	} else if ($angka < 2000) {
		return trim(sprintf('Seribu %s', terbilang($angka - 1000)));
	} else if ($angka < 1000000) {
		$hasil_bagi = (int)($angka / 1000); // karena hasilnya bisa ratusan jadi langsung digunakan rekursif
		$hasil_mod = $angka % 1000;
		return sprintf('%s Ribu %s', terbilang($hasil_bagi), terbilang($hasil_mod));
	} else if ($angka < 1000000000) {
 
		// hasil bagi bisa satuan, belasan, ratusan jadi langsung kita gunakan rekursif
		$hasil_bagi = (int)($angka / 1000000);
		$hasil_mod = $angka % 1000000;
		return trim(sprintf('%s Juta %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
	} else if ($angka < 1000000000000) {
		// bilangan 'milyaran'
		$hasil_bagi = (int)($angka / 1000000000);
		$hasil_mod = fmod($angka, 1000000000);
		return trim(sprintf('%s Milyar %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
	} else if ($angka < 1000000000000000) {                          
	// bilangan 'triliun'                            
	$hasil_bagi = $angka / 1000000000000;                           
	$hasil_mod = fmod($angka, 1000000000000);                           
	return trim(sprintf('%s Triliun %s', terbilang($hasil_bagi), terbilang($hasil_mod)));                       
	} else {                            
	return 'Wow...';                        
	}                   
	} 
	
	require('fpdf/fpdf.php');
	$pdf=new FPDF('P','cm','A4');
	$pdf->SetMargins(1,1,1);
	$pdf->AddPage(); 
	
	
	$pdf->Image('fpdf/logo_kop_nota2.jpg',1,0.8,21,2.8); 
	$pdf->AddFont('opensans','','opensans.php');
	$pdf->AddFont('opensans','B','opensansb.php');
	$pdf->AddFont('opensans','I','opensansi.php');
	$pdf->SetFont('opensans','i',10); 
	$pdf->SetX(1);
	$pdf->Cell(14,-1,"SURAT PERINTAH KERJA NO.".$idt,0,'L');
	$pdf->SetX(16);
	$pdf->Cell(14,-1,"TANGGAL: ".$jaditglper,0,'L');
	
	$pdf->Ln(1.5);
	$pdf->SetFont('opensans','',10); 
	$pdf->SetX(1); 
	$pdf->Cell(9,3,"Nomer Nota: ".$idt,0,'L');
	$pdf->Ln(0.8);
	$pdf->Cell(9,3,"Customer: ".$nc,0,'L');
	 
	$hasi1=mysql_query("SELECT tanggal from transaksi where id_transaksi=$idt");
	while($hasil1=mysql_fetch_array($hasi1))
	{
		$tglpesan=$hasil1['tanggal']; 
		$jaditglpesan=date('d-m-Y', strtotime($tglpesan));
	} 
	 
	$pdf->SetX(14);
	$pdf->SetFont('opensans','',10);
	$pdf->Cell(5,3,"Tanggal Pesan: ".$jaditglpesan,0,'L');
	
	$pdf->Line(0,3.5,21.5,3.5); 
	$pdf->SetLineWidth(0);
	
	$pdf->Ln(2);
	$pdf->SetX(0.4);
	$pdf->SetFont('opensans','B',9); 
	$pdf->Cell(2,0.8,'Selesai',1,0,'C'); 
	$pdf->Cell(0.8,0.8,'Qty',1,0,'C'); 
	$pdf->Cell(4,0.8,'Nama Order',1,0,'C'); 
	$pdf->Cell(4.5,0.8,'Jenis Order',1,0,'C');
	$pdf->Cell(3,0.8,'Jenis Bahan',1,0,'C');
	$pdf->Cell(1.7,0.8,'Ukuran',1,0,'C'); 
	$pdf->Cell(4.3,0.8,'Keterangan',1,0,'C');
	 
	$pdf->SetFont('opensans','',9); 
	$pdf->Ln(); 
	
	
	
	$hasi=mysql_query("SELECT A.id_detail_transaksi, A.nama_order, A.tgl_pesan, A.tgl_ambil, B.jenis_cetak, C.nama_bahan, A.ukuran, A.keterangan, A.qty, A.harga FROM detail_transaksi A, jenis_cetak B, jenis_bahan C WHERE A.id_jenis_cetak = B.id_jenis_cetak AND A.id_jenis_bahan = C.id_jenis_bahan AND A.id_transaksi=$idt"); 
	while($hasil=mysql_fetch_array($hasi))
	{ 
	$angkarp = $hasil['harga'];
	$jumlah_desimal ="2";
	$pemisah_desimal =".";
	$pemisan_ribuan=",";
	$pdf->SetX(0.4);	
	$pdf->SetFillColor(255,255,255); 
	$tglselesai=$hasil['tgl_ambil'];
	$jaditglselesai=date('d-m-Y', strtotime($tglselesai));
	$pdf->Cell(2,0.8,$jaditglselesai,1,0,'C',true);
	$pdf->Cell(0.8,0.8,$hasil['qty'],1,0,'C',true); 
	$pdf->Cell(4,0.8,$hasil['nama_order'],1,0,'L',true); 
	$pdf->Cell(4.5,0.8,$hasil['jenis_cetak'],1,0,'L',true);
	$pdf->Cell(3,0.8,$hasil['nama_bahan'],1,0,'L',true); 
	$pdf->Cell(1.7,0.8,$hasil['ukuran'],1,0,'L',true); 
	$pdf->Cell(4.3,0.8,$hasil['keterangan'],1,0,'L',true); 
	$pdf->Ln(); 
	} 
	
	
	$pdf->SetFont('opensans','',10); 
	$pdf->SetX(1);
	$pdf->MultiCell(14,1,"Note: Semua File/ Pekerjaan Tanpa Surat Perintah ini dilarang dikerjakan",0,'L');
	
	
	
	$pdf->SetFont('opensans','',10); 
	$pdf->SetX(15); 
	$pdf->Cell(15,1,'Admin Reklamindo,',0,'L');
	$pdf->SetFont('opensans','',10); 
	$pdf->SetX(4); 
	$pdf->MultiCell(15,1,'Customer,',0,'L'); 
	$pdf->SetFont('opensans','',10);
	$pdf->SetX(15);
	$pdf->Cell(19.6,1,$namakasir,0,'L');
	$pdf->SetFont('opensans','',10);
	$pdf->SetX(4); 
	$pdf->MultiCell(19.6,1,$nc,0,'L'); 
	 
	
	
	$pdf->Ln();
	$pdf->SetTitle($idt);
	$pdf->Output();
?>