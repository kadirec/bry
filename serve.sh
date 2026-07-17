#!/bin/bash
# Video upload için PHP limitlerini geçici olarak yükseltir.
# display_errors=stderr → artisan serve'in access-log broken pipe notice'ları
# HTML çıktısına sızmasın; gerçek exception'lar Whoops üzerinden gösterilir.
php -d upload_max_filesize=100M \
    -d post_max_size=110M \
    -d memory_limit=256M \
    -d max_execution_time=0 \
    -d display_errors=stderr \
    artisan serve --port=8000
