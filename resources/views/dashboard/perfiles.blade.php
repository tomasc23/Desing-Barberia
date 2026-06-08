<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfiles y permisos — Barber Brizu</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --paper:      oklch(98.5% 0.004 240);
      --paper-2:    oklch(96.5% 0.006 240);
      --ink:        oklch(16%   0.01  240);
      --ink-soft:   oklch(35%   0.012 240);
      --ink-mute:   oklch(52%   0.012 240);
      --rule:       oklch(89%   0.008 240);
      --blue-50:    oklch(94%   0.035 240);
      --blue-100:   oklch(87%   0.07  240);
      --blue-400:   oklch(56%   0.155 250);
      --blue-600:   oklch(40%   0.17  252);
      --gold:       oklch(80%   0.15  85);
      --gold-soft:  oklch(92%   0.08  88);
      --gold-deep:  oklch(58%   0.14  75);
      --red:        oklch(72%   0.16  22);
      --red-soft:   oklch(93%   0.045 22);
      --red-deep:   oklch(50%   0.17  22);
      --green:      oklch(70%   0.15  145);
      --green-soft: oklch(94%   0.06  145);
      --green-deep: oklch(42%   0.14  145);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Outfit', -apple-system, sans-serif;
      font-size: 14px; line-height: 1.5;
      color: var(--ink); background: var(--paper-2);
    }

    /* ─── LAYOUT ─────────────────────────────── */
    .layout { display: flex; min-height: 100vh; }

    /* ─── SIDEBAR ────────────────────────────── */
    .sidebar {
      width: 230px; height: 100vh;
      position: fixed; left: 0; top: 0;
      background: var(--paper);
      border-right: 1px solid var(--rule);
      display: flex; flex-direction: column;
      z-index: 20; overflow: hidden;
    }
    .sidebar-logo {
      height: 60px; padding: 0 16px;
      border-bottom: 1px solid var(--rule);
      display: flex; align-items: center; gap: 10px; flex-shrink: 0;
    }
    .logo-mark {
      width: 33px; height: 33px; border-radius: 9px;
      background: var(--blue-600); color: var(--paper);
      display: grid; place-items: center;
      font-weight: 700; font-size: 12px; letter-spacing: 0.04em; flex-shrink: 0;
    }
    .logo-name { font-weight: 600; font-size: 13.5px; letter-spacing: -0.01em; line-height: 1.2; }
    .logo-sub  { font-size: 11px; color: var(--ink-mute); margin-top: 1px; }
    .sidebar-nav { flex: 1; overflow-y: auto; padding: 6px 8px; scrollbar-width: none; }
    .sidebar-nav::-webkit-scrollbar { display: none; }
    .nav-group { margin-bottom: 2px; }
    .nav-group-label {
      font-size: 10px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.1em;
      color: var(--ink-mute); padding: 10px 9px 4px;
    }
    .nav-link {
      display: flex; align-items: center; gap: 8px;
      padding: 7px 10px; border-radius: 8px;
      color: var(--ink-soft); font-size: 13px; font-weight: 500;
      cursor: pointer; text-decoration: none;
      transition: background 0.12s, color 0.12s; white-space: nowrap;
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
      width: 32px; height: 32px; border-radius: 50%;
      background: var(--blue-600); color: var(--paper);
      display: grid; place-items: center;
      font-size: 11px; font-weight: 700; flex-shrink: 0;
    }
    .s-user-name { font-size: 13px; font-weight: 600; line-height: 1.2; }
    .s-user-role { font-size: 11px; color: var(--ink-mute); }

    /* ─── MAIN AREA ──────────────────────────── */
    .main-area {
      margin-left: 230px; min-height: 100vh;
      display: flex; flex-direction: column;
      flex: 1; min-width: 0; width: calc(100% - 230px);
    }

    /* ─── TOPBAR ─────────────────────────────── */
    .topbar {
      position: fixed; top: 0; left: 230px; right: 0; height: 60px;
      background: oklch(98.5% 0.004 240 / 0.92);
      backdrop-filter: blur(8px); border-bottom: 1px solid var(--rule);
      display: flex; align-items: center; justify-content: space-between;
      padding: 0 26px; z-index: 10;
    }
    .topbar-title h1 { font-size: 16px; font-weight: 600; letter-spacing: -0.01em; line-height: 1.2; }
    .breadcrumb { font-size: 11.5px; color: var(--ink-mute); margin-top: 1px; }
    .topbar-actions { display: flex; gap: 9px; align-items: center; }

    /* ─── BUTTONS ────────────────────────────── */
    .btn {
      padding: 8px 15px; border-radius: 9px;
      font-size: 13.5px; font-weight: 500;
      font-family: inherit; cursor: pointer; border: none;
      display: inline-flex; align-items: center; gap: 7px;
      transition: opacity 0.12s; line-height: 1; text-decoration: none;
    }
    .btn:hover { opacity: 0.78; }
    .btn-outline { background: transparent; color: var(--ink); border: 1px solid var(--rule); }
    .btn-dark    { background: var(--ink); color: var(--paper); }
    .btn-gold    { background: var(--gold); color: var(--ink); font-weight: 600; border: none; }
    .btn-gold:hover { opacity: 0.85; }
    .btn-blue    { background: var(--blue-50); color: var(--blue-600); border: 1px solid var(--blue-100); }
    .btn-danger  { background: var(--red-soft); color: var(--red-deep); border: 1px solid oklch(87% 0.05 22); }
    .btn-logout  { color: var(--red-deep); border-color: oklch(86% 0.06 22); }
    .btn-logout:hover { background: var(--red-soft); opacity: 1; }
    .btn-sm      { padding: 7px 13px; font-size: 12.5px; border-radius: 8px; }
    .btn-full    { width: 100%; justify-content: center; }
    .close-btn {
      width: 28px; height: 28px; border-radius: 7px;
      border: 1px solid var(--rule); background: transparent;
      display: grid; place-items: center; cursor: pointer;
      font-size: 18px; color: var(--ink-mute); font-family: inherit;
    }
    .close-btn:hover { background: var(--paper-2); }

    /* ─── CONTENT ────────────────────────────── */
    .content {
      padding: 80px 26px 40px;
      display: flex; flex-direction: column; gap: 0;
    }

    /* ─── TABS ───────────────────────────────── */
    .tabs-bar {
      display: flex; gap: 0;
      border-bottom: 1px solid var(--rule);
      margin-bottom: 20px;
    }
    .tab-btn {
      padding: 11px 20px; font-size: 13.5px; font-weight: 500;
      color: var(--ink-mute); border: none; background: transparent;
      cursor: pointer; border-bottom: 2px solid transparent;
      margin-bottom: -1px; transition: color 0.12s, border-color 0.12s;
      font-family: inherit;
    }
    .tab-btn:hover { color: var(--ink); }
    .tab-btn.active { color: var(--blue-600); border-bottom-color: var(--blue-600); font-weight: 600; }
    .tab-panel { display: none; flex-direction: column; gap: 16px; }
    .tab-panel.active { display: flex; }

    /* ─── SECTION HEADER ─────────────────────── */
    .section-header {
      display: flex; align-items: flex-end;
      justify-content: space-between; padding-bottom: 4px;
    }
    .section-title { font-size: 19px; font-weight: 600; letter-spacing: -0.01em; line-height: 1.2; }
    .section-sub   { font-size: 12.5px; color: var(--ink-mute); margin-top: 3px; }

    /* ─── TABLE CARD ─────────────────────────── */
    .table-card {
      background: var(--paper); border: 1px solid var(--rule);
      border-radius: 14px; overflow: hidden;
    }
    table { width: 100%; border-collapse: collapse; }
    thead th {
      padding: 11px 16px; text-align: left;
      font-size: 10.5px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.08em;
      color: var(--ink-mute); border-bottom: 1px solid var(--rule);
      white-space: nowrap;
    }
    tbody tr { border-bottom: 1px solid var(--rule); transition: background 0.1s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: var(--paper-2); }
    tbody td { padding: 12px 16px; vertical-align: middle; }
    .t-name     { font-size: 13.5px; font-weight: 500; }
    .t-desc     { font-size: 12.5px; color: var(--ink-mute); margin-top: 1px; }
    .t-secondary{ font-size: 13px; color: var(--ink-soft); }
    .t-count    { font-size: 13px; font-weight: 600; color: var(--ink); }
    .user-cell  { display: flex; align-items: center; gap: 10px; }
    .t-avatar   {
      width: 31px; height: 31px; border-radius: 50%;
      display: grid; place-items: center;
      font-size: 10.5px; font-weight: 700;
      flex-shrink: 0; color: var(--paper);
    }
    .t-email    { font-size: 12px; color: var(--ink-mute); }

    /* ─── PILLS ──────────────────────────────── */
    .pill {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 4px 10px; border-radius: 999px;
      font-size: 12px; font-weight: 500;
    }
    .pill-dot  { width: 5px; height: 5px; border-radius: 50%; }
    .pill-activo   { background: var(--green-soft); color: var(--green-deep); }
    .pill-activo   .pill-dot { background: var(--green); }
    .pill-inactivo { background: var(--paper-2); color: var(--ink-mute); }
    .pill-inactivo  .pill-dot { background: var(--ink-mute); }

    /* ─── PROFILE TAGS ───────────────────────── */
    .ptag-wrap { display: flex; gap: 4px; flex-wrap: wrap; align-items: center; }
    .ptag {
      display: inline-flex; align-items: center;
      padding: 3px 9px; border-radius: 5px;
      font-size: 11.5px; font-weight: 500;
      background: var(--blue-50); color: var(--blue-600);
      border: 1px solid var(--blue-100); white-space: nowrap; line-height: 1.5;
    }
    .ptag-more { background: var(--paper-2); color: var(--ink-mute); border-color: var(--rule); }

    /* ─── ACTION BUTTONS ─────────────────────── */
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

    /* ─── TOOLTIP ────────────────────────────── */
    .has-tip { position: relative; }
    .tip {
      position: absolute; bottom: calc(100% + 7px); left: 50%;
      transform: translateX(-50%);
      background: var(--ink); color: var(--paper);
      font-size: 11.5px; padding: 6px 10px;
      border-radius: 7px; white-space: nowrap;
      opacity: 0; pointer-events: none;
      transition: opacity 0.15s; z-index: 100;
    }
    .has-tip:hover .tip { opacity: 1; }

    /* ─── MODAL ──────────────────────────────── */
    .modal-overlay {
      position: fixed; inset: 0;
      background: oklch(16% 0.01 240 / 0.26);
      z-index: 50; display: grid; place-items: center;
      opacity: 0; pointer-events: none; transition: opacity 0.18s;
    }
    .modal-overlay.open { opacity: 1; pointer-events: all; }
    .modal {
      background: var(--paper); border: 1px solid var(--rule);
      border-radius: 18px; width: 540px; max-width: 96vw;
      max-height: 90vh; overflow-y: auto;
      transform: translateY(10px) scale(0.99);
      transition: transform 0.18s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .modal.modal-lg { width: 600px; }
    .modal-overlay.open .modal { transform: none; }
    .modal-hd {
      padding: 20px 22px 16px; border-bottom: 1px solid var(--rule);
      display: flex; align-items: center; justify-content: space-between;
      position: sticky; top: 0; background: var(--paper); z-index: 1;
    }
    .modal-hd-title { font-size: 16px; font-weight: 600; }
    .modal-bd { padding: 20px 22px; display: flex; flex-direction: column; gap: 16px; }
    .modal-ft {
      padding: 14px 22px 20px; border-top: 1px solid var(--rule);
      display: flex; justify-content: flex-end; gap: 9px;
      position: sticky; bottom: 0; background: var(--paper);
    }

    /* ─── FORM ───────────────────────────────── */
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
    .form-hint {
      font-size: 12px; color: var(--ink-mute);
      padding: 10px 14px; background: var(--paper-2);
      border: 1px solid var(--rule); border-radius: 8px; line-height: 1.5;
    }

    /* ─── TOGGLE SWITCH ──────────────────────── */
    .field-toggle { display: flex; align-items: center; gap: 12px; }
    .field-toggle .form-label { margin: 0; cursor: pointer; }
    .sw { position: relative; display: inline-block; width: 38px; height: 21px; cursor: pointer; flex-shrink: 0; }
    .sw input { opacity: 0; width: 0; height: 0; position: absolute; }
    .sw-track {
      position: absolute; inset: 0;
      background: var(--rule); border-radius: 21px; transition: background 0.18s;
    }
    .sw-track::after {
      content: ''; position: absolute;
      width: 15px; height: 15px; top: 3px; left: 3px;
      background: white; border-radius: 50%; transition: transform 0.18s;
    }
    .sw input:checked ~ .sw-track { background: var(--green); }
    .sw input:checked ~ .sw-track::after { transform: translateX(17px); }

    /* ─── SECTION DIVIDER ────────────────────── */
    .modal-section-title {
      font-size: 11px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.1em;
      color: var(--ink-mute); padding-bottom: 10px;
      border-bottom: 1px solid var(--rule);
    }

    /* ─── MODULE CHECKLIST ───────────────────── */
    .mod-list { display: flex; flex-direction: column; gap: 5px; }
    .mod-item { border: 1px solid var(--rule); border-radius: 10px; overflow: hidden; }
    .mod-row {
      display: flex; align-items: center; gap: 10px;
      padding: 10px 14px; background: var(--paper);
      user-select: none; transition: background 0.1s;
    }
    .mod-row:hover { background: var(--paper-2); }
    .mod-check { width: 15px; height: 15px; cursor: pointer; accent-color: var(--blue-600); flex-shrink: 0; }
    .mod-label { font-size: 13px; font-weight: 500; flex: 1; cursor: pointer; }
    .mod-arrow {
      color: var(--ink-mute); font-size: 10px; transition: transform 0.15s;
      cursor: pointer; padding: 2px 4px; line-height: 1;
    }
    .mod-item.open .mod-arrow { transform: rotate(90deg); }
    .mod-perms {
      display: none; flex-wrap: wrap; gap: 8px 20px;
      padding: 8px 14px 12px 38px;
      background: var(--paper-2); border-top: 1px solid var(--rule);
    }
    .mod-item.open .mod-perms { display: flex; }
    .perm-item {
      display: flex; align-items: center; gap: 6px;
      font-size: 12.5px; color: var(--ink-soft); cursor: pointer;
    }
    .perm-item input { width: 13px; height: 13px; cursor: pointer; accent-color: var(--blue-600); }

    /* ─── FUNCIONALIDADES CHECKLIST ──────────── */
    .func-group { margin-bottom: 12px; }
    .func-group-title {
      font-size: 11px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.08em;
      color: var(--ink-mute); margin-bottom: 8px;
    }
    .func-list { display: flex; flex-wrap: wrap; gap: 8px 20px; }
    .func-item {
      display: flex; align-items: center; gap: 7px;
      font-size: 13px; color: var(--ink-soft); cursor: pointer;
    }
    .func-item input { width: 14px; height: 14px; cursor: pointer; accent-color: var(--blue-600); }

    /* ─── ASSIGN PROFILES MODAL ──────────────── */
    .assign-user-header {
      display: flex; align-items: center; gap: 12px;
      padding: 14px 16px; background: var(--paper-2);
      border: 1px solid var(--rule); border-radius: 10px;
    }
    .assign-user-av {
      width: 40px; height: 40px; border-radius: 50%;
      display: grid; place-items: center;
      font-size: 14px; font-weight: 700; color: var(--paper); flex-shrink: 0;
    }
    .assign-user-name { font-size: 14px; font-weight: 600; }
    .assign-user-email { font-size: 12px; color: var(--ink-mute); }
    .profile-check-list { display: flex; flex-direction: column; gap: 8px; }
    .profile-check-item {
      display: flex; align-items: center; gap: 12px;
      padding: 11px 14px; border: 1px solid var(--rule);
      border-radius: 10px; cursor: pointer; transition: background 0.1s;
    }
    .profile-check-item:hover { background: var(--paper-2); }
    .profile-check-item input { width: 15px; height: 15px; accent-color: var(--blue-600); cursor: pointer; flex-shrink: 0; }
    .profile-check-name { font-size: 13.5px; font-weight: 500; }
    .profile-check-desc { font-size: 12px; color: var(--ink-mute); margin-top: 1px; }

    /* ─── HAMBURGER ──────────────────────────── */
    .topbar-hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      background: none;
      border: 1px solid var(--rule);
      cursor: pointer;
      padding: 7px 9px;
      border-radius: 8px;
      margin-right: 4px;
    }
    .topbar-hamburger span {
      display: block;
      width: 18px;
      height: 2px;
      background: var(--ink);
      border-radius: 2px;
    }

    /* ─── SIDEBAR OVERLAY (mobile) ───────────── */
    .sidebar-overlay {
      display: none;
      position: fixed; inset: 0;
      background: oklch(16% 0.01 240 / 0.35);
      z-index: 19;
    }
    .sidebar-overlay.open { display: block; }

    /* ─── TABS MOBILE SELECT ─────────────────── */
    .tabs-select {
      display: none;
      width: 100%;
      padding: 9px 12px;
      border: 1px solid var(--rule);
      border-radius: 9px;
      font-family: inherit;
      font-size: 14px;
      color: var(--ink);
      background: var(--paper);
      outline: none;
      margin-bottom: 20px;
    }

    /* ─── MOBILE RESPONSIVE ──────────────────── */
    @media (max-width: 768px) {
      /* Sidebar: off-canvas */
      .sidebar {
        transform: translateX(-100%);
        transition: transform 0.22s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 20;
      }
      .sidebar.open { transform: translateX(0); }

      /* Main area: full width */
      .main-area { margin-left: 0 !important; width: 100% !important; }

      /* Topbar: full width */
      .topbar { left: 0 !important; padding: 0 14px !important; }
      .topbar-hamburger { display: flex; }

      /* Content */
      .content { padding: 72px 12px 32px !important; }

      /* Tabs → select */
      .tabs-bar    { display: none; }
      .tabs-select { display: block; }

      /* Tables: scrollable */
      .table-card, .perfiles-table-wrap { overflow-x: auto; }
      table { min-width: 520px; }

      /* Modals: near full width */
      .modal { width: 95vw !important; max-width: 95vw !important; }
    }
  </style>
