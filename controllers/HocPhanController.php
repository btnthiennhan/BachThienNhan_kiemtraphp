<?php
require_once 'config/Database.php';
require_once 'models/HocPhan.php';

class HocPhanController {
    private $hocPhan;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->hocPhan = new HocPhan($this->db);
    }

    public function index() {
        $hocPhans = $this->hocPhan->getAll();
        include 'views/hocphan/index.php';
    }
}
?>