<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.employees.employees', [
            'employees' => Employee::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.employees.create-employee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'expertise' => 'required',
            'nik' => 'required|unique:employees',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required|unique:employees',
            'email' => 'required|email:dns|unique:employees',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = Str::slug($request->input('name')) . '_' . time() . '.' . $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('photos', $photoName);
            $validatedData['photo'] = 'photos/' . $photoName;
        }
        
        try {
            Employee::create($validatedData);

            return redirect()->route('members.index')
                ->with('success', 'Member data has been added successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors('Failed to add Member data. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {

        return view('dashboard.employees.employee-details', [
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('dashboard.employees.edit-employee', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $rules = [
            'expertise' => 'required',
            'name' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
        ];

        if($request->input('phone') != $employee->phone) {
            $rules['phone'] = 'required|unique:employees';
        }if($request->input('nik') != $employee->nik) {
            $rules['nik'] = 'required|unique:employees';
        }if($request->input('email') != $employee->email) {
            $rules['email'] = 'required|email:dns|unique:employees';
        }
        
        $validatedData = $request->validate($rules);
            
        if ($request->hasFile('photo')) {
            if($request->oldPhoto) {
                Storage::delete($request->oldPhoto);
            }

            $photo = $request->file('photo');
            $photoName = Str::slug($request->input('name')) . '_' . time() . '.' . $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('photos', $photoName);
            
            $validatedData['photo'] = 'photos/' . $photoName;
        } else {
            unset($validatedData['photo']);
        }

        try {
            $employee->update($validatedData);

            return redirect()->route('employees.index')
                ->with('success', 'Employee data has been Updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors('Failed to update employee data. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if($employee->photo) {
            Storage::delete($employee->photo);
        }

        Employee::destroy($employee->id);

        return redirect()->route('members.index')
                ->with('success', 'Member data has been deleted successfully.');
    }
}
