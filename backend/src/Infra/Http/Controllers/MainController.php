<?php

namespace Src\Infra\Http\Controllers;

class MainController
{

    public function __construct()
    {
    }
    public function calculateRide(Request $request, calculateRide $calculateRide)
    {

        $output = calculateRide::execute(body);
        return output;
    }
}
