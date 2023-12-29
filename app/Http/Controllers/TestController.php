<?php

namespace App\Http\Controllers;

use App\Services\ServiceTestBusFirst;
use App\Services\ServiceTestBusSecond;

class TestController extends Controller
{
    public function __construct(
        private ServiceTestBusFirst $busFirst,
        private ServiceTestBusSecond $busSecond,
    ) {
    }

    public function __invoke()
    {
        $this->busSecond->register();
        $this->busFirst->register();


        return response()->json(['success' => true]);
    }
}
