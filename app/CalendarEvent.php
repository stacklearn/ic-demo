<?php
namespace App;

class CalendarEvent extends \Illuminate\Database\Eloquent\Model implements \MaddHatter\LaravelFullcalendar\IdentifiableEvent
{
      protected $guarded = [];
      protected $dates = ['start', 'end'];

   /**
    * Get the event's id number
    *
    * @return int
    */
   public function getId()
   {
       return $this->id;
   }

   /**
    * Get the event's title
    *
    * @return string
    */
   public function getTitle()
   {
       return $this->title;
   }

   /**
    * Is it an all day event?
    *
    * @return bool
    */
   public function isAllDay()
   {
       return $this->isAllDay;
   }

   /**
    * Get the start time
    *
    * @return DateTime
    */
   public function getStart()
   {
       return $this->start;
   }

   /**
    * Get the end time
    *
    * @return DateTime
    */
   public function getEnd()
   {
       return $this->end;
   }

   /**
    * Get the optional event options
    *
    * @return array
    */
   public function getEventOptions()
   {
       $options = is_null($this->options) ? [] : $this->options;
       return $options;
   }
 }
