# Legajo Técnico — Landing Tres Sesenta (360 by METRIKA SA)

> Formato estándar de webparaguay. Proyecto de cliente, alcance chico y cerrado.
> Documentos operativos hermanos: `CLAUDE.md` (contexto de repo) y `PLAN.md` (fases de build).

---

## 0. Ficha del proyecto

| Campo | Valor |
|---|---|
| **Nombre** | Landing de presentación — Tres Sesenta (360) |
| **Cliente** | METRIKA SA — marca **360 / Tres Sesenta**, administración de inmuebles |
| **Contacto del cliente** | Milena — milena@tres60.com.py |
| **Estado** | Listo para desarrollo |
| **Responsable** | Leonardo Chi (webparaguay) |
| **Tipo** | Proyecto de cliente — one-page de captación |
| **Stack** | Laravel + Blade + Tailwind v4, MySQL sólo para leads |
| **Despliegue** | Plesk de webparaguay |
| **Versión del legajo** | 1.0 |
| **Fecha** | Agosto 2026 |

---

## 1. Resumen ejecutivo

METRIKA SA es una desarrolladora inmobiliaria paraguaya que está lanzando **360**, su línea
de *property management*: administran departamentos de terceros para renta de corta y media
estadía, de punta a punta — comercialización en Airbnb y Booking, atención al huésped,
mantenimiento, check-in y check-out, y reportes al propietario.

Lo que necesitan para salir al mercado es lo mínimo indispensable y nada más: **una página
de presentación que explique el servicio y capture propietarios interesados**. Una sola
página, un formulario de tres campos, un globo de WhatsApp. Sin panel, sin catálogo de
propiedades, sin área privada.

**Por qué ahora:** la marca ya existe (logotipo listo, correo del dominio funcionando) y el
equipo comercial ya está hablando con propietarios. Hoy no tienen a dónde mandarlos. Es un
proyecto de días, no de meses, y desbloquea la venta de inmediato. Para webparaguay el
interés está tanto en la facturación directa — chica pero limpia — como en la relación: una
desarrolladora inmobiliaria en crecimiento es exactamente el perfil de cliente que después
necesita el sistema de gestión, el portal de propietarios y el hosting.

---

## 2. Problema y oportunidad

### El dolor concreto

El equipo comercial de 360 está vendiendo un servicio que **no tiene dónde mostrarse**. Un
propietario al que le proponen entregar un departamento en administración quiere, como
mínimo, ver que la empresa existe, entender qué incluye el servicio y saber quién está
detrás. Sin sitio, cada conversación arranca desde cero y depende enteramente de la
credibilidad personal del vendedor.

Hay un segundo problema, más silencioso: **los interesados que hoy no compran se pierden**.
No hay ningún lugar donde queden registrados sus datos.

### Quién paga y por qué

Paga METRIKA SA. La justificación es comercial directa: la landing es una herramienta de
venta del equipo de 360. Se amortiza con **un solo departamento captado**, porque el ingreso
de un inmueble en administración es recurrente y de larga duración.

### Oportunidad para webparaguay

Tres cosas, en orden de valor:

1. **Puerta de entrada a una cuenta con recorrido.** METRIKA SA es una desarrolladora. Sus
   necesidades naturales a 12–24 meses son sitios de proyectos inmobiliarios, un portal de
   propietarios con reportes, y un sistema de gestión de las unidades administradas. Este
   proyecto chico es la prueba de trabajo que habilita esas conversaciones.
2. **Recurrente inmediato** de hosting y mantenimiento sobre el servidor propio.
3. **Patrón reutilizable de landing de captación**, con backend mínimo de leads, aplicable a
   toda la promoción de desarrollo web para PYMEs. Es el mismo esqueleto que sirve para
   cualquier cliente que necesita presencia y un formulario que funcione.

---

## 3. Visión y propuesta de valor

**Una página que, en menos de treinta segundos y desde un celular, le da a un propietario
tres certezas: quiénes son, qué se llevan de encima, y cómo empezar.**

El posicionamiento del copy ya está resuelto por el cliente y es acertado: **360 no es una
marca nueva, es una extensión de METRIKA SA**. Esa asociación es el activo — resuelve de
entrada la objeción de confianza, que es la única objeción real cuando alguien entrega las
llaves de un departamento a un tercero. El diseño tiene que reforzar eso: sobrio, con
autoridad, sin ruido.

Apoyo en los diferenciadores de webparaguay:

| Diferenciador | Cómo se aprovecha |
|---|---|
| **Servidores locales en Paraguay** | Público 100 % local en móvil. Carga inmediata y datos de los leads en el país |
| **Atención cercana** | Un cliente que está lanzando una marca necesita cambios rápidos las primeras semanas. Ahí es donde nos ganamos la cuenta grande |
| **IA en el desarrollo** | El proyecto se hace en días con calidad de agencia. Es lo que lo vuelve rentable pese al ticket chico |
| **Stack propio y probado** | Laravel sobre el Plesk de siempre. Cero infraestructura nueva, cero aprendizaje |

