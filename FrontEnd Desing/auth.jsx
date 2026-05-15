/* Login + Register screens · sigue la estética de V2 (Cards modernas) */

const authShared = {
  page: {
    width: '100%',
    height: '100%',
    background: 'var(--paper)',
    color: 'var(--ink)',
    fontFamily: '"Outfit", -apple-system, sans-serif',
    fontSize: 15,
    lineHeight: 1.5,
    display: 'grid',
    gridTemplateColumns: '1fr 1fr',
    overflow: 'hidden'
  },
  nav: {
    position: 'absolute',
    top: 0, left: 0, right: 0,
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'space-between',
    padding: '24px 40px',
    zIndex: 5
  },
  logo: { display: 'flex', alignItems: 'center', gap: 10 },
  logoMark: {
    width: 36, height: 36, borderRadius: 10,
    background: 'var(--blue-600)', color: 'var(--paper)',
    display: 'grid', placeItems: 'center',
    fontWeight: 700, fontSize: 14, letterSpacing: '0.04em'
  },
  logoText: { fontWeight: 600, fontSize: 17, letterSpacing: '-0.01em' },
  panel: {
    padding: '120px 64px 56px',
    display: 'flex',
    flexDirection: 'column',
    justifyContent: 'center',
    position: 'relative'
  },
  cta: {
    width: '100%',
    padding: '14px 20px',
    background: 'var(--gold)',
    color: 'var(--ink)',
    borderRadius: 12,
    fontSize: 15,
    fontWeight: 700,
    letterSpacing: '0.01em',
    border: 'none',
    cursor: 'pointer',
    display: 'inline-flex',
    alignItems: 'center',
    justifyContent: 'center',
    gap: 10,
    boxShadow: '0 6px 18px -8px oklch(60% 0.14 80 / 0.5)'
  },
  inputWrap: {
    position: 'relative',
    display: 'flex',
    flexDirection: 'column',
    gap: 6
  },
  label: {
    fontSize: 12,
    fontWeight: 500,
    color: 'var(--ink-soft)',
    letterSpacing: '0.02em'
  },
  input: {
    width: '100%',
    padding: '12px 14px',
    fontSize: 15,
    fontFamily: 'inherit',
    background: 'var(--paper)',
    border: '1.5px solid var(--rule)',
    borderRadius: 10,
    color: 'var(--ink)',
    outline: 'none'
  },
  inputFocus: {
    border: '1.5px solid var(--blue-600)',
    boxShadow: '0 0 0 4px oklch(91% 0.045 240)'
  }
};

const Input = ({ label, type = 'text', placeholder, value, leftIcon, rightSlot, focused = false }) => (
  <div style={authShared.inputWrap}>
    <label style={authShared.label}>{label}</label>
    <div style={{ position: 'relative', display: 'flex', alignItems: 'center' }}>
      {leftIcon && (
        <span style={{
          position: 'absolute',
          left: 14,
          color: 'var(--ink-mute)',
          display: 'grid', placeItems: 'center',
          pointerEvents: 'none'
        }}>{leftIcon}</span>
      )}
      <input
        type={type}
        defaultValue={value}
        placeholder={placeholder}
        style={{
          ...authShared.input,
          ...(focused ? authShared.inputFocus : {}),
          paddingLeft: leftIcon ? 42 : 14,
          paddingRight: rightSlot ? 80 : 14
        }} />
      {rightSlot && (
        <span style={{ position: 'absolute', right: 12 }}>{rightSlot}</span>
      )}
    </div>
  </div>
);

const MailIcon = () => (
  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
    <rect x="3" y="5" width="18" height="14" rx="2" />
    <path d="M3 7l9 6 9-6" />
  </svg>
);
const LockIcon = () => (
  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
    <rect x="4" y="11" width="16" height="10" rx="2" />
    <path d="M8 11V7a4 4 0 0 1 8 0v4" />
  </svg>
);
const UserIcon = () => (
  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
    <circle cx="12" cy="8" r="3.5" />
    <path d="M5 20c0-3.5 3-6 7-6s7 2.5 7 6" />
  </svg>
);
const PhoneIcon = () => (
  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
    <path d="M5 4h3l2 5-2 1a11 11 0 0 0 6 6l1-2 5 2v3a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z" />
  </svg>
);
const CalIcon = () => (
  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
    <rect x="3" y="5" width="18" height="16" rx="2" />
    <path d="M3 9h18M8 3v4M16 3v4" />
  </svg>
);
const EyeIcon = () => (
  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z" />
    <circle cx="12" cy="12" r="3" />
  </svg>
);

