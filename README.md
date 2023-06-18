# Laravel Rest API

# The Books list API

#### <a href='https://app.swaggerhub.com/apis-docs/LUCASVOLPATI/api_restful/1.0.0#/Get%20Specified%20Book/get_book__id_'>Swagger Documentation</a>

This API returns a book list to demonstrate how to make good API's

You will need to install docker, in case you never used, you can visit the <a href='https://docs.docker.com/desktop/windows/wsl/'>Docker Desktop site</a> and see how to install and configure (WSL) on windows. 

Usage:

```sh
./vendor/bin/sail up
```
You can use the option (-d) to ignore logs and unlock your terminal.
```sh
./vendor/bin/sail up -d
```

## Running migrations:

### Windows with docker (WSL)
```sh
./vendor/bin/sail artisan migrate
```

### Linux or MAC
```sh
php artisan migrate
```
However, you can use the first command, as Laravel already includes the sail application, to make our lives easier.


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
You can get all of books, with this endpoint:
```sh
http://localhost/api_restful/all_books/{limit}
```

The variable $limit is the max numbers of books that you want.

And with this endpoint you can get the book by your id number, by passing $id.

```sh
http://localhost/api_restful/book/{id}
```
And now, you can do your's requests on Postman, or your favorite app.

Make good use and good luck.
### Developer
* [Lucas A. R. Volpati] | <lucas.volpati@outlook.com> - Developer of this API!
* [Rest API] - The best library API

