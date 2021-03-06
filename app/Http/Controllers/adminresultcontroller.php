<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class adminresultcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.adminresult');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sectionlist_ajax()
    {
        $active_session = DB::table('sessions')->where('active',1)->first();
        if($active_session)
        {
            $data['nosession'] = false;
            $section_list = DB::table('sections')
                ->where('session_id',$active_session->id)
                ->orderBy('sections.name','asc')
                ->get();
        
            
            if(count($section_list)>0)
            {
                $data['success'] = true;
                $data['section'] = $section_list;
            }
            else
            {
                $data['success'] = false;
            }
        }
        else
        {
            $data['nosession'] = true;
        }
        return $data;
    }

    public function showstudents_ajax($id)
    {
        $section_name = DB::table('sections')->where('id',$id)->first();
        $data['section_name'] = $section_name->name;
        $active_session = DB::table('sessions')->where('active',1)->first();
        $students = DB::table('user_sections')
            ->where('section_id',$id)
            ->distinct()
            ->orderBy('user_id','asc')
            ->pluck('user_id');
        $avarage_cgpa_ofIndividual_student;
        $temp_array_to_hold_values = array();
        $count_helper=0;
        if(count($students)>0)
        {
            $data['nostudent'] = false;
            for($i=0;$i<count($students);$i++)
            {
                $total_cgpa = 0;

                $name = DB::table('users')->where('user_id',$students[$i])->pluck('name')->first();;
                // COMPLETED SECTIONS EXCLUDING CURRENT SESSION
                $completed_semester = DB::table('sessiondatas')->where('student_id',$students[$i])->where('session_id','!=',$active_session->id)->distinct()->pluck('semester_id');
                if(count($completed_semester)>0)
                {
                    for($j=0;$j<count($completed_semester);$j++)
                    {
                        $cgpa  = DB::table('sessiondatas')
                                ->where('type','!=',4)
                                ->where('student_id',$students[$i])
                                ->where('session_id','!=',$active_session->id)
                                ->where('semester_id',$completed_semester[$j])
                                ->avg('cgpa');
                        $total_cgpa = $total_cgpa+$cgpa;  
                    }
                    $avarage_cgpa_ofIndividual_student['name'] = $name;
                    $avarage_cgpa_ofIndividual_student['student_id'] = $students[$i];
                    $avarage_cgpa_ofIndividual_student['averagecgpa'] = floor(($total_cgpa/count($completed_semester))*100)/100;
                    $temp_array_to_hold_values[$count_helper] = $avarage_cgpa_ofIndividual_student;
                    $count_helper++;
                }
                else
                {   
                    $avarage_cgpa_ofIndividual_student['name'] = $name;
                    $avarage_cgpa_ofIndividual_student['student_id'] = $students[$i];
                    $avarage_cgpa_ofIndividual_student['averagecgpa'] = 0;
                    $temp_array_to_hold_values[$count_helper] = $avarage_cgpa_ofIndividual_student;
                    $count_helper++;
                }
            }
            $data['data'] = $temp_array_to_hold_values;
        }
        else
        {
            $data['nostudent'] = true;
        }
        return $data;
    }

    public function getstudentresult_ajax($id,$semester)
    {
        $active_session = DB::table('sessions')->where('active',1)->first();
        $semester_id = DB::table('semesters')->where('name',$semester)->first();

        if($semester_id)
        {
            $data['semester'] = true;
            $data['nodata'] = false;
            $datas = DB::table('sessiondatas')
                    ->where('student_id',$id)
                    ->where('session_id','!=',$active_session->id)
                    ->where('type','!=',4)
                    ->where('sessiondatas.semester_id',$semester_id->id)
                    ->join('subjects','subjects.id','=','sessiondatas.subject_id')
                    ->select('sessiondatas.attendance','sessiondatas.rora','sessiondatas.ct','sessiondatas.mid','sessiondatas.final','sessiondatas.grade','sessiondatas.cgpa','subjects.name')
                    ->get();
            if(count($datas)>0)
            {
                 $avg_cgpa = DB::table('sessiondatas')
                    ->where('student_id',$id)
                    ->where('session_id','!=',$active_session->id)
                    ->where('type','!=',4)
                    ->where('sessiondatas.semester_id',$semester_id->id)
                    ->avg('cgpa');
                $data['data'] = $datas;
                $data['avg'] = floor($avg_cgpa*100)/100;
            }
            else
            {
                $data['nodata'] = true;
            }
        }
        else
        {
            $data['semester'] = false;
        }
        return $data;
    }


    public function showretake_ajax($id)
    {
        $active_session = DB::table('sessions')->where('active',1)->first();
        $datas = DB::table('sessiondatas')
            ->where('session_id','!=',$active_session->id)
            ->where('type','!=',4)
            ->where('cgpa','=',0)
            ->join('semesters','semesters.id','=','sessiondatas.semester_id')
            ->join('subjects','subjects.id','=','sessiondatas.subject_id')
            ->select('sessiondatas.attendance','sessiondatas.rora','sessiondatas.ct','sessiondatas.mid','sessiondatas.final','sessiondatas.grade','sessiondatas.cgpa','subjects.name as subname','sessiondatas.type','semesters.name as semname')
            ->get();
        if(count($datas)>0)
        {
            $data['nodata'] = false;
            $data['data'] = $datas;
        }
        else
        {
            $data['nodata'] = true;
        }
    }
}
