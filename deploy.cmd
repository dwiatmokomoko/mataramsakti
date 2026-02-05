@echo off
echo Starting deployment process...

REM Check if .env exists
if not exist .env (
    echo .env file not found!
    echo Please copy .env.production to .env and configure it first
    echo    copy .env.production .env
    pause
    exit /b 1
)

REM Install dependencies
echo Installing dependencies...
composer install --optimize-autoloader --no-dev

REM Generate app key if not exists
echo Generating application key...
php artisan key:generate --force

REM Create storage link
echo Creating storage link...
php artisan storage:link

REM Run migrations
echo Running database migrations...
php artisan migrate --force

REM Seed database
echo Seeding database...
php artisan db:seed --class=CorrectedMotorStructureSeeder --force
php artisan db:seed --class=AdminUserSeeder --force

REM Clear and cache configurations
echo Clearing caches...
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo Caching configurations...
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo Deployment completed successfully!
echo.
echo Admin panel: /admin/login
echo Default admin: admin@mataramsakti.com / password123
pause