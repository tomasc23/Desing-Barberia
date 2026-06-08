<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adelantos — Barber Brizu</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --paper:     oklch(98.5% 0.004 240);
      --paper-2:   oklch(96.5% 0.006 240);
      --ink:       oklch(16%   0.01  240);
      --ink-soft:  oklch(35%   0.012 240);
      --ink-mute:  oklch(52%   0.012 240);
      --rule:      oklch(89%   0.008 240);
      --blue-50:   oklch(94%   0.035 240);
      --blue-100:  oklch(87%   0.07  240);
      --blue-200:  oklch(76%   0.115 245);
      --blue-400:  oklch(56%   0.155 250);
      --blue-600:  oklch(40%   0.17  252);
      --blue-900:  oklch(24%   0.09  252);
      --gold:      oklch(80%   0.15  85);
      --gold-soft: oklch(92%   0.08  88);
      --gold-deep: oklch(58%   0.14  75);
      --red:       oklch(72%   0.16  22);
      --red-soft:  oklch(93%   0.045 22);
      --red-deep:  oklch(50%   0.17  22);
      --green:      oklch(70%  0.15  145);
      --green-soft: oklch(94%  0.06  145);
      --green-deep: oklch(42%  0.14  145);
      --violet:      oklch(62%  0.14  290);
      --violet-soft: oklch(93%  0.05  290);
      --violet-deep: oklch(44%  0.13  290);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Outfit', -apple-system, sans-serif;
      font-size: 14px; line-height: 1.5;
      color: var(--ink); background: var(--paper-2);
    }

    .layout { display: flex; min-height: 100vh; }

    /* ── SIDEBAR ── */
    .sidebar {
      width: 230px; height: 100vh; position: fixed; left: 0; top: 0;
      background: var(--paper); border-right: 1px solid var(--rule);
      display: flex; flex-direction: column; z-index: 20; overflow: hidden;
    }
    .sidebar-logo {
      height: 60px; padding: 0 16px; border-bottom: 1px solid var(--rule);
      display: flex; align-items: center; gap: 10px; flex-shrink: 0;
    }
    .logo-mark {
      width: 33px; height: 33px; border-radius: 9px;
      background: var(--blue-600); color: var(--paper);
      display: grid; place-items: center; font-weight: 700; font-size: 12px; letter-spacing: 0.04em; flex-shrink: 0;
    }
    .logo-name { font-weight: 600; font-size: 13.5px; letter-spacing: -0.01em; line-height: 1.2; }
    .logo-sub  { font-size: 11px; color: var(--ink-mute); margin-top: 1px; }
    .sidebar-nav { flex: 1; overflow-y: auto; padding: 6px 8px; scrollbar-width: none; }
    .sidebar-nav::-webkit-scrollbar { display: none; }
    .nav-group { margin-bottom: 2px; }
    .nav-group-label {
      font-size: 10px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em;
      color: var(--ink-mute); padding: 10px 9px 4px;
    }
    .nav-link {
      display: flex; align-items: center; gap: 8px; padding: 7px 10px; border-radius: 8px;
      color: var(--ink-soft); font-size: 13px; font-weight: 500; cursor: pointer;
      text-decoration: none; transition: background 0.12s, color 0.12s; white-space: nowrap;
    }
    .nav-link:hover  { background: var(--paper-2); color: var(--ink); }
    .nav-link.active { background: var(--blue-50);  color: var(--blue-600); }
    .nav-link svg    { flex-shrink: 0; opacity: 0.7; }
    .nav-link.active svg { opacity: 1; }
    .nav-badge {
      margin-left: auto; background: var(--blue-600); color: var(--paper);
      font-size: 10px; font-weight: 700; padding: 2px 6px; border-radius: 999px;
      min-width: 18px; text-align: center; flex-shrink: 0;
    }
    .sidebar-user {
      padding: 13px 14px; border-top: 1px solid var(--rule);
      display: flex; align-items: center; gap: 10px; flex-shrink: 0;
    }
    .s-user-av {
      width: 32px; height: 32px; border-radius: 50%; background: var(--blue-600); color: var(--paper);
      display: grid; place-items: center; font-size: 11px; font-weight: 700; flex-shrink: 0;
    }
    .s-user-name { font-size: 13px; font-weight: 600; line-height: 1.2; }
    .s-user-role { font-size: 11px; color: var(--ink-mute); }

    /* ── MAIN / TOPBAR ── */
    .main-area {
      margin-left: 230px; min-height: 100vh;
      display: flex; flex-direction: column; flex: 1; min-width: 0; width: calc(100% - 230px);
    }
    .topbar {
      position: fixed; top: 0; left: 230px; right: 0; height: 60px;
      background: oklch(98.5% 0.004 240 / 0.92); backdrop-filter: blur(8px);
      border-bottom: 1px solid var(--rule); display: flex; align-items: center;
      justify-content: space-between; padding: 0 26px; z-index: 10;
    }
    .topbar-title h1 { font-size: 16px; font-weight: 600; letter-spacing: -0.01em; line-height: 1.2; }
    .breadcrumb { font-size: 11.5px; color: var(--ink-mute); margin-top: 1px; }
    .topbar-actions { display: flex; gap: 9px; align-items: center; }
    .topbar-hamburger {
      display: none; flex-direction: column; gap: 5px; background: none; border: 1px solid var(--rule);
      cursor: pointer; padding: 7px 9px; border-radius: 8px; margin-right: 4px;
    }
    .topbar-hamburger span { display: block; width: 18px; height: 2px; background: var(--ink); border-radius: 2px; }

    /* ── BUTTONS ── */
    .btn {
      padding: 8px 15px; border-radius: 9px; font-size: 13.5px; font-weight: 500;
      font-family: inherit; cursor: pointer; border: none;
      display: inline-flex; align-items: center; gap: 7px;
      transition: opacity 0.12s; line-height: 1; text-decoration: none;
    }
    .btn:hover { opacity: 0.78; }
    .btn-outline { background: transparent; color: var(--ink); border: 1px solid var(--rule); }
    .btn-sm      { padding: 6px 11px; font-size: 12px; border-radius: 7px; }
    .btn-xs      { padding: 4px 9px; font-size: 11.5px; border-radius: 6px; }
    .btn-gold    { background: var(--gold); color: var(--ink); font-weight: 600; border: none; }
    .btn-gold:hover { opacity: 0.85; }
    .btn-red     { background: var(--red-soft); color: var(--red-deep); border: 1px solid oklch(87% 0.05 22); font-weight: 600; }
    .btn-red:hover { opacity: 0.85; }
    .btn-logout  { color: var(--red-deep); border-color: oklch(86% 0.06 22); }
    .btn-logout:hover { background: var(--red-soft); opacity: 1; }
    .close-btn {
      width: 28px; height: 28px; border-radius: 7px; border: 1px solid var(--rule);
      background: transparent; display: grid; place-items: center; cursor: pointer;
      font-size: 18px; color: var(--ink-mute); line-height: 1; font-family: inherit;
    }
    .close-btn:hover { background: var(--paper-2); }

    /* ── CONTENT ── */
    .content { padding: 80px 26px 40px; display: flex; flex-direction: column; gap: 20px; }
    .section-header {
      display: flex; align-items: flex-end; justify-content: space-between;
    }
    .section-title { font-size: 19px; font-weight: 600; letter-spacing: -0.01em; line-height: 1.2; }
    .section-sub   { font-size: 12.5px; color: var(--ink-mute); margin-top: 3px; }

    /* ── TABS ── */
    .tabs-bar {
      display: flex; gap: 2px; background: var(--paper); border: 1px solid var(--rule);
      border-radius: 12px; padding: 4px; width: fit-content;
    }
    .tab-btn {
      padding: 7px 18px; border-radius: 9px; border: none; background: transparent;
      font-family: inherit; font-size: 13.5px; font-weight: 500; color: var(--ink-mute);
      cursor: pointer; transition: background 0.12s, color 0.12s; white-space: nowrap;
    }
    .tab-btn.active { background: var(--blue-600); color: var(--paper); font-weight: 600; }
    .tab-pane { display: none; flex-direction: column; gap: 20px; }
    .tab-pane.active { display: flex; }

    /* ── STATS ── */
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
    .stat-card {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; padding: 18px 20px;
    }
    .stat-label { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.09em; color: var(--ink-mute); }
    .stat-value { font-size: 28px; font-weight: 700; letter-spacing: -0.025em; margin-top: 5px; line-height: 1; }
    .stat-sub   { font-size: 12px; color: var(--ink-mute); margin-top: 5px; }

    /* ── INLINE REGISTER FORM ── */
    .register-card {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; padding: 20px 22px;
    }
    .register-card-title {
      font-size: 14px; font-weight: 600; margin-bottom: 14px; letter-spacing: -0.01em;
    }
    .form-row   { display: grid; grid-template-columns: 1fr 1fr; gap: 13px; }
    .form-row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 13px; }
    .form-group { display: flex; flex-direction: column; gap: 5px; }
    .form-label { font-size: 12.5px; font-weight: 500; color: var(--ink-soft); }
    .form-input {
      padding: 9px 12px; border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13.5px; color: var(--ink); background: var(--paper);
      outline: none; width: 100%; transition: border-color 0.12s;
    }
    .form-input:focus { border-color: var(--blue-400); }
    .form-select {
      padding: 9px 12px; border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13.5px; color: var(--ink); background: var(--paper);
      outline: none; width: 100%; cursor: pointer; transition: border-color 0.12s;
    }
    .form-select:focus { border-color: var(--blue-400); }
    .form-warn { font-size: 12px; color: var(--red-deep); padding: 10px 14px; background: var(--red-soft); border: 1px solid oklch(87% 0.05 22); border-radius: 8px; line-height: 1.5; }
    .form-ok   { font-size: 12px; color: var(--green-deep); padding: 10px 14px; background: var(--green-soft); border: 1px solid oklch(86% 0.07 145); border-radius: 8px; line-height: 1.5; }
    .register-footer { display: flex; justify-content: flex-end; margin-top: 14px; }

    /* ── TIPO PILLS (movimientos) ── */
    .tipo-pills { display: flex; gap: 6px; }
    .tipo-pill {
      flex: 1; padding: 9px 14px; border: 1.5px solid var(--rule); border-radius: 9px;
      font-family: inherit; font-size: 13px; font-weight: 500; cursor: pointer;
      background: var(--paper); color: var(--ink-mute); transition: all 0.12s; text-align: center;
    }
    .tipo-pill.active-ingreso { background: var(--green-soft); color: var(--green-deep); border-color: var(--green); font-weight: 600; }
    .tipo-pill.active-gasto   { background: var(--red-soft);   color: var(--red-deep);   border-color: var(--red);   font-weight: 600; }

    /* ── TOOLBAR ── */
    .toolbar {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 12px;
      padding: 12px 16px; display: flex; gap: 10px; align-items: center; flex-wrap: wrap;
    }
    .search-wrap { position: relative; flex: 1; min-width: 160px; }
    .search-icon { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: var(--ink-mute); pointer-events: none; }
    .tb-input {
      width: 100%; padding: 8px 12px 8px 34px; border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13.5px; color: var(--ink); background: var(--paper-2);
      outline: none; transition: border-color 0.12s;
    }
    .tb-input:focus { border-color: var(--blue-400); }
    .tb-select {
      padding: 8px 12px; border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13.5px; color: var(--ink); background: var(--paper-2);
      outline: none; cursor: pointer;
    }

    /* ── TABLE ── */
    .table-wrap { overflow-x: auto; margin-top: 12px; }
    .table-card { background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; overflow: hidden; }
    table { width: 100%; border-collapse: collapse; min-width: 700px; }
    thead th {
      padding: 11px 16px; text-align: left; font-size: 10.5px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-mute);
      border-bottom: 1px solid var(--rule); white-space: nowrap; background: var(--paper);
    }
    tbody tr { border-bottom: 1px solid var(--rule); transition: background 0.1s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: var(--paper-2); }
    tbody td { padding: 12px 16px; vertical-align: middle; }
    tfoot td {
      padding: 12px 16px; background: var(--paper-2);
      border-top: 2px solid var(--rule); font-weight: 600;
    }
    .user-cell { display: flex; align-items: center; gap: 10px; }
    .t-avatar { width: 31px; height: 31px; border-radius: 50%; display: grid; place-items: center; font-size: 10.5px; font-weight: 700; flex-shrink: 0; color: var(--paper); }
    .t-name  { font-size: 13.5px; font-weight: 500; }
    .t-secondary { font-size: 13px; color: var(--ink-soft); }
    .act-wrap { display: flex; gap: 5px; }
    .act-btn {
      width: 28px; height: 28px; border-radius: 7px; border: 1px solid var(--rule);
      background: transparent; color: var(--ink-mute); cursor: pointer;
      display: grid; place-items: center; transition: background 0.12s, color 0.12s, border-color 0.12s;
    }
    .act-btn:hover { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-100); }
    .act-btn.danger:hover { background: var(--red-soft); color: var(--red-deep); border-color: oklch(87% 0.05 22); }
    .t-monto-neg { font-size: 14px; font-weight: 700; color: var(--red-deep); white-space: nowrap; }
    .t-monto-pos { font-size: 14px; font-weight: 700; color: var(--green-deep); white-space: nowrap; }
    .totals-label { font-size: 12px; color: var(--ink-mute); font-weight: 500; }
    .totals-val   { font-weight: 700; color: var(--ink); }

    /* ── STATUS PILLS ── */
    .status-pill {
      display: inline-flex; align-items: center; padding: 3px 9px; border-radius: 999px;
      font-size: 11.5px; font-weight: 600; white-space: nowrap;
    }
    .status-activo   { background: var(--green-soft); color: var(--green-deep); }
    .status-anulado  { background: var(--red-soft);   color: var(--red-deep); }
    .status-ingreso  { background: var(--green-soft); color: var(--green-deep); }
    .status-gasto    { background: var(--red-soft);   color: var(--red-deep); }

    /* ── BARBER SUMMARY CARDS ── */
    .barber-sum-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
    .barber-sum-card {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; padding: 20px;
    }
    .bs-top { display: flex; align-items: center; gap: 12px; margin-bottom: 14px; }
    .bs-avatar {
      width: 44px; height: 44px; border-radius: 50%;
      display: grid; place-items: center; font-size: 13px; font-weight: 700; color: var(--paper); flex-shrink: 0;
    }
    .bs-avatar.carlos  { background: var(--blue-600); }
    .bs-avatar.facundo { background: oklch(35% 0.12 180); }
    .bs-avatar.agustin { background: oklch(36% 0.13 290); }
    .bs-name { font-size: 14px; font-weight: 600; line-height: 1.2; }
    .bs-meta { font-size: 12px; color: var(--ink-mute); margin-top: 1px; }
    .bs-amount { font-size: 22px; font-weight: 700; letter-spacing: -0.02em; color: var(--red-deep); margin-bottom: 4px; }
    .bs-note   { font-size: 11.5px; color: var(--ink-mute); line-height: 1.4; }

    /* ── MODAL ── */
    .modal-overlay {
      position: fixed; inset: 0; background: oklch(16% 0.01 240 / 0.26);
      z-index: 50; display: grid; place-items: center;
      opacity: 0; pointer-events: none; transition: opacity 0.18s;
    }
    .modal-overlay.open { opacity: 1; pointer-events: all; }
    .modal {
      background: var(--paper); border: 1px solid var(--rule);
      border-radius: 18px; width: 500px; max-width: 96vw; max-height: 92vh; overflow-y: auto;
      transform: translateY(10px) scale(0.99);
      transition: transform 0.18s cubic-bezier(0.4, 0, 0.2, 1);
      scrollbar-width: thin; scrollbar-color: var(--rule) var(--paper-2);
    }
    .modal::-webkit-scrollbar { width: 4px; }
    .modal::-webkit-scrollbar-track { background: var(--paper-2); border-radius: 99px; }
    .modal::-webkit-scrollbar-thumb { background: var(--rule); border-radius: 99px; }
    .modal-overlay.open .modal { transform: none; }
    .modal-hd {
      padding: 20px 22px 16px; border-bottom: 1px solid var(--rule);
      display: flex; align-items: flex-start; justify-content: space-between;
      position: sticky; top: 0; background: var(--paper); z-index: 2; border-radius: 18px 18px 0 0;
    }
    .modal-hd-title { font-size: 16px; font-weight: 600; }
    .modal-hd-sub   { font-size: 12.5px; color: var(--ink-mute); margin-top: 2px; }
    .modal-bd { padding: 20px 22px; display: flex; flex-direction: column; gap: 20px; }
    .modal-ft {
      padding: 14px 22px 20px; border-top: 1px solid var(--rule);
      display: flex; justify-content: flex-end; gap: 9px;
      position: sticky; bottom: 0; background: var(--paper); z-index: 2; border-radius: 0 0 18px 18px;
    }
    .modal-section { display: flex; flex-direction: column; gap: 11px; }
    .modal-section-label {
      font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.09em;
      color: var(--ink-mute); padding-bottom: 7px; border-bottom: 1px solid var(--rule);
    }

    /* ── SIDEBAR OVERLAY ── */
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: oklch(16% 0.01 240 / 0.35); z-index: 19; }
    .sidebar-overlay.open { display: block; }

    /* ── MOBILE ── */
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); transition: transform 0.22s cubic-bezier(0.4, 0, 0.2, 1); }
      .sidebar.open { transform: translateX(0); }
      .main-area { margin-left: 0 !important; width: 100% !important; }
      .topbar { left: 0 !important; padding: 0 16px !important; }
      .topbar-hamburger { display: flex; }
      .stats-grid { grid-template-columns: repeat(2, 1fr) !important; }
      .content { padding: 72px 12px 32px !important; }
      .barber-sum-grid { grid-template-columns: 1fr !important; }
      .modal { width: 95vw !important; }
      .form-row { grid-template-columns: 1fr !important; }
      .form-row-3 { grid-template-columns: 1fr !important; }
      .toolbar { flex-wrap: wrap; }
      .tb-select { min-width: 0; flex: 1; }
      .tipo-pills { flex-wrap: wrap; }
      .tabs-bar { width: 100%; }
      .tab-btn { flex: 1; text-align: center; }
    }
  </style>
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<div class="layout">

  <!-- ══ SIDEBAR ══ -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
      <div class="logo-mark">BB</div>
      <div>
        <div class="logo-name">Barber Brizu</div>
        <div class="logo-sub">Administración</div>
      </div>
    </div>

    <nav class="sidebar-nav">
      <div class="nav-group">
        <div class="nav-group-label">Principal</div>
        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Inicio
        </a>
        <a href="/dashboard/agenda" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          Agenda
        </a>
        <a href="/dashboard/turnos" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><polyline points="12 7 12 12 15 15"/></svg>
          Turnos
          <span class="nav-badge">4</span>
        </a>
      </div>

      <div class="nav-group">
        <div class="nav-group-label">Gestión</div>
        <a href="/dashboard/usuarios" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
          Usuarios
        </a>
        <a href="/dashboard/perfiles" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          Perfiles y permisos
        </a>
        <a href="/dashboard/servicios" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><line x1="20" y1="4" x2="8.12" y2="15.88"/><line x1="14.47" y1="14.48" x2="20" y2="20"/><line x1="8.12" y1="8.12" x2="12" y2="12"/></svg>
          Servicios
        </a>
        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          Clientes
        </a>
      </div>

      <div class="nav-group">
        <div class="nav-group-label">Económico</div>
        <a href="/dashboard/cobros" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
          Cobros
        </a>
        <a href="/dashboard/adelantos" class="nav-link active">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
          Adelantos
        </a>
        <a href="/dashboard/consumibles" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
          Consumibles
        </a>
        <a href="/dashboard/cierres" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
          Cierres económicos
        </a>
      </div>

      <div class="nav-group">
        <div class="nav-group-label">Sistema</div>
        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
          Configuración
        </a>
      </div>
    </nav>

    <div class="sidebar-user">
      <div class="s-user-av">RB</div>
      <div>
        <div class="s-user-name">Rodrigo Brizu</div>
        <div class="s-user-role">Dueño</div>
      </div>
    </div>
  </aside>

  <!-- ══ MAIN ══ -->
  <div class="main-area">

    <header class="topbar">
      <button class="topbar-hamburger" onclick="openSidebar()" aria-label="Abrir menú">
        <span></span><span></span><span></span>
      </button>
      <div class="topbar-title">
        <h1>Adelantos</h1>
        <div class="breadcrumb">Económico &rarr; Adelantos</div>
      </div>
      <div class="topbar-actions">
        <a href="/" class="btn btn-outline">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
          Ir al sitio
        </a>
        <a href="/logout" class="btn btn-outline btn-logout">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
          Cerrar sesión
        </a>
      </div>
    </header>

    <main class="content">

      <!-- PAGE HEADER -->
      <div class="section-header">
        <div>
          <div class="section-title">Adelantos y movimientos</div>
          <div class="section-sub">Registrá adelantos a barberos y movimientos internos del local</div>
        </div>
      </div>

      <!-- ── TABS ── -->
      <div class="tabs-bar">
        <button class="tab-btn active" id="tabBtnAdelantos" onclick="switchTab('adelantos')">Adelantos</button>
        <button class="tab-btn" id="tabBtnMovimientos" onclick="switchTab('movimientos')">Movimientos internos</button>
      </div>

      <!-- ══════════════════════════════════════════
           TAB 1: ADELANTOS
      ══════════════════════════════════════════ -->
      <div class="tab-pane active" id="paneAdelantos">

        <!-- STATS -->
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-label">Total adelantado hoy</div>
            <div class="stat-value" style="color:var(--red-deep)" id="aStatHoy">$5.000</div>
            <div class="stat-sub">adelantos del día</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Total esta semana</div>
            <div class="stat-value" style="color:var(--blue-600)" id="aStatSemana">$18.000</div>
            <div class="stat-sub">semana actual</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Adelantos activos</div>
            <div class="stat-value" style="color:var(--gold-deep)" id="aStatActivos">5</div>
            <div class="stat-sub">pendientes de descuento</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Mayor adelanto</div>
            <div class="stat-value" style="color:var(--ink)" id="aStatMayor">$8.000</div>
            <div class="stat-sub">registrado esta semana</div>
          </div>
        </div>

        <!-- REGISTER FORM -->
        <div class="register-card">
          <div class="register-card-title">Registrar adelanto</div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Barbero</label>
              <select class="form-select" id="aFormBarbero">
                <option value="">Seleccioná un barbero</option>
                <option value="carlos">Carlos Medina</option>
                <option value="facundo">Facundo Torres</option>
                <option value="agustin">Agustín Romero</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Monto $</label>
              <input type="number" class="form-input" id="aFormMonto" placeholder="0" min="1">
            </div>
          </div>
          <div class="form-row" style="margin-top:13px">
            <div class="form-group">
              <label class="form-label">Fecha</label>
              <input type="date" class="form-input" id="aFormFecha">
            </div>
            <div class="form-group">
              <label class="form-label">Motivo (opcional)</label>
              <input type="text" class="form-input" id="aFormMotivo" placeholder="Ej: gastos personales">
            </div>
          </div>
          <div id="aFormFeedback" style="margin-top:12px"></div>
          <div class="register-footer">
            <button class="btn btn-gold" onclick="registrarAdelanto()">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
              Registrar adelanto
            </button>
          </div>
        </div>

        <!-- TOOLBAR + TABLE -->
        <div>
          <div class="toolbar">
            <div class="search-wrap">
              <svg class="search-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
              <input class="tb-input" type="text" id="aSearch" placeholder="Buscar barbero o motivo..." oninput="applyAdelantoFilters()">
            </div>
            <select class="tb-select" id="aFilterBarbero" onchange="applyAdelantoFilters()">
              <option value="">Todos los barberos</option>
              <option value="carlos">Carlos Medina</option>
              <option value="facundo">Facundo Torres</option>
              <option value="agustin">Agustín Romero</option>
            </select>
            <select class="tb-select" id="aFilterEstado" onchange="applyAdelantoFilters()">
              <option value="">Todos los estados</option>
              <option value="activo">Activo</option>
              <option value="anulado">Anulado</option>
            </select>
            <button class="btn btn-outline btn-sm" onclick="clearAdelantoFilters()">Limpiar</button>
          </div>

          <div class="table-wrap">
            <div class="table-card">
              <table>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Barbero</th>
                    <th>Monto</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="adelantosTableBody"></tbody>
                <tfoot id="adelantosTfoot">
                  <tr>
                    <td colspan="2"><span class="totals-label">Total filtrado</span></td>
                    <td id="aFootTotal" colspan="5"><span class="totals-val">$0</span></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <!-- BARBER SUMMARY -->
        <div>
          <div style="margin-bottom:12px">
            <div class="section-title" style="font-size:16px">Resumen por barbero</div>
            <div class="section-sub">Adelantos activos pendientes de descuento en el próximo cierre</div>
          </div>
          <div class="barber-sum-grid" id="barberoSummaryGrid"></div>
        </div>

      </div>
      <!-- /TAB 1 -->

      <!-- ══════════════════════════════════════════
           TAB 2: MOVIMIENTOS INTERNOS
      ══════════════════════════════════════════ -->
      <div class="tab-pane" id="paneMovimientos">

        <!-- STATS -->
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-label">Ingresos hoy</div>
            <div class="stat-value" style="color:var(--green-deep)" id="mStatIngresos">$3.000</div>
            <div class="stat-sub">entradas del día</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Gastos hoy</div>
            <div class="stat-value" style="color:var(--red-deep)" id="mStatGastos">$1.200</div>
            <div class="stat-sub">salidas del día</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Balance del día</div>
            <div class="stat-value" style="color:var(--blue-600)" id="mStatBalance">$1.800</div>
            <div class="stat-sub">ingresos menos gastos</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Movimientos activos</div>
            <div class="stat-value" style="color:var(--ink)" id="mStatTotal">7</div>
            <div class="stat-sub">registros del día</div>
          </div>
        </div>

        <!-- REGISTER FORM -->
        <div class="register-card">
          <div class="register-card-title">Registrar movimiento interno</div>
          <div class="form-group" style="margin-bottom:13px">
            <label class="form-label">Tipo</label>
            <div class="tipo-pills">
              <button class="tipo-pill active-ingreso" id="mPillIngreso" onclick="setTipoMovimiento('ingreso')">Ingreso</button>
              <button class="tipo-pill" id="mPillGasto" onclick="setTipoMovimiento('gasto')">Gasto</button>
            </div>
          </div>
          <div class="form-row-3">
            <div class="form-group">
              <label class="form-label">Concepto</label>
              <input type="text" class="form-input" id="mFormConcepto" placeholder="Ej: venta de productos">
            </div>
            <div class="form-group">
              <label class="form-label">Monto $</label>
              <input type="number" class="form-input" id="mFormMonto" placeholder="0" min="1">
            </div>
            <div class="form-group">
              <label class="form-label">Fecha</label>
              <input type="date" class="form-input" id="mFormFecha">
            </div>
          </div>
          <div class="form-row" style="margin-top:13px">
            <div class="form-group">
              <label class="form-label">Categoría</label>
              <select class="form-select" id="mFormCategoria">
                <option value="">Seleccioná una categoría</option>
                <option value="Servicios">Servicios</option>
                <option value="Insumos">Insumos</option>
                <option value="Infraestructura">Infraestructura</option>
                <option value="Productos">Productos</option>
                <option value="Otros">Otros</option>
              </select>
            </div>
          </div>
          <div id="mFormFeedback" style="margin-top:12px"></div>
          <div class="register-footer">
            <button class="btn btn-gold" onclick="registrarMovimiento()">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
              Registrar movimiento
            </button>
          </div>
        </div>

        <!-- TOOLBAR + TABLE -->
        <div>
          <div class="toolbar">
            <div class="search-wrap">
              <svg class="search-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
              <input class="tb-input" type="text" id="mSearch" placeholder="Buscar concepto..." oninput="applyMovimientoFilters()">
            </div>
            <select class="tb-select" id="mFilterTipo" onchange="applyMovimientoFilters()">
              <option value="">Todos los tipos</option>
              <option value="ingreso">Ingreso</option>
              <option value="gasto">Gasto</option>
            </select>
            <select class="tb-select" id="mFilterEstado" onchange="applyMovimientoFilters()">
              <option value="">Todos los estados</option>
              <option value="activo">Activo</option>
              <option value="anulado">Anulado</option>
            </select>
            <select class="tb-select" id="mFilterCategoria" onchange="applyMovimientoFilters()">
              <option value="">Todas las categorías</option>
              <option value="Servicios">Servicios</option>
              <option value="Insumos">Insumos</option>
              <option value="Infraestructura">Infraestructura</option>
              <option value="Productos">Productos</option>
              <option value="Otros">Otros</option>
            </select>
            <button class="btn btn-outline btn-sm" onclick="clearMovimientoFilters()">Limpiar</button>
          </div>

          <div class="table-wrap">
            <div class="table-card">
              <table>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Concepto</th>
                    <th>Categoría</th>
                    <th>Tipo</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="movimientosTableBody"></tbody>
                <tfoot id="movimientosTfoot">
                  <tr>
                    <td colspan="3"><span class="totals-label">Balance filtrado</span></td>
                    <td></td>
                    <td id="mFootBalance" colspan="4"><span class="totals-val">$0</span></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /TAB 2 -->

    </main>
  </div>
