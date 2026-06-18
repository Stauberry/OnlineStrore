# shellcheck disable=SC1046
# shellcheck disable=SC1073
# shellcheck disable=SC1035
# shellcheck disable=SC1019
# shellcheck disable=SC1072
# shellcheck disable=SC1020
# shellcheck disable=SC1009


if [ ! -f .env ]; then          # Если нет файла .env (первый запуск)
  composer install               # 1. Устанавливает зависимости
  composer create-project --prefer-dist laravel/laravel ./   # 2. Создает новый Laravel проект
  cp ../.env ./                  # 3. Копирует .env из родительской папки
  cp ../.gitignore ./            # 4. Копирует .gitignore
  php artisan key:generate       # 5. Генерирует ключ приложения
  chown -R www-data:www-data storage          # 6. Дает права на папки
  chown -R www-data:www-data bootstrap/cache
  chmod -R 775 storage
  chmod -R 755 bootstrap/cache
  php artisan migrate            # 7. Запускает миграции
fi

php artisan route:cache
php artisan optimize             # 8. Оптимизирует кеш (всегда) НЕОБХОДИМ всегда когда меняем route
php artisan migrate:fresh --seed # 9. Пересоздает таблицы и заполняет данными
composer update                  # 10. Обновляет зависимости (ВНИМАНИЕ!)
php-fpm                          # 11. Запускает PHP-FPM
