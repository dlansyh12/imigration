<?php
include 'config/db_connection.php';

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM pengungsi WHERE id_pengungsi LIKE '%$search%' OR nama_lengkap LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM pengungsi";
}
$result = $conn->query($sql);

$limit = 5;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$start_from = ($page - 1) * $limit;

$sql = "SELECT * FROM pengungsi WHERE id_pengungsi LIKE '%$search%' OR nama_lengkap LIKE '%$search%' LIMIT $start_from, $limit";
$rs_result = $conn->query($sql);

$sql_total = "SELECT COUNT(*) FROM pengungsi WHERE id_pengungsi LIKE '%$search%' OR nama_lengkap LIKE '%$search%'";
$rs_total = $conn->query($sql_total);
$row_total = $rs_total->fetch_row();
$total_records = $row_total[0];
$total_pages = ceil($total_records / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/imigrasi-logo.png" type="image/x-icon">
    <title>Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .form-control {
            width: 250px;
            background-color: white;
        }
        .table-container {
            max-width: 90%;
            margin: 0 auto;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex items-center justify-between bg-white shadow-md p-4">
        <div class="flex items-center">
            <span class="text-xl font-semibold uppercase text-black">Admin Dashboard</span>        
        </div>
        <a href="../index.php" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded-lg shadow-md transition duration-300">
            Back
        </a>
    </div>
    
    <div class="container mx-auto my-8 p-4 bg-white shadow-lg rounded-lg">
        <form method="GET" action="admin_dashboard.php" class="mb-4 flex justify-end">
            <input type="text" name="search" class="form-control p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 mr-2" placeholder="Cari Nama atau ID" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">Cari</button>
        </form>
        
        <div class="table-container overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">ID Pengungsi</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Tempat Lahir</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Warga Negara</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Masa Berlaku</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">No Telepon</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php 
                    $no = $start_from + 1;
                    while($row = $rs_result->fetch_assoc()) { ?>
                    <tr>
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo $no++; ?></td>
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['id_pengungsi']; ?></td>
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['nama_lengkap']; ?></td>
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['jenis_kelamin']; ?></td>
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['tempat_lahir']; ?></td>
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['tgl_lahir']; ?></td>
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['kewarganegaraan']; ?></td>
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['masa_berlaku_kartu']; ?></td>
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['alamat']; ?></td>
                        <td class="px-3 py-2 whitespace-nowrap"><?php echo $row['no_tlp']; ?></td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <img src="../assets/images/<?php echo $row['foto']; ?>" alt="Foto" class="object-cover w-12 h-12 border border-gray-300 rounded-md">
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <a href="./edit.php?id=<?php echo $row['id_pengungsi']; ?>" class="text-blue-600 hover:text-blue-800 font-semibold"><i class="fas fa-edit"></i> Edit</a>
                            <a href="./delete.php?id=<?php echo $row['id_pengungsi']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="text-red-600 hover:text-red-800 font-semibold ml-2"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            <nav class="flex justify-between">
                <div class="text-sm text-gray-700">
                    <?php 
                    echo "Page " . $page . " of " . $total_pages;
                    ?>
                </div>
                <div class="flex space-x-1">
                    <?php 
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<a href='admin_dashboard.php?page=".$i."&search=".$search."' class='px-3 py-1 border rounded-md ";
                        if ($i == $page) echo "bg-blue-600 text-white"; else echo "bg-gray-200 hover:bg-gray-300";
                        echo "'>".$i."</a> ";
                    }
                    ?>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>