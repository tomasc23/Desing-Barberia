<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cierres económicos — Barber Brizu</title>
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
    body { font-family: 'Outfit', -apple-system, sans-serif; font-size: 14px; line-height: 1.5; color: var(--ink); background: var(--paper-2); }
    .layout { display: flex; min-height: 100vh; }

    /* ── SIDEBAR ── */
    .sidebar { width: 230px; height: 100vh; position: fixed; left: 0; top: 0; background: var(--paper); border-right: 1px solid var(--rule); display: flex; flex-direction: column; z-index: 20; overflow: hidden; }
    .sidebar-logo { height: 60px; padding: 0 16px; border-bottom: 1px solid var(--rule); display: flex; align-items: center; gap: 10px; flex-shrink: 0; }
    .logo-mark { width: 33px; height: 33px; border-radius: 9px; background: var(--blue-600); color: var(--paper); display: grid; place-items: center; font-weight: 700; font-size: 12px; letter-spacing: 0.04em; flex-shrink: 0; }
    .logo-name { font-weight: 600; font-size: 13.5px; letter-spacing: -0.01em; line-height: 1.2; }
    .logo-sub  { font-size: 11px; color: var(--ink-mute); margin-top: 1px; }
    .sidebar-nav { flex: 1; overflow-y: auto; padding: 6px 8px; scrollbar-width: none; }
    .sidebar-nav::-webkit-scrollbar { display: none; }
    .nav-group { margin-bottom: 2px; }
    .nav-group-label { font-size: 10px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: var(--ink-mute); padding: 10px 9px 4px; }
    .nav-link { display: flex; align-items: center; gap: 8px; padding: 7px 10px; border-radius: 8px; color: var(--ink-soft); font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none; transition: background 0.12s, color 0.12s; white-space: nowrap; }
    .nav-link:hover  { background: var(--paper-2); color: var(--ink); }
    .nav-link.active { background: var(--blue-50);  color: var(--blue-600); }
    .nav-link svg    { flex-shrink: 0; opacity: 0.7; }
    .nav-link.active svg { opacity: 1; }
    .nav-badge { margin-left: auto; background: var(--blue-600); color: var(--paper); font-size: 10px; font-weight: 700; padding: 2px 6px; border-radius: 999px; min-width: 18px; text-align: center; flex-shrink: 0; }
    .sidebar-user { padding: 13px 14px; border-top: 1px solid var(--rule); display: flex; align-items: center; gap: 10px; flex-shrink: 0; }
    .s-user-av { width: 32px; height: 32px; border-radius: 50%; background: var(--blue-600); color: var(--paper); display: grid; place-items: center; font-size: 11px; font-weight: 700; flex-shrink: 0; }
    .s-user-name { font-size: 13px; font-weight: 600; line-height: 1.2; }
    .s-user-role { font-size: 11px; color: var(--ink-mute); }

    /* ── MAIN / TOPBAR ── */
    .main-area { margin-left: 230px; min-height: 100vh; display: flex; flex-direction: column; flex: 1; min-width: 0; width: calc(100% - 230px); }
    .topbar { position: fixed; top: 0; left: 230px; right: 0; height: 60px; background: oklch(98.5% 0.004 240 / 0.92); backdrop-filter: blur(8px); border-bottom: 1px solid var(--rule); display: flex; align-items: center; justify-content: space-between; padding: 0 26px; z-index: 10; }
    .topbar-title h1 { font-size: 16px; font-weight: 600; letter-spacing: -0.01em; line-height: 1.2; }
    .breadcrumb { font-size: 11.5px; color: var(--ink-mute); margin-top: 1px; }
    .topbar-actions { display: flex; gap: 9px; align-items: center; }
    .topbar-hamburger { display: none; flex-direction: column; gap: 5px; background: none; border: 1px solid var(--rule); cursor: pointer; padding: 7px 9px; border-radius: 8px; margin-right: 4px; }
    .topbar-hamburger span { display: block; width: 18px; height: 2px; background: var(--ink); border-radius: 2px; }

    /* ── BUTTONS ── */
    .btn { padding: 8px 15px; border-radius: 9px; font-size: 13.5px; font-weight: 500; font-family: inherit; cursor: pointer; border: none; display: inline-flex; align-items: center; gap: 7px; transition: opacity 0.12s; line-height: 1; text-decoration: none; }
    .btn:hover { opacity: 0.78; }
    .btn-outline { background: transparent; color: var(--ink); border: 1px solid var(--rule); }
    .btn-sm   { padding: 6px 11px; font-size: 12px; border-radius: 7px; }
    .btn-xs   { padding: 4px 9px; font-size: 11.5px; border-radius: 6px; }
    .btn-gold { background: var(--gold); color: var(--ink); font-weight: 600; border: none; }
    .btn-gold:hover { opacity: 0.85; }
    .btn-gold:disabled { opacity: 0.45; cursor: not-allowed; }
    .btn-logout { color: var(--red-deep); border-color: oklch(86% 0.06 22); }
    .btn-logout:hover { background: var(--red-soft); opacity: 1; }
    .close-btn { width: 28px; height: 28px; border-radius: 7px; border: 1px solid var(--rule); background: transparent; display: grid; place-items: center; cursor: pointer; font-size: 18px; color: var(--ink-mute); line-height: 1; font-family: inherit; }
    .close-btn:hover { background: var(--paper-2); }

    /* ── CONTENT ── */
    .content { padding: 80px 26px 40px; display: flex; flex-direction: column; gap: 18px; }
    .section-header { display: flex; align-items: flex-end; justify-content: space-between; }
    .section-title { font-size: 19px; font-weight: 600; letter-spacing: -0.01em; line-height: 1.2; }
    .section-sub   { font-size: 12.5px; color: var(--ink-mute); margin-top: 3px; }

    /* ── COMISIÓN CARD ── */
    .comision-card { background: var(--paper); border: 1px solid var(--rule); border-radius: 12px; padding: 13px 18px; display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
    .comision-label { font-size: 13px; color: var(--ink-soft); flex-shrink: 0; }
    .comision-badge { background: var(--blue-50); color: var(--blue-600); border: 1px solid var(--blue-100); font-size: 12.5px; font-weight: 700; padding: 4px 12px; border-radius: 999px; white-space: nowrap; }
    .comision-note  { font-size: 11.5px; color: var(--ink-mute); margin-left: auto; }

    /* ── TABS ── */
    .tabs-bar { display: flex; gap: 2px; background: var(--paper); border: 1px solid var(--rule); border-radius: 11px; padding: 4px; width: fit-content; }
    .tab-btn { padding: 7px 20px; border-radius: 8px; border: none; font-family: inherit; font-size: 13.5px; font-weight: 500; cursor: pointer; color: var(--ink-mute); background: transparent; transition: background 0.12s, color 0.12s; }
    .tab-btn.active { background: var(--blue-600); color: #fff; font-weight: 600; }
    .tab-pane { display: none; flex-direction: column; gap: 18px; }
    .tab-pane.active { display: flex; }

    /* ── WEEK / MONTH NAVIGATOR ── */
    .period-nav { background: var(--paper); border: 1px solid var(--rule); border-radius: 12px; padding: 12px 18px; display: flex; align-items: center; gap: 12px; }
    .period-nav-btn { width: 32px; height: 32px; border-radius: 8px; border: 1px solid var(--rule); background: transparent; display: grid; place-items: center; cursor: pointer; color: var(--ink-soft); transition: background 0.12s; font-family: inherit; }
    .period-nav-btn:hover:not(:disabled) { background: var(--paper-2); color: var(--ink); }
    .period-nav-btn:disabled { opacity: 0.35; cursor: not-allowed; }
    .period-label { font-size: 14px; font-weight: 600; flex: 1; }

    /* ── STAT CARDS ── */
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
    .stat-card { background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; padding: 18px 20px; }
    .stat-label { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.09em; color: var(--ink-mute); }
    .stat-value { font-size: 26px; font-weight: 700; letter-spacing: -0.025em; margin-top: 5px; line-height: 1; }
    .stat-sub   { font-size: 12px; color: var(--ink-mute); margin-top: 5px; }

    /* ── BARBERO PRODUCTION CARDS ── */
    .prod-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
    .prod-card { background: var(--paper); border: 1px solid var(--rule); border-radius: 16px; overflow: hidden; }
    .prod-card-hd { padding: 16px 18px 12px; border-bottom: 1px solid var(--rule); display: flex; align-items: center; gap: 12px; }
    .prod-av { width: 42px; height: 42px; border-radius: 50%; display: grid; place-items: center; font-size: 13px; font-weight: 700; color: var(--paper); flex-shrink: 0; }
    .prod-name { font-size: 14px; font-weight: 600; line-height: 1.2; }
    .prod-turnos { font-size: 12px; color: var(--ink-mute); margin-top: 1px; }
    .prod-table { width: 100%; border-collapse: collapse; }
    .prod-table th { font-size: 10px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-mute); padding: 8px 18px 5px; text-align: left; border-bottom: 1px solid var(--rule); }
    .prod-table td { padding: 7px 18px; font-size: 13px; border-bottom: 1px solid var(--rule); }
    .prod-table tr:last-child td { border-bottom: none; }
    .prod-card-ft { padding: 14px 18px; border-top: 2px solid var(--rule); background: var(--paper-2); display: flex; flex-direction: column; gap: 8px; }
    .prod-ft-row { display: flex; justify-content: space-between; align-items: center; font-size: 13px; }
    .prod-ft-label { color: var(--ink-mute); }
    .prod-ft-val   { font-weight: 600; }
    .prod-cobrar-row { display: flex; justify-content: space-between; align-items: center; padding-top: 10px; border-top: 2px solid var(--rule); margin-top: 4px; }
    .prod-cobrar-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-mute); }
    .prod-cobrar-val { font-size: 20px; font-weight: 700; }

    /* ── LOCAL SUMMARY CARD ── */
    .local-card { background: var(--paper-2); border: 1px solid var(--rule); border-radius: 14px; padding: 20px 22px; }
    .local-title { font-size: 14px; font-weight: 600; margin-bottom: 14px; }
    .local-row { display: flex; justify-content: space-between; align-items: center; padding: 7px 0; border-bottom: 1px solid var(--rule); font-size: 13.5px; }
    .local-row:last-of-type { border-bottom: none; }
    .local-row-label { color: var(--ink-soft); }
    .local-row-val { font-weight: 600; }
    .local-total-row { display: flex; justify-content: space-between; align-items: center; padding-top: 14px; border-top: 2px solid var(--rule); margin-top: 10px; }
    .local-total-label { font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--ink-mute); }
    .local-total-val { font-size: 26px; font-weight: 700; color: var(--green-deep); }

    /* ── CIERRE REGISTER ── */
    .cierre-reg-row { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
    .cierre-reg-badge { background: var(--green-soft); color: var(--green-deep); border: 1px solid oklch(86% 0.07 145); font-size: 12.5px; font-weight: 700; padding: 5px 12px; border-radius: 999px; display: inline-flex; align-items: center; gap: 5px; }

    /* ── TOOLBAR ── */
    .toolbar { background: var(--paper); border: 1px solid var(--rule); border-radius: 12px; padding: 12px 16px; display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
    .search-wrap { position: relative; flex: 1; min-width: 160px; }
    .search-icon { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: var(--ink-mute); pointer-events: none; }
    .tb-input { width: 100%; padding: 8px 12px 8px 34px; border: 1px solid var(--rule); border-radius: 8px; font-family: inherit; font-size: 13.5px; color: var(--ink); background: var(--paper-2); outline: none; transition: border-color 0.12s; }
    .tb-input:focus { border-color: var(--blue-400); }
    .tb-select { padding: 8px 12px; border: 1px solid var(--rule); border-radius: 8px; font-family: inherit; font-size: 13.5px; color: var(--ink); background: var(--paper-2); outline: none; cursor: pointer; }
    .tb-date { padding: 8px 12px; border: 1px solid var(--rule); border-radius: 8px; font-family: inherit; font-size: 13px; color: var(--ink); background: var(--paper-2); outline: none; cursor: pointer; }

    /* ── TABLE ── */
    .table-wrap { overflow-x: auto; }
    .table-card { background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; overflow: hidden; }
    table { width: 100%; border-collapse: collapse; min-width: 700px; }
    thead th { padding: 11px 16px; text-align: left; font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-mute); border-bottom: 1px solid var(--rule); white-space: nowrap; background: var(--paper); }
    tbody tr { border-bottom: 1px solid var(--rule); transition: background 0.1s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: var(--paper-2); }
    tbody td { padding: 12px 16px; vertical-align: middle; }
    tfoot td { padding: 12px 16px; background: var(--paper-2); border-top: 2px solid var(--rule); font-weight: 600; }
    .t-secondary { font-size: 13px; color: var(--ink-soft); }
    .t-monto { font-size: 14px; font-weight: 700; white-space: nowrap; }
    .act-wrap { display: flex; gap: 5px; }
    .act-btn { width: 28px; height: 28px; border-radius: 7px; border: 1px solid var(--rule); background: transparent; color: var(--ink-mute); cursor: pointer; display: grid; place-items: center; transition: background 0.12s, color 0.12s, border-color 0.12s; }
    .act-btn:hover { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-100); }
    .totals-label { font-size: 12px; color: var(--ink-mute); font-weight: 500; }
    .totals-val   { font-weight: 700; color: var(--ink); }

    /* ── PILLS ── */
    .pill-reg  { display:inline-flex;padding:3px 10px;border-radius:999px;font-size:11.5px;font-weight:600;background:var(--green-soft);color:var(--green-deep); }
    .pill-pend { display:inline-flex;padding:3px 10px;border-radius:999px;font-size:11.5px;font-weight:600;background:var(--gold-soft);color:var(--gold-deep); }
    .pill-blue { display:inline-flex;padding:3px 10px;border-radius:999px;font-size:11.5px;font-weight:600;background:var(--blue-50);color:var(--blue-600); }
    .pill-red  { display:inline-flex;padding:3px 10px;border-radius:999px;font-size:11.5px;font-weight:600;background:var(--red-soft);color:var(--red-deep); }

    /* ── MONTHLY CARDS ── */
    .month-cards { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
    .month-card { background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; padding: 18px 20px; }
    .month-card-label { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.09em; color: var(--ink-mute); margin-bottom: 8px; }
    .month-card-val   { font-size: 28px; font-weight: 700; letter-spacing: -0.025em; line-height: 1; margin-bottom: 14px; }
    .mini-chart { display: flex; align-items: flex-end; gap: 6px; height: 50px; }
    .mini-bar-wrap { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 4px; }
    .mini-bar { width: 100%; border-radius: 4px 4px 0 0; background: var(--blue-600); min-height: 2px; transition: height 0.3s; }
    .mini-bar.empty { background: var(--rule); }
    .mini-bar-label { font-size: 10px; color: var(--ink-mute); text-align: center; white-space: nowrap; }

    /* ── DISTRIBUCIÓN BARS ── */
    .dist-section { background: var(--paper); border: 1px solid var(--rule); border-radius: 14px; padding: 20px 22px; display: flex; flex-direction: column; gap: 14px; }
    .dist-title { font-size: 14px; font-weight: 600; }
    .dist-item { display: flex; flex-direction: column; gap: 5px; }
    .dist-item-hd { display: flex; justify-content: space-between; align-items: center; font-size: 13px; }
    .dist-bar-track { height: 8px; background: var(--paper-2); border-radius: 999px; overflow: hidden; border: 1px solid var(--rule); }
    .dist-bar-fill  { height: 100%; border-radius: 999px; }

    /* ── DETAIL PANEL ── */
    .detail-overlay { position: fixed; inset: 0; background: oklch(16% 0.01 240 / 0.1); z-index: 30; opacity: 0; pointer-events: none; transition: opacity 0.2s; }
    .detail-overlay.open { opacity: 1; pointer-events: all; }
    .detail-panel { position: fixed; top: 0; right: 0; width: 400px; height: 100vh; background: var(--paper); border-left: 1px solid var(--rule); z-index: 40; transform: translateX(100%); transition: transform 0.22s cubic-bezier(0.4, 0, 0.2, 1); display: flex; flex-direction: column; }
    .detail-panel.open { transform: translateX(0); }
    .detail-hd { padding: 18px 18px 14px; border-bottom: 1px solid var(--rule); display: flex; align-items: center; justify-content: space-between; flex-shrink: 0; }
    .detail-hd-title { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-mute); }
    .detail-body { flex: 1; overflow-y: auto; padding: 20px; scrollbar-width: thin; scrollbar-color: var(--rule) var(--paper-2); }
    .d-section { margin-bottom: 18px; }
    .d-section-label { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.09em; color: var(--ink-mute); margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid var(--rule); }
    .d-field-label { font-size: 10.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-mute); margin-bottom: 2px; }
    .d-field-value { font-size: 13.5px; color: var(--ink); margin-bottom: 10px; }
    .d-row { display: flex; justify-content: space-between; align-items: center; font-size: 13px; padding: 6px 0; border-bottom: 1px solid var(--rule); }
    .d-row:last-child { border-bottom: none; }
    .d-total-row { display: flex; justify-content: space-between; align-items: center; padding-top: 10px; border-top: 2px solid var(--rule); margin-top: 6px; }

    /* ── MODAL ── */
    .modal-overlay { position: fixed; inset: 0; background: oklch(16% 0.01 240 / 0.26); z-index: 50; display: grid; place-items: center; opacity: 0; pointer-events: none; transition: opacity 0.18s; }
    .modal-overlay.open { opacity: 1; pointer-events: all; }
    .modal { background: var(--paper); border: 1px solid var(--rule); border-radius: 18px; width: 480px; max-width: 96vw; max-height: 92vh; overflow-y: auto; transform: translateY(10px) scale(0.99); transition: transform 0.18s cubic-bezier(0.4, 0, 0.2, 1); scrollbar-width: thin; scrollbar-color: var(--rule) var(--paper-2); }
    .modal-overlay.open .modal { transform: none; }
    .modal-hd { padding: 20px 22px 16px; border-bottom: 1px solid var(--rule); display: flex; align-items: flex-start; justify-content: space-between; position: sticky; top: 0; background: var(--paper); z-index: 2; border-radius: 18px 18px 0 0; }
    .modal-hd-title { font-size: 16px; font-weight: 600; }
    .modal-hd-sub   { font-size: 12.5px; color: var(--ink-mute); margin-top: 2px; }
    .modal-bd { padding: 20px 22px; display: flex; flex-direction: column; gap: 16px; }
    .modal-ft { padding: 14px 22px 20px; border-top: 1px solid var(--rule); display: flex; justify-content: flex-end; gap: 9px; position: sticky; bottom: 0; background: var(--paper); z-index: 2; border-radius: 0 0 18px 18px; }
    .modal-section { display: flex; flex-direction: column; gap: 11px; }
    .modal-section-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.09em; color: var(--ink-mute); padding-bottom: 7px; border-bottom: 1px solid var(--rule); }

    /* ── FORM ── */
    .form-row  { display: grid; grid-template-columns: 1fr 1fr; gap: 13px; }
    .form-group { display: flex; flex-direction: column; gap: 5px; }
    .form-label { font-size: 12.5px; font-weight: 500; color: var(--ink-soft); }
    .form-input { padding: 9px 12px; border: 1px solid var(--rule); border-radius: 8px; font-family: inherit; font-size: 13.5px; color: var(--ink); background: var(--paper); outline: none; width: 100%; transition: border-color 0.12s; }
    .form-input:focus { border-color: var(--blue-400); }
    .form-warn { font-size: 12px; color: var(--red-deep); padding: 10px 14px; background: var(--red-soft); border: 1px solid oklch(87% 0.05 22); border-radius: 8px; line-height: 1.5; }
    .form-range { width: 100%; accent-color: var(--blue-600); cursor: pointer; }
    .preset-pills { display: flex; gap: 7px; flex-wrap: wrap; }
    .preset-pill { padding: 6px 14px; border: 1.5px solid var(--rule); border-radius: 8px; font-family: inherit; font-size: 12.5px; font-weight: 500; cursor: pointer; background: var(--paper); color: var(--ink-mute); transition: all 0.12s; }
    .preset-pill:hover { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-100); }
    .preset-pill.active { background: var(--blue-50); color: var(--blue-600); border-color: var(--blue-600); font-weight: 600; }

    /* ── CONFIRM MODAL ── */
    .confirm-summary-box { background: var(--paper-2); border: 1px solid var(--rule); border-radius: 10px; padding: 14px 16px; display: flex; flex-direction: column; gap: 7px; }
    .confirm-row { display: flex; justify-content: space-between; font-size: 13px; }
    .confirm-check-wrap { display: flex; align-items: flex-start; gap: 10px; }
    .confirm-check { width: 16px; height: 16px; margin-top: 2px; accent-color: var(--blue-600); cursor: pointer; flex-shrink: 0; }
    .confirm-check-label { font-size: 13px; color: var(--ink-soft); line-height: 1.5; }
    .confirm-warn { font-size: 12px; color: var(--gold-deep); padding: 10px 14px; background: var(--gold-soft); border: 1px solid oklch(82% 0.1 86); border-radius: 8px; line-height: 1.5; }

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
      .prod-grid  { grid-template-columns: 1fr !important; }
      .month-cards { grid-template-columns: 1fr !important; }
      .content { padding: 72px 12px 32px !important; }
      .detail-panel { width: 100% !important; }
      .modal { width: 95vw !important; }
      .form-row { grid-template-columns: 1fr !important; }
      .toolbar { flex-wrap: wrap; }
      .tb-select, .tb-date { min-width: 0; flex: 1; }
      .tabs-bar { flex-wrap: wrap; }
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
        <a href="/dashboard/adelantos" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
          Adelantos
        </a>
        <a href="/dashboard/consumibles" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
          Consumibles
        </a>
        <a href="/dashboard/cierres" class="nav-link active">
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
        <h1>Cierres económicos</h1>
        <div class="breadcrumb">Económico &rarr; Cierres económicos</div>
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
          <div class="section-title">Cierres económicos</div>
          <div class="section-sub">Producción por barbero, balance del local y registro de cierres semanales</div>
        </div>
      </div>

      <!-- ── CONFIGURACIÓN DE COMISIÓN ── -->
      <div class="comision-card">
        <span class="comision-label">Distribución de ingresos configurada:</span>
        <span class="comision-badge" id="comisionBadge">50% barbero / 50% local</span>
        <button class="btn btn-outline btn-sm" onclick="openModalComision()">Modificar</button>
        <span class="comision-note">Esta configuración aplica a todos los barberos</span>
      </div>

      <!-- ── TABS ── -->
      <div class="tabs-bar">
        <button class="tab-btn active" id="tabBtnSemanal"   onclick="switchTab('semanal')">Cierre semanal</button>
        <button class="tab-btn"        id="tabBtnAnteriores" onclick="switchTab('anteriores')">Cierres anteriores</button>
        <button class="tab-btn"        id="tabBtnMensual"   onclick="switchTab('mensual')">Resumen mensual</button>
      </div>

      <!-- ════ TAB 1: CIERRE SEMANAL ════ -->
      <div class="tab-pane active" id="paneSemanal">

        <!-- SELECTOR SEMANA -->
        <div class="period-nav">
          <button class="period-nav-btn" id="btnSemAnterior" onclick="navSemana(-1)" title="Semana anterior">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
          </button>
          <span class="period-label" id="semanaLabel"></span>
          <button class="period-nav-btn" id="btnSemSiguiente" onclick="navSemana(1)" title="Semana siguiente">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
          </button>
          <button class="btn btn-outline btn-sm" onclick="goSemanaActual()">Semana actual</button>
        </div>

        <!-- STATS SEMANA -->
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-label">Ingresos por servicios</div>
            <div class="stat-value" id="sStatServicios" style="color:var(--green-deep)">—</div>
            <div class="stat-sub">semana seleccionada</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Ingresos por consumibles</div>
            <div class="stat-value" id="sStatConsumibles" style="color:var(--blue-600)">—</div>
            <div class="stat-sub">semana seleccionada</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Gastos y movimientos</div>
            <div class="stat-value" id="sStatGastos" style="color:var(--red-deep)">—</div>
            <div class="stat-sub">egresos internos</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Balance neto del local</div>
            <div class="stat-value" id="sStatBalance" style="color:var(--green-deep)">—</div>
            <div class="stat-sub">resultado neto</div>
          </div>
        </div>

        <!-- PRODUCCIÓN POR BARBERO -->
        <div>
          <div style="font-size:16px;font-weight:600;letter-spacing:-0.01em;margin-bottom:14px">Producción por barbero esta semana</div>
          <div class="prod-grid" id="prodGrid"></div>
        </div>

        <!-- RESUMEN DEL LOCAL -->
        <div class="local-card" id="localCard"></div>

        <!-- BOTÓN CIERRE -->
        <div class="cierre-reg-row" id="cierreRegRow"></div>

      </div>

      <!-- ════ TAB 2: CIERRES ANTERIORES ════ -->
      <div class="tab-pane" id="paneAnteriores">

        <div class="toolbar">
          <select class="tb-select" id="filtPeriodo" onchange="applyFiltros()">
            <option value="">Semana y mes</option>
            <option value="semana">Solo semanas</option>
            <option value="mes">Solo meses</option>
          </select>
          <select class="tb-select" id="filtBarberoAnt" onchange="applyFiltros()">
            <option value="">Todos los barberos</option>
            <option value="carlos">Carlos Medina</option>
            <option value="facundo">Facundo Torres</option>
            <option value="agustin">Agustín Romero</option>
          </select>
          <input type="date" class="tb-date" id="filtDesde" onchange="applyFiltros()">
          <input type="date" class="tb-date" id="filtHasta" onchange="applyFiltros()">
          <button class="btn btn-outline btn-sm" onclick="clearFiltros()">Limpiar</button>
        </div>

        <div class="table-card table-wrap">
          <table style="min-width:800px">
            <thead>
              <tr>
                <th>Período</th>
                <th>Ingresos servicios</th>
                <th>Ingresos consumibles</th>
                <th>Gastos</th>
                <th>Balance local</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="antTableBody"></tbody>
            <tfoot id="antTableFoot"></tfoot>
          </table>
        </div>

      </div>

      <!-- ════ TAB 3: RESUMEN MENSUAL ════ -->
      <div class="tab-pane" id="paneMensual">

        <!-- SELECTOR MES -->
        <div class="period-nav">
          <button class="period-nav-btn" onclick="navMes(-1)" title="Mes anterior">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
          </button>
          <span class="period-label" id="mesLabel"></span>
          <button class="period-nav-btn" id="btnMesSig" onclick="navMes(1)" title="Mes siguiente">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
          </button>
          <button class="btn btn-outline btn-sm" onclick="goMesActual()">Mes actual</button>
        </div>

        <!-- CARDS MENSUALES CON MINI GRÁFICOS -->
        <div class="month-cards" id="monthCards"></div>

        <!-- TABLA SEMANAL DEL MES -->
        <div>
          <div style="font-size:15px;font-weight:600;margin-bottom:12px">Desglose semanal</div>
          <div class="table-card table-wrap">
            <table style="min-width:650px">
              <thead>
                <tr>
                  <th>Semana</th>
                  <th>Ingresos servicios</th>
                  <th>Ingresos consumibles</th>
                  <th>Gastos</th>
                  <th>Balance</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody id="mesSemanasBody"></tbody>
              <tfoot id="mesSemanasFooter"></tfoot>
            </table>
          </div>
        </div>

        <!-- DISTRIBUCIÓN -->
        <div class="dist-section" id="distSection"></div>

        <!-- PRODUCCIÓN MENSUAL -->
        <div>
          <div style="font-size:15px;font-weight:600;margin-bottom:12px">Producción mensual por barbero</div>
          <div class="table-card table-wrap">
            <table style="min-width:700px">
              <thead>
                <tr>
                  <th>Barbero</th>
                  <th>Turnos atendidos</th>
                  <th>Producción bruta</th>
                  <th>Comisión</th>
                  <th>Adelantos</th>
                  <th>Neto cobrado</th>
                </tr>
              </thead>
              <tbody id="mesBarberosBody"></tbody>
            </table>
          </div>
        </div>

      </div>

    </main>
  </div>
