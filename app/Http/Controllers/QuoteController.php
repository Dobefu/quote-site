<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class QuoteController extends Controller {
    /**
     * Display a quote add form.
     */
    public function add(Request $request): Response {
        return Inertia::render('Quote/Add', []);
    }
}
