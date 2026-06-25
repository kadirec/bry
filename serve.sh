#!/bin/bash
# Video upload için PHP limitlerini geçici olarak yükseltir
php -d upload_max_filesize=100M \
    -d post_max_size=110M \
    -d memory_limit=256M \
    -d max_execution_time=300 \
    artisan serve --port=8000
