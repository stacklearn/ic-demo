<?php

use App\User;
use App\Child;
use App\CalendarEvent;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::first();
      $children = DB::table('children')->where('parent_id', $user->id)->get();

      foreach ($children as $child) {
        factory(CalendarEvent::class)->create([
           'title' => 'Payment for '. $child->first_name,
           'isAllDay' => true,
           'start' => Carbon::today(),
           'end' => Carbon::today()
        ]);
      }


        //  $events[] = \Calendar::event(
        //     'Payment for ' . $child->first_name, //event title
        //     true, //full day event?
        //     Carbon::today()->addMonths(1), //start time (you can also use Carbon instead of DateTime)
        //     Carbon::today()->addMonths(1) //end time (you can also use Carbon instead of DateTime)
        // 	   //optionally, you can specify an event ID
        //     // [
        //     //   'child_id' => $child->id,
        //     // ],
        // );

    }
}
