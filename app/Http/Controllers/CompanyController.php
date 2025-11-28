<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Gets a collection of Companies filtered by their name.
     */
    public function index(Request $request): Collection
    {
        $searchTerm = $request->query('search', '');

        $companies = Company::where('name', 'LIKE', "%{$searchTerm}%")
            ->with(['tasks'])
            ->get();

        return $companies;
    }
}
