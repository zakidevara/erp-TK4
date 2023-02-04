<?php 
	class Supplier {
		private $IdSupplier;
		private $NamaSupplier;
		private $Alamat;
		private $NoTelp;

		private $conn;

		public function __construct(\PDO $database) {
			$this->conn = $database;
		}

		function setIdSupplier($IdSupplier) {
			$this->IdSupplier = $IdSupplier;
		}

		function setNamaSupplier($NamaSupplier) {
			$this->NamaSupplier = $NamaSupplier;
		}

		function setAlamat($Alamat) {
			$this->Alamat = $Alamat;
		}

		function setNoTelp($NoTelp) {
			$this->NoTelp = $NoTelp;
		}

		function getIdSupplier() {
			return $IdSupplier;
		}

		function getNamaSupplier() {
			return $NamaSupplier;
		}

		function getAlamat() {
			return $Alamat;
		}

		function getNoTelp() {
			return $NoTelp;
		}

		function addSupplier() {
			try {
				$query = "INSERT INTO supplier(`IdSupplier`, `NamaSupplier`, `Alamat`, `NoTelp`) VALUES (?, ?, ?, ?)";
				$prepareDB = $this->conn->prepare($query);
				$sqlAddSupplier = $prepareDB->execute([$this->IdSupplier, $this->NamaSupplier, $this->Alamat, $this->NoTelp]);
	
				return $sqlAddSupplier;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function supplierList() {
			try {
				$query = "SELECT * FROM supplier ORDER BY IdSupplier ASC";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute();
				$supplierList = $prepareDB->fetchAll();
	
				return $supplierList;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function findSupplierById($id) {
			try {
				$query = "SELECT * FROM supplier WHERE IdSupplier = ?";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute([$id]);
				$findSupplierById = $prepareDB->fetchAll();
	
				return $findSupplierById[0];
			} catch (Exception $e) {
				throw $e;
			}
		}

		function updateSupplier() {
			try {
				$query = "UPDATE supplier SET NamaSupplier = ?, Alamat = ?, NoTelp = ? WHERE IdSupplier = ?";
				$prepareDB = $this->conn->prepare($query);
				$sqlUpdateSupplier = $prepareDB->execute([$this->NamaSupplier, $this->Alamat, $this->NoTelp, $this->IdSupplier]);
	
				return $sqlUpdateSupplier;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function deleteSupplier($id) {
			try {
				$query = "DELETE FROM supplier WHERE IdSupplier = ?";
				$prepareDB = $this->conn->prepare($query);
				$sqlDeleteSupplier = $prepareDB->execute([$id]);
	
				return $sqlDeleteSupplier;
			} catch (Exception $e) {
				throw $e;
			}
		}		

	}
?>