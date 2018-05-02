<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;

class SitesController extends Controller
{

    private $sites;
    private $dashboard_main_color;

    public function __construct(Site $sites) {
        $this->sites = $sites;
        $this->dashboard_main_color = 'purple';
    }

    public function index () {
        $sites = $this->sites->all();
        $dashboard_main_color = 'blue';
        $title = 'Sites monitorados';
        return view('sites', compact('title', 'dashboard_main_color','sites' ));
    }

	public function create () {
        $this->dashboard_main_color = '';
        $dashboard_main_color = 'blue';
        $title = 'Monitorar novo site';
        return view('sites-create-edit', compact('title', 'dashboard_main_color' ));
	}

	public function store (Request $request) {
        $form_data = $request->all();
        $form_data['active'] = ( isset( $form_data['active'] ) ) ? 1 : 0;

        // Validate data
        $this->validate($request, $this->sites->rules);

        if( $this->sites->create($form_data) ){
            return redirect()->route('sites.index' );
        } else {
            return redirect()->back();
        }
	}

	public function show ($id) {
        $site = $this->sites->find( $id );
        $title = 'Monitor: ' . $site->name;
        $dashboard_main_color = 'blue';
        $wp_monitor_api_key = $site['security-token'];
        $server_info_api_url = $site->url . '/wp-json/wp-monitor-api/v1/server/info';
        $site_info_api_url = $site->url . '/wp-json/wp-monitor-api/v1/site/info';
        $site_themes_api_url = $site->url . '/wp-json/wp-monitor-api/v1/site/themes';
        $site_plugins_api_url = $site->url . '/wp-json/wp-monitor-api/v1/site/plugins';
        $site_users_api_url = $site->url . '/wp-json/wp-monitor-api/v1/site/users';

        return view('sites-view', compact('site', 'dashboard_main_color', 'wp_monitor_api_key', 'title', 'server_info_api_url', 'site_info_api_url', 'site_themes_api_url', 'site_plugins_api_url', 'site_users_api_url' ));
	}

	public function edit ($id) {
        $site = $this->sites->find( $id );
        $title = 'Editar site: ' . $site->name;
        $dashboard_main_color = 'blue';
        return view('sites-create-edit', compact('title', 'dashboard_main_color', 'site' ));
	}

	public function update (Request $request, $id) {
        $form_data = $request->all();
        $site = $this->sites->find( $id );
        $form_data['active'] = ( isset( $form_data['active'] ) ) ? 1 : 0;
        $form_data['security-token'] = trim( $form_data['security-token'] );

        // Validate data
        $this->validate($request, $this->sites->rules);

        if( $site->update($form_data) ){
            return redirect()->route('sites.index' );
        } else {
            return redirect()->route('sites.edit', $id )->with(['errors' => 'Falha ao editar']);
        }
	}

    public function delete ($id) {
        $site = $this->sites->find( $id );
        $title = 'Deletar site: ' . $site->name;
        $dashboard_main_color = 'blue';
        return view('sites-delete', compact('title', 'dashboard_main_color', 'site'));
    }

	public function destroy ($id) {
        $site = $this->sites->find( $id );

        if( $site->delete() ){
            return redirect()->route('sites.index' );
        } else {
            return redirect()->route('sites.delete', $id )->with(['errors' => 'Falha ao deletar']);
        }
	}
}
