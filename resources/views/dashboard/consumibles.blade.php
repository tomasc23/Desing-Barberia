<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consumibles — Barber Brizu</title>
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
      display: grid; place-items: center; font-weight: 700; font-size: 12px;
      letter-spacing: 0.04em; flex-shrink: 0;
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
      display: none; flex-direction: column; gap: 5px; background: none;
      border: 1px solid var(--rule); cursor: pointer; padding: 7px 9px;
      border-radius: 8px; margin-right: 4px;
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
    .btn-gold:disabled { opacity: 0.45; cursor: not-allowed; }
    .btn-logout  { color: var(--red-deep); border-color: oklch(86% 0.06 22); }
    .btn-logout:hover { background: var(--red-soft); opacity: 1; }
    .close-btn {
      width: 28px; height: 28px; border-radius: 7px; border: 1px solid var(--rule);
      background: transparent; display: grid; place-items: center; cursor: pointer;
      font-size: 18px; color: var(--ink-mute); line-height: 1; font-family: inherit;
    }
    .close-btn:hover { background: var(--paper-2); }

    /* ── CONTENT ── */
    .content { padding: 80px 26px 40px; display: flex; flex-direction: column; gap: 18px; }
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

    /* ── LOW STOCK ALERT ── */
    .low-stock-alert {
      background: var(--gold-soft); border: 1px solid oklch(82% 0.1 86);
      border-radius: 12px; padding: 13px 18px;
      display: flex; align-items: center; gap: 13px;
    }
    .lsa-icon { font-size: 22px; flex-shrink: 0; }
    .lsa-text { flex: 1; font-size: 13.5px; color: var(--ink-soft); line-height: 1.5; }
    .lsa-text strong { color: var(--gold-deep); }

    /* ── TABS ── */
    .tabs-bar {
      display: flex; gap: 2px; background: var(--paper);
      border: 1px solid var(--rule); border-radius: 11px;
      padding: 4px; width: fit-content;
    }
    .tab-btn {
      padding: 7px 20px; border-radius: 8px; border: none;
      font-family: inherit; font-size: 13.5px; font-weight: 500;
      cursor: pointer; color: var(--ink-mute); background: transparent;
      transition: background 0.12s, color 0.12s;
    }
    .tab-btn.active { background: var(--blue-600); color: #fff; font-weight: 600; }
    .tab-pane { display: none; flex-direction: column; gap: 16px; }
    .tab-pane.active { display: flex; }

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
      border-bottom: 1px solid var(--rule); white-space: nowrap; background: var(--paper);
    }
    tbody tr { border-bottom: 1px solid var(--rule); transition: background 0.1s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: var(--paper-2); }
    tbody td { padding: 12px 16px; vertical-align: middle; }
    tfoot td { padding: 12px 16px; background: var(--paper-2); border-top: 2px solid var(--rule); font-weight: 600; }
    .t-secondary { font-size: 13px; color: var(--ink-soft); }
    .act-wrap { display: flex; gap: 5px; }
    .act-btn {
      width: 28px; height: 28px; border-radius: 7px; border: 1px solid var(--rule);
      background: transparent; color: var(--ink-mute); cursor: pointer;
      display: grid; place-items: center; transition: background 0.12s, color 0.12s, border-color 0.12s;
    }
    .act-btn:hover { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-100); }

    /* ── PAYMENT PILLS (table) ── */
    .pago-tipo-pill {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 3px 9px; border-radius: 999px; font-size: 11.5px; font-weight: 600; white-space: nowrap;
    }
    .pago-efectivo  { background: var(--green-soft); color: var(--green-deep); }
    .pago-transfer  { background: var(--blue-50);    color: var(--blue-600); }
    .pago-mixto     { background: var(--violet-soft); color: var(--violet-deep); }
    .pago-mixto-sub { font-size: 11px; color: var(--ink-mute); margin-top: 3px; }
    .totals-label { font-size: 12px; color: var(--ink-mute); font-weight: 500; }
    .totals-val   { font-weight: 700; color: var(--ink); }

    /* ── SALE LAYOUT ── */
    .sale-layout {
      display: grid; grid-template-columns: 1fr 1fr; gap: 16px; align-items: start;
    }
    .sale-panel {
      background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; overflow: hidden;
    }
    .sale-panel-hd {
      padding: 14px 18px; border-bottom: 1px solid var(--rule);
      font-size: 14px; font-weight: 600; display: flex; align-items: center; justify-content: space-between;
    }
    .sale-panel-body { padding: 16px 18px; }

    /* ── CATALOG GRID ── */
    .catalog-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .catalog-card {
      border: 1.5px solid var(--rule); border-radius: 10px;
      padding: 13px 14px; cursor: pointer; transition: border-color 0.15s, box-shadow 0.12s;
      background: var(--paper);
    }
    .catalog-card:hover { border-color: var(--blue-200); box-shadow: 0 2px 8px oklch(40% 0.17 252 / 0.08); }
    .catalog-card.selected { border-color: var(--blue-600); background: var(--blue-50); }
    .cc-name  { font-size: 13px; font-weight: 600; line-height: 1.2; }
    .cc-brand { font-size: 11.5px; color: var(--ink-mute); margin-top: 2px; }
    .cc-price { font-size: 15px; font-weight: 700; color: var(--blue-600); margin-top: 8px; }
    .cc-stock { font-size: 12px; margin-top: 3px; font-weight: 500; }
    .cc-stock.ok  { color: var(--green-deep); }
    .cc-stock.low { color: var(--red-deep); }

    /* ── CART ── */
    .cart-empty {
      padding: 36px 16px; text-align: center; color: var(--ink-mute); font-size: 13px; line-height: 1.7;
    }
    .cart-items { display: flex; flex-direction: column; }
    .cart-item {
      display: flex; align-items: center; gap: 10px;
      padding: 11px 0; border-bottom: 1px solid var(--rule);
    }
    .cart-item:last-child { border-bottom: none; }
    .ci-info { flex: 1; min-width: 0; }
    .ci-name  { font-size: 13px; font-weight: 600; line-height: 1.2; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .ci-brand { font-size: 11px; color: var(--ink-mute); }
    .qty-ctrl { display: flex; align-items: center; gap: 5px; flex-shrink: 0; }
    .qty-btn {
      width: 26px; height: 26px; border-radius: 6px; border: 1px solid var(--rule);
      background: var(--paper-2); font-family: inherit; font-size: 15px; font-weight: 600;
      cursor: pointer; display: grid; place-items: center; line-height: 1; color: var(--ink);
      transition: background 0.1s, border-color 0.1s, color 0.1s;
    }
    .qty-btn:hover { background: var(--blue-50); border-color: var(--blue-100); color: var(--blue-600); }
    .qty-num { font-size: 14px; font-weight: 700; min-width: 22px; text-align: center; }
    .ci-subtotal { font-size: 14px; font-weight: 700; white-space: nowrap; flex-shrink: 0; }
    .ci-remove {
      width: 24px; height: 24px; border-radius: 5px; border: 1px solid var(--rule);
      background: transparent; color: var(--ink-mute); cursor: pointer; font-family: inherit;
      font-size: 16px; display: grid; place-items: center; line-height: 1; flex-shrink: 0;
      transition: background 0.1s, color 0.1s, border-color 0.1s;
    }
    .ci-remove:hover { background: var(--red-soft); color: var(--red-deep); border-color: oklch(87% 0.05 22); }
    .cart-total-row {
      display: flex; justify-content: space-between; align-items: baseline;
      padding-top: 14px; border-top: 2px solid var(--rule); margin-top: 14px;
    }
    .cart-total-label { font-size: 15px; font-weight: 600; }
    .cart-total-val   { font-size: 22px; font-weight: 700; }

    /* ── PAYMENT PILLS (cart) ── */
    .pay-pills { display: flex; gap: 6px; }
    .pay-pill {
      flex: 1; padding: 9px 10px; border: 1.5px solid var(--rule); border-radius: 9px;
      font-family: inherit; font-size: 13px; font-weight: 500; cursor: pointer;
      background: var(--paper); color: var(--ink-mute); transition: all 0.12s; text-align: center;
    }
    .pay-pill.active { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-600); font-weight: 600; }
    .mixto-fields { margin-top: 10px; display: flex; flex-direction: column; gap: 10px; }
    .mixto-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }

    /* ── FORM ── */
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

    /* ── TOGGLE SWITCH ── */
    .toggle-wrap { display: flex; align-items: center; gap: 10px; }
    .toggle-sw {
      width: 40px; height: 22px; border-radius: 999px; background: var(--rule);
      border: none; cursor: pointer; position: relative; transition: background 0.15s; flex-shrink: 0;
    }
    .toggle-sw.on { background: var(--green); }
    .toggle-sw::after {
      content: ''; width: 16px; height: 16px; border-radius: 50%; background: white;
      position: absolute; top: 3px; left: 3px; transition: left 0.15s;
    }
    .toggle-sw.on::after { left: 21px; }
    .toggle-label { font-size: 13.5px; color: var(--ink-soft); }

    /* ── TOGGLE PILLS ── */
    .toggle-pills { display: flex; }
    .toggle-pill {
      flex: 1; padding: 8px 14px; border: 1.5px solid var(--rule); font-family: inherit;
      font-size: 13px; font-weight: 500; cursor: pointer; background: var(--paper);
      color: var(--ink-mute); text-align: center; transition: all 0.12s;
    }
    .toggle-pill:first-child { border-radius: 8px 0 0 8px; border-right-width: 0.75px; }
    .toggle-pill:last-child  { border-radius: 0 8px 8px 0; border-left-width: 0.75px; }
    .toggle-pill.active { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-600); font-weight: 600; z-index: 1; }

    /* ── STOCK PILLS ── */
    .pill-ok  { display:inline-flex;padding:3px 9px;border-radius:999px;font-size:11.5px;font-weight:600;background:var(--green-soft);color:var(--green-deep); }
    .pill-low { display:inline-flex;padding:3px 9px;border-radius:999px;font-size:11.5px;font-weight:600;background:var(--gold-soft);color:var(--gold-deep); }
    .pill-out { display:inline-flex;padding:3px 9px;border-radius:999px;font-size:11.5px;font-weight:600;background:var(--red-soft);color:var(--red-deep); }

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
    .d-section { margin-bottom: 18px; }
    .d-section-label {
      font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.09em;
      color: var(--ink-mute); margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid var(--rule);
    }
    .d-field-label { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-mute); margin-bottom: 2px; }
    .d-field-value { font-size: 13.5px; color: var(--ink); margin-bottom: 10px; }
    .det-svc-row { display: flex; justify-content: space-between; font-size: 13px; padding: 5px 0; border-bottom: 1px solid var(--rule); }
    .det-svc-row:last-child { border-bottom: none; }
    .det-total-row { display: flex; justify-content: space-between; align-items: center; padding-top: 10px; border-top: 2px solid var(--rule); margin-top: 6px; }
    .det-total-label { font-size: 15px; font-weight: 700; }
    .det-total-val   { font-size: 20px; font-weight: 700; color: var(--blue-600); }

    /* ── MODAL ── */
    .modal-overlay {
      position: fixed; inset: 0; background: oklch(16% 0.01 240 / 0.26);
      z-index: 50; display: grid; place-items: center;
      opacity: 0; pointer-events: none; transition: opacity 0.18s;
    }
    .modal-overlay.open { opacity: 1; pointer-events: all; }
    .modal {
      background: var(--paper); border: 1px solid var(--rule);
      border-radius: 18px; width: 460px; max-width: 96vw; max-height: 92vh; overflow-y: auto;
      transform: translateY(10px) scale(0.99);
      transition: transform 0.18s cubic-bezier(0.4, 0, 0.2, 1);
      scrollbar-width: thin; scrollbar-color: var(--rule) var(--paper-2);
    }
    .modal-overlay.open .modal { transform: none; }
    .modal-hd {
      padding: 20px 22px 16px; border-bottom: 1px solid var(--rule);
      display: flex; align-items: flex-start; justify-content: space-between;
      position: sticky; top: 0; background: var(--paper); z-index: 2; border-radius: 18px 18px 0 0;
    }
    .modal-hd-title { font-size: 16px; font-weight: 600; }
    .modal-hd-sub   { font-size: 12.5px; color: var(--ink-mute); margin-top: 2px; }
    .modal-bd { padding: 20px 22px; display: flex; flex-direction: column; gap: 16px; }
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

    /* ── SUCCESS MODAL ── */
    .success-icon-wrap {
      width: 64px; height: 64px; border-radius: 50%;
      background: var(--green-soft); border: 2px solid var(--green);
      display: grid; place-items: center; margin: 0 auto 14px;
    }
    .success-icon-wrap svg { animation: pop 0.3s cubic-bezier(0.34,1.56,0.64,1) both 0.1s; }
    @keyframes pop { from{transform:scale(0);opacity:0} to{transform:scale(1);opacity:1} }
    .exito-prod-row { display: flex; justify-content: space-between; font-size: 13px; padding: 5px 0; border-bottom: 1px solid var(--rule); }
    .exito-prod-row:last-child { border-bottom: none; }
    .exito-total-row { display: flex; justify-content: space-between; align-items: center; padding-top: 10px; border-top: 2px solid var(--rule); margin-top: 4px; }

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
      .sale-layout { grid-template-columns: 1fr !important; }
      .catalog-grid { grid-template-columns: 1fr !important; }
      .detail-panel { width: 100% !important; }
      .modal { width: 95vw !important; }
      .form-row { grid-template-columns: 1fr !important; }
      .pay-pills { flex-wrap: wrap; }
      .mixto-row { grid-template-columns: 1fr !important; }
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
        <a href="/dashboard/consumibles" class="nav-link active">
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

  <!-- ══ MAIN ══ -->
  <div class="main-area">

    <header class="topbar">
      <button class="topbar-hamburger" onclick="openSidebar()" aria-label="Abrir menú">
        <span></span><span></span><span></span>
      </button>
      <div class="topbar-title">
        <h1>Consumibles</h1>
        <div class="breadcrumb">Económico &rarr; Consumibles</div>
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
          <div class="section-title">Gestión de consumibles</div>
          <div class="section-sub">Vendé, registrá y controlá el stock de consumibles del local</div>
        </div>
      </div>

      <!-- ── ESTADÍSTICAS ── -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-label">Total vendido hoy</div>
          <div class="stat-value" id="statTotalHoy" style="color:var(--green-deep)">—</div>
          <div class="stat-sub">ingresos de consumibles</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Total esta semana</div>
          <div class="stat-value" id="statTotalSemana" style="color:var(--blue-600)">—</div>
          <div class="stat-sub">semana actual</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Bajo stock</div>
          <div class="stat-value" id="statBajoStock" style="color:var(--gold-deep)">—</div>
          <div class="stat-sub">productos bajo mínimo</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Ventas de hoy</div>
          <div class="stat-value" id="statVentasHoy" style="color:var(--ink-mute)">—</div>
          <div class="stat-sub">registradas hoy</div>
        </div>
      </div>

      <!-- ── ALERTA BAJO STOCK ── -->
      <div class="low-stock-alert" id="lowStockAlert" style="display:none">
        <div class="lsa-icon">⚠️</div>
        <div class="lsa-text" id="lowStockText"></div>
        <a href="#invSection" class="btn btn-outline btn-sm" onclick="scrollToInv()">Ver inventario</a>
      </div>

      <!-- ── TABS ── -->
      <div class="tabs-bar">
        <button class="tab-btn active" id="tabBtnVenta"       onclick="switchTab('venta')">Venta rápida</button>
        <button class="tab-btn"        id="tabBtnHistorial"   onclick="switchTab('historial')">Historial de ventas</button>
        <button class="tab-btn"        id="tabBtnInventario"  onclick="switchTab('inventario')">Inventario</button>
      </div>

      <!-- ════ TAB 1: VENTA RÁPIDA ════ -->
      <div class="tab-pane active" id="paneVenta">

        <div class="sale-layout">

          <!-- CATÁLOGO -->
          <div class="sale-panel">
            <div class="sale-panel-hd">Seleccioná un producto</div>
            <div class="sale-panel-body">
              <div class="catalog-grid" id="catalogGrid"></div>
            </div>
          </div>

          <!-- CARRITO -->
          <div class="sale-panel">
            <div class="sale-panel-hd">
              Venta actual
              <span id="carritoCount" style="font-size:11.5px;color:var(--ink-mute);font-weight:400"></span>
            </div>
            <div class="sale-panel-body" id="cartBody">
              <div class="cart-empty" id="cartEmpty">
                <span style="font-size:28px;display:block;margin-bottom:8px">🛒</span>
                Seleccioná productos del catálogo<br>para comenzar
              </div>
              <div class="cart-items" id="cartItems" style="display:none"></div>

              <div id="cartFooter" style="display:none">
                <div class="cart-total-row">
                  <span class="cart-total-label">Total</span>
                  <span class="cart-total-val" id="cartTotal">$0</span>
                </div>

                <div style="margin-top:16px">
                  <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.09em;color:var(--ink-mute);margin-bottom:8px">Medio de pago</div>
                  <div class="pay-pills">
                    <button class="pay-pill active" id="payEfectivo"     onclick="setMedioPago('efectivo')">Efectivo</button>
                    <button class="pay-pill"        id="payTransferencia" onclick="setMedioPago('transferencia')">Transferencia</button>
                    <button class="pay-pill"        id="payMixto"         onclick="setMedioPago('mixto')">Pago mixto</button>
                  </div>
                  <div id="mixtoFields" style="display:none" class="mixto-fields">
                    <div class="mixto-row">
                      <div class="form-group">
                        <label class="form-label">Monto efectivo $</label>
                        <input type="number" class="form-input" id="mixtoEf" value="0" min="0" oninput="checkMixtoVenta()">
                      </div>
                      <div class="form-group">
                        <label class="form-label">Monto transferencia $</label>
                        <input type="number" class="form-input" id="mixtoTr" value="0" min="0" oninput="checkMixtoVenta()">
                      </div>
                    </div>
                    <div id="mixtoFeedback"></div>
                  </div>
                </div>

                <button class="btn btn-gold" id="btnConfirmarVenta"
                  style="width:100%;justify-content:center;margin-top:16px;padding:12px 20px;font-size:14px"
                  onclick="confirmarVenta()">
                  Confirmar venta
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ════ TAB 2: HISTORIAL ════ -->
      <div class="tab-pane" id="paneHistorial">

        <div class="toolbar">
          <div class="search-wrap">
            <svg class="search-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" id="hSearch" class="tb-input" placeholder="Buscar por producto..." oninput="applyHistorialFilters()">
          </div>
          <select class="tb-select" id="hFecha" onchange="applyHistorialFilters()">
            <option value="">Todas las fechas</option>
            <option value="hoy">Hoy</option>
            <option value="semana">Esta semana</option>
            <option value="mes">Este mes</option>
          </select>
          <select class="tb-select" id="hPago" onchange="applyHistorialFilters()">
            <option value="">Todos los medios</option>
            <option value="efectivo">Efectivo</option>
            <option value="transferencia">Transferencia</option>
            <option value="mixto">Mixto</option>
          </select>
          <button class="btn btn-outline btn-sm" onclick="clearHistorialFilters()">Limpiar filtros</button>
        </div>

        <div class="table-card table-wrap">
          <table>
            <thead>
              <tr>
                <th>Productos vendidos</th>
                <th>Total</th>
                <th>Medio de pago</th>
                <th>Registrado por</th>
                <th>Fecha y hora</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="histTableBody"></tbody>
            <tfoot id="histTableFoot"></tfoot>
          </table>
        </div>
      </div>

      <!-- ════ TAB 3: INVENTARIO ════ -->
      <div class="tab-pane" id="paneInventario">
        <div class="inv-section" id="invSection">
          <div class="inv-header">
            <div>
              <div class="section-title" style="font-size:17px">Inventario de consumibles</div>
              <div class="section-sub">Stock actual, precios y configuración de mínimos</div>
            </div>
            <button class="btn btn-gold" onclick="openModalNuevo()">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
              Nuevo consumible +
            </button>
          </div>

          <div class="table-card table-wrap">
            <table style="min-width:780px">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Precio unitario</th>
                  <th>Stock actual</th>
                  <th>Stock mínimo</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody id="invTableBody"></tbody>
            </table>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

