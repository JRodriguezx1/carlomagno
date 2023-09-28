<?php 

require_once __DIR__ . '/../includes/app.php'; //apunta al directorio raiz y luego a app.php, el archivo app contiene: las variables de entorno para el deploy,
                    //la clase ActiveRecord, el autoload de composer = localizador de clases, archivo de funciones debuguear y sanitizar html
                    //archivo de conexion de bd mysql con variables de entorno y me establece la conexion mediante: ActiveRecord::setDB($db);

//me importa clases del controlador

use Controllers\dashboard_controlador;
use Controllers\login_controlador; //clase para logueo, registro de usuario, recuperacion, deslogueo etc..
use Controllers\paginas_controlador;
use Controllers\admin_controlador;
use Controllers\controladorpdf;
use Controllers\graficas_controlador;
// me importa la clase router
use MVC\Router;  

$router = new Router();

//paginas publicas
$router->get('/', [paginas_controlador::class, 'index']);
$router->get('/detalle_curso', [paginas_controlador::class, 'detalle_curso']);
$router->get('/nosotros', [paginas_controlador::class, 'nosotros']);
$router->get('/biografia', [paginas_controlador::class, 'biografia']);
$router->get('/objetivo', [paginas_controlador::class, 'objetivo']);
$router->get('/mision', [paginas_controlador::class, 'mision']);
$router->get('/vision', [paginas_controlador::class, 'vision']);
$router->get('/estudiantes', [paginas_controlador::class, 'estudiantes']);
$router->post('/estudiantes', [paginas_controlador::class, 'estudiantes']); //publico consulta su estado academico
$router->get('/oferta_academica', [paginas_controlador::class, 'oferta_academica']);
$router->get('/galeria', [paginas_controlador::class, 'galeria']);
$router->get('/contacto', [paginas_controlador::class, 'contacto']);

// Login
$router->get('/login', [login_controlador::class, 'login']);
$router->post('/login', [login_controlador::class, 'login']);
$router->get('/logout', [login_controlador::class, 'logout']);

// Crear Cuenta usuario
//$router->get('/registro', [login_controlador::class, 'registro']);
$router->post('/registro', [login_controlador::class, 'registro']);  // *. este metodo se llama desde el dashboard/crearusuarios/inicio.php

// Formulario de olvide mi password
$router->get('/olvide', [login_controlador::class, 'olvide']);
$router->post('/olvide', [login_controlador::class, 'olvide']);

// Colocar el nuevo password
$router->get('/recuperarpass', [login_controlador::class, 'recuperarpass']);
$router->post('/recuperarpass', [login_controlador::class, 'recuperarpass']);

// Confirmación de Cuenta
$router->get('/mensaje', [login_controlador::class, 'mensaje']);
$router->get('/confirmar-cuenta', [login_controlador::class, 'confirmar_cuenta']);


