<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\IncomingMail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreIncomingMailRequest;
use App\Http\Requests\UpdateIncomingMailRequest;

class IncomingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.mailbox.incoming-mails', [
            'mails' => IncomingMail::with('employee')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.mailbox.create-incoming-mail', [
            'employees' => Employee::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomingMailRequest $request)
    {
        $validatedData = $request->validate([
            'number' => 'required',
            'date' => 'required',
            'sender' => 'required',
            'content' => 'required|max:255',
            'type' => 'required',
            'subject' => 'required',
            'employee_id' => 'required|exists:employees,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $validatedData['content'] = strip_tags($request->content);
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $originalName = $file->getClientOriginalName();

            $incomingMail = new IncomingMail();
            $incomingMail->number = $validatedData['number'];
            $number = $incomingMail->number; // Get the number from the database column

            $fileName = $number . '_' . time() . '.' . $extension;
            $filePath = $file->storeAs('files', $fileName);
            
            $validatedData['file'] = 'files/' . $fileName;
        }
    
        // Save the incoming mail record to the database
        IncomingMail::create($validatedData);
    
        return redirect('/dashboard/mails/incoming-mails')->with('success', 'Incoming mail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($number)
    {
        $decodedNumber = urldecode($number);
        $incomingMail = IncomingMail::where('number', $decodedNumber)->first();

        $fileName = $incomingMail->file;
        // $filePath = $incomingMail->file;
    
        // Menghapus "files/" dari nama file
        $fileName = str_replace('files/', '', $fileName);

        $encodeFileName = urlencode($fileName);

        // Membentuk URL file dengan menggunakan fungsi url() pada instance Storage
        // $fileUrl = Storage::url($filePath);
        $fileUrl = asset('storage/files/' . $encodeFileName);
    
        return view('dashboard.mailbox.incoming-mail-details', [
            'mail' => $incomingMail,
            'fileName' => $fileName,
            'fileUrl' => $fileUrl
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncomingMail $incomingMail)
    {
        return view('dashboard.mailbox.edit-incoming-mail', [
            'mail' => $incomingMail,
            'employees' => Employee::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomingMailRequest $request, IncomingMail $incomingMail)
    {
        $rules = [
            'date' => 'nullable|date',
            'sender' => 'nullable',
            'content' => 'nullable',
            'type' => 'nullable',
            'subject' => 'nullable',
            'employee_id' => 'nullable|exists:employees,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ];
    
        if ($request->input('content') != $incomingMail->content) {
            $rules['content'] = 'required|max:255';
            $validatedData['content'] = strip_tags($request->content);
        }

        if ($request->input('number') != $incomingMail->number) {
            $rules['number'] = 'required|unique:incoming_mails,number,' . $incomingMail->id;
        }
    
        $validatedData = $request->validate($rules);
        $validatedData['content'] = strip_tags($request->content);
    
        if ($request->hasFile('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
    
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
    
            $fileName = $incomingMail->number . '_' . time() . '.' . $extension;
            $filePath = $file->storeAs('files', $fileName);
    
            $validatedData['file'] = 'files/' . $fileName;
        } else {
            unset($validatedData['file']);
        }
    
        try {
            $incomingMail->update($validatedData);
    
            return redirect()->route('incoming-mails.index')
                ->with('success', 'Incoming mail updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors('Failed to update IncomingMails data. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncomingMail $incomingMail)
    {
        if($incomingMail->file) {
            Storage::delete($incomingMail->file);
        }

        IncomingMail::destroy($incomingMail->id);

        return redirect('/dashboard/mails/incoming-mails')->with('success', 'IncomingMails data has been deleted successfully.');
    }
}
