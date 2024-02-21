<?php
use App\Http\Controllers\Datable1Controller;
use App\Http\Controllers\JqueryAjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControuse;
// use App\Http\Controllers\JqueryAjaxController;
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

Route::get('/info', function () {
        echo phpinfo();
});


Route::get('/file-import',[Datable1Controller::class,
        'importView'])->name('import-view'); 
Route::get('/import',[Datable1Controller::class,
        'import'])->name('import'); 
Route::get('/export-excel',[Datable1Controller::class,
        'exportUsers'])->name('export-excel');
        
Route::post('/view-export-pdf',[Datable1Controller::class,'viewPDF']);
Route::post('/export-pdf',[Datable1Controller::class,'downloadPDF']);

Route::get('/get-paginated-data', [Datable1Controller::class,'getPaginatedData']);
Route::get('/Jquery', [JqueryAjaxController::class,'index']);
?>