<?php
namespace App\Repositories;
use App\Models\Phone;
class PhoneRepository
{
    // public function getEmployeeSocialAccountById(int $id, array $relations=[]): EmployeeSocialAccount
    // {
    //     return EmployeeSocialAccount::with($relations)->findOrFail($id);
    // }


    public function storeStudentPhone($phone, array $request)
    {
        $student_phone_details=collect();
        if (! is_null($request)) {
            foreach ($request as $studentPhoneRequest) {
                $studentphone = new Phone();
                if (!is_null(@$studentPhoneRequest['id'])) {
                    $studentphone = Phone::findOrFail($studentPhoneRequest['id']);
                }
                $studentphone->fill($studentPhoneRequest);
                $studentphone->student()->associate($phone);
                $studentphone->save();
                $student_phone_details->push($studentphone);
            }
        }
    }
}
