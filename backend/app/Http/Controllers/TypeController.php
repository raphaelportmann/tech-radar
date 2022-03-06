<?php

namespace App\Http\Controllers;

use App\Models\Type;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function index() {
        $types = Type::all();
        return response()->json($types);
    }
}
