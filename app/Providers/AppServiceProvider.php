<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{

		View::share('menu', \App\Page::published()->get());
		View::share('modules', [
			'page' => 'Pagina\'s',
			'project' => 'Projecten',
			'tag' => 'Tags',
			'user' => 'Gebruikers',
		]);

		Blade::include('auth.form.password',            'authPassword');
		Blade::include('auth.form.name',                'authName');
		Blade::include('auth.form.email',               'authEmail');
		Blade::include('auth.form.confirm-password',    'authConfirm');
		Blade::include('auth.form.remember',            'authRemember');
		Blade::include('auth.form.submit',              'authSubmit');

		Blade::include('shared.form.text',              'text');
		Blade::include('shared.form.textarea',          'textarea');
		Blade::include('shared.form.checkbox',          'checkbox');
		Blade::include('shared.form.button',            'button');
		Blade::include('shared.form.submit',            'submit');
	}
}
