<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barber Brizu — Jujuy 209, Formosa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ── Design tokens ── */
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
            border-bottom: 1px solid var(--rule);
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
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--blue-600);
            color: var(--paper);
            display: grid;
            place-items: center;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.04em;
            flex-shrink: 0;
        }
        .logo-text {
            font-weight: 600;
            font-size: 17px;
            letter-spacing: -0.01em;
        }

        .nav-links {
            display: flex;
            gap: 32px;
            list-style: none;
        }
        .nav-links a {
            font-size: 14px;
            font-weight: 500;
            color: var(--ink-soft);
            text-decoration: none;
            transition: color 0.15s;
        }
        .nav-links a:hover { color: var(--ink); }

        .nav-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }
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
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: opacity 0.15s;
        }
        .btn:hover { opacity: 0.82; }
        .btn-dark {
            background: var(--ink);
            color: var(--paper);
        }
        .btn-dark-lg {
            padding: 14px 24px;
            font-size: 15px;
        }
        .btn-outline {
            background: transparent;
            color: var(--ink);
            border: 1px solid var(--ink);
            padding: 14px 22px;
            font-size: 15px;
        }

        /* ── Tags ── */
        .tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.02em;
            background: var(--blue-50);
            color: var(--blue-600);
        }
        .tag-gold {
            background: oklch(96% 0.04 85);
            color: oklch(48% 0.08 80);
        }
        .tag-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--blue-400);
            display: inline-block;
            flex-shrink: 0;
        }
        .tag-gold .tag-dot { background: var(--gold); }

        /* ── Map placeholder ── */
        .map-ph {
            position: relative;
            background:
                linear-gradient(0deg,  transparent 49.5%, oklch(88% 0.015 235) 49.5% 50.5%, transparent 50.5%) 0 30% / 100% 1px no-repeat,
                linear-gradient(0deg,  transparent 49.5%, oklch(88% 0.015 235) 49.5% 50.5%, transparent 50.5%) 0 65% / 100% 1px no-repeat,
                linear-gradient(90deg, transparent 49.5%, oklch(88% 0.015 235) 49.5% 50.5%, transparent 50.5%) 25% 0 / 1px 100% no-repeat,
                linear-gradient(90deg, transparent 49.5%, oklch(88% 0.015 235) 49.5% 50.5%, transparent 50.5%) 70% 0 / 1px 100% no-repeat,
                var(--blue-50);
            overflow: hidden;
        }
        .map-ph .pin {
            position: absolute;
            top: 30%;
            left: 25%;
            transform: translate(-50%, -100%);
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: var(--ink);
            box-shadow: 0 0 0 4px var(--paper), 0 0 0 5px var(--ink);
        }
    </style>
</head>
<body>

{{-- ══════════════════════════════════════════════════
     NAVBAR
══════════════════════════════════════════════════ --}}
<header class="site-nav">
    <a href="#inicio" class="logo">
        <div class="logo-mark">BB</div>
        <div class="logo-text">Barber Brizu</div>
    </a>

    <nav>
        <ul class="nav-links">
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="#servicios">Servicios</a></li>
            <li><a href="#nosotros">Sobre nosotros</a></li>
            <li><a href="#contacto">Contacto</a></li>
        </ul>
    </nav>

    <div class="nav-actions">
        <a href="#" class="link-login">Iniciar sesión</a>
        <a href="#" class="btn btn-dark">Sacar turno</a>
    </div>
</header>


