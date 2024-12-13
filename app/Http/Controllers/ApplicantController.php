<?php

namespace App\Http\Controllers;

use App\Models\ApplicantStatus;
use Illuminate\Http\Request;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::paginate(30);
        return view('admin.applicants', [
            'applicants' => $applicants,
        ]);
    }
    
    public function create()
    {
        return view('application');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|string',
            'gender' => 'required|string',
            'birthplace' => 'required|string',
            'birthdate' => 'required|date',
            'religion' => 'required|string',  
            'citizenship' => 'required|string',  
            'address' => 'required|string',  
            'phone_number' => 'required|numeric',  
            'guardian_phone_number' => 'required|numeric',  
            'school' => 'required|string',  
            'school_path' => 'required|string',  
            'major' => 'required|string',
            'reason' => 'required|string',
        ]);

        Applicant::create([
            'id' => $request->id,
            'name' => $request->name,
            'gender' => $request->gender,  
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'religion' => $request->religion,
            'citizenship' => $request->citizenship,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'guardian_phone_number' => $request->guardian_phone_number,
            'school' => $request->school,
            'school_path' => $request->school_path,
            'major' => $request->major,
            'reason' => $request->reason,
            'status_id' => ApplicantStatus::VERIFYING,
        ]);

        return redirect()->route('dashboard')
            ->with('message', 'Berhasil mendaftar sebagai calon mahasiswa');
    }

    public function update(Request $request, $id)
    {
        $applicant = Applicant::find($id);
        if (!$applicant) {
            return redirect()->route('admin.applicants.index')
                ->with('error', 'Calon mahasiswa tidak ditemukan');
        }

        $applicant->status_id = $request->status_id;
        $applicant->save();

        return redirect()->route('admin.applicants.index')
            ->with('message', 'Status calon mahasiswa berhasil diubah');
    }
}