</div>

<!-- ══ MODAL EDITAR ADELANTO ══ -->
<div class="modal-overlay" id="moEditAdelantoOverlay">
  <div class="modal" style="width:460px">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title">Editar adelanto</div>
        <div class="modal-hd-sub" id="editAdelantoSubtitle"></div>
      </div>
      <button class="close-btn" onclick="closeEditAdelanto()">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="modal-section">
        <div class="modal-section-label">Datos del adelanto</div>
        <input type="hidden" id="editAdelantoId">
        <div class="form-group">
          <label class="form-label">Barbero</label>
          <select class="form-select" id="editAdelantoBarbero">
            <option value="carlos">Carlos Medina</option>
            <option value="facundo">Facundo Torres</option>
            <option value="agustin">Agustín Romero</option>
          </select>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Monto $</label>
            <input type="number" class="form-input" id="editAdelantoMonto" min="1">
          </div>
          <div class="form-group">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-input" id="editAdelantoFecha">
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Motivo</label>
          <input type="text" class="form-input" id="editAdelantoMotivo" placeholder="Motivo (opcional)">
        </div>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeEditAdelanto()">Cancelar</button>
      <button class="btn btn-gold" onclick="guardarEditAdelanto()">Guardar cambios</button>
    </div>
  </div>
</div>

