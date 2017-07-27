<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use App\Learn;

class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('learns');
    }
}
