@php
    $today = new \DateTime('today');

    $days = [];
    for ($i = 0; $i < 7; $i++) {
        $d = clone $today;
        $d->modify("+{$i} days");
        $days[] = $d;
    }

    $barbers = [
        ['name' => 'Rodrigo', 'slug' => 'rodrigo'],
        ['name' => 'Lucas',   'slug' => 'lucas'],
        ['name' => 'Matías',  'slug' => 'matias'],
        ['name' => 'Diego',   'slug' => 'diego'],
    ];

    $slots = [];
    for ($h = 9; $h <= 21; $h++) {
        $slots[] = sprintf('%d:00', $h);
        $slots[] = sprintf('%d:30', $h);
    }

    $dayNamesES   = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
    $monthNamesES = ['', 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

    $slotOccupied = function (\DateTime $day, int $bi, int $si): bool {
        $d            = (int) $day->format('j');
        $dow          = (int) $day->format('N'); // 1=Lun … 7=Dom, Sáb=6
        $satBoost     = ($dow === 6) ? 2 : 0;
        $eveningBoost = ($si >= 16)  ? 1 : 0;
        $seed = ($d * 31 + $bi * 17 + $si * 7 + $dow * 5) % 10;
        return $seed < (4 + $satBoost + $eveningBoost);
    };
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de turnos — Barber Brizu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
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
            --green:       oklch(70%   0.15  145);
            --green-soft:  oklch(94%   0.06  145);
            --green-deep:  oklch(42%   0.14  145);
            --violet:      oklch(62%   0.14  290);
            --violet-soft: oklch(93%   0.05  290);
            --violet-deep: oklch(44%   0.13  290);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { min-height: 100%; }

        body {
            font-family: 'Outfit', -apple-system, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: var(--ink);
            background: var(--paper-2);
        }

        /* ─── NAVBAR ─────────────────────────────── */
        .site-nav {
            position: sticky; top: 0;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 40px;
            height: 60px;
            background: oklch(98.5% 0.004 240 / 0.92);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--rule);
            z-index: 100;
            gap: 16px;
        }

        .logo { display: flex; align-items: center; gap: 10px; text-decoration: none; color: var(--ink); }
        .logo-mark {
            width: 33px; height: 33px; border-radius: 9px;
            background: var(--blue-600); color: var(--paper);
            display: grid; place-items: center;
            font-weight: 700; font-size: 12px; letter-spacing: 0.04em; flex-shrink: 0;
        }
        .logo-name { font-weight: 600; font-size: 13.5px; letter-spacing: -0.01em; }

        .nav-pill {
            font-size: 12px; font-weight: 500;
            padding: 5px 12px; border-radius: 999px;
            background: var(--blue-50); color: var(--blue-600);
            letter-spacing: 0.02em;
        }

        /* ─── BUTTONS ────────────────────────────── */
        .btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 8px 15px; border-radius: 9px;
            font-family: 'Outfit', sans-serif; font-size: 13.5px; font-weight: 500;
            cursor: pointer; text-decoration: none; border: none;
            transition: opacity 0.12s; line-height: 1;
        }
        .btn:hover { opacity: 0.78; }
        .btn-outline { background: transparent; color: var(--ink); border: 1px solid var(--rule); }
        .btn-gold    { background: var(--gold); color: var(--ink); font-weight: 600; }
        .btn-gold:hover { opacity: 0.85; }
        .btn-gold-lg { padding: 14px 28px; font-size: 15px; }

        /* ─── LAYOUT ─────────────────────────────── */
        .content {
            padding: 32px 26px 60px;
            display: flex; flex-direction: column; gap: 16px;
        }

        .section-header { display: flex; align-items: flex-end; justify-content: space-between; }
        .section-title  { font-size: 19px; font-weight: 600; letter-spacing: -0.01em; }
        .section-sub    { font-size: 12.5px; color: var(--ink-mute); margin-top: 3px; }

        /* ─── CALENDAR WRAP ──────────────────────── */
        .calendar-wrap {
            background: var(--paper);
            border: 1px solid var(--rule);
            border-radius: 14px;
            overflow: hidden;
        }
        .calendar-scroll { overflow-x: auto; overflow-y: visible; }

        /* ─── WEEK TABLE ─────────────────────────── */
        .week-table { border-collapse: collapse; table-layout: fixed; }

        /* Header row 1 — time col + day names */
        .week-th-time-r1 {
            width: 56px;
            background: var(--paper);
            border-right: 1px solid var(--rule);
            border-bottom: 1px solid var(--rule);
            position: sticky; top: 0; z-index: 4;
        }
        .week-th-day {
            background: var(--paper);
            border-right: 1px solid var(--rule);
            border-bottom: 1px solid var(--rule);
            padding: 6px 4px;
            text-align: center;
            font-size: 10.5px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.07em;
            color: var(--ink-mute);
            position: sticky; top: 0; z-index: 3;
        }
        .week-th-day.today { color: var(--blue-600); }
        .week-th-day:last-child { border-right: none; }

        /* Header row 2 — time col + barber names */
        .week-th-time-r2 {
            width: 56px;
            background: var(--paper);
            border-right: 1px solid var(--rule);
            border-bottom: 1px solid var(--rule);
            position: sticky; top: 28px; z-index: 4;
        }
        .week-th-barber {
            width: 68px;
            background: var(--paper);
            border-right: 1px solid oklch(92% 0.005 240);
            border-bottom: 1px solid var(--rule);
            padding: 4px 4px 6px;
            text-align: center;
            font-size: 10px; font-weight: 700; letter-spacing: 0.03em;
            position: sticky; top: 28px; z-index: 3;
        }
        .week-th-barber.day-end { border-right: 1px solid var(--rule); }
        .week-th-barber:last-child { border-right: none; }
        .week-th-barber.rodrigo { color: var(--blue-600); }
        .week-th-barber.lucas   { color: oklch(35% 0.12 180); }
        .week-th-barber.matias  { color: oklch(36% 0.13 290); }
        .week-th-barber.diego   { color: oklch(52% 0.13 75); }

        /* HOY badge */
        .hoy-badge {
            display: inline-block;
            background: var(--blue-600); color: var(--paper);
            font-size: 7.5px; font-weight: 800; letter-spacing: 0.12em;
            padding: 1px 4px; border-radius: 3px; line-height: 1.4;
            margin-left: 4px; vertical-align: middle;
        }

        /* Data rows */
        .week-td-time {
            width: 56px; height: 60px;
            border-bottom: 1px solid var(--rule);
            border-right: 1px solid var(--rule);
            padding: 4px 6px 0;
            vertical-align: top;
            font-size: 10.5px; color: var(--ink-mute); font-weight: 500;
        }
        .week-td-time.half { font-size: 9.5px; color: oklch(68% 0.007 240); }

        .week-td-cell {
            height: 60px;
            border-bottom: 1px solid var(--rule);
            border-right: 1px solid oklch(92% 0.005 240);
            position: relative; vertical-align: top;
            transition: background 0.1s;
        }
        .week-td-cell.available { cursor: default; }
        .week-td-cell.available:hover { background: var(--blue-50); }
        .week-td-cell.day-end { border-right: 1px solid var(--rule); }
        .week-td-cell:last-child { border-right: none; }
        .week-td-cell.nolaboral {
            background: oklch(97% 0.002 240);
            cursor: default;
        }
        .week-td-cell.nolaboral:hover { background: oklch(97% 0.002 240); }

        /* Occupied blocks */
        .week-occ {
            position: absolute; top: 2px; left: 2px; right: 2px; bottom: 2px;
            border-radius: 5px; padding: 3px 5px;
            border-left-width: 3px; border-left-style: solid;
            overflow: hidden; font-size: 9.5px; font-weight: 600; line-height: 1.3;
        }
        .week-occ.rodrigo { background: var(--blue-50);        border-left-color: var(--blue-600);      color: var(--blue-600); }
        .week-occ.lucas   { background: oklch(93% 0.05 180);   border-left-color: oklch(35% 0.12 180);  color: oklch(35% 0.12 180); }
        .week-occ.matias  { background: oklch(93% 0.05 290);   border-left-color: oklch(36% 0.13 290);  color: oklch(36% 0.13 290); }
        .week-occ.diego   { background: oklch(92% 0.07 88);    border-left-color: oklch(52% 0.13 75);   color: oklch(52% 0.13 75); }

        /* ─── LEGEND ─────────────────────────────── */
        .legend {
            display: flex; gap: 16px; align-items: center; flex-wrap: wrap;
            padding: 12px 16px; border-top: 1px solid var(--rule);
        }
        .legend-item { display: flex; align-items: center; gap: 7px; font-size: 12px; color: var(--ink-soft); }
        .legend-dot  { width: 12px; height: 12px; border-radius: 3px; flex-shrink: 0; }
        .legend-dot.rodrigo { background: var(--blue-600); }
        .legend-dot.lucas   { background: oklch(35% 0.12 180); }
        .legend-dot.matias  { background: oklch(36% 0.13 290); }
        .legend-dot.diego   { background: oklch(52% 0.13 75); }
        .legend-dot.libre   { background: var(--paper-2); border: 1px solid var(--rule); }
        .legend-dot.nolabor { background: oklch(97% 0.002 240); border: 1px solid var(--rule); }

        /* ─── FOOTER ─────────────────────────────── */
        .site-footer {
            padding: 28px 40px;
            border-top: 1px solid var(--rule);
            background: var(--paper);
            display: flex; justify-content: space-between; align-items: center;
            flex-wrap: wrap; gap: 16px;
            font-size: 13px; color: var(--ink-mute);
        }

        /* ─── MOBILE ─────────────────────────────── */
        @media (max-width: 768px) {
            .site-nav    { padding: 0 16px; }
            .nav-pill    { display: none; }
            .content     { padding: 24px 12px 48px; }
            .section-title { font-size: 16px; }
            .site-footer { padding: 20px 16px; }
        }
    </style>
