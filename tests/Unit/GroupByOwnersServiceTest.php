<?php

namespace Tests\Unit;

use App\Services\GroupByOwnersService;
use Illuminate\Foundation\Testing\TestCase;

class GroupByOwnersServiceTest extends TestCase
{
    public function testGroupByOwners()
    {
        $groupByOwnersService = new GroupByOwnersService();

        $files = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B",
        ];

        $expectedResult = [
            "Company A" => ["insurance.txt", "letter.docx"],
            "Company B" => ["Contract.docx"],
        ];

        $this->assertEquals($expectedResult, $groupByOwnersService->groupByOwners($files));
    }

    public function createApplication()
    {
        // TODO: Implement createApplication() method.
    }
}
