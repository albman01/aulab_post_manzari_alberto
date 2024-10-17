<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();
    
        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    
    }
}

