/* AgendaPublica — overlay de solo lectura, 7 días a partir de hoy */
const AgendaPublica = ({ onClose }) => {
  const today = new Date();
  today.setHours(0, 0, 0, 0);

  const DAYS_ES   = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
  const MONTHS_ES = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

  const days = Array.from({ length: 7 }, (_, i) => {
    const d = new Date(today);
    d.setDate(today.getDate() + i);
    return d;
  });

  const BARBERS = [
    { id: 'rodrigo', name: 'Rodrigo', accent: 'var(--blue-600)',        soft: 'var(--blue-50)' },
    { id: 'lucas',   name: 'Lucas',   accent: 'oklch(35% 0.12 180)',    soft: 'oklch(93% 0.05 180)' },
    { id: 'matias',  name: 'Matías',  accent: 'oklch(36% 0.13 290)',    soft: 'oklch(93% 0.05 290)' },
    { id: 'diego',   name: 'Diego',   accent: 'oklch(52% 0.13 75)',     soft: 'oklch(92% 0.07 88)' },
  ];

  // Bi-hourly slots: 9–21 (6 franjas visibles)
  const DISPLAY_HOURS = [9, 11, 13, 15, 17, 19];

  // Datos mock deterministas por fecha/barbero/franja
  function mockOccupied(date, barberIdx, hourIdx) {
    const d   = date.getDate();
    const dow = date.getDay();
    const satBoost     = dow === 6 ? 2 : 0;   // sábados más ocupados
    const eveningBoost = hourIdx >= 4 ? 1 : 0; // tarde/noche más ocupada
    const seed = (d * 31 + barberIdx * 17 + hourIdx * 7 + dow * 5) % 10;
    return seed < (4 + satBoost + eveningBoost);
  }

  const isClosed = (d) => d.getDay() === 0; // domingos cerrado

  // Paleta verde independiente de variables del dashboard
  const CLR = {
    availBg:     'oklch(94% 0.06 145)',
    availBorder: 'oklch(65% 0.14 145)',
    availText:   'oklch(38% 0.13 145)',
    occBg:       'oklch(92% 0.004 240)',
    occBorder:   'oklch(86% 0.006 240)',
    occText:     'oklch(55% 0.01 240)',
  };

  return (
    <div
      onClick={onClose}
      style={{
        position: 'fixed', inset: 0, zIndex: 999,
        background: 'oklch(16% 0.01 240 / 0.52)',
        backdropFilter: 'blur(8px)',
        display: 'flex', alignItems: 'center', justifyContent: 'center',
        padding: 16,
      }}
    >
      <div
        onClick={(e) => e.stopPropagation()}
        style={{
          background: 'var(--paper)',
          border: '1px solid var(--rule)',
          borderRadius: 20,
          width: '100%', maxWidth: 920,
          maxHeight: '92vh',
          display: 'flex', flexDirection: 'column',
          boxShadow: '0 24px 64px oklch(16% 0.01 240 / 0.18)',
          overflow: 'hidden',
        }}
      >

        {/* ── HEADER ── */}
        <div style={{
          padding: '20px 24px 16px',
          borderBottom: '1px solid var(--rule)',
          display: 'flex', alignItems: 'flex-start', justifyContent: 'space-between',
          flexShrink: 0,
        }}>
          <div>
            <div style={{ fontSize: 17, fontWeight: 600, letterSpacing: '-0.01em' }}>
              Agenda de turnos
            </div>
            <div style={{ fontSize: 12, color: 'var(--ink-mute)', marginTop: 3 }}>
              Disponibilidad de los próximos 7 días · solo lectura
            </div>
          </div>
          <button
            onClick={onClose}
            style={{
              width: 30, height: 30, borderRadius: 8, flexShrink: 0,
              border: '1px solid var(--rule)', background: 'transparent',
              cursor: 'pointer', fontSize: 18, color: 'var(--ink-mute)',
              display: 'grid', placeItems: 'center', fontFamily: 'inherit',
              lineHeight: 1, marginLeft: 16,
            }}
          >×</button>
        </div>

        {/* ── REFERENCIA ── */}
        <div style={{
          padding: '10px 24px',
          borderBottom: '1px solid var(--rule)',
          display: 'flex', alignItems: 'center', gap: 20, flexShrink: 0,
          flexWrap: 'wrap',
        }}>
          {[
            { bg: CLR.availBg,  border: CLR.availBorder, text: CLR.availText, label: 'Disponible' },
            { bg: CLR.occBg,    border: CLR.occBorder,   text: CLR.occText,   label: 'Ocupado' },
            { bg: 'oklch(96.5% 0.003 240)', border: 'transparent', text: 'var(--ink-mute)', label: 'Sin atención' },
          ].map(({ bg, border, text, label }) => (
            <div key={label} style={{ display: 'flex', alignItems: 'center', gap: 6, fontSize: 12, color: 'var(--ink-soft)' }}>
              <div style={{
                width: 14, height: 14, borderRadius: 4, flexShrink: 0,
                background: bg,
                border: `1.5px solid ${border}`,
              }} />
              {label}
            </div>
          ))}
          <div style={{ marginLeft: 'auto', fontSize: 11, color: 'var(--ink-mute)' }}>
            Horarios: Lun–Sáb · 9:00–22:00
          </div>
        </div>

        {/* ── GRILLA 7 DÍAS ── */}
        <div style={{ overflowX: 'auto', overflowY: 'auto', flex: 1, padding: '16px 24px 24px' }}>
          <div style={{
            display: 'grid',
            gridTemplateColumns: 'repeat(7, 1fr)',
            gap: 8,
            minWidth: 700,
          }}>
            {days.map((d, di) => {
              const closed  = isClosed(d);
              const isToday = di === 0;

              return (
                <div
                  key={di}
                  style={{
                    borderRadius: 12,
                    border: isToday
                      ? '1.5px solid var(--blue-400)'
                      : '1px solid var(--rule)',
                    overflow: 'hidden',
                    background: closed ? 'oklch(97% 0.002 240)' : 'var(--paper)',
                  }}
                >
                  {/* Cabecera del día */}
                  <div style={{
                    padding: '9px 6px 8px',
                    textAlign: 'center',
                    background: isToday
                      ? 'var(--blue-50)'
                      : closed ? 'oklch(96% 0.002 240)' : 'var(--paper-2)',
                    borderBottom: '1px solid var(--rule)',
                  }}>
                    <div style={{
                      fontSize: 10, fontWeight: 700,
                      textTransform: 'uppercase', letterSpacing: '0.09em',
                      color: isToday ? 'var(--blue-600)' : closed ? 'var(--ink-mute)' : 'var(--ink-soft)',
                      display: 'flex', alignItems: 'center', justifyContent: 'center', gap: 4,
                    }}>
                      {DAYS_ES[d.getDay()]}
                      {isToday && (
                        <span style={{
                          background: 'var(--blue-600)', color: 'var(--paper)',
                          borderRadius: 3, padding: '1px 4px',
                          fontSize: 7, fontWeight: 800, letterSpacing: '0.12em',
                        }}>HOY</span>
                      )}
                    </div>
                    <div style={{
                      fontSize: 14, fontWeight: 600, marginTop: 2,
                      color: isToday ? 'var(--blue-600)' : closed ? 'var(--ink-mute)' : 'var(--ink)',
                    }}>
                      {d.getDate()}
                      <span style={{ fontWeight: 400, fontSize: 11, marginLeft: 3 }}>
                        {MONTHS_ES[d.getMonth()]}
                      </span>
                    </div>
                  </div>

                  {/* Contenido */}
                  {closed ? (
                    <div style={{
                      padding: '20px 8px 18px', textAlign: 'center',
                      color: 'var(--ink-mute)',
                    }}>
                      <div style={{
                        width: 28, height: 28, margin: '0 auto 8px',
                        borderRadius: '50%',
                        background: 'oklch(92% 0.004 240)',
                        display: 'grid', placeItems: 'center',
                        fontSize: 13, color: 'var(--ink-mute)',
                      }}>—</div>
                      <div style={{ fontSize: 11, fontWeight: 500 }}>Cerrado</div>
                    </div>
                  ) : (
                    <div style={{ padding: '8px 6px 10px', display: 'flex', flexDirection: 'column', gap: 8 }}>
                      {BARBERS.map((b, bi) => (
                        <div key={b.id}>
                          {/* Nombre del barbero */}
                          <div style={{
                            fontSize: 9, fontWeight: 700,
                            textTransform: 'uppercase', letterSpacing: '0.07em',
                            color: b.accent, marginBottom: 3, paddingLeft: 1,
                          }}>{b.name}</div>

                          {/* Slots */}
                          <div style={{
                            display: 'grid',
                            gridTemplateColumns: 'repeat(6, 1fr)',
                            gap: 2,
                          }}>
                            {DISPLAY_HOURS.map((h, hi) => {
                              const occ = mockOccupied(d, bi, hi);
                              return (
                                <div
                                  key={h}
                                  title={`${String(h).padStart(2,'0')}:00`}
                                  style={{
                                    height: 18,
                                    borderRadius: 3,
                                    background: occ ? CLR.occBg : CLR.availBg,
                                    border: `1px solid ${occ ? CLR.occBorder : CLR.availBorder}`,
                                    display: 'flex', alignItems: 'center', justifyContent: 'center',
                                    fontSize: 8, fontWeight: 600,
                                    color: occ ? CLR.occText : CLR.availText,
                                  }}
                                >{h}</div>
                              );
                            })}
                          </div>
                        </div>
                      ))}

                      {/* Separador inferior con leyenda de horas */}
                      <div style={{
                        marginTop: 4, paddingTop: 6,
                        borderTop: '1px solid var(--rule)',
                        display: 'grid', gridTemplateColumns: 'repeat(6, 1fr)',
                        gap: 2,
                      }}>
                        {DISPLAY_HOURS.map((h) => (
                          <div key={h} style={{
                            fontSize: 7, textAlign: 'center', color: 'var(--ink-mute)',
                          }}>{h}h</div>
                        ))}
                      </div>
                    </div>
                  )}
                </div>
              );
            })}
          </div>
        </div>

        {/* ── FOOTER ── */}
        <div style={{
          padding: '12px 24px',
          borderTop: '1px solid var(--rule)',
          display: 'flex', alignItems: 'center', justifyContent: 'space-between',
          flexShrink: 0,
          fontSize: 12, color: 'var(--ink-mute)',
        }}>
          <span>Para reservar un turno usá el botón "Sacar turno"</span>
          <button
            onClick={onClose}
            style={{
              padding: '8px 16px',
              border: '1px solid var(--rule)',
              borderRadius: 8, background: 'transparent',
              fontSize: 13, fontWeight: 500,
              color: 'var(--ink-soft)', cursor: 'pointer',
              fontFamily: 'inherit',
            }}
          >Cerrar</button>
        </div>

      </div>
    </div>
  );
};

window.AgendaPublica = AgendaPublica;
