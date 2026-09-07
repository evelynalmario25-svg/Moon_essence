<?php
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../config/auth.php';

class ProductoController {

    // Mostrador público para clientes
    public function index() {
        $productos = Producto::obtenerTodos();
        require_once __DIR__ . '/../views/productos/index.php';
    }

    // Dashboard exclusivo para el emprendedor (Panel CRUD)
    public function panelEmprendedor() {
        requerirEmprendedor();
        $misProductos = Producto::obtenerPorTienda($_SESSION['usuario_id']);
        require_once __DIR__ . '/../views/emprendedor/dashboard.php';
    }

    // CREATE (Guardar producto)
    public function guardar() {
        requerirEmprendedor();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre    = trim($_POST['nombre'] ?? '');
            $precio    = $_POST['precio'] ?? 0;
            $stock     = $_POST['stock'] ?? 0;
            $categoria = $_POST['categoria_id'] ?? 1;
            $imagen    = trim($_POST['imagen_url'] ?? '/Moon_essence/public/img/default.jpg');
            
            $tiendaId = Producto::obtenerTiendaIdPorUsuario($_SESSION['usuario_id']);

            if ($tiendaId && !empty($nombre) && $precio > 0) {
                Producto::crear($nombre, $precio, $stock, $categoria, $imagen, $tiendaId);
            }
            header("Location: /Moon_essence/public/index.php?action=panel-emprendedor");
            exit;
        }
    }

    // UPDATE (Formulario de edición)
    public function editar() {
        requerirEmprendedor();
        $id = $_GET['id'] ?? null;
        $producto = Producto::obtenerPorIdYUsuario($id, $_SESSION['usuario_id']);

        if (!$producto) {
            header("Location: /Moon_essence/public/index.php?action=panel-emprendedor");
            exit;
        }

        require_once __DIR__ . '/../views/emprendedor/editar.php';
    }

    // UPDATE (Procesar cambios)
    public function actualizar() {
        requerirEmprendedor();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id        = $_POST['id'];
            $nombre    = trim($_POST['nombre']);
            $precio    = $_POST['precio'];
            $stock     = $_POST['stock'];
            $categoria = $_POST['categoria_id'];
            $imagen    = trim($_POST['imagen_url']);

            Producto::actualizar($id, $nombre, $precio, $stock, $categoria, $imagen, $_SESSION['usuario_id']);
            header("Location: /Moon_essence/public/index.php?action=panel-emprendedor");
            exit;
        }
    }

    // DELETE (Eliminar producto)
    public function eliminar() {
        requerirEmprendedor();
        $id = $_GET['id'] ?? null;
        if ($id) {
            Producto::eliminar($id, $_SESSION['usuario_id']);
        }
        header("Location: /Moon_essence/public/index.php?action=panel-emprendedor");
        exit;
    }
}