---

## 4. Alcance por etapas (columna vertebral)

### MVP — Landing en producción (lo que se construye ahora)

**Entra:**

- Una sola página con seis secciones (header, hero, beneficios, servicio, cierre + formulario, footer)
- Diseño propio a partir del logotipo, responsive de 360px a 1920px, sin dependencia de fotografía
- Formulario de contacto de 3 campos + correo opcional, con **backend Laravel**: validación,
  persistencia del lead en MySQL, notificación por correo y anti-spam en capas
- Globo flotante de WhatsApp con mensaje precargado
- SEO técnico completo (metadatos, Open Graph, JSON-LD `RealEstateAgent`, sitemap, robots)
- Accesibilidad WCAG 2.1 AA
- Suite de tests Pest sobre la home y el formulario
- Auditoría de seguridad con strix y despliegue en Plesk con SSL

**NO entra en el MVP:**

- Panel de administración de ningún tipo
- Catálogo, buscador o fichas de propiedades
- Área privada de propietarios, reportes en línea, calculadora de rentabilidad
- Blog, noticias, multiidioma
- Integración con Airbnb, Booking o cualquier PMS
- Chat en vivo, pasarela de pagos, páginas adicionales

### v1 — Portal del propietario (futuro, no cotizado)

Área autenticada donde cada propietario ve la ocupación de su unidad, los ingresos del mes y
descarga sus reportes. **Es la evolución natural del sitio y el próximo proyecto lógico con
este cliente.** La landing del MVP no construye nada de esto, pero tampoco le cierra la
puerta: la marca, el sistema de diseño y el dominio quedan listos para colgarle un `/portal`.

### v2 — Gestión operativa de unidades

Sistema interno de 360: unidades, contratos con propietarios, calendario de ocupación,
liquidaciones mensuales, órdenes de mantenimiento, integración con canales. Legajo propio,
otra escala de proyecto.

### Producto derivado (interno de webparaguay)

El esqueleto **"landing de captación con backend de leads"** — formulario validado,
anti-spam, persistencia y notificación — extraído como base reutilizable. Baja a horas el
costo de la próxima landing de la promoción de desarrollo web.

---

## 5. Especificación técnica

> Detalle completo en `CLAUDE.md`. Resumen acá.

### Arquitectura

Monolito Laravel mínimo, renderizado en servidor. Una ruta pública `GET /` y una ruta
`POST /contacto`. Sin API, sin SPA, sin panel.

```
Navegador (móvil primero)
   │
   ├── GET /            → HomeController → Blade + Tailwind + Alpine
   │
   └── POST /contacto   → throttle:5,1 → StoreLeadRequest
                              │
                              ├── honeypot + timestamp firmado → descarte silencioso
                              ├── Lead::create()  → MySQL   (se guarda SIEMPRE primero)
                              └── Mail::send(NuevoLead) → SMTP → milena@tres60.com.py
                                     (en try/catch: si falla el correo, el lead ya está)
```

La decisión de diseño más importante del backend: **el lead se persiste antes de intentar el
correo**. Un problema de SMTP no puede costar un cliente.

### Stack

Laravel (última estable) · PHP 8.3+ · Blade · Tailwind CSS v4 · Alpine.js · MySQL 8 ·
Vite · fuentes autohospedadas. Cero dependencias externas en runtime.

### Sistema de diseño

Derivado del logotipo: amarillo `#FFD905` y verde oliva oscuro `#373C05`. El amarillo se usa
como acento y como fondo de un único bloque — el de conversión —, no como fondo general.
Tipografía Nunito (títulos, por su cercanía al logotipo) + Inter (texto). Todos los pares de
color en uso están verificados en AA o AAA.

### Requerimientos no funcionales

| Requerimiento | Objetivo |
|---|---|
| Lighthouse móvil — Performance | ≥ 95 |
| Lighthouse — A11y / SEO / Best Practices | 100 |
| LCP / CLS | < 2.0 s en 4G · < 0.05 |
| Peso de la página | < 400 KB comprimida |
| Accesibilidad | WCAG 2.1 AA |
| Seguridad | Cero hallazgos Críticos/Altos de strix |
| Disponibilidad | 99.5 % mensual |
| Navegadores | Últimas 2 versiones de Chrome, Firefox, Safari, Edge + iOS/Android |
| Idioma | Español paraguayo |

### Contenido definitivo

> **Copy aprobado por el cliente. Se implementa literal.**

**Hero**

