<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="admin-dashboard-container">
    
    <!-- Encabezado del Panel -->
    <div class="admin-header">
        <div class="admin-title">
            <h2><i class="fas fa-tachometer-alt"></i> Panel de Administración</h2>
        </div>
        <span class="badge-role">Administrador</span>
    </div>

    <!-- Grid de Tarjetas / Métricas -->
    <div class="kpi-grid">
        
        <!-- Tarjeta 1: Productos Catalogados -->
        <div class="kpi-card card-blue">
            <div class="kpi-body">
                <div class="kpi-info">
                    <span class="kpi-label">PRODUCTOS CATALOGADOS</span>
                    <h3 class="kpi-number"><?= $totalProductos ?></h3>
                </div>
                <div class="kpi-icon">
                    <!-- Icono de Caja / Producto -->
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                </div>
            </div>
            <a href="/Moon_essence/public/index.php?action=panel-emprendedor" class="kpi-footer">
                Gestionar Productos &rarr;
            </a>
        </div>

        <!-- Tarjeta 2: Categorías Activas -->
        <div class="kpi-card card-green">
            <div class="kpi-body">
                <div class="kpi-info">
                    <span class="kpi-label">CATEGORÍAS ACTIVAS</span>
                    <h3 class="kpi-number"><?= $totalCategorias ?></h3>
                </div>
                <div class="kpi-icon">
                    <!-- Icono de Etiqueta / Categoría -->
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                        <line x1="7" y1="7" x2="7.01" y2="7"></line>
                    </svg>
                </div>
            </div>
            <a href="#" class="kpi-footer">
                Gestionar Categorías &rarr;
            </a>
        </div>

        <!-- Tarjeta 3: Analítica / Reportes -->
        <div class="kpi-card card-white">
            <div class="kpi-body">
                <div class="kpi-info">
                    <span class="kpi-label">ANALÍTICA DE VENTAS</span>
                    <h3 class="kpi-title-text">Reportes</h3>
                </div>
                <div class="kpi-icon icon-rose">
                    <!-- Icono de Gráfico de Tendencia -->
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                </div>
            </div>
            <a href="#" class="kpi-footer footer-rose">
                Ver Métricas y KPIs &rarr;
            </a>
        </div>

    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>