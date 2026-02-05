#!/bin/bash

# Deployment Script untuk Yamaha Motor Indonesia
# Usage: ./deploy.sh

echo "🚀 Starting deployment process..."

# Check if .env exists
if [ ! -f .env ]; then
    echo "❌ .env file not found!"
    echo "📝 Please copy .env.production to .env and configure it first"
    echo "   cp .env.production .env"
    echo "   nano .env"
    exit 1
fi

# Install/Update dependencies
echo "📦 Installing dependencies..."
composer install --optimize-autoloader --no-dev

# Generate app key if not exists
if ! grep -q "APP_KEY=base64:" .env; then
    echo "🔑 Generating application key..."
    php artisan key:generate
fi

# Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link

# Run migrations
echo "🗄️  Running database migrations..."
php artisan migrate --force

# Check if database is empty and seed if needed
MOTOR_COUNT=$(php artisan tinker --execute="echo App\Models\Motor::count();")
if [ "$MOTOR_COUNT" -eq "0" ]; then
    echo "🌱 Seeding database..."
    php artisan db:seed --class=CorrectedMotorStructureSeeder
    php artisan db:seed --class=AdminUserSeeder
else
    echo "✅ Database already has data (Motors: $MOTOR_COUNT)"
fi

# Clear and cache configurations
echo "🧹 Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "⚡ Caching configurations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions
echo "🔒 Setting permissions..."
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# Create necessary directories
mkdir -p storage/app/public/motors
mkdir -p storage/app/public/uploads
sudo chown -R www-data:www-data storage/app/public
sudo chmod -R 775 storage/app/public

echo "✅ Deployment completed successfully!"
echo ""
echo "🌐 Your application should now be accessible at your domain"
echo "🔧 Admin panel: /admin/login"
echo "👤 Default admin: admin@mataramsakti.com / password123"
echo ""
echo "📋 Next steps:"
echo "   1. Configure your web server (Apache/Nginx)"
echo "   2. Set up SSL certificate"
echo "   3. Configure backup schedule"
echo "   4. Test all functionality"