/* Right-side brand panel — minimalista, tipográfico, sin booking card */
const BrandPanel = ({ quote, subline }) => (
  <aside style={{
    background: 'var(--blue-50)',
    padding: '120px 64px 64px',
    position: 'relative',
    overflow: 'hidden',
    display: 'flex',
    flexDirection: 'column',
    justifyContent: 'space-between'
  }}>
    {/* decorative shapes */}
    <div style={{ position: 'absolute', top: -160, right: -180, width: 460, height: 460, borderRadius: '50%', background: 'var(--blue-100)', opacity: 0.6 }}></div>
    <div style={{ position: 'absolute', bottom: -80, left: -80, width: 260, height: 260, borderRadius: '50%', background: 'var(--blue-100)', opacity: 0.4 }}></div>
    <div style={{ position: 'absolute', bottom: 90, right: 60, width: 16, height: 16, borderRadius: '50%', background: 'var(--red)' }}></div>
    <div style={{ position: 'absolute', top: 110, right: 110, width: 10, height: 10, borderRadius: '50%', background: 'var(--gold)' }}></div>

    {/* large stylized scissors illustration */}
    <div style={{ position: 'absolute', top: '50%', right: -60, transform: 'translateY(-50%) rotate(18deg)', opacity: 0.18, pointerEvents: 'none' }}>
      <svg width="360" height="360" viewBox="0 0 24 24" fill="none" stroke="var(--blue-600)" strokeWidth="1" strokeLinecap="round" strokeLinejoin="round">
        <circle cx="6" cy="6.5" r="2.7" />
        <circle cx="6" cy="17.5" r="2.7" />
        <line x1="20" y1="4" x2="8.2" y2="15.8" />
        <line x1="14.5" y1="14.5" x2="20" y2="20" />
        <line x1="8.2" y1="8.2" x2="12" y2="12" />
      </svg>
    </div>

    {/* top: brand mark */}
    <div style={{ position: 'relative', zIndex: 1, display: 'flex', alignItems: 'center', gap: 10 }}>
      <div style={{
        width: 40, height: 40, borderRadius: 12,
        background: 'var(--blue-600)', color: 'var(--paper)',
        display: 'grid', placeItems: 'center',
        fontWeight: 700, fontSize: 15, letterSpacing: '0.04em'
      }}>BB</div>
      <div>
        <div style={{ fontWeight: 700, fontSize: 18, letterSpacing: '-0.01em', color: 'var(--ink)' }}>Barber Brizu</div>
        <div style={{ fontSize: 12, color: 'var(--ink-mute)', letterSpacing: '0.04em' }}>Desde 2025 · Formosa</div>
      </div>
    </div>

    {/* center: big quote */}
    <div style={{ position: 'relative', zIndex: 1 }}>
      <div style={{ fontSize: 11, letterSpacing: '0.22em', textTransform: 'uppercase', color: 'var(--blue-600)', marginBottom: 18, display: 'flex', alignItems: 'center', gap: 10 }}>
        <span style={{ width: 28, height: 1, background: 'var(--blue-600)' }}></span>
        <span>Barber Brizu</span>
      </div>
      <h2 style={{
        fontFamily: '"Cormorant Garamond", Georgia, serif',
        fontSize: 64,
        fontWeight: 500,
        letterSpacing: '-0.02em',
        lineHeight: 1.02,
        margin: 0,
        textWrap: 'pretty'
      }}>
        {quote}
      </h2>
      <p style={{ marginTop: 24, fontSize: 16, color: 'var(--ink-soft)', maxWidth: 380, lineHeight: 1.6 }}>
        {subline}
      </p>
    </div>

    {/* bottom: address strip */}
    <div style={{ position: 'relative', zIndex: 1, display: 'flex', gap: 32, paddingTop: 24, borderTop: '1px solid oklch(82% 0.05 240)' }}>
      <div>
        <div style={{ fontSize: 11, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Dirección</div>
        <div style={{ fontSize: 15, fontWeight: 600, marginTop: 4 }}>Jujuy 209</div>
      </div>
      <div>
        <div style={{ fontSize: 11, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.1em' }}>Horarios</div>
        <div style={{ fontSize: 15, fontWeight: 600, marginTop: 4 }}>Lun a Sáb · 9:00–22:00</div>
      </div>
    </div>
  </aside>
);

/* ---------- LOGIN ---------- */
const Login = () => (
  <div style={authShared.page}>
    <header style={authShared.nav}>
      <div style={authShared.logo}>
        <div style={authShared.logoMark}>BB</div>
        <div style={authShared.logoText}>Barber Brizu</div>
      </div>
      <a style={{ fontSize: 14, color: 'var(--ink-soft)' }}>← Volver al inicio</a>
    </header>

    {/* LEFT — Form */}
    <section style={authShared.panel}>
      <div style={{ maxWidth: 420, width: '100%', marginLeft: 'auto', marginRight: 'auto' }}>
        <div style={{
          display: 'inline-flex', alignItems: 'center', gap: 6,
          padding: '6px 12px', borderRadius: 999,
          background: 'var(--blue-50)', color: 'var(--blue-600)',
          fontSize: 12, fontWeight: 500, letterSpacing: '0.02em'
        }}>
          <span style={{ width: 6, height: 6, borderRadius: '50%', background: 'var(--blue-400)' }}></span>
          Bienvenido de nuevo
        </div>
        <h1 style={{ fontSize: 44, fontWeight: 600, letterSpacing: '-0.025em', lineHeight: 1.05, margin: '16px 0 10px' }}>
          Iniciá sesión<br />en tu cuenta.
        </h1>
        <p style={{ fontSize: 16, color: 'var(--ink-soft)', margin: 0, lineHeight: 1.55 }}>
          Volvé a entrar para gestionar tus turnos y revisar tu historial.
        </p>

        <div style={{ marginTop: 32, display: 'flex', flexDirection: 'column', gap: 16 }}>
          <Input
            label="Correo electrónico"
            type="email"
            placeholder="tucorreo@gmail.com"
            value="rodrigo@brizu.com"
            leftIcon={<MailIcon />}
            focused />
          <div>
            <Input
              label="Contraseña"
              type="password"
              placeholder="••••••••"
              value="••••••••••"
              leftIcon={<LockIcon />}
              rightSlot={
                <button style={{
                  background: 'transparent', border: 'none',
                  color: 'var(--ink-mute)', cursor: 'pointer',
                  padding: '6px 8px', borderRadius: 6,
                  display: 'inline-flex', alignItems: 'center', gap: 6,
                  fontSize: 12
                }}>
                  <EyeIcon /> ver
                </button>
              } />
            <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginTop: 10 }}>
              <label style={{ display: 'flex', alignItems: 'center', gap: 8, fontSize: 13, color: 'var(--ink-soft)' }}>
                <span style={{
                  width: 18, height: 18, borderRadius: 5,
                  border: '1.5px solid var(--rule)', background: 'var(--paper)',
                  display: 'inline-block'
                }}></span>
                Recordarme
              </label>
              <a style={{ fontSize: 13, color: 'var(--blue-600)', fontWeight: 500, textDecoration: 'underline', textUnderlineOffset: 3 }}>
                ¿Olvidaste tu contraseña?
              </a>
            </div>
          </div>

          <button style={{ ...authShared.cta, marginTop: 8 }}>
            Iniciar sesión
            <span>→</span>
          </button>
        </div>

        {/* Divider */}
        <div style={{ display: 'flex', alignItems: 'center', gap: 14, margin: '28px 0 20px' }}>
          <div style={{ flex: 1, height: 1, background: 'var(--rule)' }}></div>
          <div style={{ fontSize: 12, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.12em' }}>o</div>
          <div style={{ flex: 1, height: 1, background: 'var(--rule)' }}></div>
        </div>

        {/* Register CTA card */}
        <div style={{
          padding: '18px 20px',
          borderRadius: 14,
          background: 'var(--paper-2)',
          border: '1px solid var(--rule)',
          display: 'flex',
          alignItems: 'center',
          justifyContent: 'space-between',
          gap: 14
        }}>
          <div>
            <div style={{ fontSize: 14, fontWeight: 600 }}>¿No tenés cuenta?</div>
            <div style={{ fontSize: 13, color: 'var(--ink-mute)', marginTop: 2 }}>Registrate y reservá un turno.</div>
          </div>
          <button style={{
            padding: '11px 18px',
            background: 'var(--paper)',
            color: 'var(--ink)',
            border: '1.5px solid var(--ink)',
            borderRadius: 10,
            fontSize: 14,
            fontWeight: 600,
            cursor: 'pointer'
          }}>
            Registrarme
          </button>
        </div>

        <div style={{ marginTop: 36, fontSize: 12, color: 'var(--ink-mute)', textAlign: 'center' }}>
          Al iniciar sesión aceptás nuestros términos y política de privacidad.
        </div>
      </div>
    </section>

    {/* RIGHT — Brand */}
    <BrandPanel
      quote={<>El corte que <em style={{ fontStyle: 'italic', color: 'var(--blue-600)' }}>estabas esperando.</em></>}
      subline="Reservá en menos de un minuto. Sin llamadas, sin idas y vueltas por WhatsApp." />
  </div>
);

/* ---------- REGISTER ---------- */
const Register = () => (
  <div style={authShared.page}>
    <header style={authShared.nav}>
      <div style={authShared.logo}>
        <div style={authShared.logoMark}>BB</div>
        <div style={authShared.logoText}>Barber Brizu</div>
      </div>
      <a style={{ fontSize: 14, color: 'var(--ink-soft)' }}>← Volver al inicio</a>
    </header>

    {/* LEFT — Form */}
    <section style={{ ...authShared.panel, padding: '110px 64px 56px' }}>
      <div style={{ maxWidth: 460, width: '100%', marginLeft: 'auto', marginRight: 'auto' }}>
        <div style={{
          display: 'inline-flex', alignItems: 'center', gap: 6,
          padding: '6px 12px', borderRadius: 999,
          background: 'oklch(96% 0.04 85)', color: 'oklch(48% 0.1 80)',
          fontSize: 12, fontWeight: 500, letterSpacing: '0.02em'
        }}>
          <span style={{ width: 6, height: 6, borderRadius: '50%', background: 'var(--gold)' }}></span>
          Crear cuenta
        </div>
        <h1 style={{ fontSize: 40, fontWeight: 600, letterSpacing: '-0.025em', lineHeight: 1.05, margin: '16px 0 10px' }}>
          Reservá tu primer turno<br />en un minuto.
        </h1>
        <p style={{ fontSize: 16, color: 'var(--ink-soft)', margin: 0, lineHeight: 1.55 }}>
          Creá tu cuenta y vas a poder reservar, ver tus turnos y consultar tu historial.
        </p>

        <div style={{ marginTop: 28, display: 'flex', flexDirection: 'column', gap: 14 }}>
          {/* Nombre + Apellido en una fila */}
          <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 12 }}>
            <Input label="Nombre" placeholder="Rodrigo" leftIcon={<UserIcon />} />
            <Input label="Apellido" placeholder="Brizuela" leftIcon={<UserIcon />} />
          </div>
          {/* Teléfono + Fecha de nacimiento */}
          <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 12 }}>
            <Input label="Teléfono" placeholder="+54 9 370 ..." leftIcon={<PhoneIcon />} />
            <Input label="Fecha de nacimiento" placeholder="dd / mm / aaaa" leftIcon={<CalIcon />} />
          </div>
          <Input
            label="Correo electrónico"
            type="email"
            placeholder="tucorreo@gmail.com"
            leftIcon={<MailIcon />} />
          <Input
            label="Contraseña"
            type="password"
            placeholder="Mínimo 8 caracteres"
            leftIcon={<LockIcon />}
            rightSlot={
              <button style={{
                background: 'transparent', border: 'none',
                color: 'var(--ink-mute)', cursor: 'pointer',
                padding: '6px 8px', borderRadius: 6,
                display: 'inline-flex', alignItems: 'center', gap: 6,
                fontSize: 12
              }}>
                <EyeIcon /> ver
              </button>
            } />

          {/* Password strength hint */}
          <div style={{ display: 'flex', alignItems: 'center', gap: 6, marginTop: -4 }}>
            {['var(--blue-600)', 'var(--blue-600)', 'var(--gold)', 'var(--rule)'].map((c, i) => (
              <div key={i} style={{ flex: 1, height: 4, borderRadius: 2, background: c }}></div>
            ))}
            <span style={{ fontSize: 12, color: 'var(--ink-mute)', marginLeft: 6 }}>Fuerza media</span>
          </div>

          <label style={{ display: 'flex', alignItems: 'flex-start', gap: 10, fontSize: 13, color: 'var(--ink-soft)', marginTop: 6, lineHeight: 1.5 }}>
            <span style={{
              width: 18, height: 18, borderRadius: 5,
              border: '1.5px solid var(--blue-600)', background: 'var(--blue-600)',
              display: 'grid', placeItems: 'center',
              flexShrink: 0,
              marginTop: 1
            }}>
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="white" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round">
                <polyline points="20 6 9 17 4 12" />
              </svg>
            </span>
            <span>
              Acepto los <a style={{ color: 'var(--ink)', textDecoration: 'underline', textUnderlineOffset: 3 }}>términos</a> y la <a style={{ color: 'var(--ink)', textDecoration: 'underline', textUnderlineOffset: 3 }}>política de privacidad</a>.
            </span>
          </label>

          <button style={{ ...authShared.cta, marginTop: 8 }}>
            Crear cuenta
            <span>→</span>
          </button>
        </div>

        <div style={{
          marginTop: 24,
          padding: '14px 18px',
          borderRadius: 12,
          background: 'var(--paper-2)',
          border: '1px solid var(--rule)',
          display: 'flex',
          alignItems: 'center',
          justifyContent: 'space-between',
          gap: 14
        }}>
          <div style={{ fontSize: 14, color: 'var(--ink-soft)' }}>
            <span style={{ fontWeight: 600, color: 'var(--ink)' }}>¿Ya tenés cuenta?</span> Iniciá sesión.
          </div>
          <a style={{
            fontSize: 14,
            color: 'var(--blue-600)',
            fontWeight: 600,
            textDecoration: 'underline',
            textUnderlineOffset: 3
          }}>
            Iniciar sesión →
          </a>
        </div>
      </div>
    </section>

    {/* RIGHT — Brand */}
    <BrandPanel
      quote={<>Tu primera <em style={{ fontStyle: 'italic', color: 'var(--blue-600)' }}>visita</em> empieza acá.</>}
      subline="Creá tu cuenta una vez y reservá todas las veces que quieras, en un toque." />
  </div>
);

