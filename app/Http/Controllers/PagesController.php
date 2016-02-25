<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function show($id)
    {
        return view('pages.show')->withPage(Page::find($id));
    }


}
