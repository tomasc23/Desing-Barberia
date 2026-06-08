<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servicios — Barber Brizu</title>
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
    .content { padding: 80px 26px 40px; display: flex; flex-direction: column; gap: 24px; }
    .section-header { display: flex; align-items: flex-end; justify-content: space-between; }
    .section-title { font-size: 19px; font-weight: 600; letter-spacing: -0.01em; line-height: 1.2; }
    .section-sub   { font-size: 12.5px; color: var(--ink-mute); margin-top: 3px; }

    /* ── STATS ── */
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
    .stat-card {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; padding: 18px 20px;
    }
    .stat-label { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.09em; color: var(--ink-mute); }
    .stat-value { font-size: 28px; font-weight: 700; letter-spacing: -0.025em; margin-top: 5px; line-height: 1; }
    .stat-sub   { font-size: 12px; color: var(--ink-mute); margin-top: 5px; }

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

    /* ── SERVICE CARDS GRID ── */
    .services-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
    }
    .svc-card {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 16px;
      display: flex; flex-direction: column; overflow: hidden;
      transition: box-shadow 0.15s;
    }
    .svc-card:hover { box-shadow: 0 3px 14px oklch(16% 0.01 240 / 0.07); }
    .svc-card.disabled { opacity: 0.62; }
    .svc-card-body { padding: 20px; flex: 1; display: flex; flex-direction: column; gap: 10px; }
    .svc-icon-wrap {
      width: 44px; height: 44px; border-radius: 12px; background: var(--blue-50);
      display: grid; place-items: center; color: var(--blue-600); flex-shrink: 0;
    }
    .svc-card-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 10px; }
    .svc-name { font-size: 16px; font-weight: 600; letter-spacing: -0.01em; line-height: 1.25; }
    .svc-desc { font-size: 12.5px; color: var(--ink-mute); line-height: 1.45; }
    .svc-price { font-size: 20px; font-weight: 700; color: var(--blue-600); letter-spacing: -0.02em; margin-top: 2px; }
    .svc-status-pill {
      display: inline-flex; align-items: center; padding: 3px 9px; border-radius: 999px;
      font-size: 11px; font-weight: 600; white-space: nowrap; flex-shrink: 0;
    }
    .pill-activo      { background: var(--green-soft); color: var(--green-deep); }
    .pill-deshabilitado { background: var(--paper-2); color: var(--ink-mute); border: 1px solid var(--rule); }
    .svc-barberos-label {
      font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.09em;
      color: var(--ink-mute); margin-top: 6px;
    }
    .svc-barberos-avs { display: flex; gap: 5px; margin-top: 5px; flex-wrap: wrap; }
    .svc-barb-av {
      width: 26px; height: 26px; border-radius: 50%;
      display: grid; place-items: center; font-size: 8.5px; font-weight: 700; color: var(--paper);
    }
    .av-carlos  { background: var(--blue-600); }
    .av-facundo { background: oklch(35% 0.12 180); }
    .av-agustin { background: oklch(36% 0.13 290); }
    .svc-card-footer {
      padding: 12px 20px; border-top: 1px solid var(--rule);
      display: flex; gap: 8px;
    }
    .svc-card-footer .btn { flex: 1; justify-content: center; }

    /* ── ASSOCIATION SECTION ── */
    .assoc-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
    .assoc-card {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 16px; padding: 22px;
    }
    .assoc-barb-top { display: flex; align-items: center; gap: 12px; margin-bottom: 18px; }
    .assoc-barb-av {
      width: 46px; height: 46px; border-radius: 50%;
      display: grid; place-items: center; font-size: 14px; font-weight: 700; color: var(--paper); flex-shrink: 0;
    }
    .assoc-barb-name { font-size: 14px; font-weight: 600; line-height: 1.2; }
    .assoc-barb-role { font-size: 11.5px; color: var(--ink-mute); margin-top: 1px; }
    .assoc-services-list { display: flex; flex-direction: column; gap: 9px; }
    .assoc-service-row {
      display: flex; align-items: center; gap: 10px; cursor: pointer;
      padding: 9px 12px; border-radius: 9px; border: 1px solid var(--rule);
      transition: background 0.12s, border-color 0.12s;
    }
    .assoc-service-row:hover { background: var(--paper-2); }
    .assoc-service-row.checked { background: var(--blue-50); border-color: var(--blue-100); }
    .assoc-check {
      width: 17px; height: 17px; border-radius: 5px; border: 1.5px solid var(--rule);
      background: var(--paper); display: grid; place-items: center; flex-shrink: 0;
      transition: background 0.12s, border-color 0.12s;
    }
    .assoc-service-row.checked .assoc-check { background: var(--blue-600); border-color: var(--blue-600); }
    .assoc-check-mark { display: none; }
    .assoc-service-row.checked .assoc-check-mark { display: block; }
    .assoc-svc-name { font-size: 13px; font-weight: 500; color: var(--ink); }
    .assoc-footer { margin-top: 14px; display: flex; justify-content: flex-end; }

    /* ── MODAL ── */
    .modal-overlay {
      position: fixed; inset: 0; background: oklch(16% 0.01 240 / 0.26);
      z-index: 50; display: grid; place-items: center;
      opacity: 0; pointer-events: none; transition: opacity 0.18s;
    }
    .modal-overlay.open { opacity: 1; pointer-events: all; }
    .modal {
      background: var(--paper); border: 1px solid var(--rule);
      border-radius: 18px; width: 520px; max-width: 96vw; max-height: 92vh; overflow-y: auto;
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
    .modal-bd { padding: 20px 22px; display: flex; flex-direction: column; gap: 18px; }
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
    .form-row   { display: grid; grid-template-columns: 1fr 1fr; gap: 13px; }
    .form-group { display: flex; flex-direction: column; gap: 5px; }
    .form-label { font-size: 12.5px; font-weight: 500; color: var(--ink-soft); }
    .form-input {
      padding: 9px 12px; border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13.5px; color: var(--ink); background: var(--paper);
      outline: none; width: 100%; transition: border-color 0.12s;
    }
    .form-input:focus { border-color: var(--blue-400); }
    .form-textarea {
      padding: 9px 12px; border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13.5px; color: var(--ink); background: var(--paper);
      outline: none; width: 100%; resize: vertical; transition: border-color 0.12s;
    }
    .form-textarea:focus { border-color: var(--blue-400); }
    .form-warn { font-size: 12px; color: var(--red-deep); padding: 10px 14px; background: var(--red-soft); border: 1px solid oklch(87% 0.05 22); border-radius: 8px; line-height: 1.5; }
    .form-info { font-size: 12px; color: var(--ink-mute); padding: 9px 13px; background: var(--paper-2); border: 1px solid var(--rule); border-radius: 8px; line-height: 1.5; }

    /* Estado pills (modal) */
    .estado-pills { display: flex; gap: 6px; }
    .estado-pill {
      flex: 1; padding: 9px 14px; border: 1.5px solid var(--rule); border-radius: 9px;
      font-family: inherit; font-size: 13px; font-weight: 500; cursor: pointer;
      background: var(--paper); color: var(--ink-mute); transition: all 0.12s; text-align: center;
    }
    .estado-pill.active-activo      { background: var(--green-soft); color: var(--green-deep); border-color: var(--green); font-weight: 600; }
    .estado-pill.active-deshabilitado { background: var(--paper-2); color: var(--ink-mute); border-color: var(--ink-mute); font-weight: 600; }

    /* Barbero selector (modal) */
    .modal-barb-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; }
    .modal-barb-card {
      padding: 10px 12px; border: 1.5px solid var(--rule); border-radius: 10px; cursor: pointer;
      display: flex; flex-direction: column; align-items: center; gap: 6px; text-align: center;
      transition: border-color 0.12s, background 0.12s;
    }
    .modal-barb-card:hover { background: var(--paper-2); }
    .modal-barb-card.sel-carlos  { border-color: var(--blue-600); background: var(--blue-50); }
    .modal-barb-card.sel-facundo { border-color: oklch(35% 0.12 180); background: oklch(94% 0.04 180); }
    .modal-barb-card.sel-agustin { border-color: oklch(36% 0.13 290); background: var(--violet-soft); }
    .modal-barb-av {
      width: 34px; height: 34px; border-radius: 50%;
      display: grid; place-items: center; font-size: 11px; font-weight: 700; color: var(--paper);
    }
    .modal-barb-name { font-size: 11.5px; font-weight: 600; line-height: 1.2; }

    /* ── SIDEBAR OVERLAY ── */
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: oklch(16% 0.01 240 / 0.35); z-index: 19; }
    .sidebar-overlay.open { display: block; }

    /* ── MOBILE ── */
    @media (max-width: 900px) {
      .services-grid { grid-template-columns: repeat(2, 1fr) !important; }
      .assoc-grid    { grid-template-columns: 1fr !important; }
    }
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); transition: transform 0.22s cubic-bezier(0.4, 0, 0.2, 1); }
      .sidebar.open { transform: translateX(0); }
      .main-area { margin-left: 0 !important; width: 100% !important; }
      .topbar { left: 0 !important; padding: 0 16px !important; }
      .topbar-hamburger { display: flex; }
      .stats-grid { grid-template-columns: repeat(2, 1fr) !important; }
      .content { padding: 72px 12px 32px !important; }
      .services-grid { grid-template-columns: 1fr !important; }
      .modal { width: 95vw !important; }
      .form-row { grid-template-columns: 1fr !important; }
      .modal-barb-grid { grid-template-columns: repeat(3, 1fr); }
      .toolbar { flex-wrap: wrap; }
      .tb-select { min-width: 0; flex: 1; }
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
        <a href="/dashboard/servicios" class="nav-link active">
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
        <a href="/dashboard/adelantos" class="nav-link">
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
        <h1>Servicios</h1>
        <div class="breadcrumb">Gestión &rarr; Servicios</div>
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
          <div class="section-title">Gestión de servicios</div>
          <div class="section-sub">Administrá los servicios disponibles y sus precios</div>
        </div>
      </div>

      <!-- ── STATS ── -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-label">Servicios activos</div>
          <div class="stat-value" style="color:var(--green-deep)" id="statActivos">4</div>
          <div class="stat-sub">disponibles para turnos</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Deshabilitados</div>
          <div class="stat-value" style="color:var(--ink-mute)" id="statDeshabilitados">1</div>
          <div class="stat-sub">no aparecen en reservas</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Más solicitado</div>
          <div class="stat-value" style="color:var(--blue-600);font-size:22px" id="statPopular">Corte</div>
          <div class="stat-sub">este mes</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Precio promedio</div>
          <div class="stat-value" style="color:var(--ink)" id="statPromedio">$3.300</div>
          <div class="stat-sub">entre servicios activos</div>
        </div>
      </div>

      <!-- ── LISTADO ── -->
      <div>
        <div class="section-header" style="margin-bottom:14px">
          <div>
            <div class="section-title" style="font-size:17px">Servicios</div>
          </div>
          <button class="btn btn-gold" onclick="openNuevo()">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Nuevo servicio
          </button>
        </div>

        <div class="toolbar" style="margin-bottom:16px">
          <div class="search-wrap">
            <svg class="search-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input class="tb-input" type="text" id="searchInput" placeholder="Buscar servicio..." oninput="applyFilters()">
          </div>
          <select class="tb-select" id="filterEstado" onchange="applyFilters()">
            <option value="">Todos los estados</option>
            <option value="activo">Activo</option>
            <option value="deshabilitado">Deshabilitado</option>
          </select>
          <button class="btn btn-outline btn-sm" onclick="clearFilters()">Limpiar filtros</button>
        </div>

        <div class="services-grid" id="servicesGrid"></div>
        <div id="emptyState" style="display:none;text-align:center;padding:48px 0;color:var(--ink-mute);font-size:14px">No se encontraron servicios con los filtros aplicados.</div>
      </div>

      <!-- ── ASOCIACIÓN BARBEROS-SERVICIOS ── -->
      <div>
        <div style="margin-bottom:16px">
          <div class="section-title" style="font-size:17px">Asociación de servicios por barbero</div>
          <div class="section-sub">Configurá qué servicios puede realizar cada barbero</div>
        </div>
        <div class="assoc-grid" id="assocGrid"></div>
      </div>

    </main>
  </div>
