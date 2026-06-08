<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turnos — Barber Brizu</title>
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
    .btn-dark    { background: var(--ink); color: var(--paper); }
    .btn-blue    { background: var(--blue-50); color: var(--blue-600); border: 1px solid var(--blue-100); }
    .btn-green   { background: var(--green-soft); color: var(--green-deep); border: 1px solid oklch(86% 0.07 145); }
    .btn-danger  { background: var(--red-soft); color: var(--red-deep); border: 1px solid oklch(87% 0.05 22); }
    .btn-muted   { background: var(--paper-2); color: var(--ink-mute); border: 1px solid var(--rule); }
    .btn-violet  { background: var(--violet-soft); color: var(--violet-deep); border: 1px solid oklch(84% 0.06 290); }
    .btn-sm      { padding: 6px 11px; font-size: 12px; border-radius: 7px; }
    .btn-xs      { padding: 4px 9px; font-size: 11.5px; border-radius: 6px; }
    .btn-full    { width: 100%; justify-content: center; }
    .btn-gold    { background: var(--gold); color: var(--ink); font-weight: 600; border: none; }
    .btn-gold:hover { opacity: 0.85; }
    .btn-logout  { color: var(--red-deep); border-color: oklch(86% 0.06 22); }
    .btn-logout:hover { background: var(--red-soft); opacity: 1; }
    .close-btn {
      width: 28px; height: 28px; border-radius: 7px; border: 1px solid var(--rule);
      background: transparent; display: grid; place-items: center; cursor: pointer;
      font-size: 18px; color: var(--ink-mute); line-height: 1; font-family: inherit;
    }
    .close-btn:hover { background: var(--paper-2); }

    /* ── CONTENT / LAYOUT ── */
    .content { padding: 80px 26px 40px; display: flex; flex-direction: column; gap: 16px; }
    .section-header {
      display: flex; align-items: flex-end; justify-content: space-between; padding-bottom: 4px;
    }
    .section-title { font-size: 19px; font-weight: 600; letter-spacing: -0.01em; line-height: 1.2; }
    .section-sub   { font-size: 12.5px; color: var(--ink-mute); margin-top: 3px; }

    /* ── TABS ── */
    .tabs-nav {
      display: flex; gap: 2px; background: var(--paper); border: 1px solid var(--rule);
      border-radius: 11px; padding: 4px; width: fit-content;
    }
    .tab-btn {
      padding: 7px 18px; border-radius: 8px; border: none; font-family: inherit;
      font-size: 13px; font-weight: 500; cursor: pointer; color: var(--ink-mute);
      background: transparent; transition: background 0.12s, color 0.12s;
    }
    .tab-btn.active { background: var(--blue-600); color: var(--paper); font-weight: 600; }
    .tab-pane { display: none; }
    .tab-pane.active { display: flex; flex-direction: column; gap: 16px; }

    /* ── STATS ── */
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
    .stat-card {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; padding: 18px 20px;
    }
    .stat-label { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.09em; color: var(--ink-mute); }
    .stat-value { font-size: 30px; font-weight: 600; letter-spacing: -0.025em; margin-top: 5px; line-height: 1; }
    .stat-sub   { font-size: 12px; color: var(--ink-mute); margin-top: 5px; }

    /* ── PILLS / STATE BADGES ── */
    .pill {
      display: inline-flex; align-items: center; gap: 5px; padding: 3px 10px; border-radius: 999px;
      font-size: 11.5px; font-weight: 600; white-space: nowrap;
    }
    .pill-dot { width: 5px; height: 5px; border-radius: 50%; }
    .pill-pendiente    { background: var(--gold-soft);   color: var(--gold-deep); }
    .pill-pendiente    .pill-dot { background: var(--gold); }
    .pill-confirmado   { background: var(--blue-50);     color: var(--blue-600); }
    .pill-confirmado   .pill-dot { background: var(--blue-400); }
    .pill-atendido-sc  { background: var(--green-soft);  color: var(--green-deep); }
    .pill-atendido-sc  .pill-dot { background: var(--green); }
    .pill-atendido-cob { background: oklch(88% 0.09 145); color: oklch(30% 0.14 145); }
    .pill-atendido-cob .pill-dot { background: oklch(42% 0.14 145); }
    .pill-cancelado    { background: var(--red-soft);    color: var(--red-deep); }
    .pill-cancelado    .pill-dot { background: var(--red); }
    .pill-noasistio    { background: var(--paper-2);     color: var(--ink-mute); }
    .pill-noasistio    .pill-dot { background: var(--ink-mute); }
    .pill-reprogramado { background: var(--violet-soft); color: var(--violet-deep); }
    .pill-reprogramado .pill-dot { background: var(--violet); }

    /* ── TURNO CARDS (Tab 1) ── */
    .turno-list { display: flex; flex-direction: column; gap: 8px; }
    .turno-card {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 12px;
      padding: 14px 16px; display: flex; align-items: center; gap: 14px;
      transition: box-shadow 0.12s;
    }
    .turno-card:hover { box-shadow: 0 2px 10px oklch(16% 0.01 240 / 0.06); }
    .turno-hora-big {
      font-size: 18px; font-weight: 700; letter-spacing: -0.025em;
      color: var(--ink); min-width: 52px; flex-shrink: 0; text-align: center;
    }
    .turno-divider { width: 1px; height: 44px; background: var(--rule); flex-shrink: 0; }
    .turno-cliente-av {
      width: 36px; height: 36px; border-radius: 50%;
      display: grid; place-items: center; font-size: 11px; font-weight: 700; color: var(--paper); flex-shrink: 0;
    }
    .turno-info { flex: 1; min-width: 0; }
    .turno-nombre   { font-size: 14px; font-weight: 600; line-height: 1.2; }
    .turno-barbero-line {
      font-size: 12px; font-weight: 500; margin-top: 2px;
    }
    .turno-servicio-line { font-size: 12.5px; color: var(--ink-mute); margin-top: 1px; }
    .turno-precio-line   { font-size: 12.5px; font-weight: 600; color: var(--ink-soft); margin-top: 1px; }
    .turno-right { display: flex; flex-direction: column; align-items: flex-end; gap: 7px; flex-shrink: 0; }
    .turno-acciones { display: flex; gap: 6px; flex-wrap: wrap; justify-content: flex-end; }

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
    .table-wrap { overflow-x: auto; }
    .table-card { background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; overflow: hidden; }
    table { width: 100%; border-collapse: collapse; min-width: 700px; }
    thead th {
      padding: 11px 16px; text-align: left; font-size: 10.5px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-mute);
      border-bottom: 1px solid var(--rule); white-space: nowrap;
    }
    tbody tr { border-bottom: 1px solid var(--rule); cursor: pointer; transition: background 0.1s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: var(--paper-2); }
    tbody td { padding: 12px 16px; vertical-align: middle; }
    .user-cell  { display: flex; align-items: center; gap: 10px; }
    .t-avatar { width: 31px; height: 31px; border-radius: 50%; display: grid; place-items: center; font-size: 10.5px; font-weight: 700; flex-shrink: 0; color: var(--paper); }
    .t-name  { font-size: 13.5px; font-weight: 500; }
    .t-email { font-size: 12px; color: var(--ink-mute); }
    .t-secondary { font-size: 13px; color: var(--ink-soft); }
    .t-quick { font-size: 11.5px; color: var(--ink-mute); font-style: italic; }
    .act-wrap { display: flex; gap: 5px; }
    .act-btn {
      width: 28px; height: 28px; border-radius: 7px; border: 1px solid var(--rule);
      background: transparent; color: var(--ink-mute); cursor: pointer;
      display: grid; place-items: center; transition: background 0.12s, color 0.12s, border-color 0.12s;
    }
    .act-btn:hover { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-100); }
    .act-btn.act-danger:hover { background: var(--red-soft); color: var(--red-deep); border-color: oklch(87% 0.05 22); }

    /* ── DETAIL PANEL ── */
    .detail-overlay {
      position: fixed; inset: 0; background: oklch(16% 0.01 240 / 0.1);
      z-index: 30; opacity: 0; pointer-events: none; transition: opacity 0.2s;
    }
    .detail-overlay.open { opacity: 1; pointer-events: all; }
    .detail-panel {
      position: fixed; top: 0; right: 0; width: 340px; height: 100vh;
      background: var(--paper); border-left: 1px solid var(--rule);
      z-index: 40; transform: translateX(100%);
      transition: transform 0.22s cubic-bezier(0.4, 0, 0.2, 1); display: flex; flex-direction: column;
    }
    .detail-panel.open { transform: translateX(0); }
    .detail-hd {
      padding: 18px 18px 14px; border-bottom: 1px solid var(--rule);
      display: flex; align-items: center; justify-content: space-between; flex-shrink: 0;
    }
    .detail-hd-title { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-mute); }
    .detail-body { flex: 1; overflow-y: auto; padding: 20px; }
    .detail-user-top {
      display: flex; flex-direction: column; align-items: center; text-align: center;
      padding-bottom: 18px; border-bottom: 1px solid var(--rule); margin-bottom: 18px;
    }
    .d-avatar { width: 54px; height: 54px; border-radius: 50%; display: grid; place-items: center; font-size: 18px; font-weight: 700; color: var(--paper); margin-bottom: 10px; }
    .d-name   { font-size: 17px; font-weight: 600; letter-spacing: -0.01em; }
    .d-status { margin-top: 8px; }
    .detail-fields { display: flex; flex-direction: column; gap: 13px; margin-bottom: 20px; }
    .d-field-label { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-mute); margin-bottom: 2px; }
    .d-field-value { font-size: 13.5px; color: var(--ink); }
    .d-badge-quick { display: inline-flex; align-items: center; padding: 3px 9px; border-radius: 6px; font-size: 11.5px; font-weight: 500; background: var(--paper-2); color: var(--ink-mute); border: 1px solid var(--rule); }
    .timeline { display: flex; flex-direction: column; gap: 0; }
    .tl-item { display: flex; gap: 10px; }
    .tl-left { display: flex; flex-direction: column; align-items: center; }
    .tl-dot  { width: 9px; height: 9px; border-radius: 50%; background: var(--blue-400); flex-shrink: 0; margin-top: 4px; }
    .tl-line { width: 1px; flex: 1; background: var(--rule); min-height: 16px; }
    .tl-item:last-child .tl-line { display: none; }
    .tl-content { padding-bottom: 14px; }
    .tl-label { font-size: 13px; font-weight: 600; }
    .tl-date  { font-size: 11.5px; color: var(--ink-mute); margin-top: 1px; }
    .detail-actions { display: flex; flex-direction: column; gap: 7px; padding-top: 18px; border-top: 1px solid var(--rule); }

    /* ── MODAL BASE ── */
    .modal-overlay {
      position: fixed; inset: 0; background: oklch(16% 0.01 240 / 0.26);
      z-index: 50; display: grid; place-items: center;
      opacity: 0; pointer-events: none; transition: opacity 0.18s;
    }
    .modal-overlay.open { opacity: 1; pointer-events: all; }
    .modal {
      background: var(--paper); border: 1px solid var(--rule);
      border-radius: 18px; width: 580px; max-width: 96vw; max-height: 92vh; overflow-y: auto;
      transform: translateY(10px) scale(0.99);
      transition: transform 0.18s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .modal-overlay.open .modal { transform: none; }
    .modal-hd {
      padding: 20px 22px 16px; border-bottom: 1px solid var(--rule);
      display: flex; align-items: center; justify-content: space-between;
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
    .form-row        { display: grid; grid-template-columns: 1fr 1fr; gap: 13px; }
    .form-row.single { grid-template-columns: 1fr; }
    .form-group      { display: flex; flex-direction: column; gap: 5px; }
    .form-label      { font-size: 12.5px; font-weight: 500; color: var(--ink-soft); }
    .form-input {
      padding: 9px 12px; border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13.5px; color: var(--ink); background: var(--paper);
      outline: none; width: 100%; transition: border-color 0.12s;
    }
    .form-input:focus { border-color: var(--blue-400); }
    .form-hint { font-size: 12px; color: var(--ink-mute); padding: 10px 14px; background: var(--paper-2); border: 1px solid var(--rule); border-radius: 8px; line-height: 1.5; }
    .form-warn { font-size: 12px; color: var(--red-deep); padding: 10px 14px; background: var(--red-soft); border: 1px solid oklch(87% 0.05 22); border-radius: 8px; line-height: 1.5; }
    .form-ok   { font-size: 12px; color: var(--green-deep); padding: 10px 14px; background: var(--green-soft); border: 1px solid oklch(86% 0.07 145); border-radius: 8px; line-height: 1.5; }

    /* ── MODAL SECTIONS (unified) ── */
    .modal-section { display: flex; flex-direction: column; gap: 11px; }
    .modal-section-label {
      font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.09em;
      color: var(--ink-mute); padding-bottom: 7px; border-bottom: 1px solid var(--rule);
    }

    /* ── PILL TOGGLE (cliente tipo) ── */
    .tipo-toggle { display: flex; gap: 6px; }
    .tipo-toggle-btn {
      flex: 1; padding: 9px 14px; border: 1.5px solid var(--rule); border-radius: 9px;
      font-family: inherit; font-size: 13px; font-weight: 500; cursor: pointer;
      background: var(--paper); color: var(--ink-mute); text-align: center;
      transition: background 0.12s, color 0.12s, border-color 0.12s;
    }
    .tipo-toggle-btn.active { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-600); font-weight: 600; }
    .tipo-toggle-btn:not(.active):hover { background: var(--paper-2); color: var(--ink); }

    /* ── SCROLLBAR PERSONALIZADA ── */
    .modal::-webkit-scrollbar,
    .detail-body::-webkit-scrollbar { width: 4px; }
    .modal::-webkit-scrollbar-track,
    .detail-body::-webkit-scrollbar-track { background: var(--paper-2); border-radius: 99px; }
    .modal::-webkit-scrollbar-thumb,
    .detail-body::-webkit-scrollbar-thumb { background: var(--rule); border-radius: 99px; }
    .modal::-webkit-scrollbar-thumb:hover,
    .detail-body::-webkit-scrollbar-thumb:hover { background: var(--ink-mute); }
    .modal { scrollbar-width: thin; scrollbar-color: var(--rule) var(--paper-2); }
    .detail-body { scrollbar-width: thin; scrollbar-color: var(--rule) var(--paper-2); }

    /* ── CLIENT SEARCH ── */
    .search-input-wrap { position: relative; }
    .search-input {
      width: 100%; padding: 9px 12px; border: 1px solid var(--rule); border-radius: 9px;
      font-family: inherit; font-size: 13px; color: var(--ink); background: var(--paper);
      outline: none; transition: border-color 0.12s;
    }
    .search-input:focus { border-color: var(--blue-400); }
    .search-dropdown {
      position: absolute; top: calc(100% + 4px); left: 0; right: 0;
      background: var(--paper); border: 1px solid var(--rule); border-radius: 10px;
      z-index: 100; overflow: hidden; box-shadow: 0 4px 16px oklch(16% 0.01 240 / 0.1); display: none;
    }
    .search-dropdown.open { display: block; }
    .search-result { padding: 9px 13px; font-size: 13px; cursor: pointer; transition: background 0.1s; border-bottom: 1px solid var(--rule); }
    .search-result:last-child { border-bottom: none; }
    .search-result:hover { background: var(--blue-50); }

    /* ── SERVICE CARDS (unified modal) ── */
    .service-cards-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
    .service-card-u {
      padding: 11px 14px; border: 1.5px solid var(--rule); border-radius: 10px;
      cursor: pointer; transition: all 0.12s; position: relative; background: var(--paper);
    }
    .service-card-u:hover { border-color: var(--blue-200); background: var(--blue-50); }
    .service-card-u.selected { border-color: var(--blue-600); background: var(--blue-50); }
    .service-card-u.selected::after {
      content: '✓'; position: absolute; top: 6px; right: 8px;
      font-size: 11px; font-weight: 700; color: var(--gold-deep);
    }
    .service-card-name  { font-size: 13px; font-weight: 600; }
    .service-card-price { font-size: 12px; color: var(--ink-mute); margin-top: 2px; }
    .service-summary-line {
      font-size: 12.5px; color: var(--ink-soft); padding: 8px 12px;
      background: var(--paper-2); border: 1px solid var(--rule); border-radius: 8px;
    }

    /* ── BARBER CARDS (unified modal) ── */
    .barber-cards-modal { display: flex; gap: 8px; }
    .barber-card-m {
      flex: 1; padding: 12px 8px; border: 1.5px solid var(--rule); border-radius: 10px;
      cursor: pointer; transition: all 0.12s; text-align: center; background: var(--paper);
    }
    .barber-card-m:hover { background: var(--blue-50); border-color: var(--blue-200); }
    .barber-card-m.selected.carlos  { border-color: var(--blue-600); background: var(--blue-50); }
    .barber-card-m.selected.facundo { border-color: oklch(35% 0.12 180); background: oklch(93% 0.05 180); }
    .barber-card-m.selected.agustin { border-color: oklch(36% 0.13 290); background: oklch(93% 0.05 290); }
    .barber-card-m-av {
      width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center;
      justify-content: center; font-size: 12px; font-weight: 700; color: white; margin: 0 auto 6px;
    }
    .barber-card-m-av.carlos  { background: var(--blue-600); }
    .barber-card-m-av.facundo { background: oklch(35% 0.12 180); }
    .barber-card-m-av.agustin { background: oklch(36% 0.13 290); }
    .barber-card-m-name { font-size: 11.5px; font-weight: 600; line-height: 1.3; }

    /* ── CAL WIDGET (unified modal) ── */
    .cal-widget { border: 1px solid var(--rule); border-radius: 12px; overflow: hidden; max-width: 280px; margin: 0 auto; }
    .cal-widget-hd {
      display: flex; align-items: center; justify-content: space-between;
      padding: 8px 12px; border-bottom: 1px solid var(--rule); background: var(--paper-2);
    }
    .cal-widget-month { font-size: 13px; font-weight: 600; }
    .cal-widget-nav {
      width: 26px; height: 26px; border-radius: 7px; border: 1px solid var(--rule);
      background: var(--paper); cursor: pointer; display: grid; place-items: center;
      font-size: 13px; color: var(--ink-soft); font-family: inherit; transition: background 0.12s;
    }
    .cal-widget-nav:hover { background: var(--blue-50); }
    .cal-widget-body { padding: 8px; }
    .cal-dow-row  { display: grid; grid-template-columns: repeat(6, 1fr); margin-bottom: 2px; }
    .cal-dow      { text-align: center; font-size: 10px; font-weight: 600; color: var(--ink-mute); padding: 3px 2px; }
    .cal-days-grid{ display: grid; grid-template-columns: repeat(6, 1fr); gap: 2px; }
    .cal-day-btn {
      width: 32px; height: 32px; border: 1.5px solid transparent; border-radius: 7px;
      background: transparent; font-family: inherit; font-size: 12px; font-weight: 500;
      cursor: pointer; display: grid; place-items: center; transition: all 0.1s; color: var(--ink); margin: 0 auto;
    }
    .cal-day-btn:hover:not(:disabled) { background: var(--blue-50); border-color: var(--blue-100); }
    .cal-day-btn.today:not(.selected) { border-style: dashed; border-color: var(--blue-600); }
    .cal-day-btn.selected { background: var(--blue-600); color: white; border-color: var(--blue-600); border-style: solid; }
    .cal-day-btn:disabled { color: oklch(75% 0.005 240); cursor: default; text-decoration: line-through; }

    /* ── TIME SLOTS (unified modal) ── */
    .time-slots-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 6px; margin-top: 8px; }
    .time-slot-btn {
      padding: 8px 4px; border: 1px solid var(--rule); border-radius: 8px;
      background: var(--paper); font-family: inherit; font-size: 12px; font-weight: 500;
      cursor: pointer; text-align: center; transition: all 0.1s; color: var(--ink);
    }
    .time-slot-btn:hover:not(.occupied):not(.selected) { background: var(--blue-50); border-color: var(--blue-200); }
    .time-slot-btn.occupied { background: oklch(94% 0.005 240); color: var(--ink-mute); cursor: default; font-style: italic; }
    .time-slot-btn.selected { background: var(--blue-600); color: white; border-color: var(--blue-600); }

    /* ── RESUMEN CARD (unified modal) ── */
    .resumen-card {
      background: var(--paper-2); border: 1px solid var(--rule); border-radius: 10px;
      padding: 14px 16px; display: flex; flex-direction: column; gap: 9px;
    }
    .resumen-row { display: flex; justify-content: space-between; align-items: baseline; }
    .resumen-label { font-size: 12px; color: var(--ink-mute); }
    .resumen-value { font-size: 13px; font-weight: 500; text-align: right; }
    .resumen-total { border-top: 1px solid var(--rule); padding-top: 9px; }
    .resumen-total .resumen-label { font-size: 13px; font-weight: 600; color: var(--ink); }
    .resumen-total .resumen-value { font-size: 16px; font-weight: 700; }

    /* ── COBRO MODAL ── */
    .cobro-service-list { display: flex; flex-direction: column; gap: 7px; }
    .cobro-svc-row { display: flex; justify-content: space-between; align-items: center; font-size: 13.5px; }
    .cobro-svc-name  { color: var(--ink); }
    .cobro-svc-price { font-weight: 600; color: var(--ink-soft); }
    .cobro-subtotal  { display: flex; justify-content: space-between; font-size: 13.5px; padding-top: 8px; border-top: 1px solid var(--rule); }
    .cobro-total-row { display: flex; justify-content: space-between; align-items: center; padding-top: 10px; border-top: 2px solid var(--rule); }
    .cobro-total-label { font-size: 15px; font-weight: 700; }
    .cobro-total-val   { font-size: 20px; font-weight: 700; color: var(--blue-600); }
    .pago-pills { display: flex; gap: 6px; }
    .pago-pill {
      flex: 1; padding: 9px 14px; border: 1.5px solid var(--rule); border-radius: 9px;
      font-family: inherit; font-size: 13px; font-weight: 500; cursor: pointer;
      background: var(--paper); color: var(--ink-mute); transition: all 0.12s; text-align: center;
    }
    .pago-pill.active { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-600); font-weight: 600; }

    /* ── STATUS PILLS (cambiar estado modal) ── */
    .status-pills { display: flex; gap: 7px; flex-wrap: wrap; }
    .status-pill {
      padding: 7px 14px; border-radius: 999px; border: 1.5px solid var(--rule);
      font-family: inherit; font-size: 12.5px; font-weight: 600;
      cursor: pointer; background: var(--paper); transition: all 0.12s;
    }
    .status-pill:hover { opacity: 0.8; }
    .status-pill[data-s="Confirmado"].sel  { background: var(--blue-50);     color: var(--blue-600);    border-color: var(--blue-400); }
    .status-pill[data-s="Cancelado"].sel   { background: var(--red-soft);    color: var(--red-deep);    border-color: var(--red); }
    .status-pill[data-s="No asistió"].sel  { background: var(--paper-2);     color: var(--ink-soft);    border-color: var(--ink-mute); }
    .status-pill[data-s="Reprogramado"].sel{ background: var(--violet-soft); color: var(--violet-deep); border-color: var(--violet); }

    /* ── TURNO SUMMARY BOX (modales) ── */
    .turno-summary-box {
      background: var(--paper-2); border: 1px solid var(--rule); border-radius: 10px;
      padding: 12px 16px; display: flex; gap: 12px; align-items: center;
    }
    .tsb-av { width: 36px; height: 36px; border-radius: 50%; display: grid; place-items: center; font-size: 12px; font-weight: 700; color: var(--paper); flex-shrink: 0; }
    .tsb-name { font-size: 13.5px; font-weight: 600; }
    .tsb-meta { font-size: 12px; color: var(--ink-mute); }

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
      .turno-card { flex-wrap: wrap; }
      .turno-right { width: 100%; flex-direction: row; flex-wrap: wrap; align-items: center; margin-top: 6px; padding-top: 10px; border-top: 1px solid var(--rule); }
      .turno-acciones { flex: 1; }
      .detail-panel { width: 100% !important; }
      .modal { width: 95vw !important; }
      .form-row { grid-template-columns: 1fr !important; }
      .barber-cards-modal { flex-wrap: wrap; }
      .service-cards-grid { grid-template-columns: 1fr; }
      .pago-pills { flex-wrap: wrap; }
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
        <a href="/dashboard/turnos" class="nav-link active">
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
        <h1>Gestión de turnos</h1>
        <div class="breadcrumb">Principal &rarr; Turnos</div>
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

      <div class="section-header">
        <div>
          <div class="section-title">Turnos</div>
          <div class="section-sub">Administrá y gestioná todos los turnos del local</div>
        </div>
        <button class="btn btn-gold" onclick="openNuevoTurno()">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
          Nuevo turno +
        </button>
      </div>

      <div class="tabs-nav">
        <button class="tab-btn active" onclick="switchTab('hoy', this)">Turnos de hoy</button>
        <button class="tab-btn" onclick="switchTab('todos', this)">Todos los turnos</button>
      </div>

      <!-- TAB 1: TURNOS DE HOY -->
      <div class="tab-pane active" id="tab-hoy">
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-label">Confirmados</div>
            <div class="stat-value" style="color:var(--blue-600)">4</div>
            <div class="stat-sub">listos para atender</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Atendidos</div>
            <div class="stat-value" style="color:var(--green-deep)">2</div>
            <div class="stat-sub">completados hoy</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Sin cobrar</div>
            <div class="stat-value" style="color:var(--gold-deep)">1</div>
            <div class="stat-sub">pendiente de cobro</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Cancelados</div>
            <div class="stat-value" style="color:var(--red-deep)">1</div>
            <div class="stat-sub">hoy</div>
          </div>
        </div>
        <div class="turno-list" id="turnoHoyList"></div>
      </div>

      <!-- TAB 2: TODOS LOS TURNOS -->
      <div class="tab-pane" id="tab-todos">
        <div class="toolbar">
          <div class="search-wrap">
            <svg class="search-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" id="searchCliente" class="tb-input" placeholder="Buscar por cliente...">
          </div>
          <select class="tb-select" id="filtFecha">
            <option value="">Todas las fechas</option>
            <option value="hoy">Hoy</option>
            <option value="semana">Esta semana</option>
            <option value="mes">Este mes</option>
          </select>
          <select class="tb-select" id="filtBarbero">
            <option value="">Todos los barberos</option>
            <option>Carlos Medina</option>
            <option>Facundo Torres</option>
            <option>Agustín Romero</option>
          </select>
          <select class="tb-select" id="filtEstado">
            <option value="">Todos los estados</option>
            <option>Confirmado</option>
            <option>Atendido sin cobrar</option>
            <option>Atendido y cobrado</option>
            <option>Cancelado</option>
            <option>No asistió</option>
            <option>Reprogramado</option>
            <option>Pendiente</option>
          </select>
          <button class="btn btn-outline btn-sm" onclick="clearFilters()">Limpiar filtros</button>
        </div>
        <div class="table-card table-wrap">
          <table>
            <thead>
              <tr>
                <th>Cliente</th>
                <th>Servicio/s</th>
                <th>Barbero</th>
                <th>Fecha y horario</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="turnosTableBody"></tbody>
          </table>
        </div>
      </div>

    </main>
  </div>
