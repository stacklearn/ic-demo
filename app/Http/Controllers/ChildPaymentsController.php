<?php

namespace App\Http\Controllers;

use App\Child;
use Illuminate\Http\Request;
use App\Billing\PaymentGateway;
use App\Billing\FakePaymentGateway;

class ChildPaymentsController extends Controller
{
    protected $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway){
      $this->paymentGateway = $paymentGateway;

    }

    public function store($childId){
      //$paymentGateway = new FakePaymentGateway;
      $child = Child::find($childId);
      $amount = request('amount');
      $token = request('payment_token');
      $this->$paymentGateway->charge($amount, $token);
      return response()->json([], 201);
    }
}
