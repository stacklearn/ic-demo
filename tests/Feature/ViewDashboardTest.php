<?php

namespace Tests\Feature;

use App\Child;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseSeeders;

class ViewDashboardTest extends TestCase
{
    use DatabaseMigrations;

    /** @test  */
    public function view_children()
    {
      // Create user
      $user = factory(User::class)->create();
      // Arrange
      // Create children
      $young_tyke = factory(Child::class)->create([
        'first_name' => 'Young',
        'last_name' => 'Tyke',
        'birth_date' => Carbon::parse('2012-12-01'),
        'birth_city' => 'Ann Arbor',
        'birth_state' => 'MI',
        'birth_zip' => '48103',
        'parent_id' => $user
      ]);
      $smarty_pants_teenager = factory(Child::class)->create([
        'first_name' => 'Smarty Pants',
        'last_name' => 'Teenager',
        'birth_date' => Carbon::parse('2000-4-18'),
        'birth_city' => 'Flint',
        'birth_state' => 'MI',
        'birth_zip' => '48501',
        'parent_id' => $user
      ]);

      // Log in
      Auth::login($user);

      //Act
      $response = $this->get('/');

      $response->assertSee('Young Tyke');
      $response->assertSee('Age 4');
      $response->assertSee('Smarty Pants');
      $response->assertSee('Age 17');
      $response->assertStatus(200);

    }
}
