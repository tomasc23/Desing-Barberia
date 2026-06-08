<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cobros — Barber Brizu</title>
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

    /* ── STATS ── */
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
    .stat-card {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; padding: 18px 20px;
    }
    .stat-label { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.09em; color: var(--ink-mute); }
    .stat-value { font-size: 28px; font-weight: 700; letter-spacing: -0.025em; margin-top: 5px; line-height: 1; }
    .stat-sub   { font-size: 12px; color: var(--ink-mute); margin-top: 5px; }

    /* ── PENDING SECTION ── */
    .pending-section-hd {
      display: flex; align-items: center; gap: 10px; margin-bottom: 12px;
    }
    .pending-section-title { font-size: 16px; font-weight: 600; letter-spacing: -0.01em; }
    .pending-badge {
      background: var(--gold-soft); color: var(--gold-deep); border: 1px solid oklch(82% 0.1 86);
      font-size: 11.5px; font-weight: 700; padding: 2px 10px; border-radius: 999px; line-height: 1.6;
    }
    .pending-list { display: flex; flex-direction: column; gap: 8px; }
    .pending-card {
      background: var(--paper); border: 1px solid oklch(84% 0.09 86);
      border-radius: 12px; padding: 13px 16px;
      display: flex; align-items: center; gap: 14px;
      transition: box-shadow 0.12s;
    }
    .pending-card:hover { box-shadow: 0 2px 10px oklch(80% 0.15 85 / 0.12); }
    .p-avatar {
      width: 38px; height: 38px; border-radius: 50%;
      display: grid; place-items: center; font-size: 12px; font-weight: 700; color: var(--paper); flex-shrink: 0;
    }
    .p-info { flex: 1; min-width: 0; }
    .p-name    { font-size: 14px; font-weight: 600; line-height: 1.2; }
    .p-meta    { font-size: 12px; color: var(--ink-mute); margin-top: 2px; }
    .p-price   { font-size: 15px; font-weight: 700; color: var(--ink); white-space: nowrap; flex-shrink: 0; }

    /* ── HISTORIAL SECTION HEADER ── */
    .hist-hd { margin-bottom: 12px; }

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
    table { width: 100%; border-collapse: collapse; min-width: 900px; }
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
    .t-quick { font-size: 11px; color: var(--ink-mute); font-style: italic; }
    .t-barbero-cell { display: flex; align-items: center; gap: 8px; }
    .t-barbero-av { width: 24px; height: 24px; border-radius: 50%; display: grid; place-items: center; font-size: 8.5px; font-weight: 700; color: var(--paper); flex-shrink: 0; }
    .t-secondary { font-size: 13px; color: var(--ink-soft); }
    .act-wrap { display: flex; gap: 5px; }
    .act-btn {
      width: 28px; height: 28px; border-radius: 7px; border: 1px solid var(--rule);
      background: transparent; color: var(--ink-mute); cursor: pointer;
      display: grid; place-items: center; transition: background 0.12s, color 0.12s, border-color 0.12s;
    }
    .act-btn:hover { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-100); }
    .t-monto { font-size: 14px; font-weight: 700; color: var(--green-deep); white-space: nowrap; }

    /* ── PAGO TYPE PILLS (table) ── */
    .pago-tipo-pill {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 3px 9px; border-radius: 999px; font-size: 11.5px; font-weight: 600; white-space: nowrap;
    }
    .pago-efectivo  { background: var(--green-soft); color: var(--green-deep); }
    .pago-transfer  { background: var(--blue-50);    color: var(--blue-600); }
    .pago-mixto     { background: var(--violet-soft); color: var(--violet-deep); }
    .pago-mixto-sub { font-size: 11px; color: var(--ink-mute); margin-top: 3px; }

    /* ── TOTALS FOOTER ── */
    .totals-label { font-size: 12px; color: var(--ink-mute); font-weight: 500; }
    .totals-val   { font-weight: 700; color: var(--ink); }

    /* ── BARBER DISTRIBUTION ── */
    .barber-dist-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
    .barber-dist-card {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; padding: 20px;
    }
    .bd-top { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; }
    .bd-avatar {
      width: 44px; height: 44px; border-radius: 50%;
      display: grid; place-items: center; font-size: 13px; font-weight: 700; color: var(--paper); flex-shrink: 0;
    }
    .bd-avatar.carlos  { background: var(--blue-600); }
    .bd-avatar.facundo { background: oklch(35% 0.12 180); }
    .bd-avatar.agustin { background: oklch(36% 0.13 290); }
    .bd-name { font-size: 14px; font-weight: 600; line-height: 1.2; }
    .bd-meta { font-size: 12px; color: var(--ink-mute); margin-top: 1px; }
    .bd-right { margin-left: auto; text-align: right; flex-shrink: 0; }
    .bd-total { font-size: 19px; font-weight: 700; letter-spacing: -0.02em; line-height: 1.1; }
    .bd-pct   { font-size: 12px; color: var(--ink-mute); margin-top: 2px; }
    .bd-bar-track { height: 7px; background: var(--paper-2); border-radius: 999px; overflow: hidden; border: 1px solid var(--rule); }
    .bd-bar-fill  { height: 100%; border-radius: 999px; transition: width 0.6s cubic-bezier(0.4,0,0.2,1); }

    /* ── DETAIL PANEL ── */
    .detail-overlay {
      position: fixed; inset: 0; background: oklch(16% 0.01 240 / 0.1);
      z-index: 30; opacity: 0; pointer-events: none; transition: opacity 0.2s;
    }
    .detail-overlay.open { opacity: 1; pointer-events: all; }
    .detail-panel {
      position: fixed; top: 0; right: 0; width: 360px; height: 100vh;
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
    .detail-body { flex: 1; overflow-y: auto; padding: 20px; scrollbar-width: thin; scrollbar-color: var(--rule) var(--paper-2); }
    .detail-body::-webkit-scrollbar { width: 4px; }
    .detail-body::-webkit-scrollbar-track { background: var(--paper-2); border-radius: 99px; }
    .detail-body::-webkit-scrollbar-thumb { background: var(--rule); border-radius: 99px; }
    .detail-user-top {
      display: flex; flex-direction: column; align-items: center; text-align: center;
      padding-bottom: 18px; border-bottom: 1px solid var(--rule); margin-bottom: 18px;
    }
    .d-avatar { width: 54px; height: 54px; border-radius: 50%; display: grid; place-items: center; font-size: 18px; font-weight: 700; color: var(--paper); margin-bottom: 10px; }
    .d-name   { font-size: 17px; font-weight: 600; letter-spacing: -0.01em; }
    .d-badge  { margin-top: 8px; display: inline-flex; align-items: center; padding: 3px 10px; border-radius: 6px; font-size: 11.5px; font-weight: 500; }
    .d-badge-reg   { background: var(--blue-50); color: var(--blue-600); border: 1px solid var(--blue-100); }
    .d-badge-quick { background: var(--paper-2); color: var(--ink-mute); border: 1px solid var(--rule); }
    .d-section { margin-bottom: 18px; }
    .d-section-label {
      font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.09em;
      color: var(--ink-mute); margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid var(--rule);
    }
    .d-field-label { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-mute); margin-bottom: 2px; }
    .d-field-value { font-size: 13.5px; color: var(--ink); }
    .cobro-svc-row { display: flex; justify-content: space-between; align-items: center; font-size: 13.5px; }
    .cobro-svc-name  { color: var(--ink); }
    .cobro-svc-price { font-weight: 600; color: var(--ink-soft); }
    .cobro-subtotal  { display: flex; justify-content: space-between; font-size: 13.5px; padding-top: 8px; border-top: 1px solid var(--rule); }
    .cobro-total-row { display: flex; justify-content: space-between; align-items: center; padding-top: 10px; border-top: 2px solid var(--rule); }
    .cobro-total-label { font-size: 15px; font-weight: 700; }
    .cobro-total-val   { font-size: 20px; font-weight: 700; color: var(--blue-600); }

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
    .form-row   { display: grid; grid-template-columns: 1fr 1fr; gap: 13px; }
    .form-group { display: flex; flex-direction: column; gap: 5px; }
    .form-label { font-size: 12.5px; font-weight: 500; color: var(--ink-soft); }
    .form-input {
      padding: 9px 12px; border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13.5px; color: var(--ink); background: var(--paper);
      outline: none; width: 100%; transition: border-color 0.12s;
    }
    .form-input:focus { border-color: var(--blue-400); }
    .form-warn { font-size: 12px; color: var(--red-deep); padding: 10px 14px; background: var(--red-soft); border: 1px solid oklch(87% 0.05 22); border-radius: 8px; line-height: 1.5; }
    .form-ok   { font-size: 12px; color: var(--green-deep); padding: 10px 14px; background: var(--green-soft); border: 1px solid oklch(86% 0.07 145); border-radius: 8px; line-height: 1.5; }

    /* turno summary box inside modal */
    .turno-summary-box {
      background: var(--paper-2); border: 1px solid var(--rule); border-radius: 10px;
      padding: 12px 16px; display: flex; gap: 12px; align-items: center;
    }
    .tsb-av { width: 36px; height: 36px; border-radius: 50%; display: grid; place-items: center; font-size: 12px; font-weight: 700; color: var(--paper); flex-shrink: 0; }
    .tsb-name { font-size: 13.5px; font-weight: 600; }
    .tsb-meta { font-size: 12px; color: var(--ink-mute); }

    /* ── COBRO MODAL ── */
    .cobro-service-list { display: flex; flex-direction: column; gap: 7px; }
    .pago-pills { display: flex; gap: 6px; }
    .pago-pill {
      flex: 1; padding: 9px 14px; border: 1.5px solid var(--rule); border-radius: 9px;
      font-family: inherit; font-size: 13px; font-weight: 500; cursor: pointer;
      background: var(--paper); color: var(--ink-mute); transition: all 0.12s; text-align: center;
    }
    .pago-pill.active { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-600); font-weight: 600; }

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
      .barber-dist-grid { grid-template-columns: 1fr !important; }
      .detail-panel { width: 100% !important; }
      .modal { width: 95vw !important; }
      .form-row { grid-template-columns: 1fr !important; }
      .pago-pills { flex-wrap: wrap; }
      .toolbar { flex-wrap: wrap; }
      .tb-select { min-width: 0; flex: 1; }
      .pending-card { flex-wrap: wrap; }
      .pending-card .p-price { margin-left: 52px; }
      .bd-top { flex-wrap: wrap; }
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
        <a href="/dashboard/cobros" class="nav-link active">
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
        <h1>Cobros</h1>
        <div class="breadcrumb">Económico &rarr; Cobros</div>
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
          <div class="section-title">Gestión de cobros</div>
          <div class="section-sub">Registrá y consultá todos los cobros del local</div>
        </div>
      </div>

      <!-- ── ESTADÍSTICAS ── -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-label">Total cobrado hoy</div>
          <div class="stat-value" style="color:var(--green-deep)">$18.500</div>
          <div class="stat-sub">ingresos del día</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Total esta semana</div>
          <div class="stat-value" style="color:var(--blue-600)">$124.000</div>
          <div class="stat-sub">semana actual</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Cobros pendientes</div>
          <div class="stat-value" style="color:var(--gold-deep)" id="statPendientes">2</div>
          <div class="stat-sub">atendidos sin cobrar</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Promedio por turno</div>
          <div class="stat-value" style="color:var(--ink-mute)">$4.133</div>
          <div class="stat-sub">esta semana</div>
        </div>
      </div>

      <!-- ── PENDIENTES DE COBRO ── -->
      <div>
        <div class="pending-section-hd">
          <div class="pending-section-title">Pendientes de cobro</div>
          <span class="pending-badge" id="pendientesBadge">2</span>
        </div>
        <div class="pending-list" id="pendientesList"></div>
      </div>

      <!-- ── HISTORIAL DE COBROS ── -->
      <div>
        <div class="hist-hd">
          <div class="section-title" style="font-size:16px">Historial de cobros</div>
          <div class="section-sub">Todos los cobros registrados</div>
        </div>

        <div class="toolbar">
          <div class="search-wrap">
            <svg class="search-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" id="searchCliente" class="tb-input" placeholder="Buscar por cliente..." oninput="applyFilters()">
          </div>
          <select class="tb-select" id="filtFecha" onchange="applyFilters()">
            <option value="">Todas las fechas</option>
            <option value="hoy">Hoy</option>
            <option value="semana">Esta semana</option>
            <option value="mes">Este mes</option>
          </select>
          <select class="tb-select" id="filtBarbero" onchange="applyFilters()">
            <option value="">Todos los barberos</option>
            <option value="Carlos Medina">Carlos Medina</option>
            <option value="Facundo Torres">Facundo Torres</option>
            <option value="Agustín Romero">Agustín Romero</option>
          </select>
          <select class="tb-select" id="filtPago" onchange="applyFilters()">
            <option value="">Medio de pago</option>
            <option value="efectivo">Efectivo</option>
            <option value="transferencia">Transferencia</option>
            <option value="mixto">Pago mixto</option>
          </select>
          <select class="tb-select" id="filtServicio" onchange="applyFilters()">
            <option value="">Todos los servicios</option>
            <option value="Corte">Corte</option>
            <option value="Barba">Barba</option>
            <option value="Cejas">Cejas</option>
            <option value="Coloración">Coloración</option>
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
                <th>Medio de pago</th>
                <th>Monto</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="cobrosTableBody"></tbody>
            <tfoot id="cobrosTableFoot"></tfoot>
          </table>
        </div>
      </div>

      <!-- ── DISTRIBUCIÓN POR BARBERO ── -->
      <div>
        <div class="hist-hd">
          <div class="section-title" style="font-size:16px">Distribución de ingresos por barbero esta semana</div>
          <div class="section-sub">Rendimiento individual — semana actual</div>
        </div>
        <div class="barber-dist-grid">
          <div class="barber-dist-card">
            <div class="bd-top">
              <div class="bd-avatar carlos">CM</div>
              <div>
                <div class="bd-name">Carlos Medina</div>
                <div class="bd-meta">8 turnos cobrados</div>
              </div>
              <div class="bd-right">
                <div class="bd-total">$32.000</div>
                <div class="bd-pct">45% del total</div>
              </div>
            </div>
            <div class="bd-bar-track">
              <div class="bd-bar-fill" style="width:45%; background:var(--blue-600)"></div>
            </div>
          </div>
          <div class="barber-dist-card">
            <div class="bd-top">
              <div class="bd-avatar facundo">FT</div>
              <div>
                <div class="bd-name">Facundo Torres</div>
                <div class="bd-meta">6 turnos cobrados</div>
              </div>
              <div class="bd-right">
                <div class="bd-total">$22.500</div>
                <div class="bd-pct">32% del total</div>
              </div>
            </div>
            <div class="bd-bar-track">
              <div class="bd-bar-fill" style="width:32%; background:oklch(35% 0.12 180)"></div>
            </div>
          </div>
          <div class="barber-dist-card">
            <div class="bd-top">
              <div class="bd-avatar agustin">AR</div>
              <div>
                <div class="bd-name">Agustín Romero</div>
                <div class="bd-meta">4 turnos cobrados</div>
              </div>
              <div class="bd-right">
                <div class="bd-total">$16.500</div>
                <div class="bd-pct">23% del total</div>
              </div>
            </div>
            <div class="bd-bar-track">
              <div class="bd-bar-fill" style="width:23%; background:oklch(36% 0.13 290)"></div>
            </div>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

