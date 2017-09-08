<?php

namespace Tests\Unit;

use App\Child;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ChildTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function can_get_the_formatted_birth_date()
    {
      $child = factory(Child::class)->create([
        'birth_date' => Carbon::parse('2000-12-01'),
      ]);
      $this->assertEquals('December 1, 2000', $child->formatted_birth_date);
    }
}