</div>

<!-- ══ DETAIL OVERLAY + PANEL ══ -->
<div class="detail-overlay" id="detailOverlay" onclick="closeDetail()"></div>
<div class="detail-panel" id="detailPanel">
  <div class="detail-hd">
    <span class="detail-hd-title">Detalle del cierre</span>
    <button class="close-btn" onclick="closeDetail()">&times;</button>
  </div>
  <div class="detail-body" id="detailBody"></div>
</div>

<!-- ══ MODAL: CONFIGURAR COMISIÓN ══ -->
<div class="modal-overlay" id="moComision">
  <div class="modal">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title">Configurar distribución</div>
        <div class="modal-hd-sub">Establecé el porcentaje de comisión para todos los barberos</div>
      </div>
      <button class="close-btn" onclick="closeModalComision()">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="modal-section">
        <div class="modal-section-label">Presets rápidos</div>
        <div class="preset-pills">
          <button class="preset-pill active" id="preset5050" onclick="setPreset(50,50)">50 / 50</button>
          <button class="preset-pill"        id="preset6040" onclick="setPreset(60,40)">60 / 40</button>
          <button class="preset-pill"        id="preset7030" onclick="setPreset(70,30)">70 / 30</button>
        </div>
      </div>
      <div class="modal-section">
        <div class="modal-section-label">Configuración manual</div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">% Barbero</label>
            <input type="number" class="form-input" id="pctBarbero" min="0" max="100" value="50" oninput="syncComisionBarbero()">
          </div>
          <div class="form-group">
            <label class="form-label">% Local</label>
            <input type="number" class="form-input" id="pctLocal" min="0" max="100" value="50" oninput="syncComisionLocal()">
          </div>
        </div>
        <div id="comisionFeedback" style="margin-top:4px"></div>
        <div style="margin-top:10px">
          <input type="range" class="form-range" id="pctRange" min="0" max="100" value="50" oninput="syncComisionRange()">
          <div style="display:flex;justify-content:space-between;font-size:11.5px;color:var(--ink-mute);margin-top:4px">
            <span>Barbero <span id="rangeBarb">50</span>%</span>
            <span>Local <span id="rangeLocal">50</span>%</span>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeModalComision()">Cancelar</button>
      <button class="btn btn-gold" onclick="guardarComision()">Guardar configuración</button>
    </div>
  </div>
