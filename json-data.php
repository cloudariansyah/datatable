<?php
// konfigurasi database

$password = ""; 
$database = ""; 
$host = "";
$user = "";

// koneksi ke database
$mysqli = new mysqli($host, $user, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}



// menentukan jumlah data yang ditampilkan per halaman
$length = isset($_POST['length']) ? $_POST['length'] : 10;

// menentukan halaman yang ditampilkan
$start = isset($_POST['start']) ? $_POST['start'] : 0;

// menentukan kolom yang diurutkan
$order_column = isset($_POST['order'][0]['column']) ? $_POST['order'][0]['column'] : 0;

// menentukan arah pengurutan (asc/desc)
$order_dir = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'asc';

// menentukan keyword pencarian
$search = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';

// query untuk mengambil data dari tabel
$query = "SELECT * from `daftarinformasipublik` 
left join ukpd on ukpd.id=daftarinformasipublik.organisasi
left join tipe_file on tipe_file.id=daftarinformasipublik.tipefile
left join kategori on kategori.id=daftarinformasipublik.kategori
WHERE judul LIKE '%$search%' or nama LIKE '%$search%' or tahun LIKE '%$search%' or judulkategori LIKE '%$search%'

ORDER BY " . ($order_column+1) . " $order_dir LIMIT $start, $length";

// menjalankan query dan menyimpan hasilnya dalam variabel $result
$result = $mysqli->query($query);

// mengambil jumlah baris data yang ditemukan
$num_rows = $mysqli->query("SELECT COUNT(*) FROM `daftarinformasipublik`")->fetch_row()[0];

// menyiapkan data untuk dikirim dalam format JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// mengirim data dalam format JSON
echo json_encode(array(
    "draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 0,
    "recordsTotal" => intval($num_rows),
    "recordsFiltered" => intval($num_rows),
    "data" => $data
));
?>
