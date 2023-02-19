<?php declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use PHPUnit\Framework\TestCase;
use R10Analyzer\GolfClub;

final class GolfClubTest extends TestCase
{
    public function testCorrectAssert(): void
    {
        $testData = (object)[
            'id' => 1,
            'clubTypeId' => 2,
            'shaftLength' => 3.1,
            'flexTypeId' => 'REGULAR',
            'averageDistance' => 100,
            'adviceDistance' => 200,
            'retired'   => true,
            'deleted'   => false,
            'lastModifiedTime' => '2018-12-04T22:54:09.000Z'
        ];

        $gf = new GolfClub($testData);
        
        $this->assertEquals($testData->id, $gf->getId());
        $this->assertEquals($testData->clubTypeId, $gf->getClubTypeId());
        $this->assertEquals($testData->flexTypeId, $gf->getFlexTypeId());
        $this->assertEquals($testData->averageDistance, $gf->getAverageDistance());
        $this->assertEquals($testData->adviceDistance, $gf->getAdviceDistance());
        $this->assertEquals($testData->retired, $gf->getRetired());
        $this->assertEquals($testData->deleted, $gf->getDeleted());

        $time = new DateTime($testData->lastModifiedTime);
        $this->assertEquals($time, $gf->getLastModifiedTime());
    }
}