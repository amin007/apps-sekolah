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
#==========================================================================================
	function daftarBaru()
	{
		# Set pemboleubah utama
		$jadual = 'biodata_pelajar';
		$this->papar->medanbaru = $this->tanya->medanbaru($jadual);
		$this->papar->jadual = $jadual;
		$this->papar->jenisBorang = 'baru';

		/*# Semak data $this->papar->medanbaru
		echo '<pre>$this->papar->medanbaru:<br>'; 
		print_r($this->papar->medanbaru);
		echo '</pre>|';//*/

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

		/*# Semak data $this->papar->senarai['data']
		echo '<pre>$this->papar->senarai['data']:<br>'; 
		print_r($this->papar->senarai['data']);
		echo '</pre>|';//*/

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

		/*# Semak data $this->papar->senarai['data']
		echo '<pre>$this->papar->senarai['data']:<br>'; 
		print_r($this->papar->senarai['data']);
		echo '</pre>|';//*/

		# Pergi papar kandungan
		$this->paparKandungan('laporan_pendaftaran');
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

		/*# Semak data $this->papar->senarai
		echo '<pre>$this->papar->senarai:<br>'; 
		print_r($this->papar->senarai);
		echo '</pre>|';//*/

		# Pergi papar kandungan
		$this->paparKandungan('papar_profil');
	}
#==========================================================================================
}
