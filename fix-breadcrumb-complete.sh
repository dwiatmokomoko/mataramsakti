#!/bin/bash

echo "🔧 Complete Breadcrumb Fix Script"
echo "=================================="

# Step 1: Clear all Laravel caches
echo ""
echo "📦 Step 1: Clearing all Laravel caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear

# Step 2: Remove compiled views manually
echo ""
echo "🗑️  Step 2: Removing compiled views manually..."
rm -rf storage/framework/views/*
echo "✅ Compiled views removed"

# Step 3: Clear opcache if available
echo ""
echo "🔄 Step 3: Clearing OPcache..."
if command -v php &> /dev/null; then
    php -r "if (function_exists('opcache_reset')) { opcache_reset(); echo 'OPcache cleared'; } else { echo 'OPcache not available'; }"
fi

# Step 4: Restart Apache
echo ""
echo "🔄 Step 4: Restarting Apache..."
sudo systemctl restart apache2
echo "✅ Apache restarted"

# Step 5: Test the fix
echo ""
echo "🧪 Step 5: Testing the fix..."
echo ""
echo "Testing homepage:"
curl -I http://localhost:20275/ 2>&1 | head -1

echo ""
echo "Testing motor detail page:"
curl -I http://localhost:20275/motor/1 2>&1 | head -1

echo ""
echo "=================================="
echo "✅ Fix complete!"
echo ""
echo "If you still see 500 errors, check:"
echo "1. tail -f storage/logs/laravel.log"
echo "2. sudo tail -f /var/log/apache2/error.log"
