<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLogin;
use Illuminate\Http\Request;

use App\Http\Middleware\Authorized;
use Illuminate\Support\Facades\DB;
Route::resources([
    'login' => AdminLogin::class,
    'report' => ReportController::class,
]);

Route::get("/report/{id}", function(Request $request, ?int $id) {
    if (!$id) {
        return response()->json(["error" => "No id was provided"]);
    }

    $data = DB::table("reports")->where("id", $id);

    $requested = ["name", "description", "email"];
    $values = [];

    foreach ($requested as $key) {
        $value = $data->value($key);
        $values[$key] = $value;
    }

    return response()->json($values);
})->middleware([Authorized::class]);

Route::get("/image/{id}", function(Request $request, ?string $id) {
    return response()->file(storage_path()."/app/private/public/images/" . $id);
});



Route::resource(
    "/reports",
    ReportController::class
)->middleware([Authorized::class]);



Route::resource(
    "/extend-token",
    controller: AdminLogin::class
)->middleware([Authorized::class]);


Route::delete('/report/{id}', [ReportController::class, 'destroy'])->middleware([Authorized::class]);
