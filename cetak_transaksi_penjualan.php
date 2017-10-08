<?php
	include_once("koneksi/conn.php");
	$idt 		= $_POST['txtid'];
	$nc			= $_POST['txtnamacustomer'];
	$telpc 		= $_POST['txttelpcustomer'];
	$ppn 		= $_POST['txtppn'];
	$byr		= $_POST['txtbayar'];
	$totbyr		= $_POST['txttotalbayar'];
	$namakasir	= $_POST['txtnamakasir'];
	$tglpenjualan	= $_POST['txttanggalpenjualan'];
	$tglpen=$tglpenjualan; 
	$jaditglpen=date('d-m-Y', strtotime($tglpen));
	
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
	$pdf->AddFont('opensans','','opensans.php');
	$pdf->AddFont('opensans','B','opensansb.php');
	$pdf->AddFont('opensans','I','opensansi.php');
	
	$pdf->SetFont('opensans','B',13); 
	if($ppn == "Ya")
	{
	$pdf->Image('fpdf/logo_kop_nota2.jpg',1,0.8,21,2.8);
	}
	if($ppn == "Tidak")
	{
	$pdf->Image('fpdf/logo_kop_nota1.jpg',1,0.8,21,2.8);
	}
	 
	
	$pdf->SetFont('opensans','i',11); 
	$pdf->SetX(1);
	$pdf->Cell(14,-1,"BUKTI PEMBAYARAN NO.".$idt,0,'L');
	$pdf->SetX(16);
	$pdf->Cell(14,-1,"TANGGAL: ".$jaditglpen,0,'L');
	
	$pdf->Ln(1);
	$pdf->SetFont('opensans','',11); 
	$pdf->SetX(12); 
	$pdf->Cell(9,-1,"No. Nota: ".$idt,0,'L');
	$pdf->SetX(12);
	
	$pdf->Cell(9,0,"Kepada: ".$nc,0,'L');
	$pdf->SetX(12);
	
	$pdf->Cell(9,1,"Telp: ".$telpc,0,'L');
	 
	
	$pdf->Line(0,3.5,21.5,3.5); 
	$pdf->SetLineWidth(0);
	 
	$pdf->Ln(1.7);
	$pdf->SetX(0.4); 
	$pdf->SetFont('opensans','B',9); 
	$pdf->Cell(1,0.8,'Qty',1,0,'C'); 
	$pdf->Cell(4.5,0.8,'Jenis Order',1,0,'C'); 
	$pdf->Cell(3.5,0.8,'Jenis Bahan',1,0,'C'); 
	$pdf->Cell(3.4,0.8,'Ukuran',1,0,'C'); 
	$pdf->Cell(3.4,0.8,'Harga Satuan (Rp)',1,0,'C');
	$pdf->Cell(4.1,0.8,'Sub Total (Rp)',1,0,'C');
	 
	$pdf->SetFont('opensans','',9); 
	$pdf->Ln(); 
	$hasi=mysql_query("SELECT A.id_detail_transaksi, A.nama_order, A.tgl_ambil, B.jenis_cetak, C.nama_bahan, A.ukuran, A.keterangan, A.qty, A.harga FROM detail_transaksi A, jenis_cetak B, jenis_bahan C WHERE A.id_jenis_cetak = B.id_jenis_cetak AND A.id_jenis_bahan = C.id_jenis_bahan AND A.id_transaksi=$idt"); 
	while($hasil=mysql_fetch_array($hasi))
	{ 
	$angkarp = $hasil['harga'];
	$jumlah_desimal ="2";
	$pemisah_desimal =".";
	$pemisan_ribuan=",";
	
	$pdf->SetX(0.4); 
	$pdf->SetFillColor(255,255,255); 
	$pdf->Cell(1,0.8,$hasil['qty'],1,0,'C',true); 
	$pdf->Cell(4.5,0.8,$hasil['nama_order'],1,0,'L',true); 
	$pdf->Cell(3.5,0.8,$hasil['nama_bahan'],1,0,'C'); 
	$pdf->Cell(3.4,0.8,$hasil['ukuran'],1,0,'L',true); 
	$pdf->SetFont('opensans','',10.5);
	$pdf->Cell(3.4,0.8,"Rp ".number_format($angkarp, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan),1,0,'L',true); 
	$jumlah=$hasil['qty']*$hasil['harga'];
	$pdf->Cell(4.1,0.8,"Rp ".number_format($jumlah, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan),1,0,'L',true); 
	$pdf->Ln(); 
	} 
	$pdf->SetX(12.8);
	$pdf->SetFont('opensans','',9);
	$pdf->Cell(3.4,0.8,"Total",1,0,'C',true);
	$pdf->SetFont('opensans','',10.5);
	$pdf->Cell(4.1,0.8,"Rp ".number_format($totbyr, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan),1,0,'L',true);
	
	if($ppn == "Ya")
	{
	$pdf->Ln();
	$pdf->SetX(12.8);
	$pdf->SetFont('opensans','',9);
	$pdf->Cell(3.4,0.8,"PPN ".$ketppn,1,0,'C',true);
	$pdf->SetFont('opensans','',10.5);
	$pdf->Cell(4.1,0.8,"Rp ".number_format($ppnnya, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan),1,0,'L',true);
	$pdf->Ln();
	$pdf->SetFillColor(255, 251, 149);
	
	$pdf->SetX(12.8);
	$pdf->SetFont('opensans','',9);
	$pdf->Cell(3.4,0.8,"Total Harus Bayar",1,0,'C',true);
	
	$pdf->SetFont('opensans','',10.5);
	$pdf->Cell(4.1,0.8,"Rp ".number_format($totalharusbayar, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan),1,0,'L',true);
	}
	if($ppn == "Tidak")
	{
	
	}
	
	
	
	$pdf->Ln();
	$pdf->SetFillColor(255, 255, 255);
	$pdf->SetX(12.8);
	$pdf->SetFont('opensans','',9);
	$pdf->Cell(3.4,0.8,$tulisan1,1,0,'C',true);
	$pdf->SetFont('opensans','',10.5);
	$pdf->Cell(4.1,0.8,"Rp ".number_format($byr, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan),1,0,'L',true);
	
	$pdf->Ln();
	$pdf->SetFillColor(255, 255, 255);
	$pdf->SetX(12.8);
	$pdf->SetFont('opensans','',9);
	$pdf->Cell(3.4,0.8,$tulisan2,1,0,'C',true);
	$pdf->SetFont('opensans','',10.5);
	$pdf->Cell(4.1,0.8,"Rp ".number_format($kembalian, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan),1,0,'L',true);
	
	$angka=$totalharusbayar;
	$hasilterbilang=terbilang($angka);
	
	$pdf->Ln(0.5);
	$pdf->SetFont('opensans','',9); 
	$pdf->SetX(1);
	$pdf->MultiCell(3.9,-2,"Terbilang: ",0,'L');
	$pdf->Ln(1);
	$pdf->SetFont('opensans','i',10);
	$pdf->MultiCell(10.5,1,$hasilterbilang." Rupiah",0,'L'); 
	$pdf->Ln(0);
	$pdf->SetFont('opensans','',9); 
	$pdf->SetX(15); 
	$pdf->Cell(15,1.8,'Admin Reklamindo,',0,'L');
	$pdf->SetFont('opensans','',9); 
	$pdf->SetX(3); 
	$pdf->MultiCell(15,1.8,'Customer,',0,'L'); 
	$pdf->SetFont('opensans','',9);
	$pdf->SetX(15);
	$pdf->Cell(19.6,0.6,$namakasir,0,'L');
	$pdf->SetFont('opensans','',9);
	$pdf->SetX(3); 
	$pdf->MultiCell(19.6,0.6,$nc,0,'L'); 
	 
	
	$pdf->SetX(1);
	$pdf->SetFont('opensans','',9);
	$pdf->MultiCell(10,0.5,"Catatan:",0,'L');
	$pdf->SetFont('opensans','',9); 
	$pdf->MultiCell(19,0.4,"1. Periksa file sebelum dicetak, kesalahan setelah cetak bukan tanggung jawab Reklamindo",0,'L');
	$pdf->MultiCell(19,0.4,"2. Minimal DP 50% dari Total Biaya",0,'L');
	$pdf->MultiCell(19,0.4,"3. 1 bulan barang tidak diambil, diluar tanggung jawab kami",0,'L');
	$pdf->MultiCell(19,0.4,"4. Pembayaran lewat transfer dianggap sah apabila sudah menunjukan bukti transfer",0,'L');
	$pdf->Ln();
	$pdf->SetTitle($idt);
	$pdf->Output();
?>