</div>

<!-- ══ DETAIL PANEL ══ -->
<div class="detail-overlay" id="detailOverlay" onclick="closeDetail()"></div>
<div class="detail-panel" id="detailPanel">
  <div class="detail-hd">
    <span class="detail-hd-title">Detalle del turno</span>
    <button class="close-btn" onclick="closeDetail()">&times;</button>
  </div>
  <div class="detail-body" id="detailBody"></div>
</div>

<!-- ══ MODAL NUEVO TURNO (unified) ══ -->
<div class="modal-overlay" id="nuevoTurnoOverlay">
  <div class="modal">
    <div class="modal-hd">
      <span class="modal-hd-title">Nuevo turno</span>
      <button class="close-btn" onclick="closeNuevoTurno()">&times;</button>
    </div>
    <div class="modal-bd">

      <!-- 1 · CLIENTE -->
      <div class="modal-section">
        <div class="modal-section-label">1 · Cliente</div>
        <div class="tipo-toggle">
          <button class="tipo-toggle-btn active" id="btnTipoRegistrado" onclick="setClienteTipo('registrado')">Cliente registrado</button>
          <button class="tipo-toggle-btn" id="btnTipoRapido" onclick="setClienteTipo('rapido')">Turno rápido</button>
        </div>
        <div id="secClienteRegistrado" style="transition:all 0.15s">
          <div class="form-group">
            <label class="form-label">Buscar cliente registrado</label>
            <div class="search-input-wrap">
              <input type="text" class="search-input" id="clienteSearch"
                placeholder="Buscar por nombre o email..." oninput="filterClientes()" autocomplete="off">
              <div class="search-dropdown" id="clienteDropdown"></div>
            </div>
          </div>
        </div>
        <div id="secClienteRapido" style="display:none">
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Nombre</label>
              <input type="text" class="form-input" id="clienteNombre" placeholder="Nombre" oninput="updateResumen()">
            </div>
            <div class="form-group">
              <label class="form-label">Apellido</label>
              <input type="text" class="form-input" id="clienteApellido" placeholder="Apellido" oninput="updateResumen()">
            </div>
          </div>
        </div>
      </div>

      <!-- 2 · SERVICIOS -->
      <div class="modal-section">
        <div class="modal-section-label">2 · Servicios</div>
        <div class="service-cards-grid">
          <div class="service-card-u" data-nombre="Corte" data-price="3500" onclick="toggleServiceModal(this)">
            <div class="service-card-name">Corte</div>
            <div class="service-card-price">$3.500</div>
          </div>
          <div class="service-card-u" data-nombre="Barba" data-price="2500" onclick="toggleServiceModal(this)">
            <div class="service-card-name">Barba</div>
            <div class="service-card-price">$2.500</div>
          </div>
          <div class="service-card-u" data-nombre="Cejas" data-price="1500" onclick="toggleServiceModal(this)">
            <div class="service-card-name">Cejas</div>
            <div class="service-card-price">$1.500</div>
          </div>
          <div class="service-card-u" data-nombre="Coloración" data-price="5000" onclick="toggleServiceModal(this)">
            <div class="service-card-name">Coloración</div>
            <div class="service-card-price">$5.000</div>
          </div>
        </div>
        <div class="service-summary-line" id="serviceSummaryLine">Sin servicios seleccionados</div>
      </div>

      <!-- 3 · BARBERO -->
      <div class="modal-section">
        <div class="modal-section-label">3 · Barbero</div>
        <div class="barber-cards-modal">
          <div class="barber-card-m carlos" onclick="selectBarberModal(this,'carlos')">
            <div class="barber-card-m-av carlos">CM</div>
            <div class="barber-card-m-name">Carlos Medina</div>
          </div>
          <div class="barber-card-m facundo" onclick="selectBarberModal(this,'facundo')">
            <div class="barber-card-m-av facundo">FT</div>
            <div class="barber-card-m-name">Facundo Torres</div>
          </div>
          <div class="barber-card-m agustin" onclick="selectBarberModal(this,'agustin')">
            <div class="barber-card-m-av agustin">AR</div>
            <div class="barber-card-m-name">Agustín Romero</div>
          </div>
        </div>
      </div>

      <!-- 4 · FECHA Y HORARIO -->
      <div class="modal-section">
        <div class="modal-section-label">4 · Fecha y horario</div>
        <div class="cal-widget">
          <div class="cal-widget-hd">
            <button class="cal-widget-nav" onclick="calWidgetNav(-1)">&#8592;</button>
            <span class="cal-widget-month" id="calWidgetMonth"></span>
            <button class="cal-widget-nav" onclick="calWidgetNav(1)">&#8594;</button>
          </div>
          <div class="cal-widget-body">
            <div class="cal-dow-row">
              <div class="cal-dow">L</div><div class="cal-dow">M</div><div class="cal-dow">M</div>
              <div class="cal-dow">J</div><div class="cal-dow">V</div><div class="cal-dow">S</div>
            </div>
            <div class="cal-days-grid" id="calDaysGrid"></div>
          </div>
        </div>
        <div id="timeSlotsWrap" style="display:none">
          <div style="font-size:12px;color:var(--ink-mute);margin-bottom:6px">Seleccioná un horario:</div>
          <div class="time-slots-grid" id="timeSlotsGrid"></div>
        </div>
      </div>

      <!-- 5 · RESUMEN -->
      <div class="modal-section" id="resumenSection" style="display:none">
        <div class="modal-section-label">5 · Resumen</div>
        <div class="resumen-card" id="resumenCard"></div>
      </div>

    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeNuevoTurno()">Cancelar</button>
      <button class="btn btn-gold" onclick="confirmarNuevoTurno()">Confirmar turno</button>
    </div>
  </div>
