# Docker Setup Instructions

## Prerequisites
- Docker installed
- Docker Compose installed

## Services
- **App**: Laravel application (PHP 8.2-FPM)
- **Nginx**: Web server on port 8080
- **Database**: MySQL 8.0 on port 3306
- **phpMyAdmin**: Database management tool on port 8081

## Setup & Run

### 1. Build and start containers
```bash
docker compose up -d --build
```

### 2. Install dependencies (if not done during build)
```bash
docker compose exec app composer install
```

### 3. Generate application key (if needed)
```bash
docker compose exec app php artisan key:generate
```

### 4. Run migrations
```bash
docker compose exec app php artisan migrate
```

### 5. Set proper permissions
```bash
docker compose exec app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
docker compose exec app chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
```

## Access Points
- **Application**: http://localhost:8088
- **phpMyAdmin**: http://localhost:8084
- **Database**: localhost:33061

## Useful Commands

### Stop containers
```bash
docker compose down
```

### View logs
```bash
docker compose logs -f
```

### Access app container shell
```bash
docker compose exec app bash
```

### Run artisan commands
```bash
docker compose exec app php artisan [command]
```

### Clear cache
```bash
docker compose exec app php artisan cache:clear
docker compose exec app php artisan config:clear
docker compose exec app php artisan view:clear
```

## Environment Variables
All environment variables are loaded from the `.env` file automatically through Docker Compose.

Key variables:
- `DB_HOST=db` (container name)
- `DB_DATABASE=towertech`
- `DB_USERNAME=root`
- `DB_PASSWORD=root`

## Troubleshooting

### Permission issues
```bash
docker compose exec app chmod -R 775 storage bootstrap/cache
docker compose exec app chown -R www-data:www-data storage bootstrap/cache
```

### Rebuild containers
```bash
docker compose down
docker compose up -d --build --force-recreate
```

### Database connection issues
Make sure `DB_HOST=db` in your `.env` file (not `127.0.0.1`)
