# Tres 360 — Landing web

Landing page de presentación para **Tres Sesenta (360)**, la marca de *property management*
de **METRIKA SA**. Una sola página, un formulario de contacto de tres campos con backend en
Laravel, y un globo flotante de WhatsApp. El detalle completo del alcance, el sistema de
diseño y las decisiones técnicas está en `LEGAJO-TECNICO.md`, `CLAUDE.md` y `PLAN.md`.

## Stack

Laravel 12 · PHP 8.3+ · Blade · Tailwind CSS v4 (Vite) · Alpine.js · MySQL 8 · fuentes
Nunito e Inter autohospedadas vía `@fontsource`. Cero dependencias de terceros en runtime.

## Puesta en marcha local

```bash
composer install
cp .env.example .env
php artisan key:generate
# crear la base de datos indicada en DB_DATABASE (MySQL 8)
php artisan migrate
npm install
npm run build   # o `npm run dev` durante desarrollo
php artisan serve
```

## Tests

```bash
php artisan test
```

Suite Pest sobre la home y el formulario de leads: validación, persistencia, notificación
por correo (`Mail::fake()`), honeypot, timestamp firmado y rate limit.

## Despliegue en Plesk

1. `npm run build` en local y subir `public/build/` — el Plesk no compila assets.
2. Document root del dominio apuntando a `public/`.
3. `.env` de producción: `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL` con https,
   credenciales de MySQL y del SMTP de webparaguay.
4. `php artisan key:generate --force`, `migrate --force`, y luego `config:cache`,
   `route:cache`, `view:cache`.
5. Permisos de escritura en `storage/` y `bootstrap/cache/`.
6. SSL (Let's Encrypt) con redirección forzada a https.
7. Probar un envío real del formulario y confirmar que el correo llega a
   `milena@tres60.com.py` antes de dar el despliegue por cerrado.

## Datos pendientes de confirmar con el cliente

Ver `CLAUDE.md §10`. Los dos que bloquean publicación: la ciudad exacta de la dirección
(hoy "Asunción, Paraguay") y el dominio definitivo.
