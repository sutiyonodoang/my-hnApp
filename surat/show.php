<?php
	$con=mysqli_connect("localhost","k2459657_tiyo","Tiyo270382","k2459657_sirdb");
	
	if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>
	<legend>25 Daftar Nomor Surat Terakhir</legend>
	<table  class="tablesorter" style="width:auto">  
        <thead>  
          <tr>  
			<th>No.</th>
            <th>Nomor Surat</th>  
            <th>Tanggal Surat</th>  
            <th>Perusahaan Tujuan</th>  
            <th>Penerima Surat</th>  
            <th>Jabatan</th>  
            <th>Keterangan</th>  
            <th>User</th>
            <th>Sunting</th>				
          </tr>  
        </thead>  
		
        <tbody>  
          <?php
				$no = 1;
				$query = "SELECT nomerSurat, tglSurat, perusahaanTujuan, userPenerimaSurat, jabatanUser, ket, idUserSurat FROM tblnomorsurat ORDER BY nomerSurat desc limit 20";
				$sql = mysqli_query($con,$query);
				// echo $query;
				while ($record = mysqli_fetch_array ($sql)) {
					$nomerSurat = $record['nomerSurat'];
					$tglSurat = $record['tglSurat'];
					$perusahaanTujuan = $record['perusahaanTujuan'];
					$userPenerimaSurat = $record['userPenerimaSurat'];
					$jabatanUser = $record['jabatanUser'];
					$ket = $record['ket'];
					$idUserSurat = $record['idUserSurat'];
		  ?>
				<tr>
					<td align="center"><?=$no?></td>
					<td><?=$nomerSurat?></td>
					<td><?=$tglSurat?></td>
					<td><?=$perusahaanTujuan?></td>
					<td><?=$userPenerimaSurat?></td>
					<td><?=$jabatanUser?></td>
					<td><?=$ket?></td>
					<td><?=$idUserSurat?></td>
					<td><a href="#">Edit</a><br/></td>
				</tr>	
				
			<?php 
				$no++; 
				}
				mysqli_close($con);
			?>
			
        </tbody>  
    </table> 