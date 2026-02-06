#!/bin/bash

# Deploy Location Pages & SEO Updates to Production Server
# Run this script to deploy all location-specific pages and SEO improvements

echo "========================================="
echo "DEPLOYING LOCATION PAGES & SEO UPDATES"
echo "========================================="
echo ""

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Server details
SERVER_PATH="/var/www/html/mataramsakti"

echo -e "${YELLOW}Step 1: Committing changes to Git...${NC}"
git add .
git commit -m "Add location-specific pages for local SEO - Wates, Kulon Progo, Sleman, Bantul, Gunung Kidul, Wonosari"
git push origin main

echo -e "${GREEN}✓ Changes committed and pushed${NC}"
echo ""

echo -e "${YELLOW}Step 2: Deploying to server...${NC}"
echo "Please run these commands on your server:"
echo ""
echo "========================================="
echo "COMMANDS TO RUN ON SERVER:"
echo "========================================="
echo ""
echo "cd $SERVER_PATH"
echo ""
echo "# Pull latest changes"
echo "git pull origin main"
echo ""
echo "# Clear all caches"
echo "php artisan view:clear"
echo "php artisan cache:clear"
echo "php artisan config:clear"
echo "php artisan route:clear"
echo "php artisan optimize:clear"
echo ""
echo "# Verify location pages exist"
echo "ls -la resources/views/location-*.blade.php"
echo ""
echo "# Test location pages"
echo "curl -I http://localhost:20275/dealer-yamaha-wates"
echo "curl -I http://localhost:20275/dealer-yamaha-kulon-progo"
echo "curl -I http://localhost:20275/dealer-yamaha-sleman"
echo "curl -I http://localhost:20275/dealer-yamaha-bantul"
echo "curl -I http://localhost:20275/dealer-yamaha-gunung-kidul"
echo "curl -I http://localhost:20275/dealer-yamaha-wonosari"
echo ""
echo "# Verify sitemap & robots.txt"
echo "curl -I http://localhost:20275/sitemap.xml"
echo "curl -I http://localhost:20275/robots.txt"
echo ""
echo "========================================="
echo ""

echo -e "${GREEN}✓ Deployment script completed${NC}"
echo ""
echo -e "${YELLOW}NEXT STEPS (CRITICAL):${NC}"
echo "1. Run the commands above on your server"
echo "2. Setup Google Search Console (see CRITICAL_SEO_ACTIONS.md)"
echo "3. Create Google My Business listing"
echo "4. Submit sitemap to Google Search Console"
echo ""
echo -e "${GREEN}Expected Result:${NC}"
echo "- 6 new location pages will be live"
echo "- Each page optimized for local SEO"
echo "- Ranking will improve in 2-4 weeks"
echo ""
