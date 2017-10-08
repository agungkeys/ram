<?php
if($lvl=="Admin")
{
if($header=="dashboard"){
?>
<!-- Sidebar -->
<div id="da-sidebar">

    <!-- Main Navigation -->
    <div id="da-main-nav" class="da-button-container">
        <ul>
            <li class="active">
                <a>
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/home.png" alt="Dashboard" />
                    </span>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/file_cabinet.png" alt="File Handling" />
                    </span>
                    Master
                </a>
                <ul class="closed">
                    <li><a href="master_user.php">Master User</a></li>
                    <li><a href="master_jenis_cetak.php">Master Jenis Cetak</a></li>
                    <li><a href="master_jenis_bahan.php">Master Jenis Bahan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/create_write.png" alt="Form" />
                    </span>
                    Transaksi
                </a>
                <ul class="closed">
                    <li><a href="transaksi_penjualan.php">Transaksi Penjualan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/table_1.png" alt="Table" />
                    </span>
                    Laporan
                </a>
                <ul class="closed">
                    <li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
					<li><a href="laporan_penjualan_harian.php">Laporan Harian</a></li>
					<li><a href="laporan_penjualan_periode.php">Laporan Periode</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>
<?php
}
?>

<?php
if($header=="master_user" OR $header=="master_jenis_cetak" OR $header=="master_jenis_bahan"){
?>
<!-- Sidebar -->
<div id="da-sidebar">

    <!-- Main Navigation -->
    <div id="da-main-nav" class="da-button-container">
        <ul>
            <li>
                <a href="dashboard_admin.php">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/home.png" alt="Dashboard" />
                    </span>
                    Dashboard
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/file_cabinet.png" alt="File Handling" />
                    </span>
                    Master
                </a>
                <ul class="open">
                    <li><a href="master_user.php">Master User</a></li>
                    <li><a href="master_jenis_cetak.php">Master Jenis Cetak</a></li>
                    <li><a href="master_jenis_bahan.php">Master Jenis Bahan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/create_write.png" alt="Form" />
                    </span>
                    Transaksi
                </a>
                <ul class="closed">
                    <li><a href="transaksi_penjualan.php">Transaksi Penjualan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/table_1.png" alt="Table" />
                    </span>
                    Laporan
                </a>
                <ul class="closed">
                    <li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
					<li><a href="laporan_penjualan_harian.php">Laporan Harian</a></li>
					<li><a href="laporan_penjualan_periode.php">Laporan Periode</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>
<?php
}
?>

<?php
if($header=="transaksi_penjualan" OR $header=="transaksi_penawaran"){
?>
<!-- Sidebar -->
<div id="da-sidebar">

    <!-- Main Navigation -->
    <div id="da-main-nav" class="da-button-container">
        <ul>
            <li>
                <a href="dashboard_admin.php">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/home.png" alt="Dashboard" />
                    </span>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/file_cabinet.png" alt="File Handling" />
                    </span>
                    Master
                </a>
                <ul class="closed">
                    <li><a href="master_user.php">Master User</a></li>
                    <li><a href="master_jenis_cetak.php">Master Jenis Cetak</a></li>
                    <li><a href="master_jenis_bahan.php">Master Jenis Bahan</a></li>
                </ul>
            </li>
            <li  class="active">
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/create_write.png" alt="Form" />
                    </span>
                    Transaksi
                </a>
                <ul class="open">
                    <li><a href="transaksi_penjualan.php">Transaksi Penjualan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/table_1.png" alt="Table" />
                    </span>
                    Laporan
                </a>
                <ul class="closed">
                    <li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
					<li><a href="laporan_penjualan_harian.php">Laporan Harian</a></li>
					<li><a href="laporan_penjualan_periode.php">Laporan Periode</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>
<?php
}
?>

<?php
if($header=="laporan_penjualan" OR $header=="laporan_penawaran"){
?>
<!-- Sidebar -->
<div id="da-sidebar">

    <!-- Main Navigation -->
    <div id="da-main-nav" class="da-button-container">
        <ul>
            <li>
                <a href="dashboard_admin.php">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/home.png" alt="Dashboard" />
                    </span>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/file_cabinet.png" alt="File Handling" />
                    </span>
                    Master
                </a>
                <ul class="closed">
                    <li><a href="master_user.php">Master User</a></li>
                    <li><a href="master_jenis_cetak.php">Master Jenis Cetak</a></li>
                    <li><a href="master_jenis_bahan.php">Master Jenis Bahan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/create_write.png" alt="Form" />
                    </span>
                    Transaksi
                </a>
                <ul class="closed">
                    <li><a href="transaksi_penjualan.php">Transaksi Penjualan</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/table_1.png" alt="Table" />
                    </span>
                    Laporan
                </a>
                <ul class="open">
                    <li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
					<li><a href="laporan_penjualan_harian.php">Laporan Harian</a></li>
					<li><a href="laporan_penjualan_periode.php">Laporan Periode</a></li>>
                </ul>
            </li>
            
        </ul>
    </div>
</div>
<?php
}
}
?>
<?php
if($lvl=="Kasir")
{
if($header=="dashboard"){
?>
<!-- Sidebar -->
<div id="da-sidebar">

    <!-- Main Navigation -->
    <div id="da-main-nav" class="da-button-container">
        <ul>
            <li class="active">
                <a href="dashboard_kasir.php">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/home.png" alt="Dashboard" />
                    </span>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/file_cabinet.png" alt="File Handling" />
                    </span>
                    Master
                </a>
                <ul class="closed">
                    <li><a href="master_jenis_cetak.php">Master Jenis Cetak</a></li>
                    <li><a href="master_jenis_bahan.php">Master Jenis Bahan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/create_write.png" alt="Form" />
                    </span>
                    Transaksi
                </a>
                <ul class="closed">
                    <li><a href="transaksi_penjualan.php">Transaksi Penjualan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/table_1.png" alt="Table" />
                    </span>
                    Laporan
                </a>
                <ul class="closed">
                    <li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>
<?php
}
?>

<?php
if($header=="master_user" OR $header=="master_jenis_cetak" OR $header=="master_jenis_bahan"){
?>
<!-- Sidebar -->
<div id="da-sidebar">

    <!-- Main Navigation -->
    <div id="da-main-nav" class="da-button-container">
        <ul>
            <li>
                <a href="dashboard_kasir.php">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/home.png" alt="Dashboard" />
                    </span>
                    Dashboard
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/file_cabinet.png" alt="File Handling" />
                    </span>
                    Master
                </a>
                <ul class="open">
                    <li><a href="master_jenis_cetak.php">Master Jenis Cetak</a></li>
                    <li><a href="master_jenis_bahan.php">Master Jenis Bahan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/create_write.png" alt="Form" />
                    </span>
                    Transaksi
                </a>
                <ul class="closed">
                    <li><a href="transaksi_penjualan.php">Transaksi Penjualan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/table_1.png" alt="Table" />
                    </span>
                    Laporan
                </a>
                <ul class="closed">
                    <li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>
<?php
}
?>

<?php
if($header=="transaksi_penjualan" OR $header=="transaksi_penawaran"){
?>
<!-- Sidebar -->
<div id="da-sidebar">

    <!-- Main Navigation -->
    <div id="da-main-nav" class="da-button-container">
        <ul>
            <li>
                <a href="dashboard_kasir.php">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/home.png" alt="Dashboard" />
                    </span>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/file_cabinet.png" alt="File Handling" />
                    </span>
                    Master
                </a>
                <ul class="closed">
                    <li><a href="master_jenis_cetak.php">Master Jenis Cetak</a></li>
                    <li><a href="master_jenis_bahan.php">Master Jenis Bahan</a></li>
                </ul>
            </li>
            <li  class="active">
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/create_write.png" alt="Form" />
                    </span>
                    Transaksi
                </a>
                <ul class="open">
                    <li><a href="transaksi_penjualan.php">Transaksi Penjualan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/table_1.png" alt="Table" />
                    </span>
                    Laporan
                </a>
                <ul class="closed">
                    <li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>
<?php
}
?>

<?php
if($header=="laporan_penjualan" OR $header=="laporan_penawaran"){
?>
<!-- Sidebar -->
<div id="da-sidebar">

    <!-- Main Navigation -->
    <div id="da-main-nav" class="da-button-container">
        <ul>
            <li>
                <a href="dashboard_kasir.php">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/home.png" alt="Dashboard" />
                    </span>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/file_cabinet.png" alt="File Handling" />
                    </span>
                    Master
                </a>
                <ul class="closed">
                    <li><a href="master_jenis_cetak.php">Master Jenis Cetak</a></li>
                    <li><a href="master_jenis_bahan.php">Master Jenis Bahan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/create_write.png" alt="Form" />
                    </span>
                    Transaksi
                </a>
                <ul class="closed">
                    <li><a href="transaksi_penjualan.php">Transaksi Penjualan</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="#">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/table_1.png" alt="Table" />
                    </span>
                    Laporan
                </a>
                <ul class="open">
                    <li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>
<?php
}
}
?>
<?php
if($lvl=="Design")
{
if($header=="dashboard"){
?>
<!-- Sidebar -->
<div id="da-sidebar">

    <!-- Main Navigation -->
    <div id="da-main-nav" class="da-button-container">
        <ul>
            <li class="active">
                <a href="dashboard_design.php">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/home.png" alt="Dashboard" />
                    </span>
                    Dashboard
                </a>
            </li>
        </ul>
    </div>
</div>
<?php
}
}
?>
<?php
if($lvl=="Printing")
{
if($header=="dashboard"){
?>
<!-- Sidebar -->
<div id="da-sidebar">

    <!-- Main Navigation -->
    <div id="da-main-nav" class="da-button-container">
        <ul>
            <li class="active">
                <a href="dashboard_printing.php">
                    <!-- Icon Container -->
                    <span class="da-nav-icon">
                        <img src="images/icons/black/32/home.png" alt="Dashboard" />
                    </span>
                    Dashboard
                </a>
            </li>
        </ul>
    </div>
</div>
<?php
}
}
?>