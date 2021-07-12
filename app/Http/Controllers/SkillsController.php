<?php

namespace App\Http\Controllers;

use App\Models\skills;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SkillsImport;
use Illuminate\Support\Facades\DB;
use App\Models\RelationSkillsUser;
use App\Models\User;


class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $skills = DB::table('skills')->skip(0)->take(1000)->get()->toArray();
            $format = [
                'status' => 'ok', 
                'message' => 'List Skills',
                'data' => $skills,
            ];
            return response()->json($format);
        } catch (\Throwable $th) {
            $errors = $e->getMessage();
            $format = [
                'status' => 'errors', 
                'message' => $errors,
            ];
            return response()->json($format,400);
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
        try {
            Excel::import(new SkillsImport, $request->file('file')->store('temp'));
            $message = "Proceso Realizado Con Exito";
            $format = [
                'status' => 'success', 
                'message' => $message,
            ];
            return response()->json($format, 200);

        } catch (\Throwable $e) {
            $errors = $e->getMessage();
            $format = [
                'status' => 'errors', 
                'message' => $errors,
            ];
            return response()->json($format, 400);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadxls(Request $request)
    {
 
        try {
            Excel::import(new SkillsImport, $request->file('file')->store('temp'));
            $message = "Proceso Realizado Con Exito";
            $format = [
                'status' => 'success', 
                'message' => $message,
            ];
            return redirect('http://127.0.0.1:5500/');

        } catch (\Throwable $e) {
            $errors = $e->getMessage();
            $format = [
                'status' => 'errors', 
                'message' => $errors,
            ];
            return response()->json($format, 400);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function show(skills $skills)
    {
        //data
    }

    public function showSkill(Request $request, skills $skills)
    {
        try {
            $UserObj = User::where('email',$request->input('emialUser'))->get()->toArray();
            $RelationSkillsUserObj = RelationSkillsUser::where('users_id',$UserObj[0]['id'])->get()->toArray();
            $NameSkillsArry = array();
            foreach ($RelationSkillsUserObj as $key => $value) {
                $NameSkills = skills::where('id',$value['skills_id'])->get()->toArray();
                $NameSkillsArry[$NameSkills[0]['id']] = $NameSkills[0]['skill'];
            }
            
            $message = "Proceso Realizado Con Exito";
            $format = [
                'status' => 'success', 
                'message' => $message,
                'dataSkills' => $NameSkillsArry,
            ];
            return response()->json($format, 200);

        } catch (\Throwable $e) {
            $errors = $e->getMessage();
            $format = [
                'status' => 'errors', 
                'message' => $errors,
            ];
            return response()->json($format, 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function edit(skills $skills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, skills $skills)
    {
        try {
            
            $UserObj = User::where('email',$request->input('emialUser'))->get()->toArray();
            $RelationSkillsUserObj = RelationSkillsUser::where('users_id',$UserObj[0]['id'])->delete();

            $SkllisExpl = explode(",", $request->input('dataSkill'));
            foreach ($SkllisExpl as $key => $value) {
                $idSkillBD = str_replace("dbSe_", '', $value);
                // $UserObj = User::where('email',$request->input('emialUser'))->get()->toArray();
                $RelationSkillsUserObj = new RelationSkillsUser();
                $RelationSkillsUserObj->users_id = $UserObj[0]['id'];
                $RelationSkillsUserObj->skills_id = $idSkillBD;
                $result = $RelationSkillsUserObj->save();
                if (!$result) {
                    $format = [
                        'status' => 'errors', 
                        'message' => 'Error Base de datos',
                    ];
                    return response()->json($format, 400);
                }
            }
            
            $message = "Proceso Realizado Con Exito";
            $format = [
                'status' => 'success', 
                'message' => $message,
            ];
            return response()->json($format, 200);

        } catch (\Throwable $e) {
            $errors = $e->getMessage();
            $format = [
                'status' => 'errors', 
                'message' => $errors,
            ];
            return response()->json($format, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function destroy(skills $skills)
    {
        //
    }
}
