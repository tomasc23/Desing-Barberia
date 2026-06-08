<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda — Barber Brizu</title>
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
    .btn-gold    { background: var(--gold); color: var(--ink); font-weight: 600; border: none; }
    .btn-gold:hover { opacity: 0.85; }
    .btn-logout  { color: var(--red-deep); border-color: oklch(86% 0.06 22); }
    .btn-logout:hover { background: var(--red-soft); opacity: 1; }
    .btn-sm      { padding: 7px 13px; font-size: 12.5px; border-radius: 8px; }

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

    /* ─── CONTENT ────────────────────────────── */
    .content {
      padding: 80px 26px 40px;
      display: flex; flex-direction: column; gap: 16px;
    }

    /* ─── PAGE TABS ──────────────────────────── */
    .page-tabs {
      display: flex;
      gap: 2px;
      background: var(--paper);
      border: 1px solid var(--rule);
      border-radius: 12px;
      padding: 5px;
      width: fit-content;
    }
    .page-tab {
      padding: 8px 20px;
      border-radius: 8px;
      font-size: 13.5px; font-weight: 500;
      cursor: pointer;
      border: none;
      background: transparent;
      color: var(--ink-soft);
      font-family: inherit;
      transition: background 0.12s, color 0.12s;
    }
    .page-tab.active {
      background: var(--ink);
      color: var(--paper);
    }
    .page-tab:hover:not(.active) { background: var(--paper-2); color: var(--ink); }

    .tab-panel { display: none; }
    .tab-panel.active { display: flex; flex-direction: column; gap: 16px; }

    /* ─── AGENDA CONTROLS ────────────────────── */
    .agenda-controls {
      background: var(--paper);
      border: 1px solid var(--rule);
      border-radius: 12px;
      padding: 12px 16px;
      display: flex;
      gap: 10px;
      align-items: center;
      flex-wrap: wrap;
    }

    .view-toggle {
      display: flex;
      border: 1px solid var(--rule);
      border-radius: 8px;
      overflow: hidden;
    }
    .view-btn {
      padding: 7px 14px;
      font-size: 13px; font-weight: 500;
      font-family: inherit;
      cursor: pointer;
      border: none;
      background: transparent;
      color: var(--ink-soft);
      transition: background 0.12s, color 0.12s;
    }
    .view-btn.active {
      background: var(--ink);
      color: var(--paper);
    }
    .view-btn:hover:not(.active) { background: var(--paper-2); }

    .date-nav {
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .date-nav-btn {
      width: 30px; height: 30px;
      border-radius: 7px;
      border: 1px solid var(--rule);
      background: transparent;
      cursor: pointer;
      display: grid; place-items: center;
      font-size: 14px; color: var(--ink-soft);
      font-family: inherit;
      transition: background 0.12s;
    }
    .date-nav-btn:hover { background: var(--paper-2); }
    .date-label {
      font-size: 13.5px; font-weight: 600;
      min-width: 140px; text-align: center;
    }
    .today-btn {
      padding: 6px 12px;
      border: 1px solid var(--rule);
      border-radius: 7px;
      background: transparent;
      font-size: 12.5px; font-weight: 500;
      color: var(--ink-soft);
      cursor: pointer;
      font-family: inherit;
      transition: background 0.12s;
    }
    .today-btn:hover { background: var(--paper-2); }

    .barber-filter {
      padding: 8px 12px;
      border: 1px solid var(--rule);
      border-radius: 8px;
      font-family: inherit; font-size: 13px;
      color: var(--ink); background: var(--paper-2);
      outline: none; cursor: pointer;
    }

    .controls-spacer { flex: 1; }

    /* ─── CALENDAR WRAP ──────────────────────── */
    .calendar-wrap {
      background: var(--paper);
      border: 1px solid var(--rule);
      border-radius: 14px;
      overflow: hidden;
    }
    .calendar-scroll { overflow-x: auto; overflow-y: visible; }

    /* ─── WEEKLY TABLE VIEW ──────────────────────── */
    .week-table { border-collapse: collapse; table-layout: fixed; }

    .week-th-time-r1 {
      width: 56px; background: var(--paper);
      border-right: 1px solid var(--rule); border-bottom: 1px solid var(--rule);
      position: sticky; top: 0; z-index: 4;
    }
    .week-th-day {
      background: var(--paper);
      border-right: 1px solid var(--rule); border-bottom: 1px solid var(--rule);
      padding: 6px 4px; text-align: center;
      font-size: 10.5px; font-weight: 600; text-transform: uppercase;
      letter-spacing: 0.07em; color: var(--ink-mute);
      position: sticky; top: 0; z-index: 3;
    }
    .week-th-day.today { color: var(--blue-600); }
    .week-th-day:last-child { border-right: none; }

    .week-th-time-r2 {
      width: 56px; background: var(--paper);
      border-right: 1px solid var(--rule); border-bottom: 1px solid var(--rule);
      position: sticky; top: 28px; z-index: 4;
    }
    .week-th-barber {
      background: var(--paper);
      border-right: 1px solid oklch(92% 0.005 240); border-bottom: 1px solid var(--rule);
      padding: 4px 4px 6px; text-align: center;
      font-size: 12px; font-weight: 700; letter-spacing: 0.03em;
      position: sticky; top: 28px; z-index: 3;
    }
    .week-th-barber.day-end { border-right: 1px solid var(--rule); }
    .week-th-barber:last-child { border-right: none; }
    .week-th-barber.carlos  { color: var(--blue-600); }
    .week-th-barber.facundo { color: oklch(35% 0.12 180); }
    .week-th-barber.agustin { color: oklch(36% 0.13 290); }
    .wh-barber-name { font-size: 10px; font-weight: 400; color: var(--ink-mute); margin-top: 1px; letter-spacing: 0; display: block; }

    .week-td-time {
      width: 56px; height: 60px;
      border-bottom: 1px solid var(--rule); border-right: 1px solid var(--rule);
      padding: 4px 6px 0; vertical-align: top;
      font-size: 10.5px; color: var(--ink-mute); font-weight: 500;
    }
    .week-td-time.half { font-size: 9.5px; color: oklch(68% 0.007 240); }

    .week-td-cell {
      height: 60px;
      border-bottom: 1px solid var(--rule); border-right: 1px solid oklch(92% 0.005 240);
      cursor: pointer; transition: background 0.1s;
      position: relative; vertical-align: top;
    }
    .week-td-cell.day-end { border-right: 1px solid var(--rule); }
    .week-td-cell:last-child { border-right: none; }
    .week-td-cell:hover { background: var(--blue-50); }
    .week-td-cell.nolaboral { background: oklch(97% 0.002 240); cursor: default; }
    .week-td-cell.nolaboral:hover { background: oklch(97% 0.002 240); }

    .week-turno {
      position: absolute; left: 2px; right: 2px;
      border-radius: 5px; padding: 3px 5px;
      border-left-width: 3px; border-left-style: solid;
      overflow: hidden; z-index: 1; cursor: default; font-size: 10px;
    }
    .week-turno.carlos  { background: var(--blue-50); border-left-color: var(--blue-600); }
    .week-turno.facundo { background: oklch(93% 0.05 180); border-left-color: oklch(35% 0.12 180); }
    .week-turno.agustin { background: oklch(93% 0.05 290); border-left-color: oklch(36% 0.13 290); }
    .week-turno-cliente  { font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.2; }
    .week-turno-servicio { color: var(--ink-mute); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 9.5px; }

    /* ─── TURNO BLOCK (daily) ────────────────── */
    .turno-block {
      position: absolute;
      left: 3px; right: 3px;
      border-radius: 6px;
      padding: 4px 7px;
      border-left-width: 3px;
      border-left-style: solid;
      border-top: 1px solid transparent;
      border-right: 1px solid transparent;
      border-bottom: 1px solid transparent;
      overflow: hidden;
      z-index: 1;
      cursor: default;
    }
    .turno-block.carlos {
      background: var(--blue-50);
      border-left-color: var(--blue-600);
      border-top-color: var(--blue-100);
      border-right-color: var(--blue-100);
      border-bottom-color: var(--blue-100);
    }
    .turno-block.facundo {
      background: oklch(93% 0.05 180);
      border-left-color: oklch(35% 0.12 180);
      border-top-color: oklch(85% 0.07 180);
      border-right-color: oklch(85% 0.07 180);
      border-bottom-color: oklch(85% 0.07 180);
    }
    .turno-block.agustin {
      background: oklch(93% 0.05 290);
      border-left-color: oklch(36% 0.13 290);
      border-top-color: oklch(85% 0.07 290);
      border-right-color: oklch(85% 0.07 290);
      border-bottom-color: oklch(85% 0.07 290);
    }
    .turno-cliente  { font-size: 11.5px; font-weight: 600; line-height: 1.2; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .turno-servicio { font-size: 10.5px; color: var(--ink-soft); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .turno-hora     { font-size: 10px; color: var(--ink-mute); }

    /* ─── DAILY VIEW ─────────────────────────── */
    .cal-header-time {
      border-bottom: 1px solid var(--rule);
      border-right: 1px solid var(--rule);
      background: var(--paper);
      position: sticky; top: 0; z-index: 2;
    }
    .daily-header-barber {
      padding: 10px 8px;
      text-align: center;
      border-bottom: 1px solid var(--rule);
      border-right: 1px solid var(--rule);
      background: var(--paper);
      position: sticky; top: 0; z-index: 2;
    }
    .daily-header-barber:last-child { border-right: none; }
    .daily-barber-av {
      width: 34px; height: 34px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 11px; font-weight: 700; color: white; margin: 0 auto 5px;
    }
    .daily-barber-av.carlos  { background: var(--blue-600); }
    .daily-barber-av.facundo { background: oklch(35% 0.12 180); }
    .daily-barber-av.agustin { background: oklch(36% 0.13 290); }
    .barber-name-header { font-size: 12px; font-weight: 600; }
    .barber-name-header.carlos  { color: var(--blue-600); }
    .barber-name-header.facundo { color: oklch(35% 0.12 180); }
    .barber-name-header.agustin { color: oklch(36% 0.13 290); }

    .cal-time-col { display: flex; flex-direction: column; }
    .cal-time-slot {
      height: 60px;
      border-bottom: 1px solid var(--rule);
      border-right: 1px solid var(--rule);
      display: flex;
      align-items: flex-start;
      padding: 4px 6px 0;
      font-size: 10.5px;
      color: var(--ink-mute);
      font-weight: 500;
    }
    .cal-time-slot:last-child { border-bottom: none; }

    .cal-day-col {
      position: relative;
      border-right: 1px solid var(--rule);
    }
    .cal-day-col:last-child { border-right: none; }

    .cal-slot {
      height: 60px;
      border-bottom: 1px solid var(--rule);
      cursor: pointer;
      transition: background 0.1s;
      position: relative; vertical-align: top;
    }
    .cal-slot:last-child { border-bottom: none; }
    .cal-slot:hover { background: var(--blue-50); }
    .cal-slot.blocked { cursor: default; }
    .cal-slot.blocked:hover { background: transparent; }
    .cal-slot.nolaboral { background: oklch(97% 0.002 240); cursor: default; }
    .cal-slot.nolaboral:hover { background: oklch(97% 0.002 240); }

    /* ─── LEGEND ─────────────────────────────── */
    .legend {
      display: flex;
      gap: 16px;
      align-items: center;
      flex-wrap: wrap;
      padding: 12px 16px;
      border-top: 1px solid var(--rule);
    }
    .legend-item { display: flex; align-items: center; gap: 7px; font-size: 12px; color: var(--ink-soft); }
    .legend-dot { width: 12px; height: 12px; border-radius: 3px; flex-shrink: 0; }
    .legend-dot.carlos  { background: var(--blue-600); }
    .legend-dot.facundo { background: oklch(35% 0.12 180); }
    .legend-dot.agustin { background: oklch(36% 0.13 290); }
    .legend-dot.libre   { background: var(--paper-2); border: 1px solid var(--rule); }
    .legend-dot.nolabor { background: oklch(97% 0.002 240); border: 1px solid var(--rule); }

    /* ─── CONFIG SECTIONS ────────────────────── */
    .config-section {
      background: var(--paper);
      border: 1px solid var(--rule);
      border-radius: 14px;
      overflow: hidden;
    }
    .config-section-hd {
      padding: 16px 20px 14px;
      border-bottom: 1px solid var(--rule);
    }
    .config-section-title { font-size: 15px; font-weight: 600; letter-spacing: -0.01em; }
    .config-section-sub   { font-size: 12px; color: var(--ink-mute); margin-top: 2px; }
    .config-section-bd { padding: 20px; }

    .schedule-table { width: 100%; border-collapse: collapse; }
    .schedule-table th {
      text-align: left;
      font-size: 10.5px; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.08em;
      color: var(--ink-mute);
      padding: 0 0 10px;
    }
    .schedule-table td { padding: 8px 0; border-top: 1px solid var(--rule); vertical-align: middle; }
    .schedule-table th:not(:first-child),
    .schedule-table td:not(:first-child) { padding-left: 12px; }
    .day-name-cell { font-size: 13.5px; font-weight: 500; min-width: 90px; }

    .toggle-wrap { display: flex; align-items: center; gap: 8px; }
    .toggle { position: relative; width: 36px; height: 20px; flex-shrink: 0; }
    .toggle input { opacity: 0; width: 0; height: 0; position: absolute; }
    .toggle-track { position: absolute; inset: 0; background: var(--rule); border-radius: 999px; cursor: pointer; transition: background 0.18s; }
    .toggle input:checked + .toggle-track { background: var(--blue-600); }
    .toggle-thumb { position: absolute; top: 3px; left: 3px; width: 14px; height: 14px; background: white; border-radius: 50%; transition: transform 0.18s; pointer-events: none; }
    .toggle input:checked ~ .toggle-thumb { transform: translateX(16px); }
    .toggle-lg { width: 48px; height: 26px; }
    .toggle-lg .toggle-thumb { width: 20px; height: 20px; }
    .toggle-lg input:checked ~ .toggle-thumb { transform: translateX(22px); }

    .time-inputs { display: flex; align-items: center; gap: 8px; }
    .time-input {
      padding: 6px 10px; border: 1px solid var(--rule); border-radius: 7px;
      font-family: inherit; font-size: 13px; color: var(--ink); background: var(--paper-2);
      outline: none; width: 90px; transition: border-color 0.12s;
    }
    .time-input:focus { border-color: var(--blue-400); }
    .time-sep { font-size: 13px; color: var(--ink-mute); }
    .disabled-row { opacity: 0.4; pointer-events: none; }
    .inactive-label { font-size: 12.5px; color: var(--ink-mute); font-style: italic; }

    .barber-tabs { display: flex; gap: 2px; margin-bottom: 16px; }
    .barber-tab-btn {
      padding: 7px 16px; border-radius: 8px; border: 1px solid var(--rule);
      background: transparent; font-family: inherit; font-size: 13px; font-weight: 500;
      color: var(--ink-soft); cursor: pointer; transition: background 0.12s, color 0.12s;
    }
    .barber-tab-btn.active { background: var(--ink); color: var(--paper); border-color: var(--ink); }
    .barber-tab-btn:hover:not(.active) { background: var(--paper-2); }
    .barber-tab-panel { display: none; }
    .barber-tab-panel.active { display: block; }

    .duration-pills { display: flex; gap: 8px; flex-wrap: wrap; }
    .duration-pill {
      padding: 9px 22px; border-radius: 999px; border: 1px solid var(--rule);
      background: transparent; font-family: inherit; font-size: 14px; font-weight: 500;
      color: var(--ink-soft); cursor: pointer; transition: background 0.12s, color 0.12s, border-color 0.12s;
    }
    .duration-pill.active { background: var(--ink); color: var(--paper); border-color: var(--ink); }
    .duration-pill:hover:not(.active) { background: var(--paper-2); }

    .form-hint-box {
      font-size: 12px; color: var(--ink-mute);
      padding: 10px 14px; background: var(--paper-2);
      border: 1px solid var(--rule); border-radius: 8px;
      line-height: 1.5; margin-top: 14px;
    }

    .nolabor-list { display: flex; flex-direction: column; gap: 8px; margin-bottom: 16px; }
    .nolabor-card { display: flex; align-items: center; padding: 10px 14px; background: var(--paper-2); border: 1px solid var(--rule); border-radius: 9px; gap: 12px; }
    .nolabor-date { font-size: 13px; font-weight: 600; min-width: 80px; }
    .nolabor-desc { font-size: 13px; color: var(--ink-soft); flex: 1; }
    .nolabor-del {
      width: 26px; height: 26px; border-radius: 6px;
      border: 1px solid oklch(87% 0.05 22); background: transparent;
      color: var(--red-deep); font-size: 16px; line-height: 1;
      cursor: pointer; display: grid; place-items: center; transition: background 0.12s;
    }
    .nolabor-del:hover { background: var(--red-soft); }

    .add-nolabor-form {
      display: flex; gap: 10px; align-items: flex-end; flex-wrap: wrap;
      padding: 14px; background: var(--paper-2); border: 1px solid var(--rule); border-radius: 9px;
    }
    .form-group { display: flex; flex-direction: column; gap: 5px; }
    .form-label { font-size: 12px; font-weight: 500; color: var(--ink-soft); }
    .form-input {
      padding: 8px 12px; border: 1px solid var(--rule); border-radius: 8px;
      font-family: inherit; font-size: 13px; color: var(--ink); background: var(--paper);
      outline: none; transition: border-color 0.12s;
    }
    .form-input:focus { border-color: var(--blue-400); }

    .adelanto-toggle-row { display: flex; align-items: center; gap: 14px; margin-bottom: 18px; }
    .adelanto-toggle-label { font-size: 14px; font-weight: 500; }
    .monto-row { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
    .monto-prefix { font-size: 16px; font-weight: 600; color: var(--ink-soft); }
    .monto-input {
      padding: 9px 14px; border: 1px solid var(--rule); border-radius: 9px;
      font-family: inherit; font-size: 16px; font-weight: 600; color: var(--ink);
      background: var(--paper); outline: none; width: 160px; transition: border-color 0.12s;
    }
    .monto-input:focus { border-color: var(--blue-400); }
    .adelanto-fields.hidden { display: none; }
    .cfg-footer { padding: 0 20px 20px; }

    /* ─── SECTION HEADER ─────────────────────── */
    .section-header { display: flex; align-items: flex-end; justify-content: space-between; padding-bottom: 4px; }
    .section-title { font-size: 19px; font-weight: 600; letter-spacing: -0.01em; line-height: 1.2; }
    .section-sub   { font-size: 12.5px; color: var(--ink-mute); margin-top: 3px; }

    /* ─── MODAL BASE ─────────────────────────── */
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
      border-radius: 18px; width: 580px; max-width: 96vw;
      max-height: 92vh; overflow-y: auto;
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
    .modal-bd { padding: 20px 22px; display: flex; flex-direction: column; gap: 20px; }
    .modal-ft {
      padding: 14px 22px 20px; border-top: 1px solid var(--rule);
      display: flex; justify-content: flex-end; gap: 9px;
      position: sticky; bottom: 0; background: var(--paper); z-index: 2; border-radius: 0 0 18px 18px;
    }
    .close-btn {
      width: 28px; height: 28px; border-radius: 7px;
      border: 1px solid var(--rule); background: transparent;
      display: grid; place-items: center; cursor: pointer;
      font-size: 18px; color: var(--ink-mute); line-height: 1; font-family: inherit;
    }
    .close-btn:hover { background: var(--paper-2); }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 13px; }
    .form-row.single { grid-template-columns: 1fr; }

    /* ─── MODAL V2 SECTIONS ──────────────────── */
    .modal-section { display: flex; flex-direction: column; gap: 11px; }
    .modal-section-label {
      font-size: 11px; font-weight: 700; text-transform: uppercase;
      letter-spacing: 0.09em; color: var(--ink-mute);
      padding-bottom: 7px; border-bottom: 1px solid var(--rule);
    }

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
    .modal::-webkit-scrollbar { width: 4px; }
    .modal::-webkit-scrollbar-track { background: var(--paper-2); border-radius: 99px; }
    .modal::-webkit-scrollbar-thumb { background: var(--rule); border-radius: 99px; }
    .modal::-webkit-scrollbar-thumb:hover { background: var(--ink-mute); }
    .modal { scrollbar-width: thin; scrollbar-color: var(--rule) var(--paper-2); }

    .search-input-wrap { position: relative; }
    .search-input {
      width: 100%; padding: 9px 12px; border: 1px solid var(--rule);
      border-radius: 9px; font-family: inherit; font-size: 13px;
      color: var(--ink); background: var(--paper); outline: none;
      transition: border-color 0.12s;
    }
    .search-input:focus { border-color: var(--blue-400); }
    .search-dropdown {
      position: absolute; top: calc(100% + 4px); left: 0; right: 0;
      background: var(--paper); border: 1px solid var(--rule);
      border-radius: 10px; z-index: 100; overflow: hidden;
      box-shadow: 0 4px 16px oklch(16% 0.01 240 / 0.1);
      display: none;
    }
    .search-dropdown.open { display: block; }
    .search-result {
      padding: 9px 13px; font-size: 13px; cursor: pointer;
      transition: background 0.1s; border-bottom: 1px solid var(--rule);
    }
    .search-result:last-child { border-bottom: none; }
    .search-result:hover { background: var(--blue-50); }

    .service-cards-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
    .service-card-u {
      padding: 11px 14px; border: 1.5px solid var(--rule);
      border-radius: 10px; cursor: pointer; transition: all 0.12s;
      position: relative; background: var(--paper);
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
      font-size: 12.5px; color: var(--ink-soft);
      padding: 8px 12px; background: var(--paper-2);
      border: 1px solid var(--rule); border-radius: 8px;
    }

    .barber-cards-modal { display: flex; gap: 8px; }
    .barber-card-m {
      flex: 1; padding: 12px 8px; border: 1.5px solid var(--rule);
      border-radius: 10px; cursor: pointer; transition: all 0.12s; text-align: center;
    }
    .barber-card-m:hover { background: var(--blue-50); border-color: var(--blue-200); }
    .barber-card-m.selected.carlos  { border-color: var(--blue-600); background: var(--blue-50); }
    .barber-card-m.selected.facundo { border-color: oklch(35% 0.12 180); background: oklch(93% 0.05 180); }
    .barber-card-m.selected.agustin { border-color: oklch(36% 0.13 290); background: oklch(93% 0.05 290); }
    .barber-card-m-av {
      width: 36px; height: 36px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 12px; font-weight: 700; color: white; margin: 0 auto 6px;
    }
    .barber-card-m-av.carlos  { background: var(--blue-600); }
    .barber-card-m-av.facundo { background: oklch(35% 0.12 180); }
    .barber-card-m-av.agustin { background: oklch(36% 0.13 290); }
    .barber-card-m-name { font-size: 11.5px; font-weight: 600; line-height: 1.3; }

    .cal-widget { border: 1px solid var(--rule); border-radius: 12px; overflow: hidden; max-width: 280px; margin: 0 auto; }
    .cal-widget-hd {
      display: flex; align-items: center; justify-content: space-between;
      padding: 8px 12px; border-bottom: 1px solid var(--rule); background: var(--paper-2);
    }
    .cal-widget-month { font-size: 13px; font-weight: 600; }
    .cal-widget-nav {
      width: 26px; height: 26px; border-radius: 7px;
      border: 1px solid var(--rule); background: var(--paper);
      cursor: pointer; display: grid; place-items: center;
      font-size: 13px; color: var(--ink-soft); font-family: inherit;
      transition: background 0.12s;
    }
    .cal-widget-nav:hover { background: var(--blue-50); }
    .cal-widget-body { padding: 8px; }
    .cal-dow-row  { display: grid; grid-template-columns: repeat(6, 1fr); margin-bottom: 2px; }
    .cal-dow      { text-align: center; font-size: 10px; font-weight: 600; color: var(--ink-mute); padding: 3px 2px; }
    .cal-days-grid{ display: grid; grid-template-columns: repeat(6, 1fr); gap: 2px; }
    .cal-day-btn {
      width: 32px; height: 32px; border: 1.5px solid transparent; border-radius: 7px;
      background: transparent; font-family: inherit; font-size: 12px;
      font-weight: 500; cursor: pointer; display: grid; place-items: center;
      transition: all 0.1s; color: var(--ink); margin: 0 auto;
    }
    .cal-day-btn:hover:not(:disabled) { background: var(--blue-50); border-color: var(--blue-100); }
    .cal-day-btn.today:not(.selected) { border-style: dashed; border-color: var(--blue-600); }
    .cal-day-btn.selected { background: var(--blue-600); color: white; border-color: var(--blue-600); border-style: solid; }
    .cal-day-btn:disabled { color: oklch(75% 0.005 240); cursor: default; text-decoration: line-through; }

    .time-slots-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 6px; margin-top: 8px; }
    .time-slot-btn {
      padding: 8px 4px; border: 1px solid var(--rule); border-radius: 8px;
      background: var(--paper); font-family: inherit; font-size: 12px;
      font-weight: 500; cursor: pointer; text-align: center; transition: all 0.1s; color: var(--ink);
    }
    .time-slot-btn:hover:not(.occupied):not(.selected) { background: var(--blue-50); border-color: var(--blue-200); }
    .time-slot-btn.occupied { background: oklch(94% 0.005 240); color: var(--ink-mute); cursor: default; font-style: italic; }
    .time-slot-btn.selected  { background: var(--blue-600); color: white; border-color: var(--blue-600); }

    .resumen-card {
      background: var(--paper-2); border: 1px solid var(--rule);
      border-radius: 10px; padding: 14px 16px;
      display: flex; flex-direction: column; gap: 9px;
    }
    .resumen-row { display: flex; justify-content: space-between; align-items: baseline; }
    .resumen-label { font-size: 12px; color: var(--ink-mute); }
    .resumen-value { font-size: 13px; font-weight: 500; }
    .resumen-total { border-top: 1px solid var(--rule); padding-top: 9px; }
    .resumen-total .resumen-label { font-size: 13px; font-weight: 600; color: var(--ink); }
    .resumen-total .resumen-value { font-size: 16px; font-weight: 700; }

    /* ─── MOBILE ─────────────────────────────── */
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); transition: transform 0.22s cubic-bezier(0.4, 0, 0.2, 1); }
      .sidebar.open { transform: translateX(0); }
      .main-area { margin-left: 0 !important; width: 100% !important; }
      .topbar { left: 0 !important; padding: 0 16px !important; }
      .topbar-hamburger { display: flex; }
      .content { padding: 72px 12px 32px !important; }
      .page-tabs { width: 100%; }
      .page-tab { flex: 1; text-align: center; }
      .agenda-controls { gap: 8px; }
      .controls-spacer { display: none; }
      .calendar-scroll { overflow-x: auto; }
      .time-inputs { flex-wrap: wrap; }
      .barber-tabs { flex-wrap: wrap; }
      .add-nolabor-form { flex-direction: column; }
      .service-cards-grid { grid-template-columns: 1fr; }
      .barber-cards-modal { flex-wrap: wrap; }
    }
  </style>
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<div class="layout">

  <!-- ══════════════ SIDEBAR ══════════════ -->
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
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
            <polyline points="9 22 9 12 15 12 15 22"/>
          </svg>
          Inicio
        </a>

        <a href="/dashboard/agenda" class="nav-link active">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="18" rx="2"/>
            <line x1="16" y1="2" x2="16" y2="6"/>
            <line x1="8" y1="2" x2="8" y2="6"/>
            <line x1="3" y1="10" x2="21" y2="10"/>
          </svg>
          Agenda
        </a>

        <a href="/dashboard/turnos" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="9"/>
            <polyline points="12 7 12 12 15 15"/>
          </svg>
          Turnos
          <span class="nav-badge">4</span>
        </a>
      </div>

      <div class="nav-group">
        <div class="nav-group-label">Gestión</div>

        <a href="/dashboard/usuarios" class="nav-link">
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

        <a href="/dashboard/servicios" class="nav-link">
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

      <div class="nav-group">
        <div class="nav-group-label">Económico</div>

        <a href="/dashboard/cobros" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="1" x2="12" y2="23"/>
            <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
          </svg>
          Cobros
        </a>

        <a href="/dashboard/adelantos" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
            <polyline points="17 6 23 6 23 12"/>
          </svg>
          Adelantos
        </a>

        <a href="/dashboard/consumibles" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>
            <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
            <line x1="12" y1="22.08" x2="12" y2="12"/>
          </svg>
          Consumibles
        </a>

        <a href="/dashboard/cierres" class="nav-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="20" x2="18" y2="10"/>
            <line x1="12" y1="20" x2="12" y2="4"/>
            <line x1="6"  y1="20" x2="6"  y2="14"/>
          </svg>
          Cierres económicos
        </a>
      </div>

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
      <button class="topbar-hamburger" onclick="openSidebar()" aria-label="Abrir menú">
        <span></span><span></span><span></span>
      </button>
      <div class="topbar-title">
        <h1>Agenda</h1>
        <div class="breadcrumb">Principal &rarr; Agenda</div>
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

      <div class="section-header">
        <div>
          <div class="section-title">Agenda</div>
          <div class="section-sub">Visualizá y gestioná los turnos de la barbería</div>
        </div>
      </div>

      <div class="page-tabs">
        <button class="page-tab active" onclick="switchTab('agenda')">Vista de agenda</button>
        <button class="page-tab" onclick="switchTab('config')">Configuración</button>
      </div>

      <!-- ═══ TAB 1: AGENDA ═══ -->
      <div class="tab-panel active" id="tab-agenda">

        <div class="agenda-controls">
          <div class="view-toggle">
            <button class="view-btn active" id="btnSemana" onclick="setView('semana')">Semana</button>
            <button class="view-btn" id="btnDia" onclick="setView('dia')">Día</button>
          </div>

          <div class="date-nav">
            <button class="date-nav-btn" onclick="navigate(-1)">&#8592;</button>
            <span class="date-label" id="dateLabel">Cargando...</span>
            <button class="date-nav-btn" onclick="navigate(1)">&#8594;</button>
          </div>
          <button class="today-btn" onclick="goToday()">Hoy</button>

          <select class="barber-filter" id="barberFilter" onchange="renderCalendar()">
            <option value="todos">Todos los barberos</option>
            <option value="carlos">Carlos Medina</option>
            <option value="facundo">Facundo Torres</option>
            <option value="agustin">Agustín Romero</option>
          </select>

          <div class="controls-spacer"></div>

          <button class="btn btn-gold" onclick="openNuevoTurno()">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="12" y1="5" x2="12" y2="19"/>
              <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Nuevo turno +
          </button>
        </div>

        <div class="calendar-wrap">
          <div class="calendar-scroll">
            <div id="calendarContainer"></div>
          </div>
          <div class="legend">
            <span style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.07em;color:var(--ink-mute);margin-right:4px">Barberos:</span>
            <div class="legend-item"><div class="legend-dot carlos"></div> Carlos Medina</div>
            <div class="legend-item"><div class="legend-dot facundo"></div> Facundo Torres</div>
            <div class="legend-item"><div class="legend-dot agustin"></div> Agustín Romero</div>
            <span style="width:1px;background:var(--rule);height:16px;margin:0 4px"></span>
            <div class="legend-item"><div class="legend-dot libre"></div> Disponible</div>
            <div class="legend-item"><div class="legend-dot nolabor"></div> Fuera de horario</div>
          </div>
        </div>

      </div><!-- /tab-agenda -->

      <!-- ═══ TAB 2: CONFIGURACIÓN ═══ -->
      <div class="tab-panel" id="tab-config">

        <div class="config-section">
          <div class="config-section-hd">
            <div class="config-section-title">Horarios de atención de la barbería</div>
            <div class="config-section-sub">Definí los días y horarios en que la barbería está abierta</div>
          </div>
          <div class="config-section-bd">
            <table class="schedule-table">
              <thead><tr><th>Día</th><th>Activo</th><th>Desde</th><th>Hasta</th></tr></thead>
              <tbody id="generalScheduleBody"></tbody>
            </table>
          </div>
          <div class="cfg-footer">
            <button class="btn btn-gold btn-sm">Guardar horarios</button>
          </div>
        </div>

        <div class="config-section">
          <div class="config-section-hd">
            <div class="config-section-title">Disponibilidad de cada barbero</div>
            <div class="config-section-sub">Configurá los horarios de trabajo individuales</div>
          </div>
          <div class="config-section-bd">
            <div class="barber-tabs">
              <button class="barber-tab-btn active" onclick="switchBarberTab('carlos')">Carlos Medina</button>
              <button class="barber-tab-btn" onclick="switchBarberTab('facundo')">Facundo Torres</button>
              <button class="barber-tab-btn" onclick="switchBarberTab('agustin')">Agustín Romero</button>
            </div>
            <div class="barber-tab-panel active" id="barber-carlos">
              <table class="schedule-table"><thead><tr><th>Día</th><th>Activo</th><th>Desde</th><th>Hasta</th></tr></thead><tbody id="carlosScheduleBody"></tbody></table>
            </div>
            <div class="barber-tab-panel" id="barber-facundo">
              <table class="schedule-table"><thead><tr><th>Día</th><th>Activo</th><th>Desde</th><th>Hasta</th></tr></thead><tbody id="facundoScheduleBody"></tbody></table>
            </div>
            <div class="barber-tab-panel" id="barber-agustin">
              <table class="schedule-table"><thead><tr><th>Día</th><th>Activo</th><th>Desde</th><th>Hasta</th></tr></thead><tbody id="agustinScheduleBody"></tbody></table>
            </div>
          </div>
          <div class="cfg-footer">
            <button class="btn btn-gold btn-sm">Guardar disponibilidad</button>
          </div>
        </div>

        <div class="config-section">
          <div class="config-section-hd">
            <div class="config-section-title">Duración de cada turno</div>
            <div class="config-section-sub">Tiempo asignado por reserva</div>
          </div>
          <div class="config-section-bd">
            <div class="duration-pills">
              <button class="duration-pill active" onclick="selectDuration(this)">30 min</button>
              <button class="duration-pill" onclick="selectDuration(this)">45 min</button>
              <button class="duration-pill" onclick="selectDuration(this)">60 min</button>
            </div>
            <div class="form-hint-box">Esta configuración fracciona los horarios disponibles para las reservas online de los clientes.</div>
          </div>
          <div class="cfg-footer">
            <button class="btn btn-gold btn-sm">Guardar</button>
          </div>
        </div>

        <div class="config-section">
          <div class="config-section-hd">
            <div class="config-section-title">Feriados y días no laborables</div>
            <div class="config-section-sub">Estos días no aparecerán como disponibles en la agenda</div>
          </div>
          <div class="config-section-bd">
            <div class="nolabor-list" id="nolaborList"></div>
            <div class="add-nolabor-form">
              <div class="form-group">
                <label class="form-label">Fecha</label>
                <input type="date" id="nolaborFecha" class="form-input">
              </div>
              <div class="form-group" style="flex:1">
                <label class="form-label">Descripción</label>
                <input type="text" id="nolaborDesc" class="form-input" placeholder="Ej. Día de la Independencia">
              </div>
              <button class="btn btn-gold btn-sm" onclick="addNolabor()" style="align-self:flex-end">Agregar</button>
            </div>
          </div>
        </div>

        <div class="config-section">
          <div class="config-section-hd">
            <div class="config-section-title">Cobro de adelanto al reservar</div>
            <div class="config-section-sub">El cliente paga una seña al confirmar el turno online</div>
          </div>
          <div class="config-section-bd">
            <div class="adelanto-toggle-row">
              <label class="toggle toggle-lg">
                <input type="checkbox" id="adelantoToggle" onchange="toggleAdelanto()" checked>
                <div class="toggle-track"></div>
                <div class="toggle-thumb"></div>
              </label>
              <span class="adelanto-toggle-label" id="adelantoToggleLabel">Cobro de adelanto activo</span>
            </div>
            <div class="adelanto-fields" id="adelantoFields">
              <div class="monto-row">
                <span class="monto-prefix">$</span>
                <input type="number" class="monto-input" id="adelantoMonto" value="1500" min="0">
              </div>
              <p style="font-size:12.5px;color:var(--ink-mute)">El cliente verá este monto antes de confirmar el turno.</p>
            </div>
          </div>
          <div class="cfg-footer">
            <button class="btn btn-gold btn-sm">Guardar configuración</button>
          </div>
        </div>

      </div><!-- /tab-config -->

    </main>
  </div>
