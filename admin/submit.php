<?php
include 'db_connection.php';

$status_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses file upload
    $target_dir = "assets/images/";
    $file_name = basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is an actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $status_message .= "File is not an image. ";
            $uploadOk = 0;
        }
    }
    
    // Check file size
    if ($_FILES["foto"]["size"] > 10000000) {
        $status_message .= "Sorry, your file is too large. ";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $status_message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
        $uploadOk = 0;
    }
    
    // If file already exists, rename it
    if (file_exists($target_file)) {
        $file_name = time() . "_" . $file_name;
        $target_file = $target_dir . $file_name;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $status_message .= "Sorry, your file was not uploaded. ";
        header('Location: index.php?error=' . urlencode($status_message));
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO pengungsi (id_pengungsi, nama_lengkap, jenis_kelamin, tempat_lahir, tgl_lahir, kewarganegaraan, masa_berlaku_kartu, alamat, no_tlp, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssss", $id_pengungsi, $nama_lengkap, $jenis_kelamin, $tempat_lahir, $tgl_lahir, $kewarganegaraan, $masa_berlaku_kartu, $alamat, $no_tlp, $file_name);
            
            // Set parameters and execute
            $id_pengungsi = $_POST['id_pengungsi'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $kewarganegaraan = $_POST['kewarganegaraan'];
            $masa_berlaku_kartu = $_POST['masa_berlaku_kartu'];
            $alamat = $_POST['alamat'];
            $no_tlp = $_POST['no_tlp'];
            
            if ($stmt->execute()) {
                header('Location: index.php?success=true');
            } else {
                $status_message = "Error: " . $stmt->error;
                header('Location: index.php?error=' . urlencode($status_message));
            }
            
            $stmt->close();
        } else {
            $status_message .= "Sorry, there was an error uploading your file.";
            header('Location: index.php?error=' . urlencode($status_message));
        }
    }
    $conn->close();
    exit;
}
?>
