<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\Job1;
use Carbon\Carbon;


class MyController extends Controller
{
    protected function store(Request $request)
	{
		$job=(new Job1())->onConnection('database')->onQueue('processing') ->delay(Carbon::now());
		dispatch($job);
	}
}
