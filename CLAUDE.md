# CLAUDE.md — Tres Sesenta (360 by METRIKA SA)

Contexto permanente del repo. Leer completo antes de escribir código.
Documentos hermanos: `PLAN.md` (fases de build) y `LEGAJO-TECNICO.md` (visión y alcance).

---

## 1. Qué estamos construyendo

Landing page **one-page** de presentación para **Tres Sesenta (360)**, la marca de
*property management* de **METRIKA SA**. Administran departamentos de terceros para renta
(corta y media estadía: Airbnb, Booking).

**El objetivo del sitio es uno solo: que un propietario de departamento deje sus datos o
escriba por WhatsApp.** Todo lo demás es soporte de esa conversión. No es un sitio
institucional, no hay blog, no hay panel, no hay catálogo de propiedades.

Alcance cerrado: una sola página, un formulario que envía correo y guarda el lead, y un
globo flotante de WhatsApp. Nada más entra sin cambiar el legajo.

---

## 2. Stack

| Capa | Decisión |
|---|---|
| Framework | **Laravel** (última estable que instale `composer create-project laravel/laravel`) |
| PHP | **8.3+** — confirmar la versión del Plesk destino antes de fijar `composer.json` |
| Vistas | **Blade** puro. Sin Livewire, sin Inertia, sin SPA |
| CSS | **Tailwind CSS v4** vía Vite |
| JS | **Alpine.js** — sólo menú móvil, reveal on scroll y estado del formulario. Nada más |
| Base de datos | **MySQL 8** — una sola tabla (`leads`) |
| Correo | SMTP del servidor de webparaguay |
| Tipografías | **Autohospedadas** vía `@fontsource` (sin llamadas a Google Fonts) |
| Despliegue | **Plesk** de webparaguay, document root en `public/` |

### Reglas de stack (no negociables)

- **Cero dependencias de terceros en el frontend en runtime.** Sin CDN de fuentes, sin
  jQuery, sin librerías de animación, sin Bootstrap. Todo lo que carga el navegador sale
  de nuestro servidor.
- **No instalar Livewire ni Filament.** Para un formulario de tres campos es peso muerto.
- Sin build de imágenes en runtime: los assets van optimizados al repo.
- El sitio tiene que renderizar y ser usable **con JavaScript deshabilitado**. Alpine mejora
  la experiencia; no la sostiene. El formulario es un POST clásico con `@error` y flash de
  sesión, no un fetch.

---

## 3. Marca y sistema de diseño

La marca es fuerte y simple: **amarillo saturado + verde oliva muy oscuro**, con un logotipo
de terminaciones redondeadas (nube + símbolo de infinito). La personalidad que tiene que
transmitir la web: **calidez con autoridad**. El público es un propietario que va a confiar
un activo caro a un tercero — no puede parecer una startup de fin de semana, pero tampoco
un banco.

### 3.1 Paleta

```css
/* resources/css/app.css — @theme de Tailwind v4 */
--color-brand:        #FFD905;  /* amarillo de marca */
--color-brand-600:    #E6C300;  /* hover de botones amarillos */
--color-ink:          #373C05;  /* verde oliva oscuro: texto y superficies */
--color-ink-deep:     #232703;  /* secciones oscuras, header sólido, footer */
--color-ink-muted:    #5E6330;  /* texto secundario sobre claro */
--color-ink-onDark:   #C9CBA8;  /* texto secundario sobre oscuro */
--color-cream:        #FBF9EF;  /* fondo alterno cálido */
--color-line:         #E4E1CE;  /* bordes y divisores sobre claro */
--color-line-dark:    #3A3F12;  /* bordes sobre oscuro */
```

Contrastes ya verificados (WCAG 2.1):

| Combinación | Ratio |
|---|---|
| `ink` sobre `brand` (amarillo) | 8.38:1 ✅ AAA |
| `ink` sobre blanco | 11.6:1 ✅ AAA |
| blanco sobre `ink-deep` | 15.4:1 ✅ AAA |
| `brand` sobre `ink-deep` | 11.1:1 ✅ AAA |
| `ink-muted` sobre blanco | 6.36:1 ✅ AA |
| `ink-onDark` sobre `ink-deep` | 9.24:1 ✅ AAA |

