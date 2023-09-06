<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ComunityExperience;
use App\Http\Requests\StoreComunityExperienceRequest;
use App\Http\Requests\UpdateComunityExperienceRequest;

class ComunityExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.experiences.index', [
            'experiences' => ComunityExperience::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('dashboard.experiences.create', [
            'employees' => Employee::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComunityExperienceRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'locations' => 'required',
            'date' => 'required',
            'target' => 'required',
            'employee_id' => 'required|exists:employees,id',
            'results' => 'required',
            'descriptions' => 'required|max:255',
            'notes' => 'required|max:255',
        ]);
    
        ComunityExperience::create($validatedData);
    
        return redirect('/dashboard/experiences')->with('success', 'New Experience has Recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ComunityExperience $comunityExperience)
    {
        $employee = Employee::where('id', $comunityExperience->employee_id)->first();
        return view('dashboard.experiences.details', [
            'exp' => $comunityExperience,
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComunityExperience $comunityExperience)
    {
        return view('dashboard.experiences.edit', [
            'exp' => $comunityExperience,
            'employees' => Employee::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComunityExperienceRequest $request, ComunityExperience $comunityExperience)
    {
        $validatedData = $request->validate([
            'name' => 'nullable',
            'type' => 'nullable',
            'locations' => 'nullable',
            'date' => 'nullable',
            'target' => 'nullable',
            'employee_id' => 'nullable|exists:employees,id',
            'results' => 'nullable',
            'descriptions' => 'nullable|max:255',
            'notes' => 'nullable|max:255',
        ]);
    
        $comunityExperience->update($validatedData);
    
        return redirect('/dashboard/experiences')->with('success', 'New Experience has Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComunityExperience $comunityExperience)
    {
        ComunityExperience::destroy($comunityExperience->id);

        return redirect()->route('experiences.index')
                ->with('success', 'Sellected Experiences data has been deleted successfully.');
    }
}
