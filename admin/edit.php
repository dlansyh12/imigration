<?php
include './config/db_connection.php';
$id_pengungsi = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $masa_berlaku_kartu = $_POST['masa_berlaku_kartu'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];

    $sql = "UPDATE pengungsi SET nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', kewarganegaraan='$kewarganegaraan', masa_berlaku_kartu='$masa_berlaku_kartu', alamat='$alamat', no_tlp='$no_tlp' WHERE id_pengungsi='$id_pengungsi'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ./admin_dashboard.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM pengungsi WHERE id_pengungsi='$id_pengungsi'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/imigrasi-logo.png" type="image/x-icon">
    <title>Edit Data Pengungsi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <!-- Back to Dashboard Button -->
    <div class="fixed top-4 left-4">
        <a href="./admin_dashboard.php" class="flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-3xl shadow-md transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 mr-2">
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zM13 3v6h8V3h-8zm0 18h8v-10h-8v10z" />
            </svg>
            Dashboard
        </a>
    </div>

    <!-- Main Form Container -->
    <div class="container mx-auto my-8 max-w-lg p-6 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Edit Data Pengungsi</h2>
        <form action="./edit.php?id=<?php echo $id_pengungsi; ?>" method="POST">
            <div class="space-y-4">
                <!-- Nama Lengkap -->
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-600">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500">
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-600">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500">
                        <option value="Laki-laki" <?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                        <option value="Perempuan" <?php echo ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>

                <!-- Tempat Lahir -->
                <div>
                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-600">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500">
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <label for="tgl_lahir" class="block text-sm font-medium text-gray-600">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500">
                </div>

                <!-- Kewarganegaraan -->
                <div>
                    <label for="kewarganegaraan" class="block text-sm font-medium text-gray-600">Kewarganegaraan</label>
                    <input type="text" id="kewarganegaraan" name="kewarganegaraan" value="<?php echo $row['kewarganegaraan']; ?>" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500">
                </div>

                <!-- Masa Berlaku Kartu -->
                <div>
                    <label for="masa_berlaku_kartu" class="block text-sm font-medium text-gray-600">Masa Berlaku Kartu</label>
                    <input type="date" id="masa_berlaku_kartu" name="masa_berlaku_kartu" value="<?php echo $row['masa_berlaku_kartu']; ?>" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500">
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat</label>
                    <textarea id="alamat" name="alamat" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500"><?php echo $row['alamat']; ?></textarea>
                </div>

                <!-- No Telepon -->
                <div>
                    <label for="no_tlp" class="block text-sm font-medium text-gray-600">No Telepon</label>
                    <input type="text" id="no_tlp" name="no_tlp" value="<?php echo $row['no_tlp']; ?>" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-3xl shadow-lg transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">Update Data</button>
            </div>
        </form>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>