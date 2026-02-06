#!/bin/bash

# Script Deploy untuk Server
# Jalankan di server: bash server-deploy.sh

echo "========================================="
echo "DEPLOYING SEO UPDATES TO SERVER"
echo "========================================="
echo ""

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Server path
SERVER_PATH="/var/www/html/mataramsakti"

echo -e "${YELLOW}Step 1: Pull latest changes from Git...${NC}"
cd $SERVER_PATH
git pull origin main

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Git pull successful${NC}"
else
    echo -e "${RED}✗ Git pull failed${NC}"
    exit 1
fi
echo ""

echo -e "${YELLOW}Step 2: Fix permissions...${NC}"
sudo chown -R www-data:www-data storage/
sudo chmod -R 775 storage/
sudo chown -R www-data:www-data bootstrap/cache/
sudo chmod -R 775 bootstrap/cache/
echo -e "${GREEN}✓ Permissions fixed${NC}"
echo ""

echo -e "${YELLOW}Step 3: Clear all caches...${NC}"
php artisan view:clear
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan optimize:clear
echo -e "${GREEN}✓ Caches cleared${NC}"
echo ""

echo -e "${YELLOW}Step 4: Verify files exist...${NC}"
echo "Checking sitemap.xml..."
if [ -f "public/sitemap.xml" ]; then
    echo -e "${GREEN}✓ sitemap.xml exists${NC}"
else
    echo -e "${RED}✗ sitemap.xml NOT found${NC}"
fi

echo "Checking robots.txt..."
if [ -f "public/robots.txt" ]; then
    echo -e "${GREEN}✓ robots.txt exists${NC}"
else
    echo -e "${RED}✗ robots.txt NOT found${NC}"
fi

echo "Checking location-wates.blade.php..."
if [ -f "resources/views/location-wates.blade.php" ]; then
    echo -e "${GREEN}✓ location-wates.blade.php exists${NC}"
else
    echo -e "${RED}✗ location-wates.blade.php NOT found${NC}"
fi
echo ""

echo -e "${YELLOW}Step 5: Test URLs...${NC}"
echo "Testing sitemap.xml..."
curl -I http://localhost:20275/sitemap.xml 2>&1 | grep "HTTP"

echo "Testing robots.txt..."
curl -I http://localhost:20275/robots.txt 2>&1 | grep "HTTP"

echo "Testing location page..."
curl -I http://localhost:20275/dealer-yamaha-wates 2>&1 | grep "HTTP"

echo "Testing homepage..."
curl -I http://localhost:20275/ 2>&1 | grep "HTTP"
echo ""

echo -e "${GREEN}=========================================${NC}"
echo -e "${GREEN}DEPLOYMENT COMPLETE!${NC}"
echo -e "${GREEN}=========================================${NC}"
echo ""
echo -e "${YELLOW}NEXT STEPS:${NC}"
echo "1. Setup Google Search Console: https://search.google.com/search-console"
echo "2. Setup Google My Business: https://business.google.com"
echo "3. Submit sitemap: http://yamahajogja.id:20275/sitemap.xml"
echo "4. Request indexing for all pages"
echo ""
echo -e "${YELLOW}Documentation:${NC}"
echo "- GOOGLE_SEARCH_CONSOLE_SETUP.md"
echo "- GOOGLE_MY_BUSINESS_SETUP.md"
echo "- ACTION_PLAN_RANKING_PAGE_1.md"
echo ""
