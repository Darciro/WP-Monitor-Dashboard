<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;

class SitesController extends Controller
{

    private $sites;

    public function __construct(Site $sites) {
        $this->sites = $sites;
    }

    public function index () {
        $sites = $this->sites->all();
        $title = 'Sites monitorados';
        return view('sites', compact('title','sites' ));
    }

	public function create () {
        $title = 'Monitorar novo site';
        return view('sites-create-edit', compact('title' ));
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
        $wp_monitor_api_key = $site['security-token'];
        $server_info_api_url = $site->url . '/wp-json/wp-monitor-api/v1/server/info';
        $site_info_api_url = $site->url . '/wp-json/wp-monitor-api/v1/site/info';
        $site_themes_api_url = $site->url . '/wp-json/wp-monitor-api/v1/site/themes';
        $site_plugins_api_url = $site->url . '/wp-json/wp-monitor-api/v1/site/plugins';
        $site_users_api_url = $site->url . '/wp-json/wp-monitor-api/v1/site/users';

        return view('sites-view', compact('site', 'wp_monitor_api_key', 'title', 'server_info_api_url', 'site_info_api_url', 'site_themes_api_url', 'site_plugins_api_url', 'site_users_api_url' ));
	}

	public function edit ($id) {
        $site = $this->sites->find( $id );
        $title = 'Editar site: ' . $site->name;
        return view('sites-create-edit', compact('title', 'site' ));
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

        return view('sites-delete', compact('title', 'site'));
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
