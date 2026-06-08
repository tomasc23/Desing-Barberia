<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta — Barber Brizu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ── Design tokens ── */
        :root {
            --paper:       oklch(98.5% 0.004 240);
            --paper-2:     oklch(96.5% 0.006 240);
            --ink:         oklch(16%   0.01  240);
            --ink-soft:    oklch(35%   0.012 240);
            --ink-mute:    oklch(52%   0.012 240);
            --rule:        oklch(89%   0.008 240);

            --blue-50:     oklch(94%   0.035 240);
            --blue-100:    oklch(87%   0.07  240);
            --blue-200:    oklch(76%   0.115 245);
            --blue-400:    oklch(56%   0.155 250);
            --blue-600:    oklch(40%   0.17  252);
            --blue-900:    oklch(24%   0.09  252);

            --gold:        oklch(80%   0.15  85);
            --gold-soft:   oklch(92%   0.08  88);
            --gold-deep:   oklch(58%   0.14  75);

            --green:       oklch(72%   0.15  145);
            --green-soft:  oklch(94%   0.05  145);
            --green-deep:  oklch(45%   0.14  145);

            --red:         oklch(72%   0.16  22);
            --red-soft:    oklch(94%   0.04  22);
            --red-deep:    oklch(50%   0.17  22);

            --yellow-soft: oklch(95%   0.05  90);
            --yellow-deep: oklch(55%   0.14  90);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Outfit', -apple-system, sans-serif;
            font-size: 15px;
            line-height: 1.5;
            background: var(--paper-2);
            color: var(--ink);
            min-height: 100vh;
        }

        /* ── Navbar ── */
        .navbar {
            position: sticky;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 48px;
            background: oklch(98.5% 0.004 240 / 0.92);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--rule);
            z-index: 200;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--ink);
        }
        .logo-mark {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--blue-600);
            color: var(--paper);
            display: grid;
            place-items: center;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.04em;
            flex-shrink: 0;
        }
        .logo-text { font-weight: 600; font-size: 17px; letter-spacing: -0.01em; }

        .nav-actions { display: flex; gap: 10px; align-items: center; }

        /* ── Buttons ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 18px;
            border-radius: 10px;
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: opacity 0.15s, background 0.15s;
            white-space: nowrap;
        }
        .btn:hover { opacity: 0.82; }
        .btn-gold {
            background: var(--gold);
            color: oklch(14% 0.01 240);
        }
        .btn-outline {
            background: transparent;
            color: var(--ink);
            border: 1.5px solid var(--rule);
        }
        .btn-outline:hover { border-color: var(--ink-mute); opacity: 1; }
        .btn-outline-blue {
            background: transparent;
            color: var(--blue-600);
            border: 1.5px solid var(--blue-100);
        }
        .btn-outline-blue:hover { background: var(--blue-50); opacity: 1; }
        .btn-outline-red {
            background: transparent;
            color: var(--red-deep);
            border: 1.5px solid oklch(88% 0.06 22);
        }
        .btn-outline-red:hover { background: var(--red-soft); opacity: 1; }
        .btn-red {
            background: var(--red);
            color: #fff;
        }
        .btn-sm { padding: 7px 14px; font-size: 13px; }

        /* ── Layout ── */
        .page-wrapper {
            max-width: 860px;
            margin: 0 auto;
            padding: 40px 24px 80px;
        }

        /* ── Welcome ── */
        .welcome-header { margin-bottom: 32px; }
        .welcome-header h1 {
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }
        .welcome-header p {
            margin-top: 4px;
            color: var(--ink-mute);
            font-size: 15px;
        }

        /* ── Next turn card ── */
        .next-turn-card {
            background: var(--blue-50);
            border: 1px solid var(--blue-100);
            border-radius: 16px;
            padding: 28px;
            margin-bottom: 32px;
        }
        .next-turn-empty {
            background: var(--paper);
            border: 1.5px dashed var(--rule);
            border-radius: 16px;
            padding: 40px 28px;
            margin-bottom: 32px;
            text-align: center;
        }
        .next-turn-empty p {
            color: var(--ink-mute);
            margin-bottom: 16px;
            font-size: 15px;
        }

        .nt-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 12px;
        }
        .nt-badge-row { display: flex; align-items: center; gap: 10px; }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.02em;
        }
        .badge-blue   { background: var(--blue-100); color: var(--blue-600); }
        .badge-green  { background: var(--green-soft); color: var(--green-deep); }
        .badge-yellow { background: var(--yellow-soft); color: var(--yellow-deep); }
        .badge-red    { background: var(--red-soft); color: var(--red-deep); }
        .badge-mute   { background: var(--paper-2); color: var(--ink-mute); border: 1px solid var(--rule); }

        .badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            display: inline-block;
        }

        .nt-body { display: grid; grid-template-columns: 1fr 1fr; gap: 16px 32px; }
        .nt-field label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--blue-400);
            margin-bottom: 2px;
        }
        .nt-field span {
            font-size: 15px;
            font-weight: 500;
            color: var(--ink);
        }

        .nt-actions {
            display: flex;
            gap: 10px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        /* ── Tabs ── */
        .tabs-wrapper { margin-bottom: 24px; }
        .tabs-nav {
            display: flex;
            gap: 4px;
            background: var(--paper);
            border: 1px solid var(--rule);
            border-radius: 12px;
            padding: 5px;
        }
        .tab-btn {
            flex: 1;
            padding: 9px 16px;
            border-radius: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
            font-weight: 500;
            color: var(--ink-mute);
            background: transparent;
            border: none;
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
            white-space: nowrap;
        }
        .tab-btn.active {
            background: var(--blue-600);
            color: #fff;
            box-shadow: 0 1px 4px oklch(0% 0 0 / 0.12);
        }
        .tab-btn:not(.active):hover { color: var(--ink); background: var(--paper-2); }

        .tabs-dropdown { display: none; }
        .tabs-dropdown select {
            width: 100%;
            padding: 10px 14px;
            border-radius: 10px;
            border: 1.5px solid var(--rule);
            font-family: 'Outfit', sans-serif;
            font-size: 15px;
            font-weight: 500;
            background: var(--paper);
            color: var(--ink);
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='none' stroke='%23888' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' viewBox='0 0 24 24'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            cursor: pointer;
        }
        .tabs-dropdown select:focus { outline: none; border-color: var(--blue-400); }

        .tab-panel { display: none; }
        .tab-panel.active { display: block; }

        /* ── Turn cards ── */
        .turns-list { display: flex; flex-direction: column; gap: 14px; }
        .turn-card {
            background: var(--paper);
            border: 1px solid var(--rule);
            border-radius: 14px;
            padding: 20px 24px;
        }
        .turn-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 12px;
            flex-wrap: wrap;
            gap: 8px;
        }
        .turn-service {
            font-size: 16px;
            font-weight: 600;
            letter-spacing: -0.01em;
        }
        .turn-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px 20px;
            margin-bottom: 16px;
        }
        .turn-meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: var(--ink-soft);
        }
        .turn-meta-item svg { flex-shrink: 0; opacity: 0.6; }
        .turn-actions { display: flex; gap: 8px; flex-wrap: wrap; }

        /* ── Empty state ── */
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: var(--ink-mute);
        }
        .empty-state .empty-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: var(--paper-2);
            display: grid;
            place-items: center;
            margin: 0 auto 16px;
            color: var(--ink-mute);
        }
        .empty-state p { margin-bottom: 20px; }

        /* ── Stats row ── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 24px;
        }
        .stat-card {
            background: var(--paper);
            border: 1px solid var(--rule);
            border-radius: 12px;
            padding: 18px;
            text-align: center;
        }
        .stat-card .stat-num {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.03em;
            color: var(--ink);
            line-height: 1;
            margin-bottom: 4px;
        }
        .stat-card .stat-label { font-size: 12px; color: var(--ink-mute); font-weight: 500; }

        /* ── Historial ── */
        .section-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 14px;
            color: var(--ink);
        }

        .favorite-service {
            background: var(--paper);
            border: 1px solid var(--rule);
            border-radius: 12px;
            padding: 18px 22px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .favorite-service .fav-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--gold-soft);
            display: grid;
            place-items: center;
            color: var(--gold-deep);
            flex-shrink: 0;
        }
        .favorite-service .fav-label { font-size: 12px; color: var(--ink-mute); }
        .favorite-service .fav-service { font-size: 16px; font-weight: 600; }
        .favorite-service .fav-count { font-size: 13px; color: var(--ink-mute); margin-top: 1px; }

        /* ── History table ── */
        .table-wrap { overflow-x: auto; border-radius: 12px; border: 1px solid var(--rule); }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        thead tr { background: var(--paper); }
        thead th {
            padding: 12px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--ink-mute);
            border-bottom: 1px solid var(--rule);
            white-space: nowrap;
        }
        tbody tr { background: var(--paper); transition: background 0.1s; }
        tbody tr:nth-child(even) { background: oklch(98% 0.003 240); }
        tbody tr:hover { background: var(--blue-50); }
        tbody td {
            padding: 13px 16px;
            border-bottom: 1px solid var(--rule);
            color: var(--ink-soft);
            white-space: nowrap;
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody td:first-child { color: var(--ink); font-weight: 500; }

        /* ── Profile ── */
        .profile-card {
            background: var(--paper);
            border: 1px solid var(--rule);
            border-radius: 14px;
            padding: 28px;
            margin-bottom: 16px;
        }
        .profile-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }
        .profile-card-header h2 { font-size: 17px; font-weight: 600; }

        .profile-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

        .field-group { display: flex; flex-direction: column; gap: 6px; }
        .field-group label {
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--ink-mute);
        }
        .field-value {
            font-size: 15px;
            font-weight: 500;
            color: var(--ink);
            padding: 10px 0;
            border-bottom: 1px solid var(--rule);
        }
        .field-input {
            padding: 10px 14px;
            border: 1.5px solid var(--rule);
            border-radius: 9px;
            font-family: 'Outfit', sans-serif;
            font-size: 15px;
            color: var(--ink);
            background: var(--paper);
            transition: border-color 0.15s;
            width: 100%;
        }
        .field-input:focus { outline: none; border-color: var(--blue-400); }
        .field-input:disabled {
            background: var(--paper-2);
            color: var(--ink-mute);
            cursor: default;
        }

        .profile-actions { display: flex; gap: 10px; margin-top: 24px; flex-wrap: wrap; }
        .profile-actions .hidden { display: none; }

        .security-card {
            background: var(--paper);
            border: 1px solid var(--rule);
            border-radius: 14px;
            padding: 24px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }
        .security-card-info h3 { font-size: 15px; font-weight: 600; margin-bottom: 2px; }
        .security-card-info p { font-size: 13px; color: var(--ink-mute); }

        /* ── Modal ── */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background: oklch(0% 0 0 / 0.45);
            z-index: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s;
        }
        .modal-backdrop.open { opacity: 1; pointer-events: all; }

        .modal {
            background: var(--paper);
            border-radius: 18px;
            padding: 32px;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 20px 60px oklch(0% 0 0 / 0.18);
            transform: translateY(12px) scale(0.97);
            transition: transform 0.2s;
        }
        .modal-backdrop.open .modal { transform: translateY(0) scale(1); }

        .modal-title {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin-bottom: 8px;
        }
        .modal-subtitle { font-size: 14px; color: var(--ink-mute); margin-bottom: 22px; }

        .modal-turn-summary {
            background: var(--blue-50);
            border: 1px solid var(--blue-100);
            border-radius: 10px;
            padding: 16px;
            margin-bottom: 16px;
            font-size: 14px;
        }
        .modal-turn-summary .mts-row {
            display: flex;
            gap: 8px;
            color: var(--ink-soft);
            margin-bottom: 4px;
        }
        .modal-turn-summary .mts-row:last-child { margin-bottom: 0; }
        .modal-turn-summary .mts-row strong { color: var(--ink); min-width: 70px; }

        .modal-warning {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            background: var(--red-soft);
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 24px;
            font-size: 13px;
            color: var(--red-deep);
        }

        .modal-actions { display: flex; gap: 10px; justify-content: flex-end; flex-wrap: wrap; }

        .modal-field { margin-bottom: 16px; }
        .modal-field label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--ink-soft);
            margin-bottom: 6px;
        }
        .modal-field input {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid var(--rule);
            border-radius: 9px;
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
            color: var(--ink);
            background: var(--paper);
            transition: border-color 0.15s;
        }
        .modal-field input:focus { outline: none; border-color: var(--blue-400); }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .navbar { padding: 14px 20px; }
            .page-wrapper { padding: 28px 16px 60px; }
            .welcome-header h1 { font-size: 22px; }

            .tabs-nav { display: none; }
            .tabs-dropdown { display: block; margin-bottom: 20px; }

            .nt-body { grid-template-columns: 1fr; gap: 12px; }
            .stats-row { grid-template-columns: 1fr; }
            .profile-grid { grid-template-columns: 1fr; }

            .table-wrap { border-radius: 10px; }

            .modal { padding: 24px; }
        }

        @media (max-width: 480px) {
            .nt-top { flex-direction: column; }
            .nav-actions .btn-outline span { display: none; }
        }
    </style>
