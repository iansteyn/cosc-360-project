<?php

class PagesController {
    function home() {
        $activeTab = $_GET['tab'] ?? "recent";
        require __DIR__ . '/../app/views/home.php';
    }
}

?>