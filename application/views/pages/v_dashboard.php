<!--========================= Content Wrapper ==============================-->
<div class="container">
    <h1 class="text-info" style="text-align: center">Sistem Aplikasi Inventory Barang Elektronik</h1>
	<h1 align="center">Tugas Praktek Web</h1>
    <br/>
<?php if(isset($dt_contact)){
foreach($dt_contact as $row){
?>
    <div class="row well" style="text-align: center">
        <h3><?php echo $row->nama?></h3>
        <h4><?php echo $row->desc?></h4>
        <h5 class="muted"><?php echo $row->alamat?></h5>
        <h5 class="muted"><?php echo $row->email?> || <?php echo $row->telp?> || <?php echo $row->website?></h5>
		<p style="font-size: 20px">Membuat Tugas Praktek Web ini, dimaksudkan agar meningkatkan nilai satu tingkat huruf</p>

    </div>
<?php }
}
?>
</div>


