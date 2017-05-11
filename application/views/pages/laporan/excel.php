<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
 
<table border="1" width="100%">
  <thead>
	   <tr>
			<th class="center" scope="col">No</th>
		   	<th class="center" scope="col">Kode Barang</th>
			<th class="center" scope="col">No Aset</th>
			<th class="center" scope="col">Jenis Barang</th>

		<?php if ($id_level_ruang == "252"||$id_level_ruang == "1"||$id_level_ruang == "2"||$id_level_ruang == "6"): ?>
			<th class="center" scope="col">Lokasi Ruang</th>
		<?php endif ?>
			<th class="center" scope="col">Kondisi</th>
	   </tr>
  </thead>
	
  <tbody>
	   <?php $i=0; foreach($inventariss as $inventaris) { ?>
	   <tr>
			<td class="center"><?= ++$i?></td>
			<td><?= $inventaris->kd_barang ?></td>
			<td><?= $inventaris->no_aset ?></td>
			<td><?= $inventaris->jenis_barang ?></td>

		<?php if ($id_level_ruang == "252"||$id_level_ruang == "1"||$id_level_ruang == "2"||$id_level_ruang == "6"): ?>
			<td><?= $inventaris->nama_ruang ?></td>
		<?php endif ?>
		   	<td><?= $inventaris->kondisi ?></td>
	   </tr>
	   <?php  } ?>
  </tbody>
	
</table>