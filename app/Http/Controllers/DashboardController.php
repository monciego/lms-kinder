<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('teacher')) {
            $activities = Activities::get();
            // dd($activities);
            return view('teacher.dashboard.index', compact('activities'));
        } elseif (Auth::user()->hasRole('student')) {
            return view('student.dashboard.index');
        }
    }
}