**Nunca** poner texto blanco sobre amarillo (1.4:1). Sobre amarillo va siempre `ink` o
`ink-deep`.

### 3.2 Uso del color

El error a evitar es bañar la página de amarillo. El amarillo es **acento y puntuación**,
no fondo general. Ritmo de fondos de arriba a abajo:

1. Header — transparente sobre el hero, y `ink-deep` con blur al hacer scroll
2. Hero — `ink-deep`
3. Beneficios — blanco
4. Servicio 360 — `cream`
5. Cierre + formulario — **`brand` (amarillo)** ← el único bloque amarillo grande, y es
   justo donde queremos que mire
6. Footer — `ink-deep`

Así el amarillo aparece dos veces con fuerza: en los CTA del hero y en el bloque de
conversión. El ojo va donde queremos.

### 3.3 Tipografía

| Rol | Familia | Por qué |
|---|---|---|
| Display / títulos | **Nunito** (600, 700, 800) | Es lo más cercano libre al logotipo: geométrica de terminaciones redondeadas |
| Texto | **Inter** (400, 500, 600) | Neutra, altísima legibilidad en móvil |

Instalar con `npm i @fontsource/nunito @fontsource/inter` e importar sólo los pesos usados
desde `resources/css/app.css`. `font-display: swap`.

> Si más adelante aparece el manual de marca de METRIKA y define otra tipografía, se
> reemplaza Nunito. Registrar el cambio acá.

Escala (`clamp()`, móvil → desktop):

```
h1 / hero       clamp(2.25rem, 6vw, 4.25rem)   Nunito 800, tracking -0.02em, leading 1.05
h2 / sección    clamp(1.75rem, 3.6vw, 2.75rem) Nunito 700, tracking -0.01em, leading 1.15
h3 / tarjeta    1.25rem                        Nunito 700
Antetítulo      0.8125rem                      Inter 600, uppercase, tracking 0.14em
Cuerpo          1.0625rem / 1.125rem desktop   Inter 400, leading 1.65
Cuerpo grande   clamp(1.0625rem, 1.6vw, 1.3rem) subtítulo del hero, leading 1.55
Micro / legal   0.875rem                       Inter 400
```

Ancho de medida: máximo **68 caracteres** en párrafos (`max-w-[62ch]`). Nada de párrafos
que crucen los 1280px.

### 3.4 Layout y espaciado

- Contenedor: `max-w-6xl` (1152px) con padding lateral `px-5 md:px-8`.
- Ritmo vertical de secciones: `py-20 md:py-28 lg:py-32`. Consistente, sin excepciones.
- Radios: `rounded-2xl` en tarjetas, `rounded-full` en botones y píldoras. La marca es
  redondeada; el layout tiene que acompañar.
- Sombras: muy sutiles y teñidas de oliva, no negras.
  `box-shadow: 0 1px 2px rgb(55 60 5 / .04), 0 12px 32px -12px rgb(55 60 5 / .12)`.
- Grillas: beneficios `1 → 2 (md) → 4 (lg)`. Servicio `1 → 2 (md)`.
- Breakpoints Tailwind por defecto. **Diseñar móvil primero**: el tráfico de este sitio va a
  llegar mayormente por WhatsApp e Instagram, o sea desde el celular.

### 3.5 Detalles de identidad (esto es lo que lo hace lindo)

Tres recursos gráficos, usados con moderación:

1. **El lazo del infinito como elemento gráfico.** Extraer el trazo del isotipo a un SVG
   inline y usarlo en grande, a muy baja opacidad (`opacity: .06`, color `brand`), como
   marca de agua desbordada del hero por la derecha. Es lo que le da personalidad al hero
   sin necesitar una fotografía.
2. **Numeración de los pasos del servicio**: `01 / 02 / 03 / 04` en Nunito 800, grandes,
   en amarillo sobre `cream`. Ordena la lectura y refuerza el "de principio a fin".