</div>

<!-- ══════ MODAL NUEVO TURNO V2 ══════ -->
<div class="modal-overlay" id="nuevoTurnoOverlay">
  <div class="modal">
    <div class="modal-hd">
      <span class="modal-hd-title">Nuevo turno</span>
      <button class="close-btn" onclick="closeNuevoTurno()">&times;</button>
    </div>
    <div class="modal-bd">

      <!-- SECCIÓN 1: CLIENTE -->
      <div class="modal-section">
        <div class="modal-section-label">1 · Cliente</div>
        <div class="tipo-toggle">
          <button class="tipo-toggle-btn active" id="btnTipoRegistrado" onclick="setClienteTipo('registrado')">Cliente registrado</button>
          <button class="tipo-toggle-btn" id="btnTipoRapido" onclick="setClienteTipo('rapido')">Turno rápido</button>
        </div>
        <div id="secClienteRegistrado">
          <div class="form-group">
            <label class="form-label">Buscar cliente registrado</label>
            <div class="search-input-wrap">
              <input type="text" class="search-input" id="clienteSearch" placeholder="Buscar por nombre o email..." oninput="filterClientes()" autocomplete="off">
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

      <!-- SECCIÓN 2: SERVICIOS -->
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

      <!-- SECCIÓN 3: BARBERO -->
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

      <!-- SECCIÓN 4: FECHA Y HORARIO -->
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
              <div class="cal-dow">L</div>
              <div class="cal-dow">M</div>
              <div class="cal-dow">M</div>
              <div class="cal-dow">J</div>
              <div class="cal-dow">V</div>
              <div class="cal-dow">S</div>
            </div>
            <div class="cal-days-grid" id="calDaysGrid"></div>
          </div>
        </div>
        <div id="timeSlotsWrap" style="display:none">
          <div style="font-size:12px;color:var(--ink-mute);margin-bottom:6px">Seleccioná un horario:</div>
          <div class="time-slots-grid" id="timeSlotsGrid"></div>
        </div>
      </div>

      <!-- SECCIÓN 5: RESUMEN -->
      <div class="modal-section" id="resumenSection" style="display:none">
        <div class="modal-section-label">5 · Resumen</div>
        <div class="resumen-card" id="resumenCard"></div>
      </div>

    </div>
    <div class="modal-ft">
      <button class="btn btn-outline" onclick="closeNuevoTurno()">Cancelar</button>
      <button class="btn btn-gold" onclick="confirmarTurno()">Confirmar turno</button>
    </div>
  </div>
