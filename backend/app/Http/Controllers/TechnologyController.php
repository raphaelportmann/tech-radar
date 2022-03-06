<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Models\TechnologyHistory;
use Illuminate\Http\Request;
use Panoscape\History\Events\ModelChanged;

class TechnologyController extends Controller
{
    private static $rules = [
        'name' => [
            'required',
            'string',
            'max:255',
        ],
        'type_id' => [
            'required',
            'integer',
        ],
        'state_id' => [
            'required_if:status,published',
            'required_with:description_classification',
            'nullable',
            'integer',
        ],
        'description' => [
            'required',
            'string',
            'max:1000',
        ],
        'description_classification' => [
            'required_if:status,published',
            'required_with:state_id',
            'string',
            'max:1000',
        ],
        'status' => [
            'sometimes',
            'required',
            'string',
            'in:draft,published',
        ],
    ];

    private static $attributes = [
        'name' => 'Name',
        'type_id' => 'Type',
        'state_id' => 'State',
        'description' => 'Description',
        'description_classification' => 'Description Classification',
        'status' => 'Status',
    ];

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->middleware('role:admin', ['only' => ['create', 'update', 'delete']]);
    }

    public function index(Request $request) {
        if ($request->query('all', false) !== false) {
            if (auth()->user()->role === 'admin') {
                $technologies = Technology::all();
            } else {
                return response()->json(['message' => 'Unauthorised'], 401);
            }
        } else {
            $technologies = Technology::where('status', 'published')->get();
        }
        return response()->json($technologies);
    }

    public function show($id) {
        $technology = Technology::find($id);
        if ($technology === null) {
            return response()->json(['message' => 'Technology not found'], 404);
        }
        return response()->json($technology);
    }

    public function create(Request $request) {
        $this->validate($request, self::$rules, [], self::$attributes);

        $data = $request->only(['name', 'type_id', 'state_id', 'description', 'description_classification', 'status']) + ['user_id' => auth()->user()->id];

        $technology = Technology::create($data);
        TechnologyHistory::create($technology->getAttributes() + ['technology_id' => $technology->id]);

        return response()->json($technology);
    }

    public function update(Request $request, $id) {
        $technology = Technology::find($id);
        if ($technology === null) {
            return response()->json(['message' => 'Technology not found'], 404);
        }

        $this->validate($request, self::$rules, [], self::$attributes);

        $data = $request->only(['name', 'type_id', 'state_id', 'description', 'description_classification', 'status']) + ['user_id' => auth()->user()->id];

        $technology->fill($data);
        $technology->save();
        TechnologyHistory::create($technology->getAttributes() + ['technology_id' => $technology->id]);

        return response()->json($technology);
    }

    public function delete($id) {
        $technology = Technology::find($id);
        if ($technology === null) {
            return response()->json(['message' => 'Technology not found'], 404);
        }
        $technology->delete();
        return response()->json(['message' => 'Technology deleted']);
    }
}
