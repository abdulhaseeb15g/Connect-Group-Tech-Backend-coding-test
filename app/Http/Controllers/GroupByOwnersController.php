<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;


use App\Services\GroupByOwnersService;

class GroupByOwnersController extends Controller
{
    public function showGroupedOwners()
    {
        // Sample data
        $files = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B",
        ];

        // Instantiate the service
        $groupByOwnersService = new GroupByOwnersService();

        // Call the groupByOwners method
        $result = $groupByOwnersService->groupByOwners($files);

        // Pass the result to the view
        return view('challenge4.index', compact('result','files'));
    }
}
