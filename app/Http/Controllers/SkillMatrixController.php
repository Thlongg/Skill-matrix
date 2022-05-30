<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillLevelRequest;
use App\Models\Level;
use App\Models\Skill;
use App\Models\SkillLevel;
use App\Models\User;
use Illuminate\Http\Request;

class SkillMatrixController extends Controller
{
    public function index()
    {
        $users = User::latest('id')->paginate(5);
        $skills = Skill::all();
        $levels = Level::all()->sortBy('level');
        $skill_level= SkillLevel::all();

        return view('skillmatrix.index', compact('users','skills','levels','skill_level'));
    }

    public function store(StoreSkillLevelRequest $request){
        $user_id = $request->user_id;
        $skills_id = $request->skills_id;
        $data = SkillLevel::where([
            ['user_id', $user_id],
            ['skills_id', $skills_id]
        ])->first();
        if($data) {
            // $data->user_id = $request->user_id;
            // $data->skills_id = $request->skills_id;
            $data->level_id = $request->level_id;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->save();
            return redirect()->route('skill-matrix.index')->with(["message" => "Update success"]);
        } else {
            SkillLevel::create($request->all());
            return redirect()->route('skill-matrix.index')->with(["message" => "Create success"]);
        }
    }
}
