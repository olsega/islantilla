# Proyecto Symfony islantilla
## Recuperar el proyecto
    a. Pasos para restaurar el proyecto: 
        i.  composer install
        ii. php bin/console doctrine:database:create
        iii.php bin/console make:migration
        iv. php bin/console doctrine:migrations:migrate

    b. EndPoints:
        - http://localhost:8000/usuarios                Muestra todos los registros
        - http://localhost:8000/usuarios/new            Crea registro
        - http://localhost:8000/usuarios/{id}           Muestra/Borra
        - http://localhost:8000/usuarios/{id}/edit      Edita registro
        - http://localhost:8000/tratamientos/           Muestra todos los registros
        - http://localhost:8000/tratamientos/new        Crea registro
        - http://localhost:8000/tratamientos/{id}       Muestra/Borra
        - http://localhost:8000/tratamientos/{id}/edit  Edita registro
        - http://localhost:8000/citas/new               Crea registro
        - http://localhost:8000/citas                   JOIN JSON
        - http://localhost:8000/tratamiento_citas       JOIN JSON

    c. Nuestra BBDD es 'islantilla'. Tiene tres entidades: usuarios, tratamientos, citas.
    
    d. Para ver el proyecto podemos cargar de datos las entidades por terminal en Mysql y ejecutando:

    USE islantilla;
    INSERT INTO usuarios (`dni`, `nombre`, `email`, `telefono`, `activo`) VALUES
    -- Mortadelo
    ('12345678A', 'Mortadelo Filemón', 'mortadelo@t.i.a.es', '666123456', 1),
    -- Filemón
    ('87654321B', 'Filemón Pi', 'filemon@t.i.a.es', '666789012', 1),
    -- Rompetechos
    ('98765432C', 'Rompetechos', 'rompetechos@reparaciones.es', '654321098', 1);

    INSERT INTO tratamientos (`id_tratamiento`, `nombre_tratamiento`, `precio`, `activo`) VALUES
    -- Masaje relajante
    (1, 'Masaje relajante', 50.00, 1),
    -- Limpieza facial profunda
    (2, 'Limpieza facial profunda', 60.00, 1),
    -- Manicura y pedicura spa
    (3, 'Manicura y pedicura spa', 45.00, 1);

    INSERT INTO citas (`dni_id`, `id_tratamiento_id`, `id_cita`, `fecha`, `pagado`, `activo`) VALUES
    -- Cita para Mortadelo (Masaje relajante)
    (1, 2, 1 , "2024-03-14", 0, 1),
    -- Cita para Filemón (Limpieza facial profunda)
    (2, 1, 2,  "2024-03-15", 1, 1),
    -- Cita para Rompetechos (Manicura y pedicura spa)
    (3, 3, 3,  "2024-03-16", 0, 1);


Usuarios:
+----------+-------------+------+-----+---------+----------------+
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| id       | int         | NO   | PRI | NULL    | auto_increment |
| dni      | varchar(9)  | NO   |     | NULL    |                |
| nombre   | varchar(30) | NO   |     | NULL    |                |
| email    | varchar(30) | NO   |     | NULL    |                |
| telefono | varchar(15) | NO   |     | NULL    |                |
| activo   | tinyint(1)  | NO   |     | NULL    |                |
+----------+-------------+------+-----+---------+----------------+
Tratamientos:
+--------------------+--------------+------+-----+---------+----------------+
| Field              | Type         | Null | Key | Default | Extra          |
+--------------------+--------------+------+-----+---------+----------------+
| id                 | int          | NO   | PRI | NULL    | auto_increment |
| id_tratamiento     | int          | NO   |     | NULL    |                |
| nombre_tratamiento | varchar(30)  | NO   |     | NULL    |                |
| precio             | decimal(5,2) | NO   |     | NULL    |                |
| activo             | tinyint(1)   | NO   |     | NULL    |                |
+--------------------+--------------+------+-----+---------+----------------+
Citas:
+-------------------+------------+------+-----+---------+----------------+
| Field             | Type       | Null | Key | Default | Extra          |
+-------------------+------------+------+-----+---------+----------------+
| id                | int        | NO   | PRI | NULL    | auto_increment |
| dni_id            | int        | NO   | MUL | NULL    |                |
| id_tratamiento_id | int        | NO   | MUL | NULL    |                |
| id_cita           | int        | NO   |     | NULL    |                |
| fecha             | date       | NO   |     | NULL    |                |
| pagado            | tinyint(1) | NO   |     | NULL    |                |
| activo            | tinyint(1) | NO   |     | NULL    |                |
+-------------------+------------+------+-----+---------+----------------+
## Rutas disponibles
 ------------------------- ---------- -------- ------ ------------------------- 
  Name                      Method     Scheme   Host   Path                     
 ------------------------- ---------- -------- ------ ------------------------- 
  citas_list                ANY        ANY      ANY    /citas                   
  tratamiento_citas_list    ANY        ANY      ANY    /tratamiento_citas       
  app_citas_new             GET|POST   ANY      ANY    /citas/new               
  app_tratamientos_index    GET        ANY      ANY    /tratamientos/           
  app_tratamientos_new      GET|POST   ANY      ANY    /tratamientos/new        
  app_tratamientos_show     GET        ANY      ANY    /tratamientos/{id}       
  app_tratamientos_edit     GET|POST   ANY      ANY    /tratamientos/{id}/edit  
  app_tratamientos_delete   POST       ANY      ANY    /tratamientos/{id}       
  app_usuarios_index        GET        ANY      ANY    /usuarios/               
  app_usuarios_new          GET|POST   ANY      ANY    /usuarios/new            
  app_usuarios_show         GET        ANY      ANY    /usuarios/{id}           
  app_usuarios_edit         GET|POST   ANY      ANY    /usuarios/{id}/edit      
  app_usuarios_delete       POST       ANY      ANY    /usuarios/{id}           
 ------------------------- ---------- -------- ------ ------------------------- 


