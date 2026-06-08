<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar turno — Barber Brizu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,400&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ── Design tokens (idénticos a welcome) ── */
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
            --red:         oklch(72%   0.16  22);
            --red-soft:    oklch(93%   0.045 22);
            --red-deep:    oklch(50%   0.17  22);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Outfit', -apple-system, sans-serif;
            font-size: 15px;
            line-height: 1.5;
            background: var(--paper);
            color: var(--ink);
        }

        /* ── Navbar ── */
        .site-nav {
            position: sticky;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 48px;
            background: oklch(98.5% 0.004 240 / 0.85);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-bottom: 1px solid oklch(88% 0.06 85);
            z-index: 100;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--ink);
        }
        .logo-mark {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: var(--blue-600);
            color: var(--paper);
            display: grid; place-items: center;
            font-weight: 700; font-size: 14px;
            letter-spacing: 0.04em;
            flex-shrink: 0;
        }
        .logo-text { font-weight: 600; font-size: 17px; letter-spacing: -0.01em; }
        .nav-links { display: flex; gap: 32px; list-style: none; }
        .nav-links a {
            font-size: 14px; font-weight: 500;
            color: var(--ink-soft);
            text-decoration: none;
            transition: color 0.15s;
        }
        .nav-links a:hover { color: var(--ink); }
        .nav-actions { display: flex; gap: 10px; align-items: center; }
        .link-login {
            font-size: 14px;
            color: var(--ink-soft);
            text-decoration: none;
            transition: color 0.15s;
        }
        .link-login:hover { color: var(--ink); }

        /* ── Buttons ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 20px;
            border-radius: 10px;
            font-family: 'Outfit', sans-serif;
            font-size: 14px; font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: opacity 0.15s;
        }
        .btn:hover { opacity: 0.82; }
        .btn-dark { background: var(--ink); color: var(--paper); }
        .btn-gold {
            background: var(--gold);
            color: var(--ink);
            font-weight: 600;
            padding: 14px 28px;
            font-size: 15px;
        }
        .btn-outline {
            background: transparent;
            color: var(--ink);
            border: 1.5px solid var(--rule);
            padding: 13px 22px;
            font-size: 15px;
        }
        .btn-outline:hover { border-color: var(--ink); }
        .btn-gold:disabled { opacity: 0.4; cursor: not-allowed; }

        /* ── Mobile nav ── */
        .hamburger {
            display: none; flex-direction: column; gap: 5px;
            background: none; border: none;
            cursor: pointer; padding: 8px; border-radius: 8px;
        }
        .hamburger span { display: block; width: 22px; height: 2px; background: var(--ink); border-radius: 2px; }
        .mobile-nav {
            display: none; position: fixed; inset: 0;
            background: var(--paper); z-index: 200;
            flex-direction: column; padding: 20px 24px 32px;
            overflow-y: auto;
        }
        .mobile-nav.open { display: flex; }
        .mobile-nav-header {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 32px; padding-bottom: 20px;
            border-bottom: 2px solid var(--gold);
        }
        .mobile-nav-close {
            background: none; border: 1px solid var(--rule);
            font-size: 18px; cursor: pointer; color: var(--ink);
            padding: 6px 12px; border-radius: 8px;
            line-height: 1; font-family: 'Outfit', sans-serif;
        }
        .mobile-nav-links { list-style: none; display: flex; flex-direction: column; }
        .mobile-nav-links a {
            display: block; padding: 16px 0;
            font-size: 20px; font-weight: 500;
            color: var(--ink); text-decoration: none;
            border-bottom: 1px solid var(--rule);
        }
        .mobile-nav-actions { margin-top: 32px; display: flex; flex-direction: column; gap: 12px; }

        /* ── Step indicator ── */
        .step-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 48px;
        }
        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }
        .step-circle {
            width: 36px; height: 36px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; font-weight: 600;
            border: 2px solid var(--rule);
            background: var(--paper);
            color: var(--ink-mute);
            transition: all 0.2s;
        }
        .step-item.active .step-circle {
            background: var(--blue-600);
            border-color: var(--blue-600);
            color: var(--paper);
        }
        .step-item.done .step-circle {
            background: var(--blue-50);
            border-color: var(--blue-400);
            color: var(--blue-600);
            font-size: 16px;
        }
        .step-label {
            font-size: 12px; font-weight: 500;
            color: var(--ink-mute);
            white-space: nowrap;
        }
        .step-item.active .step-label { color: var(--blue-600); font-weight: 600; }
        .step-item.done .step-label { color: var(--ink-soft); }
        .step-connector {
            width: 80px; height: 2px;
            background: var(--rule);
            margin-bottom: 26px;
            flex-shrink: 0;
            transition: background 0.2s;
        }
        .step-connector.done { background: var(--blue-400); }

        /* ── Section heading ── */
        .section-h {
            font-size: 18px; font-weight: 600;
            letter-spacing: -0.01em;
            margin-bottom: 16px;
            color: var(--ink);
        }

        /* ── Service cards ── */
        .service-card {
            border: 2px solid var(--rule);
            border-radius: 16px;
            padding: 20px;
            cursor: pointer;
            transition: border-color 0.15s, box-shadow 0.15s;
            position: relative;
            user-select: none;
            background: var(--paper);
        }
        .service-card:hover { border-color: var(--blue-200); }
        .service-card.selected {
            border-color: var(--blue-600);
            box-shadow: 0 0 0 3px var(--blue-50);
        }
        .service-card .check {
            position: absolute; top: 12px; right: 12px;
            width: 22px; height: 22px; border-radius: 50%;
            background: var(--blue-600); color: white;
            display: none; align-items: center; justify-content: center;
            font-size: 12px; font-weight: 700;
        }
        .service-card.selected .check { display: flex; }

        /* ── Calendar ── */
        .calendar-card {
            border: 1px solid var(--rule);
            border-radius: 16px;
            padding: 24px;
            background: var(--paper);
        }
        .cal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .cal-nav-btn {
            background: none; border: 1px solid var(--rule);
            border-radius: 8px; width: 32px; height: 32px;
            cursor: pointer; font-size: 18px; color: var(--ink-soft);
            display: flex; align-items: center; justify-content: center;
            transition: border-color 0.15s, color 0.15s;
            font-family: inherit;
        }
        .cal-nav-btn:hover { border-color: var(--blue-400); color: var(--ink); }
        .cal-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 4px; }
        .cal-weekday {
            text-align: center;
            font-size: 11px; font-weight: 600;
            color: var(--ink-mute);
            letter-spacing: 0.04em;
            padding: 6px 0;
            text-transform: uppercase;
        }
        .cal-day {
            aspect-ratio: 1;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 500;
            border-radius: 8px;
            border: 1.5px solid transparent;
            transition: all 0.12s;
        }
        .cal-day.available {
            cursor: pointer;
        }
        .cal-day.available:hover {
            background: var(--blue-50);
            border-color: var(--blue-200);
            color: var(--blue-600);
        }
        .cal-day.selected {
            background: var(--blue-600);
            color: white;
            border-color: var(--blue-600);
        }
        .cal-day.today { border-color: var(--gold); }
        .cal-day.today.selected { border-color: var(--blue-600); }
        .cal-day.disabled {
            color: var(--ink-mute);
            opacity: 0.35;
            cursor: not-allowed;
        }
        .cal-day.sunday {
            color: var(--red-deep);
            background: var(--red-soft);
            opacity: 0.5;
            cursor: not-allowed;
        }
        .cal-day.empty { cursor: default; }

        /* ── Time slots ── */
        .time-slot {
            padding: 11px 8px;
            text-align: center;
            font-size: 13px; font-weight: 500;
            border: 1.5px solid var(--rule);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.12s;
            background: var(--paper);
        }
        .time-slot:hover:not(.occupied) {
            border-color: var(--blue-400);
            background: var(--blue-50);
            color: var(--blue-600);
        }
        .time-slot.selected {
            background: var(--blue-600);
            border-color: var(--blue-600);
            color: white;
        }
        .time-slot.occupied {
            opacity: 0.38;
            cursor: not-allowed;
            text-decoration: line-through;
            background: var(--paper-2);
        }

        /* ── Barber cards ── */
        .barber-card {
            border: 2px solid var(--rule);
            border-radius: 14px;
            padding: 20px 16px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            transition: border-color 0.15s, background 0.15s;
            user-select: none;
            background: var(--paper);
        }
        .barber-card:hover { border-color: var(--blue-200); }
        .barber-card.selected {
            border-color: var(--blue-600);
            background: var(--blue-50);
        }
        .barber-avatar {
            width: 52px; height: 52px; border-radius: 50%;
            background: var(--blue-100);
            color: var(--blue-600);
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; font-weight: 700;
            transition: background 0.15s, color 0.15s;
        }
        .barber-card.selected .barber-avatar {
            background: var(--blue-600);
            color: white;
        }
        .barber-name {
            font-size: 13px; font-weight: 500;
            text-align: center;
            color: var(--ink);
            line-height: 1.3;
        }
        .barber-card.auto .barber-avatar {
            background: var(--paper-2);
            color: var(--ink-mute);
            font-size: 22px;
        }
        .barber-card.auto.selected .barber-avatar {
            background: var(--blue-600);
            color: white;
        }

        /* ── Summary strip (paso 2) ── */
        .summary-strip {
            background: var(--blue-50);
            border: 1px solid var(--blue-100);
            border-radius: 14px;
            padding: 16px 22px;
            display: flex;
            gap: 32px;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 36px;
        }
        .summary-item { display: flex; flex-direction: column; gap: 2px; }
        .summary-label {
            font-size: 10px; font-weight: 600;
            color: var(--blue-400);
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        .summary-value { font-size: 15px; font-weight: 600; color: var(--ink); }

        /* ── Booking summary card (paso 3) ── */
        .booking-card {
            background: var(--paper-2);
            border: 1px solid var(--rule);
            border-radius: 18px;
            padding: 28px 32px;
            margin-bottom: 24px;
        }
        .booking-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-top: 20px;
        }
        .booking-row {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .booking-label {
            font-size: 11px; font-weight: 500;
            color: var(--ink-mute);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        .booking-value {
            font-size: 18px; font-weight: 600;
            color: var(--ink);
        }

        /* ── Textarea ── */
        textarea {
            width: 100%;
            padding: 14px 16px;
            border: 1.5px solid var(--rule);
            border-radius: 12px;
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
            color: var(--ink);
            background: var(--paper);
            resize: vertical;
            min-height: 96px;
            transition: border-color 0.15s;
            outline: none;
            line-height: 1.55;
        }
        textarea:focus { border-color: var(--blue-400); }
        textarea::placeholder { color: var(--ink-mute); }

        /* ── Info message ── */
        .info-msg {
            background: var(--blue-50);
            border: 1px solid var(--blue-100);
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 13px;
            color: var(--blue-600);
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 32px;
        }

        /* ── Modal ── */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: oklch(0% 0 0 / 0.52);
            z-index: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .modal-card {
            background: var(--paper);
            border-radius: 24px;
            padding: 48px 40px;
            max-width: 440px;
            width: 100%;
            text-align: center;
            box-shadow: 0 24px 64px -16px rgba(0,0,0,0.28);
        }
        .modal-icon {
            width: 72px; height: 72px;
            border-radius: 50%;
            background: oklch(95% 0.07 145);
            color: oklch(42% 0.15 145);
            display: flex; align-items: center; justify-content: center;
            font-size: 34px;
            margin: 0 auto 24px;
        }

        /* ── Footer ── */
        .site-footer {
            padding: 80px 48px 32px;
            border-top: 1px solid var(--rule);
            background: var(--paper);
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .nav-links, .nav-actions { display: none; }
            .hamburger { display: flex; }
            .site-nav { padding: 16px 20px; }
            .page-main { padding: 32px 20px 56px !important; }
            .services-grid { grid-template-columns: 1fr 1fr !important; }
            .times-grid { grid-template-columns: repeat(4, 1fr) !important; }
            .barbers-grid { grid-template-columns: 1fr 1fr !important; }
            .booking-grid { grid-template-columns: 1fr !important; gap: 16px !important; }
            .step-connector { width: 36px !important; }
            .step-label { font-size: 10px !important; }
            .site-footer { padding: 56px 20px 32px !important; }
            .footer-top { flex-direction: column; align-items: flex-start; }
            .footer-bottom { flex-direction: column; align-items: flex-start; gap: 8px; }
            .summary-strip { gap: 16px; }
            .modal-card { padding: 36px 24px; }
        }
    </style>
</head>
<body>

{{-- ══════════════════════════════════════════════════
     MOBILE NAV
══════════════════════════════════════════════════ --}}
<div class="mobile-nav" id="mobileNav">
    <div class="mobile-nav-header">
        <a href="/" class="logo" onclick="closeMobileNav()">
            <div class="logo-mark">BB</div>
            <div class="logo-text">Barber Brizu</div>
        </a>
        <button class="mobile-nav-close" onclick="closeMobileNav()">✕</button>
    </div>
    <ul class="mobile-nav-links">
        <li><a href="/"           onclick="closeMobileNav()">Inicio</a></li>
        <li><a href="/#servicios" onclick="closeMobileNav()">Servicios</a></li>
        <li><a href="/#nosotros"  onclick="closeMobileNav()">Sobre nosotros</a></li>
        <li><a href="/#contacto"  onclick="closeMobileNav()">Contacto</a></li>
    </ul>
    <div class="mobile-nav-actions">
        <a href="/reservar" class="btn btn-dark" style="justify-content: center;" onclick="closeMobileNav()">Sacar turno →</a>
        <a href="#" class="link-login" style="text-align: center; padding: 12px 0; display: block;" onclick="closeMobileNav()">Iniciar sesión</a>
    </div>
</div>


{{-- ══════════════════════════════════════════════════
     NAVBAR
══════════════════════════════════════════════════ --}}
<header class="site-nav">
    <a href="/" class="logo">
        <div class="logo-mark">BB</div>
        <div class="logo-text">Barber Brizu</div>
    </a>

    <nav>
        <ul class="nav-links">
            <li><a href="/">Inicio</a></li>
            <li><a href="/#servicios">Servicios</a></li>
            <li><a href="/#nosotros">Sobre nosotros</a></li>
            <li><a href="/#contacto">Contacto</a></li>
        </ul>
    </nav>

    <div class="nav-actions">
        <a href="#" class="link-login">Iniciar sesión</a>
        <a href="/reservar" class="btn btn-dark">Sacar turno</a>
    </div>

    <button class="hamburger" onclick="openMobileNav()" aria-label="Abrir menú">
        <span></span><span></span><span></span>
    </button>
</header>


{{-- ══════════════════════════════════════════════════
     MAIN
══════════════════════════════════════════════════ --}}
<main class="page-main" style="padding: 48px 48px 80px; max-width: 1000px; margin: 0 auto;">

    {{-- Título de página --}}
    <div style="margin-bottom: 40px;">
        <h1 style="font-size: 36px; font-weight: 600; letter-spacing: -0.02em; line-height: 1.1;">Reservá tu turno</h1>
        <p style="font-size: 15px; color: var(--ink-soft); margin-top: 8px;">Completá los datos para confirmar tu reserva</p>
    </div>

    {{-- Indicador de progreso --}}
    <div class="step-indicator">
        <div class="step-item active" id="si-1">
            <div class="step-circle">1</div>
            <div class="step-label">Servicio y barbero</div>
        </div>
        <div class="step-connector" id="sc-1"></div>
        <div class="step-item" id="si-2">
            <div class="step-circle">2</div>
            <div class="step-label">Fecha y horario</div>
        </div>
        <div class="step-connector" id="sc-2"></div>
        <div class="step-item" id="si-3">
            <div class="step-circle">3</div>
            <div class="step-label">Confirmación</div>
        </div>
    </div>


    {{-- ══════════════════════════════════════════════════
         PASO 1 — Servicio y barbero
    ══════════════════════════════════════════════════ --}}
    <div id="panel-1">

        {{-- Elegí tu servicio --}}
        <div style="margin-bottom: 40px;">
            <div class="section-h">Elegí tu servicio</div>
            <div class="services-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px;">

                <div class="service-card" onclick="toggleService(this, 'Corte de cabello', 3500)">
                    <div class="check">✓</div>
                    <div style="width: 40px; height: 40px; border-radius: 10px; background: var(--blue-50); display: grid; place-items: center; color: var(--blue-600); margin-bottom: 14px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="6" cy="6.5" r="2.5"/><circle cx="6" cy="17.5" r="2.5"/>
                            <line x1="20" y1="4" x2="8.2" y2="15.8"/>
                            <line x1="14.5" y1="14.5" x2="20" y2="20"/>
                            <line x1="8.2" y1="8.2" x2="12" y2="12"/>
                        </svg>
                    </div>
                    <div style="font-weight: 600; margin-bottom: 4px;">Corte de cabello</div>
                    <div style="font-size: 12px; color: var(--ink-mute); margin-bottom: 14px; line-height: 1.4;">Clásico o moderno, a tu medida</div>
                    <div style="font-size: 22px; font-weight: 700; letter-spacing: -0.02em;">$3.500</div>
                </div>

                <div class="service-card" onclick="toggleService(this, 'Barba', 2500)">
                    <div class="check">✓</div>
                    <div style="width: 40px; height: 40px; border-radius: 10px; background: var(--paper-2); display: grid; place-items: center; color: var(--ink-soft); margin-bottom: 14px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="4" width="16" height="6" rx="2"/>
                            <line x1="4" y1="7.5" x2="20" y2="7.5"/>
                            <line x1="12" y1="10" x2="12" y2="19"/>
                            <line x1="9.5" y1="19" x2="14.5" y2="19"/>
                        </svg>
                    </div>
                    <div style="font-weight: 600; margin-bottom: 4px;">Barba</div>
                    <div style="font-size: 12px; color: var(--ink-mute); margin-bottom: 14px; line-height: 1.4;">Perfilado y diseño</div>
                    <div style="font-size: 22px; font-weight: 700; letter-spacing: -0.02em;">$2.500</div>
                </div>

                <div class="service-card" onclick="toggleService(this, 'Cejas', 1500)">
                    <div class="check">✓</div>
                    <div style="width: 40px; height: 40px; border-radius: 10px; background: var(--red-soft); display: grid; place-items: center; color: var(--red-deep); margin-bottom: 14px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3.5 10 C 7 5, 17 5, 20.5 10"/>
                            <path d="M5 14.5 C 8 19, 16 19, 19 14.5"/>
                            <circle cx="12" cy="16.2" r="1.4" fill="currentColor" stroke="none"/>
                        </svg>
                    </div>
                    <div style="font-weight: 600; margin-bottom: 4px;">Cejas</div>
                    <div style="font-size: 12px; color: var(--ink-mute); margin-bottom: 14px; line-height: 1.4;">Diseño y depilación</div>
                    <div style="font-size: 22px; font-weight: 700; letter-spacing: -0.02em;">$1.500</div>
                </div>

                <div class="service-card" onclick="toggleService(this, 'Coloración', 5000)">
                    <div class="check">✓</div>
                    <div style="width: 40px; height: 40px; border-radius: 10px; background: var(--gold-soft); display: grid; place-items: center; color: var(--gold-deep); margin-bottom: 14px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="8" y="3" width="8" height="11" rx="2"/>
                            <rect x="10" y="1" width="4" height="3" rx="1"/>
                            <path d="M9 14 L9 16 L15 16 L15 14"/>
                            <circle cx="12" cy="19.5" r="2" fill="currentColor" stroke="none"/>
                        </svg>
                    </div>
                    <div style="font-weight: 600; margin-bottom: 4px;">Coloración</div>
                    <div style="font-size: 12px; color: var(--ink-mute); margin-bottom: 14px; line-height: 1.4;">Mechas y tinte</div>
                    <div style="font-size: 22px; font-weight: 700; letter-spacing: -0.02em;">$5.000</div>
                </div>

            </div>
        </div>

        {{-- Resumen dinámico de selección --}}
        <div id="service-summary" style="display: none; margin-bottom: 32px; align-items: center; padding: 14px 18px; background: var(--blue-50); border: 1px solid var(--blue-100); border-radius: 12px; font-size: 14px;">
            <div id="service-summary-text" style="font-weight: 500; color: var(--ink);"></div>
        </div>

        {{-- Elegí tu barbero --}}
        <div style="margin-bottom: 40px;">
            <div class="section-h">
                Elegí tu barbero
                <span style="font-size: 13px; font-weight: 400; color: var(--ink-mute);">(opcional)</span>
            </div>
            <div class="barbers-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px;">

                <div class="barber-card" onclick="selectBarber(this, 'Carlos Medina')">
                    <div class="barber-avatar">CM</div>
                    <div class="barber-name">Carlos Medina</div>
                </div>

                <div class="barber-card" onclick="selectBarber(this, 'Facundo Torres')">
                    <div class="barber-avatar">FT</div>
                    <div class="barber-name">Facundo Torres</div>
                </div>

                <div class="barber-card" onclick="selectBarber(this, 'Agustín Romero')">
                    <div class="barber-avatar">AR</div>
                    <div class="barber-name">Agustín Romero</div>
                </div>

                <div class="barber-card auto" id="barber-auto" onclick="selectBarber(this, '')">
                    <div class="barber-avatar">◎</div>
                    <div class="barber-name">Sin preferencia</div>
                </div>

            </div>
        </div>

        {{-- Continuar --}}
        <div style="display: flex; justify-content: flex-end;">
            <button class="btn btn-gold" id="btn-step1" onclick="step1Continue()" disabled>Continuar →</button>
        </div>
    </div>


    {{-- ══════════════════════════════════════════════════
         PASO 2 — Fecha y horario
    ══════════════════════════════════════════════════ --}}
    <div id="panel-2" style="display: none;">

        {{-- Resumen paso 1 --}}
        <div class="summary-strip">
            <div class="summary-item">
                <div class="summary-label">Servicios</div>
                <div class="summary-value" id="sum-services">—</div>
            </div>
            <div style="width: 1px; background: var(--blue-100); flex-shrink: 0; align-self: stretch;"></div>
            <div class="summary-item">
                <div class="summary-label">Barbero</div>
                <div class="summary-value" id="sum-barber">—</div>
            </div>
        </div>

        {{-- Elegí una fecha --}}
        <div style="margin-bottom: 40px;">
            <div class="section-h">Elegí una fecha</div>
            <div class="calendar-card">
                <div class="cal-header">
                    <button class="cal-nav-btn" onclick="prevMonth()">‹</button>
                    <div style="font-size: 16px; font-weight: 600;" id="calMonthLabel"></div>
                    <button class="cal-nav-btn" onclick="nextMonth()">›</button>
                </div>
                <div class="cal-grid" id="calGrid"></div>
                <div style="margin-top: 16px; display: flex; gap: 16px; flex-wrap: wrap;">
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--ink-mute);">
                        <span style="width: 14px; height: 14px; border-radius: 4px; background: var(--blue-600); display: inline-block;"></span>
                        Seleccionado
                    </div>
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--ink-mute);">
                        <span style="width: 14px; height: 14px; border-radius: 4px; background: var(--red-soft); display: inline-block;"></span>
                        Domingo (cerrado)
                    </div>
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--ink-mute);">
                        <span style="width: 14px; height: 14px; border-radius: 4px; border: 1.5px solid var(--gold); display: inline-block;"></span>
                        Hoy
                    </div>
                </div>
            </div>
        </div>

        {{-- Horarios disponibles --}}
        <div style="margin-bottom: 40px;">
            <div class="section-h">Horarios disponibles</div>
            <div style="margin-bottom: 12px; display: flex; gap: 16px; flex-wrap: wrap;">
                <div style="display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--ink-mute);">
                    <span style="width: 14px; height: 14px; border-radius: 4px; background: var(--paper-2); border: 1px solid var(--rule); display: inline-block;"></span>
                    Ocupado
                </div>
                <div style="display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--ink-mute);">
                    <span style="width: 14px; height: 14px; border-radius: 4px; background: var(--blue-600); display: inline-block;"></span>
                    Seleccionado
                </div>
            </div>
            <div class="times-grid" style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 8px;" id="timesGrid"></div>
        </div>

        {{-- Botones --}}
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <button class="btn btn-outline" onclick="goToStep(1)">← Volver</button>
            <button class="btn btn-gold" onclick="step2Continue()">Continuar →</button>
        </div>
    </div>


    {{-- ══════════════════════════════════════════════════
         PASO 3 — Confirmar reserva
    ══════════════════════════════════════════════════ --}}
    <div id="panel-3" style="display: none;">

        {{-- Resumen completo --}}
        <div class="booking-card">
            <div style="font-size: 11px; font-weight: 600; color: var(--ink-mute); text-transform: uppercase; letter-spacing: 0.1em;">Resumen de tu reserva</div>
            {{-- Lista de servicios con precio individual --}}
            <div id="sum3-services-list" style="margin-top: 20px; padding-bottom: 16px; border-bottom: 1px solid var(--rule);"></div>
            {{-- Fecha, horario, barbero --}}
            <div class="booking-grid">
                <div class="booking-row">
                    <div class="booking-label">Fecha</div>
                    <div class="booking-value" id="sum3-date">—</div>
                </div>
                <div class="booking-row">
                    <div class="booking-label">Horario</div>
                    <div class="booking-value" id="sum3-time">—</div>
                </div>
                <div class="booking-row">
                    <div class="booking-label">Barbero</div>
                    <div class="booking-value" id="sum3-barber">—</div>
                </div>
            </div>
            <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--rule); display: flex; justify-content: space-between; align-items: center;">
                <div class="booking-label">Precio total</div>
                <div style="font-size: 28px; font-weight: 700; letter-spacing: -0.02em;" id="sum3-price">—</div>
            </div>
        </div>

        {{-- Comentarios --}}
        <div style="margin-bottom: 24px;">
            <div style="font-size: 15px; font-weight: 500; margin-bottom: 10px;">
                Aclaraciones o comentarios
                <span style="font-size: 13px; font-weight: 400; color: var(--ink-mute);">(opcional)</span>
            </div>
            <textarea id="comments" placeholder="Ej: prefiero navaja para la barba, alergia a ciertos productos…"></textarea>
        </div>

        {{-- Info --}}
        <div class="info-msg">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;">
                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><circle cx="12" cy="16" r="0.5" fill="currentColor"/>
            </svg>
            Recibirás una confirmación por email una vez confirmado el turno.
        </div>

        {{-- Botones --}}
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <button class="btn btn-outline" onclick="goToStep(2)">← Volver</button>
            <button class="btn btn-gold" onclick="confirmBooking()">Confirmar turno →</button>
        </div>
    </div>

