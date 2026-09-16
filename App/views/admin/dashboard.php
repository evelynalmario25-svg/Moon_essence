<?php include __DIR__ . '/../layouts/header.php'; ?>

<style>
.dash-wrapper {
    max-width: 1100px;
    margin: 40px auto;
    padding: 0 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.dash-header-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    border-bottom: 1px solid #e2d2b4;
    padding-bottom: 15px;
}

.dash-title-group {
    display: flex;
    align-items: center;
    gap: 12px;
}

.dash-title-group h2 {
    font-size: 26px;
    color: #2b2319;
    margin: 0;
    font-weight: 700;
}

.badge-admin-gold {
    background-color: #c5a059;
    color: #ffffff;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

/* GRID DE TARJETAS KPI */
.dash-kpi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 24px;
}

.kpi-box {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(43, 35, 25, 0.05);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border: 1px solid #e8dcbf;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.kpi-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(197, 160, 89, 0.15);
}

.kpi-main {
    padding: 24px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.kpi-tag {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    display: block;
    margin-bottom: 8px;
}

.kpi-value {
    font-size: 42px;
    font-weight: 700;
    line-height: 1;
    margin: 0;
}

.kpi-title-text {
    font-size: 22px;
    font-weight: 700;
    margin: 5px 0 0 0;
}

.kpi-btn-link {
    display: block;
    text-align: center;
    padding: 13px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.2s ease, color 0.2s ease;
    letter-spacing: 0.5px;
}

/* TARJETA 1: DORADO INTENSO / ORO VIEJO */
.box-gold-dark { 
    background-color: #a37f3e; 
    color: #ffffff; 
}
.box-gold-dark .kpi-tag { color: #f4e8cf; }
.box-gold-dark .kpi-btn-link { 
    background-color: #f9f3e5; 
    color: #7a5c25; 
}
.box-gold-dark .kpi-btn-link:hover { background-color: #f2e5c9; }

/* TARJETA 2: DORADO SUAVE / CHAMPAGNE */
.box-gold-medium { 
    background-color: #c5a059; 
    color: #ffffff; 
}
.box-gold-medium .kpi-tag { color: #fdf8eb; }
.box-gold-medium .kpi-btn-link { 
    background-color: #fcf8ee; 
    color: #8c6a2b; 
}
.box-gold-medium .kpi-btn-link:hover { background-color: #f5ebd2; }

/* TARJETA 3: BLANCO / CREMA DORADO */
.box-gold-light { 
    background-color: #ffffff; 
    color: #2b2319; 
}
.box-gold-light .kpi-tag { color: #a37f3e; }
.box-gold-light .kpi-btn-link { 
    background-color: #f7efdd; 
    color: #8c6a2b; 
}
.box-gold-light .kpi-btn-link:hover { background-color: #eee0c0; }

.kpi-svg-icon {
    width: 42px;
    height: 42px;
    opacity: 0.9;
}
</style>

<div class="dash-wrapper">
    
    <div class="dash-header-bar">
        <div class="dash-title-group">
            <svg style="width: 28px; height: 28px; color: #c5a059;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
            <h2>Panel de Administración</h2>
        </div>
        <span class="badge-admin-gold">Administrador</span>
    </div>

    <div class="dash-kpi-grid">
        
        <!-- Tarjeta 1: Productos Catalogados -->
        <div class="kpi-box box-gold-dark">
            <div class="kpi-main">
                <div>
                    <span class="kpi-tag">PRODUCTOS CATALOGADOS</span>
                    <div class="kpi-value"><?= $totalProductos ?? 6 ?></div>
                </div>
                <div class="kpi-svg-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
            <a href="/Moon_essence/public/index.php?action=panel-emprendedor" class="kpi-btn-link">
                Gestionar Productos &rarr;
            </a>
        </div>

        <!-- Tarjeta 2: Categorías Activas -->
        <div class="kpi-box box-gold-medium">
            <div class="kpi-main">
                <div>
                    <span class="kpi-tag">CATEGORÍAS ACTIVAS</span>
                    <div class="kpi-value"><?= $totalCategorias ?? 5 ?></div>
                </div>
                <div class="kpi-svg-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
            </div>
            <a href="#" class="kpi-btn-link">
                Gestionar Categorías &rarr;
            </a>
        </div>

        <!-- Tarjeta 3: Analítica de Ventas -->
        <div class="kpi-box box-gold-light">
            <div class="kpi-main">
                <div>
                    <span class="kpi-tag">ANALÍTICA DE VENTAS</span>
                    <div class="kpi-title-text">Reportes</div>
                </div>
                <div class="kpi-svg-icon" style="color: #c5a059;">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
            </div>
            <a href="/Moon_essence/public/index.php?action=reportes" class="kpi-btn-link">
                Ver Métricas y KPIs &rarr;
            </a>
        </div>

    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>