<!-- ══ DETAIL OVERLAY ══ -->
<div class="detail-overlay" id="detailOverlay" onclick="closeDetalleVenta()"></div>
<div class="detail-panel" id="detailPanel">
  <div class="detail-hd">
    <span class="detail-hd-title">Detalle de venta</span>
    <button class="close-btn" onclick="closeDetalleVenta()">&times;</button>
  </div>
  <div class="detail-body" id="detailBody"></div>
</div>

<!-- ══ MODAL: NUEVO CONSUMIBLE ══ -->
<div class="modal-overlay" id="moNuevo">
  <div class="modal">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title">Nuevo consumible</div>
        <div class="modal-hd-sub">Agregá un producto al inventario</div>
      </div>
      <button class="close-btn" onclick="closeModalNuevo()">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Nombre</label>
          <input type="text" class="form-input" id="nNombre" placeholder="Ej. Agua mineral">
        </div>
        <div class="form-group">
          <label class="form-label">Marca</label>
          <input type="text" class="form-input" id="nMarca" placeholder="Ej. Villavicencio">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Precio unitario $</label>
          <input type="number" class="form-input" id="nPrecio" placeholder="500" min="0">
        </div>
        <div class="form-group">
          <label class="form-label">Stock actual</label>
          <input type="number" class="form-input" id="nStock" placeholder="12" min="0">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Stock mínimo</label>
          <input type="number" class="form-input" id="nStockMin" placeholder="6" min="0">
        </div>
        <div class="form-group" style="justify-content:flex-end">
          <label class="form-label">Estado</label>
          <div class="toggle-wrap" style="padding-top:8px">
            <button class="toggle-sw on" id="nToggle" onclick="toggleNuevo(this)"></button>
            <span class="toggle-label" id="nToggleLabel">Activo</span>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeModalNuevo()">Cancelar</button>
      <button class="btn btn-gold" onclick="guardarNuevoConsumible()">Crear consumible</button>
    </div>
  </div>
