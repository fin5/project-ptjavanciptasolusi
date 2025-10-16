echo "Setting File Permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "Running Composer Install..."
composer install --no-dev --prefer-dist --working-dir=/var/www/html

echo "Caching and Optimization..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache

echo "Running Migrations (Force)..."
php artisan migrate --force

echo "Creating Storage Link..."
php artisan storage:link

echo "Deployment finished."
