<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\CalendarEvent;
use MaddHatter\LaravelFullCalendar\Facades\Calendar;

class CalendarController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the calendar.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $events = CalendarEvent::all();
    $calendar = \Calendar::addEvents($events); //add an array with addEvents
    return view('calendar', compact('calendar'));
  }
}
