<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\CloudwaysApiClient;

class ServersController extends Controller
{
    public static $email = 'ahmedd.shahzeb@gmail.com';
    public static $api_key = '4444';

    public function index() {

        $cw_client = new CloudwaysApiClient( self::$email, self::$api_key );
        $servers = $cw_client->get_servers();
        
        return view('servers')->with('servers', $servers );
    }
}
