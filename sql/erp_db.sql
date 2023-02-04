CREATE DATABASE IF NOT EXISTS `erp_db`;

USE `erp_db`;

# Revert
DROP TABLE IF EXISTS `Pembelian`;
DROP TABLE IF EXISTS `Penjualan`;
DROP TABLE IF EXISTS `Supplier`;
DROP TABLE IF EXISTS `Pelanggan`;
DROP TABLE IF EXISTS `Barang`;
DROP TABLE IF EXISTS `Pengguna`;
DROP TABLE IF EXISTS `HakAkses`;

# Create
CREATE TABLE IF NOT EXISTS `HakAkses` (
    `IdAkses` char(4) NOT NULL,
    `NamaAkses` varchar(100) NOT NULL,
    `Keterangan` varchar(255),
    PRIMARY KEY (`IdAkses`)
);

CREATE TABLE IF NOT EXISTS `Pengguna` (
    `IdPengguna` char(4) NOT NULL,
    `NamaPengguna` varchar(100) NOT NULL,
    `Password` varchar(255) NOT NULL,
    `NamaDepan` varchar(100) NOT NULL,
    `NamaBelakang` varchar(100),
    `NoHp` varchar(15),
    `Alamat` varchar(255),
    `IdAkses` char(4) NOT NULL,
    PRIMARY KEY (`IdPengguna`),
    FOREIGN KEY (`IdAkses`) REFERENCES `HakAkses`(`IdAkses`)
);

CREATE TABLE IF NOT EXISTS `Barang` (
    `IdBarang` char(4) NOT NULL,
    `NamaBarang` varchar(100) NOT NULL,
    `Keterangan` text,
    `Satuan` varchar(50),
    `IdPengguna` char(4) NOT NULL,
    PRIMARY KEY (`IdBarang`),
    FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna`(`IdPengguna`)
);

CREATE TABLE IF NOT EXISTS `Pelanggan` (
   `IdPelanggan` CHAR(4) PRIMARY KEY,
   `NamaPelanggan` VARCHAR(255),
   `Alamat` VARCHAR(255),
   `NoTelp` VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `Supplier` (
   `IdSupplier` CHAR(4) PRIMARY KEY,
   `NamaSupplier` VARCHAR(255),
   `Alamat` VARCHAR(255),
   `NoTelp` VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `Pembelian` (
    `IdPembelian` char(4) NOT NULL,
    `JumlahPembelian` int NOT NULL,
    `HargaBeli` double,
    `IdPengguna` char(4) NOT NULL,
    `IdBarang` char(4) NOT NULL,
    `IdSupplier` char(4) NOT NULL,
    PRIMARY KEY (`IdPembelian`),
    FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna`(`IdPengguna`),
    FOREIGN KEY (`IdBarang`) REFERENCES `Barang`(`IdBarang`),
    FOREIGN KEY (`IdSupplier`) REFERENCES `Supplier`(`IdSupplier`)
);

