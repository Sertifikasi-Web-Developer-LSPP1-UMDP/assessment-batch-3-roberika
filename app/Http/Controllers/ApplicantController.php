<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::all();
        return view('admin.applicants', compact('applicants'));
    }

    public function update(Request $request, $id)
    {
        // TODO: Update hanya untuk ubah status
        $validatedData = $request->validate([
        ]);

        $applicant = Applicant::findOrFail($id);
        $applicant->update($validatedData);

        return redirect()->route('admin.applicants.index');
    }

    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        return redirect()->route('admin.applicants.index');
    }
}