</div>

<!-- ══ MODAL NUEVO / EDITAR SERVICIO ══ -->
<div class="modal-overlay" id="moSvcOverlay">
  <div class="modal">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title" id="svcModalTitle">Nuevo servicio</div>
        <div class="modal-hd-sub" id="svcModalSub">Completá los datos del servicio</div>
      </div>
      <button class="close-btn" onclick="closeSvcModal()">&times;</button>
    </div>
    <div class="modal-bd">
      <input type="hidden" id="svcModalId">

      <div class="modal-section">
        <div class="modal-section-label">Información</div>
        <div class="form-group">
          <label class="form-label">Nombre del servicio</label>
          <input type="text" class="form-input" id="svcNombre" placeholder="Ej: Corte de cabello">
        </div>
        <div class="form-group">
          <label class="form-label">Descripción</label>
          <textarea class="form-textarea" id="svcDesc" rows="3" placeholder="Breve descripción del servicio"></textarea>
        </div>
        <div class="form-group">
          <label class="form-label">Precio $</label>
          <input type="number" class="form-input" id="svcPrecio" placeholder="0" min="1" style="width:180px">
        </div>
        <div class="form-group">
          <label class="form-label">Estado</label>
          <div class="estado-pills">
            <button class="estado-pill active-activo" id="pillActivo" onclick="setEstado('activo')">Activo</button>
            <button class="estado-pill" id="pillDeshabilitado" onclick="setEstado('deshabilitado')">Deshabilitado</button>
          </div>
        </div>
      </div>

      <div class="modal-section">
        <div class="modal-section-label">Barberos habilitados para este servicio</div>
        <div class="modal-barb-grid">
          <div class="modal-barb-card" id="mbCardCarlos" onclick="toggleModalBarb('carlos')">
            <div class="modal-barb-av av-carlos">CM</div>
            <div class="modal-barb-name">Carlos<br>Medina</div>
          </div>
          <div class="modal-barb-card" id="mbCardFacundo" onclick="toggleModalBarb('facundo')">
            <div class="modal-barb-av av-facundo">FT</div>
            <div class="modal-barb-name">Facundo<br>Torres</div>
          </div>
          <div class="modal-barb-card" id="mbCardAgustin" onclick="toggleModalBarb('agustin')">
            <div class="modal-barb-av av-agustin">AR</div>
            <div class="modal-barb-name">Agustín<br>Romero</div>
          </div>
        </div>
        <div class="form-info">Solo aparecen usuarios con perfil habilitado para atender turnos.</div>
      </div>

      <div id="svcFormFeedback"></div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeSvcModal()">Cancelar</button>
      <button class="btn btn-gold" id="svcModalBtn" onclick="guardarServicio()">Crear servicio</button>
    </div>
  </div>