</head>
<body>

{{-- Sidebar overlay for mobile --}}
<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

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
        <a href="/dashboard/perfiles" class="nav-link active">
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
        <div class="nav-group-label">Análisis</div>
        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
          Reportes
        </a>
        <a href="#" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
          Promociones
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

  <!-- ══════════════ MAIN AREA ══════════════ -->
  <div class="main-area">

    <header class="topbar">
      <button class="topbar-hamburger" onclick="openSidebar()" aria-label="Abrir menú">
        <span></span><span></span><span></span>
      </button>
      <div class="topbar-title">
        <h1>Perfiles y permisos</h1>
        <div class="breadcrumb">Sistema &rarr; Gestión &rarr; Perfiles y permisos</div>
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

      <!-- TABS MOBILE SELECT -->
      <select class="tabs-select" id="tabsSelect" onchange="switchTabFromSelect(this.value)">
        <option value="perfiles">Perfiles</option>
        <option value="modulos">Módulos</option>
        <option value="asignar">Asignar perfiles a usuarios</option>
      </select>

      <!-- TABS -->
      <div class="tabs-bar">
        <button class="tab-btn active" data-tab="perfiles">Perfiles</button>
        <button class="tab-btn" data-tab="modulos">Módulos</button>
        <button class="tab-btn" data-tab="asignar">Asignar perfiles a usuarios</button>
      </div>

      <!-- ══ TAB 1: PERFILES ══ -->
      <div class="tab-panel active" id="tab-perfiles">
        <div class="section-header">
          <div>
            <div class="section-title">Perfiles</div>
            <div class="section-sub">Roles del sistema con sus módulos y permisos asignados</div>
          </div>
          <button class="btn btn-gold" onclick="openModal('modalNuevoPerfil')">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Nuevo perfil
          </button>
        </div>

        <div class="table-card">
          <table>
            <thead>
              <tr>
                <th>Nombre del perfil</th>
                <th>Descripción</th>
                <th>Usuarios asignados</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="tbPerfiles"></tbody>
          </table>
        </div>
      </div>

      <!-- ══ TAB 2: MÓDULOS ══ -->
      <div class="tab-panel" id="tab-modulos">
        <div class="section-header">
          <div>
            <div class="section-title">Módulos del sistema</div>
            <div class="section-sub">Agrupaciones funcionales con sus funcionalidades disponibles</div>
          </div>
          <button class="btn btn-gold" onclick="openModal('modalNuevoModulo')">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Nuevo módulo
          </button>
        </div>

        <div class="table-card">
          <table>
            <thead>
              <tr>
                <th>Módulo</th>
                <th>Descripción</th>
                <th>Funcionalidades</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="tbModulos"></tbody>
          </table>
        </div>
      </div>

      <!-- ══ TAB 3: ASIGNAR ══ -->
      <div class="tab-panel" id="tab-asignar">
        <div class="section-header">
          <div>
            <div class="section-title">Usuarios y sus perfiles</div>
            <div class="section-sub">Gestioná los perfiles asignados a cada usuario</div>
          </div>
        </div>

        <div class="table-card">
          <table>
            <thead>
              <tr>
                <th>Usuario</th>
                <th>Perfiles asignados</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="tbAsignar"></tbody>
          </table>
        </div>
      </div>

    </main>
  </div>