</head>
<body>

<!-- ── Navbar ── -->
<nav class="navbar">
    <a href="/" class="logo">
        <div class="logo-mark">BB</div>
        <span class="logo-text">Barber Brizu</span>
    </a>
    <div class="nav-actions">
        <a href="/reservar" class="btn btn-gold">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Sacar turno
        </a>
        <a href="/logout" class="btn btn-outline">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            <span>Cerrar sesión</span>
        </a>
    </div>
</nav>

<!-- ── Page wrapper ── -->
<div class="page-wrapper">

    <!-- Welcome -->
    <div class="welcome-header">
        <h1>Hola, Martina 👋</h1>
        <p>Aquí podés ver y gestionar tus turnos</p>
    </div>

    <!-- ── Próximo turno ── -->
    <!-- Mostrar esta card si hay turno próximo -->
    <div class="next-turn-card" id="nextTurnCard">
        <div class="nt-top">
            <div class="nt-badge-row">
                <span class="badge badge-blue">Próximo turno</span>
                <span class="badge badge-green">Confirmado</span>
            </div>
        </div>
        <div class="nt-body">
            <div class="nt-field">
                <label>Servicio</label>
                <span>Corte de cabello + Barba</span>
            </div>
            <div class="nt-field">
                <label>Barbero</label>
                <span>Carlos Medina</span>
            </div>
            <div class="nt-field">
                <label>Fecha</label>
                <span>Jueves 22 de mayo, 2025</span>
            </div>
            <div class="nt-field">
                <label>Horario</label>
                <span>10:30 hs</span>
            </div>
        </div>
        <div class="nt-actions">
            <button class="btn btn-outline btn-sm">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                Reprogramar
            </button>
            <button class="btn btn-outline-red btn-sm" onclick="openCancelModal('Corte de cabello + Barba', 'Carlos Medina', 'Jueves 22 de mayo', '10:30 hs')">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                Cancelar turno
            </button>
        </div>
    </div>

    <!-- Mostrar esta card si NO hay turno próximo (oculta por defecto) -->
    <div class="next-turn-empty" id="nextTurnEmpty" style="display:none;">
        <svg width="40" height="40" fill="none" stroke="var(--ink-mute)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" style="margin:0 auto 14px;display:block;"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        <p>No tenés turnos próximos</p>
        <a href="/reservar" class="btn btn-gold">Sacar tu primer turno</a>
    </div>

    <!-- ── Tabs ── -->
    <div class="tabs-wrapper">
        <!-- Desktop: botones -->
        <div class="tabs-nav" role="tablist">
            <button class="tab-btn active" onclick="switchTab('mis-turnos', this)" role="tab" aria-selected="true">Mis turnos</button>
            <button class="tab-btn" onclick="switchTab('historial', this)" role="tab" aria-selected="false">Historial</button>
            <button class="tab-btn" onclick="switchTab('mi-perfil', this)" role="tab" aria-selected="false">Mi perfil</button>
        </div>
        <!-- Mobile: dropdown -->
        <div class="tabs-dropdown">
            <select onchange="switchTabFromSelect(this.value)">
                <option value="mis-turnos">Mis turnos</option>
                <option value="historial">Historial</option>
                <option value="mi-perfil">Mi perfil</option>
            </select>
        </div>
    </div>

    <!-- ── TAB 1: Mis turnos ── -->
    <div class="tab-panel active" id="tab-mis-turnos">
        <div class="turns-list">

            <!-- Turno 1 -->
            <div class="turn-card">
                <div class="turn-card-header">
                    <div class="turn-service">Corte de cabello</div>
                    <span class="badge badge-green">Confirmado</span>
                </div>
                <div class="turn-meta">
                    <div class="turn-meta-item">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Carlos Medina
                    </div>
                    <div class="turn-meta-item">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        Jue 22 mayo
                    </div>
                    <div class="turn-meta-item">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        10:30 hs
                    </div>
                </div>
                <div class="turn-actions">
                    <button class="btn btn-outline btn-sm">Reprogramar</button>
                    <button class="btn btn-outline-red btn-sm" onclick="openCancelModal('Corte de cabello', 'Carlos Medina', 'Jue 22 mayo', '10:30 hs')">Cancelar turno</button>
                </div>
            </div>

            <!-- Turno 2 -->
            <div class="turn-card">
                <div class="turn-card-header">
                    <div class="turn-service">Barba</div>
                    <span class="badge badge-yellow">Pendiente de confirmación</span>
                </div>
                <div class="turn-meta">
                    <div class="turn-meta-item">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Facundo Torres
                    </div>
                    <div class="turn-meta-item">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        Lun 26 mayo
                    </div>
                    <div class="turn-meta-item">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        15:00 hs
                    </div>
                </div>
                <div class="turn-actions">
                    <button class="btn btn-outline btn-sm">Reprogramar</button>
                    <button class="btn btn-outline-red btn-sm" onclick="openCancelModal('Barba', 'Facundo Torres', 'Lun 26 mayo', '15:00 hs')">Cancelar turno</button>
                </div>
            </div>

        </div>
    </div>

    <!-- ── TAB 2: Historial ── -->
    <div class="tab-panel" id="tab-historial">

        <!-- Stats -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-num">8</div>
                <div class="stat-label">Total de turnos</div>
            </div>
            <div class="stat-card">
                <div class="stat-num" style="color:var(--green-deep)">7</div>
                <div class="stat-label">Asistidos</div>
            </div>
            <div class="stat-card">
                <div class="stat-num" style="color:var(--red-deep)">1</div>
                <div class="stat-label">Cancelados</div>
            </div>
        </div>

        <!-- Servicio favorito -->
        <div class="favorite-service">
            <div class="fav-icon">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <div>
                <div class="fav-label">Servicio más solicitado</div>
                <div class="fav-service">Corte de cabello</div>
                <div class="fav-count">5 veces</div>
            </div>
        </div>

        <!-- Tabla historial -->
        <p class="section-title">Tus turnos anteriores</p>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Servicio/s</th>
                        <th>Barbero</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Corte de cabello</td>
                        <td>Carlos Medina</td>
                        <td>Vie 2 mayo</td>
                        <td><span class="badge badge-green">Atendido</span></td>
                    </tr>
                    <tr>
                        <td>Barba</td>
                        <td>Facundo Torres</td>
                        <td>Mar 22 abr</td>
                        <td><span class="badge badge-green">Atendido</span></td>
                    </tr>
                    <tr>
                        <td>Corte de cabello + Barba</td>
                        <td>Carlos Medina</td>
                        <td>Jue 10 abr</td>
                        <td><span class="badge badge-green">Atendido</span></td>
                    </tr>
                    <tr>
                        <td>Corte de cabello</td>
                        <td>Carlos Medina</td>
                        <td>Lun 24 mar</td>
                        <td><span class="badge badge-red">Cancelado</span></td>
                    </tr>
                    <tr>
                        <td>Corte de cabello</td>
                        <td>Facundo Torres</td>
                        <td>Vie 7 mar</td>
                        <td><span class="badge badge-green">Atendido</span></td>
                    </tr>
                    <tr>
                        <td>Barba</td>
                        <td>Carlos Medina</td>
                        <td>Mié 19 feb</td>
                        <td><span class="badge badge-mute">No asistió</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ── TAB 3: Mi perfil ── -->
    <div class="tab-panel" id="tab-mi-perfil">

        <!-- Datos personales -->
        <div class="profile-card">
            <div class="profile-card-header">
                <h2>Datos personales</h2>
                <button class="btn btn-outline btn-sm" id="editBtn" onclick="toggleEdit()">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    Editar datos
                </button>
            </div>

            <div class="profile-grid" id="profileGrid">
                <div class="field-group">
                    <label>Nombre completo</label>
                    <div class="field-value" id="view-nombre">Martina González</div>
                    <input class="field-input" id="edit-nombre" value="Martina González" style="display:none;" placeholder="Nombre completo">
                </div>
                <div class="field-group">
                    <label>Correo electrónico</label>
                    <div class="field-value" id="view-email">martina@email.com</div>
                    <input class="field-input" id="edit-email" value="martina@email.com" style="display:none;" type="email" placeholder="Correo electrónico">
                </div>
                <div class="field-group">
                    <label>Celular</label>
                    <div class="field-value" id="view-celular">+54 370 4123456</div>
                    <input class="field-input" id="edit-celular" value="+54 370 4123456" style="display:none;" placeholder="Número de celular">
                </div>
                <div class="field-group">
                    <label>Fecha de nacimiento</label>
                    <div class="field-value" id="view-nacimiento">15 de marzo, 1998</div>
                    <input class="field-input" id="edit-nacimiento" value="1998-03-15" style="display:none;" type="date">
                </div>
            </div>

            <div class="profile-actions" id="profileActions" style="display:none;">
                <button class="btn btn-gold btn-sm" onclick="saveProfile()">Guardar cambios</button>
                <button class="btn btn-outline btn-sm" onclick="cancelEdit()">Cancelar</button>
            </div>
        </div>

        <!-- Seguridad -->
        <div class="security-card">
            <div class="security-card-info">
                <h3>Seguridad</h3>
                <p>Actualizá tu contraseña periódicamente para mayor protección</p>
            </div>
            <button class="btn btn-outline btn-sm" onclick="openPasswordModal()">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                Cambiar contraseña
            </button>
        </div>

    </div>
