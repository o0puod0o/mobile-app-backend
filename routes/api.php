<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\ResearchController;
use App\Http\Controllers\Api\JournalController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\PatentController;
use App\Http\Controllers\Api\AwardController;
use App\Http\Controllers\Api\AcademicController;
use App\Http\Controllers\Api\TrainingController;
use App\Http\Controllers\Api\LecturerController;
use App\Http\Controllers\Api\ProceedingController;
use App\Http\Controllers\Api\HspController;
use App\Http\Controllers\Api\WorkexController;
use App\Http\Controllers\Api\BoardexController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\InterestController;
use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\ReferenceController;


Route::get('ping', function () {
    return response()->json(['pong' => true]);
});
// Auth
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])
        ->middleware('auth:sanctum');
});


// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', [ProfileController::class, 'me']);
    Route::put('me', [ProfileController::class, 'update']);
    Route::get('announcements', [AnnouncementController::class, 'index']);

    Route::prefix('ref')->group(function () {
        Route::get('research-types', [ReferenceController::class, 'researchTypes']);
        Route::get('research-levels', [ReferenceController::class, 'researchLevels']);
        Route::get('research-pmu-types', [ReferenceController::class, 'researchPmuTypes']);
        Route::get('journal-types', [ReferenceController::class, 'journalTypes']);
        Route::get('degrees', [ReferenceController::class, 'degrees']);
        Route::get('departments', [ReferenceController::class, 'departments']);
    });


    Route::apiResource('researches', ResearchController::class);
    Route::apiResource('journals', JournalController::class);
    Route::apiResource('books', BookController::class);
    Route::apiResource('patents', PatentController::class);
    Route::apiResource('awards', AwardController::class);
    Route::apiResource('academics', AcademicController::class);
    Route::apiResource('trainings', TrainingController::class);
    Route::apiResource('lecturers', LecturerController::class);
    Route::apiResource('proceedings', ProceedingController::class);
    Route::apiResource('hsps', HspController::class);
    Route::apiResource('workexes', WorkexController::class);
    Route::apiResource('boardexes', BoardexController::class);
    Route::apiResource('educations', EducationController::class);
    Route::apiResource('interests', InterestController::class);
});
