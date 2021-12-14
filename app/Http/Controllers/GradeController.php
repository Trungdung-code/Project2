<?php

namespace App\Http\Controllers;

use App\Exports\GradeExport;
use App\Imports\GradeImport;
use App\Models\ClassModels;
use App\Models\GradeModel;
use App\Models\StudentModel;
use App\Models\SubjectModel;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $grade = DB::table('grades')
        ->join('subject','subject.idSub','=','grades.idSub')
        ->where('grades.idStudent','=',$id)
        ->get();
        return view('grade.show', [
            'grade' => $grade
        ]);
    }

    //SELECT student.*, grades.Skill1 FROM `student` inner join grades on student.idStudent = grades.idStudent


}
