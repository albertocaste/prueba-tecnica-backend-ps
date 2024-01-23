## REQUISITOS

Prueba técnica que consiste en la creación de una API con un endpoint que se encarga de transformar una ‘url’ a una ‘short url’ con Laravel.

## ANÁLSIS

Siguiendo buenas prácticas de desarrollo y tras analizar los requisitos, se ha decidido implementar una arquitectura hexagonal (puertos y adaptadores) que ayude a escalar el proyecto e identificar correctamente las diferentes capas del mismo. Además, se ha aplicado la técnica de modularización (vertical slicing) para identificar el dominio de negocio. En este caso, se ha determinado que el concepto de "Site" puede englobar un conjunto de valores comunes, como las URL y las URL cortas, con las que se trabajará. Todo esto se encuentra dentro de un contexto de negocio (Bounded Context) que, dado que no se conoce, se ha denominado "Context".

## TESTING

Se ha trabajado con TDD para la creación del código identificando de primeras los 3 tipos de test a realizar:

- **Test unitario: Caso de uso para la creación de short url
- **Test de integración: Comprobar el funcionamiento de la implementación de Tiny URL API
- **Test de aceptación (e2e): Comprobación del flujo entero desde el POST del cliente hasta la respuesta al mismo.

Para lanzar los test utilizar el siguiente comando.

##PROBLEMA DE LOS PARÉNTISIS

Para el control del token de autorización se ha implementado un middleware que valida el problema del balanceo de paréntesis.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).
