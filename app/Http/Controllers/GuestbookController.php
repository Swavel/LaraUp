<?php

namespace App\Http\Controllers;

use App\GbEntry;
use App\Http\Requests\GbEntryRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class GuestbookController extends Controller
{
    public function showList() {
        $entries = GbEntry::all();
        return view('guestbook.show_list', compact('entries'));
    }

    /**
     * @param GbEntry $entry
     */
    public function destroy(GbEntry $gbEntry) {
        $gbEntry->delete();
    }

    public function create() {

    }

    public function store(GbEntryRequest $request) {
        $gbEntry = GbEntry::create($request);
        if(Auth::check()) {
            $gbEntry->user()->associate(Auth::user());
        }

        return redirect()->route('gb_list');
    }
}
