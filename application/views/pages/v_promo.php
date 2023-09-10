<table  class="table table-bordered table-striped" class="table-responsive">
    <thead >
		<div>
    <tr>
        <th>No</th>
		<th>Kode Promo/Diskon</th>
        <th>Nama Promo/Diskon</th>
        <th style="width: 270px; height: auto">Deskirpsi Promo/Diskon</th>
		<th><div style="width: 150px;height:auto">Pertanggal Promo</div></th>
		<th>Target</th>
        <th>File Promo/Diskon</th>
		<th><div style="width: 109px;height:auto"> Download File</div></th>
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
				<div>
				<td><a class="btn btn-primary" href="">Download</a></td>
				</div>
            </tr>
		
			
        <?php }
    }
    ?>
				<a class="btn btn-success" href="<?php echo base_url('promo/export_excel')?>">Download File Excel</a>
    </tbody>
</table>
<!-- ============ MODAL EDIT PEGAWAI =============== -->