</main>


{{-- ══════════════════════════════════════════════════
     MODAL DE ÉXITO
══════════════════════════════════════════════════ --}}
<div class="modal-overlay" id="modalSuccess" style="display: none;" onclick="handleModalClick(event)">
    <div class="modal-card">
        <div class="modal-icon">✓</div>
        <h2 style="font-size: 26px; font-weight: 600; letter-spacing: -0.01em; margin-bottom: 12px;">¡Turno reservado!</h2>
        <p style="color: var(--ink-soft); font-size: 15px; line-height: 1.65; margin-bottom: 32px;">
            Te enviamos los detalles por email.<br>Revisá tu bandeja de entrada.
        </p>
        <div style="display: flex; flex-direction: column; gap: 10px;">
            <a href="/dashboard/usuarios" class="btn btn-dark" style="justify-content: center; padding: 14px 24px; font-size: 15px;">Ver mis turnos</a>
            <a href="/" class="btn btn-outline" style="justify-content: center;">Volver al inicio</a>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════════════════
     FOOTER
══════════════════════════════════════════════════ --}}
<footer class="site-footer">
    <div class="footer-top" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 24px; margin-bottom: 28px;">

        <div>
            <a href="/" class="logo">
                <div class="logo-mark">BB</div>
                <div class="logo-text">Barber Brizu</div>
            </a>
            <div style="margin-top: 14px; font-size: 13px; color: var(--ink-mute); max-width: 280px; line-height: 1.55;">
                Jujuy 209 · Ciudad de Formosa<br>
                Lun a Sáb · 9:00 — 22:00 hs
            </div>
        </div>

        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="#" style="display: inline-flex; align-items: center; gap: 10px; padding: 12px 18px; border-radius: 12px; border: 1px solid var(--rule); background: var(--paper); color: var(--ink); font-size: 14px; font-weight: 500; text-decoration: none;">
                <span style="width: 28px; height: 28px; border-radius: 8px; background: var(--blue-50); display: grid; place-items: center; color: var(--blue-600); flex-shrink: 0;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="0.6" fill="currentColor"/>
                    </svg>
                </span>
                <div style="display: flex; flex-direction: column; align-items: flex-start; line-height: 1.2;">
                    <span style="font-size: 11px; color: var(--ink-mute); font-weight: 400;">Instagram</span>
                    <span>@barberbrizu</span>
                </div>
            </a>
            <a href="#" style="display: inline-flex; align-items: center; gap: 10px; padding: 12px 18px; border-radius: 12px; border: 1px solid var(--rule); background: var(--paper); color: var(--ink); font-size: 14px; font-weight: 500; text-decoration: none;">
                <span style="width: 28px; height: 28px; border-radius: 8px; background: oklch(95% 0.05 145); display: grid; place-items: center; color: oklch(45% 0.15 145); flex-shrink: 0;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.5 14.4c-.3-.2-1.8-.9-2.1-1-.3-.1-.5-.2-.7.2-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-.3-.2-1.3-.5-2.4-1.5-.9-.8-1.5-1.8-1.7-2.1-.2-.3 0-.5.1-.6.1-.1.3-.3.4-.5.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5 0-.1-.7-1.7-1-2.3-.3-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1.1 2.8 1.2 3c.1.2 2.1 3.2 5.1 4.5.7.3 1.3.5 1.7.6.7.2 1.3.2 1.9.1.6-.1 1.8-.7 2-1.4.2-.7.2-1.3.2-1.4-.1-.1-.3-.2-.6-.4zM12 2C6.5 2 2 6.5 2 12c0 1.7.5 3.4 1.3 4.9L2 22l5.3-1.4c1.4.8 3 1.2 4.7 1.2 5.5 0 10-4.5 10-10S17.5 2 12 2z"/>
                    </svg>
                </span>
                <div style="display: flex; flex-direction: column; align-items: flex-start; line-height: 1.2;">
                    <span style="font-size: 11px; color: var(--ink-mute); font-weight: 400;">WhatsApp</span>
                    <span>Escribinos</span>
                </div>
            </a>
        </div>
    </div>

    <div class="footer-bottom" style="padding-top: 20px; border-top: 1px solid var(--rule); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; font-size: 13px; color: var(--ink-mute);">
        <div>© 2026 Barber Brizu · Hecho con ❤️ en Formosa</div>
        <div style="display: flex; gap: 20px;">
            <span>Términos</span>
            <span>Privacidad</span>
        </div>
    </div>