</div>

<!-- ══ MODAL: CONFIRMAR CIERRE ══ -->
<div class="modal-overlay" id="moConfirmarCierre">
  <div class="modal">
    <div class="modal-hd">
      <div>
        <div class="modal-hd-title">Confirmar cierre semanal</div>
        <div class="modal-hd-sub" id="confirmarCierreSubtitle"></div>
      </div>
      <button class="close-btn" onclick="closeModalCierre()">&times;</button>
    </div>
    <div class="modal-bd">
      <div class="confirm-summary-box" id="confirmarSummary"></div>
      <div class="confirm-warn">
        Una vez registrado el cierre no podrá modificarse. Verificá que todos los datos sean correctos.
      </div>
      <div class="confirm-check-wrap">
        <input type="checkbox" class="confirm-check" id="confirmarCheck" onchange="toggleBtnCierre()">
        <label class="confirm-check-label" for="confirmarCheck">Confirmo que los datos son correctos y autorizo el registro de este cierre</label>
      </div>
    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeModalCierre()">Cancelar</button>
      <button class="btn btn-gold" id="btnConfirmarCierre" disabled onclick="ejecutarCierre()">Confirmar y registrar cierre</button>
    </div>
  </div>
</div>

<script>
/* ══════════════════════════════════════
   ESTADO
══════════════════════════════════════ */
var pctBarbero = 50;
var semOffset  = 0;   /* 0 = semana actual, -1 = anterior */
var mesOffset  = 0;

