<?php
namespace App\Repositories;

use App\Models\Student;
class StudentRepository
{
    public function getStudentById(int $id, array $relations=[]): Student
    {
        return Student::with($relations)->findOrFail($id);
    }

    public function storeStudent(array $request): Student
    {
        $student = Student::create($request);
        $this->saveChildRecords($student, $request);
        return $student->load('emails','phones');
    }

    public function saveChildRecords($student, array $request)
    {
        if(isset($request['student_email_details'])){
            //dd($request['student_email_details']);
            (new EmailRepository())->storeStudentEmail($student, $request['student_email_details']);
        }


        if(isset($request['student_phone_details'])){
            (new PhoneRepository())->storeStudentPhone($student, $request['student_phone_details']);
        }

    }
    public function updateStudent(Student $student, array $request): Student
    {
        if (is_int($student)) {
            $student = $this->getStudentById($student);
        }
        $student->fill($request);
        $this->saveChildRecords($student, $request);
        $student->update();
        return $student;
    }




    public function deleteStudent(Student $student): bool
    {
        return $student->delete();
    }
}