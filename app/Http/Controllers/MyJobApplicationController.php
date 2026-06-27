<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my-job-application.index',
        [
            'applications' => auth()->user()->jobApplication()
            ->with('job', 'job.employer')
            ->latest()->get()
        ]);
    }

    public function destroy(string $id)
    {
        //
    }
}
