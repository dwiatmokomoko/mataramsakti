#!/bin/bash

echo "🔍 Checking Laravel Errors"
echo "=========================="
echo ""

# Check Laravel log
echo "📋 Last 30 lines of Laravel log:"
tail -30 storage/logs/laravel.log

echo ""
echo "=========================="
echo ""

# Check Apache error log
echo "📋 Last 20 lines of Apache error log:"
sudo tail -20 /var/log/apache2/error.log

echo ""
echo "=========================="
