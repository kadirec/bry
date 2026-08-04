# bry-cms

Laravel tabanlı CMS. **BRY (Bilinçli Ritmik Yaşam)** sitesinin tek ve resmi kaynağıdır.

## Kapsam

- `bry-cms/` altındaki kod canlıya çıkacak versiyondur.
- Repo kökündeki (`../`) eski statik HTML site (index.html, iletisim.html, css/, js/, assets/ vb.) **kullanım dışıdır ve kaldırılmıştır**. O dizinlere referans verme, oraya kod yazma.

## Lokal çalıştırma

```bash
bash serve.sh        # PHP dev server → http://127.0.0.1:8000
npm run dev          # Vite dev server → http://localhost:5173
```

`serve.sh` video upload için PHP limitlerini yükseltir (upload_max_filesize=100M, post_max_size=110M, memory_limit=256M).

## Stack

- Laravel 13, PHP artisan serve
- Vite 8 + Tailwind 4 (vite.config.js)
- Public CSS: `public/css/app.css`
- Views: `resources/views/` (Blade)
- Ana ortak partial: `resources/views/partials/contact-cta.blade.php`

## Notlar

- Native `<select>` renk sorunu: `.news-form select` beyaz text kullanıyor, `<option>`'lar Windows/Chromium'da parent renginden geliyor. `app.css` içinde `option { color:#14191A; background:#fff }` override'ı var — dropdown okunabilirliği için gerekli.