</div>

<!-- ══ MODAL COBRO ══ -->
<div class="modal-overlay" id="moCobroOverlay">
  <div class="modal" style="width:500px">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title">Registrar cobro</div>
        <div class="modal-hd-sub" id="cobroSubtitle"></div>
      </div>
      <button class="close-btn" onclick="closeCobro()">&times;</button>
    </div>
    <div class="modal-bd">

      <!-- Detalle -->
      <div class="modal-section">
        <div class="modal-section-label">Detalle del servicio</div>
        <div class="cobro-service-list" id="cobroServiceList"></div>
        <div class="cobro-subtotal" id="cobroSubtotalRow">
          <span style="color:var(--ink-mute)">Subtotal</span>
          <span id="cobroSubtotalVal" style="font-weight:600"></span>
        </div>
        <div class="form-group">
          <label class="form-label">Descuento $</label>
          <input type="number" class="form-input" id="cobroDescuento" value="0" min="0" oninput="recalcCobro()" style="width:160px">
        </div>
        <div class="cobro-total-row">
          <span class="cobro-total-label">Total</span>
          <span class="cobro-total-val" id="cobroTotalVal"></span>
        </div>
      </div>

      <!-- Medio de pago -->
      <div class="modal-section">
        <div class="modal-section-label">Medio de pago</div>
        <div class="pago-pills">
          <button class="pago-pill active" id="pagoEfectivo" onclick="setPago('efectivo')">Efectivo</button>
          <button class="pago-pill" id="pagoTransferencia" onclick="setPago('transferencia')">Transferencia</button>
          <button class="pago-pill" id="pagoMixto" onclick="setPago('mixto')">Pago mixto</button>
        </div>
        <div id="pagoMixtoFields" style="display:none">
          <div class="form-row" style="margin-top:10px">
            <div class="form-group">
              <label class="form-label">Monto efectivo $</label>
              <input type="number" class="form-input" id="montoEfectivo" value="0" min="0" oninput="checkMixto()">
            </div>
            <div class="form-group">
              <label class="form-label">Monto transferencia $</label>
              <input type="number" class="form-input" id="montoTransferencia" value="0" min="0" oninput="checkMixto()">
            </div>
          </div>
          <div id="mixtoFeedback" style="margin-top:6px"></div>
        </div>
      </div>

    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeCobro()">Cancelar</button>
      <button class="btn btn-gold" onclick="confirmarCobro()">Registrar cobro</button>
    </div>
  </div>
