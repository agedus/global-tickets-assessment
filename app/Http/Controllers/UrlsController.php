<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ShortUrl::where('user_id', Auth::id())->get();

        return view('urls.overview', ['urls' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('urls.addOrEdit', ['url' => new ShortUrl()]);
    }

    /**
     * Store a newly created resource in storage.
     * We add the count of all the hashes that are the same so that you can never have the same hash twice.
     * This will ofcourse almost never happen
     */
    public function store(UrlRequest $request)
    {
        $originalUrl = $request->get('original_url');

        $hash = substr(md5($originalUrl . time()), 0, 7);
        $hash .= ShortUrl::where('hash', 'like', "{$hash}%")->count();


        $url = new ShortUrl();
        $url->original_url = $originalUrl;
        $url->user_id = Auth::id();
        $url->hash = $hash;
        $url->save();

        return redirect()->route('urls.overview');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortUrl $url)
    {
        return view('urls.addOrEdit', ['url' => $url]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UrlRequest $request, ShortUrl $url)
    {
        $originalUrl = $request->get('original_url');

        $url->original_url = $originalUrl;
        $url->save();

        return redirect()->route('urls.overview');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortUrl $url)
    {
        $url->delete();

        return redirect()->route('urls.overview');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function redirect(ShortUrl $url)
    {
        return Redirect::to($url->original_url);
    }

}
