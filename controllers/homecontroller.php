<?php
require_once BASE_PATH . '/models/Menu.php';

class HomeController extends Controller {
    private $reservationFile;
    
    public function __construct() {
        $this->reservationFile = BASE_PATH . '/reservations.json';
        if (!file_exists($this->reservationFile)) {
            file_put_contents($this->reservationFile, json_encode([]));
        }
    }
    
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            if ($_POST['action'] === 'reserve') {
                $this->handleReservation();
            }
        }

        $menuModel = new Menu();
        $menuItems = $menuModel->getAllItems();
        
        $reservations = $this->getReservations();
        
        $flashMessage = isset($_SESSION['flash_message']) ? $_SESSION['flash_message'] : null;
        $flashType = isset($_SESSION['flash_type']) ? $_SESSION['flash_type'] : null;
        unset($_SESSION['flash_message'], $_SESSION['flash_type']);
        
        $this->view('home', [
            'menuItems' => $menuItems,
            'reservations' => $reservations,
            'flashMessage' => $flashMessage,
            'flashType' => $flashType
        ]);
    }
    
    private function handleReservation() {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $date = trim($_POST['date'] ?? '');
        $time = trim($_POST['time'] ?? '');
        $guests = intval($_POST['guests'] ?? 0);
        $specialRequest = trim($_POST['special_request'] ?? '');
        
        $errors = [];
        
        if (empty($name)) {
            $errors[] = "Nama lengkap wajib diisi.";
        }
        
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email valid wajib diisi.";
        }
        
        if (empty($date)) {
            $errors[] = "Tanggal reservasi wajib diisi.";
        }
        
        if (empty($time)) {
            $errors[] = "Waktu reservasi wajib diisi.";
        }
        
        if ($guests < 1 || $guests > 50) {
            $errors[] = "Jumlah tamu harus antara 1-50 orang.";
        }
        
        if (!empty($errors)) {
            $_SESSION['flash_message'] = implode('<br>', $errors);
            $_SESSION['flash_type'] = 'error';
            return;
        }
        
        $newReservation = [
            'id' => uniqid('res_', true),
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'date' => $date,
            'time' => $time,
            'guests' => $guests,
            'special_request' => htmlspecialchars($specialRequest),
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 'pending'
        ];
        
        $reservations = $this->getReservations();
        array_unshift($reservations, $newReservation);
        $this->saveReservations($reservations);
        
        $_SESSION['flash_message'] = "Terima kasih {$name}! Reservasi Anda telah diterima. Kami akan segera menghubungi Anda.";
        $_SESSION['flash_type'] = 'success';
    }
    
    private function getReservations() {
        if (!file_exists($this->reservationFile)) {
            return [];
        }
        $content = file_get_contents($this->reservationFile);
        return json_decode($content, true) ?: [];
    }
    
    private function saveReservations($reservations) {
        file_put_contents($this->reservationFile, json_encode($reservations, JSON_PRETTY_PRINT));
    }
}
?>