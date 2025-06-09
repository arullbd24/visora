<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\User as UserModels;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            view: 'livewire.admin.layout.main',
            data: [
                'title' => 'Dashboard'
            ]
        );
    }
}
