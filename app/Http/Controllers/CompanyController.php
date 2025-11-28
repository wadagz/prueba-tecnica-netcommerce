<?php

namespace App\Http\Controllers;

use App\Http\Resources\Company\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompanyController extends Controller
{
    /**
     * Gets a collection of Companies filtered by their name.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $searchTerm = $request->query('search', '');

        $companies = Company::where('name', 'LIKE', "%{$searchTerm}%")
            ->with(['tasks'])
            ->get();

        return CompanyResource::collection($companies);
    }
}
