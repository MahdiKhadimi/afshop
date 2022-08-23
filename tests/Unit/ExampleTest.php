<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use app\Controllers\front_end\ProductController;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

   public function test_sepecifiect_session_exist(){
       $this->assertSessionHas('name');

   }
}
