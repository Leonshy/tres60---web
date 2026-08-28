# PLAN.md — Build de la landing de Tres Sesenta

Plan ejecutable para Claude Code. Leer `CLAUDE.md` primero.
Estimación total: **12–18 horas** de un desarrollador senior con asistencia de IA.

Regla de ejecución: **una fase por vez, y no se pasa a la siguiente sin cumplir el criterio
de aceptación**. Al terminar cada fase, commit con el mensaje indicado.

---

## Fase 0 — Andamiaje (1 h)

1. `composer create-project laravel/laravel .` (última estable).
2. Confirmar la versión de PHP del Plesk destino y fijar `"php": "^8.3"` en `composer.json`.
   Si el Plesk tiene menos, **parar y avisar** antes de seguir.
3. Instalar y configurar Tailwind CSS v4 con Vite.
4. `npm i alpinejs @fontsource/nunito @fontsource/inter`.
5. `config/tres360.php` con el bloque de datos de `CLAUDE.md` §4.2.
6. `.env.example` completo: `APP_LOCALE=es`, `APP_FALLBACK_LOCALE=es`, bloque `MAIL_*`,
   `TRES360_LEAD_TO`, `TRES360_TURNSTILE_ENABLED=false`.
7. Copiar los assets de marca del kit a `public/img/` y los favicons a `public/`.
8. Borrar todo el andamiaje que no se usa: vista `welcome`, rutas de auth si aparecen.

**Aceptación:** `php artisan serve` levanta, `npm run dev` compila, y una vista vacía con
las fuentes cargadas se ve en el navegador.
**Commit:** `chore: andamiaje Laravel + Tailwind v4 + fuentes autohospedadas`

---

## Fase 1 — Sistema de diseño (2 h)

1. `resources/css/app.css`: bloque `@theme` con la paleta de `CLAUDE.md` §3.1, imports de
   `@fontsource` (sólo los pesos listados), y las utilidades propias
   (`.contenedor`, `.seccion`, `.sombra-marca`, `.reveal`).
2. Escala tipográfica con `clamp()` según §3.3.
3. Componentes Blade base:
   - `<x-boton variante="primario|secundario|oscuro" href="" />` — píldora, estados hover,
     focus visible (anillo de 2px en `ink`, offset 2px), y tamaño mínimo táctil de 44px.
   - `<x-encabezado-seccion antetitulo="" titulo="" bajada="" />`
4. `resources/js/app.js`: Alpine, directiva/observer de `reveal`, y el estado del header al
   scrollear. Todo respetando `prefers-reduced-motion`.
5. `layouts/app.blade.php`: `<html lang="es-PY">`, meta viewport, favicons, `@vite`,
   bloque de SEO (title, description, OG, Twitter, canonical) y el JSON-LD
   `RealEstateAgent`.

**Aceptación:** una página de prueba muestra los tres botones, los dos encabezados y un
elemento con reveal funcionando; con `prefers-reduced-motion: reduce` activado en DevTools
todo aparece estático y visible.
**Commit:** `feat: sistema de diseño, layout base y SEO`

---

## Fase 2 — Header, hero y footer (3 h)

1. **Header** (`partials/header.blade.php`): logotipo blanco a la izquierda (altura 32px
   móvil / 38px desktop, con `width`/`height` explícitos), anclas
   *Beneficios · Servicio · Contacto* en desktop, CTA "Hablar con un asesor" (WhatsApp) a la
   derecha. En móvil: logo + botón hamburguesa que abre un panel a pantalla completa con las
   anclas y los dos CTA. Cerrar con `Esc` y con clic afuera; trampa de foco mientras está
   abierto. Sticky, transparente arriba, `ink-deep` con `backdrop-blur` pasados 40px.
