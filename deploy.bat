ackup schedule
echo    4. Test all functionality
pausessary directories
if not exist "storage\app\public\motors" mkdir "storage\app\public\motors"
if not exist "storage\app\public\uploads" mkdir "storage\app\public\uploads"

echo ✅ Deployment completed successfully!
echo.
echo 🌐 Your application should now be accessible at your domain
echo 🔧 Admin panel: /admin/login
echo 👤 Default admin: admin@mataramsakti.com / password123
echo.
echo 📋 Next steps:
echo    1. Configure your web server (Apache/Nginx)
echo    2. Set up SSL certificate
echo    3. Configure bding database...
    php artisan db:seed --class=CorrectedMotorStructureSeeder
    php artisan db:seed --class=AdminUserSeeder
) else (
    echo ✅ Database already has data (Motors: %MOTOR_COUNT%)
)

REM Clear and cache configurations
echo 🧹 Clearing caches...
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo ⚡ Caching configurations...
php artisan config:cache
php artisan route:cache
php artisan view:cache

REM Create nece>nul
if errorlevel 1 (
    echo 🔑 Generating application key...
    php artisan key:generate
)

REM Create storage link
echo 🔗 Creating storage link...
php artisan storage:link

REM Run migrations
echo 🗄️  Running database migrations...
php artisan migrate --force

REM Check if database is empty and seed if needed
for /f %%i in ('php artisan tinker --execute="echo App\Models\Motor::count();"') do set MOTOR_COUNT=%%i
if "%MOTOR_COUNT%"=="0" (
    echo 🌱 Seef .env exists
if not exist .env (
    echo ❌ .env file not found!
    echo 📝 Please copy .env.production to .env and configure it first
    echo    copy .env.production .env
    echo    notepad .env
    pause
    exit /b 1
)

REM Install/Update dependencies
echo 📦 Installing dependencies...
composer install --optimize-autoloader --no-dev

REM Generate app key if not exists
findstr /C:"APP_KEY=base64:" .env @echo off
echo 🚀 Starting deployment process...

REM Check i