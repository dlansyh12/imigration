<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/imigrasi-logo.png" type="image/x-icon">
    <title>Data Pengungsi</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-white-500 min-h-screen flex items-center justify-center">
    <!-- Dashboard Button -->
    <div class="fixed top-4 left-4">
        <a href="admin/admin_dashboard.php" class="flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-3xl shadow-md transition duration-300">
            <!-- SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 mr-2">
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zM13 3v6h8V3h-8zm0 18h8v-10h-8v10z" />
            </svg>
            Dashboard
        </a>
    </div>

    <!-- Main Form Content -->
    <div class="container mx-auto my-8 max-w-lg p-6 bg-white shadow-lg rounded-xl">
        <form action="admin/submit.php" method="POST" enctype="multipart/form-data">
            <!-- Compact Modern Table Design -->
            <table class="w-full table-auto border-collapse text-sm">
                <tbody>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-3 text-gray-600">ID Pengungsi:</td>
                        <td class="py-2 px-3"><input type="text" id="id_pengungsi" name="id_pengungsi" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500"></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-3 text-gray-600">Nama Lengkap:</td>
                        <td class="py-2 px-3"><input type="text" id="nama_lengkap" name="nama_lengkap" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500"></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-3 text-gray-600">Jenis Kelamin:</td>
                        <td class="py-2 px-3">
                            <select id="jenis_kelamin" name="jenis_kelamin" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-3 text-gray-600">Tempat Lahir:</td>
                        <td class="py-2 px-3"><input type="text" id="tempat_lahir" name="tempat_lahir" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500"></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-3 text-gray-600">Tanggal Lahir:</td>
                        <td class="py-2 px-3"><input type="date" id="tgl_lahir" name="tgl_lahir" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500"></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-3 text-gray-600">Warga Negara:</td>
                        <td class="py-2 px-3"><input type="text" id="kewarganegaraan" name="kewarganegaraan" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500"></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-3 text-gray-600">Masa Berlaku:</td>
                        <td class="py-2 px-3"><input type="date" id="masa_berlaku_kartu" name="masa_berlaku_kartu" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500"></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-3 text-gray-600">Alamat:</td>
                        <td class="py-2 px-3"><textarea id="alamat" name="alamat" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500"></textarea></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-3 text-gray-600">No Telepon:</td>
                        <td class="py-2 px-3"><input type="tel" id="no_tlp" name="no_tlp" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500"></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-3 text-gray-600">Foto:</td>
                        <td class="py-2 px-3"><input type="file" id="foto" name="foto" accept="image/*" required class="w-full bg-white border border-gray-300 rounded-lg p-2 text-gray-700 focus:outline-none focus:border-blue-500"></td>
                    </tr>
                </tbody>
            </table>

            <!-- Submit Button -->
            <div class="mt-6">
                <input type="submit" value="Submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-3xl shadow-lg transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">
            </div>
        </form>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data berhasil ditambahkan!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            } else if (urlParams.has('error')) {
                let errorMessage = 'Terjadi kesalahan.';
                switch (urlParams.get('error')) {
                    case 'notimage':
                        errorMessage = 'File bukan gambar.';
                        break;
                    case 'toolarge':
                        errorMessage = 'Ukuran file terlalu besar.';
                        break;
                    case 'wrongformat':
                        errorMessage = 'Format file tidak didukung.';
                        break;
                    case 'uploadfailed':
                        errorMessage = 'Gagal mengunggah file.';
                        break;
                    case 'dberror':
                        errorMessage = 'Gagal menyimpan data ke database.';
                        break;
                    default:
                        errorMessage = decodeURIComponent(urlParams.get('error'));
                }
                Swal.fire({
                    title: 'Error!',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
</body>

</html>