var SEMANAS_DATA = {
  0:  { label:'Semana del 12 al 17 de mayo 2025', servicios:71000, consumibles:18600, gastos:12300, registrado:false, registradoEn:'', adelantos:15000,
        barberos:[
          { id:'carlos',  nombre:'Carlos Medina',  color:'var(--blue-600)',       ini:'CM', turnos:8, servicios:[{s:'Corte',q:4,t:14000},{s:'Barba',q:3,t:7500},{s:'Corte+Barba',q:1,t:6000}], bruto:27500, adelantos:7000 },
          { id:'facundo', nombre:'Facundo Torres', color:'oklch(35% 0.12 180)',   ini:'FT', turnos:6, servicios:[{s:'Barba',q:2,t:5000},{s:'Coloración',q:3,t:15000},{s:'Corte',q:1,t:3500}], bruto:23500, adelantos:3000 },
          { id:'agustin', nombre:'Agustín Romero', color:'oklch(36% 0.13 290)',   ini:'AR', turnos:4, servicios:[{s:'Cejas',q:2,t:3000},{s:'Corte',q:2,t:7000}], bruto:10000, adelantos:5000 },
        ]
      },
  '-1': { label:'Semana del 5 al 10 de mayo 2025', servicios:58000, consumibles:14200, gastos:9800, registrado:true, registradoEn:'Sáb 10 May 2025, 19:42', adelantos:12000,
        barberos:[
          { id:'carlos',  nombre:'Carlos Medina',  color:'var(--blue-600)',       ini:'CM', turnos:7, servicios:[{s:'Corte',q:3,t:10500},{s:'Barba',q:4,t:10000}], bruto:20500, adelantos:4000 },
          { id:'facundo', nombre:'Facundo Torres', color:'oklch(35% 0.12 180)',   ini:'FT', turnos:5, servicios:[{s:'Corte',q:2,t:7000},{s:'Coloración',q:2,t:10000},{s:'Barba',q:1,t:2500}], bruto:19500, adelantos:5000 },
          { id:'agustin', nombre:'Agustín Romero', color:'oklch(36% 0.13 290)',   ini:'AR', turnos:4, servicios:[{s:'Cejas',q:3,t:4500},{s:'Corte',q:1,t:3500}], bruto:8000, adelantos:3000 },
        ]
      },
  '-2': { label:'Semana del 28 de abril al 3 de mayo 2025', servicios:62500, consumibles:16800, gastos:11200, registrado:true, registradoEn:'Vie 3 May 2025, 20:15', adelantos:14000,
        barberos:[
          { id:'carlos',  nombre:'Carlos Medina',  color:'var(--blue-600)',       ini:'CM', turnos:8, servicios:[{s:'Corte',q:5,t:17500},{s:'Barba',q:3,t:7500}], bruto:25000, adelantos:5000 },
          { id:'facundo', nombre:'Facundo Torres', color:'oklch(35% 0.12 180)',   ini:'FT', turnos:6, servicios:[{s:'Coloración',q:4,t:20000},{s:'Corte',q:2,t:7000}], bruto:27000, adelantos:5000 },
          { id:'agustin', nombre:'Agustín Romero', color:'oklch(36% 0.13 290)',   ini:'AR', turnos:3, servicios:[{s:'Corte',q:2,t:7000},{s:'Cejas',q:1,t:1500}], bruto:8500, adelantos:4000 },
        ]
      },
};

