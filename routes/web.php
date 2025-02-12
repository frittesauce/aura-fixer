<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Middleware\Authorized;
use App\Models\Report;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;



function IsAuthorized(Request $request): bool
{
    $authorized = new Authorized();
    return $authorized->IsAuthorized($request);
}

Route::get('/report/{id}', function (Request $request, ?int $id = 0) {
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

    return view("main", [
        "page" => "report",
        "authorized" => "true"
    ]);
})->middleware([Authorized::class]);

Route::get("/report/{id}", function (Request $request, int $id) {
    $data = DB::table("reports")->where("id", $id);
    $name = $data->value("name");
    $description = $data->value("description");

    return view("report", [
        "id" => $id,
        "name" => $name,
        "description" => $description,
    ]);
});


Route::get("/{page?}", function (Request $request, ?string $page = "home") {
    $IsAuthorized = IsAuthorized($request);

    // if (!$IsAuthorized && $page == "beheerder") {
    //     $page = "login";
    // } else if ($IsAuthorized && $page == "login") {
    //     $page = "beheerder";
    // };

    return view("main", [
        "page" => $page,
        "authorized" => $IsAuthorized ? "true" : "false",
    ]);
});

