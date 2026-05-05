Se crea la migracion 
php artisan make:migration create_table_clients
php artisan migrate

Se crea el controlador
php artisan make:controller ClientsController --resource

Se crea el modelo 
php artisan make:model Client

Endpoints

// Crea un cliente
Route::post('v1/clients', [ClientsController::class, 'store']);

http://localhost/api/v1/clients/?rut=12.232.343-4&first_name=adasdasd&last_name=sdasdas&email=dasdas@adsfds.cl&phone_number=343434

// Extrae a todos los clientes
Route::get('v1/clients', [ClientsController::class, 'index']);

http://localhost/api/v1/clients/

// Extrae a un cliente por id
Route::get('v1/clients/{id}', [ClientsController::class, 'show']);

http://localhost/api/v1/clients/{id}

// Actualiza un cliente por id
Route::put('v1/clients/{id}', [ClientsController::class, 'update']);

http://localhost/api/v1/clients/1?rut=12.232.343-7&first_name=axddd&last_name=sdasdas&email=111@adsfds.cl&phone_number=343434

// Elimina un cliente por id
Route::delete('v1/clients/{id}', [ClientsController::class, 'destroy']);

http://localhost/api/v1/clients/2


### 3. Instrucciones Técnicas (El "Sprint 1")
Fase A: Persistencia (Base de Datos)

Utilizando las herramientas de tu Stack Técnico (DBeaver/TablePlus y Laravel Migrations):

1. Crear una migración para la tabla clientes con los campos:
    id, rut, nombre, apellido, email y teléfono.
2. Asegurar que el campo rut y email sean únicos (Unique constraints).
3. Ejecutar la migración dentro del contenedor Docker para impactar la base de datos MySQL.

### Fase B: Desarrollo del Servicio (Laravel API)
1. Modelo:
    Crear el modelo Cliente con sus propiedades fillable.
2. Controlador:
    Crear un ClienteController (tipo --resource o manual).
3. Endpoints Requeridos:
   1. GET /api/v1/clientes
    Listar todos los clientes (debe devolver un JSON).
   2. POST /api/v1/clientes
    Registrar un nuevo cliente (debe devolver un código 201 Created).
   3. GET /api/v1/clientes/{id}
    Consultar un cliente específico.
### Fase C: Validación y Contrato (Postman)
1. Actualizar la colección de Postman EVA2_APELLIDO.
2. Cada solicitud debe incluir los headers correctos:
Accept: application/json
3. Simular un error de validación (ej: enviar un email repetido) y verificar que la API responda con código:
422 Unprocessable Entity

### Protocolo de Entrega
INSTRUCCIONES DE ENTREGA
1. Formato de Archivo:
    El proyecto debe ser comprimido exclusivamente en un archivo .zip.
    No se aceptarán otros formatos de compresión.
2. Nomenclatura del Archivo:
    El nombre debe seguir el formato:
    EVA_UX_Apellido.zip
    (donde X es el número de la unidad correspondiente).
3. Procedimiento en Plataforma:
    Todos los integrantes del grupo deben realizar la carga del archivo a la plataforma.
    Es obligatorio indicar el nombre del equipo y el listado completo de los integrantes en el recuadro de texto de la entrega.
    Criterios de Evaluación:
    La corrección se realizará estrictamente bajo la rúbrica disponible en la plataforma para esta unidad.
### ⚠️ Penalizaciones

El incumplimiento de estas normas de “seniority” penalizará la nota final:
1. GitHub:
Realizar push al mismo repositorio privado creado en la unidad.
Se evaluará el historial de cambios (commits).
2. README.md:
Actualizar el archivo indicando los pasos para ejecutar las migraciones:
php artisan migrate
3. Postman:
Adjuntar el archivo JSON de la colección actualizada en la raíz del proyecto.
