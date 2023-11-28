<?php
require_once('helper.php');

$db_connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$db_connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$stmt = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $kode_lahan = filter_input(INPUT_POST, 'kode_lahan', FILTER_SANITIZE_STRING) ?? '';
        $lokasi_lahan = filter_input(INPUT_POST, 'lokasi_lahan', FILTER_SANITIZE_STRING) ?? '';
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING) ?? '';
        $varietas_pohon = filter_input(INPUT_POST, 'varietas_pohon', FILTER_SANITIZE_STRING) ?? '';
        $total_bibit = filter_input(INPUT_POST, 'total_bibit', FILTER_VALIDATE_INT) ?? 0;
        $luas_lahan = filter_input(INPUT_POST, 'luas_lahan', FILTER_VALIDATE_INT) ?? 0;
        $tanggal = filter_input(INPUT_POST, 'tanggal', FILTER_SANITIZE_STRING) ?? '';
        $ketinggian_tanam = filter_input(INPUT_POST, 'ketinggian_tanam', FILTER_VALIDATE_INT) ?? 0;
        $longtitude = filter_input(INPUT_POST, 'longtitude', FILTER_SANITIZE_STRING) ?? '';
        $latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING) ?? '';

        $required_fields = compact('kode_lahan', 'lokasi_lahan', 'user', 'varietas_pohon', 'tanggal', 'longtitude', 'latitude');

        foreach ($required_fields as $field => $value) {
            if (empty($value)) {
                throw new Exception("Missing required field: $field");
            }
        }

        $sql = "INSERT INTO data_lahan (`kode_lahan`, `lokasi_lahan`, `user`, `varietas_pohon`, `total_bibit`, `luas_lahan`, `tanggal`, `ketinggian_tanam`, `longtitude`, `latitude`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($db_connect, $sql);

        if (!$stmt) {
            throw new Exception('Error preparing SQL statement: ' . mysqli_error($db_connect));
        }

        mysqli_stmt_bind_param($stmt, "ssssiiisss", $kode_lahan, $lokasi_lahan, $user, $varietas_pohon, $total_bibit, $luas_lahan, $tanggal, $ketinggian_tanam, $longtitude, $latitude);

        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            throw new Exception('Error executing SQL statement: ' . mysqli_error($db_connect));
        }

        echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    } finally {
        if ($stmt !== null) {
            mysqli_stmt_close($stmt);
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

mysqli_close($db_connect);
?>
