<script type="text/javascript">
window.setTimeout("jam()",1000);
function jam() {
var tanggal = new Date();
setTimeout("jam()",1000);
document.getElementById("ngeposta").innerHTML = 
tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>
<?php
$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

?>