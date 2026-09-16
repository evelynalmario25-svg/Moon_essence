<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../config/conexion.php';

class AdminController {

    public function dashboard() {
        $db = Database::getConnection();

        $stmtProd = $db->query("SELECT COUNT(*) as total FROM productos");
        $totalProductos = $stmtProd->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        $stmtCat = $db->query("SELECT COUNT(*) as total FROM categorias");
        $totalCategorias = $stmtCat->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

    public function reportes() {
        $mesSeleccionado = $_GET['mes'] ?? date('n');
        $anioSeleccionado = $_GET['anio'] ?? date('Y');

        $ingresosTotales = 0;
        $pedidosCompletados = 0;
        $ticketPromedio = 0;

        $topProductos = [];
        $rendimientoCategorias = [];
        $transacciones = [];

        require_once __DIR__ . '/../views/admin/reportes.php';
    }
}