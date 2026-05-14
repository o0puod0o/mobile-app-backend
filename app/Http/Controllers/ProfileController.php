<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function me(Request $request)
    {
        $teacher = $request->user();

        return response()->json([
            'id'                 => $teacher->id,
            'code'               => $teacher->code,
            'username'           => $teacher->username,
            'full_name_th'       => $teacher->full_name_th,
            'full_name_en'       => $teacher->full_name_en,
            'email'              => $teacher->email,
            'gender'             => $teacher->gender,
            'birth_date'         => $teacher->birth_date?->format('Y-m-d'),
            'picture'            => $teacher->picture,
            'type'               => $teacher->type,
            'degree'             => $teacher->degree,
            'status'             => $teacher->status,
            'faculty_id'         => $teacher->faculty_id,
            'faculty_name_th'    => $teacher->faculty_name_th,
            'department_id'      => $teacher->department_id,
            'department_name_th' => $teacher->department_name_th,
            'campus_id'          => $teacher->campus_id,
        ]);
    }
}