</div>

<!-- ══════════════ MODAL: NUEVO PERFIL ══════════════ -->
<div class="modal-overlay" id="modalNuevoPerfil">
  <div class="modal modal-lg">
    <div class="modal-hd">
      <span class="modal-hd-title">Nuevo perfil</span>
      <button class="close-btn" onclick="closeModal('modalNuevoPerfil')">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="form-row single">
        <div class="form-group">
          <label class="form-label">Nombre del perfil</label>
          <input type="text" class="form-input" placeholder="Ej. Barbero Senior">
        </div>
      </div>
      <div class="form-row single">
        <div class="form-group">
          <label class="form-label">Descripción</label>
          <input type="text" class="form-input" placeholder="Breve descripción del rol">
        </div>
      </div>
      <div class="field-toggle">
        <label class="sw" for="swNuevoPerfil">
          <input type="checkbox" id="swNuevoPerfil" checked>
          <span class="sw-track"></span>
        </label>
        <label class="form-label" for="swNuevoPerfil">Perfil activo</label>
      </div>

      <div class="modal-section-title">Módulos habilitados y permisos</div>

      <div class="mod-list" id="modListNuevoPerfil">
        <!-- generado por JS -->
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeModal('modalNuevoPerfil')">Cancelar</button>
      <button class="btn btn-gold">Crear perfil</button>
    </div>
  </div>
