## Prueba técnica Netcommerce

### Descripción
Desarrollar una aplicación tipo API, en donde se apliquen todos los conocimientos posibles
acerca del framework Laravel 10.x y versiones anteriores. Esta API no requiere de autenticación
para los distintos endpoints, se requiere consumir listados de tareas relacionados a usuarios y
empresas.

Se implementaron dos endpoint
- `/companies GET`. Listado de companies existentes con sus tasks asociadas y posible filtrado por nombre de las companies.
- `/tasks/create POST`. Creación de nuevas tasks con datos provistos en el cuerpo de la request y regresando la task recién creada como respuesta.

### Evidencia

#### Endpoint `/companies GET`

![companies GET](/storage/app/evidences/companies-get-endpoint-with-search.png)

#### Endpoint `/tasks/create POST`

![tasks/create POST](/storage/app/evidences/task-store-endpoint.png)
