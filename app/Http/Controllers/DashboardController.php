<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Publication;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use App\Models\ComunityExperience;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $numberOfEmployees = Employee::count();
        $numberOfUsers = User::count();
        $numberOfPublications = Publication::count();
        $numberOfExperience = ComunityExperience::count();
        $numberOfIncomingMails = IncomingMail::count();
        $numberOfOutgoingMails = OutgoingMail::count();

        return view('dashboard.index', compact('numberOfEmployees', 'numberOfUsers', 'numberOfIncomingMails', 'numberOfOutgoingMails', 'numberOfPublications', 'numberOfExperience'));
    }
}