var ANTERIORES = [
  { id:1, tipo:'semana', periodo:'Sem 5-10 May',         servicios:58000, consumibles:14200, gastos:9800,  balance:33100, estado:'registrado', registradoEn:'Sáb 10 May 2025, 19:42', reg:'Rodrigo Brizu',
    barberos:[
      { nombre:'Carlos Medina',  turnos:7, bruto:20500, comision:10250, adelantos:4000, neto:6250 },
      { nombre:'Facundo Torres', turnos:5, bruto:19500, comision:9750,  adelantos:5000, neto:4750 },
      { nombre:'Agustín Romero', turnos:4, bruto:8000,  comision:4000,  adelantos:3000, neto:1000 },
    ]
  },
  { id:2, tipo:'semana', periodo:'Sem 28 Abr-3 May',     servicios:62500, consumibles:16800, gastos:11200, balance:34050, estado:'registrado', registradoEn:'Vie 3 May 2025, 20:15', reg:'Rodrigo Brizu',
    barberos:[
      { nombre:'Carlos Medina',  turnos:8, bruto:25000, comision:12500, adelantos:5000, neto:7500 },
      { nombre:'Facundo Torres', turnos:6, bruto:27000, comision:13500, adelantos:5000, neto:8500 },
      { nombre:'Agustín Romero', turnos:3, bruto:8500,  comision:4250,  adelantos:4000, neto:250  },
    ]
  },
  { id:3, tipo:'semana', periodo:'Sem 21-26 Abr',        servicios:49000, consumibles:12400, gastos:8600,  balance:26200, estado:'registrado', registradoEn:'Sáb 26 Abr 2025, 18:55', reg:'Rodrigo Brizu',
    barberos:[
      { nombre:'Carlos Medina',  turnos:6, bruto:18000, comision:9000, adelantos:3000, neto:6000 },
      { nombre:'Facundo Torres', turnos:5, bruto:16500, comision:8250, adelantos:4000, neto:4250 },
      { nombre:'Agustín Romero', turnos:3, bruto:7000,  comision:3500, adelantos:2000, neto:1500 },
    ]
  },
  { id:4, tipo:'mes', periodo:'Mes Abril 2025',           servicios:210000, consumibles:52000, gastos:38000, balance:112000, estado:'registrado', registradoEn:'Mié 30 Abr 2025, 21:00', reg:'Rodrigo Brizu',
    barberos:[
      { nombre:'Carlos Medina',  turnos:28, bruto:95000, comision:47500, adelantos:15000, neto:32500 },
      { nombre:'Facundo Torres', turnos:22, bruto:78000, comision:39000, adelantos:12000, neto:27000 },
      { nombre:'Agustín Romero', turnos:14, bruto:37000, comision:18500, adelantos:8000,  neto:10500 },
    ]
  },
  { id:5, tipo:'mes', periodo:'Mes Marzo 2025',           servicios:195000, consumibles:48000, gastos:35000, balance:104000, estado:'registrado', registradoEn:'Lun 31 Mar 2025, 20:30', reg:'Rodrigo Brizu',
    barberos:[
      { nombre:'Carlos Medina',  turnos:25, bruto:88000, comision:44000, adelantos:13000, neto:31000 },
      { nombre:'Facundo Torres', turnos:20, bruto:72000, comision:36000, adelantos:11000, neto:25000 },
      { nombre:'Agustín Romero', turnos:12, bruto:35000, comision:17500, adelantos:7000,  neto:10500 },
    ]
  },
];

var MESES_DATA = {
  0: {
    nombre:'Mayo 2025',
    semanas:[
      { sem:'Sem 1 (1-5 May)',     servicios:49000, consumibles:12400, gastos:8600,  balance:26200, estado:'registrado' },
      { sem:'Sem 2 (5-10 May)',    servicios:58000, consumibles:14200, gastos:9800,  balance:33100, estado:'registrado' },
      { sem:'Sem 3 (12-17 May)',   servicios:71000, consumibles:18600, gastos:12300, balance:41200, estado:'en curso'   },
      { sem:'Sem 4 (19-24 May)',   servicios:0,     consumibles:0,     gastos:0,     balance:0,     estado:'pendiente'  },
    ],
    barberos:[
      { nombre:'Carlos Medina',  turnos:15, bruto:48000, comision:24000, adelantos:11000, neto:13000 },
      { nombre:'Facundo Torres', turnos:11, bruto:43000, comision:21500, adelantos:8000,  neto:13500 },
      { nombre:'Agustín Romero', turnos:8,  bruto:18000, comision:9000,  adelantos:8000,  neto:1000  },
    ]
  },
  '-1': {
    nombre:'Abril 2025',
    semanas:[
      { sem:'Sem 1 (31 Mar-5 Abr)', servicios:42000, consumibles:10200, gastos:7100, balance:22700, estado:'registrado' },
      { sem:'Sem 2 (7-12 Abr)',    servicios:55000, consumibles:14000, gastos:9800, balance:30300, estado:'registrado' },
      { sem:'Sem 3 (14-19 Abr)',   servicios:64000, consumibles:15600, gastos:12200,balance:34400, estado:'registrado' },
      { sem:'Sem 4 (21-26 Abr)',   servicios:49000, consumibles:12400, gastos:8600, balance:26200, estado:'registrado' },
    ],
    barberos:[
      { nombre:'Carlos Medina',  turnos:28, bruto:95000, comision:47500, adelantos:15000, neto:32500 },
      { nombre:'Facundo Torres', turnos:22, bruto:78000, comision:39000, adelantos:12000, neto:27000 },
      { nombre:'Agustín Romero', turnos:14, bruto:37000, comision:18500, adelantos:8000,  neto:10500 },
    ]
  },
};

var antFiltered = [...ANTERIORES];
var detailCierreId = null;

