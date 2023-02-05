<?php
	class Pembelian {
        private $IdPembelian;
        private $JumlahPembelian;
        private $HargaBeli;
        private $IdPengguna;
        private $IdBarang;
        private $IdSupplier;

        private $conn;
        public function __construct(\PDO $database) {
            $this->conn = $database;
        }

        function addPembelian() {
            try {
                $query = "INSERT INTO pembelian(`IdPembelian`, `JumlahPembelian`, `HargaBeli`, `IdPengguna`, 'IdBarang', 'IdSupplier') VALUES (?, ?, ?, ?, ?, ?)";
                $prepareDB = $this->conn->prepare($query);
                return $prepareDB->execute([$this->IdPembelian, $this->JumlahPembelian, $this->HargaBeli, $this->IdPengguna, $this->IdBarang, $this->IdSupplier]);
            } catch (Exception $e) {
                throw $e;
            }
        }

        function pembelianList() {
            try {
                $query = "SELECT * FROM pembelian ORDER BY IdPembelian ASC";
                $prepareDB = $this->conn->prepare($query);
                $prepareDB->execute();
                return $prepareDB->fetchAll();
            } catch (Exception $e) {
                throw $e;
            }
        }

        function findPembelianById($id) {
            try {
                $query = "SELECT * FROM pembelian WHERE IdPembelian = ?";
                $prepareDB = $this->conn->prepare($query);
                $prepareDB->execute([$id]);
                $findPembelianById = $prepareDB->fetchAll();

                return $findPembelianById[0];
            } catch (Exception $e) {
                throw $e;
            }
        }

        /**
         * @throws Exception
         */
        function updatePembelian() {
            try {
                $query = "UPDATE pembelian SET JumlahPembelian = ?, HargaBeli = ?, IdPengguna = ?, IdBarang = ?, IdSupplier = ? WHERE IdPembelian = ?";
                $prepareDB = $this->conn->prepare($query);
                return $prepareDB->execute([$this->IdPembelian, $this->JumlahPembelian, $this->HargaBeli, $this->IdPengguna, $this->IdBarang, $this->IdSupplier]);
            } catch (Exception $e) {
                throw $e;
            }
        }

        function deletePembelian($id) {
            try {
                $query = "DELETE FROM pembelian WHERE IdPembelian = ?";
                $prepareDB = $this->conn->prepare($query);
                return $prepareDB->execute([$id]);
            } catch (Exception $e) {
                throw $e;
            }
        }

        /**
         * @return mixed
         */
        public function getIdPembelian()
        {
            return $this->IdPembelian;
        }

        /**
         * @param mixed $IdPembelian
         */
        public function setIdPembelian($IdPembelian)
        {
            $this->IdPembelian = $IdPembelian;
        }

        /**
         * @return mixed
         */
        public function getJumlahPembelian()
        {
            return $this->JumlahPembelian;
        }

        /**
         * @param mixed $JumlahPembelian
         */
        public function setJumlahPembelian($JumlahPembelian)
        {
            $this->JumlahPembelian = $JumlahPembelian;
        }

        /**
         * @return mixed
         */
        public function getHargaBeli()
        {
            return $this->HargaBeli;
        }

        /**
         * @param mixed $HargaBeli
         */
        public function setHargaBeli($HargaBeli)
        {
            $this->HargaBeli = $HargaBeli;
        }

        /**
         * @return mixed
         */
        public function getIdPengguna()
        {
            return $this->IdPengguna;
        }

        /**
         * @param mixed $IdPengguna
         */
        public function setIdPengguna($IdPengguna)
        {
            $this->IdPengguna = $IdPengguna;
        }

        /**
         * @return mixed
         */
        public function getIdBarang()
        {
            return $this->IdBarang;
        }

        /**
         * @param mixed $IdBarang
         */
        public function setIdBarang($IdBarang)
        {
            $this->IdBarang = $IdBarang;
        }

        /**
         * @return mixed
         */
        public function getIdSupplier()
        {
            return $this->IdSupplier;
        }

        /**
         * @param mixed $IdSupplier
         */
        public function setIdSupplier($IdSupplier)
        {
            $this->IdSupplier = $IdSupplier;
        }
}