<?php

namespace Tests\Feature;

use App\Child;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewChildTest extends TestCase
{
    use DatabaseMigrations;

    /** @test  */
    public function view_a_child()
    {
      // Arrange
      // Create the user
      $user = factory(User::class)->create();
      // Create a child
      $child = factory(Child::class)->create([
        'birth_date' => Carbon::parse('2000-12-01'),
      ]);

      Auth::login($user);

      //Act
      $response = $this->get('/children/'.$child->id);

      $response->assertSee('Young Tyke');
      $response->assertSee('December 1, 2000');
      $response->assertSee('Fakeville, MI 90210');
      $response->assertStatus(200);
    }
}
