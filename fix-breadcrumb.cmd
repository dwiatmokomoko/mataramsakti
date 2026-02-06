@echo off
REM Fix breadcrumb component syntax error on Windows

echo 🔧 Fixing breadcrumb component...

REM This command should be run on the server
echo.
echo ⚠️  This script needs to be run on the Linux server!
echo.
echo 📋 Run these commands on your server:
echo.
echo cd /var/www/html/mataramsakti
echo chmod +x fix-breadcrumb.sh
echo ./fix-breadcrumb.sh
echo.
echo OR manually run:
echo.
echo # Backup current file
echo cp resources/views/components/breadcrumb.blade.php resources/views/components/breadcrumb.blade.php.backup
echo.
echo # Clear view cache
echo php artisan view:clear
echo.
echo # Test the page
echo curl -I http://localhost:20275/motor/1
echo.
pause