</div>

<!-- ══ MODAL REPROGRAMAR ══ -->
<div class="modal-overlay" id="moReprogramar">
  <div class="modal" style="width:460px">
    <div class="modal-hd">
      <span class="modal-hd-title">Reprogramar turno</span>
      <button class="close-btn" onclick="closeModalR('reprogramar')">&times;</button>
    </div>
    <div class="modal-bd">
      <div id="summaryReprogram"></div>
      <div class="form-group">
        <label class="form-label">Nueva fecha</label>
        <input type="date" class="form-input">
      </div>
      <div class="form-group">
        <label class="form-label">Nuevo horario</label>
        <input type="time" class="form-input">
      </div>
      <div class="form-hint">Se validará disponibilidad antes de confirmar.</div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeModalR('reprogramar')">Cancelar</button>
      <button class="btn btn-gold" onclick="confirmarReprogramar()">Confirmar reprogramación</button>
    </div>
  </div>
</div>

<!-- ══ MODAL CANCELAR ══ -->
<div class="modal-overlay" id="moCancelar">
  <div class="modal" style="width:420px">
    <div class="modal-hd">
      <span class="modal-hd-title">¿Cancelar este turno?</span>
      <button class="close-btn" onclick="closeModalR('cancelar')">&times;</button>
    </div>
    <div class="modal-bd">
      <div id="summaryCancelar"></div>
      <div class="form-group">
        <label class="form-label">Motivo de cancelación</label>
        <textarea class="form-input" rows="3" placeholder="Ej: Cliente no pudo asistir..." style="resize:vertical"></textarea>
      </div>
      <div class="form-warn">Esta acción no se puede deshacer.</div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeModalR('cancelar')">Volver</button>
      <button class="btn btn-danger" onclick="confirmarCancelar()">Sí, cancelar turno</button>
    </div>
  </div>
