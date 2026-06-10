<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
use App\Models\Admission;
use App\Models\Course;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdmissionController extends AdminController
{
    public function index(Request $request)
    {
        $query = Admission::with('course');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('course_id')) {
            $query->where('course_id', $request->course_id);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('student_name', 'like', "%$s%")
                  ->orWhere('email', 'like', "%$s%")
                  ->orWhere('mobile', 'like', "%$s%")
                  ->orWhere('application_no', 'like', "%$s%");
            });
        }
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $admissions = $query->latest()->paginate(20)->withQueryString();
        $courses    = Course::active()->get();
        $statuses   = ['pending', 'under_review', 'approved', 'rejected'];

        return view('admin.admissions.index', compact('admissions', 'courses', 'statuses'));
    }

    public function show(Admission $admission)
    {
        $admission->load('course');
        return view('admin.admissions.show', compact('admission'));
    }

    public function updateStatus(Request $request, Admission $admission)
    {
        $request->validate([
            'status'  => 'required|in:pending,under_review,approved,rejected',
            'remarks' => 'nullable|string',
        ]);

        $admission->update([
            'status'      => $request->status,
            'remarks'     => $request->remarks,
            'reviewed_at' => now(),
        ]);

        ActivityLog::record('update', "Changed admission status to {$request->status} for {$admission->student_name}", $admission);

        return back()->with('success', 'Status updated successfully.');
    }

    public function destroy(Admission $admission)
    {
        ActivityLog::record('delete', "Deleted admission: {$admission->application_no}", $admission);
        $admission->delete();
        return redirect()->route('admin.admissions.index')->with('success', 'Application deleted.');
    }

    public function export(Request $request)
    {
        $query = Admission::with('course');
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $admissions = $query->latest()->get();

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="admissions_' . date('Y-m-d') . '.csv"',
        ];

        $callback = function () use ($admissions) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['App No', 'Name', 'Mobile', 'Email', 'Course', 'Category', 'Qualification', 'Status', 'Applied On']);
            foreach ($admissions as $a) {
                fputcsv($file, [
                    $a->application_no,
                    $a->student_name,
                    $a->mobile,
                    $a->email,
                    $a->course->name ?? '',
                    $a->category,
                    $a->qualification,
                    $a->status,
                    $a->created_at->format('d-m-Y'),
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
