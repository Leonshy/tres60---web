# Kit de arranque — Landing Tres Sesenta

Todo lo necesario para que Claude Code construya el sitio sin volver a preguntar nada.

## Contenido

| Archivo | Para qué sirve |
|---|---|
| `LEGAJO-TECNICO.md` | El legajo en formato webparaguay. Visión, alcance, copy definitivo, esfuerzo, riesgos y KPIs. **Acá vive el copy aprobado** |
| `CLAUDE.md` | Contexto permanente del repo: stack, sistema de diseño, estructura, backend del formulario, convenciones y despliegue |
| `PLAN.md` | Siete fases con criterio de aceptación y mensaje de commit por fase |
| `assets/` | Logotipo en tres versiones, isotipo, favicons y og-image, listos para `public/` |

## Cómo usarlo

```bash
mkdir tres360 && cd tres360
git init
# copiar acá LEGAJO-TECNICO.md, CLAUDE.md, PLAN.md y assets/
claude
```

Y el primer prompt:

> Leé `CLAUDE.md`, `PLAN.md` y `LEGAJO-TECNICO.md`. Ejecutá la Fase 0 del plan y pará ahí
> para que revise antes de seguir.

Después, fase por fase. Recomendado revisar en el navegador al cerrar las fases 2, 3 y 4 —
son las que definen cómo se ve y si el formulario funciona.

## Assets

| Archivo | Uso |
|---|---|
| `logo-tres360-ink.png` | Logotipo oliva `#373C05`, fondo transparente — para fondos claros |
| `logo-tres360-blanco.png` | Logotipo blanco — header sobre el hero oscuro |
| `logo-tres360-amarillo.png` | Logotipo amarillo `#FFD905` — footer oscuro |
| `isotipo-ink.png` / `isotipo-amarillo.png` | Sólo la nube+infinito, para íconos y el gráfico del hero |
| `favicon.ico`, `favicon-512.png`, `apple-touch-icon.png` | Isotipo oliva sobre amarillo |
| `og-image.png` | 1200×630 para compartir en redes y WhatsApp |

Están recortados y recoloreados desde el PNG original del cliente. **Pedir el SVG y
sustituirlos** — el PNG alcanza para salir, pero el vector es lo correcto.

## Antes de publicar

Los nueve datos pendientes están en `CLAUDE.md` §10. Los dos que bloquean el lanzamiento:

1. La **ciudad** de la dirección (Barrio Boquerón — ¿Asunción?)
2. El **dominio definitivo** y quién administra el DNS
