#!/bin/bash

echo "🧪 Testing Routes & Database"
echo "============================"
echo ""

# Test database connection
echo "1. Testing database connection:"
php artisan tinker --execute="try { DB::connection()->getPdo(); echo 'Database: Connected'; } catch (Exception \$e) { echo 'Database Error: ' . \$e->getMessage(); }"

echo ""
echo ""

# Test if we can fetch a motor
echo "2. Testing motor query:"
php artisan tinker --execute="try { \$motor = App\Models\Motor::find(1); echo 'Motor found: ' . \$motor->name; } catch (Exception \$e) { echo 'Motor Error: ' . \$e->getMessage(); }"

echo ""
echo ""

# List all routes
echo "3. Available routes:"
php artisan route:list | grep motor | head -10

echo ""
echo ""

# Test a simple route
echo "4. Testing homepage route:"
curl -s http://localhost:20275/ | head -20 | tail -10

echo ""
echo "============================"
