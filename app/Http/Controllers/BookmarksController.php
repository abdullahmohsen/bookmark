<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookmarks = Bookmark::where('user_id', auth()->user()->id)->get();
        return view('home')->with('bookmarks', $bookmarks);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required'
        ]);

        //Create Bookmark
        $bookmark = new Bookmark();
        $bookmark->name = $request->input('name');
        $bookmark->url = $request->input('url');
        $bookmark->description = $request->input('description');
        $bookmark->user_id = auth()->user()->id;

        $bookmark->save();

        return redirect( route('home') )->with('success', 'Bookmark Added');

    }

    public function destroy($id) {
        $bookmark = Bookmark::find($id);
        $bookmark->delete();

        return;
    }
}
