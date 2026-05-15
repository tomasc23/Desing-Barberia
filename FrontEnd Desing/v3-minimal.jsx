/* V3 — Centrado minimal · todo al medio, máximo aire, foco en el CTA */
const V3 = () => {
  const v3 = {
    page: {
      width: '100%',
      height: '100%',
      background: 'var(--paper)',
      color: 'var(--ink)',
      fontFamily: '"Space Grotesk", -apple-system, sans-serif',
      fontSize: 15,
      lineHeight: 1.55,
      overflow: 'hidden',
    },
    nav: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      padding: '24px 40px',
    },
    logoMark: {
      width: 32, height: 32,
      borderRadius: 8,
      background: 'var(--ink)',
      color: 'var(--paper)',
      display: 'grid',
      placeItems: 'center',
      fontWeight: 600,
      fontSize: 13,
      letterSpacing: '0.02em',
    },
  };

  const Pill = ({ children, dot = true }) => (
    <span style={{
      display: 'inline-flex',
      alignItems: 'center',
      gap: 8,
      padding: '7px 14px',
      borderRadius: 999,
      border: '1px solid var(--rule)',
      background: 'var(--paper)',
      fontSize: 12,
      color: 'var(--ink-soft)',
      letterSpacing: '0.02em',
    }}>
      {dot && <span style={{ width: 7, height: 7, borderRadius: '50%', background: 'oklch(70% 0.15 145)' }}></span>}
      {children}
    </span>
  );

  return (
    <div style={v3.page}>
      {/* NAV */}
      <header style={v3.nav}>
        <div style={{ display: 'flex', alignItems: 'center', gap: 10 }}>
          <div style={v3.logoMark}>BB</div>
          <div style={{ fontWeight: 500, fontSize: 16, letterSpacing: '-0.01em' }}>Barber Brizu</div>
        </div>
        <nav style={{ display: 'flex', gap: 28, fontSize: 13, color: 'var(--ink-soft)' }}>
          <span>Servicios</span>
          <span>Sobre nosotros</span>
          <span>Contacto</span>
        </nav>
        <div style={{ fontSize: 13, color: 'var(--ink-soft)' }}>Iniciar sesión</div>
      </header>

      {/* HERO — centrado, mucho aire */}
      <section style={{ padding: '88px 40px 96px', textAlign: 'center', display: 'flex', flexDirection: 'column', alignItems: 'center' }}>
        <Pill>Hoy abierto · 9:00 a 22:00</Pill>

        <h1 style={{
          fontSize: 110,
          fontWeight: 500,
          letterSpacing: '-0.04em',
          lineHeight: 0.95,
          margin: '32px 0 0',
          textWrap: 'balance',
          maxWidth: 980,
        }}>
          Reservá tu corte<br/>
          en <span style={{
            fontStyle: 'italic',
            color: 'var(--blue-600)',
            fontWeight: 400,
          }}>un minuto</span>.
        </h1>

        <p style={{
          marginTop: 28,
          fontSize: 18,
          color: 'var(--ink-soft)',
          maxWidth: 520,
          lineHeight: 1.55,
        }}>
          Sin llamadas, sin idas y vueltas. Elegís día, horario y barbero — te confirmamos al instante.
        </p>

        <div style={{ marginTop: 40, display: 'flex', alignItems: 'center', gap: 14 }}>
          <button style={{
            padding: '17px 32px',
            background: 'var(--ink)',
            color: 'var(--paper)',
            borderRadius: 999,
            fontSize: 15,
            fontWeight: 500,
            border: 'none',
            cursor: 'pointer',
            display: 'inline-flex',
            alignItems: 'center',
            gap: 10,
          }}>
            Sacar turno
            <span style={{
              width: 22, height: 22, borderRadius: '50%',
              background: 'var(--gold)',
              color: 'var(--ink)',
              display: 'grid', placeItems: 'center',
              fontSize: 12,
            }}>→</span>
          </button>
          <button style={{
            padding: '17px 26px',
            background: 'transparent',
            color: 'var(--ink-soft)',
            border: 'none',
            fontSize: 15,
            cursor: 'pointer',
          }}>Ver servicios</button>
        </div>

        {/* small social proof / address chips */}
        <div style={{ marginTop: 48, display: 'flex', gap: 12, flexWrap: 'wrap', justifyContent: 'center' }}>
          <Pill dot={false}>📍 Jujuy 209 · Corrientes</Pill>
          <Pill dot={false}>4 barberos</Pill>
          <Pill dot={false}>Lun a Sáb</Pill>
        </div>
      </section>

      {/* Photo strip — full width, low height */}
      <section style={{ padding: '0 40px 96px' }}>
        <div style={{
          display: 'grid',
          gridTemplateColumns: '1.6fr 1fr 1fr',
          gap: 12,
          height: 280,
        }}>
          <div className="photo-ph" data-label="interior · principal" style={{ borderRadius: 12 }}></div>
          <div className="photo-ph" data-label="silla · detalle" style={{ borderRadius: 12 }}></div>
          <div className="photo-ph" data-label="herramientas" style={{ borderRadius: 12 }}></div>
        </div>
      </section>

      {/* SERVICIOS — tabla minimal */}
      <section style={{ padding: '0 40px 100px', maxWidth: 980, margin: '0 auto', width: '100%' }}>
        <div style={{ textAlign: 'center', marginBottom: 56 }}>
          <div style={{ fontSize: 12, color: 'var(--gold)', textTransform: 'uppercase', letterSpacing: '0.18em', marginBottom: 14 }}>—  Servicios  —</div>
          <h2 style={{
            fontSize: 56,
            fontWeight: 500,
            letterSpacing: '-0.03em',
            margin: 0,
            lineHeight: 1,
          }}>Lo que hacemos.</h2>
        </div>

        <div style={{
          border: '1px solid var(--rule)',
          borderRadius: 16,
          overflow: 'hidden',
          background: 'var(--paper)',
        }}>
          {[
            ['Corte de cabello', 'Lavado · corte · peinado', '~35 min', '$8.000'],
            ['Corte de barba', 'Perfilado y toalla caliente', '~25 min', '$6.000'],
            ['Perfilado de cejas', 'Diseño y limpieza', '~15 min', '$3.000'],
            ['Pintura', 'Color para cabello o barba', '~45 min', '$10.000'],
          ].map(([name, desc, time, price], i, arr) => (
            <div key={name} style={{
              display: 'grid',
              gridTemplateColumns: '1.4fr 1.6fr 0.7fr 0.7fr',
              gap: 20,
              alignItems: 'center',
              padding: '22px 28px',
              borderTop: i === 0 ? 'none' : '1px solid var(--rule)',
              background: i % 2 === 0 ? 'var(--paper)' : 'var(--paper-2)',
            }}>
              <div style={{ fontSize: 17, fontWeight: 500, letterSpacing: '-0.01em' }}>{name}</div>
              <div style={{ fontSize: 14, color: 'var(--ink-mute)' }}>{desc}</div>
              <div style={{ fontSize: 12, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.08em' }}>{time}</div>
              <div style={{ fontSize: 18, fontWeight: 500, textAlign: 'right', fontVariantNumeric: 'tabular-nums' }}>{price}</div>
            </div>
          ))}
        </div>

        <div style={{ textAlign: 'center', marginTop: 20, fontSize: 12, color: 'var(--ink-mute)', fontStyle: 'italic' }}>
          Precios de referencia — actualizables desde el panel del local.
        </div>
      </section>

      {/* SOBRE & INFO — split simple */}
      <section style={{ padding: '0 40px 80px' }}>
        <div style={{
          background: 'var(--blue-50)',
          borderRadius: 20,
          padding: '64px 56px',
          display: 'grid',
          gridTemplateColumns: '1.05fr 1fr',
          gap: 56,
          alignItems: 'center',
        }}>
          <div>
            <div style={{ fontSize: 12, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.18em', marginBottom: 14 }}>—  Sobre nosotros</div>
            <h3 style={{ fontSize: 40, fontWeight: 500, letterSpacing: '-0.025em', margin: 0, lineHeight: 1.08 }}>
              Cinco meses abriendo. <span style={{ color: 'var(--blue-600)', fontStyle: 'italic' }}>Ocho años</span> cortando.
            </h3>
            <p style={{ marginTop: 22, fontSize: 16, color: 'var(--ink-soft)', lineHeight: 1.6, maxWidth: 460 }}>
              Barber Brizu es un local nuevo con manos experimentadas. Cuatro barberos, una sola sucursal y todos los turnos puntuales.
            </p>

            <div style={{ marginTop: 36, display: 'grid', gridTemplateColumns: 'repeat(2, 1fr)', gap: 24 }}>
              <div>
                <div style={{ fontSize: 11, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Dirección</div>
                <div style={{ fontSize: 20, fontWeight: 500, marginTop: 4 }}>Jujuy 209</div>
                <div style={{ fontSize: 13, color: 'var(--ink-mute)' }}>Corrientes Capital</div>
              </div>
              <div>
                <div style={{ fontSize: 11, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Horarios</div>
                <div style={{ fontSize: 20, fontWeight: 500, marginTop: 4 }}>Lun a Sáb</div>
                <div style={{ fontSize: 13, color: 'var(--ink-mute)' }}>9:00 – 22:00 hs</div>
              </div>
              <div>
                <div style={{ fontSize: 11, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Instagram</div>
                <div style={{ fontSize: 20, fontWeight: 500, marginTop: 4 }}>@barberbrizu</div>
                <div style={{ fontSize: 13, color: 'var(--ink-mute)' }}>Reservas y novedades</div>
              </div>
              <div>
                <div style={{ fontSize: 11, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>WhatsApp</div>
                <div style={{ fontSize: 20, fontWeight: 500, marginTop: 4 }}>Escribinos</div>
                <div style={{ fontSize: 13, color: 'var(--ink-mute)' }}>Para consultas rápidas</div>
              </div>
            </div>
          </div>

          {/* Mini map */}
          <div className="map-ph" style={{ height: 380, borderRadius: 14, border: '1px solid var(--rule)' }}>
            <div className="pin"></div>
            <div style={{
              position: 'absolute',
              top: 16, left: 16,
              background: 'var(--paper)',
              padding: '8px 12px',
              borderRadius: 8,
              fontSize: 12,
              color: 'var(--ink-soft)',
              border: '1px solid var(--rule)',
            }}>Jujuy 209</div>
            <div style={{
              position: 'absolute',
              bottom: 16, right: 16,
              background: 'var(--ink)',
              color: 'var(--paper)',
              padding: '10px 14px',
              borderRadius: 8,
              fontSize: 12,
              fontWeight: 500,
            }}>Cómo llegar ↗</div>
          </div>
        </div>
      </section>

      {/* FOOTER */}
      <footer style={{
        padding: '40px',
        borderTop: '1px solid var(--rule)',
        textAlign: 'center',
      }}>
        <div style={{ display: 'inline-flex', alignItems: 'center', gap: 10, marginBottom: 14 }}>
          <div style={v3.logoMark}>BB</div>
          <div style={{ fontWeight: 500, fontSize: 16 }}>Barber Brizu</div>
        </div>
        <div style={{ fontSize: 13, color: 'var(--ink-mute)', marginBottom: 16 }}>
          Jujuy 209 · Corrientes Capital · Lun a Sáb 9:00 – 22:00
        </div>
        <div style={{ display: 'flex', gap: 20, justifyContent: 'center', fontSize: 13, color: 'var(--ink-soft)' }}>
          <span>Instagram</span>
          <span>·</span>
          <span>WhatsApp</span>
          <span>·</span>
          <span>Cómo llegar</span>
        </div>
        <div style={{ marginTop: 24, fontSize: 12, color: 'var(--ink-mute)' }}>© 2026 Barber Brizu</div>
      </footer>
    </div>
  );
};

window.V3 = V3;
