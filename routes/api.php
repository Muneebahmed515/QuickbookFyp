<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return response()->json(['status'=> true, 'code' => 200, 'message' => 'Hello World', 'data' => []]);
});

Route::get('/ping', function (Request $request) {
    try {
        DB::connection()->getPdo();
        return response()->json(['status'=> true, 'code' => 200, 'message' => 'Database connection successfully established.', 'data' => []]);
    } catch (\Exception $e) {
        return response()->json(['status'=> false, 'code' => 500, 'message' => 'Failed to connect to the database: ' . $e->getMessage(), 'data' => []], 500);
    }
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