{{-- ══════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════ --}}
<section id="inicio" style="padding: 56px 48px 72px;">
    <div style="
        background: var(--blue-50);
        border-radius: 24px;
        padding: 64px 56px;
        display: grid;
        grid-template-columns: 1.1fr 1fr;
        gap: 56px;
        align-items: center;
        position: relative;
        overflow: hidden;
    ">
        {{-- Elementos decorativos --}}
        <div style="
            position: absolute; top: -120px; right: -120px;
            width: 360px; height: 360px;
            border-radius: 50%;
            background: var(--blue-100);
            opacity: 0.6;
        "></div>
        <div style="
            position: absolute; bottom: -60px; left: 40%;
            width: 14px; height: 14px;
            border-radius: 50%;
            background: var(--red);
        "></div>
        <div style="
            position: absolute; top: 28px; left: 38%;
            width: 8px; height: 8px;
            border-radius: 50%;
            background: var(--gold);
        "></div>

        {{-- Columna izquierda: texto --}}
        <div style="position: relative; z-index: 1;">
            <span class="tag">
                <span class="tag-dot"></span>
                Reservá online — sin esperas
            </span>

            <h1 style="
                font-size: 68px;
                font-weight: 600;
                letter-spacing: -0.025em;
                line-height: 1.04;
                margin: 20px 0 0;
                text-wrap: pretty;
            ">
                Tu próximo<br>
                corte arranca<br>
                <span style="color: var(--blue-600);">acá.</span>
            </h1>

            <p style="
                margin-top: 24px;
                font-size: 17px;
                color: var(--ink-soft);
                max-width: 440px;
                line-height: 1.55;
            ">
                Elegí día, horario y barbero. Te confirmamos al instante
                y te avisamos antes de que vengas.
            </p>

            <div style="margin-top: 32px; display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                <a href="#" class="btn btn-dark btn-dark-lg">Sacar turno →</a>
                <a href="#servicios" class="btn btn-outline">Ver servicios</a>
            </div>

            {{-- Mini-status --}}
            <div style="margin-top: 40px; display: flex; gap: 24px; flex-wrap: wrap;">
                <div style="display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--ink-soft);">
                    <span style="width: 8px; height: 8px; border-radius: 50%; background: oklch(70% 0.15 145); display: inline-block; flex-shrink: 0;"></span>
                    Hoy abierto · 9:00 — 22:00
                </div>
                <div style="font-size: 13px; color: var(--ink-soft);">4 barberos disponibles</div>
                <div style="font-size: 13px; color: var(--ink-soft);">Jujuy 209</div>
            </div>
        </div>

        {{-- Columna derecha: ilustración --}}
        <div style="position: relative; z-index: 1;">

            {{-- Ilustración barbería --}}
            <div style="
                height: 380px;
                border-radius: 16px;
                border: 1px solid var(--rule);
                overflow: hidden;
                background: var(--blue-50);
            ">
                <svg viewBox="0 0 600 440" preserveAspectRatio="xMidYMid slice" style="width: 100%; height: 100%; display: block;">
                    <defs>
                        <linearGradient id="sky-v2" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="oklch(96% 0.025 240)" />
                            <stop offset="100%" stop-color="oklch(91% 0.045 240)" />
                        </linearGradient>
                        <clipPath id="pole-v2">
                            <rect x="0" y="0" width="16" height="180" rx="8" />
                        </clipPath>
                    </defs>

                    <rect width="600" height="440" fill="url(#sky-v2)" />

                    {{-- Vereda --}}
                    <rect x="0" y="395" width="600" height="45" fill="oklch(88% 0.015 245)" />
                    <line x1="0" y1="395" x2="600" y2="395" stroke="var(--ink)" stroke-width="1.5" />
                    <line x1="40"  y1="415" x2="120" y2="415" stroke="var(--ink)" stroke-width="1" opacity="0.25" />
                    <line x1="200" y1="425" x2="320" y2="425" stroke="var(--ink)" stroke-width="1" opacity="0.25" />
                    <line x1="400" y1="418" x2="540" y2="418" stroke="var(--ink)" stroke-width="1" opacity="0.25" />

                    {{-- Fachada --}}
                    <rect x="30" y="40" width="540" height="355" fill="var(--paper)" stroke="var(--ink)" stroke-width="2" />

                    {{-- Cartel oscuro --}}
                    <rect x="30" y="60" width="540" height="78" fill="var(--ink)" />
                    <text x="300" y="111" text-anchor="middle" font-family="Georgia, serif" font-size="36" font-style="italic" font-weight="500" fill="var(--paper)" letter-spacing="2">Barber Brizu</text>
                    <text x="300" y="129" text-anchor="middle" font-family="'Outfit', sans-serif" font-size="9" fill="var(--gold)" letter-spacing="6">SINCE 2025 · JUJUY 209</text>

                    {{-- Línea dorada --}}
                    <rect x="30" y="142" width="540" height="4" fill="var(--gold)" />

                    {{-- Toldillo rayado --}}
                    <rect x="30"  y="148" width="45" height="20" fill="var(--paper)" />
                    <rect x="75"  y="148" width="45" height="20" fill="var(--red-soft)" />
                    <rect x="120" y="148" width="45" height="20" fill="var(--paper)" />
                    <rect x="165" y="148" width="45" height="20" fill="var(--red-soft)" />
                    <rect x="210" y="148" width="45" height="20" fill="var(--paper)" />
                    <rect x="255" y="148" width="45" height="20" fill="var(--red-soft)" />
                    <rect x="300" y="148" width="45" height="20" fill="var(--paper)" />
                    <rect x="345" y="148" width="45" height="20" fill="var(--red-soft)" />
                    <rect x="390" y="148" width="45" height="20" fill="var(--paper)" />
                    <rect x="435" y="148" width="45" height="20" fill="var(--red-soft)" />
                    <rect x="480" y="148" width="45" height="20" fill="var(--paper)" />
                    <rect x="525" y="148" width="45" height="20" fill="var(--red-soft)" />
                    <line x1="30" y1="168" x2="570" y2="168" stroke="var(--ink)" stroke-width="1.2" />

                    {{-- Vidriera --}}
                    <rect x="58" y="170" width="338" height="225" fill="oklch(91% 0.055 245)" stroke="var(--ink)" stroke-width="1.8" />
                    <line x1="227" y1="170" x2="227" y2="395" stroke="var(--ink)" stroke-width="1.5" />
                    <line x1="58"  y1="240" x2="396" y2="240" stroke="var(--ink)" stroke-width="1" opacity="0.4" />

                    {{-- Silla de barbero --}}
                    <g fill="oklch(22% 0.015 245)" opacity="0.85" transform="translate(110, 270)">
                        <rect x="0"   y="60" width="60" height="70" rx="3" />
                        <rect x="-6"  y="30" width="72" height="38" rx="6" />
                        <rect x="-10" y="6"  width="80" height="26" rx="8" />
                        <rect x="22"  y="130" width="20" height="8" />
                        <rect x="-2"  y="135" width="64" height="6" />
                    </g>

                    {{-- Espejo + mostrador --}}
                    <rect x="252" y="262" width="120" height="80" fill="var(--paper)" stroke="var(--ink)" stroke-width="1" />
                    <line x1="252" y1="345" x2="372" y2="345" stroke="var(--ink)" stroke-width="1.5" />
                    <circle cx="270" cy="338" r="3"   fill="var(--red)" />
                    <rect   x="280" y="330" width="6" height="12" fill="var(--blue-600)" />
                    <rect   x="292" y="332" width="5" height="10" fill="var(--gold)" />
                    <circle cx="304" cy="338" r="2.5" fill="var(--ink)" />
                    <line x1="262" y1="275" x2="280" y2="275" stroke="var(--rule)" stroke-width="1.5" />
                    <line x1="262" y1="285" x2="320" y2="285" stroke="var(--rule)" stroke-width="1.5" />
                    <line x1="262" y1="295" x2="295" y2="295" stroke="var(--rule)" stroke-width="1.5" />

                    {{-- Cartel OPEN --}}
                    <g transform="translate(70, 180)">
                        <rect width="58" height="20" rx="10" fill="var(--red)" />
                        <circle cx="11" cy="10" r="3" fill="var(--paper)" />
                        <text x="36" y="14" text-anchor="middle" font-family="'Outfit', sans-serif" font-size="10" font-weight="700" fill="var(--paper)" letter-spacing="1.5">OPEN</text>
                    </g>

                    {{-- Puerta --}}
                    <rect x="416" y="170" width="128" height="225" fill="var(--paper-2)" stroke="var(--ink)" stroke-width="1.8" />
                    <rect x="432" y="188" width="96"  height="115"  fill="oklch(91% 0.055 245)" stroke="var(--ink)" stroke-width="1.3" />
                    <line x1="438" y1="200" x2="465" y2="200" stroke="var(--paper)" stroke-width="2" opacity="0.7" />
                    <line x1="438" y1="210" x2="455" y2="210" stroke="var(--paper)" stroke-width="2" opacity="0.5" />
                    <rect x="432" y="320" width="96" height="60" fill="none" stroke="var(--ink)" stroke-width="0.8" opacity="0.4" />
                    <rect x="438" y="345" width="6"  height="18" rx="3" fill="var(--ink)" />

                    {{-- Poste de barbero --}}
                    <g transform="translate(400, 200)">
                        <rect x="-3" y="-10" width="22" height="10" rx="2" fill="var(--ink)" />
                        <g clip-path="url(#pole-v2)">
                            <rect width="16" height="180" fill="var(--paper)" />
                            <g transform="translate(-30, -20) rotate(-30)">
                                <rect x="0"   y="0" width="8" height="240" fill="var(--red)" />
                                <rect x="16"  y="0" width="8" height="240" fill="var(--blue-600)" />
                                <rect x="32"  y="0" width="8" height="240" fill="var(--red)" />
                                <rect x="48"  y="0" width="8" height="240" fill="var(--blue-600)" />
                                <rect x="64"  y="0" width="8" height="240" fill="var(--red)" />
                                <rect x="80"  y="0" width="8" height="240" fill="var(--blue-600)" />
                                <rect x="96"  y="0" width="8" height="240" fill="var(--red)" />
                                <rect x="112" y="0" width="8" height="240" fill="var(--blue-600)" />
                                <rect x="128" y="0" width="8" height="240" fill="var(--red)" />
                                <rect x="144" y="0" width="8" height="240" fill="var(--blue-600)" />
                                <rect x="160" y="0" width="8" height="240" fill="var(--red)" />
                            </g>
                        </g>
                        <rect x="0" y="0" width="16" height="180" rx="8" fill="none" stroke="var(--ink)" stroke-width="1.3" />
                        <rect x="-3" y="180" width="22" height="10" rx="2" fill="var(--ink)" />
                    </g>

                    {{-- Planta --}}
                    <g transform="translate(548, 360)">
                        <rect x="0" y="14" width="22" height="22" rx="2" fill="var(--ink)" />
                        <path d="M 4 14 Q 7 0, 11 14"  fill="oklch(58% 0.12 145)" />
                        <path d="M 11 14 Q 15 -2, 19 14" fill="oklch(52% 0.13 145)" />
                    </g>

                    {{-- Número 209 --}}
                    <g transform="translate(40, 372)">
                        <rect width="32" height="18" rx="3" fill="var(--ink)" />
                        <text x="16" y="13" text-anchor="middle" font-family="'Outfit', sans-serif" font-size="11" font-weight="600" fill="var(--gold)" letter-spacing="1">209</text>
                    </g>
                </svg>
            </div>

            {{-- Tarjeta flotante: turnos --}}
            <div style="
                position: absolute;
                bottom: -32px; left: -24px;
                background: var(--paper);
                border-radius: 14px;
                padding: 18px;
                box-shadow: 0 12px 32px -8px rgba(20,30,50,0.18), 0 0 0 1px var(--rule);
                width: 270px;
                z-index: 2;
            ">
                <div style="font-size: 11px; color: var(--ink-mute); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 10px;">Próximos turnos libres</div>

                <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0;">
                    <div>
                        <div style="font-size: 14px; font-weight: 500;">Hoy · 19:30</div>
                        <div style="font-size: 12px; color: var(--ink-mute);">con Nico</div>
                    </div>
                    <div style="font-size: 12px; color: var(--blue-600); font-weight: 500; padding: 6px 10px; border-radius: 8px; background: var(--blue-50);">Reservar</div>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-top: 1px solid var(--rule);">
                    <div>
                        <div style="font-size: 14px; font-weight: 500;">Mañana · 10:00</div>
                        <div style="font-size: 12px; color: var(--ink-mute);">con Cualquiera</div>
                    </div>
                    <div style="font-size: 12px; color: var(--blue-600); font-weight: 500; padding: 6px 10px; border-radius: 8px; background: var(--blue-50);">Reservar</div>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-top: 1px solid var(--rule);">
                    <div>
                        <div style="font-size: 14px; font-weight: 500;">Mié 18 · 14:45</div>
                        <div style="font-size: 12px; color: var(--ink-mute);">con Nico</div>
                    </div>
                    <div style="font-size: 12px; color: var(--blue-600); font-weight: 500; padding: 6px 10px; border-radius: 8px; background: var(--blue-50);">Reservar</div>
                </div>
            </div>

            {{-- Badge superior --}}
            <div style="
                position: absolute;
                top: -16px; right: -16px;
                background: var(--ink);
                color: var(--paper);
                padding: 10px 14px;
                border-radius: 12px;
                font-size: 12px;
                font-weight: 500;
                display: flex;
                align-items: center;
                gap: 8px;
                z-index: 2;
            ">
                <span style="width: 6px; height: 6px; border-radius: 50%; background: var(--gold); display: inline-block; flex-shrink: 0;"></span>
                Confirmación al instante
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════
     SERVICIOS
