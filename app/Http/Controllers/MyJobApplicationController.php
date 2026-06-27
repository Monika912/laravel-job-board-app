<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
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
            ->with([
                'job' => fn($query) => $query->withCount('jobApplication')
                    ->withAvg('jobApplication','expected_salary'),
                'job.employer'
            ])
            ->latest()->get()
        ]);
    }

    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with(
            'success',
            'Job Application Deleted Successfully'
        );
    }
}