//admin
$router->get('/admin/dashboard/controladmin', [dashboard_controlador::class, 'control']);
//
$router->get('/admin/dashboard/entrada', [dashboard_controlador::class, 'entrada']);
$router->get('/admin/dashboard/update-infobasic', [dashboard_controlador::class, 'actualizar']);
$router->post('/admin/dashboard/update-infobasic', [dashboard_controlador::class, 'actualizar']);
$router->get('/admin/dashboard/editar_index', [dashboard_controlador::class, 'editar_index']); //cuando se da click en editar index
$router->post('/admin/dashboard/editar_index', [dashboard_controlador::class, 'editar_index']);
//api para la carga e eliminacion de imagenes del index por medio dle dashboard
$router->post('/api/slider', [dashboard_controlador::class, 'apislider']); //metodo se llama desde js
$router->post('/api/img-post1', [dashboard_controlador::class, 'apiimgpost1']);
$router->post('/api/imgdistintivo', [dashboard_controlador::class, 'imgdistintivo']);
$router->post('/api/imgbenef', [dashboard_controlador::class, 'imgbenef']);
//editar nosotros
$router->get('/admin/dashboard/editar_nosotros', [dashboard_controlador::class, 'editar_nosotros']); //cuando se da click en editar nosotros
$router->post('/admin/dashboard/editar_nosotros', [dashboard_controlador::class, 'editar_nosotros']);
//editar fotografias
$router->get('/admin/dashboard/contenido_fotografico', [dashboard_controlador::class, 'contenido_fotografico']);
$router->post('/admin/dashboard/contenido_fotografico', [dashboard_controlador::class, 'contenido_fotografico']);  //cuando se da click en subir fotografia
$router->get('/admin/dashboard/contenido_fotografico/delete', [dashboard_controlador::class, 'delete_fotografia']);
// editar contacto
$router->get('/admin/dashboard/editar_contacto', [dashboard_controlador::class, 'editar_contacto']);
$router->post('/admin/dashboard/editar_contacto', [dashboard_controlador::class, 'editar_contacto']);
//gestionar oferta academica
$router->get('/admin/dashboard/gestionar_oferta', [dashboard_controlador::class, 'gestionar_oferta']); //cuando se da click en gestionar oferta academica en el panel
$router->post('/admin/dashboard/gestionar_oferta', [dashboard_controlador::class, 'gestionar_oferta']); //cuando se da click en eliminar programa o oferta academica llama a este metodo por via post
//$router->get('/admin/dashboard/gestionar_oferta/crear', [dashboard_controlador::class, 'crear_oferta']);
//$router->post('/admin/dashboard/gestionar_oferta/crear', [dashboard_controlador::class, 'crear_oferta']);
$router->get('/admin/dashboard/gestionar_oferta/nuevo_reg', [dashboard_controlador::class, 'nuevo_reg']);
$router->post('/admin/dashboard/gestionar_oferta/nuevo_reg', [dashboard_controlador::class, 'nuevo_reg']);
$router->get('/admin/dashboard/gestionar_oferta/actualizar', [dashboard_controlador::class, 'actualizar_oferta']);
$router->post('/admin/dashboard/gestionar_oferta/actualizar', [dashboard_controlador::class, 'actualizar_oferta']);
$router->get('/admin/dashboard/gestionar_oferta/crear_curso', [dashboard_controlador::class, 'crear_curso']);
$router->post('/admin/dashboard/gestionar_oferta/crear_curso', [dashboard_controlador::class, 'crear_curso']);
$router->get('/admin/dashboard/gestionar_oferta/actualizar_curso', [dashboard_controlador::class, 'actualizar_curso']);
$router->post('/admin/dashboard/gestionar_oferta/actualizar_curso', [dashboard_controlador::class, 'actualizar_curso']);
//////////////////////////////////////////////////////
//admin programas
$router->get('/admin/dashboard/admin_programas', [admin_controlador::class, 'admin_programas']); //cuando se da click en admin estudiantes en el dashboard
$router->get('/admin/dashboard/admin_programas/crear', [admin_controlador::class, 'crear_programas']);
$router->post('/admin/dashboard/admin_programas/crear', [admin_controlador::class, 'crear_programas']);
$router->post('/admin/dashboard/admin_programas/eliminar', [admin_controlador::class, 'admin_programas']);  //cuando se da click en borrar un programa
$router->get('/admin/dashboard/admin_programas/actualizar', [admin_controlador::class, 'actualizar_programas']);
$router->post('/admin/dashboard/admin_programas/actualizar', [admin_controlador::class, 'actualizar_programas']); 
$router->post('/apigrupo', [admin_controlador::class, 'cambio_grupo']); //cuando se selecciona otro grupo desde .js se consulta por la api y se trae los datos de ese grupo elegido
$router->get('/admin/dashboard/admin_programas/actualizar/eliminar_grupo', [admin_controlador::class, 'eliminar_grupo']);
//Admin estudiantes
$router->get('/admin/dashboard/admin_estudiantes', [admin_controlador::class, 'admin_estudiantes']); //cuando se da click en admin estudiantes en el dashboard
$router->post('/admin/dashboard/admin_estudiantes', [admin_controlador::class, 'admin_estudiantes']);
$router->get('/admin/dashboard/admin_estudiantes/crear', [admin_controlador::class, 'crear_estudiante']);
$router->post('/admin/dashboard/admin_estudiantes/crear', [admin_controlador::class, 'crear_estudiante']);
$router->post('/admin/dashboard/admin_estudiantes/filtro_personalizado', [admin_controlador::class, 'filtro_personalizado']);
$router->post('/admin/dashboard/admin_estudiantes/filtro', [admin_controlador::class, 'filtro_estudiantes']);
$router->post('/admin/dashboard/admin_estudiantes/excel', [admin_controlador::class, 'excel_estudiantes']);
$router->get('/admin/dashboard/admin_estudiantes/cambio_nivel', [admin_controlador::class, 'cambio_nivel']);
$router->post('/admin/dashboard/admin_estudiantes/cambio_nivel', [admin_controlador::class, 'cambio_nivel']);
$router->post('/api/traer_niveles', [admin_controlador::class, 'traer_niveles']); //api treaer niveles segun programa elegido en cambio de niveles/semestre para cambiar niveles/semestre
$router->post('/api/traer_grupos_sedes', [admin_controlador::class, 'traer_grupos_sedes']); //api me trae los grupos con su sede deacuerdo al nivel/semestre elegido para cambiar niveles/semestre
$router->post('/admin/dashboard/admin_estudiantes/lista', [admin_controlador::class, 'lista']); //lista de estudiantes segun programa, semestre y grupo
$router->post('/admin/dashboard/admin_estudiantes/aplicar_CN', [admin_controlador::class, 'aplicar_CN']);
$router->post('/admin/dashboard/admin_estudiantes/eliminar', [admin_controlador::class, 'admin_estudiantes']);
$router->post('/apitraergrupos', [admin_controlador::class, 'traergrupos']);  //se trae los grupos deacuerdo al programa elegido cuando se registra estudiante nuevo
$router->get('/admin/dashboard/admin_estudiantes/actualizar', [admin_controlador::class, 'actualizar_estudiante']);
$router->post('/admin/dashboard/admin_estudiantes/actualizar', [admin_controlador::class, 'actualizar_estudiante']);
$router->get('/admin/dashboard/admin_estudiantes/ver', [admin_controlador::class, 'ver_estudiante']);
$router->post('/admin/dashboard/admin_estudiantes/ver', [admin_controlador::class, 'ver_estudiante']);
$router->post('/admin/dashboard/admin_estudiantes/pagos', [admin_controlador::class, 'pagos']);
$router->post('/admin/dashboard/admin_estudiantes/eliminar_pago', [admin_controlador::class, 'eliminar_pago']);
$router->get('/admin/dashboard/admin_estudiantes/print_pago', [controladorpdf::class, 'print_pago']);
$router->get('/admin/dashboard/admin_estudiantes/pdf', [controladorpdf::class, 'pdf']);
$router->post('/apitraermatricula', [admin_controlador::class, 'traermatricula']);
//admin coordinadores <tabla funcionadores>
$router->get('/admin/dashboard/admin_coordinadores', [admin_controlador::class, 'admin_coordinadores']); //cuando se da click en admin coordinadores en el dashboard
$router->post('/admin/dashboard/admin_coordinadores', [admin_controlador::class, 'admin_coordinadores']);
//////api para las graficas////////
$router->get('/api/programas', [graficas_controlador::class, 'apiprogramas']);

//crear cuentas ususarios
$router->get('/admin/dashboard/crear_usuarios', [admin_controlador::class, 'crear_usuarios']); // *. cuando se da click en crear usuarios
////////////////////////////////////////////////////
//perfil
$router->get('/admin/dashboard/perfil', [admin_controlador::class, 'perfil']);
$router->post('/admin/dashboard/perfil', [admin_controlador::class, 'perfil']); //cambiar datos como nombre y email
$router->get('/admin/dashboard/cambiar_password', [admin_controlador::class, 'cambiar_password']); //cambiar contraseña dentro del dashboard
$router->post('/admin/dashboard/cambiar_password', [admin_controlador::class, 'cambiar_password']); //cambiar contraseña dentro del dashboard

//colaborador
$router->get('/dashboard/admin_estudiantes', [admin_controlador::class, 'admin_estudiantes']);
$router->get('/dashboard/perfil', [dashboard_controlador::class, 'perfil']);
$router->comprobarRutas();