window.Login = Login;
window.Register = Register;

/* ---------- MOBILE VERSIONS (for iPhone frame) ---------- */
const mobileShared = {
  page: {
    width: '100%',
    height: '100%',
    background: 'var(--paper)',
    color: 'var(--ink)',
    fontFamily: '"Outfit", -apple-system, sans-serif',
    display: 'flex',
    flexDirection: 'column',
    overflow: 'hidden',
    paddingTop: 8
  },
  header: {
    padding: '8px 20px 0',
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'space-between'
  },
  logo: { display: 'flex', alignItems: 'center', gap: 8 },
  logoMark: {
    width: 32, height: 32, borderRadius: 9,
    background: 'var(--blue-600)', color: 'var(--paper)',
    display: 'grid', placeItems: 'center',
    fontWeight: 700, fontSize: 12
  },
  cta: {
    width: '100%',
    padding: '14px 18px',
    background: 'var(--gold)',
    color: 'var(--ink)',
    borderRadius: 12,
    fontSize: 15,
    fontWeight: 700,
    border: 'none',
    cursor: 'pointer',
    display: 'inline-flex',
    alignItems: 'center',
    justifyContent: 'center',
    gap: 8,
    boxShadow: '0 6px 18px -8px oklch(60% 0.14 80 / 0.5)'
  }
};