</div>

<!-- ══════════════ MODAL: NUEVO MÓDULO ══════════════ -->
<div class="modal-overlay" id="modalNuevoModulo">
  <div class="modal">
    <div class="modal-hd">
      <span class="modal-hd-title">Nuevo módulo</span>
      <button class="close-btn" onclick="closeModal('modalNuevoModulo')">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="form-row single">
        <div class="form-group">
          <label class="form-label">Nombre del módulo</label>
          <input type="text" class="form-input" placeholder="Ej. Inventario">
        </div>
      </div>
      <div class="form-row single">
        <div class="form-group">
          <label class="form-label">Descripción</label>
          <input type="text" class="form-input" placeholder="¿Qué gestiona este módulo?">
        </div>
      </div>
      <div class="field-toggle">
        <label class="sw" for="swNuevoModulo">
          <input type="checkbox" id="swNuevoModulo" checked>
          <span class="sw-track"></span>
        </label>
        <label class="form-label" for="swNuevoModulo">Módulo activo</label>
      </div>

      <div class="modal-section-title">Funcionalidades disponibles</div>

      <div class="func-group">
        <div class="func-group-title">Operaciones básicas</div>
        <div class="func-list">
          <label class="func-item"><input type="checkbox"> Ver listado</label>
          <label class="func-item"><input type="checkbox"> Crear registro</label>
          <label class="func-item"><input type="checkbox"> Editar registro</label>
          <label class="func-item"><input type="checkbox"> Deshabilitar registro</label>
        </div>
      </div>
      <div class="func-group">
        <div class="func-group-title">Operaciones avanzadas</div>
        <div class="func-list">
          <label class="func-item"><input type="checkbox"> Asignar elementos</label>
          <label class="func-item"><input type="checkbox"> Configurar permisos</label>
          <label class="func-item"><input type="checkbox"> Generar reportes</label>
          <label class="func-item"><input type="checkbox"> Exportar datos</label>
        </div>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeModal('modalNuevoModulo')">Cancelar</button>
      <button class="btn btn-gold">Crear módulo</button>
    </div>
  </div>