3. **Píldoras de plataforma** (Airbnb, Booking, etc.) como texto en cápsulas con borde
   `line`, sin logos de terceros — evitamos problemas de uso de marca ajena.

### 3.6 Motion

Discreto y rápido. La regla es que nadie note las animaciones, sólo que el sitio se sienta
prolijo.

- Reveal on scroll: `opacity 0 → 1` + `translateY(16px → 0)`, `500ms`,
  `cubic-bezier(.22,.61,.36,1)`, con stagger de `70ms` entre hermanos. Implementar con
  `IntersectionObserver` en un `x-data` de Alpine, una sola vez por elemento.
- Hover de botones: `translateY(-1px)` + cambio de fondo, `180ms`.
- Hover de tarjetas: elevar sombra y borde a `brand`, `200ms`. Sin escalados.
- Header: cambia a fondo sólido con `backdrop-blur` pasados los 40px de scroll.
- **`prefers-reduced-motion: reduce` desactiva todo**, incluido el reveal (los elementos
  arrancan visibles). Obligatorio, no opcional.
- Sin parallax, sin carruseles, sin contadores animados.

---

## 4. Estructura de la página

Una sola ruta `/`. Secciones en este orden, con estos `id` (los usa el nav por anclas):

| # | Sección | id | Fondo | Contenido |
|---|---|---|---|---|
| 1 | Header sticky | — | transparente → `ink-deep` | Logo claro · anclas · CTA "Hablar con un asesor" |
| 2 | Hero | `#inicio` | `ink-deep` | Antetítulo, h1, subtítulo, 2 CTA, marca de agua del infinito |
| 3 | Beneficios | `#beneficios` | blanco | 4 tarjetas con ícono |
| 4 | Servicio 360 | `#servicio` | `cream` | 4 bloques numerados 01–04 |
| 5 | Cierre + formulario | `#contacto` | `brand` | Frase de cierre + formulario de 3 campos |
| 6 | Footer | — | `ink-deep` | Logo, dirección, teléfono, WhatsApp, correo, legal |
| 7 | FAB de WhatsApp | — | flotante | Aparece pasado el hero |