<!-- ══ MODAL ANULAR ADELANTO ══ -->
<div class="modal-overlay" id="moAnularAdelantoOverlay">
  <div class="modal" style="width:420px">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title">Anular adelanto</div>
        <div class="modal-hd-sub" id="anularAdelantoSubtitle"></div>
      </div>
      <button class="close-btn" onclick="closeAnularAdelanto()">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="modal-section">
        <div class="form-warn">Esta acción marcará el adelanto como anulado. No se eliminará del historial pero dejará de contabilizarse en el cierre.</div>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeAnularAdelanto()">Cancelar</button>
      <button class="btn btn-red" onclick="confirmarAnularAdelanto()">Confirmar anulación</button>
    </div>
  </div>
</div>

<!-- ══ MODAL EDITAR MOVIMIENTO ══ -->
<div class="modal-overlay" id="moEditMovimientoOverlay">
  <div class="modal" style="width:460px">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title">Editar movimiento</div>
        <div class="modal-hd-sub" id="editMovimientoSubtitle"></div>
      </div>
      <button class="close-btn" onclick="closeEditMovimiento()">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="modal-section">
        <div class="modal-section-label">Datos del movimiento</div>
        <input type="hidden" id="editMovimientoId">
        <div class="form-group">
          <label class="form-label">Tipo</label>
          <div class="tipo-pills">
            <button class="tipo-pill" id="editPillIngreso" onclick="setTipoEdit('ingreso')">Ingreso</button>
            <button class="tipo-pill" id="editPillGasto" onclick="setTipoEdit('gasto')">Gasto</button>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Concepto</label>
          <input type="text" class="form-input" id="editMovimientoConcepto">
        </div>
        <div class="form-group">
          <label class="form-label">Categoría</label>
          <select class="form-select" id="editMovimientoCategoria">
            <option value="">Seleccioná una categoría</option>
            <option value="Servicios">Servicios</option>
            <option value="Insumos">Insumos</option>
            <option value="Infraestructura">Infraestructura</option>
            <option value="Productos">Productos</option>
            <option value="Otros">Otros</option>
          </select>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Monto $</label>
            <input type="number" class="form-input" id="editMovimientoMonto" min="1">
          </div>
          <div class="form-group">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-input" id="editMovimientoFecha">
          </div>
        </div>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeEditMovimiento()">Cancelar</button>
      <button class="btn btn-gold" onclick="guardarEditMovimiento()">Guardar cambios</button>
    </div>
  </div>
