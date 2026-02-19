<?php
namespace Tests\Routeur; 

use App\Router\Router;
use PHPUnit\Framework\TestCase;
use Tests\Controller\FakeController;

class RouterTest extends TestCase 
{
        //si $router entristre les route
    public function testRegisterClosureRoute()
    {
        $closure = function() { return "hello"; };
        
        $router = new Router();
        $router->register('/test', $closure);
        
        $this->assertArrayHasKey('/test', $router->routes);

    }


    // if $action est un callable
    public function testRegisterStoreRoute()
    {
        $closure = function() { return "hello"; };
        
        $router = new Router();
        $router->register('/test', $closure);
        
        $this->assertArrayHasKey('/test', $router->routes);
        $this->assertSame($closure, $router->routes['/test']);
    }

    // if $action est un callable
    public function testRegisterControllerRoute()
    {
        $action = [FakeController::class, "index"];

        $router = new Router();
        $router->register('/test',$action);

        $this->assertSame($action, $router->routes["/test"]);
    }







        
}