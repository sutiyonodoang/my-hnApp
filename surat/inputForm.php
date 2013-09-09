	<form class="form-horizontal" method="post" name="addnosurat" enctype="multipart/form-data">  
		<legend>Form Tambah Nomor Surat</legend> 

			<div class="control-group">  
				<label class="control-label" >No. Surat</label>  
				<div class="controls">  
					<input type="text" class="input-xlarge" name="nomerSurat" placeholder="No/JenisSurat/Corp-Dept/Bln/Thn" required>
					<p class="help-block">Contoh : 123/SPI/HN-MKT/XI/2013</p> 
				</div>  
			</div>
			<div class="control-group">  
				<label class="control-label" >Tanggal</label>  
				<div class="controls input-append date datepicker" id="tglSurat">   
					<input type="text" name="tglSurat"  required readonly><span class="add-on"><i class="icon-calendar"></i></span>
				</div> 
			</div>
			  
			<div class="control-group">  
				<label class="control-label" >Perusahaan</label>
				<div class="controls">				
					<input type="text" class="input-xlarge"  name="perusahaanTujuan" required>  
				</div>  
			</div>   
			<div class="control-group">  
				<label class="control-label" >Ditujukan</label>  
				<div class="controls">  
					<input type="text" class="input-xlarge" name="userPenerimaSurat" required>  
				</div>  
			</div>


			<div class="control-group">  
				<label class="control-label" >Jabatan</label>  
				<div class="controls">  
					<input type="text" class="input-xlarge" name="jabatanUser" required>  
				</div>  
			</div>   
			<div class="control-group">  
				<label class="control-label" >Keterangan</label>  
				<div class="controls">  
					<textarea class="input-xlarge" rows="3" name="ket" required></textarea>  
				</div>  
			</div>  
			<div class="control-group">  
				<label class="control-label"  >User</label>  
					<div class="controls">  
						<select  name="idUserSurat" required>  
							<option></option>  
							<option>Nike</option>  
							<option>Yudo</option>
							<option>Adisam</option>  
							<option>Miftah</option>  
						</select>  
					</div>  
			</div> 



			<div class="form-actions">  
			<button type="submit" class="btn btn-primary" name="addnosurat">Save changes</button>  
			<button type="reset" class="btn">Cancel</button>  
			</div>  

	</form>


	<?php
		//proses input berita
		if (isset($_POST['addnosurat'])) {
			// Begin convert
				$tgl = $_POST['tglSurat'];
				$date = str_replace('/', '-', $tgl);
				$tglSurat = date('Y-m-d', strtotime($date));
				// echo $tglSurat;
			// End convert
			
			$con=mysqli_connect("localhost","k2459657_tiyo","Tiyo270382","k2459657_sirdb");

			if (mysqli_connect_errno()){
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
			
			$query="INSERT INTO tblnomorsurat (tglSurat, nomerSurat, perusahaanTujuan, userPenerimaSurat, jabatanUser, ket, idUserSurat, adminInput) VALUES
			('$tglSurat','$_POST[nomerSurat]','$_POST[perusahaanTujuan]','$_POST[userPenerimaSurat]','$_POST[jabatanUser]','$_POST[ket]','$_POST[idUserSurat]','$_SESSION[usenamaLengkap]')";
			
			if (!mysqli_query($con,$query))
				{
				  echo "<p>Silahkan ulangi proses, nomor surat yang dimaksud sudah pernah dibuat.</p></br> ";
				  die('Error: ' . mysqli_error($con));
				  
				}
			echo "1 record added";

			mysqli_close($con);
			
			

		}