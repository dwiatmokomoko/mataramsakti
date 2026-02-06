# Breadcrumb Component Fix Guide

## Problem
Motor detail pages showing ParseError:
```
ParseError: syntax error, unexpected end of file, expecting "elseif" or "else" or "endif"
File: resources/views/components/breadcrumb.blade.php:59
```

## Root Cause
The server version of `breadcrumb.blade.php` has a syntax error - missing or mismatched `@endif` directive in the Blade template.

## Solution

### Option 1: Automated Fix (Recommended)

Run the fix script on your server:

```bash
cd /var/www/html/mataramsakti

# Pull latest changes
git pull origin main

# Make script executable
chmod +x fix-breadcrumb.sh

# Run the fix
./fix-breadcrumb.sh
```

### Option 2: Manual Fix

If you want to keep the server version and fix it manually:

```bash
cd /var/www/html/mataramsakti

# Backup current file
cp resources/views/components/breadcrumb.blade.php resources/views/components/breadcrumb.blade.php.backup

# Edit the file
nano resources/views/components/breadcrumb.blade.php
```

Make sure all Blade directives are properly closed:
- Every `@if` must have a matching `@endif`
- Every `@foreach` must have a matching `@endforeach`
- Check line 54-56 for the JSON-LD structured data section

After fixing:

```bash
# Clear view cache
php artisan view:clear

# Test the page
curl -I http://localhost:20275/motor/1
```

### Option 3: Force Overwrite with Git Version

If you want to use the Git version (not recommended if you have local changes):

```bash
cd /var/www/html/mataramsakti

# Backup current file
cp resources/views/components/breadcrumb.blade.php resources/views/components/breadcrumb.blade.php.backup

# Overwrite with Git version
git checkout origin/main -- resources/views/components/breadcrumb.blade.php

# Clear view cache
php artisan view:clear

# Test the page
curl -I http://localhost:20275/motor/1
```

## Testing

After applying the fix:

1. **Test locally on server:**
   ```bash
   curl -I http://localhost:20275/
   curl -I http://localhost:20275/motor/1
   ```
   
   Both should return `HTTP/1.1 200 OK`

2. **Test in browser:**
   - Homepage: http://localhost:20275/
   - Motor detail: http://localhost:20275/motor/1
   
   Should display without errors

3. **Test public access:**
   - First, disable Cloudflare proxy (see below)
   - Then access: http://yamahajogja.id:20275/

## Cloudflare Configuration for Custom Port

Cloudflare proxy does NOT support custom ports. You have two options:

### Option A: Disable Cloudflare Proxy (Recommended for Port 20275)

1. Login to Cloudflare dashboard
2. Go to DNS settings
3. Find the `yamahajogja.id` A record
4. Click the orange cloud icon to turn it gray (DNS only)
5. Wait 1-2 minutes for DNS propagation
6. Access: http://yamahajogja.id:20275/

**Pros:**
- Custom port works
- Direct connection to server

**Cons:**
- No Cloudflare CDN/caching
- No DDoS protection
- Server IP exposed

### Option B: Use Standard Port 80/443 with Cloudflare Proxy

1. Change Apache to listen on port 80 (or 443 for HTTPS)
2. Update `.env`: `APP_URL=https://yamahajogja.id`
3. Keep Cloudflare proxy enabled (orange cloud)
4. Access: https://yamahajogja.id/

**Pros:**
- Cloudflare CDN/caching
- DDoS protection
- SSL/TLS encryption
- Server IP hidden

**Cons:**
- Must use standard ports (80/443)
- Cannot use custom port 20275

## Current Configuration

Based on your `.env`:

```env
APP_URL=http://yamahajogja.id:20275
DB_CONNECTION=pgsql
DB_PORT=3424
```

**Apache Configuration:**
- Listening on port 20275
- Virtual host configured for yamahajogja.id

**Database:**
- PostgreSQL on port 3424
- Database: company_profile_xxx

## Verification Checklist

- [ ] Homepage loads: http://localhost:20275/
- [ ] Motor detail loads: http://localhost:20275/motor/1
- [ ] No ParseError in breadcrumb component
- [ ] Breadcrumb displays correctly on detail pages
- [ ] Cloudflare proxy disabled (if using port 20275)
- [ ] Public access works: http://yamahajogja.id:20275/

## Troubleshooting

### Still getting 500 error after fix?

```bash
# Check Laravel logs
tail -f storage/logs/laravel.log

# Check Apache logs
sudo tail -f /var/log/apache2/error.log

# Clear all caches
php artisan optimize:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear
```

### Breadcrumb not displaying?

Check if the component is being called correctly in `motor-detail.blade.php`:

```blade
<x-breadcrumb :items="[
    ['title' => 'Motor', 'url' => route('motors')],
    ['title' => $motor->name]
]" />
```

### Public access not working?

1. Check if Cloudflare proxy is disabled (gray cloud)
2. Verify DNS propagation: `nslookup yamahajogja.id`
3. Check if port 20275 is open in firewall:
   ```bash
   sudo ufw status
   sudo ufw allow 20275/tcp
   ```

## Production Recommendations

Once everything is working:

1. **Set production mode:**
   ```bash
   nano .env
   ```
   Change:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   ```

2. **Optimize for production:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Restart Apache:**
   ```bash
   sudo systemctl restart apache2
   ```

## Support

If you continue to have issues:

1. Check the full error in `storage/logs/laravel.log`
2. Verify Apache is running: `sudo systemctl status apache2`
3. Test database connection: `php artisan migrate:status`
4. Ensure permissions are correct:
   ```bash
   sudo chown -R www-data:www-data /var/www/html/mataramsakti
   sudo chmod -R 775 storage bootstrap/cache
   ```