══════════════════════════════════════════════════ --}}
<section id="servicios" style="padding: 40px 48px 80px;">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 32px; flex-wrap: wrap; gap: 16px;">
        <div>
            <span class="tag tag-gold">
                <span class="tag-dot"></span>
                Servicios
            </span>
            <h2 style="font-size: 42px; font-weight: 600; letter-spacing: -0.02em; margin: 14px 0 0;">
                Elegí qué te hacemos.
            </h2>
        </div>
        <div style="font-size: 14px; color: var(--ink-soft);">Precios de referencia</div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;">

        {{-- Corte de cabello --}}
        <div style="
            background: var(--paper); color: var(--ink);
            border: 1px solid var(--rule); border-radius: 18px;
            padding: 24px 22px;
            display: flex; flex-direction: column; min-height: 220px;
        ">
            <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--blue-50); display: grid; place-items: center; color: var(--blue-600);">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="6" cy="6.5" r="2.7" />
                    <circle cx="6" cy="17.5" r="2.7" />
                    <line x1="20" y1="4"    x2="8.2"  y2="15.8" />
                    <line x1="14.5" y1="14.5" x2="20" y2="20" />
                    <line x1="8.2" y1="8.2"  x2="12"  y2="12" />
                </svg>
            </div>
            <div style="font-size: 19px; font-weight: 600; margin-top: 20px; letter-spacing: -0.01em;">Corte de cabello</div>
            <div style="font-size: 13px; color: var(--ink-mute); margin-top: 6px; flex: 1;">Clásico o moderno, a tu medida.</div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                <div style="font-size: 24px; font-weight: 600; letter-spacing: -0.01em;">$3.500</div>
                <div style="width: 34px; height: 34px; border-radius: 50%; background: var(--ink); color: var(--paper); display: grid; place-items: center; font-size: 15px;">→</div>
            </div>
        </div>

        {{-- Barba (destacada / accent) --}}
        <div style="
            background: var(--ink); color: var(--paper);
            border: 1px solid var(--ink); border-radius: 18px;
            padding: 24px 22px;
            display: flex; flex-direction: column; min-height: 220px;
        ">
            <div style="width: 44px; height: 44px; border-radius: 12px; background: oklch(30% 0.02 240); display: grid; place-items: center; color: var(--gold);">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 6 h12 a1.5 1.5 0 0 1 1.5 1.5 v1 a3 3 0 0 1 -3 3 H7 a3 3 0 0 1 -3 -3 v-1 A1.5 1.5 0 0 1 5 6 z" />
                    <line x1="12" y1="11.5" x2="12" y2="19" />
                    <path d="M9 19 h6 a1 1 0 0 1 1 1 v0 a1 1 0 0 1 -1 1 h-6 a1 1 0 0 1 -1 -1 a1 1 0 0 1 1 -1 z" />
                    <line x1="7" y1="8.5" x2="16" y2="8.5" />
                </svg>
            </div>
            <div style="font-size: 19px; font-weight: 600; margin-top: 20px; letter-spacing: -0.01em;">Barba</div>
            <div style="font-size: 13px; color: oklch(75% 0.01 240); margin-top: 6px; flex: 1;">Perfilado y diseño.</div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                <div style="font-size: 24px; font-weight: 600; letter-spacing: -0.01em;">$2.500</div>
                <div style="width: 34px; height: 34px; border-radius: 50%; background: var(--paper); color: var(--ink); display: grid; place-items: center; font-size: 15px;">→</div>
            </div>
        </div>

        {{-- Cejas --}}
        <div style="
            background: var(--paper); color: var(--ink);
            border: 1px solid var(--rule); border-radius: 18px;
            padding: 24px 22px;
            display: flex; flex-direction: column; min-height: 220px;
        ">
            <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--red-soft); display: grid; place-items: center; color: var(--red-deep);">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3.5 10 C 7 5, 17 5, 20.5 10" />
                    <path d="M5 14.5 C 8 19, 16 19, 19 14.5" />
                    <circle cx="12" cy="16.2" r="1.4" fill="currentColor" stroke="none" />
                </svg>
            </div>
            <div style="font-size: 19px; font-weight: 600; margin-top: 20px; letter-spacing: -0.01em;">Cejas</div>
            <div style="font-size: 13px; color: var(--ink-mute); margin-top: 6px; flex: 1;">Diseño y depilación.</div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                <div style="font-size: 24px; font-weight: 600; letter-spacing: -0.01em;">$1.500</div>
                <div style="width: 34px; height: 34px; border-radius: 50%; background: var(--ink); color: var(--paper); display: grid; place-items: center; font-size: 15px;">→</div>
            </div>
        </div>

        {{-- Coloración --}}
        <div style="
            background: var(--paper); color: var(--ink);
            border: 1px solid var(--rule); border-radius: 18px;
            padding: 24px 22px;
            display: flex; flex-direction: column; min-height: 220px;
        ">
            <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--gold-soft); display: grid; place-items: center; color: var(--gold-deep);">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 3 C 8 9.5, 6 13, 6 15.5 a 6 6 0 0 0 12 0 c 0-2.5-2-6-6-12.5 z" />
                    <path d="M9.2 14.5 a 3 3 0 0 0 2.4 3.2" />
                </svg>
            </div>
            <div style="font-size: 19px; font-weight: 600; margin-top: 20px; letter-spacing: -0.01em;">Coloración</div>
            <div style="font-size: 13px; color: var(--ink-mute); margin-top: 6px; flex: 1;">Mechas y tinte.</div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                <div style="font-size: 24px; font-weight: 600; letter-spacing: -0.01em;">$5.000</div>
                <div style="width: 34px; height: 34px; border-radius: 50%; background: var(--ink); color: var(--paper); display: grid; place-items: center; font-size: 15px;">→</div>
            </div>
        </div>

    </div>
