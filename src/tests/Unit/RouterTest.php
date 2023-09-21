<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase {

    protected function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }

    /** @test */
    public function it_registers_a_route(): void {
        $this->router->register('get', '/users', ['Users', 'index']);
        $expected = [
            'get' => [
                '/users' => ['Users', 'index']
            ]
        ];
        $this->assertEquals($expected, $this->router->routes);
    }

    /** @test*/
    public function there_no_routes_when_first_created() {
        $this->assertEmpty($this->router->routes);
    }
}