CREATE TABLE IF NOT EXISTS `Penjualan` (
    `IdPenjualan` char(4) NOT NULL,
    `JumlahPenjualan` int NOT NULL,
    `HargaJual` double,
    `IdPengguna` char(4) NOT NULL,
    `IdBarang` char(4) NOT NULL,
    `IdPelanggan` char(4) NOT NULL,
    PRIMARY KEY (`IdPenjualan`),
    FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna`(`IdPengguna`),
    FOREIGN KEY (`IdBarang`) REFERENCES `Barang`(`IdBarang`),
    FOREIGN KEY (`IdPelanggan`) REFERENCES `Pelanggan`(`IdPelanggan`)
);

USE erp_db;

# Revert
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE pembelian;
TRUNCATE TABLE penjualan;
TRUNCATE TABLE barang;
TRUNCATE TABLE pengguna;
TRUNCATE TABLE hakakses;
TRUNCATE TABLE pelanggan;
TRUNCATE TABLE supplier;
SET FOREIGN_KEY_CHECKS = 1;

# Insert Data Hak Akses
INSERT INTO hakakses(IdAkses, NamaAkses, Keterangan) VALUES ('A001', 'SuperAdmin', 'CRUD ke semua tabel');
INSERT INTO hakakses(IdAkses, NamaAkses, Keterangan) VALUES ('A002', 'Sales', 'CRUD Penjualan');
INSERT INTO hakakses(IdAkses, NamaAkses, Keterangan) VALUES ('A003', 'Purchasing', 'CRUD Pembelian');

# Insert Data Pengguna
INSERT INTO pengguna(IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES ('U001', 'zakidevara', 'password123', 'Zaki', 'Devara', '6281234567890', 'Jl. Mawar No. 12', 'A001');
INSERT INTO pengguna(IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES ('U002', 'agus.setiawan', 'pass5678', 'Agus', 'Setiawan', '6285499112353', 'Jl. Sukamaju No. 78', 'A002');
INSERT INTO pengguna(IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES ('U003', 'heri.gustiadi', 'ssap0909', 'Heri', 'Gustiadi', '6285499112353', 'Jl. Damai Foresta No. 67', 'A002');
INSERT INTO pengguna(IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES ('U004', 'evasafitri', 'zzxxccvv', 'Eva', 'Safitri', '622518656450', 'Jl Rajawali Tmr 131, Jawa Barat', 'A002');
INSERT INTO pengguna(IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES ('U005', 'hariyah', '11wweerr', 'Kasiyah', 'Hariyah', '62791718278', 'Jl Padasuka Atas 192, Jawa Barat', 'A003');
INSERT INTO pengguna(IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES ('U006', 'mayawahyuni', 'ddppoo00', 'Maya', 'Wahyuni', '62809035609', 'Jl Budi Mulya 4 A RT 012/12, Dki Jakarta', 'A003');
INSERT INTO pengguna(IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES ('U007', 'nugrahaf', 'gghh445r', 'Nugraha', 'Firmansyah', '62448637305', 'Jl Sakti IV/8, Dki Jakarta', 'A002');
INSERT INTO pengguna(IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES ('U008', 'kokbudiman', '1456vcdf', 'Koko', 'Budiman', '62287803872', 'Jl Sidikan I RT 23/06, Jawa Tengah', 'A001');
INSERT INTO pengguna(IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES ('U009', 'hutagalung001', '6782rruy', 'Narji', 'Hutagalung', '62217382700', 'Jl. Manggarai Utara I No.1 Jakarta selatan, Dki Jakarta', 'A003');
INSERT INTO pengguna(IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) VALUES ('U010', 'dinda.sudiati', 'r56bvg79', 'Dinda', 'Sudiati', '62891930974', 'Jl Mangga Dua Raya Ruko Tekstil Bl E-2/4, Dki Jakarta', 'A002');

# Insert Data Barang
INSERT INTO barang(IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('S001', 'Beras', 'Bahan Pokok', 'kg', 'U001');
INSERT INTO barang(IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('S002', 'Pokcoy', 'Sayur', 'kg', 'U001');
INSERT INTO barang(IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('S003', 'Wortel', 'Sayur', 'kg', 'U001');
INSERT INTO barang(IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('S004', 'Tahu', 'Bahan Pokok', 'kotak', 'U001');
INSERT INTO barang(IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('S005', 'Tempe', 'Bahan Pokok', 'kotak', 'U001');
INSERT INTO barang(IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('S006', 'Buncis', 'Sayur', 'kg', 'U001');
INSERT INTO barang(IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('S007', 'Semangka', 'Buah', 'kg', 'U001');
INSERT INTO barang(IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('S008', 'Mangga', 'Buah', 'kg', 'U001');
INSERT INTO barang(IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('S009', 'Kedelai', 'Sayur', 'kg', 'U001');
INSERT INTO barang(IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('S010', 'Tomat', 'Sayur', 'kg', 'U001');


# Insert Data Supplier
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L001', 'Toko Sumber Rejeki', 'Yogyakarta', '738');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L002', 'Food Box', 'Purwokerto', '748');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L003', 'Toko Al-Barakah', 'Bogor', '527');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L004', 'Toko Amanah', 'Bekasi', '546');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L005', 'Real Food', 'Jakarta', '272');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L006', 'Toko Sinar Abadi', 'Medan', '647');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L007', 'Total buah', 'Bandung', '289');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L008', 'Toko Misbah', 'Ciamis', '908');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L009', 'Farmer Market', 'Banten', '245');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L010', 'Toko king', 'Jasinga', '367');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L011', 'Daily Harvest', 'Banten', '746');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L012', 'Toko Sinar Jaya', 'Aceh', '265');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L013', 'Foodigo', 'Padang', '345');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L014', 'Aeon Grocery', 'Bali', '847');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L015', 'Dark Grocery', 'Malang', '278');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L016', 'Toko Hokki', 'Tangerang', '198');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L017', 'Basir Sembako', 'Surabaya', '367');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L018', 'Giant Grocery', 'Tegal', '792');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L019', 'Toko Fortune', 'Palembang', '547');
INSERT INTO supplier(IdSupplier, NamaSupplier, Alamat, NoTelp) VALUES ('L020', 'Warung Lubawi', 'Jambi', '726');

# Insert Data Pelanggan
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P001', 'Na Jaemin', 'Seoul', '748');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P002', 'Jeon Jungkook', 'Busan', '657');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P003', 'Niki', 'Japan', '345');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P004', 'Kim Namjoon', 'Ansan', '276');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P005', 'Jungwon', 'Seoul', '891');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P006', 'Scoups', 'Daegu', '845');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P007', 'Heesung', 'Gyeonggi', '728');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P008', 'Jeonghan', 'Hwaseong', '645');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P009', 'Jay', 'Seattle', '982');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P010', 'Moon Junhui', 'China', '745');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P011', 'Jake', 'Australia', '830');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P012', 'Hoshi', 'Gwangju', '728');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P013', 'Sunghoon', 'Seoul', '254');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P014', 'Kim Mingyu', 'Anyang', '871');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P015', 'Suno', 'Suwon', '628');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P016', 'Dekey', 'Sujigu', '920');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P017', 'Younjun', 'Seoul', '647');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P018', 'Boo Seungkwan', 'Busan', '537');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P019', 'Soobin', 'Seoul', '748');
INSERT INTO pelanggan(IdPelanggan, NamaPelanggan, Alamat, NoTelp) VALUES ('P020', 'Lee Chan', 'Iksan', '928');

# Insert Data Pembelian
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B001', '10', '5000', 'U002', 'S001', 'L003');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B002', '20', '3000', 'U002', 'S002', 'L002');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B003', '40', '10000', 'U002', 'S003', 'L001');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B004', '10', '5000', 'U002', 'S004', 'L005');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B005', '15', '5000', 'U002', 'S005', 'L006');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B006', '8', '4000', 'U002', 'S006', 'L007');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B007', '12', '25000', 'U002', 'S007', 'L008');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B008', '10', '30000', 'U002', 'S008', 'L009');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B009', '23', '14000', 'U002', 'S009', 'L010');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B010', '12', '22000', 'U002', 'S010', 'L011');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B011', '17', '3000', 'U002', 'S002', 'L020');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B012', '15', '10000', 'U002', 'S003', 'L001');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B013', '20', '5000', 'U002', 'S005', 'L004');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B014', '31', '22000', 'U002', 'S010', 'L006');
INSERT INTO pembelian(IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES ('B015', '30', '14000', 'U002', 'S009', 'L003');

# Insert Data Penjualan
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J001', '3', '12000', 'U003', 'S003', 'P001');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J002', '2', '6500', 'U003', 'S004', 'P002');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J003', '1', '7000', 'U003', 'S005', 'P003');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J004', '4', '5000', 'U003', 'S006', 'P004');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J005', '3', '30000', 'U003', 'S007', 'P005');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J006', '6', '32000', 'U003', 'S008', 'P006');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J007', '4', '12000', 'U003', 'S003', 'P007');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J008', '3', '7000', 'U003', 'S005', 'P008');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J009', '2', '25000', 'U003', 'S010', 'P009');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J010', '3', '30000', 'U003', 'S007', 'P010');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J011', '2', '32000', 'U003', 'S008', 'P011');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J012', '10', '15000', 'U003', 'S009', 'P012');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J013', '1', '5500', 'U003', 'S001', 'P013');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J014', '2', '5000', 'U003', 'S002', 'P014');
INSERT INTO penjualan(IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES ('J015', '3', '12000', 'U003', 'S003', 'P015');


