<?php

namespace Tests\Feature;

use App\User;
use App\Child;
use App\Billing\PaymentGateway;
use App\Billing\FakePaymentGateway;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class MakePaymentsTest extends TestCase
{
  use DatabaseMigrations;

  /** @test  */
  public function supporter_can_make_payment_for_child()
  {
    // Arrange
    $paymentGateway = new FakePaymentGateway;
    $this->app->instance('App\Billing\PaymentGateway', $paymentGateway);

    $user = factory(User::class)->create();
    $child = factory(Child::class)->create();
    Auth::login($user);

    // Act
    // Make a payment
    $response = $this->json('POST', "/children/{$child->id}/payments", [
        'payer' => Auth::id(),
        'amount' => 35000,
        'payment_token' => $paymentGateway->getValidTestToken(),
    ]);

    // Assert
    $response->assertStatus(201);
    $this->assertEquals(35000, $paymentGateway->totalCharges());
    // Make sure a pending payment transaction exists for this
    $this->assertTrue($child->payments->contains(function ($payment){
      return $payment->payer == Auth::id() && $payment->payee == $child->id;
    }));
  }
}
