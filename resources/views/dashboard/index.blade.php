<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de usuarios — Barber Brizu</title>
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
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Outfit', -apple-system, sans-serif;
      font-size: 14px;
      line-height: 1.5;
      color: var(--ink);
      background: var(--paper-2);
    }

    /* ─── LAYOUT ─────────────────────────────── */
    .layout { display: flex; min-height: 100vh; }

    /* ─── SIDEBAR ────────────────────────────── */
    .sidebar {
      width: 230px;
      height: 100vh;
      position: fixed;
      left: 0; top: 0;
      background: var(--paper);
      border-right: 1px solid var(--rule);
      display: flex;
      flex-direction: column;
      z-index: 20;
      overflow: hidden;
    }

    .sidebar-logo {
      height: 60px;
      padding: 0 16px;
      border-bottom: 1px solid var(--rule);
      display: flex;
      align-items: center;
      gap: 10px;
      flex-shrink: 0;
    }

    .logo-mark {
      width: 33px; height: 33px;
      border-radius: 9px;
      background: var(--blue-600);
      color: var(--paper);
      display: grid; place-items: center;
      font-weight: 700; font-size: 12px;
      letter-spacing: 0.04em;
      flex-shrink: 0;
    }

    .logo-name { font-weight: 600; font-size: 13.5px; letter-spacing: -0.01em; line-height: 1.2; }
    .logo-sub  { font-size: 11px; color: var(--ink-mute); margin-top: 1px; }

    .sidebar-nav {
      flex: 1;
      overflow-y: auto;
      padding: 6px 8px;
      scrollbar-width: none;
    }
    .sidebar-nav::-webkit-scrollbar { display: none; }

    .nav-group { margin-bottom: 2px; }

    .nav-group-label {
      font-size: 10px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.1em;
      color: var(--ink-mute);
      padding: 10px 9px 4px;
    }

    .nav-link {
      display: flex; align-items: center; gap: 8px;
      padding: 7px 10px;
      border-radius: 8px;
      color: var(--ink-soft);
      font-size: 13px; font-weight: 500;
      cursor: pointer; text-decoration: none;
      transition: background 0.12s, color 0.12s;
      white-space: nowrap;
    }
    .nav-link:hover  { background: var(--paper-2); color: var(--ink); }
    .nav-link.active { background: var(--blue-50);  color: var(--blue-600); }
    .nav-link svg    { flex-shrink: 0; opacity: 0.7; }
    .nav-link.active svg { opacity: 1; }

    .nav-badge {
      margin-left: auto;
      background: var(--blue-600); color: var(--paper);
      font-size: 10px; font-weight: 700;
      padding: 2px 6px; border-radius: 999px;
      min-width: 18px; text-align: center;
      flex-shrink: 0;
    }

    .sidebar-user {
      padding: 13px 14px;
      border-top: 1px solid var(--rule);
      display: flex; align-items: center; gap: 10px;
      flex-shrink: 0;
    }
    .s-user-av {
      width: 32px; height: 32px; border-radius: 50%;
      background: var(--blue-600); color: var(--paper);
      display: grid; place-items: center;
      font-size: 11px; font-weight: 700;
      flex-shrink: 0;
    }
    .s-user-name { font-size: 13px; font-weight: 600; line-height: 1.2; }
    .s-user-role { font-size: 11px; color: var(--ink-mute); }

    /* ─── MAIN AREA ──────────────────────────── */
    .main-area {
      margin-left: 230px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      flex: 1;
      min-width: 0;
      width: calc(100% - 230px);
    }

    /* ─── TOPBAR ─────────────────────────────── */
    .topbar {
      position: fixed; top: 0; left: 230px; right: 0;
      height: 60px;
      background: oklch(98.5% 0.004 240 / 0.92);
      backdrop-filter: blur(8px);
      border-bottom: 1px solid var(--rule);
      display: flex; align-items: center;
      justify-content: space-between;
      padding: 0 26px;
      z-index: 10;
    }

    .topbar-title h1 {
      font-size: 16px; font-weight: 600;
      letter-spacing: -0.01em; line-height: 1.2;
    }
    .breadcrumb { font-size: 11.5px; color: var(--ink-mute); margin-top: 1px; }
    .topbar-actions { display: flex; gap: 9px; align-items: center; }

    /* ─── BUTTONS ────────────────────────────── */
    .btn {
      padding: 8px 15px;
      border-radius: 9px;
      font-size: 13.5px; font-weight: 500;
      font-family: inherit; cursor: pointer; border: none;
      display: inline-flex; align-items: center; gap: 7px;
      transition: opacity 0.12s;
      line-height: 1;
      text-decoration: none;
    }
    .btn:hover { opacity: 0.78; }
    .btn-outline { background: transparent; color: var(--ink); border: 1px solid var(--rule); }
    .btn-dark    { background: var(--ink); color: var(--paper); }
    .btn-blue    { background: var(--blue-50); color: var(--blue-600); border: 1px solid var(--blue-100); }
    .btn-danger  { background: var(--red-soft); color: var(--red-deep); border: 1px solid oklch(87% 0.05 22); }
    .btn-sm      { padding: 7px 13px; font-size: 12.5px; border-radius: 8px; }
    .btn-full    { width: 100%; justify-content: center; }
    .btn-gold    { background: var(--gold); color: var(--ink); font-weight: 600; border: none; }
    .btn-gold:hover { opacity: 0.85; }
    .btn-logout  { color: var(--red-deep); border-color: oklch(86% 0.06 22); }
    .btn-logout:hover { background: var(--red-soft); opacity: 1; }

    .close-btn {
      width: 28px; height: 28px; border-radius: 7px;
      border: 1px solid var(--rule); background: transparent;
      display: grid; place-items: center; cursor: pointer;
      font-size: 18px; color: var(--ink-mute); line-height: 1;
      font-family: inherit;
    }
    .close-btn:hover { background: var(--paper-2); }

    /* ─── CONTENT ────────────────────────────── */
    .content {
      padding: 80px 26px 40px;
      display: flex; flex-direction: column; gap: 16px;
    }

    /* ─── STAT CARDS ─────────────────────────── */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px;
    }
    .stat-card {
      background: var(--paper);
      border: 1px solid var(--rule);
      border-radius: 14px;
      padding: 18px 20px;
    }
    .stat-label {
      font-size: 10.5px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.09em;
      color: var(--ink-mute);
    }
    .stat-value {
      font-size: 30px; font-weight: 600;
      letter-spacing: -0.025em; margin-top: 5px; line-height: 1;
    }
    .stat-sub { font-size: 12px; color: var(--ink-mute); margin-top: 5px; }

    /* ─── TOOLBAR ────────────────────────────── */
    .toolbar {
      background: var(--paper);
      border: 1px solid var(--rule);
      border-radius: 12px;
      padding: 12px 16px;
      display: flex; gap: 10px; align-items: center;
    }
    .search-wrap { position: relative; flex: 1; }
    .search-icon {
      position: absolute; left: 10px; top: 50%;
      transform: translateY(-50%);
      color: var(--ink-mute); pointer-events: none;
    }
    .tb-input {
      width: 100%; padding: 8px 12px 8px 34px;
      border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13.5px; color: var(--ink);
      background: var(--paper-2); outline: none;
      transition: border-color 0.12s;
    }
    .tb-input:focus { border-color: var(--blue-400); }
    .tb-select {
      padding: 8px 12px; border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13.5px; color: var(--ink);
      background: var(--paper-2); outline: none; cursor: pointer;
    }

    /* ─── TABLE ──────────────────────────────── */
    .table-card {
      background: var(--paper);
      border: 1px solid var(--rule);
      border-radius: 14px;
      overflow: hidden;
    }
    table { width: 100%; border-collapse: collapse; }
    thead th {
      padding: 11px 16px;
      text-align: left;
      font-size: 10.5px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.08em;
      color: var(--ink-mute);
      border-bottom: 1px solid var(--rule);
      white-space: nowrap;
    }
    tbody tr {
      border-bottom: 1px solid var(--rule);
      cursor: pointer;
      transition: background 0.1s;
    }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: var(--paper-2); }
    tbody td { padding: 12px 16px; vertical-align: middle; }

    .user-cell  { display: flex; align-items: center; gap: 10px; }
    .t-avatar   {
      width: 31px; height: 31px; border-radius: 50%;
      display: grid; place-items: center;
      font-size: 10.5px; font-weight: 700;
      flex-shrink: 0; color: var(--paper);
    }
    .t-name     { font-size: 13.5px; font-weight: 500; }
    .t-email    { font-size: 12px; color: var(--ink-mute); }
    .t-secondary{ font-size: 13px; color: var(--ink-soft); }
    .t-mono     { font-size: 13px; font-weight: 600; }

    /* ─── PERFIL TAGS ────────────────────────── */
    .ptag-wrap { display: flex; gap: 4px; flex-wrap: wrap; align-items: center; }
    .ptag {
      display: inline-flex; align-items: center;
      padding: 3px 9px; border-radius: 5px;
      font-size: 11.5px; font-weight: 500;
      background: var(--blue-50); color: var(--blue-600);
      border: 1px solid var(--blue-100);
      white-space: nowrap; line-height: 1.5;
    }
    .ptag-more {
      background: var(--paper-2); color: var(--ink-mute);
      border-color: var(--rule);
    }

    /* ─── SECTION HEADER ─────────────────────── */
    .section-header {
      display: flex; align-items: flex-end;
      justify-content: space-between;
      padding-bottom: 4px;
    }
    .section-title { font-size: 19px; font-weight: 600; letter-spacing: -0.01em; line-height: 1.2; }
    .section-sub   { font-size: 12.5px; color: var(--ink-mute); margin-top: 3px; }

    .act-wrap { display: flex; gap: 5px; }
    .act-btn {
      width: 28px; height: 28px; border-radius: 7px;
      border: 1px solid var(--rule); background: transparent;
      color: var(--ink-mute); cursor: pointer;
      display: grid; place-items: center;
      transition: background 0.12s, color 0.12s, border-color 0.12s;
    }
    .act-btn:hover        { background: var(--blue-50);  color: var(--blue-600); border-color: var(--blue-100); }
    .act-btn.act-danger:hover { background: var(--red-soft); color: var(--red-deep); border-color: oklch(87% 0.05 22); }

    /* ─── PILLS ──────────────────────────────── */
    .pill {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 4px 10px; border-radius: 999px;
      font-size: 12px; font-weight: 500;
    }
    .pill-dot  { width: 5px; height: 5px; border-radius: 50%; }
    .pill-activo   { background: var(--green-soft); color: var(--green-deep); }
    .pill-activo   .pill-dot { background: var(--green); }
    .pill-pendiente{ background: var(--gold-soft);  color: var(--gold-deep);  }
    .pill-pendiente .pill-dot { background: var(--gold); }
    .pill-inactivo { background: var(--paper-2);    color: var(--ink-mute);   }
    .pill-inactivo  .pill-dot { background: var(--ink-mute); }

    /* ─── PAGINATION ─────────────────────────── */
    .pagination {
      padding: 13px 16px; border-top: 1px solid var(--rule);
      display: flex; justify-content: space-between; align-items: center;
    }
    .pg-info { font-size: 13px; color: var(--ink-mute); }
    .pg-pages { display: flex; gap: 4px; }
    .pg-btn {
      min-width: 30px; height: 30px; padding: 0 8px;
      border-radius: 7px; border: 1px solid var(--rule);
      background: transparent; font-family: inherit;
      font-size: 13px; color: var(--ink-soft); cursor: pointer;
      transition: background 0.12s;
    }
    .pg-btn:hover { background: var(--paper-2); }
    .pg-btn.active {
      background: var(--blue-50); color: var(--blue-600);
      border-color: var(--blue-100); font-weight: 600;
    }

    /* ─── DETAIL OVERLAY ─────────────────────── */
    .detail-overlay {
      position: fixed; inset: 0;
      background: oklch(16% 0.01 240 / 0.1);
      z-index: 30; opacity: 0; pointer-events: none;
      transition: opacity 0.2s;
    }
    .detail-overlay.open { opacity: 1; pointer-events: all; }

    /* ─── DETAIL PANEL ───────────────────────── */
    .detail-panel {
      position: fixed; top: 0; right: 0;
      width: 316px; height: 100vh;
      background: var(--paper); border-left: 1px solid var(--rule);
      z-index: 40;
      transform: translateX(100%);
      transition: transform 0.22s cubic-bezier(0.4, 0, 0.2, 1);
      display: flex; flex-direction: column;
    }
    .detail-panel.open { transform: translateX(0); }

    .detail-hd {
      padding: 18px 18px 14px; border-bottom: 1px solid var(--rule);
      display: flex; align-items: center; justify-content: space-between;
      flex-shrink: 0;
    }
    .detail-hd-title {
      font-size: 10.5px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.08em;
      color: var(--ink-mute);
    }

    .detail-body { flex: 1; overflow-y: auto; padding: 20px; }

    .detail-user-top {
      display: flex; flex-direction: column; align-items: center;
      text-align: center; padding-bottom: 18px;
      border-bottom: 1px solid var(--rule); margin-bottom: 18px;
    }
    .d-avatar {
      width: 56px; height: 56px; border-radius: 50%;
      display: grid; place-items: center;
      font-size: 19px; font-weight: 700; color: var(--paper);
      margin-bottom: 11px;
    }
    .d-name   { font-size: 17px; font-weight: 600; letter-spacing: -0.01em; }
    .d-status { margin-top: 8px; }

    .detail-fields { display: flex; flex-direction: column; gap: 15px; margin-bottom: 20px; }
    .d-field-label {
      font-size: 10.5px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.08em;
      color: var(--ink-mute); margin-bottom: 2px;
    }
    .d-field-value { font-size: 13.5px; color: var(--ink); }

    .detail-actions {
      display: flex; flex-direction: column; gap: 7px;
      padding-top: 18px; border-top: 1px solid var(--rule);
    }

    /* ─── MODAL ──────────────────────────────── */
    .modal-overlay {
      position: fixed; inset: 0;
      background: oklch(16% 0.01 240 / 0.26);
      z-index: 50; display: grid; place-items: center;
      opacity: 0; pointer-events: none;
      transition: opacity 0.18s;
    }
    .modal-overlay.open { opacity: 1; pointer-events: all; }

    .modal {
      background: var(--paper); border: 1px solid var(--rule);
      border-radius: 18px; width: 500px; max-width: 96vw;
      max-height: 92vh; overflow-y: auto;
      transform: translateY(10px) scale(0.99);
      transition: transform 0.18s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .modal-overlay.open .modal { transform: none; }

    .modal-hd {
      padding: 20px 22px 16px; border-bottom: 1px solid var(--rule);
      display: flex; align-items: center; justify-content: space-between;
    }
    .modal-hd-title { font-size: 16px; font-weight: 600; }

    .modal-bd { padding: 20px 22px; display: flex; flex-direction: column; gap: 14px; }

    .form-row        { display: grid; grid-template-columns: 1fr 1fr; gap: 13px; }
    .form-row.single { grid-template-columns: 1fr; }
    .form-group      { display: flex; flex-direction: column; gap: 5px; }
    .form-label      { font-size: 12.5px; font-weight: 500; color: var(--ink-soft); }
    .form-input {
      padding: 9px 12px; border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13.5px; color: var(--ink);
      background: var(--paper); outline: none; width: 100%;
      transition: border-color 0.12s;
    }
    .form-input:focus { border-color: var(--blue-400); }

    .modal-ft {
      padding: 14px 22px 20px; border-top: 1px solid var(--rule);
      display: flex; justify-content: flex-end; gap: 9px;
    }

    .form-hint {
      font-size: 12px; color: var(--ink-mute);
      padding: 10px 14px; background: var(--paper-2);
      border: 1px solid var(--rule); border-radius: 8px;
      line-height: 1.5;
    }
    .form-hint a { color: var(--blue-600); text-decoration: none; font-weight: 500; }
    .form-hint a:hover { text-decoration: underline; }
  </style>
</head>
<body>

<div class="layout">

  <!-- ══════════════ SIDEBAR ══════════════ -->
  <aside class="sidebar">

    <div class="sidebar-logo">
      <div class="logo-mark">BB</div>
      <div>
        <div class="logo-name">Barber Brizu</div>
        <div class="logo-sub">Administración</div>
      </div>
    </div>

    <nav class="sidebar-nav">

      <!-- Principal -->
      <div class="nav-group">
        <div class="nav-group-label">Principal</div>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
            <polyline points="9 22 9 12 15 12 15 22"/>
          </svg>
          Inicio
        </a>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="18" rx="2"/>
            <line x1="16" y1="2" x2="16" y2="6"/>
            <line x1="8" y1="2" x2="8" y2="6"/>
            <line x1="3" y1="10" x2="21" y2="10"/>
          </svg>
          Agenda
        </a>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="9"/>
            <polyline points="12 7 12 12 15 15"/>
          </svg>
          Turnos
          <span class="nav-badge">4</span>
        </a>
      </div>

      <!-- Gestión -->
      <div class="nav-group">
        <div class="nav-group-label">Gestión</div>

        <a href="/dashboard/usuarios" class="nav-link active">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M23 21v-2a4 4 0 00-3-3.87"/>
            <path d="M16 3.13a4 4 0 010 7.75"/>
          </svg>
          Usuarios
        </a>

        <a href="/dashboard/perfiles" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
          </svg>
          Perfiles y permisos
        </a>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="6" cy="6" r="3"/>
            <circle cx="6" cy="18" r="3"/>
            <line x1="20" y1="4" x2="8.12" y2="15.88"/>
            <line x1="14.47" y1="14.48" x2="20" y2="20"/>
            <line x1="8.12" y1="8.12" x2="12" y2="12"/>
          </svg>
          Servicios
        </a>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
            <circle cx="12" cy="7" r="4"/>
          </svg>
          Clientes
        </a>
      </div>

      <!-- Económico -->
      <div class="nav-group">
        <div class="nav-group-label">Económico</div>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="1" x2="12" y2="23"/>
            <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
          </svg>
          Cobros
        </a>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
            <polyline points="17 6 23 6 23 12"/>
          </svg>
          Adelantos
        </a>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>
            <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
            <line x1="12" y1="22.08" x2="12" y2="12"/>
          </svg>
          Consumibles
        </a>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="20" x2="18" y2="10"/>
            <line x1="12" y1="20" x2="12" y2="4"/>
            <line x1="6"  y1="20" x2="6"  y2="14"/>
          </svg>
          Cierres económicos
        </a>
      </div>

      <!-- Análisis -->
      <div class="nav-group">
        <div class="nav-group-label">Análisis</div>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
            <polyline points="14 2 14 8 20 8"/>
            <line x1="16" y1="13" x2="8" y2="13"/>
            <line x1="16" y1="17" x2="8" y2="17"/>
          </svg>
          Reportes
        </a>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/>
            <line x1="7" y1="7" x2="7.01" y2="7"/>
          </svg>
          Promociones
        </a>
      </div>

      <!-- Sistema -->
      <div class="nav-group">
        <div class="nav-group-label">Sistema</div>

        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="3"/>
            <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>
          </svg>
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

  <!-- ══════════════ MAIN AREA ══════════════ -->
  <div class="main-area">

    <!-- TOPBAR -->
    <header class="topbar">
      <div class="topbar-title">
        <h1>Gestión de usuarios</h1>
        <div class="breadcrumb">Sistema &rarr; Gestión &rarr; Usuarios</div>
      </div>
      <div class="topbar-actions">
        <a href="/" class="btn btn-outline">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"/>
            <polyline points="12 19 5 12 12 5"/>
          </svg>
          Ir al sitio
        </a>
        <a href="/logout" class="btn btn-outline btn-logout">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
            <polyline points="16 17 21 12 16 7"/>
            <line x1="21" y1="12" x2="9" y2="12"/>
          </svg>
          Cerrar sesión
        </a>
      </div>
    </header>

    <!-- CONTENT -->
    <main class="content">

      <!-- SECTION HEADER -->
      <div class="section-header">
        <div>
          <div class="section-title">Gestión de usuarios</div>
          <div class="section-sub">Administrá los accesos y perfiles del sistema</div>
        </div>
        <button class="btn btn-gold" onclick="openModal()">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"/>
            <line x1="5"  y1="12" x2="19" y2="12"/>
          </svg>
          Nuevo usuario
        </button>
      </div>

      <!-- STAT CARDS -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-label">Total</div>
          <div class="stat-value">12</div>
          <div class="stat-sub">en el sistema</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Activos</div>
          <div class="stat-value" style="color:var(--green-deep)">9</div>
          <div class="stat-sub">este mes</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Pendientes</div>
          <div class="stat-value" style="color:var(--gold-deep)">2</div>
          <div class="stat-sub">sin verificar</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Inactivos</div>
          <div class="stat-value" style="color:var(--ink-mute)">1</div>
          <div class="stat-sub">deshabilitados</div>
        </div>
      </div>

      <!-- TOOLBAR -->
      <div class="toolbar">
        <div class="search-wrap">
          <svg class="search-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
          </svg>
          <input type="text" id="searchInput" class="tb-input" placeholder="Buscar por nombre o correo...">
        </div>
        <select id="filterPerfil" class="tb-select">
          <option value="">Todos los perfiles</option>
          <option>Dueño</option>
          <option>Barbero</option>
          <option>Recepcionista</option>
          <option>Cliente</option>
        </select>
        <select id="filterEstado" class="tb-select">
          <option value="">Todos los estados</option>
          <option>Activo</option>
          <option>Pendiente</option>
          <option>Inactivo</option>
        </select>
      </div>

      <!-- TABLE -->
      <div class="table-card">
        <table>
          <thead>
            <tr>
              <th>Usuario</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Fecha de alta</th>
              <th>Turnos</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tableBody"></tbody>
        </table>
        <div class="pagination">
          <span class="pg-info" id="pgInfo">Mostrando 8 de 8 usuarios</span>
          <div class="pg-pages">
            <button class="pg-btn active">1</button>
            <button class="pg-btn">2</button>
            <button class="pg-btn">&rsaquo;</button>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

<!-- ══════════════ EDIT MODAL ══════════════ -->
<div class="modal-overlay" id="editModalOverlay">
  <div class="modal">
    <div class="modal-hd">
      <span class="modal-hd-title" id="editModalTitle">Editar usuario</span>
      <button class="close-btn" onclick="closeEditModal()">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Nombre</label>
          <input type="text" id="editNombre" class="form-input" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label class="form-label">Apellido</label>
          <input type="text" id="editApellido" class="form-input" placeholder="Apellido">
        </div>
      </div>
      <div class="form-row single">
        <div class="form-group">
          <label class="form-label">Correo electrónico</label>
          <input type="email" id="editEmail" class="form-input" placeholder="usuario@email.com">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Celular</label>
          <input type="tel" id="editCelular" class="form-input" placeholder="+54 9 370 ...">
        </div>
        <div class="form-group">
          <label class="form-label">Fecha de nacimiento</label>
          <input type="date" id="editFechaNac" class="form-input">
        </div>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeEditModal()">Cancelar</button>
      <button class="btn btn-gold">Guardar cambios</button>
    </div>
  </div>
</div>

<!-- ══════════════ DETAIL OVERLAY ══════════════ -->
<div class="detail-overlay" id="detailOverlay" onclick="closeDetail()"></div>

<!-- ══════════════ DETAIL PANEL ══════════════ -->
<div class="detail-panel" id="detailPanel">
  <div class="detail-hd">
    <span class="detail-hd-title">Detalle de usuario</span>
    <button class="close-btn" onclick="closeDetail()">&times;</button>
  </div>
  <div class="detail-body" id="detailBody"></div>
</div>

<!-- ══════════════ MODAL ══════════════ -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal" id="modalBox">
    <div class="modal-hd">
      <span class="modal-hd-title">Nuevo usuario</span>
      <button class="close-btn" onclick="closeModal()">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Nombre</label>
          <input type="text" class="form-input" placeholder="Ej. Rodrigo">
        </div>
        <div class="form-group">
          <label class="form-label">Apellido</label>
          <input type="text" class="form-input" placeholder="Ej. Brizu">
        </div>
      </div>
      <div class="form-row single">
        <div class="form-group">
          <label class="form-label">Correo electrónico</label>
          <input type="email" class="form-input" placeholder="usuario@email.com">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Celular</label>
          <input type="tel" class="form-input" placeholder="+54 9 370 ...">
        </div>
        <div class="form-group">
          <label class="form-label">Fecha de nacimiento</label>
          <input type="date" class="form-input">
        </div>
      </div>
      <div class="form-row single">
        <div class="form-group">
          <label class="form-label">Contraseña temporal</label>
          <input type="text" class="form-input" value="Bb#2026">
        </div>
      </div>
      <p class="form-hint">&#128274; Podrás asignar perfiles a este usuario desde <a href="/dashboard/perfiles">Perfiles y permisos</a>.</p>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeModal()">Cancelar</button>
      <button class="btn btn-dark">Crear usuario</button>
    </div>
  </div>
</div>

<script>
var USERS = [
  { i:'RB', bg:'oklch(40% 0.17 252)', name:'Rodrigo Brizu',   email:'rodrigo@barberbrizu.com',  perfiles:['Dueño','Barbero'],              estado:'Activo',    fecha:'15 ene 2025', turnos:0   },
  { i:'CM', bg:'oklch(45% 0.14 145)', name:'Carlos Medina',    email:'carlos@barberbrizu.com',   perfiles:['Barbero'],                      estado:'Activo',    fecha:'20 ene 2025', turnos:248 },
  { i:'FT', bg:'oklch(50% 0.14 25)',  name:'Facundo Torres',   email:'facundo@barberbrizu.com',  perfiles:['Barbero'],                      estado:'Activo',    fecha:'20 ene 2025', turnos:185 },
  { i:'AR', bg:'oklch(52% 0.13 85)',  name:'Agustín Romero',   email:'agustin@barberbrizu.com',  perfiles:['Barbero','Recepcionista'],       estado:'Activo',    fecha:'25 ene 2025', turnos:142 },
  { i:'LS', bg:'oklch(46% 0.12 290)', name:'Laura Sánchez',    email:'laura@barberbrizu.com',    perfiles:['Recepcionista'],                 estado:'Activo',    fecha:'01 feb 2025', turnos:0   },
  { i:'MG', bg:'oklch(50% 0.13 340)', name:'Martina Gómez',    email:'martina@email.com',        perfiles:['Cliente'],                      estado:'Activo',    fecha:'10 feb 2025', turnos:5   },
  { i:'VL', bg:'oklch(52% 0.12 210)', name:'Valentina López',  email:'valentina@email.com',      perfiles:['Cliente'],                      estado:'Pendiente', fecha:'12 may 2026', turnos:0   },
  { i:'IR', bg:'oklch(52% 0.08 240)', name:'Ignacio Ríos',     email:'ignacio@email.com',        perfiles:['Cliente','Barbero','Dueño'],     estado:'Inactivo',  fecha:'01 mar 2025', turnos:2   },
];

function buildPill(estado) {
  var cls = estado === 'Activo' ? 'pill-activo' : estado === 'Pendiente' ? 'pill-pendiente' : 'pill-inactivo';
  return '<span class="pill ' + cls + '"><span class="pill-dot"></span>' + estado + '</span>';
}

function buildPerfilTags(perfiles) {
  var shown = perfiles.slice(0, 2);
  var extra = perfiles.length - 2;
  var html  = shown.map(function(p) {
    return '<span class="ptag">' + p + '</span>';
  }).join('');
  if (extra > 0) {
    html += '<span class="ptag ptag-more">+' + extra + ' más</span>';
  }
  return '<div class="ptag-wrap">' + html + '</div>';
}

var ICON_EDIT    = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>';
var ICON_DISABLE = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>';

function renderTable(data) {
  var tbody = document.getElementById('tableBody');
  var info  = document.getElementById('pgInfo');

  if (!data.length) {
    tbody.innerHTML = '<tr><td colspan="6" style="text-align:center;padding:32px;color:var(--ink-mute)">Sin resultados</td></tr>';
    info.textContent = 'Sin resultados';
    return;
  }

  var rows = data.map(function(u) {
    var globalIdx = USERS.indexOf(u);
    return (
      '<tr onclick="openDetail(' + globalIdx + ')">' +
        '<td>' +
          '<div class="user-cell">' +
            '<div class="t-avatar" style="background:' + u.bg + '">' + u.i + '</div>' +
            '<div>' +
              '<div class="t-name">' + u.name + '</div>' +
              '<div class="t-email">' + u.email + '</div>' +
            '</div>' +
          '</div>' +
        '</td>' +
        '<td>' + buildPerfilTags(u.perfiles) + '</td>' +
        '<td>' + buildPill(u.estado) + '</td>' +
        '<td class="t-secondary">' + u.fecha + '</td>' +
        '<td class="t-mono">' + u.turnos + '</td>' +
        '<td>' +
          '<div class="act-wrap">' +
            '<button class="act-btn" title="Editar" onclick="event.stopPropagation();openEditModal(' + globalIdx + ')">' + ICON_EDIT + '</button>' +
            '<button class="act-btn act-danger" title="Deshabilitar" onclick="event.stopPropagation()">' + ICON_DISABLE + '</button>' +
          '</div>' +
        '</td>' +
      '</tr>'
    );
  });

  tbody.innerHTML = rows.join('');
  info.textContent = 'Mostrando ' + data.length + ' de ' + USERS.length + ' usuarios';
}

function filterTable() {
  var q      = document.getElementById('searchInput').value.toLowerCase();
  var perfil = document.getElementById('filterPerfil').value;
  var estado = document.getElementById('filterEstado').value;

  var filtered = USERS.filter(function(u) {
    var matchQ = !q      || u.name.toLowerCase().indexOf(q) !== -1 || u.email.toLowerCase().indexOf(q) !== -1;
    var matchP = !perfil || u.perfiles.indexOf(perfil) !== -1;
    var matchE = !estado || u.estado === estado;
    return matchQ && matchP && matchE;
  });

  renderTable(filtered);
}

document.getElementById('searchInput').addEventListener('input', filterTable);
document.getElementById('filterPerfil').addEventListener('change', filterTable);
document.getElementById('filterEstado').addEventListener('change', filterTable);

function openDetail(idx) {
  var u = USERS[idx];
  var btnLabel = u.estado === 'Inactivo' ? 'Habilitar usuario' : 'Deshabilitar usuario';
  var btnCls   = u.estado === 'Inactivo' ? 'btn btn-blue btn-sm btn-full' : 'btn btn-danger btn-sm btn-full';
  var perfilDetail = u.perfiles.map(function(p) {
    return '<span class="ptag">' + p + '</span>';
  }).join('');

  document.getElementById('detailBody').innerHTML =
    '<div class="detail-user-top">' +
      '<div class="d-avatar" style="background:' + u.bg + '">' + u.i + '</div>' +
      '<div class="d-name">' + u.name + '</div>' +
      '<div class="d-status">' + buildPill(u.estado) + '</div>' +
    '</div>' +
    '<div class="detail-fields">' +
      '<div><div class="d-field-label">Correo electrónico</div><div class="d-field-value">' + u.email + '</div></div>' +
      '<div><div class="d-field-label">Perfiles</div><div class="d-field-value" style="margin-top:4px"><div class="ptag-wrap">' + perfilDetail + '</div></div></div>' +
      '<div><div class="d-field-label">Fecha de alta</div><div class="d-field-value">' + u.fecha + '</div></div>' +
      '<div><div class="d-field-label">Turnos realizados</div><div class="d-field-value">' + u.turnos + '</div></div>' +
    '</div>' +
    '<div class="detail-actions">' +
      '<button class="btn btn-dark btn-sm btn-full">Editar datos</button>' +
      '<button class="btn btn-outline btn-sm btn-full">Cambiar perfil</button>' +
      '<button class="' + btnCls + '">' + btnLabel + '</button>' +
    '</div>';

  document.getElementById('detailPanel').classList.add('open');
  document.getElementById('detailOverlay').classList.add('open');
}

function closeDetail() {
  document.getElementById('detailPanel').classList.remove('open');
  document.getElementById('detailOverlay').classList.remove('open');
}

function openModal() {
  document.getElementById('modalOverlay').classList.add('open');
}

function closeModal() {
  document.getElementById('modalOverlay').classList.remove('open');
}

document.getElementById('modalOverlay').addEventListener('click', function(e) {
  if (e.target === this) closeModal();
});

function openEditModal(idx) {
  var u = USERS[idx];
  var parts = u.name.split(' ');
  document.getElementById('editNombre').value   = parts[0] || '';
  document.getElementById('editApellido').value  = parts.slice(1).join(' ') || '';
  document.getElementById('editEmail').value     = u.email;
  document.getElementById('editCelular').value   = '';
  document.getElementById('editFechaNac').value  = '';
  document.getElementById('editModalTitle').textContent = 'Editar usuario: ' + u.name;
  document.getElementById('editModalOverlay').classList.add('open');
}

function closeEditModal() {
  document.getElementById('editModalOverlay').classList.remove('open');
}

document.getElementById('editModalOverlay').addEventListener('click', function(e) {
  if (e.target === this) closeEditModal();
});

renderTable(USERS);
</script>

</body>
</html>
