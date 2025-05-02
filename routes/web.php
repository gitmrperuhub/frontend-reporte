<?php

use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Contacto\ContactoController;
use App\Http\Controllers\Empleado\EmpleadoController;
use App\Http\Controllers\Equipo\EquipoController;
use App\Http\Controllers\Productos\ProductoController;
use App\Http\Controllers\Recursos\RecursoController;
use App\Http\Controllers\Reporte\ReporteSerieController;
use App\Http\Controllers\Servicio\ServicioController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Web\ModuleController;
use App\Http\Controllers\Web\WebPages;
use App\Models\Recursos_detalle;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\FunctionController;
use App\Http\Controllers\Secador\SecadorController;

Route::get('/optimize', function(){
    Artisan::call("route:cache");
    Artisan::call("route:clear");
    Artisan::call("config:clear");
    Artisan::call("config:cache");
    Artisan::call("optimize:clear");
    Artisan::call("route:list");
    //Artisan::call("make:controller Cliente/ClienteController2");
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () { /*return view('master.master');*/ });
Route::post('/getUsers', [UserController::class, 'getUsers']);
Route::post('/getUser', [UserController::class, 'getUser']);
Route::post('/auth/login', [UserController::class, 'logIn']);
Route::get('/permission', [WebPages::class, 'sinPermiso'])->name("sinPermiso")->middleware("auth");
Route::post('/module/all/menu_by_user', [UserController::class, 'getMenuByUser']);
Route::get('/module/config', [WebPages::class, 'Configuar'])->name("configuar")->middleware("auth");
Route::get('/user/create', [WebPages::class, 'UsuariosCreate'])->name("users.create")->middleware("auth");
Route::get('/product/create', [WebPages::class, 'ProductosCreate'])->name("product.create")->middleware("auth");
Route::post('/product/register', [ProductoController::class, 'register'])->name("product.register")->middleware("auth");
Route::post('/product/listar', [ProductoController::class, 'listarProducto'])->name("product.listar");
Route::post('/producto/producto-by-id', [ProductoController::class, 'getProductoById'])->name("producto.listar.id");
Route::post('/producto/producto-actualizar-estado', [ProductoController::class, 'actualizarEstado'])->name("producto.listar.");
Route::get('/listar/pruebas', [RecursoController::class, 'getProductoById'])->name("product.listar2");

Route::post('/login', [UserController::class, 'login']);
Route::get('/auth/sign-out', [UserController::class, 'SignOut'])->name('sign-out');
Route::get('/', [WebPages::class, 'Login'])->name('login');
Route::get('/home', [WebPages::class, 'Home'])->name("home.dashboard");
Route::get('/service/{opcion}', [ServicioController::class, 'IniciarServicio'])->name("service.start");
Route::get('/service/finish-service', [ServicioController::class, 'TerminarServicio'])->name("service.finish");
Route::get('/services/service-history', [ServicioController::class, 'HistorialServicio'])->name("service.history");
//Route::get('/service/unfinished-service/{opcion}', [ServicioController::class, 'ServiciosNoConcluidos'])->name("service.unfinishedservice");
Route::get('/users/users-profile', [WebPages::class, 'Profile'])->name("users.profile");
Route::post('/servicio/request-file', [ServicioController::class, 'uploadImage']);
Route::post('/service/ot-by-tecnico', [ServicioController::class, 'otByTecnico']);
Route::post('/service/servicio-by-programacion-id', [ServicioController::class, 'servicioByProgramacionId']);
Route::post('/empleado/get-by-category', [EmpleadoController::class, 'getByCategory']);
Route::post('/reporte/registro', [ReporteSerieController::class, 'registro']);
Route::post('/servicio/delete-file', [ServicioController::class, 'deleteFile']);
Route::post('/reporte/actualizar-inicial', [ReporteSerieController::class, 'actualizarReporteInicial']);
Route::post('/reporte/listar-archivo-by-reporte', [ReporteSerieController::class, 'listarArchivoByReporte']);
Route::post('/reporte/listar-reporte-by-numero', [ReporteSerieController::class, 'listarReporteByNumero']);
Route::post('/reporte/actualizar-final', [ReporteSerieController::class, 'actualizarReporteFinal']);
Route::post('/servicio/datatoDataURL', [ServicioController::class, 'datatoDataURL']);
Route::post('/contacto/contacto-email-by-ruc', [ContactoController::class, 'emailByRuc']);
Route::post('/cliente/listar-cliente-by-tecnico', [ClienteController::class, 'listarClienteByTecnico']);
Route::post('/cliente/listar-cliente-locales-by-ruc', [ClienteController::class, 'listarClienteLocalesByRuc']);
Route::post('/equipo/listar-equipo-by-ruc-by-local', [EquipoController::class, 'listarEquipoByRucByLocal']);
Route::post('/reporte/listar-reporte-by-ruc-by-equipo', [ReporteSerieController::class, 'listarReporteByRucByEquipo']);
Route::post('/reporte/listar-tipo-table', [ReporteSerieController::class, 'listarTipoTable']);
Route::post('/reporte/validar-paso3', [ReporteSerieController::class, 'validacionpas03']);
Route::get('/remember-password', [WebPages::class, 'RecordarContrasena'])->name('remenber.password');
Route::get('/change-password/{token}', [WebPages::class, 'CambiarContrasena'])->name('change.password');
Route::post('/recordar-contrasena', [UserController::class, 'RecordarContrasena']);
Route::post('/reset-contrasena', [UserController::class, 'ResetContrasena']);
Route::post('/reporte/actualizar-programacion-user', [ReporteSerieController::class, 'actualizarProgramacionUser']);
Route::post('/reporte/get-bloqueo', [ReporteSerieController::class, 'GetBloqueo']);
Route::post('/reporte/listar-archivo-by-reporte-historial-detalle', [ReporteSerieController::class, 'listarArchivoByReporteHistorialDetalle']);
Route::post('/reporte/validar-paso2', [ReporteSerieController::class, 'validarPaso2']);
Route::post('/reporte/actualizar-reporte-paso2', [ReporteSerieController::class, 'actualizarReportePaso2']);
Route::post('/reporte/actualizar-reporte-paso3', [ReporteSerieController::class, 'actualizarReportePaso3']);
Route::post('/reporte/guardar-fotos-finales-paso4', [ReporteSerieController::class, 'guardarFotosFinalesPaso4']);
Route::post('/reporte/guardar-fotos-finales-paso5', [ReporteSerieController::class, 'actualizarReportePaso5']);
Route::post('/reporte/guardar-sali-regresar-reporte-paso2', [ReporteSerieController::class, 'guardarSaliRegresarReportePaso2']);
Route::post('/reporte/guardar-sali-regresar-reporte-paso3', [ReporteSerieController::class, 'guardarSaliRegresarReportePaso3']);
Route::post('/reporte/guardar-sali-regresar-reporte-paso5', [ReporteSerieController::class, 'guardarSaliRegresarReportePaso5']);
Route::post('/reporte/registro-inicial', [ReporteSerieController::class, 'registroInicial']);
Route::post('/servicio/check-ver-reporte-foto', [ServicioController::class, 'checkVerReporteFoto']);
Route::post('/servicio/servicio-by-programacion-id-secadores', [ServicioController::class, 'servicioByProgramacionIdSecadores']);
Route::post('/secador/registro', [SecadorController::class, 'registro']);
Route::post('/secador/actualizar-reporte-paso2', [SecadorController::class, 'actualizarReportePaso2']);
Route::post('/secador/guardar-salir-regresar-reporte-paso2', [SecadorController::class, 'guardarSaliRegresarReportePaso2']);
Route::post('/secador/actualizar-final-secador', [SecadorController::class, 'actualizarFinalSecador']);
Route::post('/reporte/update-reporte-archivo', [ReporteSerieController::class, 'updateReporteArchivo']);
Route::post('/secador/listar-secador-by-numero', [SecadorController::class, 'listarSecadorByNumero']);
Route::post('/reporte/reenviar-mail-pdf', [ReporteSerieController::class, 'reenviarMailPdf']);
Route::post('/secador/reenviar-mail-pdf', [SecadorController::class, 'reenviarMailPdf']);
Route::post('/reporte/get-guia-detalle-by-ot', [ReporteSerieController::class, 'getGuiaDetalleByOt']);
Route::get('/file-downloads/{filename}', [ReporteSerieController::class, 'fileDownloads']);


Route::get('/get_password', function () {
    //return 'Hello World';
    echo env('APP_URL').'<br> edwin';
    $hash='$2y$10$ESV7OP/uWzaTo9xmjv1PleT/qyHLv4KDVDpQspdCO/PZwAEGrj9nW';
    if (password_verify('CARLOS', $hash)){
        echo '¡La contraseña es válida! eddd';
    } else {
        echo 'La contraseña no es válida.';
    }
    echo '<br>';//
    $hash=password_hash("123456", PASSWORD_DEFAULT);
    echo $hash;
    
});