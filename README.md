# Laravel Rest API

# The Books list API

#### <a href='https://app.swaggerhub.com/apis-docs/LUCASVOLPATI/api_restful/1.0.0#/Get%20Specified%20Book/get_book__id_'>Swagger Documentation</a>

This API returns a book list to demonstrate how to make good API's

## Required
```sh
php >= 8.2
composer
docker
```

To install docker, in case you never used, you can visit the <a href='https://docs.docker.com/desktop/windows/wsl/'>Docker Desktop site</a> and see how to install and configure (WSL) on windows. 

## Usage (windows WSL):
### 1 - Install composer dependencies
```sh
./vendor/bin/sail composer install
or
./vendor/bin/sail composer update
```
### 2 - Exec sail command to start the docker container
```sh
./vendor/bin/sail up
```
You can use the option (-d) to ignore logs and unlock your terminal.
```sh
./vendor/bin/sail up -d
```

## Running migrations:

```sh
./vendor/bin/sail artisan migrate
```

## Registering user and start API

On the home page you have a form to register new users, and receive the token for using the API in your email.
```sh
http://localhost/api_restful/
```

### Starting application
Now to use this API you need some data. So enter this url in your browser to generate some data (key for JWT and some books for you to get in requests).

```sh
http://localhost/api_restful/preparations
```

## Endpoints
### 1 - /all_books/{limit}
You can get all of books, with this endpoint:
```sh
http://localhost/api_restful/all_books/{limit}
```

The variable $limit is the max numbers of books that you want.

### 2 - /book/{id}
With this endpoint you can get the book by your id number, by passing $id.

```sh
http://localhost/api_restful/book/{id}
```
And now, you can do your's requests on Postman, or your favorite app, but don't forget your token, you should put it on your header requisition, as bellow:
```sh
JS
fetch('https://localhost/all_books/10', {
    method: 'GET',
    headers: {
        Authorization: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c'
    }
}).then(result => result.text())
```

Make good use and good luck.
### Developer
* [Lucas A. R. Volpati] | <lucas.volpati@outlook.com> - Developer of this API!
* [Rest API] - The best library API