</div>

<!-- ── Modal: Cancelar turno ── -->
<div class="modal-backdrop" id="cancelModal">
    <div class="modal">
        <h2 class="modal-title">¿Cancelar este turno?</h2>
        <p class="modal-subtitle">Revisá los datos antes de confirmar.</p>

        <div class="modal-turn-summary">
            <div class="mts-row"><strong>Servicio</strong><span id="cancel-servicio">—</span></div>
            <div class="mts-row"><strong>Barbero</strong><span id="cancel-barbero">—</span></div>
            <div class="mts-row"><strong>Fecha</strong><span id="cancel-fecha">—</span></div>
            <div class="mts-row"><strong>Horario</strong><span id="cancel-horario">—</span></div>
        </div>

        <div class="modal-warning">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:1px"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            Una vez cancelado no podrás recuperarlo.
        </div>

        <div class="modal-actions">
            <button class="btn btn-outline btn-sm" onclick="closeModal('cancelModal')">Volver</button>
            <button class="btn btn-red btn-sm">Sí, cancelar turno</button>
        </div>
    </div>
</div>

<!-- ── Modal: Cambiar contraseña ── -->
<div class="modal-backdrop" id="passwordModal">
    <div class="modal">
        <h2 class="modal-title">Cambiar contraseña</h2>
        <p class="modal-subtitle">Ingresá tu contraseña actual y la nueva.</p>

        <div class="modal-field">
            <label>Contraseña actual</label>
            <input type="password" placeholder="••••••••">
        </div>
        <div class="modal-field">
            <label>Nueva contraseña</label>
            <input type="password" placeholder="••••••••">
        </div>
        <div class="modal-field" style="margin-bottom:24px;">
            <label>Confirmar nueva contraseña</label>
            <input type="password" placeholder="••••••••">
        </div>

        <div class="modal-actions">
            <button class="btn btn-outline btn-sm" onclick="closeModal('passwordModal')">Cancelar</button>
            <button class="btn btn-gold btn-sm">Guardar contraseña</button>
        </div>
    </div>