</div>

<!-- ══════════════ MODAL: GESTIONAR PERFILES ══════════════ -->
<div class="modal-overlay" id="modalAsignar">
  <div class="modal">
    <div class="modal-hd">
      <span class="modal-hd-title">Gestionar perfiles</span>
      <button class="close-btn" onclick="closeModal('modalAsignar')">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="assign-user-header" id="assignUserHeader">
        <!-- filled by JS -->
      </div>

      <div class="modal-section-title">Perfiles disponibles</div>
      <div class="profile-check-list" id="assignPerfilesList">
        <!-- filled by JS -->
      </div>

      <p class="form-hint">Los cambios se aplican de inmediato al próximo inicio de sesión del usuario.</p>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeModal('modalAsignar')">Cancelar</button>
      <button class="btn btn-gold">Guardar cambios</button>
    </div>
  </div>
</div>

<script>
/* ── DATA ─────────────────────────────────────── */
var PERFILES = [
  { nombre: 'Dueño',         desc: 'Acceso completo al sistema',       usuarios: 1, estado: 'Activo' },
  { nombre: 'Barbero',       desc: 'Atención de turnos y agenda',       usuarios: 3, estado: 'Activo' },
  { nombre: 'Recepcionista', desc: 'Gestión de turnos y clientes',      usuarios: 1, estado: 'Activo' },
  { nombre: 'Cliente',       desc: 'Acceso público y reservas',         usuarios: 8, estado: 'Activo' },
];

