

## How to set up and run the API 

## Clone the repository

git clone <repo-url>
cd healthcare_api

composer install
cp .env.example .env  
###[note::change db credential]   
php artisan key:generate
php artisan migrate --seed
php artisan serve

==================================
git clone <repo-url>
cd healthcare-api
docker-compose up -d

docker exec -it laravel_app bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
exit

API: http://localhost:8080

MySQL: port 3306 (user / password)
==================================

## API :: You can check on postman

- Register: POST /api/register → receive token

- Login: POST /api/login → receive token

## Below API Use Bearer TOKEN in Authorization header, Accept:application/json in header

- Book: POST /api/appointments

- View: GET /api/appointments

- Cancel: PUT /api/appointments/{id}/cancel

- Professionals: GET /api/professionals

##Login :: http://127.0.0.1:8000/api/login
email :: test@yopmail.com
password :: 123456

----------------------------------

Method: POST

URL: http://127.0.0.1:8000/api/register

Headers:
	Content-Type: application/json

Body (JSON):
		name:neeraj
		email:neeraj@yopmail.com
		password:123456

--------------------------------------------------------------

Method: POST

URL: http://127.0.0.1:8000/api/login

Headers:
	Content-Type: application/json

Body (JSON):
	email:neeraj@yopmail.com
	password:123456

------------------------------------------
Method: GET

URL: http://127.0.0.1:8003/api/professionals

Headers:
	Authorization: Bearer 2|4Df3GCwCAUBw29ZFTTNBdVF8pIl0prAvn91AVIiM6adba485
	Content-Type: application/json

------------------------------------------
Method: GET

URL: http://127.0.0.1:8000/api/appointments

Headers:
	Authorization: Bearer 2|4Df3GCwCAUBw29ZFTTNBdVF8pIl0prAvn91AVIiM6adba485
	Content-Type: application/json
------------------------------------------

Method: POST

URL: http://127.0.0.1:8000/api/appointments

Headers:
	Authorization: Bearer 2|4Df3GCwCAUBw29ZFTTNBdVF8pIl0prAvn91AVIiM6adba485
	Content-Type: application/json

Body (JSON):
	healthcare_professional_id:1
	appointment_start_time:2025-08-05 10:30:00
	appointment_end_time:2025-08-05 11:00:00

------------------------------------------

Method: PUT

URL: http://127.0.0.1:8000/api/appointments/1/cancel

Headers:

	Authorization: Bearer 2|4Df3GCwCAUBw29ZFTTNBdVF8pIl0prAvn91AVIiM6adba485
	Content-Type: application/json

------------------------------------------

Method: PUT

URL: http://127.0.0.1:8000/api/appointments/1/complete

Headers:

	Authorization: Bearer 2|4Df3GCwCAUBw29ZFTTNBdVF8pIl0prAvn91AVIiM6adba485
	Content-Type: application/json

------------------------------------------






