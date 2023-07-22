<?php

namespace Src\Domain;

use DateTime;
use Exception;

class Date
{

    protected DateTime $date;

    public function __construct(string $date, protected string $format = "Y-m-d H:i:s")
    {
        if (!$this->isValidDate($date)) throw new Exception("Invalid date");
        $this->date = new DateTime($date);
    }
    public function getHour()
    {
        return $this->date->format('H');
    }
    public function getDay()
    {
        return $this->date->format('d');
    }
    private function isValidDate($date)
    {
        $d = DateTime::createFromFormat($this->format, $date);
        return $d && $d->format($this->format) == $date;
    }
}
