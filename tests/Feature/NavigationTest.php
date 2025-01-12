<?php

namespace Tests\Feature;

use App\View\Components\administrator\Navigation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class NavigationTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiated()
    {
        $navigation = new Navigation();

        $this->assertInstanceOf(Navigation::class, $navigation);
    }

    /** @test */
    public function it_renders_the_navigation_view()
    {
        // Mock the view to ensure it is being called correctly
        View::shouldReceive('make')
            ->once()
            ->with('components.administrator.navigation')
            ->andReturn('mocked view content');

        $navigation = new Navigation();
        $renderedView = $navigation->render();

        $this->assertEquals('mocked view content', $renderedView);
    }
}