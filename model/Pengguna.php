<?php 
	class Pengguna {
		private $IdPengguna;
		private $NamaPengguna;
		private $Password;
		private $NamaDepan;
		private $NamaBelakang;
		private $Alamat;
		private $NoHp;

		private $conn;

		public function __construct(\PDO $database) {
			$this->conn = $database;
		}

		function setIdPengguna($IdPengguna) {
			$this->IdPengguna = $IdPengguna;
		}

		function setNamaPengguna($NamaPengguna) {
			$this->NamaPengguna = $NamaPengguna;
		}

        function setPassword($Password) {
			$this->Password = $Password;
		}

        function setNamaDepan($NamaDepan) {
			$this->setNamaDepan = $NamaDepan;
		}

		function setNamaBelakang($NamaBelakang) {
			$this->NamaBelakang = $NamaBelakang;
		}

		function setNoHP($NoHp) {
			$this->NoHp = $NoHp;
		}

		function setAlamat($Alamat) {
			$this->Alamat = $Alamat;
		}

		function getIdPengguna() {
			return $IdPengguna;
		}

		function getNamaPengguna() {
			return $NamaPengguna;
		}

        function getPassword() {
			return $password;
		}

		function getNamaDepan() {
			return $NamaDepan;
		}

		function getBelakang() {
			return $NamaBelakang;
		}

        function getNoHP() {
			return $NoHp;
		}

		function getAlamat() {
			return $Alamat;
		}


		function addPengguna() {
			try {
				$query = "INSERT INTO Pengguna(IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES (?, ?, ?, ?)";
				$prepareDB = $this->conn->prepare($query);
				$sqlAddPengguna = $prepareDB->execute([$this->IdPengguna, $this->NamaPengguna, $this->getNamaDepan, $this->setNamaBelakang,$this->Alamat, $this->NoHp]);
	
				return $sqlAddPengguna;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function penggunaList() {
			try {
				$query = "SELECT * FROM pengguna ORDER BY IdPengguna ASC";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute();
				$penggunaList = $prepareDB->fetchAll();
	
				return $penggunaList;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function findPenggunaById($id) {
			try {
				$query = "SELECT * FROM pengguna WHERE IdPengguna = ?";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute([$id]);
				$findPenggunaById = $prepareDB->fetchAll();
	
				return $findPenggunaById[0];
			} catch (Exception $e) {
				throw $e;
			}
		}

		function updatePengguna() {
			try {
				$query = "UPDATE pengguna SET NamaPengguna = ?, Password = ?, NamaDepan = ?, NamaBelakang = ?, Alamat = ?, NoHp = ? WHERE IdPengguna = ?";
				$prepareDB = $this->conn->prepare($query);
				$sqlUpdatePengguna = $prepareDB->execute([$this->IdPengguna, $this->NamaPengguna, $this->getNamaDepan, $this->setNamaBelakang,$this->Alamat, $this->NoHp]);
	
				return $sqlUpdatePengguna;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function deletePengguna($id) {
			try {
				$query = "DELETE FROM pengguna WHERE IdPengguna = ?";
				$prepareDB = $this->conn->prepare($query);
				$sqlDeletePengguna = $prepareDB->execute([$id]);
	
				return $sqlDeletePengguna;
			} catch (Exception $e) {
				throw $e;
			}
		}		

	}
?>