2. **Hero** (`#inicio`, fondo `ink-deep`, `min-height` ~88vh en desktop y contenido con aire
   en móvil):
   - Antetítulo en píldora con borde `line-dark`: **Una marca de METRIKA SA**
   - h1: **Administración integral de departamentos. Tú disfrutas de tu inversión, nosotros
     del resto.** — la segunda oración en `brand`, para partir el bloque y darle el golpe de
     color.
   - Subtítulo (`ink-onDark`, `max-w-[58ch]`): el párrafo del legajo §4.
   - Dos CTA: *Quiero rentabilizar mi propiedad* (primario amarillo, ancla `#contacto`) y
     *Hablar con un asesor* (secundario, borde claro, abre WhatsApp). Apilados y a ancho
     completo en móvil.
   - Marca de agua: el lazo del infinito como SVG inline, gigante, `opacity .06`, en
     `brand`, anclado abajo a la derecha y desbordado. `aria-hidden="true"`.
     **Ocultar en móvil** si compromete la legibilidad.
3. **Footer** (`ink-deep`): logotipo amarillo, columna de contacto con dirección, teléfono
   (`tel:`), WhatsApp y correo (`mailto:`) — todos enlaces reales —, y línea legal
   `© {año} Tres Sesenta · Una marca de METRIKA SA · Asunción, Paraguay`. Crédito de
   webparaguay discreto si corresponde.

**Aceptación:** hero impecable en 360px, 768px, 1280px y 1920px. Sin scroll horizontal en
ningún ancho. El menú móvil se abre, se cierra con `Esc` y se navega con teclado.
**Commit:** `feat: header, hero y footer`

---

## Fase 3 — Beneficios y Servicio 360 (3 h)

1. **Beneficios** (`#beneficios`, fondo blanco): encabezado de sección + grilla `1/2/4` con
   las cuatro tarjetas del legajo §4. Cada tarjeta: ícono en un cuadrado `rounded-2xl` con
   fondo `brand` y el ícono en `ink`, título Nunito 700, texto `ink-muted`. Borde `line`,
   hover que sube la sombra y tiñe el borde de `brand`.
2. **Servicio 360** (`#servicio`, fondo `cream`): cuatro bloques numerados `01`–`04` en
   grilla `1/2`. El número grande en `brand` con `-webkit-text-stroke` de 1px en `ink` para
   que no se pierda sobre el crema (o directamente en `ink` a `opacity .18` — probar las dos
   y quedarse con la que se lee mejor). Bajo el bloque de Comercialización, la fila de
   píldoras de plataformas: *Airbnb · Booking · Alquiler temporario · Corporativo*.
3. Reveal con stagger en ambas grillas.

**Aceptación:** el copy coincide **carácter por carácter** con `LEGAJO-TECNICO.md` §4.
Las cuatro tarjetas quedan a la misma altura en cada breakpoint.
**Commit:** `feat: secciones de beneficios y servicio 360`

---

## Fase 4 — Formulario, backend y correo (4 h)

1. Migración y modelo `Lead` según `CLAUDE.md` §5.
2. `StoreLeadRequest` con las reglas y los mensajes en español.
3. `LeadController@store`: honeypot → timestamp firmado → guardar → intentar el correo en
   `try/catch` → `redirect()->back()->with('ok', true)` con ancla a `#contacto`.
4. `NuevoLead` Mailable + `emails/nuevo-lead.blade.php`. Asunto
   `Nuevo lead 360 — {nombre} ({telefono})`, `replyTo` si dejó correo, cuerpo simple y
   legible en el celular.
5. `partials/contacto.blade.php` (`#contacto`, **fondo `brand`**):
   - Frase de cierre en h2 `ink-deep`: *Protege tu inversión inmobiliaria con los que saben.
     Deja la gestión diaria en manos de 360 by METRIKA SA.*
   - Tarjeta blanca `rounded-2xl` con el formulario: Nombre · Teléfono · Ubicación del
     departamento · Correo (opcional). Labels **visibles** (nada de sólo placeholder),
     `autocomplete` correcto (`name`, `tel`, `email`), `inputmode="tel"` en el teléfono.
   - Botón **Solicitar una propuesta a medida**, ancho completo, oscuro (`ink-deep`) para
     contrastar sobre el amarillo.
   - Estado de éxito reemplazando el formulario, con `role="status"` y `aria-live="polite"`.
   - Errores por campo bajo el input, en rojo oscuro accesible sobre blanco, con
     `aria-describedby`.
   - Bajo el botón, una línea: *También podés escribirnos directo por WhatsApp* con enlace.
