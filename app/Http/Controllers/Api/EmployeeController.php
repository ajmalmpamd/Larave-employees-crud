<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function getList()
    {
        // $user = Auth::user();
        $employees = Employee::with('company')->get();

        return response()->json([ 'employees' => $employees]);
    }
}