</div>

<!-- ══ MODAL: EDITAR CONSUMIBLE ══ -->
<div class="modal-overlay" id="moEditar">
  <div class="modal">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title">Editar consumible</div>
        <div class="modal-hd-sub" id="editSubtitle"></div>
      </div>
      <button class="close-btn" onclick="closeModalEditar()">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Nombre</label>
          <input type="text" class="form-input" id="eNombre">
        </div>
        <div class="form-group">
          <label class="form-label">Marca</label>
          <input type="text" class="form-input" id="eMarca">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Precio unitario $</label>
          <input type="number" class="form-input" id="ePrecio" min="0">
        </div>
        <div class="form-group">
          <label class="form-label">Stock mínimo</label>
          <input type="number" class="form-input" id="eStockMin" min="0">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Estado</label>
        <div class="toggle-wrap" style="padding-top:4px">
          <button class="toggle-sw on" id="eToggle" onclick="toggleEditar(this)"></button>
          <span class="toggle-label" id="eToggleLabel">Activo</span>
        </div>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeModalEditar()">Cancelar</button>
      <button class="btn btn-gold" onclick="guardarEditar()">Guardar cambios</button>
    </div>
  </div>
</div>

<!-- ══ MODAL: AJUSTAR STOCK ══ -->
<div class="modal-overlay" id="moAjuste">
  <div class="modal" style="width:400px">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title">Ajustar stock</div>
        <div class="modal-hd-sub" id="ajusteSubtitle"></div>
      </div>
      <button class="close-btn" onclick="closeModalAjuste()">&times;</button>
    </div>
    <div class="modal-bd">
      <div style="background:var(--paper-2);border:1px solid var(--rule);border-radius:10px;padding:12px 16px;display:flex;justify-content:space-between;align-items:center">
        <span style="font-size:13px;color:var(--ink-mute)">Stock actual</span>
        <span style="font-size:18px;font-weight:700" id="ajusteStockActual">—</span>
      </div>
      <div class="modal-section">
        <div class="modal-section-label">Modo de ajuste</div>
        <div class="toggle-pills">
          <button class="toggle-pill active" id="modoAgregar" onclick="setModoAjuste('agregar')">Agregar stock</button>
          <button class="toggle-pill"        id="modoManual"  onclick="setModoAjuste('manual')">Ajuste manual</button>
        </div>
      </div>
      <div id="ajusteCampoAgregar">
        <div class="form-group">
          <label class="form-label">Cantidad a agregar</label>
          <input type="number" class="form-input" id="ajusteCantidad" value="1" min="1" oninput="updateAjustePreview()">
        </div>
        <div style="margin-top:8px;font-size:13px;color:var(--ink-mute)">
          Nuevo stock: <strong id="ajusteNuevoStock" style="color:var(--green-deep)">—</strong>
        </div>
      </div>
      <div id="ajusteCampoManual" style="display:none">
        <div class="form-group">
          <label class="form-label">Nuevo stock total</label>
          <input type="number" class="form-input" id="ajusteManualVal" value="0" min="0">
        </div>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeModalAjuste()">Cancelar</button>
      <button class="btn btn-gold" onclick="confirmarAjuste()">Confirmar ajuste</button>
    </div>
  </div>
