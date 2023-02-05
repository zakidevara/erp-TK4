<?php 
	class HakAkses {
		private $IdAkses;
		private $NamaAkses;
		private $Keterangan;
		

		private $conn;

		public function __construct(\PDO $database) {
			$this->conn = $database;
		}

		function setIdAkses($IdAkses) {
			$this->IdAkses = $IdAkses;
		}

		function setNamaAkses($NamaAkses) {
			$this->NamaAkses = $NamaAkses;
		}

		function setKeterangan($Keterangan) {
			$this->Keterangan = $Keterangan;
		}

		function getIdAkses() {
			return $IdAkses;
		}

		function getNamaAkses() {
			return $NamaAkses;
		}

		function getKeterangan() {
			return $Keterangan;
		}


		function addHakAkses() {
			try {
				$query = "INSERT INTO HakAkses(`IdAkses`, `NamaAkses`, `Keterangan`) VALUES (?, ?, ?, ?)";
				$prepareDB = $this->conn->prepare($query);
				$sqlAddHakAkses = $prepareDB->execute([$this->IdAkses, $this->NamaAkses, $this->Keterangan]);
	
				return $sqlAddHakAkses;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function aksesList() {
			try {
				$query = "SELECT * FROM hakakses ORDER BY IdAkses ASC";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute();
				$aksesList = $prepareDB->fetchAll();
	
				return $AksesList;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function findAksesById($id) {
			try {
				$query = "SELECT * FROM hakakses WHERE IdAkses = ?";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute([$id]);
				$findAksesById = $prepareDB->fetchAll();
	
				return $findAksesById[0];
			} catch (Exception $e) {
				throw $e;
			}
		}

		function updateAkses() {
			try {
				$query = "UPDATE hakkases SET NamaAkses = ?, Keterangan = ? WHERE IdAkses = ?";
				$prepareDB = $this->conn->prepare($query);
				$sqlUpdateAkses = $prepareDB->execute([$this->NamaAkses, $this->Keterangan, $this->IdAkses]);
	
				return $sqlUpdateAkses;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function deleteAkses($id) {
			try {
				$query = "DELETE FROM hakakses WHERE IdAkses = ?";
				$prepareDB = $this->conn->prepare($query);
				$sqlDeleteAkses = $prepareDB->execute([$id]);
	
				return $sqlDeleteAkses;
			} catch (Exception $e) {
				throw $e;
			}
		}		

	}
?>