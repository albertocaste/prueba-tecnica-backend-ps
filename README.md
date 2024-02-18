# Prueba técnica Laravel

## Requisitos

Prueba técnica que consiste en la creación de una API con un endpoint que se encarga de transformar una ‘url’ a una ‘short url’ con Laravel.

## Análisis

Siguiendo buenas prácticas de desarrollo y tras analizar los requisitos, se ha decidido implementar una arquitectura hexagonal (puertos y adaptadores) que ayude a escalar el proyecto e identificar correctamente las diferentes capas del mismo. Además, se ha aplicado la técnica de modularización (vertical slicing) para identificar el dominio de negocio. En este caso, se ha determinado que el concepto de "Site" es el nombre más adecuado para el módulo y que engloba un conjunto de valores comunes, como las "url" y la "short url", con las que se trabajará. Todo esto se encuentra dentro de un contexto de negocio (Bounded Context) que, dado que no se conoce, se ha denominado "Context".

## Testing

Se ha trabajado con TDD para la creación del código, identificando de primeras los 3 tipos de test a realizar:

- Test unitario: Caso de uso para la creación de short url.
- Test de integración: Comprobar el funcionamiento de la implementación de Tiny URL API.
- Test de aceptación (e2e): Comprobación del flujo entero desde el POST del cliente hasta la respuesta al mismo.

Para lanzar los test utilizar el siguiente comando:
```
php artisan test
```

## Problema de los paréntesis

Para el control del token de autorización se ha implementado un middleware que valida el problema del balanceo de paréntesis.
