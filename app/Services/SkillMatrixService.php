<?php

namespace App\Services;

use App\Repositories\SkillMatrixRepository;

class SkillMatrixService
{
    protected $skillMatrixRepository;

    public function __construct(SkillMatrixRepository $skillMatrixRepository)
    {
        $this->skillMatrixRepository = $skillMatrixRepository;
    }

    public function getSkillLevel()
    {
        return $this->skillMatrixRepository->getAllSkillLevel()->all();
    }

    public function getUser()
    {
        return $this->skillMatrixRepository->getAllUser()->latest('id')->paginate(5);
    }

    public function getLevel()
    {
        return $this->skillMatrixRepository->getAllLevel()->all()->sortBy('level');
    }

    public function getSkill()
    {
        return $this->skillMatrixRepository->getAllSkill()->all();
    }

    public function saveData($request)
    {
        $dataCreate = $request->all();
        $user_id = $request->user_id;
        $skills_id = $request->skills_id;
        $data = $this->skillMatrixRepository->getAllSkillLevel()->where([
            ['user_id', $user_id],
            ['skills_id', $skills_id]
        ])->first();
        if ($data) {
            $data->level_id = $request->level_id;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->save();
            return redirect()->route('skill-matrix.index')->with(["message" => "Update success"]);
        } else {
            $this->skillMatrixRepository->getAllSkillLevel()->create($dataCreate);
            return redirect()->route('skill-matrix.index')->with(["message" => "Create success"]);
        }
    }
}
