<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{	
	// method untuk read semua pasien
	function getPasien(){
		
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	
	// method untuk read pasien berdasarkan id
	function getPasienId($id){

		// query SQL
		$query = "SELECT * FROM pasien WHERE id = '$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}


	// method untuk create pasien 
	function add($data){

		$nama = $data['tnama'];
		$nik = $data['tnik'];
		$tempat = $data['ttempat'];
		$tl = $data['ttanggal'];
		$gender = $data['tgender'];
		$email = $data['temail'];
		$telp = $data['ttelp'];

		// query SQL
		$query = "INSERT INTO pasien 
		VALUES ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		
		// Mengeksekusi query
		return $this->execute($query);

	}


	// method untuk delete pasien berdasarkan id
	function delete($id){

		// query SQL 
		$query = "DELETE FROM pasien WHERE id = '$id'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}


	// method untuk update pasien berdasarkan 
	function update($id, $data){

		$nama = $data['tnama'];
		$nik = $data['tnik'];
		$tempat = $data['ttempat'];
		$tl = $data['ttanggal'];
		$gender = $data['tgender'];
		$email = $data['temail'];
		$telp = $data['ttelp'];

		// query SQL
		$query = "UPDATE pasien 
		SET nik='$nik', 
		nama='$nama', 
		tempat='$tempat', 
		tl='$tl', 
		gender='$gender', 
		email='$email', 
		telp='$telp' 
		WHERE id='$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}
}
