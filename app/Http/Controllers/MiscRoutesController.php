<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscRoutesController extends Controller
{
    public function choosePortal(Request $request)
    {
        $data = $request->validate([
            'portal' => ['required', 'in:journalist,mass_media'],
        ]);

        $request->session()->put('public_selected_portal', $data['portal']);

        return redirect()->route('login');
    }

    public function switchLang(Request $request, string $locale)
    {
        abort_unless(in_array($locale, ['en','sn','nd','ny','cwa','kck','nmq','ndc','tso','st','toi','tn','ven','xh'], true), 404);
        $request->session()->put('app_locale', $locale);
        if (auth()->check()) {
            auth()->user()->update(['locale' => $locale]);
        }
        return back();
    }

    public function home(Request $request)
    {
        $selected = $request->session()->get('public_selected_portal');

        if ($selected === 'journalist') {
            $request->session()->forget('public_selected_portal');
            return redirect()->route('accreditation.home');
        }

        if ($selected === 'mass_media') {
            $request->session()->forget('public_selected_portal');
            return redirect()->route('mediahouse.portal');
        }

        return redirect()->route('portal');
    }
}