**Íconos:** set único, línea, grosor 1.5, tomados de [Lucide](https://lucide.dev) copiados
como SVG inline (no instalar el paquete completo). Beneficios sugeridos: `shield-check`,
`trending-up`, `sparkles` (o `hand-heart`), `file-bar-chart`. Servicio: `megaphone`,
`message-circle`, `wrench`, `key-round`.

### 4.1 Textos (definitivos — no reescribir, no "mejorar")

El copy está aprobado. Copiar literal desde `LEGAJO-TECNICO.md` §4. Sólo se permite:
ajustar la puntuación de los títulos de tarjeta y decidir dónde corta una línea.

Dos apuntes:

- El CTA principal del hero es **"Quiero rentabilizar mi propiedad"** (ancla a `#contacto`).
  El secundario es **"Hablar con un asesor"** (abre WhatsApp).
- El botón del formulario es **"Solicitar una propuesta a medida"**.

### 4.2 Datos de contacto

Centralizados en `config/tres360.php`. **Nunca hardcodear un teléfono en un Blade.**

```php
return [
    'empresa'   => 'Tres Sesenta',
    'legal'     => 'METRIKA SA',
    'telefono'  => '(0975) 560037',
    'tel_e164'  => '+595975560037',       // para href="tel:" y wa.me
    'whatsapp'  => '595975560037',        // sin + para wa.me
    'email'     => 'milena@tres60.com.py',
    'direccion' => 'Pantaleón Aguirre c/ Florentín Oviedo, Barrio Boquerón',
    'ciudad'    => 'Asunción, Paraguay',   // ⚠️ CONFIRMAR con el cliente
    'wa_texto'  => 'Hola 360, quiero información sobre la administración de mi departamento.',
];
```

Enlace de WhatsApp: `https://wa.me/{whatsapp}?text={urlencode(wa_texto)}`.

---

## 5. Backend del formulario

Chiquito y a prueba de balas. Tres campos: **Nombre**, **Teléfono**, **Ubicación del
departamento**. Sumar **Correo** como campo opcional (cuesta nada y multiplica las vías de
respuesta).

### Flujo

`POST /contacto` → `StoreLeadRequest` (validación) → guardar `Lead` en MySQL → enviar
`NuevoLead` (Mailable) a `milena@tres60.com.py` → `redirect()->back()->with('ok', true)`
con ancla a `#contacto` → mensaje de éxito en el mismo lugar del formulario.

### Reglas

- **Guardar en base ANTES de enviar el correo**, y envolver el envío en `try/catch`. Si el
  SMTP falla, el lead ya está guardado y el usuario ve éxito. Loguear el fallo del correo.
  Perder un lead por un problema de correo es el peor error posible en este sitio.
- Validación: `nombre` requerido 2–80; `telefono` requerido 6–25 con regex permisiva
  (`/^[0-9+()\s.-]+$/`); `ubicacion` requerido 3–160; `email` opcional y válido.
- **Anti-spam en capas, sin captcha visible:**
  1. Honeypot: campo `empresa_web` oculto con CSS (no `type="hidden"`), tiene que llegar vacío.
  2. Timestamp firmado: si el formulario se envía en menos de 3 segundos desde que se
     renderizó, se descarta.
  3. `throttle:5,1` sobre la ruta.
  4. Cloudflare Turnstile queda **preparado pero desactivado** por flag
     `TRES360_TURNSTILE_ENABLED=false`. Se prende sólo si aparece spam real.
  En los tres casos de descarte se responde con el mismo mensaje de éxito. No le contamos
  al bot que lo detectamos.
- El Mailable lleva `replyTo` con el correo del lead si lo dejó, y el teléfono en el asunto:
  `Nuevo lead 360 — {nombre} ({telefono})`.
- Guardar también `ip` y `user_agent` en el registro, para diagnóstico.
- Mensajes de error y de éxito **en español**, en `resources/lang/es/`. `APP_LOCALE=es`.
- Mensaje de éxito: *"Recibimos tus datos. Un asesor de 360 se va a comunicar con vos a la
  brevedad."*

### Migración `leads`

```
id, nombre, telefono, ubicacion, email (nullable),
ip (nullable), user_agent (nullable, text), created_at, updated_at
```

Sin panel de administración. Si la clienta quiere ver los leads, se le manda el correo y
listo. Un `php artisan tres360:leads` que imprima los últimos 20 en tabla es un lindo extra
de diez minutos.

---

## 6. Estructura de archivos

```
app/
  Console/Commands/ListarLeads.php        (opcional)
  Http/Controllers/HomeController.php
  Http/Controllers/LeadController.php
  Http/Requests/StoreLeadRequest.php
  Mail/NuevoLead.php
  Models/Lead.php
config/tres360.php
database/migrations/*_create_leads_table.php
resources/
  css/app.css                             (@theme, fuentes, utilidades propias)
  js/app.js                               (Alpine + reveal + header scroll)
  lang/es/validation.php
  views/
    layouts/app.blade.php
    home.blade.php
    partials/{header,hero,beneficios,servicio,contacto,footer,whatsapp-fab}.blade.php
    components/{boton,tarjeta-beneficio,paso-servicio,encabezado-seccion}.blade.php
    emails/nuevo-lead.blade.php
public/
  img/  (logos y og-image)
  favicon.ico, apple-touch-icon.png
routes/web.php
tests/Feature/{HomePageTest,LeadFormTest}.php
```

Assets de marca listos en `assets/` del kit de entrega: logotipo en tres versiones
(oliva / blanco / amarillo, fondo transparente), isotipo, favicon y apple-touch-icon.

> ⚠️ Los logos entregados son **PNG**. Pedir al cliente el **SVG original** y sustituirlos.
> Mientras tanto, el PNG de 2437px de ancho sirve de sobra: servirlo a `@1x/@2x` con
> `width`/`height` explícitos para no generar CLS.

---

## 7. Convenciones de código

- Español para nombres de rutas, vistas, componentes Blade, textos y comentarios. Inglés
  para lo que es convención de Laravel (`Controller`, `Request`, `Mail`, `Model`).
- Blade: componentes con `<x-boton>`, nada de `@include` con arrays gigantes de parámetros.
- Clases de Tailwind directo en el Blade. Si una combinación se repite 3+ veces, sale a
  `@utility` en `app.css`. Sin `@apply` para todo.
- Nada de comentarios que expliquen lo obvio. Comentar sólo decisiones no evidentes.
- `.env.example` completo y actualizado con todas las variables `TRES360_*` y `MAIL_*`.
- Sin `dd()`, sin `console.log`, sin código comentado en el commit final.

---

## 8. Calidad — la barra de aceptación

| Requisito | Objetivo |
|---|---|
| Lighthouse móvil (Performance) | ≥ 95 |
| Lighthouse Accesibilidad / SEO / Best Practices | 100 |
| LCP | < 2.0 s en 4G |
| CLS | < 0.05 (dimensiones explícitas en toda imagen) |
| Peso total de la página | < 400 KB comprimida |
| Accesibilidad | WCAG 2.1 AA: foco visible, labels reales, `aria-live` en el estado del formulario, navegable con teclado |
| Navegadores | Chrome, Safari, Firefox, Edge últimas 2 versiones + iOS Safari y Chrome Android |
| Tests | Pest: la home responde 200 y renderiza el h1; el formulario válido crea `Lead` y encola el correo; el inválido devuelve errores; el honeypot no crea `Lead` |

SEO mínimo pero completo: `<title>`, meta description, Open Graph + Twitter Card con
`og-image` de 1200×630 (fondo amarillo con el logotipo oliva, ya se puede generar desde los
assets), `lang="es-PY"`, canonical, `robots.txt`, `sitemap.xml` de una URL, y JSON-LD
`RealEstateAgent` con nombre, dirección, teléfono y `parentOrganization: METRIKA SA`.

---

## 9. Despliegue en Plesk

1. `npm run build` **en local** y subir `public/build/` — el Plesk no compila assets.
2. Document root del dominio apuntando a `.../public`.
3. `.env` de producción: `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL` con https,
   `APP_LOCALE=es`, credenciales MySQL y SMTP.
4. `php artisan key:generate`, `migrate --force`, y luego `config:cache`, `route:cache`,
   `view:cache`.
5. Permisos de `storage/` y `bootstrap/cache/`.
6. SSL Let's Encrypt + redirección forzada a https y a un único host (con o sin `www`,
   elegir uno).
