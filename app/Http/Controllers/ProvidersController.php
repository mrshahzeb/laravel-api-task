<?php

namespace App\Http\Controllers;

use App\Http\Helpers\CloudwaysApiClient;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    public static $email = 'ahmedd.shahzeb@gmail.com';
    public static $api_key = 'asdasd';

    public function index() {

        $cw_client = new CloudwaysApiClient( self::$email, self::$api_key );
        $providers = $cw_client->get_providers();
        
        return view('providers')->with('providers', $providers->providers );
    }
}
