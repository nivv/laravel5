<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePageRequest;
use App\Page;
class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$pages = Page::all();
		return view('pages.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('pages.create');
	}


	/**
	 * @param CreatePageRequest $request
     */
	public function store(CreatePageRequest $request)
	{
		//
		$page = new Page;

		$page->title = $request->title;
		$page->slug = str_slug($request->title);
		$page->body = $request->body;

		$page->save();

		return \Redirect::to('/pages')->with('flash_m', 'Page created!');

		//dd($request->title);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
