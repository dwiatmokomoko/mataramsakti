#!/bin/bash

echo "🔧 Fixing yamahajogja.id server issues..."

# Pastikan kita di direktori yang benar
cd /var/www/html/mataramsakti

# 1. Backup .env lama
if [ -f .env ]; then
    echo "📋 Backing up old .env file..."
    cp .env .env.backup.$(date +%Y%m%d_%H%M%S)
fi

# 2. Copy .env yang benar
echo "📝 Creating correct .env file..."
cp .env.yamahajogja .env

# 3. Generate new APP_KEY
echo "🔑 Generating application key..."
php artisan key:generate --force

# 4. Clear ALL caches (penting karena LOG_CHANNEL berubah)
echo "🧹 Clearing all caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear

# 5. Set proper permissions
echo "🔒 Setting correct permissions..."
sudo chown -R www-data:www-data .
sudo chmod -R 755 .
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache

# 6. Create storage directories
echo "📁 Creating storage directories..."
mkdir -p storage/logs
mkdir -p storage/app/public/motors
mkdir -p storage/app/public/uploads
sudo chown -R www-data:www-data storage
sudo chmod -R 775 storage

# 7. Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link

# 8. Test database connection
echo "🗄️ Testing database connection..."
php artisan migrate:status

# 9. Run migrations if needed
echo "📊 Running migrations..."
php artisan migrate --force

# 10. Seed database if empty
MOTOR_COUNT=$(php artisan tinker --execute="echo App\Models\Motor::count();" 2>/dev/null || echo "0")
if [ "$MOTOR_COUNT" = "0" ]; then
    echo "🌱 Seeding database..."
    php artisan db:seed --class=CorrectedMotorStructureSeeder --force
    php artisan db:seed --class=AdminUserSeeder --force
else
    echo "✅ Database has data (Motors: $MOTOR_COUNT)"
fi

# 11. Optimize for production
echo "⚡ Optimizing for production..."
composer dump-autoload --optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 12. Restart Apache
echo "🔄 Restarting Apache..."
sudo systemctl restart apache2

# 13. Test if site is working
echo "🧪 Testing site..."
curl -I http://yamahajogja.id/ 2>/dev/null | head -1

echo ""
echo "✅ Fix completed!"
echo ""
echo "🌐 Site: https://yamahajogja.id"
echo "🔧 Admin: https://yamahajogja.id/admin/login"
echo "👤 Login: admin@mataramsakti.com / password123"
echo ""
echo "📋 If still having issues:"
echo "   - Check Apache error log: sudo tail -f /var/log/apache2/error.log"
echo "   - Check Laravel log: tail -f storage/logs/laravel.log"
echo "   - Check site status: curl -I http://yamahajogja.id/"