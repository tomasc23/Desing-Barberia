/* V2 — Cards modernas · azul pastel protagonista, grilla limpia */
const V2 = () => {
  const v2 = {
    page: {
      width: '100%',
      height: '100%',
      background: 'var(--paper)',
      color: 'var(--ink)',
      fontFamily: '"Outfit", -apple-system, sans-serif',
      fontSize: 15,
      lineHeight: 1.5,
      overflow: 'hidden'
    },
    nav: {
      position: 'sticky',
      top: 0,
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      padding: '20px 48px',
      background: 'oklch(98.5% 0.004 240 / 0.85)',
      backdropFilter: 'blur(8px)',
      borderBottom: '1px solid var(--rule)',
      zIndex: 10
    },
    logo: {
      display: 'flex',
      alignItems: 'center',
      gap: 10
    },
    logoMark: {
      width: 36,
      height: 36,
      borderRadius: 10,
      background: 'var(--blue-600)',
      color: 'var(--paper)',
      display: 'grid',
      placeItems: 'center',
      fontWeight: 700,
      fontSize: 14,
      letterSpacing: '0.04em'
    },
    logoText: {
      fontWeight: 600,
      fontSize: 17,
      letterSpacing: '-0.01em'
    },
    cta: {
      padding: '11px 20px',
      background: 'var(--ink)',
      color: 'var(--paper)',
      borderRadius: 10,
      fontSize: 14,
      fontWeight: 500,
      border: 'none',
      cursor: 'pointer',
      display: 'inline-flex',
      alignItems: 'center',
      gap: 8
    }
  };

  const Tag = ({ children, gold }) =>
  <span style={{
    display: 'inline-flex',
    alignItems: 'center',
    gap: 6,
    padding: '6px 12px',
    borderRadius: 999,
    background: gold ? 'oklch(96% 0.04 85)' : 'var(--blue-50)',
    color: gold ? 'oklch(48% 0.08 80)' : 'var(--blue-600)',
    fontSize: 12,
    fontWeight: 500,
    letterSpacing: '0.02em'
  }}>
      <span style={{ width: 6, height: 6, borderRadius: '50%', background: gold ? 'var(--gold)' : 'var(--blue-400)' }}></span>
      {children}
    </span>;


  // Hand-drawn icons for the services
  const ServiceIcon = ({ kind, size = 22, stroke = 1.8 }) => {
    const common = {
      width: size,
      height: size,
      viewBox: '0 0 24 24',
      fill: 'none',
      stroke: 'currentColor',
      strokeWidth: stroke,
      strokeLinecap: 'round',
      strokeLinejoin: 'round'
    };
    if (kind === 'cabello') {
      // Scissors
      return (
        <svg {...common}>
          <circle cx="6" cy="6.5" r="2.7" />
          <circle cx="6" cy="17.5" r="2.7" />
          <line x1="20" y1="4" x2="8.2" y2="15.8" />
          <line x1="14.5" y1="14.5" x2="20" y2="20" />
          <line x1="8.2" y1="8.2" x2="12" y2="12" />
        </svg>);
    }
    if (kind === 'barba') {
      // Razor
      return (
        <svg {...common}>
          <path d="M5 6 h12 a1.5 1.5 0 0 1 1.5 1.5 v1 a3 3 0 0 1 -3 3 H7 a3 3 0 0 1 -3 -3 v-1 A1.5 1.5 0 0 1 5 6 z" />
          <line x1="12" y1="11.5" x2="12" y2="19" />
          <path d="M9 19 h6 a1 1 0 0 1 1 1 v0 a1 1 0 0 1 -1 1 h-6 a1 1 0 0 1 -1 -1 a1 1 0 0 1 1 -1 z" />
          <line x1="7" y1="8.5" x2="16" y2="8.5" />
        </svg>);
    }
    if (kind === 'cejas') {
      // Eyebrow arch + eye
      return (
        <svg {...common}>
          <path d="M3.5 10 C 7 5, 17 5, 20.5 10" />
          <path d="M5 14.5 C 8 19, 16 19, 19 14.5" />
          <circle cx="12" cy="16.2" r="1.4" fill="currentColor" stroke="none" />
        </svg>);
    }
    if (kind === 'pintura') {
      // Paint drop with brush highlight
      return (
        <svg {...common}>
          <path d="M12 3 C 8 9.5, 6 13, 6 15.5 a 6 6 0 0 0 12 0 c 0-2.5-2-6-6-12.5 z" />
          <path d="M9.2 14.5 a 3 3 0 0 0 2.4 3.2" />
        </svg>);
    }
    return null;
  };

  return (
    <div style={v2.page}>
      {/* NAV */}
      <header style={v2.nav}>
        <div style={v2.logo}>
          <div style={v2.logoMark}>BB</div>
          <div style={v2.logoText}>Barber Brizu</div>
        </div>
        <nav style={{ display: 'flex', gap: 32, fontSize: 14, color: 'var(--ink-soft)', fontWeight: 500 }}>
          <span>Inicio</span>
          <span>Servicios</span>
          <span>Sobre nosotros</span>
          <span>Contacto</span>
        </nav>
        <div style={{ display: 'flex', gap: 10, alignItems: 'center' }}>
          <span style={{ fontSize: 14, color: 'var(--ink-soft)' }}>Iniciar sesión</span>
          <button style={v2.cta}>Sacar turno</button>
        </div>
      </header>

      {/* HERO */}
      <section style={{ padding: '56px 48px 72px' }}>
        <div style={{
          background: 'var(--blue-50)',
          borderRadius: 24,
          padding: '64px 56px',
          display: 'grid',
          gridTemplateColumns: '1.1fr 1fr',
          gap: 56,
          alignItems: 'center',
          position: 'relative',
          overflow: 'hidden'
        }}>
          {/* decorative corner */}
          <div style={{
            position: 'absolute',
            top: -120, right: -120,
            width: 360, height: 360,
            borderRadius: '50%',
            background: 'var(--blue-100)',
            opacity: 0.6
          }}></div>
          <div style={{
            position: 'absolute',
            bottom: -60, left: '40%',
            width: 14, height: 14,
            borderRadius: '50%',
            background: 'var(--red)'
          }}></div>
          <div style={{
            position: 'absolute',
            top: 28, left: '38%',
            width: 8, height: 8,
            borderRadius: '50%',
            background: 'var(--gold)'
          }}></div>

          <div style={{ position: 'relative', zIndex: 1 }}>
            <Tag>Reservá online — sin esperas</Tag>
            <h1 style={{
              fontSize: 68,
              fontWeight: 600,
              letterSpacing: '-0.025em',
              lineHeight: 1.04,
              margin: '20px 0 0',
              textWrap: 'pretty'
            }}>
              Tu próximo<br />
              corte arranca<br />
              <span style={{ color: 'var(--blue-600)' }}>acá.</span>
            </h1>
            <p style={{ marginTop: 24, fontSize: 17, color: 'var(--ink-soft)', maxWidth: 440, lineHeight: 1.55 }}>
              Elegí día, horario y barbero. Te confirmamos al instante y te avisamos antes de que vengas.
            </p>
            <div style={{ marginTop: 32, display: 'flex', gap: 12, alignItems: 'center' }}>
              <button style={{ ...v2.cta, padding: '14px 24px', fontSize: 15 }}>
                Sacar turno
                <span>→</span>
              </button>
              <button style={{
                padding: '14px 22px',
                background: 'transparent',
                color: 'var(--ink)',
                border: '1px solid var(--ink)',
                borderRadius: 10,
                fontSize: 15,
                fontWeight: 500,
                cursor: 'pointer'
              }}>Ver servicios</button>
            </div>

            {/* mini-status row */}
            <div style={{ marginTop: 40, display: 'flex', gap: 24, flexWrap: 'wrap' }}>
              <div style={{ display: 'flex', alignItems: 'center', gap: 8, fontSize: 13, color: 'var(--ink-soft)' }}>
                <span style={{ width: 8, height: 8, borderRadius: '50%', background: 'oklch(70% 0.15 145)' }}></span>
                Hoy abierto · 9:00 — 22:00
              </div>
              <div style={{ fontSize: 13, color: 'var(--ink-soft)' }}>4 barberos disponibles</div>
              <div style={{ fontSize: 13, color: 'var(--ink-soft)' }}>Jujuy 209</div>
            </div>
          </div>

          {/* Right: stacked card preview of the booking UI */}
          <div style={{ position: 'relative', zIndex: 1 }}>
            <div style={{
              height: 380,
              borderRadius: 16,
              border: '1px solid var(--rule)',
              overflow: 'hidden',
              background: 'var(--blue-50)'
            }}>
              <svg viewBox="0 0 600 440" preserveAspectRatio="xMidYMid slice" style={{ width: '100%', height: '100%', display: 'block' }}>
                {/* sky / wall background gradient */}
                <defs>
                  <linearGradient id="sky-v2" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stopColor="oklch(96% 0.025 240)" />
                    <stop offset="100%" stopColor="oklch(91% 0.045 240)" />
                  </linearGradient>
                  <clipPath id="pole-v2">
                    <rect x="0" y="0" width="16" height="180" rx="8" />
                  </clipPath>
                </defs>
                <rect width="600" height="440" fill="url(#sky-v2)" />

                {/* sidewalk */}
                <rect x="0" y="395" width="600" height="45" fill="oklch(88% 0.015 245)" />
                <line x1="0" y1="395" x2="600" y2="395" stroke="var(--ink)" strokeWidth="1.5" />
                <line x1="40" y1="415" x2="120" y2="415" stroke="var(--ink)" strokeWidth="1" opacity="0.25" />
                <line x1="200" y1="425" x2="320" y2="425" stroke="var(--ink)" strokeWidth="1" opacity="0.25" />
                <line x1="400" y1="418" x2="540" y2="418" stroke="var(--ink)" strokeWidth="1" opacity="0.25" />

                {/* building facade */}
                <rect x="30" y="40" width="540" height="355" fill="var(--paper)" stroke="var(--ink)" strokeWidth="2" />

                {/* dark sign band */}
                <rect x="30" y="60" width="540" height="78" fill="var(--ink)" />
                {/* sign text */}
                <text x="300" y="111" textAnchor="middle" fontFamily="'Cormorant Garamond', Georgia, serif" fontSize="36" fontStyle="italic" fontWeight="500" fill="var(--paper)" letterSpacing="2">Barber Brizu</text>
                <text x="300" y="129" textAnchor="middle" fontFamily="'Outfit', sans-serif" fontSize="9" fill="var(--gold)" letterSpacing="6">SINCE 2025 · JUJUY 209</text>

                {/* gold accent line below sign */}
                <rect x="30" y="142" width="540" height="4" fill="var(--gold)" />

                {/* storefront window */}
                <rect x="58" y="170" width="338" height="225" fill="oklch(91% 0.055 245)" stroke="var(--ink)" strokeWidth="1.8" />
                {/* window mullion */}
                <line x1="227" y1="170" x2="227" y2="395" stroke="var(--ink)" strokeWidth="1.5" />
                {/* horizontal divider */}
                <line x1="58" y1="240" x2="396" y2="240" stroke="var(--ink)" strokeWidth="1" opacity="0.4" />

                {/* barber chair silhouette behind left pane */}
                <g fill="oklch(22% 0.015 245)" opacity="0.85" transform="translate(110, 270)">
                  <rect x="0" y="60" width="60" height="70" rx="3" />
                  <rect x="-6" y="30" width="72" height="38" rx="6" />
                  <rect x="-10" y="6" width="80" height="26" rx="8" />
                  <rect x="22" y="130" width="20" height="8" />
                  <rect x="-2" y="135" width="64" height="6" />
                </g>

                {/* mirror + counter on right pane */}
                <rect x="252" y="262" width="120" height="80" fill="var(--paper)" stroke="var(--ink)" strokeWidth="1" />
                <line x1="252" y1="345" x2="372" y2="345" stroke="var(--ink)" strokeWidth="1.5" />
                {/* bottles/tools on counter */}
                <circle cx="270" cy="338" r="3" fill="var(--red)" />
                <rect x="280" y="330" width="6" height="12" fill="var(--blue-600)" />
                <rect x="292" y="332" width="5" height="10" fill="var(--gold)" />
                <circle cx="304" cy="338" r="2.5" fill="var(--ink)" />
                {/* reflection lines in mirror */}
                <line x1="262" y1="275" x2="280" y2="275" stroke="var(--rule)" strokeWidth="1.5" />
                <line x1="262" y1="285" x2="320" y2="285" stroke="var(--rule)" strokeWidth="1.5" />
                <line x1="262" y1="295" x2="295" y2="295" stroke="var(--rule)" strokeWidth="1.5" />

                {/* OPEN pill in window */}
                <g transform="translate(70, 180)">
                  <rect width="58" height="20" rx="10" fill="var(--red)" />
                  <circle cx="11" cy="10" r="3" fill="var(--paper)" />
                  <text x="36" y="14" textAnchor="middle" fontFamily="'Outfit', sans-serif" fontSize="10" fontWeight="700" fill="var(--paper)" letterSpacing="1.5">OPEN</text>
                </g>

                {/* door */}
                <rect x="416" y="170" width="128" height="225" fill="var(--paper-2)" stroke="var(--ink)" strokeWidth="1.8" />
                {/* door glass */}
                <rect x="432" y="188" width="96" height="115" fill="oklch(91% 0.055 245)" stroke="var(--ink)" strokeWidth="1.3" />
                {/* door inner reflection lines */}
                <line x1="438" y1="200" x2="465" y2="200" stroke="var(--paper)" strokeWidth="2" opacity="0.7" />
                <line x1="438" y1="210" x2="455" y2="210" stroke="var(--paper)" strokeWidth="2" opacity="0.5" />
                {/* push plate */}
                <rect x="432" y="320" width="96" height="60" fill="none" stroke="var(--ink)" strokeWidth="0.8" opacity="0.4" />
                {/* door handle */}
                <rect x="438" y="345" width="6" height="18" rx="3" fill="var(--ink)" />

                {/* barber pole, mounted on wall between window and door */}
                <g transform="translate(400, 200)">
                  {/* top cap */}
                  <rect x="-3" y="-10" width="22" height="10" rx="2" fill="var(--ink)" />
                  {/* pole tube */}
                  <g clipPath="url(#pole-v2)">
                    <rect width="16" height="180" fill="var(--paper)" style={{ height: "10px" }} />
                    {/* diagonal stripes drawn as a rotated grid */}
                    <g transform="translate(-30, -20) rotate(-30)">
                      {[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10].map((n) =>
                      <rect key={n} x={n * 16} y="0" width="8" height="240"
                      fill={n % 2 === 0 ? 'var(--red)' : 'var(--blue-600)'} />
                      )}
                    </g>
                  </g>
                  <rect x="0" y="0" width="16" height="180" rx="8" fill="none" stroke="var(--ink)" strokeWidth="1.3" />
                  {/* bottom cap */}
                  <rect x="-3" y="180" width="22" height="10" rx="2" fill="var(--ink)" />
                </g>

                {/* potted plant by the door */}
                <g transform="translate(548, 360)">
                  <rect x="0" y="14" width="22" height="22" rx="2" fill="var(--ink)" />
                  <path d="M 4 14 Q 7 0, 11 14" fill="oklch(58% 0.12 145)" />
                  <path d="M 11 14 Q 15 -2, 19 14" fill="oklch(52% 0.13 145)" />
                </g>

                {/* small awning hint — striped band */}
                <g>
                  {[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11].map((n) =>
                  <rect key={n} x={30 + n * 45} y="148" width="45" height="20"
                  fill={n % 2 === 0 ? 'var(--paper)' : 'var(--red-soft)'} />
                  )}
                  <line x1="30" y1="168" x2="570" y2="168" stroke="var(--ink)" strokeWidth="1.2" />
                </g>

                {/* address number plaque */}
                <g transform="translate(40, 372)">
                  <rect width="32" height="18" rx="3" fill="var(--ink)" />
                  <text x="16" y="13" textAnchor="middle" fontFamily="'Outfit', sans-serif" fontSize="11" fontWeight="600" fill="var(--gold)" letterSpacing="1">209</text>
                </g>
              </svg>
            </div>

            {/* Floating booking card */}
            <div style={{
              position: 'absolute',
              bottom: -32,
              left: -24,
              background: 'var(--paper)',
              borderRadius: 14,
              padding: 18,
              boxShadow: '0 12px 32px -8px rgba(20,30,50,0.18), 0 0 0 1px var(--rule)',
              width: 270
            }}>
              <div style={{ fontSize: 11, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em', marginBottom: 10 }}>Próximos turnos libres</div>
              {[
              ['Hoy', '19:30', 'Nico'],
              ['Mañana', '10:00', 'Cualquiera'],
              ['Mié 18', '14:45', 'Nico']].
              map(([d, t, who], i) =>
              <div key={i} style={{
                display: 'flex',
                justifyContent: 'space-between',
                alignItems: 'center',
                padding: '10px 0',
                borderTop: i === 0 ? 'none' : '1px solid var(--rule)'
              }}>
                  <div>
                    <div style={{ fontSize: 14, fontWeight: 500 }}>{d} · {t}</div>
                    <div style={{ fontSize: 12, color: 'var(--ink-mute)' }}>con {who}</div>
                  </div>
                  <div style={{
                  fontSize: 12,
                  color: 'var(--blue-600)',
                  fontWeight: 500,
                  padding: '6px 10px',
                  borderRadius: 8,
                  background: 'var(--blue-50)'
                }}>Reservar</div>
                </div>
              )}
            </div>

            {/* Badge */}
            <div style={{
              position: 'absolute',
              top: -16, right: -16,
              background: 'var(--ink)',
              color: 'var(--paper)',
              padding: '10px 14px',
              borderRadius: 12,
              fontSize: 12,
              fontWeight: 500,
              display: 'flex',
              alignItems: 'center',
              gap: 8
            }}>
              <span style={{ width: 6, height: 6, borderRadius: '50%', background: 'var(--gold)' }}></span>
              Confirmación al instante
            </div>
          </div>
        </div>
      </section>

      {/* SERVICIOS */}
      <section style={{ padding: '40px 48px 80px' }}>
        <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-end', marginBottom: 32 }}>
          <div>
            <Tag gold>Servicios</Tag>
            <h2 style={{ fontSize: 42, fontWeight: 600, letterSpacing: '-0.02em', margin: '14px 0 0' }}>
              Elegí qué te hacemos.
            </h2>
          </div>
          <div style={{ fontSize: 14, color: 'var(--ink-soft)' }}>
            Precios de referencia · placeholder
          </div>
        </div>

        <div style={{ display: 'grid', gridTemplateColumns: 'repeat(4, 1fr)', gap: 16 }}>
          {[
          { name: 'Corte de cabello', price: '$8.000', desc: 'Corte y peinado a tu medida.', accent: false, iconKey: 'cabello', tone: 'blue' },
          { name: 'Corte de barba', price: '$6.000', desc: 'Perfilado y toalla caliente.', accent: true, iconKey: 'barba', tone: 'gold' },
          { name: 'Perfilado de cejas', price: '$3.000', desc: 'Diseño y limpieza con detalle.', accent: false, iconKey: 'cejas', tone: 'red' },
          { name: 'Pintura', price: '$10.000', desc: 'Color para cabello o barba.', accent: false, iconKey: 'pintura', tone: 'gold' }].
          map((s, i) => {
            const toneBg = {
              blue: 'var(--blue-50)',
              gold: 'var(--gold-soft)',
              red: 'var(--red-soft)'
            }[s.tone];
            const toneFg = {
              blue: 'var(--blue-600)',
              gold: 'var(--gold-deep)',
              red: 'var(--red-deep)'
            }[s.tone];
            return (
              <div key={i} style={{
                background: s.accent ? 'var(--ink)' : 'var(--paper)',
                color: s.accent ? 'var(--paper)' : 'var(--ink)',
                border: s.accent ? '1px solid var(--ink)' : '1px solid var(--rule)',
                borderRadius: 18,
                padding: '24px 22px',
                display: 'flex',
                flexDirection: 'column',
                minHeight: 220
              }}>
                <div style={{
                  width: 44, height: 44,
                  borderRadius: 12,
                  background: s.accent ? 'oklch(30% 0.02 240)' : toneBg,
                  display: 'grid', placeItems: 'center',
                  color: s.accent ? 'var(--gold)' : toneFg
                }}>
                  <ServiceIcon kind={s.iconKey} size={22} />
                </div>
                <div style={{ fontSize: 19, fontWeight: 600, marginTop: 20, letterSpacing: '-0.01em' }}>{s.name}</div>
                <div style={{ fontSize: 13, color: s.accent ? 'oklch(75% 0.01 240)' : 'var(--ink-mute)', marginTop: 6, flex: 1 }}>{s.desc}</div>
                <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginTop: 20 }}>
                  <div style={{ fontSize: 24, fontWeight: 600, letterSpacing: '-0.01em' }}>{s.price}</div>
                  <div style={{
                    width: 34, height: 34,
                    borderRadius: '50%',
                    background: s.accent ? 'var(--paper)' : 'var(--ink)',
                    color: s.accent ? 'var(--ink)' : 'var(--paper)',
                    display: 'grid', placeItems: 'center',
                    fontSize: 15
                  }}>→</div>
                </div>
              </div>);
          })}
        </div>
      </section>

      {/* SOBRE / INFO */}
      <section style={{ padding: '0 48px 80px' }}>
        <div style={{
          display: 'grid',
          gridTemplateColumns: '1fr 1fr',
          gap: 16
        }}>
          {/* Sobre */}
          <div style={{
            background: 'var(--paper-2)',
            borderRadius: 18,
            padding: '36px 36px',
            border: '1px solid var(--rule)'
          }}>
            <Tag gold>Sobre el local</Tag>
            <h3 style={{ fontSize: 32, fontWeight: 600, letterSpacing: '-0.02em', margin: '14px 0 14px', lineHeight: 1.1 }}>
              Barbería de barrio,<br /> con oficio de ciudad.
            </h3>
            <p style={{ fontSize: 15, color: 'var(--ink-soft)', lineHeight: 1.6, margin: 0 }}>
              Rodrigo abrió Barber Brizu después de 8 años cortando en grandes barberías de Formosa. Hoy somos un equipo de 4 barberos atendiendo de lunes a sábados con turnos siempre puntuales.
            </p>
            <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 20, marginTop: 28, paddingTop: 24, borderTop: '1px solid var(--rule)' }}>
              <div>
                <div style={{ fontSize: 11, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Dirección</div>
                <div style={{ fontSize: 17, fontWeight: 600, marginTop: 4 }}>Jujuy 209</div>
                <div style={{ fontSize: 13, color: 'var(--ink-mute)' }}>Ciudad de Formosa</div>
              </div>
              <div>
                <div style={{ fontSize: 11, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Horarios</div>
                <div style={{ fontSize: 17, fontWeight: 600, marginTop: 4 }}>Lun a Sáb</div>
                <div style={{ fontSize: 13, color: 'var(--ink-mute)' }}>9:00 – 22:00 hs</div>
              </div>
            </div>
            <div style={{ marginTop: 28, display: 'flex', gap: 10 }}>
              <button style={{
                padding: '10px 16px',
                background: 'var(--ink)',
                color: 'var(--paper)',
                borderRadius: 10,
                border: 'none',
                fontSize: 13,
                fontWeight: 500,
                cursor: 'pointer'
              }}>WhatsApp</button>
              <button style={{
                padding: '10px 16px',
                background: 'transparent',
                color: 'var(--ink)',
                border: '1px solid var(--rule)',
                borderRadius: 10,
                fontSize: 13,
                fontWeight: 500,
                cursor: 'pointer'
              }}>@barberbrizu</button>
            </div>
          </div>

          {/* Mapa */}
          <div className="map-ph" style={{ borderRadius: 18, minHeight: 380, border: '1px solid var(--rule)' }}>
            <div className="pin"></div>
            <div style={{
              position: 'absolute',
              bottom: 18, left: 18, right: 18,
              background: 'var(--paper)',
              borderRadius: 12,
              padding: '14px 18px',
              display: 'flex',
              justifyContent: 'space-between',
              alignItems: 'center',
              boxShadow: '0 4px 16px -6px rgba(20,30,50,0.12)'
            }}>
              <div>
                <div style={{ fontSize: 15, fontWeight: 600 }}>Jujuy 209</div>
                <div style={{ fontSize: 12, color: 'var(--ink-mute)' }}>Ciudad de Formosa</div>
              </div>
              <div style={{
                padding: '8px 14px',
                background: 'var(--blue-50)',
                color: 'var(--blue-600)',
                borderRadius: 8,
                fontSize: 12,
                fontWeight: 500
              }}>Cómo llegar ↗</div>
            </div>
          </div>
        </div>
      </section>

      {/* FOOTER */}
      <footer style={{ padding: '40px 48px 32px', borderTop: '1px solid var(--rule)', background: 'var(--paper)' }}>
        <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', flexWrap: 'wrap', gap: 24, marginBottom: 28 }}>
          {/* Brand block */}
          <div>
            <div style={v2.logo}>
              <div style={v2.logoMark}>BB</div>
              <div style={v2.logoText}>Barber Brizu</div>
            </div>
            <div style={{ marginTop: 14, fontSize: 13, color: 'var(--ink-mute)', maxWidth: 280, lineHeight: 1.55 }}>
              Jujuy 209 · Ciudad de Formosa<br />
              Lun a Sáb · 9:00 — 22:00 hs
            </div>
          </div>

          {/* Redes sociales */}
          <div style={{ display: 'flex', gap: 12 }}>
            <a style={{
              display: 'inline-flex',
              alignItems: 'center',
              gap: 10,
              padding: '12px 18px',
              borderRadius: 12,
              border: '1px solid var(--rule)',
              background: 'var(--paper)',
              color: 'var(--ink)',
              fontSize: 14,
              fontWeight: 500,
              cursor: 'pointer',
              textDecoration: 'none'
            }}>
              <span style={{
                width: 28, height: 28,
                borderRadius: 8,
                background: 'var(--blue-50)',
                display: 'grid', placeItems: 'center',
                color: 'var(--blue-600)'
              }}>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                  <rect x="3" y="3" width="18" height="18" rx="5" />
                  <circle cx="12" cy="12" r="4" />
                  <circle cx="17.5" cy="6.5" r="0.6" fill="currentColor" />
                </svg>
              </span>
              <div style={{ display: 'flex', flexDirection: 'column', alignItems: 'flex-start', lineHeight: 1.2 }}>
                <span style={{ fontSize: 11, color: 'var(--ink-mute)', fontWeight: 400 }}>Instagram</span>
                <span>@barberbrizu</span>
              </div>
            </a>

            <a style={{
              display: 'inline-flex',
              alignItems: 'center',
              gap: 10,
              padding: '12px 18px',
              borderRadius: 12,
              border: '1px solid var(--rule)',
              background: 'var(--paper)',
              color: 'var(--ink)',
              fontSize: 14,
              fontWeight: 500,
              cursor: 'pointer',
              textDecoration: 'none'
            }}>
              <span style={{
                width: 28, height: 28,
                borderRadius: 8,
                background: 'oklch(95% 0.05 145)',
                display: 'grid', placeItems: 'center',
                color: 'oklch(45% 0.15 145)'
              }}>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M17.5 14.4c-.3-.2-1.8-.9-2.1-1-.3-.1-.5-.2-.7.2-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-.3-.2-1.3-.5-2.4-1.5-.9-.8-1.5-1.8-1.7-2.1-.2-.3 0-.5.1-.6.1-.1.3-.3.4-.5.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5 0-.1-.7-1.7-1-2.3-.3-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1.1 2.8 1.2 3c.1.2 2.1 3.2 5.1 4.5.7.3 1.3.5 1.7.6.7.2 1.3.2 1.9.1.6-.1 1.8-.7 2-1.4.2-.7.2-1.3.2-1.4-.1-.1-.3-.2-.6-.4zM12 2C6.5 2 2 6.5 2 12c0 1.7.5 3.4 1.3 4.9L2 22l5.3-1.4c1.4.8 3 1.2 4.7 1.2 5.5 0 10-4.5 10-10S17.5 2 12 2z" />
                </svg>
              </span>
              <div style={{ display: 'flex', flexDirection: 'column', alignItems: 'flex-start', lineHeight: 1.2 }}>
                <span style={{ fontSize: 11, color: 'var(--ink-mute)', fontWeight: 400 }}>WhatsApp</span>
                <span>Escribinos</span>
              </div>
            </a>
          </div>
        </div>

        {/* Bottom bar */}
        <div style={{
          paddingTop: 20,
          borderTop: '1px solid var(--rule)',
          display: 'flex',
          justifyContent: 'space-between',
          alignItems: 'center',
          fontSize: 13,
          color: 'var(--ink-mute)'
        }}>
          <div>© 2026 Barber Brizu</div>
          <div style={{ display: 'flex', gap: 20 }}>
            <span>Términos</span>
            <span>Privacidad</span>
          </div>
        </div>
      </footer>
    </div>);

};

window.V2 = V2;