</div>

<script>
/* ─── CONSTANTES ─────────────────────────────── */
var SERVICES_DEF = [
  { nombre:'Corte',      precio:3500 },
  { nombre:'Barba',      precio:2500 },
  { nombre:'Cejas',      precio:1500 },
  { nombre:'Coloración', precio:5000 },
];

var BARBERS = [
  { key:'carlos',  label:'Carlos Medina',  initials:'CM', bg:'var(--blue-600)',         color:'var(--blue-600)' },
  { key:'facundo', label:'Facundo Torres', initials:'FT', bg:'oklch(35% 0.12 180)',     color:'oklch(35% 0.12 180)' },
  { key:'agustin', label:'Agustín Romero', initials:'AR', bg:'oklch(36% 0.13 290)',     color:'oklch(36% 0.13 290)' },
];

var BARBEROS = {
  'Carlos Medina':  { init:'CM', bg:'var(--blue-600)',       color:'var(--blue-600)' },
  'Facundo Torres': { init:'FT', bg:'oklch(35% 0.12 180)',   color:'oklch(35% 0.12 180)' },
  'Agustín Romero': { init:'AR', bg:'oklch(36% 0.13 290)',   color:'oklch(36% 0.13 290)' },
};

var CLIENTES_BG = [
  'oklch(50% 0.13 340)', 'oklch(52% 0.12 210)', 'oklch(46% 0.12 290)',
  'oklch(50% 0.13 180)', 'oklch(48% 0.13 60)',  'oklch(44% 0.14 320)',
  'oklch(52% 0.08 240)', 'oklch(50% 0.12 130)'
];

var CLIENTES_SAMPLE = [
  { id:1, nombre:'Martina Gómez',   email:'martina@email.com'   },
  { id:2, nombre:'Diego Flores',    email:'diego@email.com'     },
  { id:3, nombre:'Sofía Herrera',   email:'sofia@email.com'     },
  { id:4, nombre:'Nicolás Paz',     email:'nicolas@email.com'   },
  { id:5, nombre:'Valentina López', email:'valentina@email.com' },
];

var MONTHS_ES_CAP = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
var DAY_START = 9;

/* ─── DATA ───────────────────────────────────── */
var TURNOS_HOY = [
  { id:1,  hora:'09:00', cliente:'Martina Gómez',   initials:'MG', servicios:['Corte'],           barbero:'Carlos Medina',  estado:'Confirmado',        precio:3500, email:'martina@email.com',   tel:'370-411-0001', registrado:true  },
  { id:2,  hora:'09:30', cliente:'Diego Flores',    initials:'DF', servicios:['Barba'],            barbero:'Facundo Torres', estado:'Pendiente',          precio:2500, email:'diego@email.com',     tel:'370-411-0002', registrado:true  },
  { id:3,  hora:'10:00', cliente:'Sofía Herrera',   initials:'SH', servicios:['Cejas'],            barbero:'Agustín Romero', estado:'Atendido sin cobrar',precio:1500, email:'sofia@email.com',     tel:'370-411-0003', registrado:true  },
  { id:4,  hora:'10:30', cliente:'Nicolás Paz',     initials:'NP', servicios:['Corte','Barba'],    barbero:'Carlos Medina',  estado:'Atendido y cobrado', precio:6000, email:'nicolas@email.com',   tel:'370-411-0004', registrado:true  },
  { id:5,  hora:'11:00', cliente:'Valentina López', initials:'VL', servicios:['Coloración'],       barbero:'Facundo Torres', estado:'Confirmado',         precio:5000, email:'valentina@email.com', tel:'370-411-0005', registrado:true  },
  { id:6,  hora:'14:00', cliente:'Tomás Vera',      initials:'TV', servicios:['Corte'],            barbero:'Agustín Romero', estado:'Confirmado',         precio:3500, email:null, tel:null, registrado:false },
  { id:7,  hora:'14:30', cliente:'Laura Sánchez',   initials:'LS', servicios:['Barba'],            barbero:'Carlos Medina',  estado:'Cancelado',          precio:2500, email:'laura@email.com',     tel:'370-411-0007', registrado:true  },
  { id:8,  hora:'15:00', cliente:'Ignacio Ríos',    initials:'IR', servicios:['Corte'],            barbero:'Facundo Torres', estado:'Reprogramado',       precio:3500, email:'ignacio@email.com',   tel:'370-411-0008', registrado:true  },
];

var TURNOS_TODOS = [
  { id:10, fecha:'Lun 12 May', hora:'09:00', cliente:'Martina Gómez',   initials:'MG', servicios:['Corte'],      barbero:'Carlos Medina',  estado:'Atendido y cobrado', precio:3500, email:'martina@email.com', registrado:true  },
  { id:11, fecha:'Lun 12 May', hora:'11:00', cliente:'Carlos Pérez',    initials:'CP', servicios:['Barba'],      barbero:'Facundo Torres', estado:'Atendido sin cobrar',precio:2500, email:null, registrado:false },
  { id:12, fecha:'Mar 13 May', hora:'10:00', cliente:'Ana Rodríguez',   initials:'AR', servicios:['Cejas'],      barbero:'Agustín Romero', estado:'Cancelado',          precio:1500, email:'ana@email.com', registrado:true },
  { id:13, fecha:'Mar 13 May', hora:'14:30', cliente:'Facundo Díaz',    initials:'FD', servicios:['Corte','Barba'],barbero:'Carlos Medina', estado:'No asistió',         precio:6000, email:'facundo@email.com', registrado:true },
  { id:14, fecha:'Mié 14 May', hora:'09:30', cliente:'Camila Torres',   initials:'CT', servicios:['Coloración'], barbero:'Facundo Torres', estado:'Atendido y cobrado', precio:5000, email:'camila@email.com', registrado:true },
  { id:15, fecha:'Jue 15 May', hora:'11:00', cliente:'Ramiro Suárez',   initials:'RS', servicios:['Corte'],      barbero:'Agustín Romero', estado:'Reprogramado',       precio:3500, email:null, registrado:false },
  { id:16, fecha:'Vie 16 May', hora:'10:00', cliente:'Lucía Morales',   initials:'LM', servicios:['Barba'],      barbero:'Carlos Medina',  estado:'Confirmado',         precio:2500, email:'lucia@email.com', registrado:true },
  { id:17, fecha:'Vie 16 May', hora:'16:00', cliente:'Esteban Núñez',   initials:'EN', servicios:['Corte'],      barbero:'Facundo Torres', estado:'Pendiente',          precio:3500, email:'esteban@email.com', registrado:true },
  { id:18, fecha:'Sáb 17 May', hora:'09:00', cliente:'Valeria Blanco',  initials:'VB', servicios:['Cejas'],      barbero:'Agustín Romero', estado:'Atendido y cobrado', precio:1500, email:'valeria@email.com', registrado:true },
  { id:19, fecha:'Dom 18 May', hora:'11:30', cliente:'Rodrigo Castro',  initials:'RC', servicios:['Corte','Barba'],barbero:'Carlos Medina', estado:'Confirmado',         precio:6000, email:null, registrado:false },
];

var HISTORIAL = {
  1: [{label:'Turno creado',date:'12 May 09:15'},{label:'Confirmado',date:'12 May 09:20'}],
  2: [{label:'Turno creado',date:'12 May 08:00'}],
  3: [{label:'Turno creado',date:'11 May 18:00'},{label:'Confirmado',date:'12 May 10:05'},{label:'Atendido sin cobrar',date:'19 May 10:05'}],
  4: [{label:'Turno creado',date:'10 May 15:00'},{label:'Confirmado',date:'11 May 09:00'},{label:'Atendido y cobrado',date:'19 May 10:35'}],
  5: [{label:'Turno creado',date:'12 May 07:00'}],
  6: [{label:'Turno creado',date:'16 May 20:00'},{label:'Confirmado',date:'17 May 10:00'}],
  7: [{label:'Turno creado',date:'15 May 14:00'},{label:'Cancelado',date:'17 May 16:00'}],
  8: [{label:'Turno creado',date:'15 May 14:30'},{label:'Confirmado',date:'17 May 16:30'},{label:'Reprogramado',date:'18 May 10:00'}],
};

/* ─── HELPERS ────────────────────────────────── */
function pad(n) { return n < 10 ? '0' + n : '' + n; }

function clienteBg(initials) {
  var idx = (initials.charCodeAt(0) + (initials.charCodeAt(1) || 0)) % CLIENTES_BG.length;
  return CLIENTES_BG[idx];
}

function formatPrice(n) { return '$' + n.toLocaleString('es-AR'); }

function serviciosStr(t) {
  return Array.isArray(t.servicios) ? t.servicios.join(', ') : t.servicios;
}

function pillHtml(estado) {
  var map = {
    'Pendiente':          'pill-pendiente',
    'Confirmado':         'pill-confirmado',
    'Atendido sin cobrar':'pill-atendido-sc',
    'Atendido y cobrado': 'pill-atendido-cob',
    'Cancelado':          'pill-cancelado',
    'No asistió':         'pill-noasistio',
    'Reprogramado':       'pill-reprogramado',
  };
  var cls = map[estado] || 'pill-pendiente';
  return '<span class="pill ' + cls + '"><span class="pill-dot"></span>' + estado + '</span>';
}

