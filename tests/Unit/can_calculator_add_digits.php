<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravast\Calculator;

class _can_calculator_add_digits extends TestCase
{

    /** @test */
    public function testExample()
    {
        // arrange
        // inicjalizacja klasy Calculator
        $this->calculator = new Calculator();

        // act
        // przesłanie dwóch liczb do metody add
        $sum = $this->calculator->add(3, 2);

        // assert
        // sprawdzenie czy wynik po dodaniu dwóch liczb się zgadza
        $this->assertEquals($sum, 5);

    }
}

