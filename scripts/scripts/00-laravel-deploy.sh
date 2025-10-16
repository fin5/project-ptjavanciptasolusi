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
