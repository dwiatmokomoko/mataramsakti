#!/bin/bash

echo "🔍 FULL DIAGNOSTIC & FIX"
echo "========================"
echo ""

# Step 1: Check environment
echo "📋 STEP 1: Environment Check"
echo "----------------------------"
echo "APP_ENV: $(grep APP_ENV .env | cut -d '=' -f2)"
echo "APP_DEBUG: $(grep APP_DEBUG .env | cut -d '=' -f2)"
echo "LOG_CHANNEL: $(grep LOG_CHANNEL .env | cut -d '=' -f2)"
echo "DB_CONNECTION: $(grep DB_CONNECTION .env | cut -d '=' -f2)"
echo ""

# Step 2: Check breadcrumb component
echo "📋 STEP 2: Breadcrumb Component Check"
echo "--------------------------------------"
if grep -q '"@context"' resources/views/components/breadcrumb.blade.php; then
    echo "❌ FOUND UNESCAPED @context - FIXING NOW..."
    sed -i 's/"@context"/"@@context"/g' resources/views/components/breadcrumb.blade.php
    echo "✅ Fixed @context"
else
    echo "✅ @context is properly escaped"
fi

if grep -q '"@type"' resources/views/components/breadcrumb.blade.php; then
    echo "❌ FOUND UNESCAPED @type - FIXING NOW..."
    sed -i 's/"@type"/"@@type"/g' resources/views/components/breadcrumb.blade.php
    echo "✅ Fixed @type"
else
    echo "✅ @type is properly escaped"
fi
echo ""

# Step 3: Remove duplicate files
echo "📋 STEP 3: Remove Duplicate Files"
echo "----------------------------------"
if [ -f "breadcrumb-fixed.blade.php" ]; then
    rm breadcrumb-fixed.blade.php
    echo "✅ Removed breadcrumb-fixed.blade.php"
fi
echo ""

# Step 4: Clear all caches thoroughly
echo "📋 STEP 4: Clear All Caches"
echo "---------------------------"
php artisan cache:clear > /dev/null 2>&1
php artisan config:clear > /dev/null 2>&1
php artisan route:clear > /dev/null 2>&1
php artisan view:clear > /dev/null 2>&1
php artisan optimize:clear > /dev/null 2>&1
rm -rf storage/framework/views/*.php
rm -rf storage/framework/cache/data/*
echo "✅ All caches cleared"
echo ""

# Step 5: Check permissions
echo "📋 STEP 5: Check Permissions"
echo "----------------------------"
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
echo "✅ Permissions set"
echo ""

# Step 6: Restart Apache
echo "📋 STEP 6: Restart Apache"
echo "-------------------------"
sudo systemctl restart apache2
sleep 2
echo "✅ Apache restarted"
echo ""

# Step 7: Test database
echo "📋 STEP 7: Test Database"
echo "------------------------"
php artisan tinker --execute="try { DB::connection()->getPdo(); echo '✅ Database connected'; } catch (Exception \$e) { echo '❌ Database error: ' . \$e->getMessage(); }"
echo ""
echo ""

# Step 8: Test routes
echo "📋 STEP 8: Test Routes"
echo "----------------------"
echo "Homepage:"
HTTP_HOME=$(curl -s -o /dev/null -w "%{http_code}" http://localhost:20275/)
if [ "$HTTP_HOME" = "200" ]; then
    echo "✅ HTTP $HTTP_HOME"
else
    echo "❌ HTTP $HTTP_HOME"
fi

echo "Motor Detail (ID: 1):"
HTTP_MOTOR=$(curl -s -o /dev/null -w "%{http_code}" http://localhost:20275/motor/1)
if [ "$HTTP_MOTOR" = "200" ]; then
    echo "✅ HTTP $HTTP_MOTOR"
else
    echo "❌ HTTP $HTTP_MOTOR"
    echo ""
    echo "Checking error details..."
    curl -s http://localhost:20275/motor/1 | grep -i "error\|exception" | head -5
fi
echo ""

# Step 9: Show recent errors
echo "📋 STEP 9: Recent Errors"
echo "------------------------"
if [ -f "storage/logs/laravel.log" ]; then
    echo "Last error from Laravel log:"
    tail -50 storage/logs/laravel.log | grep -A 5 "ERROR\|CRITICAL\|ParseError" | tail -10
else
    echo "No Laravel log found"
fi
echo ""

echo "========================"
echo "✅ DIAGNOSTIC COMPLETE"
echo ""
echo "If still getting 500 errors, run:"
echo "  bash check-errors.sh"
echo ""
echo "To see full error details."