</div>

<script>
// ─── CONSTANTES ───────────────────────────────
var DAY_START   = 9;
var DAY_END     = 22;
var SLOT_HEIGHT = 60;
var SLOTS_COUNT = (DAY_END - DAY_START) * 2;

var BARBERS = [
  { key:'carlos',  label:'Carlos Medina',  initials:'CM' },
  { key:'facundo', label:'Facundo Torres', initials:'FT' },
  { key:'agustin', label:'Agustín Romero', initials:'AR' },
];

// Horario de cada barbero: índice 0=Lun ... 5=Sáb, 6=Dom
// a=activo, f=desde (hora), t=hasta (hora)
var barberSchedules = {
  carlos:  [
    {a:true, f:9,  t:18}, {a:true, f:9,  t:18}, {a:true, f:9,  t:18},
    {a:false},             {a:true, f:9,  t:18}, {a:true, f:9,  t:14}, {a:false}
  ],
  facundo: [
    {a:true, f:13, t:22}, {a:true, f:13, t:22}, {a:false},
    {a:true, f:13, t:22}, {a:true, f:13, t:22}, {a:true, f:10, t:20}, {a:false}
  ],
  agustin: [
    {a:true, f:9,  t:14}, {a:true, f:9,  t:14}, {a:true, f:9,  t:14},
    {a:true, f:9,  t:14}, {a:false},             {a:true, f:9,  t:13}, {a:false}
  ],
};

