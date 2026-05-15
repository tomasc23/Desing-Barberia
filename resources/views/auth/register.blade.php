<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta — Barber Brizu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;1,500&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ── Tokens ── */
        :root {
            --paper:     oklch(98.5% 0.004 240);
            --paper-2:   oklch(96.5% 0.006 240);
            --ink:       oklch(16%   0.01  240);
            --ink-soft:  oklch(35%   0.012 240);
            --ink-mute:  oklch(52%   0.012 240);
            --rule:      oklch(89%   0.008 240);
            --blue-50:   oklch(94%   0.035 240);
            --blue-100:  oklch(87%   0.07  240);
            --blue-400:  oklch(56%   0.155 250);
            --blue-600:  oklch(40%   0.17  252);
            --gold:      oklch(80%   0.15  85);
            --red:       oklch(72%   0.16  22);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; }

        body {
            font-family: 'Outfit', -apple-system, sans-serif;
            font-size: 15px;
            line-height: 1.5;
            color: var(--ink);
            background: var(--paper);
        }

        /* ── Layout 2 columnas ── */
        .auth-page {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
            position: relative;
        }

        /* ── Nav absoluta ── */
        .auth-nav {
            position: absolute;
            top: 0; left: 0; right: 0;
            display: flex; align-items: center; justify-content: space-between;
            padding: 24px 40px; z-index: 10;
        }
        .auth-logo { display: flex; align-items: center; gap: 10px; text-decoration: none; color: var(--ink); }
        .logo-mark {
            width: 36px; height: 36px; border-radius: 10px;
            background: var(--blue-600); color: var(--paper);
            display: grid; place-items: center;
            font-weight: 700; font-size: 14px; letter-spacing: 0.04em; flex-shrink: 0;
        }
        .logo-text { font-weight: 600; font-size: 17px; letter-spacing: -0.01em; }
        .nav-back { font-size: 14px; color: var(--ink-soft); text-decoration: none; }
        .nav-back:hover { color: var(--ink); }

        /* ── Panel formulario (izquierda) ── */
        .form-panel {
            padding: 72px 64px 56px;
            display: flex; flex-direction: column; justify-content: flex-start;
            background: var(--paper);
        }
        .form-inner { max-width: 460px; width: 100%; margin: 0 auto; }

        /* ── Tag ── */
        .tag-gold {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 6px 12px; border-radius: 999px;
            font-size: 12px; font-weight: 500; letter-spacing: 0.02em;
            background: oklch(96% 0.04 85); color: oklch(48% 0.08 80);
        }
        .tag-gold-dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: var(--gold); display: inline-block; flex-shrink: 0;
        }

        /* ── Inputs ── */
        .input-group { display: flex; flex-direction: column; gap: 6px; }
        .input-label { font-size: 12px; font-weight: 500; color: var(--ink-soft); letter-spacing: 0.02em; }
        .input-wrap { position: relative; display: flex; align-items: center; }
        .input-icon {
            position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
            color: var(--ink-mute); display: grid; place-items: center;
            pointer-events: none; z-index: 1;
        }
        .form-input {
            width: 100%; padding: 12px 14px;
            font-size: 15px; font-family: 'Outfit', sans-serif;
            background: var(--paper); border: 1.5px solid var(--rule);
            border-radius: 10px; color: var(--ink); outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .form-input.has-icon  { padding-left: 42px; }
        .form-input.has-right { padding-right: 80px; }
        .form-input:focus {
            border-color: var(--blue-600);
            box-shadow: 0 0 0 4px oklch(91% 0.045 240);
        }
        .form-input::placeholder { color: var(--ink-mute); opacity: 1; }

        .input-right {
            position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
        }
        .eye-btn {
            background: transparent; border: none; cursor: pointer;
            color: var(--ink-mute); padding: 4px; border-radius: 6px;
            display: inline-flex; align-items: center; justify-content: center;
            line-height: 0;
        }
        .eye-btn:hover { color: var(--ink); }

        /* ── Grid 2 columnas para pares de campos ── */
        .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

        /* ── Barra de fortaleza de contraseña ── */
        .strength-bar { display: flex; align-items: center; gap: 6px; margin-top: 6px; }
        .strength-segment { flex: 1; height: 4px; border-radius: 2px; }

        /* ── Checkbox con checkmark ── */
        .check-label {
            display: flex; align-items: flex-start; gap: 10px;
            font-size: 13px; color: var(--ink-soft); cursor: pointer;
            user-select: none; line-height: 1.5;
        }
        .check-label input[type="checkbox"] {
            appearance: none; -webkit-appearance: none;
            width: 18px; height: 18px; border-radius: 5px; flex-shrink: 0;
            border: 1.5px solid var(--rule); background: var(--paper);
            cursor: pointer; position: relative; transition: all 0.15s;
            margin-top: 1px;
        }
        .check-label input[type="checkbox"]:checked {
            background: var(--blue-600); border-color: var(--blue-600);
        }
        .check-label input[type="checkbox"]:checked::after {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='3.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E")
                        center / 11px no-repeat;
        }
        .check-label a { color: var(--ink); text-decoration: underline; text-underline-offset: 3px; }

        /* ── Botón dorado ── */
        .btn-gold {
            width: 100%; padding: 14px 20px;
            background: var(--gold); color: var(--ink);
            border-radius: 12px; border: none;
            font-size: 15px; font-weight: 700; letter-spacing: 0.01em;
            font-family: 'Outfit', sans-serif; cursor: pointer;
            display: inline-flex; align-items: center; justify-content: center; gap: 10px;
            box-shadow: 0 6px 18px -8px oklch(60% 0.14 80 / 0.5);
            transition: opacity 0.15s;
        }
        .btn-gold:hover { opacity: 0.88; }

        /* ── Panel marca (derecha) ── */
        .brand-panel {
            background: var(--blue-50);
            padding: 72px 64px 64px;
            position: relative; overflow: hidden;
            display: flex; flex-direction: column; justify-content: space-between;
            min-height: 100vh;
        }
        .bd-circle-1 {
            position: absolute; top: -160px; right: -180px;
            width: 460px; height: 460px; border-radius: 50%;
            background: var(--blue-100); opacity: 0.6; pointer-events: none;
        }
        .bd-circle-2 {
            position: absolute; bottom: -80px; left: -80px;
            width: 260px; height: 260px; border-radius: 50%;
            background: var(--blue-100); opacity: 0.4; pointer-events: none;
        }
        .bd-dot-red {
            position: absolute; bottom: 90px; right: 60px;
            width: 16px; height: 16px; border-radius: 50%;
            background: var(--red); pointer-events: none;
        }
        .bd-dot-gold {
            position: absolute; top: 110px; right: 110px;
            width: 10px; height: 10px; border-radius: 50%;
            background: var(--gold); pointer-events: none;
        }
        .bd-scissors {
            position: absolute; top: 50%; right: -60px;
            transform: translateY(-50%) rotate(18deg);
            opacity: 0.18; pointer-events: none;
        }
        .brand-top { position: relative; z-index: 1; display: flex; align-items: center; gap: 10px; }
        .brand-logo-mark {
            width: 40px; height: 40px; border-radius: 12px;
            background: var(--blue-600); color: var(--paper);
            display: grid; place-items: center;
            font-weight: 700; font-size: 15px; letter-spacing: 0.04em; flex-shrink: 0;
        }
        .brand-logo-name  { font-weight: 700; font-size: 18px; letter-spacing: -0.01em; }
        .brand-logo-since { font-size: 12px; color: var(--ink-mute); letter-spacing: 0.04em; }
        .brand-middle { position: relative; z-index: 1; }
        .brand-eyebrow {
            font-size: 11px; letter-spacing: 0.22em; text-transform: uppercase;
            color: var(--blue-600); margin-bottom: 18px;
            display: flex; align-items: center; gap: 10px;
        }
        .brand-eyebrow-line { width: 28px; height: 1px; background: var(--blue-600); }
        .brand-h2 {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 64px; font-weight: 500;
            letter-spacing: -0.02em; line-height: 1.02; margin: 0; text-wrap: pretty;
        }
        .brand-sub { margin-top: 24px; font-size: 16px; color: var(--ink-soft); max-width: 380px; line-height: 1.6; }
        .brand-bottom {
            position: relative; z-index: 1;
            display: flex; gap: 32px;
            padding-top: 24px; border-top: 1px solid oklch(82% 0.05 240);
        }
        .brand-bottom-lbl { font-size: 11px; color: var(--ink-mute); text-transform: uppercase; letter-spacing: 0.1em; }
        .brand-bottom-val { font-size: 15px; font-weight: 600; margin-top: 4px; }

        /* ── Responsive — 768px ── */
        @media (max-width: 768px) {

            /* Grid: una sola columna */
            .auth-page {
                grid-template-columns: 1fr;
            }

            /* Ocultar panel decorativo azul */
            .brand-panel {
                display: none;
            }

            /* Navbar más compacta */
            .auth-nav {
                padding: 16px 20px;
            }
            .logo-text {
                font-size: 15px;
            }

            /* Panel formulario: ancho completo, padding lateral reducido */
            .form-panel {
                padding: 80px 24px 48px;
                justify-content: flex-start;
            }
            .form-inner {
                max-width: 100%;
            }

            /* H1 más pequeño en mobile */
            .form-panel h1 {
                font-size: 28px !important;
                line-height: 1.1  !important;
            }

            /* Grids de 2 columnas → una columna */
            .field-row {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            /* Inputs touch-friendly: min-height 48px, font-size 16px evita zoom en iOS */
            .form-input {
                min-height: 48px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
<div class="auth-page">

    {{-- Nav absoluta --}}
    <header class="auth-nav">
        <a href="{{ url('/') }}" class="auth-logo">
            <div class="logo-mark">BB</div>
            <div class="logo-text">Barber Brizu</div>
        </a>
        <a href="{{ url('/') }}" class="nav-back">← Volver al inicio</a>
    </header>

    {{-- ── IZQUIERDA: Formulario ── --}}
    <section class="form-panel">
        <div class="form-inner">

            <span class="tag-gold">
                <span class="tag-gold-dot"></span>
                Crear cuenta
            </span>

            <h1 style="font-size: 40px; font-weight: 600; letter-spacing: -0.025em; line-height: 1.05; margin: 16px 0 10px;">
                Reservá tu primer turno<br>en un minuto.
            </h1>
            <p style="font-size: 16px; color: var(--ink-soft); line-height: 1.55;">
                Creá tu cuenta y vas a poder reservar, ver tus turnos y consultar tu historial.
            </p>

            <form method="POST" action="{{ url('/registro') }}" style="margin-top: 28px;">
                @csrf
                <div style="display: flex; flex-direction: column; gap: 14px;">

                    {{-- Nombre + Apellido --}}
                    <div class="field-row">
                        <div class="input-group">
                            <label class="input-label" for="nombre">Nombre</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="8" r="3.5"/>
                                        <path d="M5 20c0-3.5 3-6 7-6s7 2.5 7 6"/>
                                    </svg>
                                </span>
                                <input type="text" id="nombre" name="nombre"
                                       class="form-input has-icon"
                                       placeholder="Rodrigo"
                                       value="{{ old('nombre') }}"
                                       autocomplete="given-name" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="input-label" for="apellido">Apellido</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="8" r="3.5"/>
                                        <path d="M5 20c0-3.5 3-6 7-6s7 2.5 7 6"/>
                                    </svg>
                                </span>
                                <input type="text" id="apellido" name="apellido"
                                       class="form-input has-icon"
                                       placeholder="Brizuela"
                                       value="{{ old('apellido') }}"
                                       autocomplete="family-name" required>
                            </div>
                        </div>
                    </div>

                    {{-- Celular + Fecha de nacimiento --}}
                    <div class="field-row">
                        <div class="input-group">
                            <label class="input-label" for="celular">Celular</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 4h3l2 5-2 1a11 11 0 0 0 6 6l1-2 5 2v3a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/>
                                    </svg>
                                </span>
                                <input type="tel" id="celular" name="celular"
                                       class="form-input has-icon"
                                       placeholder="+54 9 370 ..."
                                       value="{{ old('celular') }}"
                                       autocomplete="tel" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="input-label" for="fecha_nacimiento">Fecha de nacimiento</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="5" width="18" height="16" rx="2"/>
                                        <path d="M3 9h18M8 3v4M16 3v4"/>
                                    </svg>
                                </span>
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                       class="form-input has-icon"
                                       value="{{ old('fecha_nacimiento') }}"
                                       autocomplete="bday" required>
                            </div>
                        </div>
                    </div>

                    {{-- Correo --}}
                    <div class="input-group">
                        <label class="input-label" for="email">Correo electrónico</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                                    <path d="M3 7l9 6 9-6"/>
                                </svg>
                            </span>
                            <input type="email" id="email" name="email"
                                   class="form-input has-icon"
                                   placeholder="tucorreo@gmail.com"
                                   value="{{ old('email') }}"
                                   autocomplete="email" required>
                        </div>
                    </div>

                    {{-- Contraseña --}}
                    <div class="input-group">
                        <label class="input-label" for="password">Contraseña</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="4" y="11" width="16" height="10" rx="2"/>
                                    <path d="M8 11V7a4 4 0 0 1 8 0v4"/>
                                </svg>
                            </span>
                            <input type="password" id="password" name="password"
                                   class="form-input has-icon has-right"
                                   placeholder="Mínimo 8 caracteres"
                                   autocomplete="new-password" required
                                   oninput="updateStrength(this.value)">
                            <span class="input-right">
                                <button type="button" class="eye-btn" onclick="togglePass('password', this)">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </span>
                        </div>

                        {{-- Barra de fortaleza --}}
                        <div class="strength-bar" id="strength-bar">
                            <div class="strength-segment" id="s1" style="background: var(--rule);"></div>
                            <div class="strength-segment" id="s2" style="background: var(--rule);"></div>
                            <div class="strength-segment" id="s3" style="background: var(--rule);"></div>
                            <div class="strength-segment" id="s4" style="background: var(--rule);"></div>
                            <span id="strength-label" style="font-size: 12px; color: var(--ink-mute); margin-left: 6px; white-space: nowrap;">—</span>
                        </div>
                    </div>

                    {{-- Confirmar contraseña --}}
                    <div class="input-group">
                        <label class="input-label" for="password_confirmation">Confirmar contraseña</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="4" y="11" width="16" height="10" rx="2"/>
                                    <path d="M8 11V7a4 4 0 0 1 8 0v4"/>
                                </svg>
                            </span>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-input has-icon has-right"
                                   placeholder="Repetí tu contraseña"
                                   autocomplete="new-password" required>
                            <span class="input-right">
                                <button type="button" class="eye-btn" onclick="togglePass('password_confirmation', this)">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>

                    {{-- Términos --}}
                    <label class="check-label" style="margin-top: 6px;">
                        <input type="checkbox" name="terms" id="terms" required checked>
                        <span>
                            Acepto los <a href="#">términos</a> y la <a href="#">política de privacidad</a>.
                        </span>
                    </label>

                    <button type="submit" class="btn-gold" style="margin-top: 8px;">
                        Crear cuenta <span>→</span>
                    </button>

                </div>
            </form>

            {{-- Card login --}}
            <div style="
                margin-top: 24px; padding: 14px 18px; border-radius: 12px;
                background: var(--paper-2); border: 1px solid var(--rule);
                display: flex; align-items: center; justify-content: space-between; gap: 14px; flex-wrap: wrap;
            ">
                <div style="font-size: 14px; color: var(--ink-soft);">
                    <span style="font-weight: 600; color: var(--ink);">¿Ya tenés cuenta?</span> Iniciá sesión.
                </div>
                <a href="{{ route('login') }}" style="font-size: 14px; color: var(--blue-600); font-weight: 600; text-decoration: underline; text-underline-offset: 3px;">
                    Iniciar sesión →
                </a>
            </div>

        </div>
    </section>

    {{-- ── DERECHA: Panel de marca ── --}}
    <aside class="brand-panel">
        <div class="bd-circle-1"></div>
        <div class="bd-circle-2"></div>
        <div class="bd-dot-red"></div>
        <div class="bd-dot-gold"></div>

        <div class="bd-scissors">
            <svg width="360" height="360" viewBox="0 0 24 24" fill="none"
                 stroke="var(--blue-600)" stroke-width="1"
                 stroke-linecap="round" stroke-linejoin="round">
                <circle cx="6" cy="6.5" r="2.7"/>
                <circle cx="6" cy="17.5" r="2.7"/>
                <line x1="20" y1="4" x2="8.2" y2="15.8"/>
                <line x1="14.5" y1="14.5" x2="20" y2="20"/>
                <line x1="8.2" y1="8.2" x2="12" y2="12"/>
            </svg>
        </div>

        <div class="brand-top">
            <div class="brand-logo-mark">BB</div>
            <div>
                <div class="brand-logo-name">Barber Brizu</div>
                <div class="brand-logo-since">Desde 2025 · Formosa</div>
            </div>
        </div>

        <div class="brand-middle">
            <div class="brand-eyebrow">
                <span class="brand-eyebrow-line"></span>
                <span>Barber Brizu</span>
            </div>
            <h2 class="brand-h2">
                Tu primera<br>
                <em style="font-style: italic; color: var(--blue-600);">visita</em> empieza acá.
            </h2>
            <p class="brand-sub">
                Creá tu cuenta una vez y reservá todas las veces que quieras, en un toque.
            </p>
        </div>

        <div class="brand-bottom">
            <div>
                <div class="brand-bottom-lbl">Dirección</div>
                <div class="brand-bottom-val">Jujuy 209</div>
            </div>
            <div>
                <div class="brand-bottom-lbl">Horarios</div>
                <div class="brand-bottom-val">Lun a Sáb · 9:00–22:00</div>
            </div>
        </div>
    </aside>

</div>

<script>
const EYE_OPEN = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>`;
const EYE_OFF  = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>`;

function togglePass(id, btn) {
    const input = document.getElementById(id);
    if (input.type === 'password') {
        input.type    = 'text';
        btn.innerHTML = EYE_OFF;
    } else {
        input.type    = 'password';
        btn.innerHTML = EYE_OPEN;
    }
}

function updateStrength(val) {
    const segs  = [document.getElementById('s1'), document.getElementById('s2'),
                   document.getElementById('s3'), document.getElementById('s4')];
    const label = document.getElementById('strength-label');
    const colors = ['var(--rule)', 'var(--rule)', 'var(--rule)', 'var(--rule)'];
    let score = 0;
    if (val.length >= 8)               score++;
    if (/[A-Z]/.test(val))             score++;
    if (/[0-9]/.test(val))             score++;
    if (/[^A-Za-z0-9]/.test(val))      score++;
    const palettes = [
        [],
        ['var(--red)'],
        ['var(--red)',     'var(--gold)'],
        ['var(--blue-600)','var(--blue-600)', 'var(--gold)'],
        ['var(--blue-600)','var(--blue-600)', 'var(--blue-600)', 'var(--blue-600)']
    ];
    const labels = ['—', 'Débil', 'Regular', 'Buena', 'Fuerte'];
    segs.forEach((s, i) => s.style.background = palettes[score][i] || 'var(--rule)');
    label.textContent = labels[score];
}
</script>
</body>
</html>
