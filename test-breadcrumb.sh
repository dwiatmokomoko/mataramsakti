#!/bin/bash

echo "🧪 Testing Breadcrumb Component"
echo "================================"
echo ""

# Check current breadcrumb content
echo "1. Current breadcrumb component:"
echo "   Checking for @ symbols..."
grep -n '@context\|@type' resources/views/components/breadcrumb.blade.php | head -10

echo ""
echo "2. Counting @ symbols:"
echo "   Unescaped @context: $(grep -c '"@context"' resources/views/components/breadcrumb.blade.php || echo 0)"
echo "   Escaped @@context: $(grep -c '"@@context"' resources/views/components/breadcrumb.blade.php || echo 0)"
echo "   Unescaped @type: $(grep -c '"@type"' resources/views/components/breadcrumb.blade.php || echo 0)"
echo "   Escaped @@type: $(grep -c '"@@type"' resources/views/components/breadcrumb.blade.php || echo 0)"

echo ""
echo "3. Checking for duplicate breadcrumb files:"
find . -name "*breadcrumb*.blade.php" -type f 2>/dev/null

echo ""
echo "4. Checking compiled views:"
ls -lh storage/framework/views/ | head -10

echo ""
echo "5. Testing PHP syntax of breadcrumb component:"
php -l resources/views/components/breadcrumb.blade.php

echo ""
echo "================================"
