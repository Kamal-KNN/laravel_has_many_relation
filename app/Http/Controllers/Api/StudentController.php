<?php

namespace App\Http\Controllers\Api;
use App\Repositories\StudentRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function __construct(private StudentRepository $studentRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return Student::query()->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        // $storeEmployeeRequest->validated()
        $validated=$request->validated();


        return $this->studentRepository->storeStudent($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $updatetudentSRequest, int $id)
    {
        $student = $this->studentRepository->getStudentById($id);
        return $this->studentRepository->updateStudent($student, $updatetudentSRequest->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $this->studentRepository->deleteStudent($this->studentRepository->getStudentById($id));
    }
}
