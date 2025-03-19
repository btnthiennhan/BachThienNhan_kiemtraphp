<?php
require_once 'config/Database.php';
require_once 'models/SinhVien.php';

class SinhVienController {
    private $sinhVien;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->sinhVien = new SinhVien($this->db);
    }

    public function index() {
        $sinhViens = $this->sinhVien->getAll();
        include 'views/sinhvien/index.php';
    }

    public function create() {
        $nganhHoc = $this->sinhVien->getNganhHoc();
        $error = '';
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Xử lý upload ảnh
            $target_dir = "public/images/"; // Thư mục lưu ảnh
            $target_file = $target_dir . basename($_FILES["Hinh"]["name"]); // Đường dẫn đầy đủ
    
            if (move_uploaded_file($_FILES["Hinh"]["tmp_name"], $target_file)) {
                $imagePath = $target_file; // Lưu đường dẫn ảnh nếu upload thành công
            } else {
                $error = "Có lỗi khi tải ảnh lên!";
            }
    
            if (empty($error)) {
                $data = [
                    'MaSV' => $_POST['MaSV'],
                    'HoTen' => $_POST['HoTen'],
                    'GioiTinh' => $_POST['GioiTinh'],
                    'NgaySinh' => $_POST['NgaySinh'],
                    'Hinh' => $imagePath, // Lưu đường dẫn ảnh
                    'MaNganh' => $_POST['MaNganh']
                ];
    
                try {
                    if ($this->sinhVien->create($data)) {
                        header("Location: index.php?controller=sinhvien&action=index");
                        exit();
                    }
                } catch (Exception $e) {
                    $error = $e->getMessage();
                }
            }
        }
        include 'views/sinhvien/create.php';
    }
    

    public function edit($MaSV) {
        $nganhHoc = $this->sinhVien->getNganhHoc();
        $error = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'MaSV' => $MaSV,
                'HoTen' => $_POST['HoTen'],
                'GioiTinh' => $_POST['GioiTinh'],
                'NgaySinh' => $_POST['NgaySinh'],
                'Hinh' => $_POST['Hinh'],
                'MaNganh' => $_POST['MaNganh']
            ];
            try {
                if ($this->sinhVien->update($data)) {
                    header("Location: index.php?controller=sinhvien&action=index");
                }
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        }
        $sinhVien = $this->sinhVien->getById($MaSV);
        include 'views/sinhvien/edit.php';
    }

    public function delete($MaSV) {
        if ($this->sinhVien->delete($MaSV)) {
            header("Location: index.php?controller=sinhvien&action=index");
        }
    }

    public function details($MaSV) {
        $sinhVien = $this->sinhVien->getById($MaSV);
        include 'views/sinhvien/details.php';
    }
}
?>