const MobileInput = ({ label, type = 'text', placeholder, value, leftIcon, rightSlot, focused = false }) => (
  <div style={{ display: 'flex', flexDirection: 'column', gap: 5 }}>
    <label style={{ fontSize: 11, fontWeight: 500, color: 'var(--ink-soft)', letterSpacing: '0.02em' }}>{label}</label>
    <div style={{ position: 'relative', display: 'flex', alignItems: 'center' }}>
      {leftIcon && (
        <span style={{ position: 'absolute', left: 12, color: 'var(--ink-mute)', display: 'grid', placeItems: 'center', pointerEvents: 'none' }}>
          {leftIcon}
        </span>
      )}
      <input
        type={type}
        defaultValue={value}
        placeholder={placeholder}
        style={{
          width: '100%',
          padding: '11px 14px',
          paddingLeft: leftIcon ? 38 : 14,
          paddingRight: rightSlot ? 70 : 14,
          fontSize: 14,
          fontFamily: 'inherit',
          background: 'var(--paper)',
          border: focused ? '1.5px solid var(--blue-600)' : '1.5px solid var(--rule)',
          borderRadius: 10,
          color: 'var(--ink)',
          outline: 'none',
          boxShadow: focused ? '0 0 0 3px oklch(91% 0.045 240)' : 'none'
        }} />
      {rightSlot && <span style={{ position: 'absolute', right: 10 }}>{rightSlot}</span>}
    </div>
  </div>
);

