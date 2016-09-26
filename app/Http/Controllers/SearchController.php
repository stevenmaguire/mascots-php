<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mascot;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function home()
    {
        $availablePopularities = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        return view('home');
    }

    public function results(Request $request)
    {
        $availablePopularities = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $filters = $request->only(['keyword', 'popularity']);
        $mascots = Mascot::searchWith($filters)->paginate();

        return view('results', [
            'availablePopularities' => $availablePopularities,
            'filters' => $filters,
            'mascots' => $mascots
        ]);
    }

    public function submit()
    {
        return view('submit');
    }

    public function handleSubmit(Request $request)
    {
        $this->validate($request, Mascot::$creationValidationRules);

        $attributes = $request->only(['name', 'domain', 'image_url', 'description']);
        $attributes['suggested_at'] = Carbon::now();
        $attributes['suggested_by_ip'] = $request->ip();

        Mascot::withoutSyncingToSearch(function () use ($attributes) {
            Mascot::create($attributes);
        });

        return redirect()->route('submit')->with('status', 'Mascot submitted!');
    }
}
