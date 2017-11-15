<?php

namespace App\Http\Controllers;

use App\GbEntry;
use App\Http\Requests\GbEntryRequest;

use App\Http\Requests\PrivateGuestbookSettingsRequest;
use Auth;
use Settisizer\SettisizerStorage;
use App\Http\Requests\GlobalGuestbookSettingsRequest;

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
        $gbEntry = GbEntry::create($request->except('_token'));
        if(Auth::check()) {
            $gbEntry->user()->associate(Auth::user());
        }

        return redirect()->route('gb_list');
    }

    public function showSettings(){
        $settisizer = new SettisizerStorage();
        return view('guestbook.global_settings', compact(['settisizer']));
    }

    public function storeSettings(GlobalGuestbookSettingsRequest $request){
        // TODO: do the magic

        $settisizer = new SettisizerStorage();

        foreach($request->except('_token')  as $key => $setting){
            $settisizer->setSetting($key, $setting);
        }

        return redirect(route('gb_settings'));
    }

    public function storeSettingsPrivate(PrivateGuestbookSettingsRequest $request){
        foreach($request->except('_token')  as $key => $setting) {
            Auth::user()->setSetting($key, $setting);
        }
        return redirect(route('gb_settings'));
    }

}