var MODULOS = [
  { nombre: 'Usuarios',            desc: 'Gestión de usuarios del sistema',        funcs: 4,  estado: 'Activo' },
  { nombre: 'Perfiles y permisos', desc: 'Gestión de perfiles y accesos',          funcs: 5,  estado: 'Activo' },
  { nombre: 'Agenda',              desc: 'Gestión de agenda y horarios',            funcs: 4,  estado: 'Activo' },
  { nombre: 'Turnos',              desc: 'Gestión de turnos y reservas',            funcs: 6,  estado: 'Activo' },
  { nombre: 'Servicios',           desc: 'ABM de servicios',                        funcs: 4,  estado: 'Activo' },
  { nombre: 'Clientes',            desc: 'Información de clientes',                 funcs: 3,  estado: 'Activo' },
  { nombre: 'Cobros',              desc: 'Registro de cobros',                      funcs: 4,  estado: 'Activo' },
  { nombre: 'Adelantos',           desc: 'Adelantos y movimientos',                 funcs: 3,  estado: 'Activo' },
  { nombre: 'Consumibles',         desc: 'Ventas internas',                         funcs: 4,  estado: 'Activo' },
  { nombre: 'Cierres económicos',  desc: 'Cierres semanales y mensuales',           funcs: 4,  estado: 'Activo' },
  { nombre: 'Reportes',            desc: 'Reportes y estadísticas',                 funcs: 5,  estado: 'Activo' },
  { nombre: 'Promociones',         desc: 'Gestión de promociones',                  funcs: 4,  estado: 'Activo' },
];

var USERS = [
  { i:'RB', bg:'oklch(40% 0.17 252)', name:'Rodrigo Brizu',   email:'rodrigo@barberbrizu.com',  perfiles:['Dueño','Barbero']          },
  { i:'CM', bg:'oklch(45% 0.14 145)', name:'Carlos Medina',    email:'carlos@barberbrizu.com',   perfiles:['Barbero']                  },
  { i:'FT', bg:'oklch(50% 0.14 25)',  name:'Facundo Torres',   email:'facundo@barberbrizu.com',  perfiles:['Barbero']                  },
  { i:'AR', bg:'oklch(52% 0.13 85)',  name:'Agustín Romero',   email:'agustin@barberbrizu.com',  perfiles:['Barbero','Recepcionista']  },
  { i:'LS', bg:'oklch(46% 0.12 290)', name:'Laura Sánchez',    email:'laura@barberbrizu.com',    perfiles:['Recepcionista']            },
  { i:'MG', bg:'oklch(50% 0.13 340)', name:'Martina Gómez',    email:'martina@email.com',        perfiles:['Cliente']                  },
  { i:'VL', bg:'oklch(52% 0.12 210)', name:'Valentina López',  email:'valentina@email.com',      perfiles:['Cliente']                  },
  { i:'IR', bg:'oklch(52% 0.08 240)', name:'Ignacio Ríos',     email:'ignacio@email.com',        perfiles:['Cliente','Barbero','Dueño']},
];