// ─── DATOS DE EJEMPLO ─────────────────────────
// dayOffset: 0=Lun, 1=Mar, 2=Mié, 3=Jue, 4=Vie, 5=Sáb (relativo al lunes de la semana actual)
var TURNOS = [
  // Lunes: Carlos y Facundo simultáneos a las 9:00
  { barbero:'carlos',  cliente:'Martina Gómez',   servicio:'Corte',         dayOffset:0, startHour:9,  startMin:0  },
  { barbero:'facundo', cliente:'Diego Flores',     servicio:'Barba',         dayOffset:0, startHour:9,  startMin:0  },
  // Lunes 9:30: Agustín
  { barbero:'agustin', cliente:'Sofía Herrera',    servicio:'Cejas',         dayOffset:0, startHour:9,  startMin:30 },
  // Lunes 10:00: Carlos, Facundo y Agustín libres excepto Carlos
  { barbero:'carlos',  cliente:'Nicolás Paz',      servicio:'Corte + Barba', dayOffset:0, startHour:10, startMin:0  },
  // Martes 10:00: los 3 barberos con turno simultáneo
  { barbero:'carlos',  cliente:'Valentina López',  servicio:'Corte',         dayOffset:1, startHour:10, startMin:0  },
  { barbero:'facundo', cliente:'Ramón Torres',     servicio:'Barba',         dayOffset:1, startHour:10, startMin:0  },
  { barbero:'agustin', cliente:'Lucía Fernández',  servicio:'Coloración',    dayOffset:1, startHour:10, startMin:0  },
  // Miércoles: Facundo está libre (día franco)
  { barbero:'carlos',  cliente:'Miguel Sánchez',   servicio:'Corte',         dayOffset:2, startHour:11, startMin:0  },
  { barbero:'agustin', cliente:'Laura Pérez',      servicio:'Cejas',         dayOffset:2, startHour:9,  startMin:30 },
  // Jueves: Carlos está libre
  { barbero:'facundo', cliente:'Andrés Molina',    servicio:'Corte + Barba', dayOffset:3, startHour:15, startMin:0  },
  { barbero:'agustin', cliente:'Carmen López',     servicio:'Corte',         dayOffset:3, startHour:10, startMin:0  },
  // Viernes: Agustín está libre
  { barbero:'carlos',  cliente:'Roberto Díaz',     servicio:'Barba',         dayOffset:4, startHour:11, startMin:0  },
  { barbero:'facundo', cliente:'Paola Herrera',    servicio:'Coloración',    dayOffset:4, startHour:14, startMin:30 },
  // Sábado: los 3 trabajan
  { barbero:'carlos',  cliente:'Federico Ruiz',    servicio:'Corte',         dayOffset:5, startHour:9,  startMin:30 },
  { barbero:'facundo', cliente:'Daniela Castro',   servicio:'Barba',         dayOffset:5, startHour:11, startMin:0  },
  { barbero:'agustin', cliente:'Tomás Gutiérrez',  servicio:'Corte',         dayOffset:5, startHour:10, startMin:0  },
];