const LoginMobile = () => (
  <div style={mobileShared.page}>
    <header style={mobileShared.header}>
      <div style={mobileShared.logo}>
        <div style={mobileShared.logoMark}>BB</div>
        <div style={{ fontWeight: 600, fontSize: 14 }}>Barber Brizu</div>
      </div>
      <span style={{ fontSize: 12, color: 'var(--ink-mute)' }}>✕</span>
    </header>

    <div style={{ flex: 1, padding: '32px 20px 20px', overflow: 'hidden', display: 'flex', flexDirection: 'column' }}>
      <div style={{
        display: 'inline-flex', alignItems: 'center', alignSelf: 'flex-start',
        gap: 6, padding: '5px 10px', borderRadius: 999,
        background: 'var(--blue-50)', color: 'var(--blue-600)',
        fontSize: 11, fontWeight: 500
      }}>
        <span style={{ width: 5, height: 5, borderRadius: '50%', background: 'var(--blue-400)' }}></span>
        Bienvenido de nuevo
      </div>
      <h1 style={{ fontSize: 30, fontWeight: 600, letterSpacing: '-0.025em', lineHeight: 1.05, margin: '14px 0 6px' }}>
        Iniciá sesión.
      </h1>
      <p style={{ fontSize: 14, color: 'var(--ink-soft)', margin: 0, lineHeight: 1.5 }}>
        Volvé a entrar para gestionar tus turnos.
      </p>

      <div style={{ marginTop: 22, display: 'flex', flexDirection: 'column', gap: 12 }}>
        <MobileInput
          label="Correo electrónico"
          type="email"
          placeholder="tucorreo@gmail.com"
          value="rodrigo@brizu.com"
          leftIcon={<MailIcon />}
          focused />
        <MobileInput
          label="Contraseña"
          type="password"
          placeholder="••••••••"
          value="••••••••••"
          leftIcon={<LockIcon />}
          rightSlot={
            <button style={{ background: 'transparent', border: 'none', color: 'var(--ink-mute)', cursor: 'pointer', padding: '4px 6px', display: 'inline-flex', alignItems: 'center', gap: 4, fontSize: 11 }}>
              <EyeIcon /> ver
            </button>
          } />
        <div style={{ display: 'flex', justifyContent: 'flex-end', marginTop: -4 }}>
          <a style={{ fontSize: 13, color: 'var(--blue-600)', fontWeight: 500 }}>¿Olvidaste tu contraseña?</a>
        </div>

        <button style={{ ...mobileShared.cta, marginTop: 8 }}>
          Iniciar sesión
          <span>→</span>
        </button>
      </div>

      <div style={{ display: 'flex', alignItems: 'center', gap: 12, margin: '24px 0 16px' }}>
        <div style={{ flex: 1, height: 1, background: 'var(--rule)' }}></div>
        <div style={{ fontSize: 11, color: 'var(--ink-mute)', textTransform: 'uppercase', letterSpacing: '0.12em' }}>o</div>
        <div style={{ flex: 1, height: 1, background: 'var(--rule)' }}></div>
      </div>

      <div style={{
        padding: '14px 16px',
        borderRadius: 12,
        background: 'var(--paper-2)',
        border: '1px solid var(--rule)',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'space-between',
        gap: 10
      }}>
        <div>
          <div style={{ fontSize: 13, fontWeight: 600 }}>¿No tenés cuenta?</div>
          <div style={{ fontSize: 12, color: 'var(--ink-mute)', marginTop: 2 }}>Registrate y reservá un turno.</div>
        </div>
        <button style={{
          padding: '9px 14px',
          background: 'var(--paper)',
          color: 'var(--ink)',
          border: '1.5px solid var(--ink)',
          borderRadius: 10,
          fontSize: 13,
          fontWeight: 600,
          cursor: 'pointer',
          whiteSpace: 'nowrap'
        }}>
          Registrarme
        </button>
      </div>
    </div>
  </div>
);