7. Verificar que el SMTP entrega a `@tres60.com.py` — **probar con un envío real antes de
   dar por cerrado el despliegue**. Si el dominio del correo está fuera del servidor,
   revisar SPF para que no caiga en spam.
8. `/vendor`, `/node_modules`, `.env` y `/storage` fuera del document root (ya lo están si
   el root es `public/`; verificar que no queden accesibles).

---

## 10. Datos pendientes del cliente

Estos huecos **no bloquean el desarrollo** — se construye con el placeholder indicado y se
sustituye después. Pero hay que reclamarlos antes de publicar.

| # | Falta | Placeholder mientras tanto | Bloquea publicación |
|---|---|---|---|
| 1 | Logotipo en **SVG** | PNG recortado de los assets | No |
| 2 | Manual de marca (tipografía oficial) | Nunito + Inter | No |
| 3 | Ciudad exacta de la dirección | "Asunción, Paraguay" | **Sí** |
| 4 | Dominio definitivo y quién administra el DNS | `tres60.com.py` (inferido del correo) | **Sí** |
| 5 | Texto adicional tipo "en construcción / próximamente" | ninguno (la sección no se construye) | No |
| 6 | Fotografías propias de departamentos administrados | diseño sin fotos, 100 % tipográfico y gráfico | No |
| 7 | Redes sociales (Instagram) | footer sin íconos de redes | No |
| 8 | Correos que deben recibir los leads (¿sólo Milena?) | `milena@tres60.com.py` | No |
| 9 | Texto legal / política de privacidad del formulario | línea breve de consentimiento | No |

**El diseño está pensado para no depender de fotografías.** Si después llegan fotos buenas,
entran en el hero como fondo con overlay oliva y en el bloque de servicio, sin rediseñar nada.
