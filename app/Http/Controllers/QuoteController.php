<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuoteController extends Controller {
    /**
     * Display a quote add form.
     */
    public function create(Request $request): RedirectResponse {
        $validated = $request->validate([
            'quote' => ['required'],
            'name' => ['required'],
        ]);

        Quote::factory()->create($validated);

        return back();
    }
}