var MODULO_PERMISOS = {
  'Usuarios':            ['Ver', 'Crear', 'Editar', 'Deshabilitar'],
  'Perfiles y permisos': ['Ver', 'Crear', 'Editar', 'Deshabilitar', 'Asignar'],
  'Agenda':              ['Ver', 'Crear', 'Editar', 'Deshabilitar'],
  'Turnos':              ['Ver', 'Crear', 'Editar', 'Deshabilitar', 'Asignar', 'Exportar'],
  'Servicios':           ['Ver', 'Crear', 'Editar', 'Deshabilitar'],
  'Clientes':            ['Ver', 'Editar', 'Exportar'],
  'Cobros':              ['Ver', 'Crear', 'Editar', 'Exportar'],
  'Adelantos':           ['Ver', 'Crear', 'Deshabilitar'],
  'Consumibles':         ['Ver', 'Crear', 'Editar', 'Exportar'],
  'Cierres económicos':  ['Ver', 'Crear', 'Editar', 'Exportar'],
  'Reportes':            ['Ver', 'Generar', 'Exportar', 'Filtrar', 'Configurar'],
  'Promociones':         ['Ver', 'Crear', 'Editar', 'Deshabilitar'],
  'Configuración':       ['Ver', 'Editar'],
};

/* ── ICONS ────────────────────────────────────── */
var ICO_EDIT    = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>';
var ICO_DISABLE = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>';
var ICO_PEOPLE  = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>';

/* ── PILL BUILDER ─────────────────────────────── */
function buildPill(estado) {
  var cls = estado === 'Activo' ? 'pill-activo' : 'pill-inactivo';
  return '<span class="pill ' + cls + '"><span class="pill-dot"></span>' + estado + '</span>';
}

function buildPtags(perfiles) {
  var shown = perfiles.slice(0, 2);
  var extra = perfiles.length - 2;
  var html  = shown.map(function(p) { return '<span class="ptag">' + p + '</span>'; }).join('');
  if (extra > 0) html += '<span class="ptag ptag-more">+' + extra + ' más</span>';
  return '<div class="ptag-wrap">' + html + '</div>';
}

/* ── RENDER: PERFILES TABLE ───────────────────── */
function renderPerfiles() {
  var tbody = document.getElementById('tbPerfiles');
  tbody.innerHTML = PERFILES.map(function(p) {
    var hasUsers = p.usuarios > 0;
    var actBtn   = ICO_EDIT;
    var disBtn;
    if (hasUsers) {
      disBtn = '<span class="has-tip">' +
        '<button class="act-btn act-danger">' + ICO_DISABLE + '</button>' +
        '<span class="tip">Este perfil tiene usuarios asignados,<br>solo podés deshabilitarlo</span>' +
      '</span>';
    } else {
      disBtn = '<button class="act-btn act-danger">' + ICO_DISABLE + '</button>';
    }
    return (
      '<tr>' +
        '<td>' +
          '<div class="t-name">' + p.nombre + '</div>' +
        '</td>' +
        '<td class="t-secondary">' + p.desc + '</td>' +
        '<td><span class="t-count">' + p.usuarios + '</span> <span class="t-secondary">usuario' + (p.usuarios !== 1 ? 's' : '') + '</span></td>' +
        '<td>' + buildPill(p.estado) + '</td>' +
        '<td><div class="act-wrap">' +
          '<button class="act-btn" title="Editar">' + actBtn + '</button>' +
          disBtn +
        '</div></td>' +
      '</tr>'
    );
  }).join('');
}

/* ── RENDER: MÓDULOS TABLE ────────────────────── */
function renderModulos() {
  var tbody = document.getElementById('tbModulos');
  tbody.innerHTML = MODULOS.map(function(m) {
    return (
      '<tr>' +
        '<td><div class="t-name">' + m.nombre + '</div></td>' +
        '<td class="t-secondary">' + m.desc + '</td>' +
        '<td><span class="t-count">' + m.funcs + '</span> <span class="t-secondary">funcionalidades</span></td>' +
        '<td>' + buildPill(m.estado) + '</td>' +
        '<td><div class="act-wrap">' +
          '<button class="act-btn" title="Editar">' + ICO_EDIT + '</button>' +
          '<button class="act-btn act-danger" title="Deshabilitar">' + ICO_DISABLE + '</button>' +
        '</div></td>' +
      '</tr>'
    );
  }).join('');
}

