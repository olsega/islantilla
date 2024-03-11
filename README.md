# Proyecto Symfony islantilla
## Recuperar el proyecto
    a. composer install

    b. EndPoints:
        - http://localhost:8000/citas                   JOIN JSON
        - http://localhost:8000/tratamiento_citas       JOIN JSON
        - http://localhost:8000/citas/new               Crea registro
        - http://localhost:8000/tratamientos/           Muestra todos los registros
        - http://localhost:8000/tratamientos/new        Crea registro
        - http://localhost:8000/tratamientos/{id}       Muestra/Borra
        - http://localhost:8000/tratamientos/{id}/edit  Edita registro
        - http://localhost:8000/usuarios                Muestra todos los registros
        - http://localhost:8000/usuarios/new            Crea registro
        - http://localhost:8000/usuarios/{id}           Muestra/Borra
        - http://localhost:8000/usuarios/{id}/edit      Edita registro
        - 
    c. Nuestra BBDD es 'islantilla'. Tiene tres entidades: usuarios, tratamientos, citas.
    
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


