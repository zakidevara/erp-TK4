<?php 
	class Barang {
		private $IdBarang;
		private $NamaBarang;
		private $Keterangan;
		private $Satuan;
		private $IdPengguna;

		private $conn;

		public function __construct(\PDO $database) {
			$this->conn = $database;
		}

		function setIdBarang($IdBarang) {
			$this->IdBarang = $IdBarang;
		}

		function setNamaBarang($NamaBarang) {
			$this->NamaBarang = $NamaBarang;
		}

		function setKeterangan($Keterangan) {
			$this->Keterangan = $Keterangan;
		}

		function setSatuan($Satuan) {
			$this->Satuan = $Satuan;
		}
		function setIdPengguna($IdPengguna){
			$this->IdPengguna = $IdPengguna; 
		}

		function getIdBarang() {
			return $IdBarang;
		}

		function getNamaBarang() {
			return $NamaBarang;
		}

		function getKeterangan() {
			return $Keterangan;
		}

		function getSatuan() {
			return $getSatuan;
		}
		function getIdPengguna(){
			return $IdPengguna;
		}

		function addBarang() {
			try {
				$query = "INSERT INTO Barang(`IdBarang`, `NamaBarang`, `Keterangan`, `Satuan`, `IdPengguna`) VALUES (?, ?, ?, ?)";
				$prepareDB = $this->conn->prepare($query);
				$sqlAddBarang = $prepareDB->execute([$this->IdBarang, $this->NamaBarang, $this->Keterangan, $this->Satuan, $this->IdPengguna]);
	
				return $sqlAddBarang;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function barangList() {
			try {
				$query = "SELECT * FROM Barang ORDER BY IdBarang ASC";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute();
				$barangList = $prepareDB->fetchAll();
	
				return $barangList;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function findBarangById($id) {
			try {
				$query = "SELECT * FROM barang WHERE IdBarang = ?";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute([$id]);
				$findBarangById = $prepareDB->fetchAll();
	
				return $findBarangById[0];
			} catch (Exception $e) {
				throw $e;
			}
		}

		function updateBarang() {
			try {
				$query = "UPDATE barang SET NamaBarang = ?, Keterangan = ?, Satuan = ?, IdPengguna = ? WHERE IdBarang = ?";
				$prepareDB = $this->conn->prepare($query);
				$sqlUpdateBarang = $prepareDB->execute([$this->NamaBarang, $this->Keterangan, $this->Satuan, $this->IdPengguna, $this->IdBarang]);
	
				return $sqlUpdateBarang;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function deleteBarang($id) {
			try {
				$query = "DELETE FROM barang WHERE IdBarang = ?";
				$prepareDB = $this->conn->prepare($query);
				$sqlDeleteBarang = $prepareDB->execute([$id]);
	
				return $sqlDeleteBarang;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function laporanList() {
            try {
                $query = "SELECT barang.IdBarang, barang.NamaBarang, HargaJual, JumlahPenjualan, pembelian.HargaBeli, pembelian.JumlahPembelian,
                (HargaJual * JumlahPenjualan) as pendapatan,
                ((HargaJual * JumlahPenjualan)-pembelian.HargaBeli) as keuntungan
                FROM `penjualan` join `barang` on barang.IdBarang = penjualan.IdBarang
                JOIN pembelian ON barang.IdBarang = pembelian.IdBarang GROUP by barang.IdBarang;";
                $prepareDB = $this->conn->prepare($query);
                $prepareDB->execute();
                $barangList = $prepareDB->fetchAll();

                return $barangList;
            } catch (Exception $e) {
                throw $e;
            }
        }

	}
?>