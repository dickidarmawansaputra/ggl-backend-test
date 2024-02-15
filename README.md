<h3 align="center">GGL Backend Test</h3>

## Local Setup
- Clone project from github & move to local web server directory. Example: using laragon & automatic created `Apache virtual host`
- Install dependencies `composer install`.
- Duplicate `.env` from `.env.example` and setup database.
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan db:seed`
- Default user credentials: `email: admin@admin.com password: admin`
- Run `php artisan passport install` & example output:
  
  ```
  Encryption keys generated successfully.
  Personal access client created successfully.
  Client ID: 1
  Client secret: bWKdBX5mIMObmVaiU4cMQfsxrdxhvbcaPVNtiBfZ
  Password grant client created successfully.
  Client ID: 2
  Client secret: SgyascA4dDiZiAdt8QdUZcNWOkei6Cm4UQQV46df
  ```
- Next you need to add the Password grant CLIENT_ID and CLIENT_SECRET to your .env file:
  ```
  CLIENT_WEB_ID=2
  CLIENT_WEB_SECRET:SgyascA4dDiZiAdt8QdUZcNWOkei6Cm4UQQV46df
  ```
- Run locally & access in browser, example: URL in `.env`
  ```
  API_URL=http://ggl-backend-test.test
  ```

## API Docs
- [API Documentations generator](https://apiato.io/docs/additional-features/documentation).
