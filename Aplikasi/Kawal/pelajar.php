<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Pelajar extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
	}

	public function index()
	{
		# Set pemboleubah utama
		$this->papar->tajuk = 'Pelajar';
		echo '<hr> Nama class : ' . namaClass($this) . '<hr>';

		# Pergi papar kandungan
		//$this->paparKandungan('index');
	}

	public function paparKandungan($fail)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail,$jenis,0); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0	
		//*/	
	}

	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>'; 
		print_r($senarai);
		echo '</pre>|';//*/		
	}
#==========================================================================================
	function daftarBaru()
	{
		# Set pemboleubah utama
		$jadual = 'biodata_pelajar';
		$this->papar->medanbaru = $this->tanya->medanbaru($jadual);
		$this->papar->jadual = $jadual;
		$this->papar->jenisBorang = 'baru';

		# Semak data 
		//$this->semakPembolehubah($this->papar->medanbaru);

		# Pergi papar kandungan
		$this->paparKandungan('pendaftaran');
	}

	function semakDaftarBaru()
	{
		# Semak data $_POST
		echo '<pre>$_POST->'; print_r($_POST) . '</pre>| ';
	}

	function paparBiodata()
	{
		# Set pemboleubah utama
		$jadual = 'biodata_pelajar';
		$this->papar->senarai['Registration Proses'] = $this->tanya->datapelajar($jadual);
		$this->papar->_jadual = $jadual;
		$this->papar->jenisBorang = 'papar';		

		# Semak data 
		//$this->semakPembolehubah($this->papar->senarai);

		# Pergi papar kandungan
		$this->paparKandungan('senarai_pelajar');
	}

	function laporanDaftar()
	{
		# Set pemboleubah utama
		$jadual = 'biodata_pelajar';
		$this->papar->senarai['Registration Report'] = $this->tanya->laporanDaftar($jadual);
		$this->papar->_jadual = $jadual;
		$this->papar->jenisBorang = 'laporan';

		# Semak data 
		//$this->semakPembolehubah($this->papar->senarai);

		# Pergi papar kandungan
		$this->paparKandungan('laporan_pendaftaran');
	}

	public function paparSemua()
	{
		# Set pemboleubah utama
		$jadual = 'biodata_pelajar';
		$this->papar->senarai['Senarai Semua Pelajar'] = $this->tanya->profilSemua($jadual);
		$this->papar->_jadual = $jadual;
		$this->papar->jenisBorang = 'papar';

		# Semak data 
		//$this->semakPembolehubah($this->papar->senarai);

		# Pergi papar kandungan
		$this->paparKandungan('profil_pelajar');
	}

	public function papar($profil,$id)
	{
		# Set pemboleubah utama
		$jadual = 'biodata_pelajar';
		$this->papar->senarai = $this->tanya->profilSeorang($jadual, $id);
		$this->papar->_jadual = $jadual;
		$this->papar->jenisBorang = 'papar';
		$this->papar->tajukbesar1 = 'Student Infomation';
		$this->papar->tajukbesar2 = 'Profil';
		$this->papar->tajukbesar3 = 'Father Infomation';
		$this->papar->tajukbesar4 = 'Mother Infomation';

		# Semak data 
		//$this->semakPembolehubah($this->papar->senarai);

		# Pergi papar kandungan
		$this->paparKandungan('papar_profil');
	}
#==========================================================================================
}