<!-- ══ DETAIL OVERLAY ══ -->
<div class="detail-overlay" id="detailOverlay" onclick="closeDetail()"></div>
<div class="detail-panel" id="detailPanel">
  <div class="detail-hd">
    <span class="detail-hd-title">Detalle del cobro</span>
    <button class="close-btn" onclick="closeDetail()">&times;</button>
  </div>
  <div class="detail-body" id="detailBody"></div>
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

<script>
  /* ──────────────────────────────────────
     DATA
  ────────────────────────────────────── */
  const BARB = {
    carlos:  { nombre: 'Carlos Medina',  initials: 'CM', color: 'var(--blue-600)',         clase: 'carlos'  },
    facundo: { nombre: 'Facundo Torres', initials: 'FT', color: 'oklch(35% 0.12 180)',     clase: 'facundo' },
    agustin: { nombre: 'Agustín Romero', initials: 'AR', color: 'oklch(36% 0.13 290)',     clase: 'agustin' }
  };

  let cobrosData = [
    { id:1,  cliente:'Martina Gómez',   tipo:'registrado', ini:'MG', col:'var(--blue-600)',       servicios:[{n:'Corte',p:3500}],                    barbero:BARB.carlos,  fecha:'Lun 12 May', hora:'09:00', pago:'efectivo',      pagoD:null,                    dto:0,   monto:3500, obs:'',                              reg:'Lun 12 May 2025, 09:18' },
    { id:2,  cliente:'Diego Flores',    tipo:'registrado', ini:'DF', col:'oklch(35% 0.12 180)',   servicios:[{n:'Barba',p:2500}],                    barbero:BARB.facundo, fecha:'Lun 12 May', hora:'09:30', pago:'transferencia',  pagoD:null,                    dto:0,   monto:2500, obs:'',                              reg:'Lun 12 May 2025, 09:52' },
    { id:3,  cliente:'Nicolás Paz',     tipo:'registrado', ini:'NP', col:'oklch(36% 0.13 290)',   servicios:[{n:'Corte',p:3500},{n:'Barba',p:2500}], barbero:BARB.carlos,  fecha:'Lun 12 May', hora:'10:30', pago:'mixto',          pagoD:{ef:3000,tr:3000},       dto:0,   monto:6000, obs:'Cliente habitual, aplicó combo.',   reg:'Lun 12 May 2025, 10:58' },
    { id:4,  cliente:'Camila Torres',   tipo:'registrado', ini:'CT', col:'oklch(42% 0.14 145)',   servicios:[{n:'Coloración',p:5000}],               barbero:BARB.facundo, fecha:'Mié 14 May', hora:'09:30', pago:'transferencia',  pagoD:null,                    dto:0,   monto:5000, obs:'',                              reg:'Mié 14 May 2025, 09:55' },
    { id:5,  cliente:'Valeria Blanco',  tipo:'registrado', ini:'VB', col:'oklch(58% 0.14 75)',    servicios:[{n:'Cejas',p:1500}],                    barbero:BARB.agustin, fecha:'Sáb 17 May', hora:'09:00', pago:'efectivo',       pagoD:null,                    dto:0,   monto:1500, obs:'',                              reg:'Sáb 17 May 2025, 09:22' },
    { id:6,  cliente:'Juan García',     tipo:'rapido',     ini:'JG', col:'var(--blue-600)',       servicios:[{n:'Corte',p:3500}],                    barbero:BARB.carlos,  fecha:'Hoy',        hora:'09:00', pago:'efectivo',       pagoD:null,                    dto:0,   monto:3500, obs:'',                              reg:'Hoy, 09:18' },
    { id:7,  cliente:'Ana Rodríguez',   tipo:'registrado', ini:'AR', col:'oklch(35% 0.12 180)',   servicios:[{n:'Cejas',p:2000}],                    barbero:BARB.agustin, fecha:'Mar 13 May', hora:'10:00', pago:'transferencia',  pagoD:null,                    dto:500, monto:1500, obs:'Descuento cliente frecuente.',      reg:'Mar 13 May 2025, 10:25' },
    { id:8,  cliente:'Lucía Morales',   tipo:'registrado', ini:'LM', col:'oklch(50% 0.17 22)',    servicios:[{n:'Barba',p:2500}],                    barbero:BARB.carlos,  fecha:'Vie 16 May', hora:'10:00', pago:'efectivo',       pagoD:null,                    dto:0,   monto:2500, obs:'',                              reg:'Vie 16 May 2025, 10:22' },
    { id:9,  cliente:'Sofía Herrera',   tipo:'registrado', ini:'SH', col:'oklch(36% 0.13 290)',   servicios:[{n:'Corte',p:3500},{n:'Cejas',p:1500}], barbero:BARB.agustin, fecha:'Jue 15 May', hora:'11:00', pago:'mixto',          pagoD:{ef:2500,tr:2500},       dto:0,   monto:5000, obs:'',                              reg:'Jue 15 May 2025, 11:28' },
    { id:10, cliente:'Rodrigo Castro',  tipo:'registrado', ini:'RC', col:'oklch(42% 0.14 145)',   servicios:[{n:'Corte',p:3500},{n:'Barba',p:2500}], barbero:BARB.carlos,  fecha:'Sáb 17 May', hora:'11:00', pago:'transferencia',  pagoD:null,                    dto:0,   monto:6000, obs:'',                              reg:'Sáb 17 May 2025, 11:22' }
  ];

  let pendientesData = [
    { id:'p1', cliente:'Sofía Herrera', ini:'SH', col:'oklch(36% 0.13 290)', servicios:[{n:'Cejas',p:1500}],  barbero:BARB.agustin, fecha:'Hoy', hora:'10:00' },
    { id:'p2', cliente:'Carlos Pérez',  ini:'CP', col:'var(--blue-600)',      servicios:[{n:'Barba',p:2500}],  barbero:BARB.facundo, fecha:'Hoy', hora:'11:00' }
  ];

  let nextId = 11;
  var cobroTurnoId = null;
  var cobroSubtotal = 0;
  var cobroMedioActual = 'efectivo';
  let filteredCobros = [...cobrosData];

  /* ──────────────────────────────────────
     HELPERS
  ────────────────────────────────────── */
  function fm(n) {
    return '$' + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  }

  function pagoHtml(pago, pagoD, small) {
    const sz = small ? 'font-size:11px' : '';
    if (pago === 'efectivo')     return `<span class="pago-tipo-pill pago-efectivo" style="${sz}">Efectivo</span>`;
    if (pago === 'transferencia') return `<span class="pago-tipo-pill pago-transfer" style="${sz}">Transferencia</span>`;
    if (pago === 'mixto') {
      let sub = pagoD ? `<div class="pago-mixto-sub">Ef. ${fm(pagoD.ef)} / Tr. ${fm(pagoD.tr)}</div>` : '';
      return `<span class="pago-tipo-pill pago-mixto" style="${sz}">Mixto</span>${sub}`;
    }
    return '';
  }

  /* ──────────────────────────────────────
     SIDEBAR
  ────────────────────────────────────── */
  function openSidebar() {
    document.getElementById('sidebar').classList.add('open');
    document.getElementById('sidebarOverlay').classList.add('open');
  }
  function closeSidebar() {
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('sidebarOverlay').classList.remove('open');
  }

  /* ──────────────────────────────────────
     RENDER PENDIENTES
  ────────────────────────────────────── */
  function renderPendientes() {
    const list = document.getElementById('pendientesList');
    const badge = document.getElementById('pendientesBadge');
    const stat = document.getElementById('statPendientes');
    badge.textContent = pendientesData.length;
    stat.textContent  = pendientesData.length;

    if (pendientesData.length === 0) {
      list.innerHTML = `<div style="background:var(--paper);border:1px solid var(--rule);border-radius:12px;padding:20px;text-align:center;color:var(--ink-mute);font-size:13px">Sin cobros pendientes</div>`;
      return;
    }

    list.innerHTML = pendientesData.map(p => {
      const svcs = p.servicios.map(s => s.n).join(' + ');
      const subtotal = p.servicios.reduce((acc, s) => acc + s.p, 0);
      return `
        <div class="pending-card">
          <div class="p-avatar" style="background:${p.col}">${p.ini}</div>
          <div class="p-info">
            <div class="p-name">${p.cliente}</div>
            <div class="p-meta">${svcs} &mdash; ${p.barbero.nombre} &mdash; ${p.fecha} ${p.hora}</div>
          </div>
          <div class="p-price">${fm(subtotal)}</div>
          <button class="btn btn-gold btn-sm" onclick="openCobro('${p.id}')">Cobrar</button>
        </div>`;
    }).join('');
  }

  /* ──────────────────────────────────────
     RENDER TABLE
  ────────────────────────────────────── */
  function renderTable(data) {
    filteredCobros = data;
    const tbody = document.getElementById('cobrosTableBody');

    tbody.innerHTML = data.map(c => {
      const svcs = c.servicios.map(s => s.n).join(' + ');
      const tipoTag = c.tipo === 'rapido'
        ? `<div class="t-quick">Turno rápido</div>` : '';
      const dtoTag = c.dto > 0
        ? `<span style="font-size:11px;color:var(--green-deep);margin-left:6px">−${fm(c.dto)}</span>` : '';

      return `
        <tr>
          <td>
            <div class="user-cell">
              <div class="t-avatar" style="background:${c.col}">${c.ini}</div>
              <div>
                <div class="t-name">${c.cliente}</div>
                ${tipoTag}
              </div>
            </div>
          </td>
          <td><span class="t-secondary">${svcs}${dtoTag}</span></td>
          <td>
            <div class="t-barbero-cell">
              <div class="t-barbero-av" style="background:${c.barbero.color}">${c.barbero.initials}</div>
              <span class="t-secondary">${c.barbero.nombre}</span>
            </div>
          </td>
          <td><span class="t-secondary">${c.fecha} ${c.hora}</span></td>
          <td>${pagoHtml(c.pago, c.pagoD, true)}</td>
          <td><span class="t-monto">${fm(c.monto)}</span></td>
          <td>
            <div class="act-wrap">
              <button class="act-btn" title="Ver detalle" onclick="openDetail(${c.id})">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              </button>
            </div>
          </td>
        </tr>`;
    }).join('');

    renderTotals(data);
  }

  function renderTotals(data) {
    const tfoot = document.getElementById('cobrosTableFoot');
    const ef  = data.filter(c => c.pago === 'efectivo').reduce((s,c) => s+c.monto, 0);
    const tr  = data.filter(c => c.pago === 'transferencia').reduce((s,c) => s+c.monto, 0);
    const mx  = data.filter(c => c.pago === 'mixto').reduce((s,c) => s+c.monto, 0);
    const tot = ef + tr + mx;

    tfoot.innerHTML = `
      <tr>
        <td colspan="4" style="text-align:right">
          <span class="totals-label">Efectivo: <strong class="totals-val">${fm(ef)}</strong></span>
          &nbsp;&nbsp;|&nbsp;&nbsp;
          <span class="totals-label">Transferencia: <strong class="totals-val">${fm(tr)}</strong></span>
          &nbsp;&nbsp;|&nbsp;&nbsp;
          <span class="totals-label">Mixto: <strong class="totals-val">${fm(mx)}</strong></span>
        </td>
        <td colspan="2">
          <span style="font-size:12px;color:var(--ink-mute);font-weight:500">Gran total:&nbsp;</span>
          <strong style="font-size:15px;color:var(--green-deep)">${fm(tot)}</strong>
        </td>
        <td></td>
      </tr>`;
  }

  /* ──────────────────────────────────────
     FILTERS
  ────────────────────────────────────── */
  function applyFilters() {
    const search   = document.getElementById('searchCliente').value.toLowerCase();
    const fecha    = document.getElementById('filtFecha').value;
    const barbero  = document.getElementById('filtBarbero').value;
    const pago     = document.getElementById('filtPago').value;
    const servicio = document.getElementById('filtServicio').value;

    const filtered = cobrosData.filter(c => {
      if (search   && !c.cliente.toLowerCase().includes(search)) return false;
      if (fecha === 'hoy' && c.fecha !== 'Hoy') return false;
      if (barbero  && c.barbero.nombre !== barbero) return false;
      if (pago     && c.pago !== pago) return false;
      if (servicio && !c.servicios.some(s => s.n === servicio)) return false;
      return true;
    });

    renderTable(filtered);
  }

  function clearFilters() {
    document.getElementById('searchCliente').value = '';
    document.getElementById('filtFecha').value     = '';
    document.getElementById('filtBarbero').value   = '';
    document.getElementById('filtPago').value      = '';
    document.getElementById('filtServicio').value  = '';
    renderTable(cobrosData);
  }

  /* ──────────────────────────────────────
     DETAIL PANEL
  ────────────────────────────────────── */
  function openDetail(id) {
    const c = cobrosData.find(x => x.id === id);
    if (!c) return;

    const subtotal = c.servicios.reduce((s, sv) => s + sv.p, 0);
    const svcsHtml = c.servicios.map(sv =>
      `<div class="cobro-svc-row"><span class="cobro-svc-name">${sv.n}</span><span class="cobro-svc-price">${fm(sv.p)}</span></div>`
    ).join('');

    const dtoHtml = c.dto > 0 ? `
      <div class="cobro-svc-row" style="color:var(--green-deep);margin-top:4px">
        <span>Descuento aplicado</span><span>&minus; ${fm(c.dto)}</span>
      </div>` : '';

    const tipoHtml = c.tipo === 'registrado'
      ? `<span class="d-badge d-badge-reg">Registrado</span>`
      : `<span class="d-badge d-badge-quick">Turno rápido</span>`;

    let pagoDetalleHtml = '';
    if (c.pago === 'mixto' && c.pagoD) {
      pagoDetalleHtml = `<div style="font-size:12px;color:var(--ink-mute);margin-top:6px">Efectivo: ${fm(c.pagoD.ef)} &nbsp;/&nbsp; Transferencia: ${fm(c.pagoD.tr)}</div>`;
    }

    const obsHtml = c.obs ? `
      <div class="d-section">
        <div class="d-section-label">Observaciones</div>
        <div style="font-size:13px;color:var(--ink-soft);line-height:1.5">${c.obs}</div>
      </div>` : '';

    document.getElementById('detailBody').innerHTML = `
      <div class="detail-user-top">
        <div class="d-avatar" style="background:${c.col}">${c.ini}</div>
        <div class="d-name">${c.cliente}</div>
        ${tipoHtml}
      </div>

      <div class="d-section">
        <div class="d-section-label">Turno asociado</div>
        <div class="d-field-label">Servicio/s</div>
        <div class="d-field-value" style="margin-bottom:8px">${c.servicios.map(s=>s.n).join(' + ')}</div>
        <div class="d-field-label">Barbero</div>
        <div class="d-field-value" style="display:flex;align-items:center;gap:7px;margin-bottom:8px">
          <div style="width:22px;height:22px;border-radius:50%;background:${c.barbero.color};display:grid;place-items:center;font-size:8px;font-weight:700;color:white;flex-shrink:0">${c.barbero.initials}</div>
          ${c.barbero.nombre}
        </div>
        <div class="d-field-label">Fecha y horario</div>
        <div class="d-field-value">${c.fecha} &mdash; ${c.hora}</div>
      </div>

      <div class="d-section">
        <div class="d-section-label">Detalle del cobro</div>
        <div style="background:var(--paper-2);border:1px solid var(--rule);border-radius:10px;padding:14px 16px">
          <div class="cobro-service-list">${svcsHtml}</div>
          <div class="cobro-subtotal"><span>Subtotal</span><span>${fm(subtotal)}</span></div>
          ${dtoHtml}
          <div class="cobro-total-row">
            <span class="cobro-total-label">Total cobrado</span>
            <span class="cobro-total-val">${fm(c.monto)}</span>
          </div>
          <div style="margin-top:10px;display:flex;align-items:flex-start;flex-direction:column;gap:4px">
            ${pagoHtml(c.pago, c.pagoD, false)}
            ${pagoDetalleHtml}
          </div>
        </div>
      </div>

      ${obsHtml}

      <div class="d-section">
        <div class="d-section-label">Registro</div>
        <div class="d-field-label">Fecha y hora exacta</div>
        <div class="d-field-value" style="font-size:13px">${c.reg}</div>
      </div>`;

    document.getElementById('detailPanel').classList.add('open');
    document.getElementById('detailOverlay').classList.add('open');
  }

  function closeDetail() {
    document.getElementById('detailPanel').classList.remove('open');
    document.getElementById('detailOverlay').classList.remove('open');
  }

  /* ─── COBRO MODAL ────────────────────────────── */
  function openCobro(pid) {
    var p = pendientesData.find(function(x) { return x.id === pid; });
    if (!p) return;
    cobroTurnoId = pid;

    var total = 0;
    var listHtml = p.servicios.map(function(s) {
      total += s.p;
      return '<div class="cobro-svc-row"><span class="cobro-svc-name">' + s.n + '</span><span class="cobro-svc-price">' + fm(s.p) + '</span></div>';
    }).join('');
    cobroSubtotal = total;

    document.getElementById('cobroSubtitle').textContent = p.cliente + ' · ' + p.servicios.map(function(s){return s.n;}).join(', ') + ' · ' + p.barbero.nombre + ' · ' + p.fecha;
    document.getElementById('cobroServiceList').innerHTML = listHtml;
    document.getElementById('cobroSubtotalVal').textContent = fm(cobroSubtotal);
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
    document.getElementById('cobroTotalVal').textContent = fm(total);
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
      fb.innerHTML = '<div class="form-warn">La suma (' + fm(suma) + ') no coincide con el total (' + fm(total) + ').</div>';
    }
  }

  function confirmarCobro() {
    if (!cobroTurnoId) return;

    var p = pendientesData.find(function(x) { return x.id === cobroTurnoId; });
    if (!p) return;

    var desc  = parseInt(document.getElementById('cobroDescuento').value) || 0;
    var total = Math.max(0, cobroSubtotal - desc);
    var pagoD = null;

    if (cobroMedioActual === 'mixto') {
      var ef = parseInt(document.getElementById('montoEfectivo').value) || 0;
      var tr = parseInt(document.getElementById('montoTransferencia').value) || 0;
      if (ef + tr !== total) { alert('Los montos del pago mixto no suman el total.'); return; }
      pagoD = { ef: ef, tr: tr };
    }

    var now = new Date();
    var timeStr = (now.getHours() < 10 ? '0' : '') + now.getHours() + ':' + (now.getMinutes() < 10 ? '0' : '') + now.getMinutes();

    cobrosData.unshift({
      id: nextId++,
      cliente: p.cliente, tipo: p.tipo || 'registrado',
      ini: p.ini, col: p.col,
      servicios: p.servicios.map(function(s) { return { n: s.n, p: s.p }; }),
      barbero: p.barbero,
      fecha: 'Hoy', hora: p.hora,
      pago: cobroMedioActual, pagoD: pagoD,
      dto: desc, monto: total, obs: '',
      reg: 'Hoy, ' + timeStr
    });

    pendientesData = pendientesData.filter(function(x) { return x.id !== cobroTurnoId; });
    cobroTurnoId = null;
    renderPendientes();
    applyFilters();
    closeCobro();
  }

  /* ──────────────────────────────────────
     INIT
  ────────────────────────────────────── */
  renderPendientes();
  renderTable(cobrosData);
</script>
</body>
</html>
