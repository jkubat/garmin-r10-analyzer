<?php declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use PHPUnit\Framework\TestCase;
use R10Analyzer\GolfSimSession;

final class GolfSimSessionTest extends TestCase
{
    public function testEmptyShotsAreInitialized(): void
    {
        $summaryData = (object) [
            'clientKey' => 'dummy',
            'name' => 'session',
            'startTime' => '2023-01-01T00:00:00.000Z',
            'endTime' => '2023-01-01T00:00:00.000Z',
            'numShots' => 0,
            'type' => 'DRIVING_RANGE',
            'drivingRangeId' => 1
        ];

        $sessionData = (object) [
            'summary' => $summaryData,
            'shots' => []
        ];

        $session = new GolfSimSession($sessionData);
        $this->assertIsArray($session->getShots());
        $this->assertCount(0, $session->getShots());
    }
}
