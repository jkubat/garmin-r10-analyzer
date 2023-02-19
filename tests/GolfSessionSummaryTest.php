<?php declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use PHPUnit\Framework\TestCase;
use R10Analyzer\GolfCLub;
use R10Analyzer\GolfSessionSummary;

final class GolfSessionSummaryTest extends TestCase
{
    public function testCorrectAssert(): void
    {
        $testData = (object) [
            'clientKey' => "7C1F8543-AE01-411C-B1C8-9CAB78AF34E82023-02-12",
            'name' => "úno 12, 2023",
            'startTime' => "2023-02-12T14:28:07.000Z",
            'endTime' => "2023-02-12T15:37:23.000Z",
            'numShots' => 86,
            'type' => "DRIVING_RANGE",
            'drivingRangeId' => 10
        ];

        $gf = new GolfSessionSummary($testData);

        $this->assertEquals($testData->clientKey, $gf->getClientKey());
        $this->assertEquals($testData->name, $gf->getName());

        $time = new DateTime($testData->startTime);
        $this->assertEquals($time, $gf->getStartTime());

        $time = new DateTime($testData->endTime);
        $this->assertEquals($time, $gf->getEndTime());
        $this->assertEquals($testData->numShots, $gf->getNumShots());
        $this->assertEquals($testData->type, $gf->getType());
        $this->assertEquals($testData->drivingRangeId, $gf->getDrivingRangeId());
    }
}