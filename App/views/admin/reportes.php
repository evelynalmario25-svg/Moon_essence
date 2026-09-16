<?php include __DIR__ . '/../layouts/header.php'; ?>

<style>
.reportes-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
}

/* ENCABEZADO Y FILTROS */
.reportes-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 15px;
    border-bottom: 1px solid #e2d2b4;
    padding-bottom: 18px;
}

.reportes-title h2 {
    font-size: 26px;
    color: #2b2319;
    margin: 0 0 6px 0;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 10px;
}

.reportes-title p {
    margin: 0;
    color: #7a6e5d;
    font-size: 13px;
}

.filtro-form {
    display: flex;
    gap: 10px;
    align-items: center;
}

.filtro-select {
    padding: 8px 14px;
    border: 1px solid #dcd0b9;
    border-radius: 6px;
    background-color: #fff;
    font-size: 14px;
    color: #2b2319;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.filtro-select:focus {
    border-color: #c5a059;
    box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.2);
}

.btn-filtrar {
    background-color: #c5a059;
    color: white;
    border: none;
    padding: 9px 18px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    transition: background 0.2s ease;
}

.btn-filtrar:hover {
    background-color: #a37f3e;
}

/* TARJETAS DE MÉTRICAS */
.metrics-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.metric-card {
    background: white;
    border-radius: 12px;
    padding: 22px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 12px rgba(43, 35, 25, 0.03);
    border: 1px solid #eae1cd;
}

.metric-data span {
    font-size: 11px;
    font-weight: 700;
    color: #a37f3e;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    display: block;
    margin-bottom: 6px;
}

.metric-data h3 {
    font-size: 28px;
    margin: 0;
    color: #2b2319;
    font-weight: 700;
}

.metric-icon-circle {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background-color: #f7efdd;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #c5a059;
    font-size: 20px;
    font-weight: bold;
}

/* BLOQUES Y TABLAS */
.tables-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-bottom: 25px;
}

@media (max-width: 900px) {
    .tables-grid {
        grid-template-columns: 1fr;
    }
}

.panel-block {
    background: white;
    border-radius: 12px;
    padding: 22px;
    box-shadow: 0 4px 12px rgba(43, 35, 25, 0.03);
    border: 1px solid #eae1cd;
}

.block-title {
    font-size: 16px;
    font-weight: 700;
    color: #2b2319;
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.custom-table {
    width: 100%;
    border-collapse: collapse;
}

.custom-table th {
    text-align: left;
    font-size: 12px;
    font-weight: 700;
    color: #a37f3e;
    padding-bottom: 12px;
    border-bottom: 2px solid #f7efdd;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.custom-table th.text-right, .custom-table td.text-right {
    text-align: right;
}

.custom-table td {
    padding: 14px 0;
    font-size: 13.5px;
    color: #555;
    border-bottom: 1px solid #f8f4eb;
}

.no-data {
    text-align: center;
    color: #a37f3e;
    padding: 30px 0 !important;
    font-size: 13px;
    font-style: italic;
}
</style>

<div class="reportes-container">
    
    <div class="reportes-header">
        <div class="reportes-title">
            <h2>
                <svg width="24" height="24" fill="none" stroke="#c5a059" stroke-width="2" viewBox="0 0 24 24"><path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                Reportes Analíticos Mensuales
            </h2>
            <p>Balance de ventas, métricas e indicadores de rendimiento de BeautyShop</p>
        </div>

        <form action="/Moon_essence/public/index.php" method="GET" class="filtro-form">
            <input type="hidden" name="action" value="reportes">
            
            <select name="mes" class="filtro-select">
                <?php
                $meses = [
                    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                    5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                    9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
                ];
                foreach ($meses as $num => $nombre): ?>
                    <option value="<?= $num ?>" <?= $mesSeleccionado == $num ? 'selected' : '' ?>>
                        <?= $nombre ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="anio" class="filtro-select">
                <?php 
                $anioActual = (int)date('Y');
                for ($a = $anioActual; $a >= $anioActual - 3; $a--): ?>
                    <option value="<?= $a ?>" <?= $anioSeleccionado == $a ? 'selected' : '' ?>><?= $a ?></option>
                <?php endfor; ?>
            </select>

            <button type="submit" class="btn-filtrar">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                Filtrar
            </button>
        </form>
    </div>

    <div class="metrics-row">
        <!-- Ingresos Totales -->
        <div class="metric-card">
            <div class="metric-data">
                <span>INGRESOS TOTALES</span>
                <h3>$<?= number_format($ingresosTotales, 0, ',', '.') ?></h3>
            </div>
            <div class="metric-icon-circle">$</div>
        </div>

        <!-- Total Pedidos -->
        <div class="metric-card">
            <div class="metric-data">
                <span>TOTAL PEDIDOS COMPLETADOS</span>
                <h3><?= $pedidosCompletados ?></h3>
            </div>
            <div class="metric-icon-circle">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
        </div>

        <!-- Ticket Promedio -->
        <div class="metric-card">
            <div class="metric-data">
                <span>TICKET PROMEDIO</span>
                <h3>$<?= number_format($ticketPromedio, 0, ',', '.') ?></h3>
            </div>
            <div class="metric-icon-circle">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"></path></svg>
            </div>
        </div>
    </div>

    <div class="tables-grid">
        
        <!-- Top Productos -->
        <div class="panel-block">
            <div class="block-title">
                🏆 Top Productos Más Vendidos
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Unidades</th>
                        <th class="text-right">Recaudado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($topProductos)): ?>
                        <tr>
                            <td colspan="4" class="no-data">Sin datos en el periodo.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($topProductos as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['producto']) ?></td>
                                <td><?= htmlspecialchars($item['categoria']) ?></td>
                                <td><?= $item['unidades'] ?></td>
                                <td class="text-right">$<?= number_format($item['recaudado'], 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Rendimiento por Categoría -->
        <div class="panel-block">
            <div class="block-title">
                🏷️ Rendimiento por Categoría
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Unidades</th>
                        <th class="text-right">Total Ventas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($rendimientoCategorias)): ?>
                        <tr>
                            <td colspan="3" class="no-data">Sin datos en el periodo.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($rendimientoCategorias as $cat): ?>
                            <tr>
                                <td><?= htmlspecialchars($cat['categoria']) ?></td>
                                <td><?= $cat['unidades'] ?></td>
                                <td class="text-right">$<?= number_format($cat['total'], 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

    <div class="panel-block">
        <div class="block-title">
            📑 Detalle de Transacciones del Mes
        </div>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>N° Pedido</th>
                    <th>Fecha y Hora</th>
                    <th>Cliente</th>
                    <th>Monto Total</th>
                    <th class="text-right">Cambiar Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($transacciones)): ?>
                    <tr>
                        <td colspan="5" class="no-data">No se registrarom pedidos en el mes seleccionado.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($transacciones as $trans): ?>
                        <tr>
                            <td>#<?= $trans['id'] ?></td>
                            <td><?= $trans['fecha'] ?></td>
                            <td><?= htmlspecialchars($trans['cliente']) ?></td>
                            <td>$<?= number_format($trans['monto'], 0, ',', '.') ?></td>
                            <td class="text-right"><?= $trans['estado'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>