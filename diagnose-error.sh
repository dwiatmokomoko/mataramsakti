#!/bin/bash

echo "🔍 Diagnosing 500 Error"
echo "======================="

# Check if breadcrumb-fixed.blade.php exists and might be interfering
echo ""
echo "1. Checking for duplicate breadcrumb files:"
find resources/views -name "*breadcrumb*.blade.php" -type f

# Check the actual breadcrumb component
echo ""
echo "2. Current breadcrumb component content:"
echo "   Checking for unescaped @context and @type..."
if grep -n '"@context"' resources/views/components/breadcrumb.blade.php; then
    echo "   ❌ FOUND UNESCAPED @context"
else
    echo "   ✅ No unescaped @context"
fi

if grep -n '"@type"' resources/views/components/breadcrumb.blade.php; then
    echo "   ❌ FOUND UNESCAPED @type"
else
    echo "   ✅ No unescaped @type"
fi

# Check Laravel logs
echo ""
echo "3. Last 20 lines of Laravel log:"
tail -20 storage/logs/laravel.log

# Check Apache error log
echo ""
echo "4. Last 10 lines of Apache error log:"
sudo tail -10 /var/log/apache2/error.log

# Check .env for LOG_CHANNEL
echo ""
echo "5. Checking .env LOG_CHANNEL:"
grep "LOG_CHANNEL" .env

# Test database connection
echo ""
echo "6. Testing database connection:"
php artisan tinker --execute="DB::connection()->getPdo(); echo 'Database connected successfully';"

echo ""
echo "======================="
echo "Diagnosis complete!"