/* ─── TABS ───────────────────────────────────── */
function switchTab(id, btn) {
  document.querySelectorAll('.tab-pane').forEach(function(p) { p.classList.remove('active'); });
  document.querySelectorAll('.tab-btn').forEach(function(b)  { b.classList.remove('active'); });
  document.getElementById('tab-' + id).classList.add('active');
  btn.classList.add('active');
}

/* ─── TAB 1 — CARDS ─────────────────────────── */
function turnoAcciones(t) {
  var html = '';
  var est = t.estado;
  if (est === 'Confirmado' || est === 'Reprogramado') {
    html += '<button class="btn btn-green btn-xs" onclick="event.stopPropagation();marcarAtendido(' + t.id + ')">Marcar atendido</button>';
    html += '<button class="btn btn-muted btn-xs" onclick="event.stopPropagation();marcarNoAsistio(' + t.id + ')">No asistió</button>';
    html += '<button class="btn btn-outline btn-xs" onclick="event.stopPropagation();openReprogramar(' + t.id + ')">Reprogramar</button>';
    html += '<button class="btn btn-danger btn-xs" onclick="event.stopPropagation();openCancelar(' + t.id + ')">Cancelar</button>';
  } else if (est === 'Atendido sin cobrar') {
    html += '<button class="btn btn-gold btn-xs" onclick="event.stopPropagation();openCobro(' + t.id + ')">Cobrar</button>';
  } else if (est === 'Pendiente') {
    html += '<button class="btn btn-blue btn-xs" onclick="event.stopPropagation();marcarConfirmado(' + t.id + ')">Confirmar</button>';
    html += '<button class="btn btn-danger btn-xs" onclick="event.stopPropagation();openCancelar(' + t.id + ')">Cancelar</button>';
  }
  return html;
}

function turnoRightHtml(t) {
  var badges = '';
  if (t.estado === 'Atendido sin cobrar') {
    badges += '<span class="pill pill-atendido-sc" style="font-size:11px"><span class="pill-dot"></span>Atendido ✓</span>';
  } else if (t.estado === 'Atendido y cobrado') {
    badges += '<span class="pill pill-atendido-sc" style="font-size:11px"><span class="pill-dot"></span>Atendido ✓</span>';
    badges += '<span class="pill pill-noasistio" style="font-size:11px"><span class="pill-dot"></span>Cobrado ✓</span>';
  } else {
    badges = pillHtml(t.estado);
  }
  var acciones = turnoAcciones(t);
  return '<div class="turno-right">' +
    '<div style="display:flex;gap:5px;flex-wrap:wrap;justify-content:flex-end">' + badges + '</div>' +
    (acciones ? '<div class="turno-acciones">' + acciones + '</div>' : '') +
  '</div>';
}

function renderTurnosHoy() {
  var html = TURNOS_HOY.map(function(t) {
    var barb  = BARBEROS[t.barbero] || {};
    var bg    = clienteBg(t.initials);
    var svcs  = serviciosStr(t);
    return (
      '<div class="turno-card" data-id="' + t.id + '" onclick="openDetail(' + t.id + ',\'hoy\')">' +
        '<div class="turno-hora-big">' + t.hora + '</div>' +
        '<div class="turno-divider"></div>' +
        '<div class="turno-cliente-av" style="background:' + bg + '">' + t.initials + '</div>' +
        '<div class="turno-info">' +
          '<div class="turno-nombre">' + t.cliente + '</div>' +
          '<div class="turno-barbero-line" style="color:' + (barb.color || 'var(--ink-mute)') + '">Barbero: ' + t.barbero + '</div>' +
          '<div class="turno-servicio-line">' + svcs + '</div>' +
          '<div class="turno-precio-line">' + formatPrice(t.precio) + '</div>' +
        '</div>' +
        turnoRightHtml(t) +
      '</div>'
    );
  }).join('');
  document.getElementById('turnoHoyList').innerHTML = html;
}

/* ─── ACCIONES DIRECTAS (cards) ─────────────── */
function getTurno(id) {
  return TURNOS_HOY.concat(TURNOS_TODOS).find(function(x) { return x.id === id; });
}

function setEstadoHoy(id, nuevoEstado) {
  var t = TURNOS_HOY.find(function(x) { return x.id === id; });
  if (t) { t.estado = nuevoEstado; renderTurnosHoy(); }
}

function marcarAtendido(id) {
  setEstadoHoy(id, 'Atendido sin cobrar');
}

function marcarNoAsistio(id) {
  setEstadoHoy(id, 'No asistió');
}

function marcarConfirmado(id) {
  setEstadoHoy(id, 'Confirmado');
}

/* ─── COBRO MODAL ────────────────────────────── */
var cobroTurnoId = null;
var cobroSubtotal = 0;
var cobroMedioActual = 'efectivo';

function openCobro(id) {
  var t = getTurno(id);
  if (!t) return;
  cobroTurnoId = id;

  var svcsArr = Array.isArray(t.servicios) ? t.servicios : [t.servicios];
  var total = 0;
  var listHtml = svcsArr.map(function(nombre) {
    var svc = SERVICES_DEF.find(function(s) { return s.nombre === nombre; });
    var precio = svc ? svc.precio : t.precio;
    total += precio;
    return '<div class="cobro-svc-row"><span class="cobro-svc-name">' + nombre + '</span><span class="cobro-svc-price">' + formatPrice(precio) + '</span></div>';
  }).join('');
  cobroSubtotal = total;

  var barb = BARBEROS[t.barbero] || {};
  document.getElementById('cobroSubtitle').textContent = t.cliente + ' · ' + serviciosStr(t) + ' · ' + t.barbero + (t.fecha ? ' · ' + t.fecha : '');
  document.getElementById('cobroServiceList').innerHTML = listHtml;
  document.getElementById('cobroSubtotalVal').textContent = formatPrice(cobroSubtotal);
  document.getElementById('cobroDescuento').value = 0;

  document.getElementById('montoEfectivo').value = 0;
  document.getElementById('montoTransferencia').value = 0;
  document.getElementById('mixtoFeedback').innerHTML = '';
  document.getElementById('pagoMixtoFields').style.display = 'none';
  setPago('efectivo');
  recalcCobro();
  document.getElementById('moCobroOverlay').classList.add('open');
}

function closeCobro() {
  document.getElementById('moCobroOverlay').classList.remove('open');
}

function recalcCobro() {
  var desc  = parseInt(document.getElementById('cobroDescuento').value) || 0;
  var total = Math.max(0, cobroSubtotal - desc);
  document.getElementById('cobroTotalVal').textContent = formatPrice(total);
  if (cobroMedioActual === 'mixto') checkMixto();
}

function setPago(tipo) {
  cobroMedioActual = tipo;
  ['efectivo','transferencia','mixto'].forEach(function(k) {
    document.getElementById('pago' + k.charAt(0).toUpperCase() + k.slice(1)).classList.toggle('active', k === tipo);
  });
  document.getElementById('pagoMixtoFields').style.display = tipo === 'mixto' ? '' : 'none';
  if (tipo === 'mixto') checkMixto();
}

function checkMixto() {
  var desc  = parseInt(document.getElementById('cobroDescuento').value) || 0;
  var total = Math.max(0, cobroSubtotal - desc);
  var ef    = parseInt(document.getElementById('montoEfectivo').value) || 0;
  var tr    = parseInt(document.getElementById('montoTransferencia').value) || 0;
  var suma  = ef + tr;
  var fb    = document.getElementById('mixtoFeedback');
  if (suma === total) {
    fb.innerHTML = '<div class="form-ok">Los montos coinciden con el total.</div>';
  } else {
    fb.innerHTML = '<div class="form-warn">La suma ($' + suma.toLocaleString('es-AR') + ') no coincide con el total (' + formatPrice(total) + ').</div>';
  }
}

function confirmarCobro() {
  if (!cobroTurnoId) return;
  setEstadoHoy(cobroTurnoId, 'Atendido y cobrado');
  var t = TURNOS_TODOS.find(function(x) { return x.id === cobroTurnoId; });
  if (t) t.estado = 'Atendido y cobrado';
  closeCobro();
  cobroTurnoId = null;
}

/* ─── REPROGRAMAR / CANCELAR ────────────────── */
var modalRIds = { reprogramar: 'moReprogramar', cancelar: 'moCancelar' };
var modalRCurrentId = null;

function openReprogramar(id) {
  modalRCurrentId = id;
  var t = getTurno(id); if (!t) return;
  var sum = buildSummaryBox(t);
  document.getElementById('summaryReprogram').innerHTML = sum;
  document.getElementById('moReprogramar').classList.add('open');
}

function openCancelar(id) {
  modalRCurrentId = id;
  var t = getTurno(id); if (!t) return;
  var sum = buildSummaryBox(t);
  document.getElementById('summaryCancelar').innerHTML = sum;
  document.getElementById('moCancelar').classList.add('open');
}

function closeModalR(key) {
  var el = document.getElementById(modalRIds[key]);
  if (el) el.classList.remove('open');
}

function confirmarReprogramar() {
  if (modalRCurrentId) setEstadoHoy(modalRCurrentId, 'Reprogramado');
  closeModalR('reprogramar');
}

function confirmarCancelar() {
  if (modalRCurrentId) setEstadoHoy(modalRCurrentId, 'Cancelado');
  closeModalR('cancelar');
}

