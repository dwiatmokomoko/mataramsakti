#!/bin/bash

echo "🔧 Fixing server issues for yamahajogja.id..."

# Set proper directory
cd /var/www/html/mataramsakti

# 1. Check if .env exists
if [ ! -f .env ]; then
    echo "❌ .env file not found! Creating from template..."
    cp .env.server .env
    echo "✅ .env file created"
fi

# 2. Generate new APP_KEY if needed
echo "🔑 Generating application key..."
php artisan key:generate --force

# 3. Clear all caches
echo "🧹 Clearing all caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear

# 4. Check database connection
echo "🗄️ Testing database connection..."
php artisan migrate:status

# 5. Run migrations if needed
echo "📊 Running migrations..."
php artisan migrate --force

# 6. Check if database has data
MOTOR_COUNT=$(php artisan tinker --execute="echo App\Models\Motor::count();" 2>/dev/null || echo "0")
if [ "$MOTOR_COUNT" = "0" ]; then
    echo "🌱 Seeding database..."
    php artisan db:seed --class=CorrectedMotorStructureSeeder --force
    php artisan db:seed --class=AdminUserSeeder --force
else
    echo "✅ Database has data (Motors: $MOTOR_COUNT)"
fi

# 7. Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link

# 8. Set proper permissions
echo "🔒 Setting permissions..."
sudo chown -R www-data:www-data .
sudo chmod -R 755 .
sudo chmod -R 775 storage bootstrap/cache
sudo chmod -R 775 storage/app/public

# 9. Create necessary directories
mkdir -p storage/app/public/motors
mkdir -p storage/app/public/uploads
sudo chown -R www-data:www-data storage/app/public
sudo chmod -R 775 storage/app/public

# 10. Cache configurations for production
echo "⚡ Caching configurations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 11. Check composer autoload
echo "📦 Optimizing composer autoload..."
composer dump-autoload --optimize

echo "✅ Server fix completed!"
echo ""
echo "🌐 Try accessing: https://yamahajogja.id"
echo "🔧 Admin panel: https://yamahajogja.id/admin/login"
echo ""
echo "📋 If still having issues, check:"
echo "   - Apache error log: /var/log/apache2/error.log"
echo "   - Laravel log: storage/logs/laravel.log"
echo "   - PHP version: php -v (should be 8.1+)"
echo "   - PostgreSQL status: systemctl status postgresql"