- Antetítulo: `Una marca de METRIKA SA`
- Título: `Administración integral de departamentos. Tú disfrutas de tu inversión, nosotros del resto.`
- Subtítulo: `Con 360, el servicio exclusivo de property management de METRIKA SA, gestionamos tu propiedad de principio a fin. Optimizamos tus ingresos y cuidamos tu inmueble con el estándar de calidad y confianza que nos caracteriza.`
- CTA primario: `Quiero rentabilizar mi propiedad` → ancla a `#contacto`
- CTA secundario: `Hablar con un asesor` → WhatsApp

**Beneficios — "Por qué elegirnos"**

| Título | Texto |
|---|---|
| El respaldo de los expertos | Al ser parte de METRIKA SA, conocemos el mercado inmobiliario desde su concepción. Nadie cuidará y valorará tu departamento mejor que nosotros. |
| Rentabilidad maximizada | Utilizamos estrategias de precios dinámicos para asegurar que tu inmueble genere los mayores ingresos posibles en todo momento. |
| Gestión sin preocupaciones | Nos hacemos cargo de todo el proceso: comercialización, trato con huéspedes, cobros y mantenimiento. |
| Transparencia total | Recibe reportes claros, puntuales y detallados sobre la ocupación y el rendimiento financiero de tu inversión. |

> Nota: el brief traía *"Gestión sin preocupaciones (Cero estrés)"*. Se toma el paréntesis
> como anotación interna, no como copy, y el título va limpio. Si el cliente lo quiere,
> se recupera como bajada de la tarjeta.

**Nuestro Servicio 360**

| # | Título | Texto |
|---|---|---|
| 01 | Comercialización y Marketing | Publicación destacada y gestión de perfiles en las principales plataformas (Airbnb, Booking, etc.) con fotografías profesionales. |
| 02 | Atención al Huésped 24/7 | Comunicación cálida y constante antes, durante y después de la estadía. Filtramos perfiles para garantizar la seguridad del edificio. |
| 03 | Mantenimiento Preventivo y Correctivo | Con el equipo técnico y el estándar de METRIKA SA, resolvemos cualquier desperfecto de forma rápida y eficiente para que tu inmueble se mantenga impecable. |
| 04 | Logística de Check-in y Check-out | Recepción fluida, entrega de llaves y revisión exhaustiva del departamento tras cada salida. |

**Cierre**

- Frase: `Protege tu inversión inmobiliaria con los que saben. Deja la gestión diaria en manos de 360 by METRIKA SA.`
- Formulario: Nombre · Teléfono · Ubicación del departamento · Correo (opcional)
- Botón: `Solicitar una propuesta a medida`

**Contacto**

| Dato | Valor |
|---|---|
| Dirección | Pantaleón Aguirre c/ Florentín Oviedo — Barrio Boquerón |
| Teléfono | (0975) 560037 |
| WhatsApp | (0975) 560037 |
| Correo | milena@tres60.com.py |

> ⚠️ Falta la **ciudad** de la dirección. Se asume Asunción hasta confirmar.

---

## 6. Modelo de negocio y monetización

Proyecto de cliente, **precio cerrado**. Dos componentes:

**a) Desarrollo — pago único.** Ticket chico. Estructura sugerida: 50 % al inicio, 50 %
contra puesta en producción. Con un proyecto de este tamaño no vale la pena fraccionar más.

**b) Recurrente mensual — acá está el negocio real.**

- **Hosting** en el Plesk de webparaguay (plan de entrada alcanza y sobra)
- **Mantenimiento**: actualizaciones, monitoreo, respaldos y una bolsa chica de horas para
  cambios de texto y ajustes

**Lo importante: este proyecto no se cotiza por lo que factura hoy.** Se cotiza como entrada
a una cuenta cuyo valor está en el portal de propietarios (v1), el sistema de gestión (v2) y
los sitios de los proyectos inmobiliarios de METRIKA. Precio justo y sano — ni regalado, que
desvaloriza lo que viene, ni inflado, que corta la relación antes de empezar.

**Acción comercial concreta al entregar:** presentar la landing **junto con un boceto de una
carilla del portal del propietario**. El cliente va a estar en el mejor momento posible para
escucharlo, y ese es el proyecto que vale.

---

## 7. Esfuerzo y recursos

| Fase | Descripción | Horas |
|---|---|---|
| 0 | Andamiaje Laravel + Tailwind + fuentes | 1 |
| 1 | Sistema de diseño, layout y SEO base | 2 |
| 2 | Header, hero y footer | 3 |
| 3 | Beneficios y Servicio 360 | 3 |
| 4 | Formulario, backend de leads y correo | 4 |
| 5 | WhatsApp, pulido y responsive | 2 |
| 6 | Tests, auditoría strix y despliegue | 2–3 |
| | **Total** | **17–18 h** |

**Rango calendario:** 4 a 6 días hábiles, conviviendo con otros proyectos.
**Rol:** un desarrollador senior con asistencia de IA. El junior puede tomar las fases 3 y 5.

