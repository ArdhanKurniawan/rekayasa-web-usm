<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\SiswaController;
    use App\Http\Controllers\GuruController;
    use App\Http\Controllers\KelasController;
    use App\Http\Controllers\AuthController;

    // AUTH
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/test', function () {
        return 'API OK';
    });

    

    Route::middleware('auth:sanctum')->group(function() {

        // SISWA
        Route::post('/siswa/create', [SiswaController::class, 'create']);
        Route::get('/siswa/read', [SiswaController::class, 'read']);
        Route::get('/siswa/read/{id}', [SiswaController::class, 'readById']);
        Route::put('/siswa/update/{id}', [SiswaController::class, 'update']);
        Route::delete('/siswa/delete/{id}', [SiswaController::class, 'delete']);

        // GURU
        Route::post('/guru/create', [GuruController::class, 'create']);
        Route::get('/guru/read', [GuruController::class, 'read']);
        Route::get('/guru/read/{id}', [GuruController::class, 'readById']);
        Route::put('/guru/update/{id}', [GuruController::class, 'update']);
        Route::delete('/guru/delete/{id}', [GuruController::class, 'delete']);

        // KELAS
        Route::post('/kelas/create', [KelasController::class, 'create']);
        Route::get('/kelas/read', [KelasController::class, 'read']);
        Route::get('/kelas/read/{id}', [KelasController::class, 'readById']);
        Route::put('/kelas/update/{id}', [KelasController::class, 'update']);
        Route::delete('/kelas/delete/{id}', [KelasController::class, 'delete']);

        Route::post('/logout', [AuthController::class, 'logout']);
    });
