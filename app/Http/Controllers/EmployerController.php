<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Employer::class);

    return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->employer()->create(
            $request->validate([
                'company_name' => 'required|min:3|unique:employers,company_name'
            ])
        );

        return redirect()->route('jobs.index')
        ->with('Your Employer Account Was Created ');
    }

}