</div>

<!-- ══ MODAL: ÉXITO DE VENTA ══ -->
<div class="modal-overlay" id="moExito">
  <div class="modal" style="width:420px">
    <div class="modal-bd" style="padding-top:28px;text-align:center">
      <div class="success-icon-wrap">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--green-deep)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div style="font-size:19px;font-weight:700;letter-spacing:-0.01em;margin-bottom:4px">Venta registrada</div>
      <div style="font-size:13px;color:var(--ink-mute);margin-bottom:20px">El stock fue actualizado correctamente</div>

      <div style="background:var(--paper-2);border:1px solid var(--rule);border-radius:12px;padding:16px;text-align:left;margin-bottom:20px">
        <div style="font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:0.09em;color:var(--ink-mute);margin-bottom:10px">Resumen</div>
        <div id="exitoProductos" style="display:flex;flex-direction:column;gap:2px"></div>
        <div class="exito-total-row">
          <span style="font-size:14px;font-weight:700">Total cobrado</span>
          <span style="font-size:20px;font-weight:700;color:var(--blue-600)" id="exitoTotal"></span>
        </div>
        <div style="margin-top:10px" id="exitoPago"></div>
      </div>
    </div>
    <div class="modal-ft" style="justify-content:center">
      <button class="btn btn-gold" style="padding:10px 28px" onclick="closeModalExito()">Nueva venta</button>
    </div>
  </div>
</div>

<script>
/* ══════════════════════════════════════
   DATA
══════════════════════════════════════ */
var PRODUCTOS = [
  { id:1, nombre:'Agua mineral',        marca:'Villavicencio', precio:500,  stock:2,  stockMin:5,  activo:true },
  { id:2, nombre:'Gaseosa Cola',        marca:'Coca-Cola',     precio:800,  stock:1,  stockMin:6,  activo:true },
  { id:3, nombre:'Gaseosa Lima',        marca:'7UP',           precio:800,  stock:12, stockMin:6,  activo:true },
  { id:4, nombre:'Jugo naranja',        marca:'Cepita',        precio:700,  stock:8,  stockMin:4,  activo:true },
  { id:5, nombre:'Cerveza',             marca:'Quilmes',       precio:1200, stock:24, stockMin:12, activo:true },
  { id:6, nombre:'Cerveza sin alcohol', marca:'Heineken 0.0',  precio:1400, stock:6,  stockMin:6,  activo:true },
  { id:7, nombre:'Agua saborizada',     marca:'Ser',           precio:600,  stock:10, stockMin:5,  activo:true },
  { id:8, nombre:'Energizante',         marca:'Monster',       precio:1800, stock:4,  stockMin:6,  activo:true },
];