const RegisterMobile = () => (
  <div style={mobileShared.page}>
    <header style={mobileShared.header}>
      <div style={mobileShared.logo}>
        <div style={mobileShared.logoMark}>BB</div>
        <div style={{ fontWeight: 600, fontSize: 14 }}>Barber Brizu</div>
      </div>
      <span style={{ fontSize: 12, color: 'var(--ink-mute)' }}>✕</span>
    </header>

    <div style={{ flex: 1, padding: '24px 20px 16px', overflow: 'hidden', display: 'flex', flexDirection: 'column' }}>
      <div style={{
        display: 'inline-flex', alignItems: 'center', alignSelf: 'flex-start',
        gap: 6, padding: '5px 10px', borderRadius: 999,
        background: 'oklch(96% 0.04 85)', color: 'oklch(48% 0.1 80)',
        fontSize: 11, fontWeight: 500
      }}>
        <span style={{ width: 5, height: 5, borderRadius: '50%', background: 'var(--gold)' }}></span>
        Crear cuenta
      </div>
      <h1 style={{ fontSize: 26, fontWeight: 600, letterSpacing: '-0.025em', lineHeight: 1.05, margin: '12px 0 4px' }}>
        Reservá tu primer turno.
      </h1>
      <p style={{ fontSize: 13, color: 'var(--ink-soft)', margin: 0, lineHeight: 1.5 }}>
        Creá tu cuenta y reservá en un toque.
      </p>

      <div style={{ marginTop: 16, display: 'flex', flexDirection: 'column', gap: 10 }}>
        <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 8 }}>
          <MobileInput label="Nombre" placeholder="Rodrigo" leftIcon={<UserIcon />} />
          <MobileInput label="Apellido" placeholder="Brizuela" leftIcon={<UserIcon />} />
        </div>
        <MobileInput label="Teléfono" placeholder="+54 9 370 ..." leftIcon={<PhoneIcon />} />
        <MobileInput label="Fecha de nacimiento" placeholder="dd / mm / aaaa" leftIcon={<CalIcon />} />
        <MobileInput label="Correo electrónico" type="email" placeholder="tucorreo@gmail.com" leftIcon={<MailIcon />} />
        <MobileInput
          label="Contraseña"
          type="password"
          placeholder="Mín. 8 caracteres"
          leftIcon={<LockIcon />}
          rightSlot={
            <button style={{ background: 'transparent', border: 'none', color: 'var(--ink-mute)', cursor: 'pointer', padding: '4px 6px', display: 'inline-flex', alignItems: 'center', gap: 4, fontSize: 11 }}>
              <EyeIcon /> ver
            </button>
          } />

        <label style={{ display: 'flex', alignItems: 'flex-start', gap: 8, fontSize: 12, color: 'var(--ink-soft)', marginTop: 4, lineHeight: 1.4 }}>
          <span style={{
            width: 16, height: 16, borderRadius: 4,
            border: '1.5px solid var(--blue-600)', background: 'var(--blue-600)',
            display: 'grid', placeItems: 'center', flexShrink: 0, marginTop: 1
          }}>
            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round">
              <polyline points="20 6 9 17 4 12" />
            </svg>
          </span>
          <span>
            Acepto los <span style={{ color: 'var(--ink)', textDecoration: 'underline' }}>términos</span> y la <span style={{ color: 'var(--ink)', textDecoration: 'underline' }}>política de privacidad</span>.
          </span>
        </label>

        <button style={{ ...mobileShared.cta, marginTop: 4 }}>
          Crear cuenta
          <span>→</span>
        </button>

        <div style={{ textAlign: 'center', fontSize: 13, color: 'var(--ink-soft)', marginTop: 4 }}>
          ¿Ya tenés cuenta? <a style={{ color: 'var(--blue-600)', fontWeight: 600, textDecoration: 'underline' }}>Iniciar sesión</a>
        </div>
      </div>
    </div>
  </div>
);

window.LoginMobile = LoginMobile;
window.RegisterMobile = RegisterMobile;
