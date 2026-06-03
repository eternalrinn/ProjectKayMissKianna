# ProjectKayMissKianna

Laravel 11 daily journal app with Bootstrap auth, profile editing, user management, and admin settings.

## Local setup

1. Install PHP 8.2+, Composer, Node.js, and npm.
2. Copy `.env.example` to `.env`.
3. Generate the app key:

```bash
php artisan key:generate
```

4. Run migrations:

```bash
php artisan migrate
```

5. Start the Laravel server:

```bash
php artisan serve
```

6. In another terminal, start Vite:

```bash
npm install
npm run dev
```

## Railway deploy

This repo includes a `railway.toml` file so Railway can:

- build Vite assets during deploy
- run database migrations before the new release goes live

### Variables to set in Railway

Create a Postgres service in the same Railway project, then add these variables to the app service:

```env
APP_NAME=ProjectKayMissKianna
APP_ENV=production
APP_DEBUG=false
APP_KEY=your-generated-app-key
APP_URL=https://${{RAILWAY_PUBLIC_DOMAIN}}
DB_CONNECTION=pgsql
DB_URL=${{Postgres.DATABASE_URL}}
CACHE_STORE=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=local
```

You can also import the included `.env.railway` file in Railway and then fill in the `APP_KEY`.

### First deploy checklist

1. Add the Postgres service.
2. Import `.env.railway` into the app service variables.
3. Set `APP_KEY`.
4. Generate a public domain for the app service.
5. Redeploy the service.

If the deploy succeeds, Railway will give you the live app URL.
