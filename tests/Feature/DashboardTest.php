<?php

namespace Tests\Feature;

use App\Http\Controllers\Dashboard;
use Illuminate\Contracts\View\View;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function testDashboardView()
    {
        $dashboardController = new Dashboard();
        $response = $dashboardController->__invoke();

        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('dashboard', $response->name());
    }
}