**Costos de terceros:**

| Concepto | Costo |
|---|---|
| Hosting Plesk | Infraestructura propia — costo interno |
| SSL Let's Encrypt | Gratis |
| Dominio `tres60.com.py` | Ya existe (el correo del cliente funciona) — confirmar quién lo paga y lo administra |
| Tipografías (Nunito + Inter) | Gratis, licencia SIL Open Font |
| Cloudflare Turnstile | Gratis, y sólo si hiciera falta |
| Créditos de IA | Cubierto por la operación |

**Cero costos de terceros nuevos.** Es parte de por qué el proyecto cierra bien.

---

## 8. Riesgos y supuestos

| # | Riesgo | Prob. | Impacto | Mitigación |
|---|---|---|---|---|
| R1 | El cliente pide crecer el alcance durante el build ("¿y si le ponemos las propiedades?") | **Alta** | Alto | El "NO entra" de la sección 4 está escrito para esto. Cualquier agregado se cotiza aparte, sin excepción |
| R2 | El correo del formulario no llega o cae en spam | Media | **Crítico** | El lead se guarda en base antes de enviar el correo. Prueba de envío real obligatoria antes de cerrar. Revisar SPF si el correo del dominio está fuera del servidor |
| R3 | No hay fotografías propias de departamentos | **Alta** | Bajo | El diseño está resuelto sin fotos, con recursos tipográficos y gráficos. Si llegan después, entran sin rediseñar |
| R4 | Sólo tenemos el logotipo en PNG, sin manual de marca | Alta | Bajo | Assets ya preparados (oliva, blanco, amarillo, isotipo, favicon). Se pide el SVG y se sustituye |
| R5 | Spam en el formulario | Media | Medio | Honeypot + timestamp firmado + rate limit. Turnstile queda listo y apagado, se prende si aparece spam real |
| R6 | El Plesk destino tiene PHP viejo | Baja | Medio | Se verifica en la Fase 0, antes de escribir código |
| R7 | Falta el dominio definitivo o no controlamos el DNS | Media | Medio | Confirmar antes de la Fase 6. Se desarrolla en un subdominio de staging mientras tanto |
| R8 | Idas y vueltas de copy después de aprobado | Media | Bajo | El copy de la sección 4 es el aprobado. Cambios menores entran en la bolsa de mantenimiento |
| R9 | El cliente espera posicionamiento en Google desde el día uno | Media | Bajo | Aclarar en la entrega: el SEO técnico está impecable, pero el posicionamiento de una marca nueva lleva meses y depende de contenido y difusión |

**Supuestos:**

- El copy de la sección 4 está aprobado por el cliente y es definitivo.
- El dominio `tres60.com.py` está registrado y disponible para apuntar al Plesk.
- El correo `milena@tres60.com.py` está operativo y es la casilla que recibe los leads.
- El número (0975) 560037 tiene WhatsApp activo.
- La marca 360 tiene derecho de uso — es marca propia de METRIKA SA.
- No se usan logos de Airbnb ni Booking, sólo sus nombres como texto.

---

## 9. Métricas de éxito / KPIs

### Al cierre del proyecto

| Métrica | Objetivo |
|---|---|
| Lighthouse móvil — Performance | ≥ 95 |
| Lighthouse — A11y / SEO / Best Practices | 100 |
| Core Web Vitals | LCP < 2.0 s · CLS < 0.05 |
| Hallazgos de seguridad Críticos/Altos | 0 |
| Accesibilidad | WCAG 2.1 AA verificada con teclado |
| Envío real de prueba recibido por el cliente | Sí, confirmado por Milena |
| Horas reales vs. estimadas | Desvío < 20 % |
| Días hábiles hasta producción | ≤ 6 |

### A 90 días de producción

| Métrica | Objetivo |
|---|---|
| Leads recibidos por el formulario | ≥ 10 |
| Leads que se pierden por fallo técnico | **0** |
| Spam que llega a la casilla | ≤ 2 por mes |
| Departamentos captados atribuidos al sitio | ≥ 1 |
| Caídas del sitio | 0 |
| Recurrente mensual cerrado (hosting + mantenimiento) | Sí, junto con el desarrollo |

### Interno de webparaguay

| Métrica | Objetivo |
|---|---|
| Esqueleto "landing + backend de leads" extraído como base reutilizable | Sí, al cerrar la Fase 6 |
| Boceto del portal del propietario presentado al cliente | Sí, en la reunión de entrega |
| Conversación abierta sobre el v1 | Sí, dentro de los 60 días |

> El KPI que manda es **"leads perdidos por fallo técnico: 0"**. Un sitio lindo que traga un
> lead es un sitio roto. Todo lo demás del proyecto es secundario frente a eso.
