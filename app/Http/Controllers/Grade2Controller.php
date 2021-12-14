<?php

namespace App\Http\Controllers;

use App\Exports\Grade2Export;
use App\Imports\Grade2Import;
use App\Models\ClassModels;
use App\Models\Grade2Model;
use App\Models\GradeModel;
use App\Models\StudentModel;
use App\Models\SubjectModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Grade2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listClass = ClassModels::all();
        $listSub = SubjectModel::all();
        $listGrade = GradeModel::all();
        return view('grade2.index', [
            'listClass' => $listClass,
            'listSub' => $listSub,
            'listGrade' => $listGrade,
        ]);
    }

    //SELECT student.*, grades.Skill1 FROM `student` inner join grades on student.idStudent = grades.idStudent

    public function getStudentsByIDClass($id)
    {
        $listStudent = StudentModel::where('idClass', $id)->get();
        return $listStudent;
    }

    public function getSubjectByIdClass($id)
    {
        $listSub = DB::table('subject')
            ->join('major', 'major.idMajor', '=', 'subject.idMajor')
            ->join('classroom', 'classroom.idMajor', '=', 'major.idMajor')
            ->where('idClass', '=', $id)
            ->get();
        return $listSub;
    }

    public function store(Request $request)
    {
        $idStudent = $request->get('idStudent');
        $idSub = $request->get('idSubject');
        $skillGrade = $request->get('skillGrade');
        $finalGrade = $request->get('finalGrade');
        Grade2Model::where('idStudent', $idStudent)->where('idSub', $idSub)->update([
            'Skill2' => $skillGrade,
            'Final2' => $finalGrade,
        ]);
        return redirect(route('grade2.index'))->with('success', 'Thêm điểm thành công');
    }

    public function show(Request $request, $id)
    {
        $grade = DB::table('grades')
            ->join('subject', 'subject.idSub', '=', 'grades.idSub')
            ->where('grades.idStudent', '=', $id)
            ->get();
        return view('grade2.show', [
            'grade' => $grade
        ]);
    }
}
