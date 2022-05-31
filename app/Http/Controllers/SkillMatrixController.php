<?php

namespace App\Http\Controllers;

use App\Services\SkillMatrixService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SkillMatrixController extends Controller
{
    // public function index()
    // {
    //     $users = User::latest('id')->paginate(5);
    //     $skills = Skill::all();
    //     $levels = Level::all()->sortBy('level');
    //     $skill_level= SkillLevel::all();

    //     return view('skillmatrix.index', compact('users','skills','levels','skill_level'));
    // }

    // public function store(StoreSkillLevelRequest $request){
    //     $user_id = $request->user_id;
    //     $skills_id = $request->skills_id;
    // $data = SkillLevel::where([
    //     ['user_id', $user_id],
    //     ['skills_id', $skills_id]
    // ])->first();
    //     if($data) {
    //         $data->level_id = $request->level_id;
    //         $data->start_date = $request->start_date;
    //         $data->end_date = $request->end_date;
    //         $data->save();
    //         return redirect()->route('skill-matrix.index')->with(["message" => "Update success"]);
    //     } else {
    //         SkillLevel::create($request->all());
    //         return redirect()->route('skill-matrix.index')->with(["message" => "Create success"]);
    //     }
    // }

    protected $skillMatrixService;

    public function __construct(SkillMatrixService $skillMatrixService)
    {
        $this->skillMatrixService = $skillMatrixService;
    }

    public function index()
    {
        try {
            $users = $this->skillMatrixService->getUser();
            $skills = $this->skillMatrixService->getSkill();
            $levels = $this->skillMatrixService->getLevel();
            $skill_level = $this->skillMatrixService->getSkillLevel();

            return view('skillmatrix.index', compact('users','skills','levels','skill_level'));
        } catch (Exception $e) {
            Log::channel('custom')->info('Không truy cập được máy chủ');
            return abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function storeOrUpdate(Request $request)
    {
        try {
            $dataCreate = $request->all();
            $this->skillMatrixService->saveData($request);

            return redirect()->route('skill-matrix.index');
        } catch (Exception $e) {
            Log::channel('custom')->info('Không tạo mới và update được lỗi DB');
            return abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