</section>


{{-- ══════════════════════════════════════════════════
     SOBRE NOSOTROS
══════════════════════════════════════════════════ --}}
<section id="nosotros" style="padding: 0 48px 80px;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">

        {{-- Info card --}}
        <div style="
            background: var(--paper-2);
            border-radius: 18px;
            padding: 36px;
            border: 1px solid var(--rule);
        ">
            <span class="tag tag-gold">
                <span class="tag-dot"></span>
                Sobre el local
            </span>

            <h3 style="
                font-size: 32px;
                font-weight: 600;
                letter-spacing: -0.02em;
                margin: 14px 0 14px;
                line-height: 1.1;
            ">
                Barbería de barrio,<br>con oficio de ciudad.
            </h3>

            <p style="font-size: 15px; color: var(--ink-soft); line-height: 1.6;">
                Rodrigo abrió Barber Brizu después de 8 años cortando en grandes
                barberías de Formosa. Hoy somos un equipo de 4 barberos atendiendo
                de lunes a sábados con turnos siempre puntuales.
            </p>

            <div style="
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                margin-top: 28px;
                padding-top: 24px;
                border-top: 1px solid var(--rule);
            ">
                <div>
                    <div style="font-size: 11px; color: var(--ink-mute); text-transform: uppercase; letter-spacing: 0.1em;">Dirección</div>
                    <div style="font-size: 17px; font-weight: 600; margin-top: 4px;">Jujuy 209</div>
                    <div style="font-size: 13px; color: var(--ink-mute);">Ciudad de Formosa</div>
                </div>
                <div>
                    <div style="font-size: 11px; color: var(--ink-mute); text-transform: uppercase; letter-spacing: 0.1em;">Horarios</div>
                    <div style="font-size: 17px; font-weight: 600; margin-top: 4px;">Lun a Sáb</div>
                    <div style="font-size: 13px; color: var(--ink-mute);">9:00 – 22:00 hs</div>
                </div>
            </div>

            <div style="margin-top: 28px; display: flex; gap: 10px; flex-wrap: wrap;">
                <a href="#" style="
                    padding: 10px 16px;
                    background: var(--ink); color: var(--paper);
                    border-radius: 10px; border: none;
                    font-size: 13px; font-weight: 500;
                    text-decoration: none; display: inline-flex; align-items: center;
                    font-family: 'Outfit', sans-serif;
                ">WhatsApp</a>
                <a href="#" style="
                    padding: 10px 16px;
                    background: transparent; color: var(--ink);
                    border: 1px solid var(--rule);
                    border-radius: 10px;
                    font-size: 13px; font-weight: 500;
                    text-decoration: none; display: inline-flex; align-items: center;
                ">@barberbrizu</a>
            </div>
        </div>

        {{-- Mapa estilizado --}}
        <div class="map-ph" style="border-radius: 18px; min-height: 380px; border: 1px solid var(--rule);">
            <div class="pin"></div>
            <div style="
                position: absolute;
                bottom: 18px; left: 18px; right: 18px;
                background: var(--paper);
                border-radius: 12px;
                padding: 14px 18px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 4px 16px -6px rgba(20,30,50,0.12);
                gap: 12px;
            ">
                <div>
                    <div style="font-size: 15px; font-weight: 600;">Jujuy 209</div>
                    <div style="font-size: 12px; color: var(--ink-mute);">Ciudad de Formosa</div>
                </div>
                <a href="#" style="
                    padding: 8px 14px;
                    background: var(--blue-50);
                    color: var(--blue-600);
                    border-radius: 8px;
                    font-size: 12px; font-weight: 500;
                    text-decoration: none;
                    white-space: nowrap;
                ">Cómo llegar ↗</a>
            </div>
        </div>

    </div>
