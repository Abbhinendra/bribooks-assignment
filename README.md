# Bribooks Backend Assignment (Laravel + JWT)

## Overview
This is a backend API project built using Laravel.  
It includes JWT authentication and a complete Books CRUD system with search, pagination, image upload, and soft delete.

---

## Tech Stack
- PHP (Laravel)
- MySQL
- JWT (tymon/jwt-auth)

---

## Setup Instructions

### 1. Clone Repository
```bash
git clone https://github.com/Abbhinendra/bribooks-assignment.git
cd bribooks-assignment

composer install
cp .env.example .env
php artisan key:generate


php artisan migrate
 
php artisan jwt:secret

php artisan storage:link

php artisan serve

##Authentication
##Use JWT token in header:

Authorization: Bearer <token>
Content-Type: application/json
Accept: application/json


##API Endpoints
##Auth
POST /api/auth/register 
POST /api/auth/login 
GET /api/auth/profile 

#3Books
##POST /api/books
POST api/books (add book)
GET /api/books (search + pagination)
GET /api/books/{id} (fetch one book)
PUT /api/books/{id} (update book)
DELETE /api/books/{id} (delete book)
