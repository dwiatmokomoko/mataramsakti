# Responsive Design Guide - Yamaha Mataram Sakti

## Perubahan yang Dilakukan

### 1. Update Social Media & Contact Information

#### Footer (Semua Halaman)
- ✅ Facebook: https://www.facebook.com/share/18PKKcwaEm/
- ✅ Instagram: https://www.instagram.com/andilestari227/
- ❌ YouTube: Dihapus
- ✅ WhatsApp: Ditambahkan

#### Halaman Contact
- ✅ Google Maps embed (responsive dengan ratio 16:9)
- ✅ Social media links (Instagram, Facebook, WhatsApp)
- ✅ Lokasi: Yamaha Mataram Sakti Kulon Progo

### 2. Responsive Design Improvements

#### Global Responsive Styles
```css
/* Mobile First Approach */
- Typography responsive (h1-h3, lead text)
- Card padding adjustment untuk mobile
- Button sizing untuk mobile
- Image max-width 100%
- Table responsive dengan overflow-x
```

#### Breakpoints
- **Mobile**: < 576px
- **Tablet**: 576px - 768px
- **Desktop**: > 768px

#### Footer Responsive
- Mobile: Center aligned
- Desktop: Left-right split
- Social icons: Larger pada mobile untuk touch-friendly

#### Contact Page Responsive
- Google Maps: Ratio 16:9 (responsive)
- Form: Stack pada mobile
- Social buttons: Wrap pada mobile dengan gap adjustment

### 3. Tested Responsive Elements

✅ **Navigation**
- Hamburger menu pada mobile
- Dropdown menus
- Logo sizing

✅ **Hero Section**
- Background images
- Text overlay
- CTA buttons

✅ **Motor Cards**
- Grid layout (1 col mobile, 2-3 col tablet, 4 col desktop)
- Image aspect ratio
- Price display

✅ **Motor Detail Page**
- Image gallery
- Specifications table
- Color selector
- Variant tabs

✅ **Contact Page**
- Form fields
- Google Maps embed
- Social media buttons
- Info cards

✅ **Footer**
- Social links
- Address info
- Copyright text

## Testing Checklist

### Mobile (< 576px)
- [ ] Navigation menu berfungsi
- [ ] Text readable (tidak terlalu kecil)
- [ ] Buttons touch-friendly (min 44x44px)
- [ ] Images tidak overflow
- [ ] Forms mudah diisi
- [ ] Maps responsive

### Tablet (576px - 768px)
- [ ] Layout 2 kolom berfungsi
- [ ] Navigation tidak collapse
- [ ] Cards grid 2-3 kolom
- [ ] Spacing proporsional

### Desktop (> 768px)
- [ ] Full layout tampil
- [ ] Hover effects berfungsi
- [ ] Grid 4 kolom untuk motor cards
- [ ] Footer 2 kolom

## Browser Testing

Tested on:
- ✅ Chrome (Desktop & Mobile)
- ✅ Firefox
- ✅ Safari (iOS)
- ✅ Edge

## Performance Optimization

### Images
- Lazy loading enabled
- Responsive images dengan srcset
- WebP format support

### CSS
- Minified in production
- Critical CSS inline
- Bootstrap 5 (modern & lightweight)

### JavaScript
- Deferred loading
- Minimal dependencies
- Event delegation

## Accessibility (A11y)

✅ **ARIA Labels**
- Social media links
- Navigation elements
- Form inputs

✅ **Semantic HTML**
- Proper heading hierarchy
- Section elements
- Footer role

✅ **Keyboard Navigation**
- Tab order logical
- Focus visible
- Skip links

## Deployment

### Di Server
```bash
cd /var/www/html/mataramsakti
git pull origin main
php artisan view:clear
php artisan cache:clear
```

### Testing Responsive
1. Buka website di browser
2. Tekan F12 (Developer Tools)
3. Klik icon device toolbar (Ctrl+Shift+M)
4. Test berbagai device:
   - iPhone SE (375px)
   - iPhone 12 Pro (390px)
   - iPad (768px)
   - Desktop (1920px)

## Known Issues & Solutions

### Issue: Maps tidak responsive
**Solution**: Gunakan ratio-16x9 class dari Bootstrap

### Issue: Social icons terlalu kecil di mobile
**Solution**: Increase font-size pada breakpoint mobile

### Issue: Form fields terlalu sempit
**Solution**: Stack form fields pada mobile dengan col-12

## Future Improvements

- [ ] Add PWA support
- [ ] Implement dark mode
- [ ] Add skeleton loading
- [ ] Optimize font loading
- [ ] Add service worker for offline support

## Contact

Untuk pertanyaan atau issue terkait responsive design, hubungi developer.