// ─── CLIENTES MUESTRA ─────────────────────────
var CLIENTES_SAMPLE = [
  { id:1, nombre:'Martina Gómez',   email:'martina@email.com' },
  { id:2, nombre:'Diego Flores',    email:'diego@email.com'   },
  { id:3, nombre:'Sofía Herrera',   email:'sofia@email.com'   },
  { id:4, nombre:'Nicolás Paz',     email:'nicolas@email.com' },
  { id:5, nombre:'Valentina López', email:'valentina@email.com'},
];

// ─── STATE ────────────────────────────────────
var currentView = 'semana';
var currentDate = new Date();

// ─── HELPERS ──────────────────────────────────
var MONTHS_ES     = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
var MONTHS_ES_CAP = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
var DAY_NAMES_SHORT = ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'];

function pad(n) { return n < 10 ? '0' + n : '' + n; }

function getMondayOf(d) {
  var copy = new Date(d);
  var day  = copy.getDay();
  var diff = (day === 0) ? -6 : 1 - day;
  copy.setDate(copy.getDate() + diff);
  return copy;
}

function slotToTop(hour, min) {
  return ((hour - DAY_START) * 60 + min) / 30 * SLOT_HEIGHT;
}

function isOutOfHours(barberKey, dayOffset, slotIndex) {
  var sched = barberSchedules[barberKey];
  if (!sched || dayOffset < 0 || dayOffset > 6) return true;
  var day = sched[dayOffset];
  if (!day || !day.a) return true;
  var slotMin = DAY_START * 60 + slotIndex * 30;
  return slotMin < day.f * 60 || slotMin >= day.t * 60;
}

