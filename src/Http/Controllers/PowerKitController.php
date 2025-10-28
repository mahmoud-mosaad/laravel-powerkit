<?php

namespace MahmoudMosaad\PowerKit\Http\Controllers;

use Illuminate\Routing\Controller;

class PowerKitController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Welcome to PowerKit!',
            'version' => '1.0.0',
        ]);
    }
}
