<?php

include("KontrakView.php");
include("presenter/ProsesPasien.php");

class FormPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function FormPasien()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

    // ADD DATA
	function tambahPasien($dataPasien)
	{
		// panggil method add yang ada pada presenter
		$this->prosespasien->addPasien($dataPasien);
	}

    // UPDATE DATA
    function ubahPasien($id, $dataPasien)
    {	
		// panggil method update yang ada pada presenter
		$this->prosespasien->updatePasien($id, $dataPasien);
    }


	// method untuk menampilkan data
	function tampil()
	{	
		// inisialiasi data yang akan direplace
        $data = "";
		$data_form_action = "form.php";
		$data_tombol = '<input name="btn-add" id="btn-add" type="submit" value="Tambah" class="inline-flex justify-center py-2 px-4 w-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-slate-600 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">';
        
        // import skin form_pasien
		$this->tpl = new Template("templates/form_pasien.html");
		
		// replace data
		$this->tpl->replace("DATA_FORM_ACTION", $data_form_action);
		$this->tpl->replace("DATA_NIK", $data);
        $this->tpl->replace("DATA_NAMA", $data);
        $this->tpl->replace("DATA_TEMPAT", $data);
        $this->tpl->replace("DATA_TL", $data);
        $this->tpl->replace("DATA_GENDER_LK", $data);
        $this->tpl->replace("DATA_GENDER_PR", $data);
        $this->tpl->replace("DATA_EMAIL", $data);
        $this->tpl->replace("DATA_TELP", $data);
		$this->tpl->replace("DATA_TOMBOL", $data_tombol);

		// tampilkan
		$this->tpl->write();
	}

	// method untuk menampilkan data yang akan diupdate
    function tampilUpdate($id){

		// inisialiasi data yang akan direplace
        $this->prosespasien->prosesDataPasienById($id);
		$data = "";
		$data_form_action = "form.php?id_ubah=".$this->prosespasien->getId(0);
		$data_tombol = '<input name="btn-update" id="btn-update" type="submit" value="Update" class="inline-flex justify-center py-2 px-4 w-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-slate-600 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">';
		
        // import skin form_pasien
		$this->tpl = new Template("templates/form_pasien.html");
		
		// replace data
		$this->tpl->replace("DATA_FORM_ACTION", $data_form_action);
		$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik(0));
        $this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama(0));
        $this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat(0));
        $this->tpl->replace("DATA_TL", $this->prosespasien->getTl(0));
		if ($this->prosespasien->getGender(0) == "Laki-laki") {
			$this->tpl->replace("DATA_GENDER_LK", "checked");
		}elseif ($this->prosespasien->getGender(0) == "Perempuan") {
			$this->tpl->replace("DATA_GENDER_PR", "checked");
		}
        $this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail(0));
        $this->tpl->replace("DATA_TELP", $this->prosespasien->getTelp(0));
		$this->tpl->replace("DATA_TOMBOL", $data_tombol);

		// tampilkan
		$this->tpl->write();
    }
}

?>