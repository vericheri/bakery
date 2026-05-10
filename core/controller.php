<?php

abstract class Controller {
    protected function view($view, $data = []) {
        extract($data);
        require_once BASE_PATH . '/views/header.php';
        require_once BASE_PATH . "/views/{$view}.php";
        require_once BASE_PATH . '/views/footer.php';
    }
}
?>