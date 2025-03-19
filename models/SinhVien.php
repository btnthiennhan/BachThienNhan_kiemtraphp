<?php
class SinhVien {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM SinhVien");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($MaSV) {
        $stmt = $this->conn->prepare("SELECT * FROM SinhVien WHERE MaSV = :MaSV");
        $stmt->bindParam(':MaSV', $MaSV);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getNganhHoc() {
        $stmt = $this->conn->prepare("SELECT * FROM NganhHoc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO sinhvien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                  VALUES (:MaSV, :HoTen, :GioiTinh, :NgaySinh, :Hinh, :MaNganh)";
        
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':MaSV', $data['MaSV']);
        $stmt->bindParam(':HoTen', $data['HoTen']);
        $stmt->bindParam(':GioiTinh', $data['GioiTinh']);
        $stmt->bindParam(':NgaySinh', $data['NgaySinh']);
        $stmt->bindParam(':Hinh', $data['Hinh']); // Lưu đường dẫn ảnh vào database
        $stmt->bindParam(':MaNganh', $data['MaNganh']);
    
        return $stmt->execute();
    }
    

    public function update($data) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM NganhHoc WHERE MaNganh = :MaNganh");
        $stmt->bindParam(':MaNganh', $data['MaNganh']);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {
            throw new Exception("Mã ngành không tồn tại!");
        }

        $stmt = $this->conn->prepare("UPDATE SinhVien SET HoTen = :HoTen, GioiTinh = :GioiTinh, NgaySinh = :NgaySinh, Hinh = :Hinh, MaNganh = :MaNganh WHERE MaSV = :MaSV");
        $stmt->bindParam(':MaSV', $data['MaSV']);
        $stmt->bindParam(':HoTen', $data['HoTen']);
        $stmt->bindParam(':GioiTinh', $data['GioiTinh']);
        $stmt->bindParam(':NgaySinh', $data['NgaySinh']);
        $stmt->bindParam(':Hinh', $data['Hinh']);
        $stmt->bindParam(':MaNganh', $data['MaNganh']);
        return $stmt->execute();
    }

    public function delete($MaSV) {
        $stmt = $this->conn->prepare("DELETE FROM SinhVien WHERE MaSV = :MaSV");
        $stmt->bindParam(':MaSV', $MaSV);
        return $stmt->execute();
    }
}
?>