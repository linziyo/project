<?php

namespace App\Http\Controllers\Api;

use App\Models\Health;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::with(['contracts', 'archive', 'family', 'tenant', 'member'])->findOrFail($id);
    }

    public function archive($id)
    {
        return User::findOrFail($id)->archive();
    }

    public function contracts($id)
    {
        return User::findOrFail($id)->contracts();
    }

    public function family($id)
    {
        return User::findOrFail($id)->family()->get();
    }

    public function healths($id)
    {
        $user = User::findOrFail($id);
        return Health::user($user)->get();
    }

    public function getHealth($id, $health)
    {
        $modelName = 'App\\Models\\' . $health;

        $user = User::findOrFail($id);
        $model = new $modelName;
        return response()->json($model->user($user)->get());
    }

    public function getHealthLast($id, $health)
    {
        $modelName = 'App\\Models\\' . $health;

        $user = User::findOrFail($id);
        $model = new $modelName;
        return response()->json($model->user($user)->orderBy('created_at', 'desc')->first());
    }
}