</section>


{{-- ══════════════════════════════════════════════════
     FOOTER
══════════════════════════════════════════════════ --}}
<footer id="contacto" style="padding: 40px 48px 32px; border-top: 1px solid var(--rule); background: var(--paper);">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 24px; margin-bottom: 28px;">

        {{-- Bloque de marca --}}
        <div>
            <a href="#inicio" class="logo">
                <div class="logo-mark">BB</div>
                <div class="logo-text">Barber Brizu</div>
            </a>
            <div style="margin-top: 14px; font-size: 13px; color: var(--ink-mute); max-width: 280px; line-height: 1.55;">
                Jujuy 209 · Ciudad de Formosa<br>
                Lun a Sáb · 9:00 — 22:00 hs
            </div>
        </div>

        {{-- Redes sociales --}}
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="#" style="
                display: inline-flex; align-items: center; gap: 10px;
                padding: 12px 18px;
                border-radius: 12px; border: 1px solid var(--rule);
                background: var(--paper); color: var(--ink);
                font-size: 14px; font-weight: 500;
                text-decoration: none;
            ">
                <span style="
                    width: 28px; height: 28px; border-radius: 8px;
                    background: var(--blue-50);
                    display: grid; place-items: center;
                    color: var(--blue-600); flex-shrink: 0;
                ">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="5" />
                        <circle cx="12" cy="12" r="4" />
                        <circle cx="17.5" cy="6.5" r="0.6" fill="currentColor" />
                    </svg>
                </span>
                <div style="display: flex; flex-direction: column; align-items: flex-start; line-height: 1.2;">
                    <span style="font-size: 11px; color: var(--ink-mute); font-weight: 400;">Instagram</span>
                    <span>@barberbrizu</span>
                </div>
            </a>

            <a href="#" style="
                display: inline-flex; align-items: center; gap: 10px;
                padding: 12px 18px;
                border-radius: 12px; border: 1px solid var(--rule);
                background: var(--paper); color: var(--ink);
                font-size: 14px; font-weight: 500;
                text-decoration: none;
            ">
                <span style="
                    width: 28px; height: 28px; border-radius: 8px;
                    background: oklch(95% 0.05 145);
                    display: grid; place-items: center;
                    color: oklch(45% 0.15 145); flex-shrink: 0;
                ">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.5 14.4c-.3-.2-1.8-.9-2.1-1-.3-.1-.5-.2-.7.2-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-.3-.2-1.3-.5-2.4-1.5-.9-.8-1.5-1.8-1.7-2.1-.2-.3 0-.5.1-.6.1-.1.3-.3.4-.5.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5 0-.1-.7-1.7-1-2.3-.3-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1.1 2.8 1.2 3c.1.2 2.1 3.2 5.1 4.5.7.3 1.3.5 1.7.6.7.2 1.3.2 1.9.1.6-.1 1.8-.7 2-1.4.2-.7.2-1.3.2-1.4-.1-.1-.3-.2-.6-.4zM12 2C6.5 2 2 6.5 2 12c0 1.7.5 3.4 1.3 4.9L2 22l5.3-1.4c1.4.8 3 1.2 4.7 1.2 5.5 0 10-4.5 10-10S17.5 2 12 2z" />
                    </svg>
                </span>
                <div style="display: flex; flex-direction: column; align-items: flex-start; line-height: 1.2;">
                    <span style="font-size: 11px; color: var(--ink-mute); font-weight: 400;">WhatsApp</span>
                    <span>Escribinos</span>
                </div>
            </a>
        </div>
    </div>

    {{-- Barra inferior --}}
    <div style="
        padding-top: 20px;
        border-top: 1px solid var(--rule);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        font-size: 13px;
        color: var(--ink-mute);
    ">
        <div>© 2026 Barber Brizu</div>
        <div style="display: flex; gap: 20px;">
            <span>Términos</span>
            <span>Privacidad</span>
        </div>
    </div>
</footer>

</body>
</html>
