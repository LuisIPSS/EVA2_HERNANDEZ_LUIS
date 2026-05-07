# **Evaluación 2**
### Fase A: Persistencia (Base de Datos).
### Migracion
Para crear una migracion, necesitamos ocupar ```php artisan make:migration``` junto con el nombre de la tabla, en este caso quedaria: ```php artisan make:migration create_table_clients```.
Una vez finalizado de definir la tabla y su estructura, ocupamos ```php artisan migrate``` para aplicar la tabla en la base de datos.

### Fase B: Desarrollo del Servicio (Laravel API).
### Controlador
Para crear un controlador,  necesitamos ocupar ```php artisan make:controller```, definimos el nombre del controlador, en este caso es ```ClientsController``` y le pasamos el parametro ``` --resource ``` para generar automáticamente los métodos básicos de un CRUD. Finalmente el comando quedaria: ```php artisan make:controller ClientsController --resource```

### Modelo
Para crear un modelo, necesitamos ocupar ```php artisan make:model``` y el nombre del modelo, en este caso es ```Client```.
Finalmente el comando quedaria ```php artisan make:model Client```.

# **Endpoints**

### Crea un cliente
```Route::post('v1/clients', [ClientsController::class, 'store']);```

### Extrae a todos los clientes
```Route::get('v1/clients', [ClientsController::class, 'index']);```


### Extrae a un cliente por id
```Route::get('v1/clients/{id}', [ClientsController::class, 'show']);```

### Actualiza un cliente por id
```Route::put('v1/clients/{id}', [ClientsController::class, 'update']);```


### Elimina un cliente por id
```Route::delete('v1/clients/{id}', [ClientsController::class, 'destroy']);```

### Fase C: Validación y Contrato (Postman).

