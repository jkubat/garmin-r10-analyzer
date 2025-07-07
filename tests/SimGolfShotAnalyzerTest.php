<?php declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use PHPUnit\Framework\TestCase;
use R10Analyzer\SimGolfShotAnalyzer;
use R10Analyzer\GolfSimSession;
use R10Analyzer\GolfShot;
use R10Analyzer\GolfClub;
use R10Analyzer\GolfClubType;

final class SimGolfShotAnalyzerTest extends TestCase
{
    public function testGoodShotFiltering(): void
    {
        // create golf club type and club
        $clubType = new GolfClubType((object) [
            'value' => 1,
            'name' => 'Driver',
            'shaftLength' => 45,
            'loftAngle' => 10,
            'lieAngle' => 58,
            'displayRange' => '',
            'valid' => true
        ]);

        $clubData = (object) [
            'id' => 1,
            'clubTypeId' => 1,
            'shaftLength' => 45,
            'flexTypeId' => 'REGULAR',
            'averageDistance' => 0,
            'adviceDistance' => 0,
            'retired' => false,
            'deleted' => false,
            'lastModifiedTime' => '2023-05-01T00:00:00.000Z'
        ];
        $club = new GolfClub($clubData);
        $club->setType([$clubType]);

        // shot meeting all conditions
        $shotGoodData = (object) [
            'simShotClientKey' => 'good',
            'simSessionClientKey' => 's1',
            'playerProfileId' => 1,
            'shotTime' => '2023-05-01T00:00:00.000Z',
            'shotOrder' => 1,
            'clubId' => 1,
            'totalDistance' => 130,
            'carryDistance' => 130,
            'totalDeviationDistance' => 10,
            'lastModifiedTime' => '2023-05-01T00:00:01.000Z'
        ];

        $shotShortData = (object) [
            'simShotClientKey' => 'short',
            'simSessionClientKey' => 's1',
            'playerProfileId' => 1,
            'shotTime' => '2023-05-01T00:00:02.000Z',
            'shotOrder' => 2,
            'clubId' => 1,
            'totalDistance' => 100,
            'carryDistance' => 100,
            'totalDeviationDistance' => 5,
            'lastModifiedTime' => '2023-05-01T00:00:03.000Z'
        ];

        $shotWideData = (object) [
            'simShotClientKey' => 'wide',
            'simSessionClientKey' => 's1',
            'playerProfileId' => 1,
            'shotTime' => '2023-05-01T00:00:04.000Z',
            'shotOrder' => 3,
            'clubId' => 1,
            'totalDistance' => 130,
            'carryDistance' => 130,
            'totalDeviationDistance' => -40,
            'lastModifiedTime' => '2023-05-01T00:00:05.000Z'
        ];

        $sessionData = (object) [
            'summary' => (object) [
                'clientKey' => 'ck1',
                'name' => 'session',
                'startTime' => '2023-05-01T00:00:00.000Z',
                'endTime' => '2023-05-01T00:10:00.000Z',
                'numShots' => 3,
                'type' => 'DRIVING_RANGE',
                'drivingRangeId' => 1
            ],
            'shots' => [$shotGoodData, $shotShortData, $shotWideData]
        ];
        $session = new GolfSimSession($sessionData);

        $config = [
            'driver_min_carry' => 120,
            'driver_max_deviation_distance' => 30
        ];

        $analyzer = new SimGolfShotAnalyzer([$session], [$club], $config);

        $result = $analyzer->getAnalyzedData();
        $shots = $result[0]->getShots();

        $this->assertTrue($shots[0]->getGoodShot());
        $this->assertFalse($shots[1]->getGoodShot());
        $this->assertFalse($shots[2]->getGoodShot());
    }
}