</div>

<script>
    /* ── Tabs ── */
    function switchTab(tabId, btn) {
        document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
        document.querySelectorAll('.tab-btn').forEach(b => {
            b.classList.remove('active');
            b.setAttribute('aria-selected', 'false');
        });
        document.getElementById('tab-' + tabId).classList.add('active');
        if (btn) {
            btn.classList.add('active');
            btn.setAttribute('aria-selected', 'true');
        }
        const sel = document.querySelector('.tabs-dropdown select');
        if (sel) sel.value = tabId;
    }

    function switchTabFromSelect(val) {
        const btns = document.querySelectorAll('.tab-btn');
        const map = { 'mis-turnos': 0, 'historial': 1, 'mi-perfil': 2 };
        switchTab(val, btns[map[val]]);
    }

    /* ── Cancel modal ── */
    function openCancelModal(servicio, barbero, fecha, horario) {
        document.getElementById('cancel-servicio').textContent = servicio;
        document.getElementById('cancel-barbero').textContent  = barbero;
        document.getElementById('cancel-fecha').textContent    = fecha;
        document.getElementById('cancel-horario').textContent  = horario;
        document.getElementById('cancelModal').classList.add('open');
    }

    /* ── Password modal ── */
    function openPasswordModal() {
        document.getElementById('passwordModal').classList.add('open');
    }

    /* ── Close modal ── */
    function closeModal(id) {
        document.getElementById(id).classList.remove('open');
    }

    document.querySelectorAll('.modal-backdrop').forEach(backdrop => {
        backdrop.addEventListener('click', function(e) {
            if (e.target === this) this.classList.remove('open');
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-backdrop.open').forEach(m => m.classList.remove('open'));
        }
    });

    /* ── Profile edit ── */
    const fields = ['nombre', 'email', 'celular', 'nacimiento'];
    let editing = false;

    function toggleEdit() {
        editing = true;
        fields.forEach(f => {
            document.getElementById('view-' + f).style.display = 'none';
            document.getElementById('edit-' + f).style.display = 'block';
        });
        document.getElementById('profileActions').style.display = 'flex';
        document.getElementById('editBtn').style.display = 'none';
    }

    function cancelEdit() {
        editing = false;
        fields.forEach(f => {
            document.getElementById('view-' + f).style.display = 'block';
            document.getElementById('edit-' + f).style.display = 'none';
        });
        document.getElementById('profileActions').style.display = 'none';
        document.getElementById('editBtn').style.display = 'inline-flex';
    }

    function saveProfile() {
        /* Update display values from inputs */
        const map = {
            nombre:     document.getElementById('edit-nombre').value,
            email:      document.getElementById('edit-email').value,
            celular:    document.getElementById('edit-celular').value,
            nacimiento: document.getElementById('edit-nacimiento').value,
        };
        document.getElementById('view-nombre').textContent     = map.nombre;
        document.getElementById('view-email').textContent      = map.email;
        document.getElementById('view-celular').textContent    = map.celular;
        document.getElementById('view-nacimiento').textContent = map.nacimiento;
        cancelEdit();
    }
</script>

</body>
</html>
