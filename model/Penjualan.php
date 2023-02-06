<?php
class Penjualan {
    private $IdPenjualan;
    private $JumlahPenjualan;
    private $HargaJual;
    private $IdPengguna;
    private $IdBarang;
    private $IdPelanggan;

    private $conn;
    public function __construct(\PDO $database) {
        $this->conn = $database;
    }

    function addPenjualan() {
        try {
            $query = "INSERT INTO penjualan(`IdPenjualan`, `JumlahPenjualan`, `HargaJual`, `IdPengguna`, 'IdBarang', 'IdPelanggan') VALUES (?, ?, ?, ?, ?, ?)";
            $prepareDB = $this->conn->prepare($query);
            return $prepareDB->execute([$this->IdPenjualan, $this->JumlahPenjualan, $this->HargaJual, $this->IdPengguna, $this->IdBarang, $this->IdPelanggan]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    function penjualanList() {
        try {
            $query = "SELECT * FROM penjualan ORDER BY IdPenjualan ASC";
            $prepareDB = $this->conn->prepare($query);
            $prepareDB->execute();
            return $prepareDB->fetchAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

    function findPenjualanById($id) {
        try {
            $query = "SELECT * FROM penjualan WHERE IdPenjualan = ?";
            $prepareDB = $this->conn->prepare($query);
            $prepareDB->execute([$id]);
            $findPenjualanById = $prepareDB->fetchAll();

            return $findPenjualanById[0];
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @throws Exception
     */
    function updatePenjualan() {
        try {
            $query = "UPDATE penjualan SET JumlahPenjualan = ?, HargaJual = ?, IdPengguna = ?, IdBarang = ?, IdPelanggan = ? WHERE IdPenjualan = ?";
            $prepareDB = $this->conn->prepare($query);
            return $prepareDB->execute([$this->JumlahPenjualan, $this->HargaJual, $this->IdPengguna, $this->IdBarang, $this->IdPelanggan, $this->IdPenjualan]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    function deletePenjualan($id) {
        try {
            $query = "DELETE FROM penjualan WHERE IdPenjualan = ?";
            $prepareDB = $this->conn->prepare($query);
            return $prepareDB->execute([$id]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @return mixed
     */
    public function getIdPenjualan()
    {
        return $this->IdPenjualan;
    }

    /**
     * @param mixed $IdPenjualan
     */
    public function setIdPenjualan($IdPenjualan)
    {
        $this->IdPenjualan = $IdPenjualan;
    }

    /**
     * @return mixed
     */
    public function getJumlahPenjualan()
    {
        return $this->JumlahPenjualan;
    }

    /**
     * @param mixed $JumlahPenjualan
     */
    public function setJumlahPenjualan($JumlahPenjualan)
    {
        $this->JumlahPenjualan = $JumlahPenjualan;
    }

    /**
     * @return mixed
     */
    public function getHargaJual()
    {
        return $this->HargaJual;
    }

    /**
     * @param mixed $HargaJual
     */
    public function setHargaJual($HargaJual)
    {
        $this->HargaJual = $HargaJual;
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
    public function getIdPelanggan()
    {
        return $this->IdPelanggan;
    }

    /**
     * @param mixed $IdPelanggan
     */
    public function setIdPelanggan($IdPelanggan)
    {
        $this->IdPelanggan = $IdPelanggan;
    }

    /**
     * @return PDO
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param PDO $conn
     */
    public function setConn($conn)
    {
        $this->conn = $conn;
    }


}