</div>

<!-- ══ MODAL ANULAR MOVIMIENTO ══ -->
<div class="modal-overlay" id="moAnularMovimientoOverlay">
  <div class="modal" style="width:420px">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title">Anular movimiento</div>
        <div class="modal-hd-sub" id="anularMovimientoSubtitle"></div>
      </div>
      <button class="close-btn" onclick="closeAnularMovimiento()">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="modal-section">
        <div class="form-warn">Esta acción marcará el movimiento como anulado. No se eliminará del historial pero quedará excluido del balance.</div>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeAnularMovimiento()">Cancelar</button>
      <button class="btn btn-red" onclick="confirmarAnularMovimiento()">Confirmar anulación</button>
    </div>
  </div>
</div>

<script>
  /* ── DATA ── */
  const BARB = {
    carlos:  { nombre: 'Carlos Medina',  initials: 'CM', clase: 'carlos'  },
    facundo: { nombre: 'Facundo Torres', initials: 'FT', clase: 'facundo' },
    agustin: { nombre: 'Agustín Romero', initials: 'AR', clase: 'agustin' }
  };

  let adelantosData = [
    { id: 1,  barbero: 'carlos',  monto: 8000, motivo: 'Gastos personales',    fecha: '2026-05-19', estado: 'activo'  },
    { id: 2,  barbero: 'facundo', monto: 3000, motivo: 'Medicina',             fecha: '2026-05-19', estado: 'activo'  },
    { id: 3,  barbero: 'agustin', monto: 2000, motivo: '',                     fecha: '2026-05-18', estado: 'activo'  },
    { id: 4,  barbero: 'carlos',  monto: 5000, motivo: 'Viaje',                fecha: '2026-05-17', estado: 'activo'  },
    { id: 5,  barbero: 'facundo', monto: 4000, motivo: 'Arreglos del auto',    fecha: '2026-05-16', estado: 'anulado' },
    { id: 6,  barbero: 'agustin', monto: 1500, motivo: 'Compras',              fecha: '2026-05-15', estado: 'activo'  }
  ];

  let movimientosData = [
    { id: 1,  concepto: 'Venta de productos',      tipo: 'ingreso', categoria: 'Productos',       monto: 3000, fecha: '2026-05-19', estado: 'activo'  },
    { id: 2,  concepto: 'Insumos barbería',         tipo: 'gasto',   categoria: 'Insumos',         monto: 1200, fecha: '2026-05-19', estado: 'activo'  },
    { id: 3,  concepto: 'Propina extra',            tipo: 'ingreso', categoria: 'Servicios',       monto: 500,  fecha: '2026-05-18', estado: 'activo'  },
    { id: 4,  concepto: 'Luz y gas',                tipo: 'gasto',   categoria: 'Infraestructura', monto: 4500, fecha: '2026-05-17', estado: 'activo'  },
    { id: 5,  concepto: 'Venta gorras',             tipo: 'ingreso', categoria: 'Productos',       monto: 2000, fecha: '2026-05-17', estado: 'activo'  },
    { id: 6,  concepto: 'Limpieza del local',       tipo: 'gasto',   categoria: 'Infraestructura', monto: 800,  fecha: '2026-05-16', estado: 'anulado' },
    { id: 7,  concepto: 'Depósito clientes',        tipo: 'ingreso', categoria: 'Servicios',       monto: 1500, fecha: '2026-05-15', estado: 'activo'  },
    { id: 8,  concepto: 'Compra de herramientas',   tipo: 'gasto',   categoria: 'Insumos',         monto: 3200, fecha: '2026-05-14', estado: 'activo'  },
    { id: 9,  concepto: 'Venta shampoo y cera',     tipo: 'ingreso', categoria: 'Productos',       monto: 1800, fecha: '2026-05-13', estado: 'activo'  },
    { id: 10, concepto: 'Descuento por aniversario',tipo: 'gasto',   categoria: 'Otros',           monto: 600,  fecha: '2026-05-12', estado: 'activo'  }
  ];

  let nextAdelantoId = 7;
  let nextMovimientoId = 11;
  var anularAdelantoTarget = null;
  var anularMovimientoTarget = null;
  var tipoMovimientoActual = 'ingreso';
  var tipoEditActual = 'ingreso';

  /* ── FORMAT ── */
  function fm(n) { return '$' + Number(n).toLocaleString('es-AR'); }

  function todayStr() {
    const d = new Date();
    return d.toISOString().split('T')[0];
  }

  function fmFecha(iso) {
    if (!iso) return '—';
    const [y, m, d] = iso.split('-');
    return `${d}/${m}/${y}`;
  }

  /* ── TABS ── */
  function switchTab(tab) {
    document.getElementById('paneAdelantos').classList.toggle('active', tab === 'adelantos');
    document.getElementById('paneMovimientos').classList.toggle('active', tab === 'movimientos');
    document.getElementById('tabBtnAdelantos').classList.toggle('active', tab === 'adelantos');
    document.getElementById('tabBtnMovimientos').classList.toggle('active', tab === 'movimientos');
  }

  /* ── SIDEBAR ── */
  function openSidebar()  { document.getElementById('sidebar').classList.add('open'); document.getElementById('sidebarOverlay').classList.add('open'); }
  function closeSidebar() { document.getElementById('sidebar').classList.remove('open'); document.getElementById('sidebarOverlay').classList.remove('open'); }

  /* ════════════════════════════════
     TAB 1: ADELANTOS
  ════════════════════════════════ */

  function renderAdelantosTable(data) {
    const tbody = document.getElementById('adelantosTableBody');
    if (!data.length) {
      tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;padding:28px;color:var(--ink-mute)">Sin adelantos registrados</td></tr>';
      document.getElementById('aFootTotal').innerHTML = '<span class="totals-val">$0</span>';
      return;
    }
    let total = 0;
    tbody.innerHTML = data.map(r => {
      const b = BARB[r.barbero];
      if (r.estado === 'activo') total += r.monto;
      const estadoPill = r.estado === 'activo'
        ? '<span class="status-pill status-activo">Activo</span>'
        : '<span class="status-pill status-anulado">Anulado</span>';
      const montoClass = r.estado === 'anulado' ? 'color:var(--ink-mute);text-decoration:line-through' : 'color:var(--red-deep);font-weight:700';
      const editBtn = r.estado === 'activo'
        ? `<button class="act-btn" title="Editar" onclick="openEditAdelanto(${r.id})">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
           </button>`
        : '';
      const anularBtn = r.estado === 'activo'
        ? `<button class="act-btn danger" title="Anular" onclick="openAnularAdelanto(${r.id})">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
           </button>`
        : '';
      return `<tr>
        <td class="t-secondary">#${r.id}</td>
        <td>
          <div class="user-cell">
            <div class="t-avatar bs-avatar ${b.clase}">${b.initials}</div>
            <span class="t-name">${b.nombre}</span>
          </div>
        </td>
        <td><span style="${montoClass}">${fm(r.monto)}</span></td>
        <td class="t-secondary">${r.motivo || '—'}</td>
        <td class="t-secondary">${fmFecha(r.fecha)}</td>
        <td>${estadoPill}</td>
        <td><div class="act-wrap">${editBtn}${anularBtn}</div></td>
      </tr>`;
    }).join('');
    document.getElementById('aFootTotal').innerHTML = `<span class="totals-val">${fm(total)}</span> <span class="totals-label" style="margin-left:6px">activos</span>`;
  }

  function updateAdelantoStats(data) {
    const hoy = todayStr();
    const activos = data.filter(r => r.estado === 'activo');
    const hoyTotal = activos.filter(r => r.fecha === hoy).reduce((s, r) => s + r.monto, 0);
    const semTotal = activos.reduce((s, r) => s + r.monto, 0);
    const mayor = activos.length ? Math.max(...activos.map(r => r.monto)) : 0;
    document.getElementById('aStatHoy').textContent    = fm(hoyTotal);
    document.getElementById('aStatSemana').textContent = fm(semTotal);
    document.getElementById('aStatActivos').textContent = activos.length;
    document.getElementById('aStatMayor').textContent  = fm(mayor);
  }

  function updateBarberoSummary() {
    const grid = document.getElementById('barberoSummaryGrid');
    const activos = adelantosData.filter(r => r.estado === 'activo');
    grid.innerHTML = Object.keys(BARB).map(key => {
      const b = BARB[key];
      const total = activos.filter(r => r.barbero === key).reduce((s, r) => s + r.monto, 0);
      const count = activos.filter(r => r.barbero === key).length;
      return `<div class="barber-sum-card">
        <div class="bs-top">
          <div class="bs-avatar ${b.clase}">${b.initials}</div>
          <div>
            <div class="bs-name">${b.nombre}</div>
            <div class="bs-meta">${count} adelanto${count !== 1 ? 's' : ''} activo${count !== 1 ? 's' : ''}</div>
          </div>
        </div>
        <div class="bs-amount">${fm(total)}</div>
        <div class="bs-note">Se descontará en el cierre semanal</div>
      </div>`;
    }).join('');
  }

  function applyAdelantoFilters() {
    const q       = document.getElementById('aSearch').value.toLowerCase();
    const barbero = document.getElementById('aFilterBarbero').value;
    const estado  = document.getElementById('aFilterEstado').value;
    let filtered = adelantosData.filter(r => {
      const b = BARB[r.barbero];
      const matchQ = !q || b.nombre.toLowerCase().includes(q) || (r.motivo && r.motivo.toLowerCase().includes(q));
      const matchB = !barbero || r.barbero === barbero;
      const matchE = !estado  || r.estado  === estado;
      return matchQ && matchB && matchE;
    });
    renderAdelantosTable(filtered);
  }

  function clearAdelantoFilters() {
    document.getElementById('aSearch').value = '';
    document.getElementById('aFilterBarbero').value = '';
    document.getElementById('aFilterEstado').value = '';
    renderAdelantosTable(adelantosData);
  }

  function registrarAdelanto() {
    const barbero = document.getElementById('aFormBarbero').value;
    const monto   = parseFloat(document.getElementById('aFormMonto').value);
    const fecha   = document.getElementById('aFormFecha').value;
    const motivo  = document.getElementById('aFormMotivo').value.trim();
    const fb      = document.getElementById('aFormFeedback');

    if (!barbero) { fb.innerHTML = '<div class="form-warn">Seleccioná un barbero.</div>'; return; }
    if (!monto || monto <= 0) { fb.innerHTML = '<div class="form-warn">Ingresá un monto válido.</div>'; return; }
    if (!fecha) { fb.innerHTML = '<div class="form-warn">Seleccioná una fecha.</div>'; return; }

    adelantosData.unshift({ id: nextAdelantoId++, barbero, monto, motivo, fecha, estado: 'activo' });
    fb.innerHTML = '<div class="form-ok">Adelanto registrado correctamente.</div>';
    document.getElementById('aFormBarbero').value = '';
    document.getElementById('aFormMonto').value   = '';
    document.getElementById('aFormFecha').value   = '';
    document.getElementById('aFormMotivo').value  = '';
    setTimeout(() => fb.innerHTML = '', 3000);
    renderAdelantosTable(adelantosData);
    updateAdelantoStats(adelantosData);
    updateBarberoSummary();
  }

  /* Edit adelanto */
  function openEditAdelanto(id) {
    const r = adelantosData.find(x => x.id === id);
    if (!r) return;
    document.getElementById('editAdelantoId').value         = id;
    document.getElementById('editAdelantoBarbero').value    = r.barbero;
    document.getElementById('editAdelantoMonto').value      = r.monto;
    document.getElementById('editAdelantoFecha').value      = r.fecha;
    document.getElementById('editAdelantoMotivo').value     = r.motivo;
    document.getElementById('editAdelantoSubtitle').textContent = `Adelanto #${id} — ${BARB[r.barbero].nombre}`;
    document.getElementById('moEditAdelantoOverlay').classList.add('open');
  }
  function closeEditAdelanto() {
    document.getElementById('moEditAdelantoOverlay').classList.remove('open');
  }
  function guardarEditAdelanto() {
    const id      = parseInt(document.getElementById('editAdelantoId').value);
    const barbero = document.getElementById('editAdelantoBarbero').value;
    const monto   = parseFloat(document.getElementById('editAdelantoMonto').value);
    const fecha   = document.getElementById('editAdelantoFecha').value;
    const motivo  = document.getElementById('editAdelantoMotivo').value.trim();
    if (!monto || monto <= 0 || !fecha) return;
    const idx = adelantosData.findIndex(x => x.id === id);
    if (idx === -1) return;
    adelantosData[idx] = { ...adelantosData[idx], barbero, monto, fecha, motivo };
    closeEditAdelanto();
    applyAdelantoFilters();
    updateAdelantoStats(adelantosData);
    updateBarberoSummary();
  }

  /* Anular adelanto */
  function openAnularAdelanto(id) {
    const r = adelantosData.find(x => x.id === id);
    if (!r) return;
    anularAdelantoTarget = id;
    document.getElementById('anularAdelantoSubtitle').textContent = `Adelanto #${id} — ${BARB[r.barbero].nombre} — ${fm(r.monto)}`;
    document.getElementById('moAnularAdelantoOverlay').classList.add('open');
  }
  function closeAnularAdelanto() {
    document.getElementById('moAnularAdelantoOverlay').classList.remove('open');
    anularAdelantoTarget = null;
  }
  function confirmarAnularAdelanto() {
    if (anularAdelantoTarget === null) return;
    const idx = adelantosData.findIndex(x => x.id === anularAdelantoTarget);
    if (idx !== -1) adelantosData[idx].estado = 'anulado';
    closeAnularAdelanto();
    applyAdelantoFilters();
    updateAdelantoStats(adelantosData);
    updateBarberoSummary();
  }

  /* ════════════════════════════════
     TAB 2: MOVIMIENTOS
  ════════════════════════════════ */

  function setTipoMovimiento(tipo) {
    tipoMovimientoActual = tipo;
    document.getElementById('mPillIngreso').className = 'tipo-pill' + (tipo === 'ingreso' ? ' active-ingreso' : '');
    document.getElementById('mPillGasto').className   = 'tipo-pill' + (tipo === 'gasto'   ? ' active-gasto'   : '');
  }

  function setTipoEdit(tipo) {
    tipoEditActual = tipo;
    document.getElementById('editPillIngreso').className = 'tipo-pill' + (tipo === 'ingreso' ? ' active-ingreso' : '');
    document.getElementById('editPillGasto').className   = 'tipo-pill' + (tipo === 'gasto'   ? ' active-gasto'   : '');
  }

  function renderMovimientosTable(data) {
    const tbody = document.getElementById('movimientosTableBody');
    if (!data.length) {
      tbody.innerHTML = '<tr><td colspan="8" style="text-align:center;padding:28px;color:var(--ink-mute)">Sin movimientos registrados</td></tr>';
      document.getElementById('mFootBalance').innerHTML = '<span class="totals-val">$0</span>';
      return;
    }
    let balance = 0;
    tbody.innerHTML = data.map(r => {
      if (r.estado === 'activo') balance += r.tipo === 'ingreso' ? r.monto : -r.monto;
      const estadoPill = r.estado === 'activo'
        ? '<span class="status-pill status-activo">Activo</span>'
        : '<span class="status-pill status-anulado">Anulado</span>';
      const tipoPill = r.tipo === 'ingreso'
        ? '<span class="status-pill status-ingreso">Ingreso</span>'
        : '<span class="status-pill status-gasto">Gasto</span>';
      const montoClass = r.estado === 'anulado'
        ? 'color:var(--ink-mute);text-decoration:line-through'
        : r.tipo === 'ingreso' ? '' : '';
      const montoEl = r.estado === 'anulado'
        ? `<span style="${montoClass}">${fm(r.monto)}</span>`
        : r.tipo === 'ingreso'
          ? `<span class="t-monto-pos">${fm(r.monto)}</span>`
          : `<span class="t-monto-neg">-${fm(r.monto)}</span>`;
      const editBtn = r.estado === 'activo'
        ? `<button class="act-btn" title="Editar" onclick="openEditMovimiento(${r.id})">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
           </button>`
        : '';
      const anularBtn = r.estado === 'activo'
        ? `<button class="act-btn danger" title="Anular" onclick="openAnularMovimiento(${r.id})">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
           </button>`
        : '';
      return `<tr>
        <td class="t-secondary">#${r.id}</td>
        <td class="t-name">${r.concepto}</td>
        <td class="t-secondary">${r.categoria || '—'}</td>
        <td>${tipoPill}</td>
        <td>${montoEl}</td>
        <td class="t-secondary">${fmFecha(r.fecha)}</td>
        <td>${estadoPill}</td>
        <td><div class="act-wrap">${editBtn}${anularBtn}</div></td>
      </tr>`;
    }).join('');
    const balColor = balance >= 0 ? 'var(--green-deep)' : 'var(--red-deep)';
    const balSign  = balance >= 0 ? '' : '';
    document.getElementById('mFootBalance').innerHTML = `<span class="totals-val" style="color:${balColor}">${balance >= 0 ? fm(balance) : '-' + fm(Math.abs(balance))}</span>`;
  }

  function updateMovimientoStats(data) {
    const hoy = todayStr();
    const activos = data.filter(r => r.estado === 'activo');
    const ingresos = activos.filter(r => r.tipo === 'ingreso' && r.fecha === hoy).reduce((s, r) => s + r.monto, 0);
    const gastos   = activos.filter(r => r.tipo === 'gasto'   && r.fecha === hoy).reduce((s, r) => s + r.monto, 0);
    const balance  = ingresos - gastos;
    const totalActivos = activos.length;
    document.getElementById('mStatIngresos').textContent = fm(ingresos);
    document.getElementById('mStatGastos').textContent   = fm(gastos);
    document.getElementById('mStatBalance').textContent  = fm(Math.abs(balance));
    document.getElementById('mStatBalance').style.color  = balance >= 0 ? 'var(--blue-600)' : 'var(--red-deep)';
    document.getElementById('mStatTotal').textContent    = totalActivos;
  }

  function applyMovimientoFilters() {
    const q         = document.getElementById('mSearch').value.toLowerCase();
    const tipo      = document.getElementById('mFilterTipo').value;
    const estado    = document.getElementById('mFilterEstado').value;
    const categoria = document.getElementById('mFilterCategoria').value;
    let filtered = movimientosData.filter(r => {
      const matchQ = !q         || r.concepto.toLowerCase().includes(q);
      const matchT = !tipo      || r.tipo      === tipo;
      const matchE = !estado    || r.estado    === estado;
      const matchC = !categoria || r.categoria === categoria;
      return matchQ && matchT && matchE && matchC;
    });
    renderMovimientosTable(filtered);
  }

  function clearMovimientoFilters() {
    document.getElementById('mSearch').value = '';
    document.getElementById('mFilterTipo').value = '';
    document.getElementById('mFilterEstado').value = '';
    document.getElementById('mFilterCategoria').value = '';
    renderMovimientosTable(movimientosData);
  }

  function registrarMovimiento() {
    const concepto  = document.getElementById('mFormConcepto').value.trim();
    const monto     = parseFloat(document.getElementById('mFormMonto').value);
    const fecha     = document.getElementById('mFormFecha').value;
    const categoria = document.getElementById('mFormCategoria').value;
    const fb        = document.getElementById('mFormFeedback');

    if (!concepto) { fb.innerHTML = '<div class="form-warn">Ingresá un concepto.</div>'; return; }
    if (!monto || monto <= 0) { fb.innerHTML = '<div class="form-warn">Ingresá un monto válido.</div>'; return; }
    if (!fecha) { fb.innerHTML = '<div class="form-warn">Seleccioná una fecha.</div>'; return; }

    movimientosData.unshift({ id: nextMovimientoId++, concepto, tipo: tipoMovimientoActual, categoria, monto, fecha, estado: 'activo' });
    fb.innerHTML = '<div class="form-ok">Movimiento registrado correctamente.</div>';
    document.getElementById('mFormConcepto').value  = '';
    document.getElementById('mFormMonto').value     = '';
    document.getElementById('mFormFecha').value     = '';
    document.getElementById('mFormCategoria').value = '';
    setTimeout(() => fb.innerHTML = '', 3000);
    renderMovimientosTable(movimientosData);
    updateMovimientoStats(movimientosData);
  }

  /* Edit movimiento */
  function openEditMovimiento(id) {
    const r = movimientosData.find(x => x.id === id);
    if (!r) return;
    document.getElementById('editMovimientoId').value       = id;
    document.getElementById('editMovimientoConcepto').value  = r.concepto;
    document.getElementById('editMovimientoCategoria').value = r.categoria || '';
    document.getElementById('editMovimientoMonto').value     = r.monto;
    document.getElementById('editMovimientoFecha').value     = r.fecha;
    document.getElementById('editMovimientoSubtitle').textContent = `Movimiento #${id} — ${r.concepto}`;
    setTipoEdit(r.tipo);
    document.getElementById('moEditMovimientoOverlay').classList.add('open');
  }
  function closeEditMovimiento() {
    document.getElementById('moEditMovimientoOverlay').classList.remove('open');
  }
  function guardarEditMovimiento() {
    const id        = parseInt(document.getElementById('editMovimientoId').value);
    const concepto  = document.getElementById('editMovimientoConcepto').value.trim();
    const categoria = document.getElementById('editMovimientoCategoria').value;
    const monto     = parseFloat(document.getElementById('editMovimientoMonto').value);
    const fecha     = document.getElementById('editMovimientoFecha').value;
    if (!concepto || !monto || monto <= 0 || !fecha) return;
    const idx = movimientosData.findIndex(x => x.id === id);
    if (idx === -1) return;
    movimientosData[idx] = { ...movimientosData[idx], concepto, categoria, tipo: tipoEditActual, monto, fecha };
    closeEditMovimiento();
    applyMovimientoFilters();
    updateMovimientoStats(movimientosData);
  }

  /* Anular movimiento */
  function openAnularMovimiento(id) {
    const r = movimientosData.find(x => x.id === id);
    if (!r) return;
    anularMovimientoTarget = id;
    document.getElementById('anularMovimientoSubtitle').textContent = `Movimiento #${id} — ${r.concepto} — ${fm(r.monto)}`;
    document.getElementById('moAnularMovimientoOverlay').classList.add('open');
  }
  function closeAnularMovimiento() {
    document.getElementById('moAnularMovimientoOverlay').classList.remove('open');
    anularMovimientoTarget = null;
  }
  function confirmarAnularMovimiento() {
    if (anularMovimientoTarget === null) return;
    const idx = movimientosData.findIndex(x => x.id === anularMovimientoTarget);
    if (idx !== -1) movimientosData[idx].estado = 'anulado';
    closeAnularMovimiento();
    applyMovimientoFilters();
    updateMovimientoStats(movimientosData);
  }

  /* ── INIT ── */
  (function init() {
    const hoy = todayStr();
    document.getElementById('aFormFecha').value = hoy;
    document.getElementById('mFormFecha').value = hoy;
    renderAdelantosTable(adelantosData);
    updateAdelantoStats(adelantosData);
    updateBarberoSummary();
    renderMovimientosTable(movimientosData);
    updateMovimientoStats(movimientosData);
  })();
</script>
</body>
</html>