// ─── TAB SWITCHING ────────────────────────────
function switchTab(name) {
  document.querySelectorAll('.page-tab').forEach(function(b, i) {
    b.classList.toggle('active', (i === 0 && name === 'agenda') || (i === 1 && name === 'config'));
  });
  document.querySelectorAll('.tab-panel').forEach(function(p) { p.classList.remove('active'); });
  document.getElementById('tab-' + name).classList.add('active');
}

function setView(v) {
  currentView = v;
  document.getElementById('btnSemana').classList.toggle('active', v === 'semana');
  document.getElementById('btnDia').classList.toggle('active', v === 'dia');
  renderCalendar();
}

function navigate(dir) {
  if (currentView === 'semana') currentDate.setDate(currentDate.getDate() + dir * 7);
  else currentDate.setDate(currentDate.getDate() + dir);
  renderCalendar();
}

function goToday() { currentDate = new Date(); renderCalendar(); }

function renderCalendar() {
  if (currentView === 'semana') renderWeekly();
  else renderDaily();
}

// ─── VISTA SEMANAL CON SUB-COLUMNAS ──────────
function renderWeekly() {
  var monday = getMondayOf(currentDate);
  var today  = new Date(); today.setHours(0,0,0,0);

  var endSat = new Date(monday); endSat.setDate(monday.getDate() + 5);
  document.getElementById('dateLabel').textContent =
    pad(monday.getDate()) + ' ' + MONTHS_ES[monday.getMonth()].slice(0,3) +
    ' – ' + pad(endSat.getDate()) + ' ' + MONTHS_ES[endSat.getMonth()].slice(0,3) +
    ' ' + monday.getFullYear();

  var barberFilter = document.getElementById('barberFilter').value;
  var barbers = barberFilter === 'todos'
    ? BARBERS
    : BARBERS.filter(function(b) { return b.key === barberFilter; });

  var numBarbers = barbers.length;
  var totalMinW  = 56 + 6 * numBarbers * 100;
  var dayLabels  = ['Lun','Mar','Mié','Jue','Vie','Sáb'];

  // Precompute occupied slots: key = "barber_day_slotIndex"
  var occupied = {};
  TURNOS.forEach(function(t) {
    var key = t.barbero + '_' + t.dayOffset + '_' + ((t.startHour - DAY_START) * 2 + t.startMin / 30);
    occupied[key] = t;
  });

  var html = '<table class="week-table" style="min-width:' + totalMinW + 'px">';

  // colgroup — enforces fixed widths aligned across thead + tbody
  html += '<colgroup><col style="width:56px">';
  for (var c = 0; c < 6 * numBarbers; c++) html += '<col style="width:100px">';
  html += '</colgroup>';

  html += '<thead>';

  // Fila 1: día+fecha, colspan por barbero
  html += '<tr>';
  html += '<th class="week-th-time-r1"></th>';
  for (var d = 0; d < 6; d++) {
    var colDate = new Date(monday); colDate.setDate(monday.getDate() + d); colDate.setHours(0,0,0,0);
    var isToday = colDate.getTime() === today.getTime();
    html += '<th class="week-th-day' + (isToday ? ' today' : '') + '" colspan="' + numBarbers + '">' +
      dayLabels[d] + ' ' + colDate.getDate() + '</th>';
  }
  html += '</tr>';

  // Fila 2: iniciales+nombre por barbero, repetido por día
  html += '<tr>';
  html += '<th class="week-th-time-r2"></th>';
  for (var d2 = 0; d2 < 6; d2++) {
    barbers.forEach(function(b, bi) {
      var isDayEnd = bi === barbers.length - 1 && d2 < 5;
      html += '<th class="week-th-barber ' + b.key + (isDayEnd ? ' day-end' : '') + '">' +
        b.initials + '<span class="wh-barber-name">' + b.label.split(' ')[0] + '</span></th>';
    });
  }
  html += '</tr>';

  html += '</thead><tbody>';

  // Una fila por franja horaria
  for (var s = 0; s < SLOTS_COUNT; s++) {
    var tm = s * 30;
    var hh = DAY_START + Math.floor(tm / 60);
    var mm = tm % 60;
    html += '<tr>';
    html += '<td class="week-td-time' + (mm !== 0 ? ' half' : '') + '">' + pad(hh) + ':' + pad(mm) + '</td>';
    for (var d3 = 0; d3 < 6; d3++) {
      barbers.forEach(function(b, bi) {
        var isDayEnd = bi === barbers.length - 1 && d3 < 5;
        var oof    = isOutOfHours(b.key, d3, s);
        var turno  = occupied[b.key + '_' + d3 + '_' + s];
        var cls    = 'week-td-cell' + (oof ? ' nolaboral' : '') + (isDayEnd ? ' day-end' : '');
        var click  = (!oof && !turno) ? ' onclick="openNuevoTurno(' + d3 + ',\'' + b.key + '\',' + s + ')"' : '';
        html += '<td class="' + cls + '"' + click + '>';
        if (turno) {
          html += '<div class="week-turno ' + turno.barbero + '" style="top:0;height:' + (SLOT_HEIGHT - 3) + 'px">' +
            '<div class="week-turno-cliente">' + turno.cliente + '</div>' +
            '<div class="week-turno-servicio">' + turno.servicio + '</div></div>';
        }
        html += '</td>';
      });
    }
    html += '</tr>';
  }

  html += '</tbody></table>';
  document.getElementById('calendarContainer').innerHTML = html;
}

// ─── VISTA DIARIA CON SUB-COLUMNAS ───────────
function renderDaily() {
  var today  = new Date(); today.setHours(0,0,0,0);
  var selDate = new Date(currentDate); selDate.setHours(0,0,0,0);

  document.getElementById('dateLabel').textContent =
    DAY_NAMES_SHORT[selDate.getDay()] + ' ' + pad(selDate.getDate()) + ' de ' +
    MONTHS_ES[selDate.getMonth()] + ' ' + selDate.getFullYear();

  var monday    = getMondayOf(selDate);
  var dayOffset = Math.round((selDate - monday) / (1000 * 60 * 60 * 24));

  var barberFilter = document.getElementById('barberFilter').value;
  var barbers = barberFilter === 'todos'
    ? BARBERS
    : BARBERS.filter(function(b) { return b.key === barberFilter; });
  var cols = barbers.length;

  // Precompute occupied slots for this day: key = "barber_slotIndex"
  var occupied = {};
  TURNOS.forEach(function(t) {
    if (t.dayOffset !== dayOffset) return;
    var key = t.barbero + '_' + ((t.startHour - DAY_START) * 2 + t.startMin / 30);
    occupied[key] = t;
  });

  var html = '<table style="border-collapse:collapse;table-layout:fixed;min-width:' + (56 + cols * 200) + 'px;width:100%">';
  html += '<colgroup><col style="width:56px">';
  for (var c = 0; c < cols; c++) html += '<col>';
  html += '</colgroup>';

  // thead con sticky
  html += '<thead><tr>';
  html += '<th class="cal-header-time"></th>';
  barbers.forEach(function(b, i) {
    var last = i === cols - 1 ? ' style="border-right:none"' : '';
    html += '<th class="daily-header-barber"' + last + '>';
    html += '<div class="daily-barber-av ' + b.key + '">' + b.initials + '</div>';
    html += '<div class="barber-name-header ' + b.key + '">' + b.label + '</div>';
    html += '</th>';
  });
  html += '</tr></thead>';

  // tbody: una fila por franja horaria
  html += '<tbody>';
  for (var s = 0; s < SLOTS_COUNT; s++) {
    var tm = s * 30;
    var hh = DAY_START + Math.floor(tm / 60);
    var mm = tm % 60;
    var halfAttr = mm !== 0 ? ' style="font-size:9.5px;color:oklch(68% 0.007 240)"' : '';
    html += '<tr>';
    html += '<td class="cal-time-slot"' + halfAttr + '>' + pad(hh) + ':' + pad(mm) + '</td>';
    barbers.forEach(function(b, i) {
      var oof   = isOutOfHours(b.key, dayOffset, s);
      var turno = occupied[b.key + '_' + s];
      var last  = i === cols - 1 ? ';border-right:none' : '';
      var cls   = 'cal-slot' + (oof ? ' nolaboral' : '');
      var click = (!oof && !turno) ? ' onclick="openNuevoTurno(' + dayOffset + ',\'' + b.key + '\',' + s + ')"' : '';
      html += '<td class="' + cls + '" style="position:relative' + last + '"' + click + '>';
      if (turno) {
        var endMin = turno.startMin + 30;
        var endH   = turno.startHour + Math.floor(endMin / 60);
        var endM   = endMin % 60;
        html += '<div class="turno-block ' + turno.barbero + '" style="top:0;height:' + (SLOT_HEIGHT - 3) + 'px">';
        html += '<div class="turno-cliente">' + turno.cliente + '</div>';
        html += '<div class="turno-servicio">' + turno.servicio + '</div>';
        html += '<div class="turno-hora">' + pad(turno.startHour) + ':' + pad(turno.startMin) + ' — ' + pad(endH) + ':' + pad(endM) + '</div>';
        html += '</div>';
      }
      html += '</td>';
    });
    html += '</tr>';
  }
  html += '</tbody></table>';

  document.getElementById('calendarContainer').innerHTML = html;
}

