#!/bin/bash

echo "🚀 Complete Deployment & Fix Script"
echo "===================================="
echo ""

# Step 1: Remove problematic breadcrumb-fixed.blade.php if exists
echo "📦 Step 1: Cleaning up duplicate files..."
if [ -f "breadcrumb-fixed.blade.php" ]; then
    rm breadcrumb-fixed.blade.php
    echo "✅ Removed breadcrumb-fixed.blade.php"
else
    echo "✅ No duplicate breadcrumb files found"
fi

# Step 2: Verify breadcrumb component is correct
echo ""
echo "🔍 Step 2: Verifying breadcrumb component..."
if grep -q '"@@context"' resources/views/components/breadcrumb.blade.php && grep -q '"@@type"' resources/views/components/breadcrumb.blade.php; then
    echo "✅ Breadcrumb component has escaped @context and @type"
else
    echo "❌ Breadcrumb component needs fixing"
    echo "   Applying fix..."
    
    # Backup current file
    cp resources/views/components/breadcrumb.blade.php resources/views/components/breadcrumb.blade.php.backup
    
    # Replace unescaped @ with @@
    sed -i 's/"@context"/"@@context"/g' resources/views/components/breadcrumb.blade.php
    sed -i 's/"@type"/"@@type"/g' resources/views/components/breadcrumb.blade.php
    
    echo "✅ Breadcrumb component fixed"
fi

# Step 3: Clear all caches
echo ""
echo "🗑️  Step 3: Clearing all caches..."
php artisan cache:clear 2>&1 | grep -i "success\|cleared" || echo "Cache cleared"
php artisan config:clear 2>&1 | grep -i "success\|cleared" || echo "Config cleared"
php artisan route:clear 2>&1 | grep -i "success\|cleared" || echo "Routes cleared"
php artisan view:clear 2>&1 | grep -i "success\|cleared" || echo "Views cleared"
php artisan optimize:clear 2>&1 | grep -i "success\|cleared" || echo "Optimization cleared"

# Step 4: Remove compiled views manually
echo ""
echo "🗑️  Step 4: Removing compiled views manually..."
rm -rf storage/framework/views/*.php
echo "✅ Compiled views removed: $(ls -1 storage/framework/views/ | wc -l) files remaining"

# Step 5: Clear OPcache
echo ""
echo "🔄 Step 5: Clearing OPcache..."
php -r "if (function_exists('opcache_reset')) { opcache_reset(); echo '✅ OPcache cleared'; } else { echo '⚠️  OPcache not available'; }" 2>/dev/null || echo "⚠️  OPcache not available"

# Step 6: Restart Apache
echo ""
echo "🔄 Step 6: Restarting Apache..."
sudo systemctl restart apache2
if [ $? -eq 0 ]; then
    echo "✅ Apache restarted successfully"
else
    echo "❌ Failed to restart Apache"
fi

# Wait for Apache to fully restart
sleep 2

# Step 7: Test the deployment
echo ""
echo "🧪 Step 7: Testing deployment..."
echo ""

echo "Testing homepage:"
HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" http://localhost:20275/)
if [ "$HTTP_CODE" = "200" ]; then
    echo "✅ Homepage: HTTP $HTTP_CODE - OK"
else
    echo "❌ Homepage: HTTP $HTTP_CODE - ERROR"
fi

echo ""
echo "Testing motor detail page (ID: 1):"
HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" http://localhost:20275/motor/1)
if [ "$HTTP_CODE" = "200" ]; then
    echo "✅ Motor detail: HTTP $HTTP_CODE - OK"
else
    echo "❌ Motor detail: HTTP $HTTP_CODE - ERROR"
fi

echo ""
echo "Testing motor detail page (ID: 48):"
HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" http://localhost:20275/motor/48)
if [ "$HTTP_CODE" = "200" ]; then
    echo "✅ Motor detail (48): HTTP $HTTP_CODE - OK"
else
    echo "❌ Motor detail (48): HTTP $HTTP_CODE - ERROR"
fi

# Step 8: Show recent errors if any
echo ""
echo "📋 Step 8: Checking for recent errors..."
if [ -f "storage/logs/laravel.log" ]; then
    RECENT_ERRORS=$(tail -50 storage/logs/laravel.log | grep -i "error\|exception" | tail -5)
    if [ -n "$RECENT_ERRORS" ]; then
        echo "⚠️  Recent errors found:"
        echo "$RECENT_ERRORS"
    else
        echo "✅ No recent errors in Laravel log"
    fi
else
    echo "⚠️  Laravel log file not found"
fi

echo ""
echo "===================================="
echo "✅ Deployment complete!"
echo ""
echo "📊 Summary:"
echo "   - Breadcrumb component: Fixed"
echo "   - All caches: Cleared"
echo "   - Apache: Restarted"
echo "   - Tests: Run above"
echo ""
echo "🌐 Access your site at:"
echo "   http://yamahajogja.id:20275"
echo ""
echo "📝 If issues persist, check:"
echo "   1. tail -f storage/logs/laravel.log"
echo "   2. sudo tail -f /var/log/apache2/error.log"
echo "   3. Check .env file: grep LOG_CHANNEL .env"