['reprogramar','cancelar'].forEach(function(k) {
  var el = document.getElementById(modalRIds[k]);
  if (el) el.addEventListener('click', function(e) { if (e.target === this) closeModalR(k); });
});

function buildSummaryBox(t) {
  var bg = clienteBg(t.initials);
  return '<div class="turno-summary-box" style="margin-bottom:8px">' +
    '<div class="tsb-av" style="background:' + bg + '">' + t.initials + '</div>' +
    '<div><div class="tsb-name">' + t.cliente + '</div>' +
    '<div class="tsb-meta">' + serviciosStr(t) + ' · ' + (t.fecha || 'Hoy') + ' ' + t.hora + '</div></div>' +
  '</div>';
}

/* ─── TAB 2 — TABLE ─────────────────────────── */
var ICON_EYE    = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>';
var ICON_REPRG  = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 102.13-9.36L1 10"/></svg>';
var ICON_CANCEL = '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>';

function renderTurnosTodos(data) {
  var rows = (data || TURNOS_TODOS).map(function(t) {
    var bg   = clienteBg(t.initials);
    var barb = BARBEROS[t.barbero] || {};
    var emailHtml = t.registrado
      ? '<div class="t-email">' + (t.email || '') + '</div>'
      : '<div class="t-quick">Turno rápido</div>';
    return (
      '<tr onclick="openDetail(' + t.id + ',\'todos\')">' +
        '<td><div class="user-cell">' +
          '<div class="t-avatar" style="background:' + bg + '">' + t.initials + '</div>' +
          '<div><div class="t-name">' + t.cliente + '</div>' + emailHtml + '</div>' +
        '</div></td>' +
        '<td class="t-secondary">' + serviciosStr(t) + '</td>' +
        '<td><div class="user-cell">' +
          '<div class="t-avatar" style="background:' + (barb.bg||'var(--ink-mute)') + ';width:24px;height:24px;font-size:9px">' + (barb.init||'?') + '</div>' +
          '<span class="t-name" style="font-size:13px">' + t.barbero.split(' ')[0] + '</span>' +
        '</div></td>' +
        '<td class="t-secondary">' + t.fecha + ' ' + t.hora + '</td>' +
        '<td>' + pillHtml(t.estado) + '</td>' +
        '<td><div class="act-wrap">' +
          '<button class="act-btn" title="Ver detalle" onclick="event.stopPropagation();openDetail(' + t.id + ',\'todos\')">' + ICON_EYE + '</button>' +
          '<button class="act-btn" title="Reprogramar" onclick="event.stopPropagation();openReprogramar(' + t.id + ')">' + ICON_REPRG + '</button>' +
          '<button class="act-btn act-danger" title="Cancelar" onclick="event.stopPropagation();openCancelar(' + t.id + ')">' + ICON_CANCEL + '</button>' +
        '</div></td>' +
      '</tr>'
    );
  });
  document.getElementById('turnosTableBody').innerHTML = rows.join('');
}

/* ─── FILTERS ────────────────────────────────── */
function applyFilters() {
  var q    = document.getElementById('searchCliente').value.toLowerCase();
  var barb = document.getElementById('filtBarbero').value;
  var est  = document.getElementById('filtEstado').value;
  var data = TURNOS_TODOS.filter(function(t) {
    var mQ = !q    || t.cliente.toLowerCase().indexOf(q) !== -1;
    var mB = !barb || t.barbero === barb;
    var mE = !est  || t.estado  === est;
    return mQ && mB && mE;
  });
  renderTurnosTodos(data);
}

function clearFilters() {
  document.getElementById('searchCliente').value = '';
  document.getElementById('filtFecha').value     = '';
  document.getElementById('filtBarbero').value   = '';
  document.getElementById('filtEstado').value    = '';
  renderTurnosTodos(TURNOS_TODOS);
}

document.getElementById('searchCliente').addEventListener('input', applyFilters);
document.getElementById('filtBarbero').addEventListener('change', applyFilters);
document.getElementById('filtEstado').addEventListener('change', applyFilters);

/* ─── DETAIL PANEL ───────────────────────────── */
function openDetail(id, source) {
  var all = TURNOS_HOY.concat(TURNOS_TODOS);
  var t   = all.find(function(x) { return x.id === id; });
  if (!t) return;

  var bg   = clienteBg(t.initials);
  var barb = BARBEROS[t.barbero] || {};
  var hist = HISTORIAL[id] || [];

  var contactHtml = t.registrado
    ? '<div><div class="d-field-label">Email</div><div class="d-field-value">' + (t.email || '—') + '</div></div>' +
      '<div><div class="d-field-label">Teléfono</div><div class="d-field-value">' + (t.tel || '—') + '</div></div>'
    : '<div><div class="d-field-label">Tipo</div><div class="d-field-value"><span class="d-badge-quick">Sin cuenta registrada</span></div></div>';

  var tlHtml = hist.map(function(h) {
    return '<div class="tl-item">' +
      '<div class="tl-left"><div class="tl-dot"></div><div class="tl-line"></div></div>' +
      '<div class="tl-content"><div class="tl-label">' + h.label + '</div><div class="tl-date">' + h.date + '</div></div>' +
    '</div>';
  }).join('');

  var accionesHtml = '';
  if (t.estado === 'Confirmado' || t.estado === 'Reprogramado') {
    accionesHtml =
      '<button class="btn btn-green btn-sm btn-full" onclick="marcarAtendido(' + id + ');closeDetail()">Marcar atendido</button>' +
      '<button class="btn btn-outline btn-sm btn-full" onclick="openReprogramar(' + id + ')">Reprogramar</button>' +
      '<button class="btn btn-danger btn-sm btn-full" onclick="openCancelar(' + id + ')">Cancelar turno</button>';
  } else if (t.estado === 'Atendido sin cobrar') {
    accionesHtml = '<button class="btn btn-gold btn-sm btn-full" onclick="openCobro(' + id + ')">Cobrar</button>';
  } else if (t.estado === 'Pendiente') {
    accionesHtml =
      '<button class="btn btn-blue btn-sm btn-full" onclick="marcarConfirmado(' + id + ');closeDetail()">Confirmar turno</button>' +
      '<button class="btn btn-danger btn-sm btn-full" onclick="openCancelar(' + id + ')">Cancelar turno</button>';
  }

  var fechaStr = t.fecha ? (t.fecha + ' · ' + t.hora) : ('Hoy · ' + t.hora);

  document.getElementById('detailBody').innerHTML =
    '<div class="detail-user-top">' +
      '<div class="d-avatar" style="background:' + bg + '">' + t.initials + '</div>' +
      '<div class="d-name">' + t.cliente + '</div>' +
      '<div class="d-status">' + pillHtml(t.estado) + '</div>' +
    '</div>' +
    '<div class="detail-fields">' +
      '<div><div class="d-field-label">Servicio/s</div><div class="d-field-value">' + serviciosStr(t) + '</div></div>' +
      '<div><div class="d-field-label">Barbero</div><div class="d-field-value" style="display:flex;align-items:center;gap:7px"><div style="width:10px;height:10px;border-radius:50%;background:' + (barb.bg||'var(--ink-mute)') + ';flex-shrink:0"></div>' + t.barbero + '</div></div>' +
      '<div><div class="d-field-label">Fecha y horario</div><div class="d-field-value">' + fechaStr + '</div></div>' +
      '<div><div class="d-field-label">Precio total</div><div class="d-field-value" style="font-weight:600">' + formatPrice(t.precio) + '</div></div>' +
      contactHtml +
    '</div>' +
    '<div style="margin-bottom:20px">' +
      '<div class="d-field-label" style="margin-bottom:10px">Historial de estados</div>' +
      '<div class="timeline">' + tlHtml + '</div>' +
    '</div>' +
    (accionesHtml ? '<div class="detail-actions">' + accionesHtml + '</div>' : '');

  document.getElementById('detailPanel').classList.add('open');
  document.getElementById('detailOverlay').classList.add('open');
}

function closeDetail() {
  document.getElementById('detailPanel').classList.remove('open');
  document.getElementById('detailOverlay').classList.remove('open');
}

/* ══════════════════════════════════════════════
   MODAL NUEVO TURNO (unified)
   ══════════════════════════════════════════════ */
var modalState = {
  clienteTipo: 'registrado', clienteSeleccionado: null,
  servicios: [], barbero: null, fecha: null, hora: null,
};
var calWidgetCurrent = new Date();

function openNuevoTurno() {
  modalState = { clienteTipo:'registrado', clienteSeleccionado:null, servicios:[], barbero:null, fecha:null, hora:null };
  document.getElementById('clienteSearch').value   = '';
  document.getElementById('clienteDropdown').classList.remove('open');
  document.getElementById('clienteNombre').value   = '';
  document.getElementById('clienteApellido').value = '';
  document.querySelectorAll('.service-card-u').forEach(function(c) { c.classList.remove('selected'); });
  document.querySelectorAll('.barber-card-m').forEach(function(c) { c.classList.remove('selected'); });
  document.querySelectorAll('.tipo-toggle-btn').forEach(function(b) { b.classList.remove('active'); });
  document.getElementById('btnTipoRegistrado').classList.add('active');
  document.getElementById('secClienteRegistrado').style.display = '';
  document.getElementById('secClienteRapido').style.display     = 'none';
  document.getElementById('timeSlotsWrap').style.display  = 'none';
  document.getElementById('resumenSection').style.display = 'none';
  document.getElementById('serviceSummaryLine').textContent = 'Sin servicios seleccionados';
  calWidgetCurrent = new Date();
  renderCalWidget();
  document.getElementById('nuevoTurnoOverlay').classList.add('open');
}

