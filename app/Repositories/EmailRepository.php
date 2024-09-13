<?php

namespace App\Repositories;
use App\Models\Email;
class EmailRepository
{
    // public function getEmployeeBankAccountById(int $id, array $relations=[]): EmployeeBankAccount
    // {
    //     return EmployeeBankAccount::with($relations)->findOrFail($id);
    // }


    public function storeStudentEmail($student, array $request)
    {
        $student_email_details=collect();

        if (! is_null($request)) {
            foreach ($request as $studentEmailRequest) {
                $studentEmail = new Email();
                if (!is_null(@$studentEmailRequest['id'])) {
                    $studentEmail = Email::findOrFail($studentEmailRequest['id']);
                }
                $studentEmail->fill($studentEmailRequest);
                $studentEmail->student()->associate($student);
                $studentEmail->save();
                $student_email_details->push($studentEmail);
            }
        }
    }
}