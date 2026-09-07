<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function esEmprendedor() {
    return isset($_SESSION['usuario_id']) && isset($_SESSION['rol']) && $_SESSION['rol'] === 'emprendedor';
}

function requerirEmprendedor() {
    if (!esEmprendedor()) {
        header("Location: /Moon_essence/public/index.php?action=login");
        exit;
    }
}