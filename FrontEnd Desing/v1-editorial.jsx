/* V1 — Editorial · serif grande, asimétrico, mucho aire, dorado sutil */
const V1 = () => {
  const v1 = {
    page: {
      width: '100%',
      height: '100%',
      background: 'var(--paper)',
      color: 'var(--ink)',
      fontFamily: '"Manrope", -apple-system, sans-serif',
      fontSize: 15,
      lineHeight: 1.55,
      overflow: 'hidden',
      display: 'flex',
      flexDirection: 'column',
    },
    nav: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      padding: '28px 56px',
      borderBottom: '1px solid var(--rule)',
    },
    logo: {
      display: 'flex',
      alignItems: 'center',
      gap: 12,
    },
    logoMark: {
      width: 36,
      height: 36,
      borderRadius: '50%',
      background: 'var(--ink)',
      color: 'var(--paper)',
      display: 'grid',
      placeItems: 'center',
      fontFamily: '"Cormorant Garamond", serif',
      fontWeight: 600,
      fontSize: 18,
      letterSpacing: '0.02em',
    },
    logoText: {
      fontFamily: '"Cormorant Garamond", serif',
      fontWeight: 500,
      fontSize: 20,
      letterSpacing: '0.04em',
    },
    navLinks: {
      display: 'flex',
      gap: 36,
      fontSize: 13,
      letterSpacing: '0.06em',
      textTransform: 'uppercase',
      color: 'var(--ink-soft)',
    },
    cta: {
      padding: '10px 20px',
      background: 'var(--ink)',
      color: 'var(--paper)',
      borderRadius: 999,
      fontSize: 13,
      letterSpacing: '0.08em',
      textTransform: 'uppercase',
      fontWeight: 500,
      border: 'none',
      cursor: 'pointer',
    },
  };

  return (
    <div style={v1.page}>
      {/* NAV */}
      <header style={v1.nav}>
        <div style={v1.logo}>
          <div style={v1.logoMark}>BB</div>
          <div style={v1.logoText}>Barber Brizu</div>
        </div>
        <nav style={v1.navLinks}>
          <span>Inicio</span>
          <span>Servicios</span>
          <span>Sobre</span>
          <span>Contacto</span>
        </nav>
        <button style={v1.cta}>Sacar turno →</button>
      </header>

      {/* HERO */}
      <section style={{ padding: '80px 56px 100px', display: 'grid', gridTemplateColumns: '1.05fr 0.95fr', gap: 64, alignItems: 'center' }}>
        <div>
          <div style={{ display: 'flex', alignItems: 'center', gap: 12, marginBottom: 28, fontSize: 12, letterSpacing: '0.18em', textTransform: 'uppercase', color: 'var(--ink-mute)' }}>
            <span style={{ width: 32, height: 1, background: 'var(--gold)' }}></span>
            <span>Barbería · desde 2025</span>
          </div>
          <h1 style={{
            fontFamily: '"Cormorant Garamond", serif',
            fontWeight: 500,
            fontSize: 92,
            lineHeight: 1.02,
            letterSpacing: '-0.015em',
            margin: 0,
            textWrap: 'pretty',
          }}>
            El corte<br/>
            que estabas<br/>
            <em style={{ color: 'var(--blue-600)', fontStyle: 'italic' }}>esperando.</em>
          </h1>
          <p style={{ marginTop: 28, fontSize: 17, color: 'var(--ink-soft)', maxWidth: 440, lineHeight: 1.6 }}>
            Reservá tu turno en menos de un minuto. Sin llamadas, sin idas y vueltas por WhatsApp. Elegís el día, el horario y listo.
          </p>
          <div style={{ marginTop: 40, display: 'flex', alignItems: 'center', gap: 20 }}>
            <button style={{ ...v1.cta, padding: '16px 28px', fontSize: 13 }}>Sacar turno</button>
            <a style={{ fontSize: 14, color: 'var(--ink-soft)', textDecoration: 'underline', textUnderlineOffset: 4 }}>Ver servicios</a>
          </div>
          {/* tiny meta row */}
          <div style={{ marginTop: 56, display: 'flex', gap: 48, paddingTop: 28, borderTop: '1px solid var(--rule)' }}>
            <div>
              <div style={{ fontFamily: '"Cormorant Garamond", serif', fontSize: 30, fontWeight: 500 }}>4</div>
              <div style={{ fontSize: 12, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Barberos</div>
            </div>
            <div>
              <div style={{ fontFamily: '"Cormorant Garamond", serif', fontSize: 30, fontWeight: 500 }}>13h</div>
              <div style={{ fontSize: 12, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>De atención</div>
            </div>
            <div>
              <div style={{ fontFamily: '"Cormorant Garamond", serif', fontSize: 30, fontWeight: 500 }}>Jujuy <span style={{ color: 'var(--gold)' }}>209</span></div>
              <div style={{ fontSize: 12, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Una sola sucursal</div>
            </div>
          </div>
        </div>

        {/* Photo placeholder — vertical, generous */}
        <div style={{ position: 'relative' }}>
          <div className="photo-ph" data-label="foto del local · vertical" style={{ height: 560, borderRadius: 4 }}></div>
          <div style={{
            position: 'absolute', bottom: -24, left: -24,
            background: 'var(--paper)',
            border: '1px solid var(--rule)',
            padding: '14px 18px',
            borderRadius: 4,
            display: 'flex',
            alignItems: 'center',
            gap: 12,
          }}>
            <div style={{ width: 8, height: 8, borderRadius: '50%', background: 'oklch(70% 0.15 145)' }}></div>
            <div>
              <div style={{ fontSize: 11, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Hoy abierto</div>
              <div style={{ fontSize: 14, fontWeight: 500 }}>9:00 — 22:00</div>
            </div>
          </div>
        </div>
      </section>

      {/* SERVICIOS — list editorial */}
      <section style={{ padding: '64px 56px', borderTop: '1px solid var(--rule)' }}>
        <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-end', marginBottom: 48 }}>
          <div>
            <div style={{ fontSize: 12, letterSpacing: '0.18em', textTransform: 'uppercase', color: 'var(--gold)', marginBottom: 12 }}>—  Servicios</div>
            <h2 style={{ fontFamily: '"Cormorant Garamond", serif', fontSize: 56, fontWeight: 500, margin: 0, lineHeight: 1 }}>
              Lo que ofrecemos.
            </h2>
          </div>
          <div style={{ fontSize: 14, color: 'var(--ink-mute)', maxWidth: 320 }}>
            Precios de referencia. Consultá promos vigentes al sacar tu turno.
          </div>
        </div>

        <div>
          {[
            ['01', 'Corte de cabello', 'Lavado, corte y peinado a tu medida.', '$8.000', '~35 min'],
            ['02', 'Corte de barba', 'Perfilado, contorno y toalla caliente.', '$6.000', '~25 min'],
            ['03', 'Perfilado de cejas', 'Diseño y limpieza con detalle.', '$3.000', '~15 min'],
            ['04', 'Pintura', 'Color para cabello o barba.', '$10.000', '~45 min'],
          ].map(([n, name, desc, price, time]) => (
            <div key={n} style={{
              display: 'grid',
              gridTemplateColumns: '60px 1.2fr 1.5fr 120px 90px',
              alignItems: 'center',
              padding: '28px 0',
              borderTop: '1px solid var(--rule)',
              gap: 24,
            }}>
              <div style={{ fontFamily: '"Cormorant Garamond", serif', fontSize: 22, color: 'var(--ink-mute)', fontStyle: 'italic' }}>{n}</div>
              <div style={{ fontFamily: '"Cormorant Garamond", serif', fontSize: 32, fontWeight: 500, letterSpacing: '-0.01em' }}>{name}</div>
              <div style={{ fontSize: 15, color: 'var(--ink-soft)' }}>{desc}</div>
              <div style={{ fontSize: 22, fontWeight: 500, color: 'var(--ink)' }}>{price}</div>
              <div style={{ fontSize: 12, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>{time}</div>
            </div>
          ))}
          <div style={{ borderTop: '1px solid var(--rule)' }}></div>
        </div>

        <div style={{ marginTop: 40, fontSize: 12, color: 'var(--ink-mute)', fontStyle: 'italic' }}>
          * Precios de referencia (placeholder). Reemplazar con los reales del local.
        </div>
      </section>

      {/* SOBRE / INFO */}
      <section style={{ padding: '80px 56px', background: 'var(--blue-50)', display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 64 }}>
        <div>
          <div style={{ fontSize: 12, letterSpacing: '0.18em', textTransform: 'uppercase', color: 'var(--ink-mute)', marginBottom: 12 }}>—  Sobre el local</div>
          <h2 style={{ fontFamily: '"Cormorant Garamond", serif', fontSize: 48, fontWeight: 500, margin: 0, lineHeight: 1.05, letterSpacing: '-0.01em' }}>
            Una barbería de barrio, hecha con oficio.
          </h2>
          <p style={{ marginTop: 24, fontSize: 16, color: 'var(--ink-soft)', lineHeight: 1.65, maxWidth: 460 }}>
            Barber Brizu nació hace poco más de medio año, pero detrás del mostrador hay 8 años de experiencia cortando en grandes barberías de la ciudad. Atendemos sólo a hombres, con turnos pensados para que no esperes.
          </p>

          <div style={{ marginTop: 40, display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 32 }}>
            <div>
              <div style={{ fontSize: 11, letterSpacing: '0.14em', textTransform: 'uppercase', color: 'var(--ink-mute)', marginBottom: 8 }}>Dirección</div>
              <div style={{ fontFamily: '"Cormorant Garamond", serif', fontSize: 24, fontWeight: 500 }}>Jujuy 209</div>
              <div style={{ fontSize: 14, color: 'var(--ink-soft)', marginTop: 4 }}>Corrientes Capital</div>
            </div>
            <div>
              <div style={{ fontSize: 11, letterSpacing: '0.14em', textTransform: 'uppercase', color: 'var(--ink-mute)', marginBottom: 8 }}>Horarios</div>
              <div style={{ fontFamily: '"Cormorant Garamond", serif', fontSize: 24, fontWeight: 500 }}>Lun — Sáb</div>
              <div style={{ fontSize: 14, color: 'var(--ink-soft)', marginTop: 4 }}>9:00 a 22:00 hs</div>
            </div>
          </div>
        </div>

        {/* Map */}
        <div className="map-ph" style={{ height: 380, borderRadius: 4, border: '1px solid var(--rule)' }}>
          <div className="pin"></div>
          <div style={{
            position: 'absolute', bottom: 16, left: 16, right: 16,
            background: 'var(--paper)',
            padding: '14px 18px',
            borderRadius: 4,
            display: 'flex',
            justifyContent: 'space-between',
            alignItems: 'center',
          }}>
            <div>
              <div style={{ fontFamily: '"Cormorant Garamond", serif', fontSize: 18, fontWeight: 500 }}>Jujuy 209</div>
              <div style={{ fontSize: 12, color: 'var(--ink-mute)' }}>Cómo llegar</div>
            </div>
            <div style={{ fontSize: 12, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.08em' }}>↗ Mapa</div>
          </div>
        </div>
      </section>

      {/* FOOTER */}
      <footer style={{ padding: '48px 56px 36px', borderTop: '1px solid var(--rule)', display: 'flex', justifyContent: 'space-between', alignItems: 'center', fontSize: 13, color: 'var(--ink-mute)' }}>
        <div style={v1.logo}>
          <div style={v1.logoMark}>BB</div>
          <div style={v1.logoText}>Barber Brizu</div>
        </div>
        <div style={{ display: 'flex', gap: 28 }}>
          <span>@barberbrizu</span>
          <span>WhatsApp</span>
          <span>Jujuy 209</span>
        </div>
        <div>© 2026 · Hecho con oficio</div>
      </footer>
    </div>
  );
};

window.V1 = V1;