</footer>


<script>
    // ── Estado ────────────────────────────────────────────────────────────────
    const state = {
        step:      1,
        services:  [],   // [{ name, price }]
        barber:    '',   // '' = sin preferencia
        date:      null,
        dateLabel: null,
        time:      null,
    };

    const ALL_TIMES = ['9:00','9:30','10:00','10:30','11:00','11:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30'];
    const OCCUPIED  = new Set(['9:30','11:00','14:30','16:00']);

    const MONTH_NAMES = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
    const DAY_NAMES   = ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'];

    const today = new Date();
    let calYear  = today.getFullYear();
    let calMonth = today.getMonth();

    // ── Navegación entre pasos ────────────────────────────────────────────────
    function goToStep(n) {
        document.getElementById('panel-' + state.step).style.display = 'none';
        state.step = n;
        document.getElementById('panel-' + n).style.display = 'block';
        updateStepIndicator();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function updateStepIndicator() {
        for (let i = 1; i <= 3; i++) {
            const el = document.getElementById('si-' + i);
            el.classList.remove('active', 'done');
            const circle = el.querySelector('.step-circle');
            if (i === state.step) {
                el.classList.add('active');
                circle.textContent = i;
            } else if (i < state.step) {
                el.classList.add('done');
                circle.textContent = '✓';
            } else {
                circle.textContent = i;
            }
        }
        for (let i = 1; i <= 2; i++) {
            document.getElementById('sc-' + i).classList.toggle('done', i < state.step);
        }
    }

    // ── Paso 1: servicios (multi-select) ──────────────────────────────────────
    function toggleService(el, name, price) {
        const idx = state.services.findIndex(s => s.name === name);
        if (idx >= 0) {
            state.services.splice(idx, 1);
            el.classList.remove('selected');
        } else {
            state.services.push({ name, price });
            el.classList.add('selected');
        }
        updateServiceSummary();
    }

    function updateServiceSummary() {
        const count = state.services.length;
        const total = state.services.reduce((acc, s) => acc + s.price, 0);
        const bar   = document.getElementById('service-summary');
        const btn   = document.getElementById('btn-step1');
        const text  = document.getElementById('service-summary-text');

        if (count === 0) {
            bar.style.display = 'none';
            btn.disabled = true;
        } else {
            const label = count === 1 ? '1 servicio seleccionado' : count + ' servicios seleccionados';
            text.textContent = label + ' · Total estimado: $' + total.toLocaleString('es-AR');
            bar.style.display = 'flex';
            btn.disabled = false;
        }
    }

    // ── Paso 1: barbero ───────────────────────────────────────────────────────
    function selectBarber(el, name) {
        document.querySelectorAll('.barber-card').forEach(c => c.classList.remove('selected'));
        el.classList.add('selected');
        state.barber = name;
    }

    function step1Continue() {
        if (state.services.length === 0) { alert('Por favor elegí al menos un servicio.'); return; }
        document.getElementById('sum-services').textContent = state.services.map(s => s.name).join(', ');
        document.getElementById('sum-barber').textContent   = state.barber || 'Sin preferencia';
        renderCalendar();
        renderTimes();
        goToStep(2);
    }

    // ── Calendario (en panel 2) ───────────────────────────────────────────────
    function renderCalendar() {
        document.getElementById('calMonthLabel').textContent = MONTH_NAMES[calMonth] + ' ' + calYear;

        const grid = document.getElementById('calGrid');
        grid.innerHTML = '';

        DAY_NAMES.forEach(d => {
            const h = document.createElement('div');
            h.className = 'cal-weekday';
            h.textContent = d;
            grid.appendChild(h);
        });

        const firstDow      = new Date(calYear, calMonth, 1).getDay();
        const daysInMonth   = new Date(calYear, calMonth + 1, 0).getDate();
        const todayMidnight = new Date(today.getFullYear(), today.getMonth(), today.getDate());

        for (let i = 0; i < firstDow; i++) {
            const e = document.createElement('div');
            e.className = 'cal-day empty';
            grid.appendChild(e);
        }

        for (let d = 1; d <= daysInMonth; d++) {
            const cell     = document.createElement('div');
            const thisDate = new Date(calYear, calMonth, d);
            const dow      = thisDate.getDay();
            const isPast   = thisDate < todayMidnight;
            const isToday  = thisDate.getTime() === todayMidnight.getTime();
            const dateStr  = calYear + '-' + String(calMonth + 1).padStart(2, '0') + '-' + String(d).padStart(2, '0');

            if (dow === 0) {
                cell.className = 'cal-day sunday';
                cell.title = 'Domingo: cerrado';
            } else if (isPast) {
                cell.className = 'cal-day disabled';
            } else {
                cell.className = 'cal-day available';
                if (isToday)                cell.classList.add('today');
                if (state.date === dateStr) cell.classList.add('selected');
                cell.onclick = () => {
                    document.querySelectorAll('.cal-day').forEach(c => c.classList.remove('selected'));
                    cell.classList.add('selected');
                    state.date      = dateStr;
                    state.dateLabel = DAY_NAMES[dow] + ' ' + d + ' de ' + MONTH_NAMES[calMonth];
                };
            }

            cell.textContent = d;
            grid.appendChild(cell);
        }
    }

    function prevMonth() {
        if (calMonth === 0) { calMonth = 11; calYear--; } else calMonth--;
        renderCalendar();
    }

    function nextMonth() {
        if (calMonth === 11) { calMonth = 0; calYear++; } else calMonth++;
        renderCalendar();
    }

    // ── Paso 2: horarios ──────────────────────────────────────────────────────
    function renderTimes() {
        const grid = document.getElementById('timesGrid');
        grid.innerHTML = '';
        ALL_TIMES.forEach(t => {
            const btn = document.createElement('div');
            const occ = OCCUPIED.has(t);
            btn.className = 'time-slot' + (occ ? ' occupied' : '');
            btn.textContent = t;
            if (!occ) {
                if (state.time === t) btn.classList.add('selected');
                btn.onclick = () => {
                    document.querySelectorAll('.time-slot').forEach(c => c.classList.remove('selected'));
                    btn.classList.add('selected');
                    state.time = t;
                };
            }
            grid.appendChild(btn);
        });
    }

    function step2Continue() {
        if (!state.date) { alert('Por favor elegí una fecha.'); return; }
        if (!state.time) { alert('Por favor elegí un horario.'); return; }
        buildStep3();
        goToStep(3);
    }

    // ── Paso 3: resumen completo ──────────────────────────────────────────────
    function buildStep3() {
        const list = document.getElementById('sum3-services-list');
        list.innerHTML = '';
        state.services.forEach(s => {
            const row = document.createElement('div');
            row.style.cssText = 'display: flex; justify-content: space-between; align-items: center; padding: 8px 0;';
            row.innerHTML =
                '<div style="font-size: 15px; font-weight: 500;">' + s.name + '</div>' +
                '<div style="font-size: 15px; font-weight: 600;">$' + s.price.toLocaleString('es-AR') + '</div>';
            list.appendChild(row);
        });
        const total = state.services.reduce((acc, s) => acc + s.price, 0);
        document.getElementById('sum3-date').textContent   = state.dateLabel;
        document.getElementById('sum3-time').textContent   = state.time + ' hs';
        document.getElementById('sum3-barber').textContent = state.barber || 'Se asignará automáticamente';
        document.getElementById('sum3-price').textContent  = '$' + total.toLocaleString('es-AR');
    }

    // ── Confirmación y modal ──────────────────────────────────────────────────
    function confirmBooking() {
        document.getElementById('modalSuccess').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function handleModalClick(e) {
        if (e.target === document.getElementById('modalSuccess')) closeModal();
    }

    function closeModal() {
        document.getElementById('modalSuccess').style.display = 'none';
        document.body.style.overflow = '';
    }

    // ── Mobile nav ────────────────────────────────────────────────────────────
    function openMobileNav()  {
        document.getElementById('mobileNav').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeMobileNav() {
        document.getElementById('mobileNav').classList.remove('open');
        document.body.style.overflow = '';
    }

    // ── Init ──────────────────────────────────────────────────────────────────
    document.getElementById('barber-auto').classList.add('selected');
</script>

</body>
</html>
