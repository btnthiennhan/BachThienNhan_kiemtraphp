<?php
class HocPhan {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM HocPhan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByIds($ids) {
        $idList = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $this->conn->prepare("SELECT * FROM HocPhan WHERE MaHP IN ($idList)");
        $stmt->execute($ids);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateSoLuong($MaHP) {
        $stmt = $this->conn->prepare("UPDATE HocPhan SET SoLuongDuKien = SoLuongDuKien - 1 WHERE MaHP = :MaHP AND SoLuongDuKien > 0");
        $stmt->bindParam(':MaHP', $MaHP);
        return $stmt->execute();
    }

    public function checkSoLuong($MaHP) {
        $stmt = $this->conn->prepare("SELECT SoLuongDuKien FROM HocPhan WHERE MaHP = :MaHP");
        $stmt->bindParam(':MaHP', $MaHP);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['SoLuongDuKien'];
    }
}
?>