</head>
<body>

{{-- ══ NAVBAR ══ --}}
<header class="site-nav">
    <a href="/" class="logo">
        <div class="logo-mark">BB</div>
        <div class="logo-name">Barber Brizu</div>
    </a>

    <span class="nav-pill">Agenda · solo lectura</span>

    <div style="display:flex;gap:9px;align-items:center;flex-shrink:0;">
        <a href="/" class="btn btn-outline">&#8592; Volver al inicio</a>
        <a href="/reservar" class="btn btn-gold">Sacar turno</a>
    </div>
</header>


{{-- ══ CONTENIDO ══ --}}
<main class="content">

    {{-- Cabecera --}}
    <div class="section-header">
        <div>
            <div class="section-title">Agenda de turnos</div>
            <div class="section-sub">Disponibilidad de los próximos 7 días · Lun–Sáb · 9:00–22:00</div>
        </div>
    </div>

    {{-- Tabla semanal --}}
    <div class="calendar-wrap">
        <div class="calendar-scroll">
            <table class="week-table">
                <thead>

                    {{-- Fila 1: columna de tiempo + 7 días (cada uno abarca 4 columnas de barberos) --}}
                    <tr>
                        <th class="week-th-time-r1"></th>
                        @foreach($days as $di => $day)
                            @php
                                $dow       = (int) $day->format('w');
                                $isToday   = $di === 0;
                                $dayName   = $dayNamesES[$dow];
                                $dateNum   = (int) $day->format('j');
                                $monthName = $monthNamesES[(int) $day->format('n')];
                            @endphp
                            <th colspan="4" class="week-th-day {{ $isToday ? 'today' : '' }}">
                                {{ $dayName }} {{ $dateNum }} {{ $monthName }}
                                @if($isToday)<span class="hoy-badge">HOY</span>@endif
                            </th>
                        @endforeach
                    </tr>

                    {{-- Fila 2: vacío + 4 columnas de barbero por cada día --}}
                    <tr>
                        <th class="week-th-time-r2"></th>
                        @foreach($days as $di => $day)
                            @foreach($barbers as $bi => $barber)
                                <th class="week-th-barber {{ $barber['slug'] }} {{ $bi === 3 ? 'day-end' : '' }}">
                                    {{ $barber['name'] }}
                                </th>
                            @endforeach
                        @endforeach
                    </tr>

                </thead>
                <tbody>

                    @foreach($slots as $si => $slot)
                        @php $isHalf = str_contains($slot, ':30'); @endphp
                        <tr>
                            <td class="week-td-time {{ $isHalf ? 'half' : '' }}">
                                {{ $isHalf ? '' : $slot }}
                            </td>
                            @foreach($days as $di => $day)
                                @php
                                    $dow   = (int) $day->format('w');
                                    $isSun = ($dow === 0);
                                @endphp
                                @foreach($barbers as $bi => $barber)
                                    @php
                                        $occ    = !$isSun && $slotOccupied($day, $bi, $si);
                                        $isLast = ($bi === 3);
                                    @endphp
                                    <td class="week-td-cell
                                        {{ $isLast  ? 'day-end'   : '' }}
                                        {{ $isSun   ? 'nolaboral' : ($occ ? '' : 'available') }}">
                                        @if($occ)
                                            <div class="week-occ {{ $barber['slug'] }}">Ocupado</div>
                                        @endif
                                    </td>
                                @endforeach
                            @endforeach
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- Leyenda --}}
        <div class="legend">
            <span style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.07em;color:var(--ink-mute);margin-right:4px">Barberos:</span>
            <div class="legend-item"><div class="legend-dot rodrigo"></div> Rodrigo</div>
            <div class="legend-item"><div class="legend-dot lucas"></div> Lucas</div>
            <div class="legend-item"><div class="legend-dot matias"></div> Matías</div>
            <div class="legend-item"><div class="legend-dot diego"></div> Diego</div>
            <span style="width:1px;background:var(--rule);height:16px;margin:0 4px"></span>
            <div class="legend-item"><div class="legend-dot libre"></div> Disponible</div>
            <div class="legend-item"><div class="legend-dot nolabor"></div> Sin atención</div>
        </div>
    </div>

    {{-- Nota informativa + CTA --}}
    <p style="font-size:12.5px;color:var(--ink-mute);text-align:center;">
        Datos indicativos · actualizados cada día · para confirmar disponibilidad reservá tu turno
    </p>
    <div style="text-align:center;">
        <a href="/reservar" class="btn btn-gold btn-gold-lg">Sacar turno &#8594;</a>
    </div>

</main>


{{-- ══ FOOTER ══ --}}
<footer class="site-footer">
    <a href="/" class="logo">
        <div class="logo-mark">BB</div>
        <div class="logo-name">Barber Brizu</div>
    </a>
    <span>Jujuy 209 · Ciudad de Formosa · Lun a Sáb 9:00 – 22:00</span>
    <span>© 2026 Barber Brizu</span>
</footer>

</body>
</html>
