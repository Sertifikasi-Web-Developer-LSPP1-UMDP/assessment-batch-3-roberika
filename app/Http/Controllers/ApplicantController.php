<?php

namespace App\Http\Controllers;

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

    public function destroy($id)
    {
        $applicant = Applicant::find($id);
        
        if (!$applicant) {
            return redirect()->route('admin.applicants.index')
                ->with('error', 'Calon mahasiswa tidak ditemukan');
        }

        $applicant->delete();

        return redirect()->route('admin.applicants.index')
            ->with('message', 'Calon mahasiswa berhasil dihapus');
    }
}
