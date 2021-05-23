<?php

namespace App\Http\Controllers;

use App\grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function setGrade($project_id,$opinion)
    {
       
        if (!Auth::user()) return ['result' => '1'];
        $gradik = grade::where('id_project',$project_id)->get();
        //return ['result'=>'2'];
        if (count($gradik) == 0)
        {
            //return ['2'=>'3'];
            $Newgradik = new grade(); 
            $Newgradik->opinion = $opinion;
            $Newgradik->id_user = Auth::user()->id;
            $Newgradik->id_project = $project_id;
            $Newgradik->save();
            $projectik = \App\Project::find($project_id);
            if ($opinion)
            {
                $projectik->count_likes++;
            }
            else
            {
                $projectik->count_dislikes++;
                
            }
            $projectik->save();
            $result = 'create';
            return ['result' => $result ];
        }
        else
        {
            if ($gradik[0]->opinion != $opinion)
            {
                $gradik[0]->opinion = $opinion;
                $gradik[0]->save();
                $projectik = \App\Project::find($project_id);
                if ($opinion)
                {
                    $projectik->count_likes++;
                    $projectik->count_likes--;
                }
                else
                {
                    $projectik->count_dislikes++;
                    $projectik->count_likes--;
                }
                $result = 'change';
                $projectik->save();
                return ['result' =>$result];
            }
            else
            {
                $result = 'no';
                return ['result' => $result];
            }
        }
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
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(grade $grade)
    {
        //
    }
}
