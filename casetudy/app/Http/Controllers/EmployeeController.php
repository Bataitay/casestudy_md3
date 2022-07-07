<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = User::all();
        return view('Backend.employees.index', compact('employees'));
    }
}