</div>

<!-- ══ MODAL DESHABILITAR / ACTIVAR ══ -->
<div class="modal-overlay" id="moToggleOverlay">
  <div class="modal" style="width:440px">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title" id="toggleModalTitle">Deshabilitar servicio</div>
        <div class="modal-hd-sub" id="toggleModalSub"></div>
      </div>
      <button class="close-btn" onclick="closeToggleModal()">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="modal-section">
        <div id="toggleModalMsg" class="form-warn">El servicio no aparecerá disponible para nuevos turnos. El historial de turnos anteriores se conserva.</div>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeToggleModal()">Cancelar</button>
      <button class="btn btn-red" id="toggleModalBtn" onclick="confirmarToggle()">Deshabilitar servicio</button>
    </div>
  </div>
</div>

<script>
  /* ══════════════════ DATA ══════════════════ */
  const BARB = {
    carlos:  { nombre: 'Carlos Medina',  initials: 'CM', clase: 'av-carlos',  modalClase: 'sel-carlos'  },
    facundo: { nombre: 'Facundo Torres', initials: 'FT', clase: 'av-facundo', modalClase: 'sel-facundo' },
    agustin: { nombre: 'Agustín Romero', initials: 'AR', clase: 'av-agustin', modalClase: 'sel-agustin' }
  };

  let serviciosData = [
    {
      id: 1, nombre: 'Corte de cabello', desc: 'Clásico o moderno, a tu medida',
      precio: 3500, estado: 'activo',
      barberos: ['carlos','facundo','agustin']
    },
    {
      id: 2, nombre: 'Barba', desc: 'Perfilado y diseño de barba',
      precio: 2500, estado: 'activo',
      barberos: ['carlos','facundo']
    },
    {
      id: 3, nombre: 'Cejas', desc: 'Diseño y depilación de cejas',
      precio: 1500, estado: 'activo',
      barberos: ['agustin']
    },
    {
      id: 4, nombre: 'Coloración', desc: 'Mechas, tinte y coloración completa',
      precio: 5000, estado: 'activo',
      barberos: ['facundo']
    },
    {
      id: 5, nombre: 'Diseño especial', desc: 'Diseños y líneas artísticas',
      precio: 4000, estado: 'deshabilitado',
      barberos: ['carlos']
    }
  ];

  /* asociación por barbero: qué servicios (ids) tiene habilitados */
  let assocData = {
    carlos:  [1, 2, 5],
    facundo: [1, 2, 4],
    agustin: [1, 3]
  };

  let nextId = 6;
  var toggleTargetId = null;
  var modalEstado = 'activo';
  var modalBarberos = [];
  var modalMode = 'nuevo'; /* 'nuevo' | 'editar' */

  /* ══════════════════ UTILS ══════════════════ */
  function fm(n) { return '$' + Number(n).toLocaleString('es-AR'); }

  const ICONS = {
    corte:      `<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><line x1="20" y1="4" x2="8.12" y2="15.88"/><line x1="14.47" y1="14.48" x2="20" y2="20"/><line x1="8.12" y1="8.12" x2="12" y2="12"/></svg>`,
    barba:      `<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3l18 18M3 21l4-4m10-10l4-4M5 7l2 2M17 17l2 2"/><rect x="4" y="4" width="6" height="14" rx="2"/></svg>`,
    cejas:      `<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 10 Q7 5 12 10 Q17 5 22 10"/><circle cx="12" cy="14" r="3"/></svg>`,
    coloracion: `<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19c0 0-7-4.5-7-9a7 7 0 0114 0c0 4.5-7 9-7 9z"/><line x1="12" y1="3" x2="12" y2="6"/></svg>`,
    diseno:     `<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>`
  };

  function iconForSvc(svc) {
    const n = svc.nombre.toLowerCase();
    if (n.includes('corte'))   return ICONS.corte;
    if (n.includes('barba'))   return ICONS.barba;
    if (n.includes('ceja'))    return ICONS.cejas;
    if (n.includes('color'))   return ICONS.coloracion;
    return ICONS.diseno;
  }

  /* ══════════════════ SIDEBAR ══════════════════ */
  function openSidebar()  { document.getElementById('sidebar').classList.add('open'); document.getElementById('sidebarOverlay').classList.add('open'); }
  function closeSidebar() { document.getElementById('sidebar').classList.remove('open'); document.getElementById('sidebarOverlay').classList.remove('open'); }

  /* ══════════════════ STATS ══════════════════ */
  function updateStats() {
    const activos = serviciosData.filter(s => s.estado === 'activo');
    const deshab  = serviciosData.filter(s => s.estado === 'deshabilitado');
    const promedio = activos.length ? Math.round(activos.reduce((s,r)=>s+r.precio,0)/activos.length) : 0;
    document.getElementById('statActivos').textContent       = activos.length;
    document.getElementById('statDeshabilitados').textContent = deshab.length;
    document.getElementById('statPromedio').textContent      = fm(promedio);
  }

  /* ══════════════════ RENDER CARDS ══════════════════ */
  function renderCards(data) {
    const grid  = document.getElementById('servicesGrid');
    const empty = document.getElementById('emptyState');
    if (!data.length) {
      grid.innerHTML = '';
      empty.style.display = 'block';
      return;
    }
    empty.style.display = 'none';
    grid.innerHTML = data.map(svc => {
      const isActive = svc.estado === 'activo';
      const pillHtml = isActive
        ? '<span class="svc-status-pill pill-activo">Activo</span>'
        : '<span class="svc-status-pill pill-deshabilitado">Deshabilitado</span>';
      const avsHtml = svc.barberos.map(b =>
        `<div class="svc-barb-av ${BARB[b].clase}" title="${BARB[b].nombre}">${BARB[b].initials}</div>`
      ).join('');
      const toggleLabel = isActive ? 'Deshabilitar' : 'Activar';
      return `
        <div class="svc-card${isActive ? '' : ' disabled'}" id="svcCard${svc.id}">
          <div class="svc-card-body">
            <div class="svc-card-top">
              <div>
                <div class="svc-icon-wrap">${iconForSvc(svc)}</div>
              </div>
              ${pillHtml}
            </div>
            <div>
              <div class="svc-name">${svc.nombre}</div>
              <div class="svc-desc" style="margin-top:4px">${svc.desc}</div>
            </div>
            <div class="svc-price">${fm(svc.precio)}</div>
            <div>
              <div class="svc-barberos-label">Barberos habilitados</div>
              <div class="svc-barberos-avs">
                ${avsHtml || '<span style="font-size:12px;color:var(--ink-mute)">Ninguno asignado</span>'}
              </div>
            </div>
          </div>
          <div class="svc-card-footer">
            <button class="btn btn-outline btn-sm" onclick="openEditar(${svc.id})">Editar</button>
            <button class="btn btn-sm ${isActive ? 'btn-red' : 'btn-outline'}" onclick="openToggle(${svc.id})">${toggleLabel}</button>
          </div>
        </div>`;
    }).join('');
  }

  /* ══════════════════ FILTERS ══════════════════ */
  function applyFilters() {
    const q      = document.getElementById('searchInput').value.toLowerCase();
    const estado = document.getElementById('filterEstado').value;
    const filtered = serviciosData.filter(s => {
      const matchQ = !q || s.nombre.toLowerCase().includes(q) || s.desc.toLowerCase().includes(q);
      const matchE = !estado || s.estado === estado;
      return matchQ && matchE;
    });
    renderCards(filtered);
  }

  function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('filterEstado').value = '';
    renderCards(serviciosData);
  }

  /* ══════════════════ MODAL SVC ══════════════════ */
  var modalEstado  = 'activo';
  var modalBarberos = [];

  function setEstado(e) {
    modalEstado = e;
    document.getElementById('pillActivo').className       = 'estado-pill' + (e === 'activo'         ? ' active-activo'         : '');
    document.getElementById('pillDeshabilitado').className = 'estado-pill' + (e === 'deshabilitado'  ? ' active-deshabilitado'  : '');
  }

  function toggleModalBarb(key) {
    const idx = modalBarberos.indexOf(key);
    if (idx === -1) modalBarberos.push(key); else modalBarberos.splice(idx, 1);
    refreshModalBarbCards();
  }

  function refreshModalBarbCards() {
    ['carlos','facundo','agustin'].forEach(k => {
      const card = document.getElementById('mbCard' + k.charAt(0).toUpperCase() + k.slice(1));
      if (modalBarberos.includes(k)) {
        card.className = 'modal-barb-card ' + BARB[k].modalClase;
      } else {
        card.className = 'modal-barb-card';
      }
    });
  }

  function openNuevo() {
    modalMode = 'nuevo';
    document.getElementById('svcModalTitle').textContent = 'Nuevo servicio';
    document.getElementById('svcModalSub').textContent   = 'Completá los datos del servicio';
    document.getElementById('svcModalBtn').textContent   = 'Crear servicio';
    document.getElementById('svcModalId').value  = '';
    document.getElementById('svcNombre').value   = '';
    document.getElementById('svcDesc').value     = '';
    document.getElementById('svcPrecio').value   = '';
    document.getElementById('svcFormFeedback').innerHTML = '';
    modalBarberos = [];
    setEstado('activo');
    refreshModalBarbCards();
    document.getElementById('moSvcOverlay').classList.add('open');
  }

  function openEditar(id) {
    const svc = serviciosData.find(s => s.id === id);
    if (!svc) return;
    modalMode = 'editar';
    document.getElementById('svcModalTitle').textContent = 'Editar servicio';
    document.getElementById('svcModalSub').textContent   = svc.nombre;
    document.getElementById('svcModalBtn').textContent   = 'Guardar cambios';
    document.getElementById('svcModalId').value  = id;
    document.getElementById('svcNombre').value   = svc.nombre;
    document.getElementById('svcDesc').value     = svc.desc;
    document.getElementById('svcPrecio').value   = svc.precio;
    document.getElementById('svcFormFeedback').innerHTML = '';
    modalBarberos = [...svc.barberos];
    setEstado(svc.estado);
    refreshModalBarbCards();
    document.getElementById('moSvcOverlay').classList.add('open');
  }

  function closeSvcModal() {
    document.getElementById('moSvcOverlay').classList.remove('open');
  }

  function guardarServicio() {
    const nombre = document.getElementById('svcNombre').value.trim();
    const desc   = document.getElementById('svcDesc').value.trim();
    const precio = parseFloat(document.getElementById('svcPrecio').value);
    const fb     = document.getElementById('svcFormFeedback');

    if (!nombre) { fb.innerHTML = '<div class="form-warn">Ingresá el nombre del servicio.</div>'; return; }
    if (!precio || precio <= 0) { fb.innerHTML = '<div class="form-warn">Ingresá un precio válido.</div>'; return; }

    if (modalMode === 'nuevo') {
      serviciosData.push({ id: nextId++, nombre, desc, precio, estado: modalEstado, barberos: [...modalBarberos] });
    } else {
      const id  = parseInt(document.getElementById('svcModalId').value);
      const idx = serviciosData.findIndex(s => s.id === id);
      if (idx !== -1) serviciosData[idx] = { ...serviciosData[idx], nombre, desc, precio, estado: modalEstado, barberos: [...modalBarberos] };
    }

    closeSvcModal();
    applyFilters();
    updateStats();
    renderAssoc();
  }

  /* ══════════════════ MODAL TOGGLE ══════════════════ */
  function openToggle(id) {
    const svc = serviciosData.find(s => s.id === id);
    if (!svc) return;
    toggleTargetId = id;
    const disabling = svc.estado === 'activo';
    document.getElementById('toggleModalTitle').textContent = disabling ? 'Deshabilitar servicio' : 'Activar servicio';
    document.getElementById('toggleModalSub').textContent   = svc.nombre;
    document.getElementById('toggleModalMsg').className     = disabling ? 'form-warn' : 'form-info';
    document.getElementById('toggleModalMsg').textContent   = disabling
      ? 'El servicio no aparecerá disponible para nuevos turnos. El historial de turnos anteriores se conserva.'
      : 'El servicio volverá a estar disponible para nuevos turnos.';
    document.getElementById('toggleModalBtn').textContent   = disabling ? 'Deshabilitar servicio' : 'Activar servicio';
    document.getElementById('toggleModalBtn').className     = disabling ? 'btn btn-red' : 'btn btn-gold';
    document.getElementById('moToggleOverlay').classList.add('open');
  }

  function closeToggleModal() {
    document.getElementById('moToggleOverlay').classList.remove('open');
    toggleTargetId = null;
  }

  function confirmarToggle() {
    if (toggleTargetId === null) return;
    const idx = serviciosData.findIndex(s => s.id === toggleTargetId);
    if (idx !== -1) {
      serviciosData[idx].estado = serviciosData[idx].estado === 'activo' ? 'deshabilitado' : 'activo';
    }
    closeToggleModal();
    applyFilters();
    updateStats();
  }

  /* ══════════════════ ASOCIACIÓN ══════════════════ */
  function renderAssoc() {
    const grid = document.getElementById('assocGrid');
    grid.innerHTML = Object.keys(BARB).map(key => {
      const b = BARB[key];
      const rowsHtml = serviciosData.map(svc => {
        const checked = (assocData[key] || []).includes(svc.id);
        return `
          <div class="assoc-service-row${checked ? ' checked' : ''}" id="assocRow_${key}_${svc.id}" onclick="toggleAssoc('${key}', ${svc.id})">
            <div class="assoc-check">
              <svg class="assoc-check-mark" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <span class="assoc-svc-name">${svc.nombre}</span>
          </div>`;
      }).join('');
      return `
        <div class="assoc-card">
          <div class="assoc-barb-top">
            <div class="assoc-barb-av ${b.clase}">${b.initials}</div>
            <div>
              <div class="assoc-barb-name">${b.nombre}</div>
              <div class="assoc-barb-role">Barbero</div>
            </div>
          </div>
          <div class="assoc-services-list">${rowsHtml}</div>
          <div class="assoc-footer">
            <button class="btn btn-gold btn-sm" onclick="saveAssoc('${key}')">Guardar</button>
          </div>
        </div>`;
    }).join('');
  }

  function toggleAssoc(barbero, svcId) {
    if (!assocData[barbero]) assocData[barbero] = [];
    const idx = assocData[barbero].indexOf(svcId);
    if (idx === -1) assocData[barbero].push(svcId); else assocData[barbero].splice(idx, 1);
    const row = document.getElementById(`assocRow_${barbero}_${svcId}`);
    if (row) row.classList.toggle('checked', assocData[barbero].includes(svcId));
    /* sync to service barberos list */
    serviciosData.forEach(svc => {
      if (svc.id === svcId) {
        const bi = svc.barberos.indexOf(barbero);
        if (assocData[barbero].includes(svcId)) { if (bi === -1) svc.barberos.push(barbero); }
        else { if (bi !== -1) svc.barberos.splice(bi, 1); }
      }
    });
  }

  function saveAssoc(barbero) {
    /* Visual feedback: briefly show saved state on button */
    const card = document.getElementById('assocGrid').querySelectorAll('.assoc-card');
    const keys = Object.keys(BARB);
    const idx  = keys.indexOf(barbero);
    if (idx !== -1 && card[idx]) {
      const btn = card[idx].querySelector('.assoc-footer .btn');
      const orig = btn.textContent;
      btn.textContent = 'Guardado';
      btn.disabled = true;
      setTimeout(() => { btn.textContent = orig; btn.disabled = false; }, 1400);
    }
    /* Update service cards to reflect new barberos */
    applyFilters();
  }

  /* ══════════════════ INIT ══════════════════ */
  renderCards(serviciosData);
  updateStats();
  renderAssoc();
</script>
</body>
</html>
