<?php include __DIR__ . '/../layouts/header.php'; ?>

<!-- kjhkjh}
jkhkjh
kjhkj
kjhkj -->


<div class="seccion-titulo">
    <h2>Mostrador Comunitario</h2>
    <p>Descubre prendas exclusivas de diseñadores</p>
</div>

<!-- SECCIÓN DE FILTROS POR GÉNERO Y CATEGORÍA -->
<div class="filtros-contenedor">
    <!-- Filtro 1: Género -->
    <div class="grupo-filtros">
        <button type="button" class="btn-filtro active" onclick="filtrarGenero('todos', this)">Todos</button>
        <button type="button" class="btn-filtro" onclick="filtrarGenero('mujer', this)">Mujer</button>
        <button type="button" class="btn-filtro" onclick="filtrarGenero('hombre', this)">Hombre</button>
    </div>

    <!-- Filtro 2: Tipo de Prenda -->
    <div class="grupo-filtros subcategorias">
        <button type="button" class="btn-subfiltro active" onclick="filtrarCategoria('todas', this)">Ver Todo</button>
        <button type="button" class="btn-subfiltro" onclick="filtrarCategoria('camisa', this)">Camisas</button>
        <button type="button" class="btn-subfiltro" onclick="filtrarCategoria('blusa', this)">Blusas</button>
        <button type="button" class="btn-subfiltro" onclick="filtrarCategoria('jean', this)">Jeans</button>
        <button type="button" class="btn-subfiltro" onclick="filtrarCategoria('pantalon', this)">Pantalones</button>
        <button type="button" class="btn-subfiltro" onclick="filtrarCategoria('chaqueta', this)">Chaquetas</button>
        <button type="button" class="btn-subfiltro" onclick="filtrarCategoria('buzo', this)">Buzos</button>
    </div>
</div>

<div class="mostrador-grid" id="grid-productos">
    <?php foreach ($productos as $prod): 
        // MAPEADO DIRECTO DE DATOS, GÉNERO Y CATEGORÍA
        switch ($prod['id']) {
            case 1:
                $nombrePersonalizado = 'Blusa Femenina';
                $imagenUrl = '/Moon_essence/public/img/Blusa.jpeg'; 
                $precioPersonalizado = 40000;
                $genero = 'mujer';
                $categoria = 'blusa';
                break;
            case 2:
                $nombrePersonalizado = 'Chaqueta';
                $imagenUrl = '/Moon_essence/public/img/Chaqueta.jpg'; 
                $precioPersonalizado = 120000;
                $genero = 'hombre';
                $categoria = 'chaqueta';
                break;
            case 3:
                $nombrePersonalizado = 'Jean Masculino';
                $imagenUrl = '/Moon_essence/public/img/jean-hombre.jpg';
                $precioPersonalizado = 65000; 
                $genero = 'hombre';
                $categoria = 'jean';
                break;
            default:
                $nombrePersonalizado = $prod['nombre'];
                $imagenUrl = 'https://images.unsplash.com/photo-1523381210434-271e8be1f52b?w=500';
                $precioPersonalizado = $prod['precio'];
                $genero = 'mujer';
                $categoria = 'camisa';
                break;
        }
    ?>
        <div class="producto-card" data-genero="<?= $genero ?>" data-categoria="<?= $categoria ?>">
            <div class="producto-img-simulador" style="padding: 0; background: none; overflow: hidden; height: 350px;">
                <img src="<?= htmlspecialchars($imagenUrl) ?>" 
                     alt="<?= htmlspecialchars($nombrePersonalizado) ?>" 
                     style="width: 100%; height: 100%; object-fit: cover; display: block;">
            </div>

            <div class="producto-info">
                <h3 class="producto-titulo"><?= htmlspecialchars($nombrePersonalizado) ?></h3>
                <p class="producto-precio">$<?= number_format($precioPersonalizado, 0, ',', '.') ?> COP</p>
                
                <button class="btn-add-carrito" onclick="alert('¡Producto añadido al carrito!')">Añadir al Carrito</button>

                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <div style="display: flex; gap: 10px; margin-top: 10px;">
                        <a href="/Moon_essence/public/index.php?action=editar-producto&id=<?= $prod['id'] ?>" 
                           style="flex: 1; text-align: center; background: #111; color: white; padding: 6px; text-decoration: none; font-size: 0.75rem;">
                            Editar
                        </a>
                        <a href="/Moon_essence/public/index.php?action=eliminar-producto&id=<?= $prod['id'] ?>" 
                           onclick="return confirm('¿Seguro de eliminar este producto?')"
                           style="flex: 1; text-align: center; background: #ef4444; color: white; padding: 6px; text-decoration: none; font-size: 0.75rem;">
                            Eliminar
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- LÓGICA DE FILTRADO EN JAVASCRIPT -->
<script>
let generoSeleccionado = 'todos';
let categoriaSeleccionada = 'todas';

function aplicarFiltros() {
    const productos = document.querySelectorAll('.producto-card');

    productos.forEach(card => {
        const gen = card.getAttribute('data-genero');
        const cat = card.getAttribute('data-categoria');

        const coincideGenero = (generoSeleccionado === 'todos' || gen === generoSeleccionado);
        const coincideCategoria = (categoriaSeleccionada === 'todas' || cat === categoriaSeleccionada);

        if (coincideGenero && coincideCategoria) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

function filtrarGenero(genero, elemento) {
    generoSeleccionado = genero;
    document.querySelectorAll('.btn-filtro').forEach(btn => btn.classList.remove('active'));
    elemento.classList.add('active');
    aplicarFiltros();
}

function filtrarCategoria(categoria, elemento) {
    categoriaSeleccionada = categoria;
    document.querySelectorAll('.btn-subfiltro').forEach(btn => btn.classList.remove('active'));
    elemento.classList.add('active');
    aplicarFiltros();
}
</script>

<?php include __DIR__ . '/../layouts/footer.php'; ?>