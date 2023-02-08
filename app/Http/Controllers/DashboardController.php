<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('teacher')) {
            return view('teacher.dashboard.index');
        } elseif (Auth::user()->hasRole('student')) {
            return view('student.dashboard.index');
        }
    }
}
