<table class="table table-bordered table-striped" class="">
    <thead>
		<div>
    <tr>
        <th>No</th>
		<th>Kode Promo/Diskon</th>
        <th>Nama Promo/Diskon</th>
        <th>Deskirpsi Promo/Diskon</th>
		<th>Pertanggal Promo</th>
		<th>Target</th>
        <th>File Promo/Diskon</th>
        <th class="span2">
            <div style="width: 135px;height:auto"><a href="#modalAddPromo" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">
                <i class="icon-plus-sign icon-white"></i> Tambah Data Promo
				</a></div>

        </th>
    </tr>
		</div>
    </thead>
    <tbody>

    <?php
    $no=1;
    if(isset($data_promo)){
        foreach($data_promo as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
				<td><?php echo $row->kd_promo; ?></td>
                <td><?php echo $row->nama_promo; ?></td>
                <td><?php echo $row->give_promo; ?></td>
				<td><?php echo $row->pertanggal; ?></td>
				<td><?php echo $row->Target_value; ?></td>
                <td><?php echo $row->file_promo; ?></td>
                <td>
					<div>
                    <a class="btn btn-mini" href="#modalEditPromo<?php echo $row->kd_promo?>" data-toggle="modal"><i class="icon-pencil"></i> Edit</a>
                    <a class="btn btn-mini" href="<?php echo site_url('master/hapus_promo/'.$row->kd_promo);?>"
                       onclick="return confirm('Anda yakin?')"> <i class="icon-remove"></i> Hapus</a>
					</div>
                </td>

            </tr>

        <?php }
    }
    ?>

    </tbody>
</table>
<!-- ============ MODAL ADD PROMO =============== -->
<div id="modalAddPromo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 id="myModalLabel">Tambah Data Promo</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo site_url('master/tambah_promo')?>" enctype="multipart/form-data">
        <div class="modal-body">
			<div class="control-group">
                <label class="control-label">Kode Promo/Diskon</label>
                <div class="controls">
                    <input name="kd_promo" type="text" value="<?php echo $kd_promo;?>" readonly>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nama Promo/Diskon</label>
                <div class="controls">
                    <input name="nama_promo" type="text" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" >Deskiprisi Promo/Diskon</label>
                <div class="controls">
                    <input name="give" type="text" required>
                </div>
            </div>
			 <div class="control-group">
                <label class="control-label" >Tanggal Promo</label>
                <div class="controls">
                    <input name="tanggal" type="text" required>
                </div>
            </div>
			 <div class="control-group">
                <label class="control-label" >Target Penjualan</label>
                <div class="controls">
                    <input name="target" type="text" required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" >Masukkan File Promo</label>
                <div class="controls">
                    <input name="file" type="file">
                </div>
            </div>

            <hr/>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<!-- ============ MODAL EDIT PEGAWAI =============== -->
<?php
if (isset($data_promo)){
    foreach($data_promo as $row){
        ?>
        <div id="modalEditPromo<?php echo $row->kd_promo?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 id="myModalLabel">Edit Promo</h3>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_promo')?>">
                <div class="modal-body">
					<div class="control-group">
                        <label class="control-label">Kode Promo</label>
                        <div class="controls">
                            <input name="kd_promo" type="text" value="<?php echo $row->kd_promo?>" readonly>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama Promo/Diskon</label>
                        <div class="controls">
                            <input name="nama_promo" type="text" value="<?php echo $row->nama_promo?>" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Deskripsi Promo/Diskon</label>
                        <div class="controls">
                            <input name="give_promo" type="text" value="<?php echo $row->give_promo?>" required>
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" >Tanggal Promo/Diskon</label>
                        <div class="controls">
                            <input name="tanggal" type="text" value="<?php echo $row->pertanggal?>" required>
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" >Target Penjualan</label>
                        <div class="controls">
                            <input name="target" type="text" value="<?php echo $row->Target_value?>" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Masukkan File Untuk Promo</label>
                        <div class="controls">
                            <input name="file_promo" type="file" required>
                        </div>
                    </div>

                    <hr/>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type= submit class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    <?php }
}
?>