6. Ruta `POST /contacto` con `throttle:5,1` y nombre `leads.store`.
7. `resources/lang/es/validation.php`.

**Aceptación:** envío válido → registro en `leads` + correo en el log de Mailpit/`log` +
mensaje de éxito. Envío inválido → errores en español sin perder lo tipeado. Honeypot lleno
→ **no** se crea registro pero el usuario ve éxito. Sexto envío en un minuto → 429.
**Commit:** `feat: formulario de contacto con persistencia y notificación por correo`

---

## Fase 5 — WhatsApp, pulido y responsive (2 h)

1. **FAB de WhatsApp** abajo a la derecha (`bottom-5 right-5`, `bottom-6 right-6` en
   desktop): círculo verde WhatsApp `#25D366`, ícono blanco, sombra, 56px, `aria-label`
   descriptivo, `target="_blank" rel="noopener"`. Aparece con fade pasado el hero. Que **no
   tape** el botón del formulario en móvil: cuando `#contacto` está en viewport, bajarle la
   opacidad o desplazarlo.
2. Repaso completo en 360 / 390 / 768 / 1024 / 1440 / 1920 px.
3. Imágenes: `width`/`height` explícitos, `loading="lazy"` salvo el logo del header,
   `decoding="async"`. Generar la `og-image` 1200×630 (fondo `brand`, logotipo `ink`
   centrado) y ponerla en `public/img/`.
4. `robots.txt` y `sitemap.xml`.
5. Limpieza: sin `console.log`, sin CSS muerto, `.env.example` al día, `README.md` de tres
   párrafos con cómo levantar el proyecto y cómo desplegarlo.

**Aceptación:** cero scroll horizontal, cero errores en consola, cero warnings de Vite.
**Commit:** `feat: FAB de WhatsApp, metadatos sociales y pulido responsive`

---

## Fase 6 — Tests, auditoría y despliegue (2–3 h)

1. Pest — `tests/Feature`:
   - la home responde 200 y contiene el h1;
   - POST válido crea `Lead` y encola `NuevoLead` (`Mail::fake()`);
   - POST inválido devuelve errores de validación;
   - honeypot lleno no crea `Lead` y devuelve redirect de éxito;
   - el rate limit corta al sexto envío.
2. Lighthouse móvil y desktop: Performance ≥ 95, el resto en 100. Adjuntar los números al
   cierre.
3. Recorrido de accesibilidad con teclado de punta a punta + revisión de foco visible.
4. Auditoría con **strix** contra el sitio ya desplegado en staging. Cero hallazgos
   Críticos/Altos antes de producción.
5. Despliegue siguiendo `CLAUDE.md` §9. **Probar un envío real del formulario desde el
   dominio en producción y confirmar que el correo llega a la casilla de Milena.**
6. Entregar: URL, credenciales, y una nota de una carilla con qué se construyó y qué datos
   siguen pendientes (los de `CLAUDE.md` §10).

**Aceptación:** todo verde, correo real recibido, y el cliente confirmando que ve el correo.
**Commit:** `test: suite Pest + ajustes de auditoría` y tag `v1.0.0`

---

## Fuera de alcance (no construir sin nuevo legajo)

Panel de administración · catálogo o buscador de propiedades · calculadora de rentabilidad ·
área privada de propietarios · reportes en línea · blog · multiidioma · integración con
Airbnb o Booking · chat en vivo · pasarela de pagos · más páginas.

Si el cliente pide algo de esta lista durante el build: **no se hace, se cotiza aparte.**

---

## Orden de prioridad si hay que recortar

Si el tiempo aprieta, se sacrifica en este orden (de lo primero que se cae a lo último):

1. El comando `tres360:leads`
2. La `og-image` a medida (se usa el logo sobre amarillo, generado)
3. El reveal on scroll (el sitio queda estático y funciona igual)
4. La marca de agua del infinito en el hero

**Nunca** se recorta: la accesibilidad, el guardado del lead en base, el responsive móvil,
ni la prueba real de envío de correo.
