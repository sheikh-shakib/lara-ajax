<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        // $users=User::all();
        // return view('user', compact('users'));
        return $dataTable->render('user');
    }
    
    public function anyData()
    {
        
    }
}
