<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\ProgramService;
use Illuminate\Http\Request;
use App\Helpers\CacheHelper;
class ProgramController extends Controller
{
    public function __construct(
        private ProgramService $programService
    ) {}

    public function index()
    {

        return view('frontend.programs.index', [
            'categories' => $this->programService->getCategoriesWithPrograms(),
            'Programs' => CacheHelper::getActiveProgramsPaginated(6),
        ]);
    }

    public function show(string $slug)
    {
        $program = $this->programService->getProgramBySlug($slug);
        return view('frontend.programs.show', [
            'program' => $program,
            'relatedPrograms' => $this->programService->getRelatedPrograms($program),
        ]);
    }



}
