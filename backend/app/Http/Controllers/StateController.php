<?php

namespace App\Http\Controllers;

use App\Models\State;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index() {
        $states = State::all();
        return response()->json($states);
    }
}
