

## How to set up and run the API 

### Clone the repository

```bash
git clone <repo-url>
cd healthcare_api

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve

### API :: you can check on postman
- Register: POST /api/register

- Login: POST /api/login → receive token

- Use Bearer TOKEN in Authorization header

- Book: POST /api/appointments

- View: GET /api/appointments

- Cancel: PUT /api/appointments/{id}/cancel

- Professionals: GET /api/professionals