/* ── RENDER: ASIGNAR TABLE ────────────────────── */
function renderAsignar() {
  var tbody = document.getElementById('tbAsignar');
  tbody.innerHTML = USERS.map(function(u, idx) {
    return (
      '<tr>' +
        '<td><div class="user-cell">' +
          '<div class="t-avatar" style="background:' + u.bg + '">' + u.i + '</div>' +
          '<div>' +
            '<div class="t-name">' + u.name + '</div>' +
            '<div class="t-email">' + u.email + '</div>' +
          '</div>' +
        '</div></td>' +
        '<td>' + buildPtags(u.perfiles) + '</td>' +
        '<td>' +
          '<button class="btn btn-outline btn-sm" onclick="openAssignModal(' + idx + ')">' +
            ICO_PEOPLE + ' Gestionar perfiles' +
          '</button>' +
        '</td>' +
      '</tr>'
    );
  }).join('');
}

/* ── MODULE CHECKLIST (Nuevo perfil modal) ──────── */
function buildModuleChecklist() {
  var container = document.getElementById('modListNuevoPerfil');
  var mods = Object.keys(MODULO_PERMISOS);
  container.innerHTML = mods.map(function(mod, idx) {
    var perms = MODULO_PERMISOS[mod];
    var permHtml = perms.map(function(p) {
      return '<label class="perm-item"><input type="checkbox"> ' + p + '</label>';
    }).join('');
    return (
      '<div class="mod-item" id="modItem' + idx + '">' +
        '<div class="mod-row">' +
          '<input class="mod-check" type="checkbox" id="modChk' + idx + '" onchange="toggleMod(' + idx + ', this.checked)">' +
          '<label class="mod-label" for="modChk' + idx + '">' + mod + '</label>' +
          '<span class="mod-arrow" onclick="toggleModExpand(' + idx + ')">&#9658;</span>' +
        '</div>' +
        '<div class="mod-perms">' + permHtml + '</div>' +
      '</div>'
    );
  }).join('');
}

function toggleMod(idx, checked) {
  var item = document.getElementById('modItem' + idx);
  if (checked) {
    item.classList.add('open');
  } else {
    item.classList.remove('open');
    item.querySelectorAll('input[type="checkbox"]').forEach(function(cb) {
      if (cb.id !== 'modChk' + idx) cb.checked = false;
    });
  }
}

function toggleModExpand(idx) {
  var item = document.getElementById('modItem' + idx);
  item.classList.toggle('open');
}

/* ── ASSIGN MODAL ─────────────────────────────── */
function openAssignModal(idx) {
  var u = USERS[idx];

  document.getElementById('assignUserHeader').innerHTML =
    '<div class="assign-user-av" style="background:' + u.bg + '">' + u.i + '</div>' +
    '<div>' +
      '<div class="assign-user-name">' + u.name + '</div>' +
      '<div class="assign-user-email">' + u.email + '</div>' +
    '</div>';

  document.getElementById('assignPerfilesList').innerHTML = PERFILES.map(function(p) {
    var checked = u.perfiles.indexOf(p.nombre) !== -1 ? ' checked' : '';
    return (
      '<label class="profile-check-item">' +
        '<input type="checkbox"' + checked + '>' +
        '<div>' +
          '<div class="profile-check-name">' + p.nombre + '</div>' +
          '<div class="profile-check-desc">' + p.desc + '</div>' +
        '</div>' +
      '</label>'
    );
  }).join('');

  openModal('modalAsignar');
}

/* ── MODAL HELPERS ────────────────────────────── */
function openModal(id) {
  document.getElementById(id).classList.add('open');
}
function closeModal(id) {
  document.getElementById(id).classList.remove('open');
}

document.querySelectorAll('.modal-overlay').forEach(function(overlay) {
  overlay.addEventListener('click', function(e) {
    if (e.target === this) closeModal(this.id);
  });
});

/* ── TABS ─────────────────────────────────────── */
document.querySelectorAll('.tab-btn').forEach(function(btn) {
  btn.addEventListener('click', function() {
    var tab = this.dataset.tab;
    document.querySelectorAll('.tab-btn').forEach(function(b) { b.classList.remove('active'); });
    document.querySelectorAll('.tab-panel').forEach(function(p) { p.classList.remove('active'); });
    this.classList.add('active');
    document.getElementById('tab-' + tab).classList.add('active');
  });
});

/* ── INIT ─────────────────────────────────────── */
renderPerfiles();
renderModulos();
renderAsignar();
buildModuleChecklist();

function switchTabFromSelect(tab) {
  document.querySelectorAll('.tab-btn').forEach(function(b) { b.classList.remove('active'); });
  document.querySelectorAll('.tab-panel').forEach(function(p) { p.classList.remove('active'); });
  var btn = document.querySelector('.tab-btn[data-tab="' + tab + '"]');
  if (btn) btn.classList.add('active');
  var panel = document.getElementById('tab-' + tab);
  if (panel) panel.classList.add('active');
}

function openSidebar() {
  document.querySelector('.sidebar').classList.add('open');
  document.getElementById('sidebarOverlay').classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeSidebar() {
  document.querySelector('.sidebar').classList.remove('open');
  document.getElementById('sidebarOverlay').classList.remove('open');
  document.body.style.overflow = '';
}
</script>

</body>
</html>