// ─── CONFIG SCHEDULE TABLES ───────────────────
var DIAS = ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];

function buildScheduleRows(bodyId, scheduleData) {
  var tbody = document.getElementById(bodyId);
  var html  = '';
  DIAS.forEach(function(dia, i) {
    var row = scheduleData[i];
    html += '<tr>';
    html += '<td class="day-name-cell">' + dia + '</td>';
    html += '<td><label class="toggle" style="display:inline-flex">';
    html += '<input type="checkbox" ' + (row.active ? 'checked' : '') + ' onchange="toggleScheduleDay(this,\'' + bodyId + '\',' + i + ')">';
    html += '<div class="toggle-track"></div><div class="toggle-thumb"></div></label></td>';
    html += '<td><div class="time-inputs' + (row.active ? '' : ' disabled-row') + '" id="' + bodyId + '-time-' + i + '">';
    html += '<input type="time" class="time-input" value="' + row.from + '">';
    html += '<span class="time-sep">a</span>';
    html += '<input type="time" class="time-input" value="' + row.to + '">';
    html += '</div></td>';
    html += '</tr>';
  });
  tbody.innerHTML = html;
}

function toggleScheduleDay(checkbox, bodyId, rowIdx) {
  var el = document.getElementById(bodyId + '-time-' + rowIdx);
  if (el) el.classList.toggle('disabled-row', !checkbox.checked);
}

var generalSchedule = [
  {active:true, from:'09:00',to:'22:00'},{active:true, from:'09:00',to:'22:00'},
  {active:true, from:'09:00',to:'22:00'},{active:true, from:'09:00',to:'22:00'},
  {active:true, from:'09:00',to:'22:00'},{active:true, from:'09:00',to:'20:00'},
  {active:false,from:'09:00',to:'13:00'},
];
var carlosSchedule = [
  {active:true, from:'09:00',to:'18:00'},{active:true, from:'09:00',to:'18:00'},
  {active:true, from:'09:00',to:'18:00'},{active:false,from:'09:00',to:'18:00'},
  {active:true, from:'09:00',to:'18:00'},{active:true, from:'09:00',to:'14:00'},
  {active:false,from:'09:00',to:'13:00'},
];
var facundoSchedule = [
  {active:true, from:'13:00',to:'22:00'},{active:true, from:'13:00',to:'22:00'},
  {active:false,from:'13:00',to:'22:00'},{active:true, from:'13:00',to:'22:00'},
  {active:true, from:'13:00',to:'22:00'},{active:true, from:'10:00',to:'20:00'},
  {active:false,from:'09:00',to:'13:00'},
];
var agustinSchedule = [
  {active:true, from:'09:00',to:'14:00'},{active:true, from:'09:00',to:'14:00'},
  {active:true, from:'09:00',to:'14:00'},{active:true, from:'09:00',to:'14:00'},
  {active:false,from:'09:00',to:'14:00'},{active:true, from:'09:00',to:'13:00'},
  {active:false,from:'09:00',to:'13:00'},
];

function switchBarberTab(name) {
  document.querySelectorAll('.barber-tab-btn').forEach(function(b) {
    b.classList.toggle('active', b.textContent.toLowerCase().indexOf(name === 'carlos' ? 'carlos' : name === 'facundo' ? 'facundo' : 'agust') !== -1);
  });
  document.querySelectorAll('.barber-tab-panel').forEach(function(p) { p.classList.remove('active'); });
  document.getElementById('barber-' + name).classList.add('active');
}

function selectDuration(el) {
  document.querySelectorAll('.duration-pill').forEach(function(p) { p.classList.remove('active'); });
  el.classList.add('active');
}

var nolaborDays = [
  {fecha:'2026-05-25',desc:'Día de la Patria'},
  {fecha:'2026-07-09',desc:'Día de la Independencia'},
  {fecha:'2026-12-08',desc:'Inmaculada Concepción'},
];

function renderNolabor() {
  var list = document.getElementById('nolaborList');
  if (!nolaborDays.length) { list.innerHTML = '<p style="font-size:13px;color:var(--ink-mute)">Sin días registrados.</p>'; return; }
  list.innerHTML = nolaborDays.map(function(d, i) {
    var p = d.fecha.split('-');
    return '<div class="nolabor-card">' +
      '<span class="nolabor-date">' + pad(parseInt(p[2])) + '/' + pad(parseInt(p[1])) + '/' + p[0] + '</span>' +
      '<span class="nolabor-desc">' + d.desc + '</span>' +
      '<button class="nolabor-del" onclick="removeNolabor(' + i + ')">&times;</button></div>';
  }).join('');
}

function addNolabor() {
  var fecha = document.getElementById('nolaborFecha').value;
  var desc  = document.getElementById('nolaborDesc').value.trim();
  if (!fecha || !desc) return;
  nolaborDays.push({fecha:fecha, desc:desc});
  document.getElementById('nolaborFecha').value = '';
  document.getElementById('nolaborDesc').value  = '';
  renderNolabor();
}

function removeNolabor(i) { nolaborDays.splice(i, 1); renderNolabor(); }

function toggleAdelanto() {
  var on = document.getElementById('adelantoToggle').checked;
  document.getElementById('adelantoFields').classList.toggle('hidden', !on);
  document.getElementById('adelantoToggleLabel').textContent = on ? 'Cobro de adelanto activo' : 'Cobro de adelanto inactivo';
}

// ─── SIDEBAR MOBILE ──────────────────────────
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

// ══════════════════════════════════════════════
// MODAL NUEVO TURNO V2
// ══════════════════════════════════════════════
var modalState = {
  clienteTipo: 'registrado',
  clienteSeleccionado: null,
  servicios: [],
  barbero: null,
  fecha: null,
  hora: null,
};

var calWidgetCurrent = new Date();

function openNuevoTurno(presetDayOffset, presetBarber, presetSlotIndex) {
  // Reset
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
  document.getElementById('secClienteRapido').style.display = 'none';
  document.getElementById('timeSlotsWrap').style.display  = 'none';
  document.getElementById('resumenSection').style.display = 'none';
  document.getElementById('serviceSummaryLine').textContent = 'Sin servicios seleccionados';

  // Pre-seleccionar barbero si se llega desde celda
  if (presetBarber) {
    modalState.barbero = presetBarber;
    document.querySelectorAll('.barber-card-m').forEach(function(c) {
      if (c.classList.contains(presetBarber)) c.classList.add('selected');
    });
  }

  // Resetear el widget de calendario al mes actual por defecto
  calWidgetCurrent = new Date();

  // Pre-seleccionar fecha desde dayOffset relativo al lunes de la semana actual
  if (presetDayOffset !== undefined && presetDayOffset !== null) {
    var mon = getMondayOf(currentDate);
    var presetDate = new Date(mon);
    presetDate.setDate(mon.getDate() + presetDayOffset);
    presetDate.setHours(0, 0, 0, 0);
    var todayCheck = new Date(); todayCheck.setHours(0, 0, 0, 0);
    if (presetDate >= todayCheck) {
      modalState.fecha = presetDate;
      calWidgetCurrent = new Date(presetDate.getFullYear(), presetDate.getMonth(), 1);
    }
  }

  // Pre-seleccionar horario desde índice de slot
  if (presetSlotIndex !== undefined && presetSlotIndex !== null) {
    var slotMins = DAY_START * 60 + presetSlotIndex * 30;
    modalState.hora = pad(Math.floor(slotMins / 60)) + ':' + pad(slotMins % 60);
  }

  renderCalWidget();
  if (modalState.fecha) renderTimeSlots();
  document.getElementById('nuevoTurnoOverlay').classList.add('open');
  updateResumen();
}

