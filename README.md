# Optima Kyivstar Mobile

Directory structure:
- `backend` - Laravel API and admin panel
- `frontend-app` - Ionic Angular mobile app

## Setup

Run the following commands after cloning:

```bash
composer install
php artisan migrate --seed
npm install --prefix frontend-app
npm run build --prefix frontend-app
```

To start using Docker:

```bash
docker-compose up -d
```
