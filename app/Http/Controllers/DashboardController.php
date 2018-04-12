<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
	    $server_info_api_url = 'http://base-wp.cultura.localhost/wp-json/wp-monitor-api/v1/server/info';
	    $site_info_api_url = 'http://base-wp.cultura.localhost/wp-json/wp-monitor-api/v1/site/info';
	    $site_themes_api_url = 'http://base-wp.cultura.localhost/wp-json/wp-monitor-api/v1/site/themes';
	    $site_plugins_api_url = 'http://base-wp.cultura.localhost/wp-json/wp-monitor-api/v1/site/plugins';

	    $title = 'Painel WordPress';
		return view('dashboard', compact('title', 'server_info_api_url', 'site_info_api_url', 'site_themes_api_url', 'site_plugins_api_url' ));
    }
}