function closeNuevoTurno() {
  document.getElementById('nuevoTurnoOverlay').classList.remove('open');
}

document.getElementById('nuevoTurnoOverlay').addEventListener('click', function(e) {
  if (e.target === this) closeNuevoTurno();
});

// ─── SECCIÓN 1: CLIENTE ───────────────────────
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
    return '<div class="search-result" onclick="selectCliente(' + c.id + ')">' +
      '<strong>' + c.nombre + '</strong> <span style="color:var(--ink-mute);font-size:11.5px;margin-left:6px">' + c.email + '</span></div>';
  }).join('');
  dropdown.classList.add('open');
}

function selectCliente(id) {
  var c = null;
  for (var i = 0; i < CLIENTES_SAMPLE.length; i++) { if (CLIENTES_SAMPLE[i].id === id) { c = CLIENTES_SAMPLE[i]; break; } }
  if (!c) return;
  modalState.clienteSeleccionado = c;
  document.getElementById('clienteSearch').value = c.nombre;
  document.getElementById('clienteDropdown').classList.remove('open');
  updateResumen();
}

// ─── SECCIÓN 2: SERVICIOS ─────────────────────
var SERVICES_DEF_AG = [
  { nombre:'Corte', precio:3500 }, { nombre:'Barba', precio:2500 },
  { nombre:'Cejas', precio:1500 }, { nombre:'Coloración', precio:5000 },
];

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
    var svc = SERVICES_DEF_AG.find(function(s) { return s.nombre === nombre; });
    if (svc) total += svc.precio;
  });
  var el = document.getElementById('serviceSummaryLine');
  if (!el) return;
  el.textContent = !modalState.servicios.length
    ? 'Sin servicios seleccionados'
    : modalState.servicios.length + ' servicio' + (modalState.servicios.length > 1 ? 's' : '') + ' · Total: $' + total.toLocaleString('es-AR');
}

// ─── SECCIÓN 3: BARBERO ───────────────────────
function selectBarberModal(el, key) {
  document.querySelectorAll('.barber-card-m').forEach(function(c) { c.classList.remove('selected'); });
  el.classList.add('selected');
  modalState.barbero = key;
  if (modalState.fecha) renderTimeSlots();
  updateResumen();
}

// ─── SECCIÓN 4: CALENDARIO ───────────────────
function calWidgetNav(dir) {
  calWidgetCurrent = new Date(calWidgetCurrent.getFullYear(), calWidgetCurrent.getMonth() + dir, 1);
  renderCalWidget();
}

function renderCalWidget() {
  var y = calWidgetCurrent.getFullYear();
  var m = calWidgetCurrent.getMonth();
  document.getElementById('calWidgetMonth').textContent = MONTHS_ES_CAP[m] + ' ' + y;

  var today    = new Date(); today.setHours(0,0,0,0);
  var firstDay = new Date(y, m, 1);
  var lastDate = new Date(y, m + 1, 0).getDate();
  var fdow     = firstDay.getDay(); // 0=Dom..6=Sáb

  // Blancos iniciales en grilla Lun-Sáb: Mon=0 blancos, Dom=0 blancos (día 1 se salta)
  var leadingBlanks = (fdow === 0) ? 0 : fdow - 1;

  var html = '';
  for (var b = 0; b < leadingBlanks; b++) html += '<div></div>';

  for (var day = 1; day <= lastDate; day++) {
    var d   = new Date(y, m, day);
    var dow = d.getDay();
    if (dow === 0) continue; // saltar domingos

    var isPast    = d < today;
    var isToday   = d.getTime() === today.getTime();
    var isSelected = modalState.fecha && d.getTime() === modalState.fecha.getTime();

    var cls = 'cal-day-btn';
    if (isToday && !isSelected) cls += ' today';
    if (isSelected) cls += ' selected';

    if (isPast) {
      html += '<button class="' + cls + '" disabled>' + day + '</button>';
    } else {
      html += '<button class="' + cls + '" onclick="selectCalDay(' + y + ',' + m + ',' + day + ')">' + day + '</button>';
    }
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

  // Turnos ocupados para el barbero seleccionado en la fecha seleccionada
  var occupiedMins = [];
  if (modalState.barbero && modalState.fecha) {
    var monday = getMondayOf(modalState.fecha);
    var dow    = Math.round((modalState.fecha - monday) / (1000 * 60 * 60 * 24));
    TURNOS.forEach(function(t) {
      if (t.barbero === modalState.barbero && t.dayOffset === dow) {
        occupiedMins.push(t.startHour * 60 + t.startMin);
      }
    });
  }

  var html = '';
  // 9:00 a 21:30 de 30 en 30
  for (var tm = 9 * 60; tm <= 21 * 60 + 30; tm += 30) {
    var hh = Math.floor(tm / 60);
    var mm = tm % 60;
    var label      = pad(hh) + ':' + pad(mm);
    var isOccupied = occupiedMins.indexOf(tm) !== -1;
    var isSelected = modalState.hora === label;
    var cls = 'time-slot-btn' + (isOccupied ? ' occupied' : '') + (isSelected ? ' selected' : '');
    if (isOccupied) {
      html += '<button class="' + cls + '" disabled>Ocupado</button>';
    } else {
      html += '<button class="' + cls + '" onclick="selectTimeSlot(\'' + label + '\')">' + label + '</button>';
    }
  }
  grid.innerHTML = html;
}

function selectTimeSlot(label) {
  modalState.hora = label;
  renderTimeSlots();
  updateResumen();
}

// ─── SECCIÓN 5: RESUMEN ───────────────────────
function updateResumen() {
  var section = document.getElementById('resumenSection');
  var card    = document.getElementById('resumenCard');

  var hasData = (modalState.clienteSeleccionado !== null) ||
    (modalState.clienteTipo === 'rapido' &&
      (document.getElementById('clienteNombre').value || document.getElementById('clienteApellido').value)) ||
    modalState.servicios.length > 0 ||
    modalState.barbero !== null ||
    modalState.fecha !== null ||
    modalState.hora !== null;

  if (!hasData) { section.style.display = 'none'; return; }
  section.style.display = '';

  // Cliente
  var clienteLabel = '—';
  if (modalState.clienteTipo === 'registrado' && modalState.clienteSeleccionado) {
    clienteLabel = modalState.clienteSeleccionado.nombre;
  } else if (modalState.clienteTipo === 'rapido') {
    var n = document.getElementById('clienteNombre').value;
    var a = document.getElementById('clienteApellido').value;
    if (n || a) clienteLabel = (n + ' ' + a).trim();
  }

  // Total
  var total = 0;
  modalState.servicios.forEach(function(nombre) {
    var svc = SERVICES_DEF_AG.find(function(s) { return s.nombre === nombre; });
    if (svc) total += svc.precio;
  });

  // Barbero
  var barberLabel = '—';
  BARBERS.forEach(function(b) { if (b.key === modalState.barbero) barberLabel = b.label; });

  // Fecha
  var fechaLabel = '—';
  if (modalState.fecha) {
    fechaLabel = pad(modalState.fecha.getDate()) + '/' + pad(modalState.fecha.getMonth() + 1) + '/' + modalState.fecha.getFullYear();
  }

  card.innerHTML =
    row('Cliente',   clienteLabel) +
    row('Servicios', modalState.servicios.length ? modalState.servicios.join(', ') : '—') +
    row('Barbero',   barberLabel) +
    row('Fecha',     fechaLabel) +
    row('Horario',   modalState.hora || '—') +
    '<div class="resumen-row resumen-total">' +
      '<span class="resumen-label">Total</span>' +
      '<span class="resumen-value">$' + total.toLocaleString('es-AR') + '</span>' +
    '</div>';
}

function row(label, value) {
  return '<div class="resumen-row"><span class="resumen-label">' + label + '</span><span class="resumen-value">' + value + '</span></div>';
}

function confirmarTurno() {
  alert('Turno confirmado (demo)');
  closeNuevoTurno();
}

// ─── INIT ─────────────────────────────────────
renderCalendar();
buildScheduleRows('generalScheduleBody', generalSchedule);
buildScheduleRows('carlosScheduleBody',  carlosSchedule);
buildScheduleRows('facundoScheduleBody', facundoSchedule);
buildScheduleRows('agustinScheduleBody', agustinSchedule);
renderNolabor();
</script>

</body>
</html>
