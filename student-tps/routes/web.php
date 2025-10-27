<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Section;

Route::get('/', function () {
    $studentCount = Student::count();
    $sectionCount = Section::count();

    $studentsPerSection = Section::withCount('students')->get();
    $sectionNames  = $studentsPerSection->pluck('name')->toArray();
    $studentCounts = $studentsPerSection->pluck('students_count')->toArray();

    // One JSON blob for the view (labels + data)
    $chartData = json_encode([
        'labels' => $sectionNames,
        'data'   => $studentCounts,
    ]);

    return view('dashboard', compact('studentCount', 'sectionCount', 'chartData'));
});

use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;

Route::resource('sections', SectionController::class);
Route::resource('students', StudentController::class);