var VENTAS = [
  { id:1, prods:[{id:1,cant:2},{id:2,cant:1}], total:1800, pago:'efectivo',      pagoD:null,              reg:'Rodrigo Brizu', fecha:'Hoy 09:15',          periodo:'hoy'   },
  { id:2, prods:[{id:5,cant:3}],               total:3600, pago:'efectivo',      pagoD:null,              reg:'Rodrigo Brizu', fecha:'Hoy 10:30',          periodo:'hoy'   },
  { id:3, prods:[{id:4,cant:2}],               total:1400, pago:'transferencia', pagoD:null,              reg:'Rodrigo Brizu', fecha:'Hoy 11:00',          periodo:'hoy'   },
  { id:4, prods:[{id:8,cant:1},{id:7,cant:2}], total:3000, pago:'mixto',         pagoD:{ef:1500,tr:1500}, reg:'Rodrigo Brizu', fecha:'Hoy 12:45',          periodo:'hoy'   },
  { id:5, prods:[{id:5,cant:4},{id:3,cant:2}], total:6400, pago:'efectivo',      pagoD:null,              reg:'Rodrigo Brizu', fecha:'Ayer 15:30',         periodo:'semana'},
  { id:6, prods:[{id:1,cant:6}],               total:3000, pago:'transferencia', pagoD:null,              reg:'Rodrigo Brizu', fecha:'Ayer 16:00',         periodo:'semana'},
  { id:7, prods:[{id:6,cant:2}],               total:2800, pago:'efectivo',      pagoD:null,              reg:'Rodrigo Brizu', fecha:'Lun 12 May 14:00',   periodo:'mes'   },
  { id:8, prods:[{id:4,cant:3},{id:2,cant:2}], total:3700, pago:'transferencia', pagoD:null,              reg:'Rodrigo Brizu', fecha:'Lun 12 May 16:30',   periodo:'mes'   },
];

var nextVentaId = 9;
var nextProdId  = 9;
var carrito     = [];   /* [{id, cantidad}] */
var medioPago   = 'efectivo';
var ajusteId    = null;
var ajusteModo  = 'agregar';
var editId      = null;