function closeNuevoTurno() {
  document.getElementById('nuevoTurnoOverlay').classList.remove('open');
}

document.getElementById('nuevoTurnoOverlay').addEventListener('click', function(e) {
  if (e.target === this) closeNuevoTurno();
});
document.getElementById('moCobroOverlay').addEventListener('click', function(e) {
  if (e.target === this) closeCobro();
});

/* ── Sección 1: cliente ── */
function setClienteTipo(tipo) {
  modalState.clienteTipo = tipo;
  modalState.clienteSeleccionado = null;
  document.querySelectorAll('.tipo-toggle-btn').forEach(function(b) { b.classList.remove('active'); });
  document.getElementById(tipo === 'registrado' ? 'btnTipoRegistrado' : 'btnTipoRapido').classList.add('active');
  document.getElementById('secClienteRegistrado').style.display = tipo === 'registrado' ? '' : 'none';
  document.getElementById('secClienteRapido').style.display     = tipo === 'rapido'     ? '' : 'none';
  updateResumen();
}

function filterClientes() {
  var q        = document.getElementById('clienteSearch').value.trim().toLowerCase();
  var dropdown = document.getElementById('clienteDropdown');
  if (!q) { dropdown.classList.remove('open'); return; }
  var results = CLIENTES_SAMPLE.filter(function(c) {
    return c.nombre.toLowerCase().indexOf(q) !== -1 || c.email.toLowerCase().indexOf(q) !== -1;
  });
  if (!results.length) { dropdown.classList.remove('open'); return; }
  dropdown.innerHTML = results.map(function(c) {
    return '<div class="search-result" onclick="selectClienteModal(' + c.id + ')">' +
      '<strong>' + c.nombre + '</strong><span style="color:var(--ink-mute);font-size:11.5px;margin-left:6px">' + c.email + '</span></div>';
  }).join('');
  dropdown.classList.add('open');
}

function selectClienteModal(id) {
  var c = CLIENTES_SAMPLE.find(function(x) { return x.id === id; });
  if (!c) return;
  modalState.clienteSeleccionado = c;
  document.getElementById('clienteSearch').value = c.nombre;
  document.getElementById('clienteDropdown').classList.remove('open');
  updateResumen();
}

/* ── Sección 2: servicios ── */
function toggleServiceModal(el) {
  var nombre = el.dataset.nombre;
  var idx    = modalState.servicios.indexOf(nombre);
  if (idx === -1) { modalState.servicios.push(nombre); el.classList.add('selected'); }
  else            { modalState.servicios.splice(idx, 1); el.classList.remove('selected'); }
  updateServiceSummary();
  updateResumen();
}

function updateServiceSummary() {
  var total = 0;
  modalState.servicios.forEach(function(nombre) {
    var svc = SERVICES_DEF.find(function(s) { return s.nombre === nombre; });
    if (svc) total += svc.precio;
  });
  var el = document.getElementById('serviceSummaryLine');
  el.textContent = modalState.servicios.length
    ? modalState.servicios.length + ' servicio' + (modalState.servicios.length > 1 ? 's' : '') + ' · Total: $' + total.toLocaleString('es-AR')
    : 'Sin servicios seleccionados';
}

/* ── Sección 3: barbero ── */
function selectBarberModal(el, key) {
  document.querySelectorAll('.barber-card-m').forEach(function(c) { c.classList.remove('selected'); });
  el.classList.add('selected');
  modalState.barbero = key;
  if (modalState.fecha) renderTimeSlots();
  updateResumen();
}

/* ── Sección 4: calendario ── */
function calWidgetNav(dir) {
  calWidgetCurrent = new Date(calWidgetCurrent.getFullYear(), calWidgetCurrent.getMonth() + dir, 1);
  renderCalWidget();
}

function renderCalWidget() {
  var y = calWidgetCurrent.getFullYear();
  var m = calWidgetCurrent.getMonth();
  document.getElementById('calWidgetMonth').textContent = MONTHS_ES_CAP[m] + ' ' + y;
  var today    = new Date(); today.setHours(0,0,0,0);
  var lastDate = new Date(y, m + 1, 0).getDate();
  var fdow     = new Date(y, m, 1).getDay();
  var leading  = fdow === 0 ? 0 : fdow - 1;
  var html = '';
  for (var b = 0; b < leading; b++) html += '<div></div>';
  for (var day = 1; day <= lastDate; day++) {
    var d   = new Date(y, m, day);
    var dow = d.getDay();
    if (dow === 0) continue;
    var isPast     = d < today;
    var isToday    = d.getTime() === today.getTime();
    var isSelected = modalState.fecha && d.getTime() === modalState.fecha.getTime();
    var cls = 'cal-day-btn' + (isToday && !isSelected ? ' today' : '') + (isSelected ? ' selected' : '');
    if (isPast) html += '<button class="' + cls + '" disabled>' + day + '</button>';
    else html += '<button class="' + cls + '" onclick="selectCalDay(' + y + ',' + m + ',' + day + ')">' + day + '</button>';
  }
  document.getElementById('calDaysGrid').innerHTML = html;
}

function selectCalDay(y, m, day) {
  modalState.fecha = new Date(y, m, day);
  modalState.hora  = null;
  renderCalWidget();
  renderTimeSlots();
  updateResumen();
}

function renderTimeSlots() {
  var wrap = document.getElementById('timeSlotsWrap');
  var grid = document.getElementById('timeSlotsGrid');
  wrap.style.display = 'block';
  var html = '';
  for (var tm = 9 * 60; tm <= 21 * 60 + 30; tm += 30) {
    var hh = Math.floor(tm / 60), mm = tm % 60;
    var label      = pad(hh) + ':' + pad(mm);
    var isSelected = modalState.hora === label;
    var cls = 'time-slot-btn' + (isSelected ? ' selected' : '');
    html += '<button class="' + cls + '" onclick="selectTimeSlot(\'' + label + '\')">' + label + '</button>';
  }
  grid.innerHTML = html;
}

function selectTimeSlot(label) {
  modalState.hora = label;
  renderTimeSlots();
  updateResumen();
}

/* ── Sección 5: resumen ── */
function updateResumen() {
  var section = document.getElementById('resumenSection');
  var card    = document.getElementById('resumenCard');

  var hasData = modalState.clienteSeleccionado !== null ||
    (modalState.clienteTipo === 'rapido' &&
      (document.getElementById('clienteNombre').value || document.getElementById('clienteApellido').value)) ||
    modalState.servicios.length > 0 || modalState.barbero !== null ||
    modalState.fecha !== null || modalState.hora !== null;

  if (!hasData) { section.style.display = 'none'; return; }
  section.style.display = '';

  var clienteLabel = '—';
  if (modalState.clienteTipo === 'registrado' && modalState.clienteSeleccionado) {
    clienteLabel = modalState.clienteSeleccionado.nombre;
  } else if (modalState.clienteTipo === 'rapido') {
    var n = document.getElementById('clienteNombre').value;
    var a = document.getElementById('clienteApellido').value;
    if (n || a) clienteLabel = (n + ' ' + a).trim();
  }

  var total = 0;
  modalState.servicios.forEach(function(nombre) {
    var svc = SERVICES_DEF.find(function(s) { return s.nombre === nombre; });
    if (svc) total += svc.precio;
  });

  var barberLabel = '—';
  BARBERS.forEach(function(b) { if (b.key === modalState.barbero) barberLabel = b.label; });

  var fechaLabel = '—';
  if (modalState.fecha) fechaLabel = pad(modalState.fecha.getDate()) + '/' + pad(modalState.fecha.getMonth() + 1) + '/' + modalState.fecha.getFullYear();

  var svcRows = modalState.servicios.length
    ? modalState.servicios.map(function(nombre) {
        var svc = SERVICES_DEF.find(function(s) { return s.nombre === nombre; });
        return resRow(nombre, svc ? formatPrice(svc.precio) : '—');
      }).join('')
    : resRow('Servicios', '—');

  card.innerHTML =
    resRow('Cliente', clienteLabel) +
    svcRows +
    resRow('Barbero', barberLabel) +
    resRow('Fecha', fechaLabel) +
    resRow('Horario', modalState.hora || '—') +
    '<div class="resumen-row resumen-total"><span class="resumen-label">Total</span><span class="resumen-value">$' + total.toLocaleString('es-AR') + '</span></div>';
}

function resRow(label, value) {
  return '<div class="resumen-row"><span class="resumen-label">' + label + '</span><span class="resumen-value">' + value + '</span></div>';
}

function confirmarNuevoTurno() {
  closeNuevoTurno();
}

/* ─── SIDEBAR MOBILE ─────────────────────────── */
function openSidebar() {
  document.getElementById('sidebar').classList.add('open');
  document.getElementById('sidebarOverlay').classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeSidebar() {
  document.getElementById('sidebar').classList.remove('open');
  document.getElementById('sidebarOverlay').classList.remove('open');
  document.body.style.overflow = '';
}

/* ─── INIT ───────────────────────────────────── */
renderTurnosHoy();
renderTurnosTodos();
renderCalWidget();
</script>

</body>
</html>
