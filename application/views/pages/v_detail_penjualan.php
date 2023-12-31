<!--========================= Content Wrapper ==============================-->
<div class="container">

    <div class="well">
        <h4 class="alert alert-info" style="text-align: center">Keterangan</h4>
        <div class="row-fluid" style="display: grid; grid-auto-columns: auto auto auto auto;">
            <?php if(isset($dt_penjualan)){
                foreach($dt_penjualan as $row){
                    ?>
                    <div style="grid-column: 1">
                        <dl class="dl-horizontal">
                            	<dt>Kode Penjualan :</dt>
                            	<dd><?php echo $row->kd_penjualan?></dd>
                            	<br/>
								<dt>Tanggal Penjualan :</dt>
								<dd><?php echo date("d M Y",strtotime($row->tanggal_penjualan));?></dd>
								<br/>
                        </dl>
                    </div>
                    <div style="grid-column: 2">
                        <dl class="dl-horizontal">
                            <dt>Pelanggan :</dt>
                            <dd><?php echo $row->nm_pelanggan?></dd>
                            <br/>
                            <dt>Alamat :</dt>
                            <dd><?php echo $row->alamat?></dd>
                            <br/>
						</dl>
					</div>
					<div style="grid-column: 3">
						<dl class="dl-horizontal">
                            <dt>Email :</dt>
                            <dd><?php echo $row->email?></dd>
                            <br/>
                            <dt>Pegawai :</dt>
                            <dd><?php echo $row->nama?></dd>
							<br/>
                        </dl>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>
        <h4 class="alert alert-info" style="text-align: center"> Daftar Barang</h4>
        <div class="row-fluid">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                if(isset($barang_jual)){
                    foreach($barang_jual as $row){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->kd_barang?></td>
                            <td><?php echo $row->nm_barang?></td>
                            <td><?php echo $row->qty?></td>
                            <td><?php echo currency_format($row->harga)?></td>
                        </tr>
					
                    <?php }
                }
                ?>
					
				<?php if(isset($dt_penjualan)){
                		foreach($dt_penjualan as $row){
                    ?>
					<tr class="aler aler-info">
						<td colspan="4" style="text-align: center; background: #49afcd"><b>Total Harga</b></td>
						<td><strong><u><?= currency_format($row->total_harga); ?></u></strong></td>
					</tr>
					
                    <?php }
                }
                ?>
		
                </tbody>
            </table>

            <div class="form-actions">
                <a href="<?php echo site_url('penjualan')?>" class="btn btn-inverse">
                    <i class="icon-circle-arrow-left icon-white"></i> Back
                </a>
					<button class="btn pull-right" onclick="print()">
    <i class="icon-print"></i> Print
					</button>
				<button class="btn btn-primary pull-right" type="button" onClick="">
    <i class="fas fa-download"></i> Generate PDF
					</button>
            </div>
            </div>
		
        
    </div>


</div>