/* ══════════════════════════════════════
   HELPERS
══════════════════════════════════════ */
function fm(n) {
  return '$' + Math.round(n).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

function getProducto(id) {
  return PRODUCTOS.find(function(p){ return p.id === id; });
}

function getLowStock() {
  return PRODUCTOS.filter(function(p){ return p.stock < p.stockMin && p.activo; });
}

function pagoHtml(pago, pagoD) {
  if (pago === 'efectivo')     return '<span class="pago-tipo-pill pago-efectivo">Efectivo</span>';
  if (pago === 'transferencia') return '<span class="pago-tipo-pill pago-transfer">Transferencia</span>';
  if (pago === 'mixto') {
    var sub = pagoD ? '<div class="pago-mixto-sub">Ef. '+fm(pagoD.ef)+' / Tr. '+fm(pagoD.tr)+'</div>' : '';
    return '<span class="pago-tipo-pill pago-mixto">Mixto</span>' + sub;
  }
  return '';
}

function prodNombresCant(prods) {
  return prods.map(function(p){
    var prod = getProducto(p.id);
    return prod ? (prod.nombre + ' x' + p.cant) : '';
  }).join('<br>');
}

/* ══════════════════════════════════════
   SIDEBAR
══════════════════════════════════════ */
function openSidebar() {
  document.getElementById('sidebar').classList.add('open');
  document.getElementById('sidebarOverlay').classList.add('open');
}
function closeSidebar() {
  document.getElementById('sidebar').classList.remove('open');
  document.getElementById('sidebarOverlay').classList.remove('open');
}

/* ══════════════════════════════════════
   TABS
══════════════════════════════════════ */
function switchTab(tab) {
  document.getElementById('paneVenta').classList.toggle('active',       tab === 'venta');
  document.getElementById('paneHistorial').classList.toggle('active',   tab === 'historial');
  document.getElementById('paneInventario').classList.toggle('active',  tab === 'inventario');
  document.getElementById('tabBtnVenta').classList.toggle('active',      tab === 'venta');
  document.getElementById('tabBtnHistorial').classList.toggle('active',  tab === 'historial');
  document.getElementById('tabBtnInventario').classList.toggle('active', tab === 'inventario');
}

/* ══════════════════════════════════════
   STATS + ALERT
══════════════════════════════════════ */
function updateStats() {
  var hoy    = VENTAS.filter(function(v){ return v.periodo === 'hoy'; });
  var semana = VENTAS.filter(function(v){ return v.periodo === 'hoy' || v.periodo === 'semana'; });
  var totalHoy    = hoy.reduce(function(s,v){ return s+v.total; }, 0);
  var totalSemana = VENTAS.reduce(function(s,v){ return s+v.total; }, 0);

  document.getElementById('statTotalHoy').textContent    = fm(totalHoy);
  document.getElementById('statTotalSemana').textContent = fm(totalSemana);
  document.getElementById('statBajoStock').textContent   = getLowStock().length;
  document.getElementById('statVentasHoy').textContent   = hoy.length;
}

function updateLowStockAlert() {
  var bajos = getLowStock();
  var alerta = document.getElementById('lowStockAlert');
  if (!bajos.length) { alerta.style.display = 'none'; return; }
  alerta.style.display = 'flex';
  var lista = bajos.map(function(p){ return p.nombre + ' (' + p.stock + ' unid.)'; }).join(', ');
  document.getElementById('lowStockText').innerHTML =
    '<strong>' + bajos.length + ' producto' + (bajos.length > 1 ? 's' : '') + ' con bajo stock:</strong> ' + lista;
}

function scrollToInv() {
  document.getElementById('invSection').scrollIntoView({ behavior:'smooth', block:'start' });
  return false;
}

/* ══════════════════════════════════════
   CATÁLOGO
══════════════════════════════════════ */
function renderCatalogo() {
  var grid = document.getElementById('catalogGrid');
  var inCart = carrito.map(function(c){ return c.id; });

  grid.innerHTML = PRODUCTOS.filter(function(p){ return p.activo; }).map(function(p) {
    var selected = inCart.indexOf(p.id) !== -1;
    var isLow    = p.stock < p.stockMin;
    var isOut    = p.stock === 0;
    var stockClass = (isLow || isOut) ? 'low' : 'ok';
    var stockText  = isOut ? 'Sin stock' : ('Stock: ' + p.stock + (isLow ? ' — bajo mínimo' : ''));
    var cls = 'catalog-card' + (selected ? ' selected' : '') + (isOut ? ' disabled' : '');
    return '<div class="'+cls+'" onclick="addToCarrito('+p.id+')" style="'+(isOut?'opacity:.55;cursor:not-allowed;':'')+'">'+
      '<div class="cc-name">'+p.nombre+'</div>'+
      '<div class="cc-brand">'+p.marca+'</div>'+
      '<div class="cc-price">'+fm(p.precio)+'</div>'+
      '<div class="cc-stock '+stockClass+'">'+stockText+'</div>'+
    '</div>';
  }).join('');
}

/* ══════════════════════════════════════
   CARRITO
══════════════════════════════════════ */
function addToCarrito(id) {
  var prod = getProducto(id);
  if (!prod || prod.stock === 0) return;
  var item = carrito.find(function(c){ return c.id === id; });
  if (item) {
    if (item.cantidad < prod.stock) item.cantidad++;
  } else {
    carrito.push({ id: id, cantidad: 1 });
  }
  renderCarrito();
  renderCatalogo();
}

function removeFromCarrito(id) {
  carrito = carrito.filter(function(c){ return c.id !== id; });
  renderCarrito();
  renderCatalogo();
}

function updateQty(id, delta) {
  var item = carrito.find(function(c){ return c.id === id; });
  var prod = getProducto(id);
  if (!item || !prod) return;
  item.cantidad += delta;
  if (item.cantidad < 1)           { removeFromCarrito(id); return; }
  if (item.cantidad > prod.stock)  { item.cantidad = prod.stock; }
  renderCarrito();
}

function renderCarrito() {
  var empty   = document.getElementById('cartEmpty');
  var items   = document.getElementById('cartItems');
  var footer  = document.getElementById('cartFooter');
  var count   = document.getElementById('carritoCount');
  var btnConf = document.getElementById('btnConfirmarVenta');

  if (!carrito.length) {
    empty.style.display  = '';
    items.style.display  = 'none';
    footer.style.display = 'none';
    count.textContent    = '';
    return;
  }

  empty.style.display  = 'none';
  items.style.display  = '';
  footer.style.display = '';
  count.textContent    = carrito.length + ' producto' + (carrito.length > 1 ? 's' : '');

  var total = 0;
  items.innerHTML = carrito.map(function(c) {
    var prod     = getProducto(c.id);
    var subtotal = prod.precio * c.cantidad;
    total += subtotal;
    return '<div class="cart-item">'+
      '<div class="ci-info">'+
        '<div class="ci-name">'+prod.nombre+'</div>'+
        '<div class="ci-brand">'+prod.marca+' &mdash; '+fm(prod.precio)+' c/u</div>'+
      '</div>'+
      '<div class="qty-ctrl">'+
        '<button class="qty-btn" onclick="updateQty('+c.id+',-1)">&#8722;</button>'+
        '<span class="qty-num">'+c.cantidad+'</span>'+
        '<button class="qty-btn" onclick="updateQty('+c.id+',1)">+</button>'+
      '</div>'+
      '<span class="ci-subtotal">'+fm(subtotal)+'</span>'+
      '<button class="ci-remove" onclick="removeFromCarrito('+c.id+')" title="Quitar">&times;</button>'+
    '</div>';
  }).join('');

  document.getElementById('cartTotal').textContent = fm(total);

  var canConfirm = carrito.length > 0;
  if (medioPago === 'mixto') {
    var ef = parseInt(document.getElementById('mixtoEf').value) || 0;
    var tr = parseInt(document.getElementById('mixtoTr').value) || 0;
    canConfirm = canConfirm && (ef + tr === total);
  }
  btnConf.disabled = !canConfirm;
}

function calcTotal() {
  return carrito.reduce(function(s, c) {
    var prod = getProducto(c.id);
    return s + (prod ? prod.precio * c.cantidad : 0);
  }, 0);
}

/* ══════════════════════════════════════
   MEDIO DE PAGO
══════════════════════════════════════ */
function setMedioPago(tipo) {
  medioPago = tipo;
  ['Efectivo','Transferencia','Mixto'].forEach(function(k) {
    document.getElementById('pay'+k).classList.toggle('active', k.toLowerCase() === tipo);
  });
  document.getElementById('mixtoFields').style.display = tipo === 'mixto' ? '' : 'none';
  if (tipo === 'mixto') checkMixtoVenta();
  else renderCarrito();
}

function checkMixtoVenta() {
  var total = calcTotal();
  var ef    = parseInt(document.getElementById('mixtoEf').value) || 0;
  var tr    = parseInt(document.getElementById('mixtoTr').value) || 0;
  var fb    = document.getElementById('mixtoFeedback');
  var btn   = document.getElementById('btnConfirmarVenta');
  if (ef + tr === total) {
    fb.innerHTML = '<div class="form-ok">Los montos coinciden con el total.</div>';
    btn.disabled = carrito.length === 0;
  } else {
    fb.innerHTML = '<div class="form-warn">La suma ('+fm(ef+tr)+') no coincide con el total ('+fm(total)+').</div>';
    btn.disabled = true;
  }
}

/* ══════════════════════════════════════
   CONFIRMAR VENTA
══════════════════════════════════════ */
function confirmarVenta() {
  if (!carrito.length) return;
  var total = calcTotal();
  var pagoD = null;

  if (medioPago === 'mixto') {
    var ef = parseInt(document.getElementById('mixtoEf').value) || 0;
    var tr = parseInt(document.getElementById('mixtoTr').value) || 0;
    if (ef + tr !== total) return;
    pagoD = { ef:ef, tr:tr };
  }

  var now = new Date();
  var hStr = (now.getHours()<10?'0':'')+now.getHours()+':'+(now.getMinutes()<10?'0':'')+now.getMinutes();

  var prodsVenta = carrito.map(function(c){ return { id:c.id, cant:c.cantidad }; });

  /* descuento de stock */
  carrito.forEach(function(c) {
    var prod = getProducto(c.id);
    if (prod) prod.stock -= c.cantidad;
  });

  VENTAS.unshift({
    id: nextVentaId++,
    prods: prodsVenta,
    total: total,
    pago: medioPago,
    pagoD: pagoD,
    reg: 'Rodrigo Brizu',
    fecha: 'Hoy ' + hStr,
    periodo: 'hoy'
  });

  openModalExito(prodsVenta, total, medioPago, pagoD);

  carrito = [];
  medioPago = 'efectivo';
  setMedioPago('efectivo');
  renderCarrito();
  renderCatalogo();
  updateStats();
  updateLowStockAlert();
  renderInventario();
  applyHistorialFilters();
}

/* ══════════════════════════════════════
   MODAL ÉXITO
══════════════════════════════════════ */
function openModalExito(prods, total, pago, pagoD) {
  var prodsHtml = prods.map(function(p) {
    var prod = getProducto(p.id);
    return '<div class="exito-prod-row">'+
      '<span>'+(prod?prod.nombre:'?')+' x'+p.cant+'</span>'+
      '<span style="color:var(--ink-soft)">'+(prod?fm(prod.precio*p.cant):'')+'</span>'+
    '</div>';
  }).join('');
  document.getElementById('exitoProductos').innerHTML = prodsHtml;
  document.getElementById('exitoTotal').textContent = fm(total);
  document.getElementById('exitoPago').innerHTML = pagoHtml(pago, pagoD);
  document.getElementById('moExito').classList.add('open');
}

function closeModalExito() {
  document.getElementById('moExito').classList.remove('open');
}

/* ══════════════════════════════════════
   HISTORIAL
══════════════════════════════════════ */
function applyHistorialFilters() {
  var search = document.getElementById('hSearch').value.toLowerCase();
  var fecha  = document.getElementById('hFecha').value;
  var pago   = document.getElementById('hPago').value;

  var data = VENTAS.filter(function(v) {
    if (pago && v.pago !== pago) return false;
    if (fecha === 'hoy'    && v.periodo !== 'hoy') return false;
    if (fecha === 'semana' && v.periodo === 'mes') return false;
    if (search) {
      var match = v.prods.some(function(p) {
        var prod = getProducto(p.id);
        return prod && prod.nombre.toLowerCase().indexOf(search) !== -1;
      });
      if (!match) return false;
    }
    return true;
  });
  renderHistorial(data);
}

function clearHistorialFilters() {
  document.getElementById('hSearch').value = '';
  document.getElementById('hFecha').value  = '';
  document.getElementById('hPago').value   = '';
  renderHistorial(VENTAS);
}

function renderHistorial(data) {
  var tbody = document.getElementById('histTableBody');

  if (!data.length) {
    tbody.innerHTML = '<tr><td colspan="6" style="text-align:center;padding:32px;color:var(--ink-mute)">Sin resultados</td></tr>';
    document.getElementById('histTableFoot').innerHTML = '';
    return;
  }

  tbody.innerHTML = data.map(function(v) {
    return '<tr>'+
      '<td style="font-size:13px;line-height:1.6">'+prodNombresCant(v.prods)+'</td>'+
      '<td style="font-size:14px;font-weight:700;color:var(--green-deep);white-space:nowrap">'+fm(v.total)+'</td>'+
      '<td>'+pagoHtml(v.pago, v.pagoD)+'</td>'+
      '<td class="t-secondary">'+v.reg+'</td>'+
      '<td class="t-secondary" style="white-space:nowrap">'+v.fecha+'</td>'+
      '<td><div class="act-wrap">'+
        '<button class="act-btn" title="Ver detalle" onclick="openDetalleVenta('+v.id+')">'+
          '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>'+
        '</button>'+
      '</div></td>'+
    '</tr>';
  }).join('');

  renderTotalesHistorial(data);
}

function renderTotalesHistorial(data) {
  var ef  = data.filter(function(v){ return v.pago==='efectivo';      }).reduce(function(s,v){ return s+v.total; },0);
  var tr  = data.filter(function(v){ return v.pago==='transferencia'; }).reduce(function(s,v){ return s+v.total; },0);
  var mx  = data.filter(function(v){ return v.pago==='mixto';         }).reduce(function(s,v){ return s+v.total; },0);
  var tot = ef + tr + mx;

  document.getElementById('histTableFoot').innerHTML =
    '<tr>'+
      '<td colspan="3" style="text-align:right">'+
        '<span class="totals-label">Efectivo: <strong class="totals-val">'+fm(ef)+'</strong></span>'+
        '&nbsp;&nbsp;|&nbsp;&nbsp;'+
        '<span class="totals-label">Transferencia: <strong class="totals-val">'+fm(tr)+'</strong></span>'+
        '&nbsp;&nbsp;|&nbsp;&nbsp;'+
        '<span class="totals-label">Mixto: <strong class="totals-val">'+fm(mx)+'</strong></span>'+
      '</td>'+
      '<td colspan="2">'+
        '<span style="font-size:12px;color:var(--ink-mute);font-weight:500">Gran total:&nbsp;</span>'+
        '<strong style="font-size:15px;color:var(--green-deep)">'+fm(tot)+'</strong>'+
      '</td>'+
      '<td></td>'+
    '</tr>';
}

/* ══════════════════════════════════════
   DETALLE DE VENTA
══════════════════════════════════════ */
function openDetalleVenta(id) {
  var v = VENTAS.find(function(x){ return x.id === id; });
  if (!v) return;

  var prodsHtml = v.prods.map(function(p) {
    var prod = getProducto(p.id);
    if (!prod) return '';
    return '<div class="det-svc-row">'+
      '<span>'+prod.nombre+' x'+p.cant+'</span>'+
      '<span style="font-size:12.5px;color:var(--ink-soft)">'+fm(prod.precio)+' c/u &mdash; '+fm(prod.precio*p.cant)+'</span>'+
    '</div>';
  }).join('');

  var pagoDetalleHtml = '';
  if (v.pago === 'mixto' && v.pagoD) {
    pagoDetalleHtml = '<div style="font-size:12px;color:var(--ink-mute);margin-top:6px">Efectivo: '+fm(v.pagoD.ef)+' &nbsp;/&nbsp; Transferencia: '+fm(v.pagoD.tr)+'</div>';
  }

  document.getElementById('detailBody').innerHTML =
    '<div class="d-section">'+
      '<div class="d-section-label">Productos vendidos</div>'+
      '<div style="background:var(--paper-2);border:1px solid var(--rule);border-radius:10px;padding:14px 16px">'+
        prodsHtml+
        '<div class="det-total-row">'+
          '<span class="det-total-label">Total</span>'+
          '<span class="det-total-val">'+fm(v.total)+'</span>'+
        '</div>'+
      '</div>'+
    '</div>'+
    '<div class="d-section">'+
      '<div class="d-section-label">Medio de pago</div>'+
      '<div>'+pagoHtml(v.pago, v.pagoD)+pagoDetalleHtml+'</div>'+
    '</div>'+
    '<div class="d-section">'+
      '<div class="d-section-label">Registro</div>'+
      '<div class="d-field-label">Registrado por</div>'+
      '<div class="d-field-value">'+v.reg+'</div>'+
      '<div class="d-field-label">Fecha y hora</div>'+
      '<div class="d-field-value">'+v.fecha+'</div>'+
    '</div>';

  document.getElementById('detailPanel').classList.add('open');
  document.getElementById('detailOverlay').classList.add('open');
}

function closeDetalleVenta() {
  document.getElementById('detailPanel').classList.remove('open');
  document.getElementById('detailOverlay').classList.remove('open');
}

/* ══════════════════════════════════════
   INVENTARIO
══════════════════════════════════════ */
function stockPill(p) {
  if (p.stock === 0)            return '<span class="pill-out">Sin stock</span>';
  if (p.stock < p.stockMin)     return '<span class="pill-low">Bajo stock</span>';
  return '<span class="pill-ok">OK</span>';
}

function stockColor(p) {
  if (p.stock === 0)        return 'color:var(--red-deep);font-weight:700';
  if (p.stock < p.stockMin) return 'color:var(--gold-deep);font-weight:700';
  return 'color:var(--green-deep);font-weight:700';
}

function renderInventario() {
  var tbody = document.getElementById('invTableBody');
  tbody.innerHTML = PRODUCTOS.map(function(p, i) {
    return '<tr>'+
      '<td>'+
        '<div style="font-size:13.5px;font-weight:600">'+p.nombre+'</div>'+
        '<div style="font-size:11.5px;color:var(--ink-mute)">'+p.marca+'</div>'+
      '</td>'+
      '<td style="font-weight:600">'+fm(p.precio)+'</td>'+
      '<td style="'+stockColor(p)+'">'+p.stock+'</td>'+
      '<td class="t-secondary">'+p.stockMin+'</td>'+
      '<td>'+stockPill(p)+'</td>'+
      '<td><div class="act-wrap">'+
        '<button class="act-btn" title="Editar" onclick="openModalEditar('+p.id+')">'+
          '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>'+
        '</button>'+
        '<button class="act-btn" title="Ajustar stock" onclick="openModalAjuste('+p.id+')">'+
          '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/></svg>'+
        '</button>'+
      '</div></td>'+
    '</tr>';
  }).join('');
}

/* ══════════════════════════════════════
   MODAL NUEVO CONSUMIBLE
══════════════════════════════════════ */
function openModalNuevo() {
  document.getElementById('nNombre').value  = '';
  document.getElementById('nMarca').value   = '';
  document.getElementById('nPrecio').value  = '';
  document.getElementById('nStock').value   = '';
  document.getElementById('nStockMin').value = '';
  var tog = document.getElementById('nToggle');
  tog.classList.add('on');
  document.getElementById('nToggleLabel').textContent = 'Activo';
  document.getElementById('moNuevo').classList.add('open');
}

function closeModalNuevo() {
  document.getElementById('moNuevo').classList.remove('open');
}

function toggleNuevo(btn) {
  btn.classList.toggle('on');
  document.getElementById('nToggleLabel').textContent = btn.classList.contains('on') ? 'Activo' : 'Inactivo';
}

function guardarNuevoConsumible() {
  var nombre   = document.getElementById('nNombre').value.trim();
  var marca    = document.getElementById('nMarca').value.trim();
  var precio   = parseInt(document.getElementById('nPrecio').value) || 0;
  var stock    = parseInt(document.getElementById('nStock').value)  || 0;
  var stockMin = parseInt(document.getElementById('nStockMin').value) || 0;
  var activo   = document.getElementById('nToggle').classList.contains('on');
  if (!nombre) return;
  PRODUCTOS.push({ id: nextProdId++, nombre:nombre, marca:marca, precio:precio, stock:stock, stockMin:stockMin, activo:activo });
  closeModalNuevo();
  renderCatalogo();
  renderInventario();
  updateStats();
  updateLowStockAlert();
}

/* ══════════════════════════════════════
   MODAL EDITAR CONSUMIBLE
══════════════════════════════════════ */
function openModalEditar(id) {
  var p = getProducto(id);
  if (!p) return;
  editId = id;
  document.getElementById('editSubtitle').textContent = p.nombre + ' — ' + p.marca;
  document.getElementById('eNombre').value   = p.nombre;
  document.getElementById('eMarca').value    = p.marca;
  document.getElementById('ePrecio').value   = p.precio;
  document.getElementById('eStockMin').value = p.stockMin;
  var tog = document.getElementById('eToggle');
  if (p.activo) tog.classList.add('on'); else tog.classList.remove('on');
  document.getElementById('eToggleLabel').textContent = p.activo ? 'Activo' : 'Inactivo';
  document.getElementById('moEditar').classList.add('open');
}

function closeModalEditar() {
  document.getElementById('moEditar').classList.remove('open');
  editId = null;
}

function toggleEditar(btn) {
  btn.classList.toggle('on');
  document.getElementById('eToggleLabel').textContent = btn.classList.contains('on') ? 'Activo' : 'Inactivo';
}

function guardarEditar() {
  var p = getProducto(editId);
  if (!p) return;
  p.nombre   = document.getElementById('eNombre').value.trim() || p.nombre;
  p.marca    = document.getElementById('eMarca').value.trim()  || p.marca;
  p.precio   = parseInt(document.getElementById('ePrecio').value)   || p.precio;
  p.stockMin = parseInt(document.getElementById('eStockMin').value) || 0;
  p.activo   = document.getElementById('eToggle').classList.contains('on');
  closeModalEditar();
  renderCatalogo();
  renderInventario();
  updateLowStockAlert();
  updateStats();
}

/* ══════════════════════════════════════
   MODAL AJUSTAR STOCK
══════════════════════════════════════ */
function openModalAjuste(id) {
  var p = getProducto(id);
  if (!p) return;
  ajusteId   = id;
  ajusteModo = 'agregar';
  document.getElementById('ajusteSubtitle').textContent = p.nombre + ' — ' + p.marca;
  document.getElementById('ajusteStockActual').textContent = p.stock;
  document.getElementById('ajusteCantidad').value = '1';
  document.getElementById('ajusteManualVal').value = p.stock;
  document.getElementById('modoAgregar').classList.add('active');
  document.getElementById('modoManual').classList.remove('active');
  document.getElementById('ajusteCampoAgregar').style.display = '';
  document.getElementById('ajusteCampoManual').style.display  = 'none';
  updateAjustePreview();
  document.getElementById('moAjuste').classList.add('open');
}

function closeModalAjuste() {
  document.getElementById('moAjuste').classList.remove('open');
  ajusteId = null;
}

function setModoAjuste(modo) {
  ajusteModo = modo;
  document.getElementById('modoAgregar').classList.toggle('active', modo === 'agregar');
  document.getElementById('modoManual').classList.toggle('active',  modo === 'manual');
  document.getElementById('ajusteCampoAgregar').style.display = modo === 'agregar' ? '' : 'none';
  document.getElementById('ajusteCampoManual').style.display  = modo === 'manual'  ? '' : 'none';
}

function updateAjustePreview() {
  var p   = getProducto(ajusteId);
  var qty = parseInt(document.getElementById('ajusteCantidad').value) || 0;
  document.getElementById('ajusteNuevoStock').textContent = p ? (p.stock + qty) : '—';
}

function confirmarAjuste() {
  var p = getProducto(ajusteId);
  if (!p) return;
  if (ajusteModo === 'agregar') {
    var qty = parseInt(document.getElementById('ajusteCantidad').value) || 0;
    p.stock += qty;
  } else {
    p.stock = parseInt(document.getElementById('ajusteManualVal').value) || 0;
  }
  closeModalAjuste();
  renderCatalogo();
  renderInventario();
  updateLowStockAlert();
  updateStats();
}

/* ══════════════════════════════════════
   CLOSE MODALS ON OVERLAY CLICK
══════════════════════════════════════ */
['moNuevo','moEditar','moAjuste','moExito'].forEach(function(id) {
  document.getElementById(id).addEventListener('click', function(e) {
    if (e.target === this) {
      if (id === 'moExito') closeModalExito();
      else if (id === 'moNuevo')  closeModalNuevo();
      else if (id === 'moEditar') closeModalEditar();
      else if (id === 'moAjuste') closeModalAjuste();
    }
  });
});

/* ══════════════════════════════════════
   INIT
══════════════════════════════════════ */
updateStats();
updateLowStockAlert();
renderCatalogo();
renderInventario();
renderHistorial(VENTAS);
</script>
</body>
</html>
