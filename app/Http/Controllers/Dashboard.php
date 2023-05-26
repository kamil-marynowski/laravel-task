<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class Dashboard extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view(view: 'dashboard');
    }
}
