<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\View\View;

class DonusenHayatlarController extends Controller
{
    public function index(): View
    {
        return view('pages.deneyimler.donusen-hayatlar', [
            'items' => Testimonial::active()->orderBy('sort')->orderBy('id')->get(),
        ]);
    }
}
