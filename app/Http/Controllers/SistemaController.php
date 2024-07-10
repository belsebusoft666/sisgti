<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SistemaController extends Controller
{
    public function index()
    {
        return view("admin.sistema.index");
    }
}