/* ══════════════════════════════════════
   HELPERS
══════════════════════════════════════ */
function fm(n) {
  if (n === 0) return '$0';
  var sign = n < 0 ? '-' : '';
  return sign + '$' + Math.abs(Math.round(n)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

function getSemana() {
  return SEMANAS_DATA[semOffset] || SEMANAS_DATA[0];
}

function getMes() {
  return MESES_DATA[mesOffset] || MESES_DATA[0];
}

function comisionBarberoMonto(bruto) {
  return Math.round(bruto * pctBarbero / 100);
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
  ['semanal','anteriores','mensual'].forEach(function(t) {
    document.getElementById('pane'+t.charAt(0).toUpperCase()+t.slice(1)).classList.toggle('active', t === tab);
    var btn = document.getElementById('tabBtn'+t.charAt(0).toUpperCase()+t.slice(1));
    if (btn) btn.classList.toggle('active', t === tab);
  });
}

/* ══════════════════════════════════════
   NAVEGACIÓN SEMANA
══════════════════════════════════════ */
function navSemana(delta) {
  var next = semOffset + delta;
  if (SEMANAS_DATA[next] !== undefined || next < 0) {
    if (SEMANAS_DATA[next] !== undefined) semOffset = next;
    else semOffset = next; /* allow any past */
  }
  semOffset = next;
  if (!SEMANAS_DATA[semOffset]) {
    /* fallback to nearest known */
    while (!SEMANAS_DATA[semOffset] && semOffset < 0) semOffset++;
    if (!SEMANAS_DATA[semOffset]) semOffset = 0;
  }
  renderSemanal();
}

function goSemanaActual() {
  semOffset = 0;
  renderSemanal();
}

/* ══════════════════════════════════════
   RENDER SEMANAL
══════════════════════════════════════ */
function renderSemanal() {
  var d = getSemana();
  document.getElementById('semanaLabel').textContent = d.label;
  document.getElementById('btnSemSiguiente').disabled = semOffset >= 0;

  var pctLocal = 100 - pctBarbero;
  var parteLocal = Math.round(d.servicios * pctLocal / 100);
  var balance = parteLocal + d.consumibles - d.gastos - d.adelantos;

  document.getElementById('sStatServicios').textContent   = fm(d.servicios);
  document.getElementById('sStatConsumibles').textContent = fm(d.consumibles);
  document.getElementById('sStatGastos').textContent      = fm(d.gastos);
  document.getElementById('sStatBalance').textContent     = fm(balance);
  document.getElementById('sStatBalance').style.color     = balance >= 0 ? 'var(--green-deep)' : 'var(--red-deep)';

  /* PRODUCCIÓN BARBEROS */
  document.getElementById('prodGrid').innerHTML = d.barberos.map(function(b) {
    var comision = comisionBarberoMonto(b.bruto);
    var cobrar   = comision - b.adelantos;
    var cobrarColor = cobrar >= 0 ? 'color:var(--green-deep)' : 'color:var(--red-deep)';

    var svcRows = b.servicios.map(function(sv) {
      return '<tr><td>'+sv.s+'</td><td style="color:var(--ink-mute)">x'+sv.q+'</td><td style="font-weight:600;text-align:right">'+fm(sv.t)+'</td></tr>';
    }).join('');

    return '<div class="prod-card">'+
      '<div class="prod-card-hd">'+
        '<div class="prod-av" style="background:'+b.color+'">'+b.ini+'</div>'+
        '<div>'+
          '<div class="prod-name">'+b.nombre+'</div>'+
          '<div class="prod-turnos">'+b.turnos+' turnos atendidos</div>'+
        '</div>'+
      '</div>'+
      '<table class="prod-table">'+
        '<thead><tr><th>Servicio</th><th>Cant.</th><th style="text-align:right">Total</th></tr></thead>'+
        '<tbody>'+svcRows+'</tbody>'+
      '</table>'+
      '<div class="prod-card-ft">'+
        '<div class="prod-ft-row"><span class="prod-ft-label">Producción bruta</span><span class="prod-ft-val">'+fm(b.bruto)+'</span></div>'+
        '<div class="prod-ft-row"><span class="prod-ft-label">Comisión del barbero ('+pctBarbero+'%)</span><span class="prod-ft-val" style="color:var(--blue-600)">'+fm(comision)+'</span></div>'+
        '<div class="prod-ft-row"><span class="prod-ft-label">Adelantos descontados</span><span class="prod-ft-val" style="color:var(--red-deep)">&minus;'+fm(b.adelantos)+'</span></div>'+
        '<div class="prod-cobrar-row">'+
          '<span class="prod-cobrar-label">Total a cobrar</span>'+
          '<span class="prod-cobrar-val" style="'+cobrarColor+'">'+fm(cobrar)+'</span>'+
        '</div>'+
        '<button class="btn btn-outline btn-sm" style="margin-top:6px" onclick="openDetalleTurnosBarbero(\''+b.id+'\')">Ver detalle de turnos</button>'+
      '</div>'+
    '</div>';
  }).join('');

  /* RESUMEN LOCAL */
  var totalBruto = d.barberos.reduce(function(s,b){ return s+b.bruto; }, 0);
  var parteLocalSvc = Math.round(totalBruto * (100-pctBarbero) / 100);
  var balanceLocal  = parteLocalSvc + d.consumibles - d.gastos - d.adelantos;
  var balColor = balanceLocal >= 0 ? 'var(--green-deep)' : 'var(--red-deep)';

  document.getElementById('localCard').innerHTML =
    '<div class="local-title">Resumen del local</div>'+
    '<div class="local-row"><span class="local-row-label">Ingresos totales por servicios</span><span class="local-row-val">'+fm(d.servicios)+'</span></div>'+
    '<div class="local-row"><span class="local-row-label">Parte del local ('+(100-pctBarbero)+'%)</span><span class="local-row-val" style="color:var(--green-deep)">'+fm(parteLocalSvc)+'</span></div>'+
    '<div class="local-row"><span class="local-row-label">Ingresos por consumibles</span><span class="local-row-val" style="color:var(--blue-600)">'+fm(d.consumibles)+'</span></div>'+
    '<div class="local-row"><span class="local-row-label">Movimientos internos (gastos)</span><span class="local-row-val" style="color:var(--red-deep)">&minus;'+fm(d.gastos)+'</span></div>'+
    '<div class="local-row"><span class="local-row-label">Adelantos entregados</span><span class="local-row-val" style="color:var(--red-deep)">&minus;'+fm(d.adelantos)+'</span></div>'+
    '<div class="local-total-row">'+
      '<span class="local-total-label">Balance neto del local</span>'+
      '<span class="local-total-val" style="color:'+balColor+'">'+fm(balanceLocal)+'</span>'+
    '</div>';

  /* BOTÓN CIERRE */
  var regRow = document.getElementById('cierreRegRow');
  if (d.registrado) {
    regRow.innerHTML =
      '<span class="cierre-reg-badge">'+
        '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>'+
        'Cierre registrado'+
      '</span>'+
      '<span style="font-size:12.5px;color:var(--ink-mute)">'+d.registradoEn+'</span>'+
      '<button class="btn btn-outline btn-sm" onclick="openDetalleSemanal()">Ver detalle</button>';
  } else {
    regRow.innerHTML = '<button class="btn btn-gold" style="padding:10px 22px;font-size:14px" onclick="openModalCierre()">Registrar cierre de esta semana</button>';
  }
}

function openDetalleTurnosBarbero(id) {
  /* placeholder – mostraría el panel lateral con los turnos del barbero */
}

function openDetalleSemanal() {
  var d = getSemana();
  renderDetailPanel(d.label, d, true);
  openDetail();
}

/* ══════════════════════════════════════
   MODAL CONFIRMAR CIERRE
══════════════════════════════════════ */
function openModalCierre() {
  var d = getSemana();
  document.getElementById('confirmarCierreSubtitle').textContent = d.label;
  document.getElementById('confirmarCheck').checked = false;
  document.getElementById('btnConfirmarCierre').disabled = true;

  var totalBruto   = d.barberos.reduce(function(s,b){ return s+b.bruto; },0);
  var parteLocal   = Math.round(totalBruto * (100-pctBarbero) / 100);
  var balanceLocal = parteLocal + d.consumibles - d.gastos - d.adelantos;

  document.getElementById('confirmarSummary').innerHTML =
    '<div class="confirm-row"><span style="color:var(--ink-mute)">Ingresos servicios</span><span style="font-weight:600">'+fm(d.servicios)+'</span></div>'+
    '<div class="confirm-row"><span style="color:var(--ink-mute)">Ingresos consumibles</span><span style="font-weight:600">'+fm(d.consumibles)+'</span></div>'+
    '<div class="confirm-row"><span style="color:var(--ink-mute)">Gastos internos</span><span style="font-weight:600;color:var(--red-deep)">&minus;'+fm(d.gastos)+'</span></div>'+
    '<div class="confirm-row"><span style="color:var(--ink-mute)">Adelantos</span><span style="font-weight:600;color:var(--red-deep)">&minus;'+fm(d.adelantos)+'</span></div>'+
    '<div style="display:flex;justify-content:space-between;padding-top:10px;border-top:2px solid var(--rule);">'+
      '<span style="font-weight:700">Balance neto del local</span>'+
      '<span style="font-weight:700;color:var(--green-deep)">'+fm(balanceLocal)+'</span>'+
    '</div>';

  document.getElementById('moConfirmarCierre').classList.add('open');
}

function closeModalCierre() {
  document.getElementById('moConfirmarCierre').classList.remove('open');
}

function toggleBtnCierre() {
  document.getElementById('btnConfirmarCierre').disabled = !document.getElementById('confirmarCheck').checked;
}

function ejecutarCierre() {
  var now = new Date();
  var d   = getSemana();
  d.registrado  = true;
  d.registradoEn = 'Registrado hoy, ' + (now.getHours()<10?'0':'')+now.getHours()+':'+(now.getMinutes()<10?'0':'')+now.getMinutes();
  closeModalCierre();
  renderSemanal();
}

/* ══════════════════════════════════════
   MODAL COMISIÓN
══════════════════════════════════════ */
function openModalComision() {
  document.getElementById('pctBarbero').value = pctBarbero;
  document.getElementById('pctLocal').value   = 100 - pctBarbero;
  document.getElementById('pctRange').value   = pctBarbero;
  document.getElementById('rangeBarb').textContent  = pctBarbero;
  document.getElementById('rangeLocal').textContent = 100 - pctBarbero;
  updatePresetPills(pctBarbero);
  document.getElementById('moComision').classList.add('open');
}

function closeModalComision() {
  document.getElementById('moComision').classList.remove('open');
}

function syncComisionBarbero() {
  var v = parseInt(document.getElementById('pctBarbero').value) || 0;
  if (v < 0) v = 0; if (v > 100) v = 100;
  document.getElementById('pctBarbero').value = v;
  document.getElementById('pctLocal').value   = 100 - v;
  document.getElementById('pctRange').value   = v;
  document.getElementById('rangeBarb').textContent  = v;
  document.getElementById('rangeLocal').textContent = 100 - v;
  updatePresetPills(v);
}

function syncComisionLocal() {
  var v = parseInt(document.getElementById('pctLocal').value) || 0;
  if (v < 0) v = 0; if (v > 100) v = 100;
  var barb = 100 - v;
  document.getElementById('pctBarbero').value = barb;
  document.getElementById('pctLocal').value   = v;
  document.getElementById('pctRange').value   = barb;
  document.getElementById('rangeBarb').textContent  = barb;
  document.getElementById('rangeLocal').textContent = v;
  updatePresetPills(barb);
}

function syncComisionRange() {
  var v = parseInt(document.getElementById('pctRange').value);
  document.getElementById('pctBarbero').value = v;
  document.getElementById('pctLocal').value   = 100 - v;
  document.getElementById('rangeBarb').textContent  = v;
  document.getElementById('rangeLocal').textContent = 100 - v;
  updatePresetPills(v);
}

function setPreset(barb, local) {
  document.getElementById('pctBarbero').value = barb;
  document.getElementById('pctLocal').value   = local;
  document.getElementById('pctRange').value   = barb;
  document.getElementById('rangeBarb').textContent  = barb;
  document.getElementById('rangeLocal').textContent = local;
  updatePresetPills(barb);
}

function updatePresetPills(barb) {
  var presets = { 50:'preset5050', 60:'preset6040', 70:'preset7030' };
  Object.keys(presets).forEach(function(k) {
    document.getElementById(presets[k]).classList.toggle('active', parseInt(k) === barb);
  });
}

function guardarComision() {
  pctBarbero = parseInt(document.getElementById('pctBarbero').value) || 50;
  document.getElementById('comisionBadge').textContent = pctBarbero + '% barbero / ' + (100-pctBarbero) + '% local';
  closeModalComision();
  renderSemanal();
}

/* ══════════════════════════════════════
   CIERRES ANTERIORES
══════════════════════════════════════ */
function applyFiltros() {
  var periodo = document.getElementById('filtPeriodo').value;
  antFiltered = ANTERIORES.filter(function(c) {
    if (periodo === 'semana' && c.tipo !== 'semana') return false;
    if (periodo === 'mes'    && c.tipo !== 'mes')    return false;
    return true;
  });
  renderAnteriores(antFiltered);
}

function clearFiltros() {
  document.getElementById('filtPeriodo').value    = '';
  document.getElementById('filtBarberoAnt').value = '';
  document.getElementById('filtDesde').value      = '';
  document.getElementById('filtHasta').value      = '';
  antFiltered = [...ANTERIORES];
  renderAnteriores(antFiltered);
}

function renderAnteriores(data) {
  var tbody = document.getElementById('antTableBody');
  if (!data.length) {
    tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;padding:28px;color:var(--ink-mute)">Sin resultados</td></tr>';
    document.getElementById('antTableFoot').innerHTML = '';
    return;
  }
  tbody.innerHTML = data.map(function(c) {
    var estadoPill = c.estado === 'registrado'
      ? '<span class="pill-reg">Registrado</span>'
      : '<span class="pill-pend">Pendiente</span>';
    return '<tr>'+
      '<td style="font-size:13.5px;font-weight:600">'+c.periodo+'</td>'+
      '<td class="t-monto" style="color:var(--green-deep)">'+fm(c.servicios)+'</td>'+
      '<td class="t-monto" style="color:var(--blue-600)">'+fm(c.consumibles)+'</td>'+
      '<td class="t-monto" style="color:var(--red-deep)">'+fm(c.gastos)+'</td>'+
      '<td class="t-monto" style="color:var(--green-deep)">'+fm(c.balance)+'</td>'+
      '<td>'+estadoPill+'</td>'+
      '<td><div class="act-wrap">'+
        '<button class="act-btn" title="Ver detalle" onclick="openDetalleAnterior('+c.id+')">'+
          '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>'+
        '</button>'+
      '</div></td>'+
    '</tr>';
  }).join('');

  var totSvc = data.reduce(function(s,c){return s+c.servicios;},0);
  var totCon = data.reduce(function(s,c){return s+c.consumibles;},0);
  var totGas = data.reduce(function(s,c){return s+c.gastos;},0);
  var totBal = data.reduce(function(s,c){return s+c.balance;},0);
  document.getElementById('antTableFoot').innerHTML =
    '<tr>'+
      '<td style="font-size:12px;color:var(--ink-mute)">'+data.length+' cierres</td>'+
      '<td style="font-weight:700;color:var(--green-deep)">'+fm(totSvc)+'</td>'+
      '<td style="font-weight:700;color:var(--blue-600)">'+fm(totCon)+'</td>'+
      '<td style="font-weight:700;color:var(--red-deep)">'+fm(totGas)+'</td>'+
      '<td style="font-weight:700;color:var(--green-deep)">'+fm(totBal)+'</td>'+
      '<td colspan="2"></td>'+
    '</tr>';
}

function openDetalleAnterior(id) {
  var c = ANTERIORES.find(function(x){ return x.id === id; });
  if (!c) return;
  var barbHtml = c.barberos.map(function(b) {
    return '<div class="d-row">'+
      '<span style="font-weight:500">'+b.nombre+'</span>'+
      '<span style="font-size:12px;color:var(--ink-mute)">'+b.turnos+' turnos</span>'+
    '</div>'+
    '<div style="padding:6px 0 10px;font-size:12.5px;display:grid;grid-template-columns:1fr 1fr;gap:4px 10px;color:var(--ink-soft)">'+
      '<span>Producción: '+fm(b.bruto)+'</span>'+
      '<span>Comisión: '+fm(b.comision)+'</span>'+
      '<span>Adelantos: &minus;'+fm(b.adelantos)+'</span>'+
      '<span style="color:var(--green-deep);font-weight:600">Cobrado: '+fm(b.neto)+'</span>'+
    '</div>';
  }).join('');

  document.getElementById('detailBody').innerHTML =
    '<div class="d-section">'+
      '<div class="d-section-label">Período</div>'+
      '<div class="d-field-value" style="font-size:16px;font-weight:600">'+c.periodo+'</div>'+
    '</div>'+
    '<div class="d-section">'+
      '<div class="d-section-label">Producción por barbero</div>'+
      barbHtml+
    '</div>'+
    '<div class="d-section">'+
      '<div class="d-section-label">Resumen del local</div>'+
      '<div class="d-row"><span style="color:var(--ink-mute)">Ingresos servicios</span><span style="font-weight:600">'+fm(c.servicios)+'</span></div>'+
      '<div class="d-row"><span style="color:var(--ink-mute)">Ingresos consumibles</span><span style="font-weight:600;color:var(--blue-600)">'+fm(c.consumibles)+'</span></div>'+
      '<div class="d-row"><span style="color:var(--ink-mute)">Gastos</span><span style="font-weight:600;color:var(--red-deep)">&minus;'+fm(c.gastos)+'</span></div>'+
      '<div class="d-total-row"><span style="font-weight:700">Balance neto</span><span style="font-size:20px;font-weight:700;color:var(--green-deep)">'+fm(c.balance)+'</span></div>'+
    '</div>'+
    '<div class="d-section">'+
      '<div class="d-section-label">Registro</div>'+
      '<div class="d-field-label">Registrado por</div>'+
      '<div class="d-field-value">'+c.reg+'</div>'+
      '<div class="d-field-label">Fecha y hora</div>'+
      '<div class="d-field-value">'+c.registradoEn+'</div>'+
    '</div>';

  openDetail();
}

function renderDetailPanel(titulo, d, isSemanal) {}

function openDetail() {
  document.getElementById('detailPanel').classList.add('open');
  document.getElementById('detailOverlay').classList.add('open');
}
function closeDetail() {
  document.getElementById('detailPanel').classList.remove('open');
  document.getElementById('detailOverlay').classList.remove('open');
}

/* ══════════════════════════════════════
   NAVEGACIÓN MES
══════════════════════════════════════ */
function navMes(delta) {
  var next = mesOffset + delta;
  if (MESES_DATA[next] !== undefined) mesOffset = next;
  renderMensual();
}
function goMesActual() {
  mesOffset = 0;
  renderMensual();
}

/* ══════════════════════════════════════
   RENDER MENSUAL
══════════════════════════════════════ */
function renderMensual() {
  var m = getMes();
  document.getElementById('mesLabel').textContent = m.nombre;
  document.getElementById('btnMesSig').disabled = mesOffset >= 0;

  var totSvc = m.semanas.reduce(function(s,w){ return s+w.servicios; },0);
  var totCon = m.semanas.reduce(function(s,w){ return s+w.consumibles; },0);
  var totGas = m.semanas.reduce(function(s,w){ return s+w.gastos; },0);
  var totBal = m.semanas.reduce(function(s,w){ return s+w.balance; },0);
  var totalAll = totSvc + totCon;

  var maxSvc = Math.max.apply(null, m.semanas.map(function(w){return w.servicios;})) || 1;

  /* CARDS MENSUALES */
  function miniChart(semanas, key, color) {
    var max = Math.max.apply(null, semanas.map(function(w){return w[key];})) || 1;
    return '<div class="mini-chart">'+
      semanas.map(function(w,i) {
        var h = w[key] ? Math.round(w[key]/max*44) : 2;
        var cls = w[key] ? '' : ' empty';
        return '<div class="mini-bar-wrap">'+
          '<div class="mini-bar'+cls+'" style="height:'+h+'px;background:'+(w[key]?color:'var(--rule)')+'"></div>'+
          '<div class="mini-bar-label">S'+(i+1)+'</div>'+
        '</div>';
      }).join('')+
    '</div>';
  }

  document.getElementById('monthCards').innerHTML =
    '<div class="month-card">'+
      '<div class="month-card-label">Ingresos por servicios</div>'+
      '<div class="month-card-val" style="color:var(--green-deep)">'+fm(totSvc)+'</div>'+
      miniChart(m.semanas,'servicios','var(--green)')+
    '</div>'+
    '<div class="month-card">'+
      '<div class="month-card-label">Ingresos por consumibles</div>'+
      '<div class="month-card-val" style="color:var(--blue-600)">'+fm(totCon)+'</div>'+
      miniChart(m.semanas,'consumibles','var(--blue-600)')+
    '</div>'+
    '<div class="month-card">'+
      '<div class="month-card-label">Gastos y movimientos</div>'+
      '<div class="month-card-val" style="color:var(--red-deep)">'+fm(totGas)+'</div>'+
      miniChart(m.semanas,'gastos','var(--red)')+
    '</div>'+
    '<div class="month-card">'+
      '<div class="month-card-label">Balance neto</div>'+
      '<div class="month-card-val" style="color:var(--green-deep)">'+fm(totBal)+'</div>'+
      miniChart(m.semanas,'balance','var(--green-deep)')+
    '</div>';

  /* TABLA SEMANAL */
  document.getElementById('mesSemanasBody').innerHTML = m.semanas.map(function(w) {
    var estadoPill = w.estado === 'registrado' ? '<span class="pill-reg">Registrado</span>'
      : w.estado === 'en curso' ? '<span class="pill-blue">En curso</span>'
      : '<span class="pill-pend">Pendiente</span>';
    return '<tr>'+
      '<td style="font-size:13px;font-weight:500">'+w.sem+'</td>'+
      '<td class="t-monto" style="color:var(--green-deep)">'+fm(w.servicios)+'</td>'+
      '<td class="t-monto" style="color:var(--blue-600)">'+fm(w.consumibles)+'</td>'+
      '<td class="t-monto" style="color:var(--red-deep)">'+fm(w.gastos)+'</td>'+
      '<td class="t-monto" style="color:var(--green-deep)">'+fm(w.balance)+'</td>'+
      '<td>'+estadoPill+'</td>'+
    '</tr>';
  }).join('');

  document.getElementById('mesSemanasFooter').innerHTML =
    '<tr>'+
      '<td style="font-size:12px;color:var(--ink-mute)">Total '+m.nombre+'</td>'+
      '<td style="font-weight:700;color:var(--green-deep)">'+fm(totSvc)+'</td>'+
      '<td style="font-weight:700;color:var(--blue-600)">'+fm(totCon)+'</td>'+
      '<td style="font-weight:700;color:var(--red-deep)">'+fm(totGas)+'</td>'+
      '<td style="font-weight:700;color:var(--green-deep)">'+fm(totBal)+'</td>'+
      '<td></td>'+
    '</tr>';

  /* DISTRIBUCIÓN */
  var pctSvc = totalAll ? Math.round(totSvc/totalAll*100) : 0;
  var pctCon = totalAll ? Math.round(totCon/totalAll*100) : 0;
  var pctGas = totalAll ? Math.round(totGas/totalAll*100) : 0;

  document.getElementById('distSection').innerHTML =
    '<div class="dist-title">Distribución de ingresos — '+m.nombre+'</div>'+
    distItem('Ingresos por servicios', totSvc, pctSvc, 'var(--green)', 'var(--green-deep)')+
    distItem('Ingresos por consumibles', totCon, pctCon, 'var(--blue-600)', 'var(--blue-600)')+
    distItem('Gastos y movimientos', totGas, pctGas, 'var(--red)', 'var(--red-deep)');

  /* PRODUCCIÓN MENSUAL BARBEROS */
  document.getElementById('mesBarberosBody').innerHTML = m.barberos.map(function(b) {
    return '<tr>'+
      '<td style="font-size:13.5px;font-weight:600">'+b.nombre+'</td>'+
      '<td class="t-secondary">'+b.turnos+'</td>'+
      '<td style="font-weight:600">'+fm(b.bruto)+'</td>'+
      '<td style="color:var(--blue-600);font-weight:600">'+fm(b.comision)+'</td>'+
      '<td style="color:var(--red-deep);font-weight:600">&minus;'+fm(b.adelantos)+'</td>'+
      '<td style="color:var(--green-deep);font-weight:700">'+fm(b.neto)+'</td>'+
    '</tr>';
  }).join('');
}

function distItem(label, val, pct, barColor, textColor) {
  return '<div class="dist-item">'+
    '<div class="dist-item-hd">'+
      '<span style="font-size:13px;color:var(--ink-soft)">'+label+'</span>'+
      '<div style="display:flex;align-items:center;gap:8px">'+
        '<span style="font-size:14px;font-weight:700;color:'+textColor+'">'+fm(val)+'</span>'+
        '<span class="pill-blue" style="background:var(--paper-2);color:'+textColor+';border:1px solid var(--rule)">'+pct+'%</span>'+
      '</div>'+
    '</div>'+
    '<div class="dist-bar-track">'+
      '<div class="dist-bar-fill" style="width:'+pct+'%;background:'+barColor+'"></div>'+
    '</div>'+
  '</div>';
}

/* ══════════════════════════════════════
   CLOSE MODALS ON OVERLAY CLICK
══════════════════════════════════════ */
['moComision','moConfirmarCierre'].forEach(function(id) {
  document.getElementById(id).addEventListener('click', function(e) {
    if (e.target === this) {
      if (id === 'moComision') closeModalComision();
      else closeModalCierre();
    }
  });
});

/* ══════════════════════════════════════
   INIT
══════════════════════════════════════ */
renderSemanal();
renderAnteriores(ANTERIORES);
renderMensual();
</script>
</body>
</html>
