<?php

namespace Src\Domain;

use DateTime;

class Date{

   public function __construct(protected DateTime $date)
   {
    if (!$this->isValidDate()) throw new Exception("Invalid date");

   }
   public function getHour(){
    return $this->date->format('H')
   }
   public function getDay(){
    return $this->date->format('d')
   }
   private function isValidDate()
   {
       $d = DateTime::createFromFormat($format, $date);
       return $d && $d->format($format) == $date;
   }
}