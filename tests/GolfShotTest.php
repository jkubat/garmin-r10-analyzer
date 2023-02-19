<?php declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use PHPUnit\Framework\TestCase;
use R10Analyzer\GolfShot;

final class GolfShotTest extends TestCase
{
    public function testCorrectAssert(): void
    {
        $testData = (object) [
            'simShotClientKey' => "60AAC3CA-688F-4A39-B60F-FCFC5B0ED26C1",
            'simSessionClientKey' => "3609A6FD-B7D1-43D7-8CA2-724EED8B992B2023-02-11",
            'playerProfileId' => 72615533,
            'shotTime' => "2023-02-11T13:26:17.000Z",
            'shotOrder' => 1,
            'clubId' => 46585714,
            'ballSpeed' => 37.33,
            'horizontalLaunchAngle' => 8.64,
            'clubHeadSpeed' => 31.57,
            'clubPathAngle' => -7.59,

            'backSwingTime' => 1.585,
            'downSwingTime' => 0.175,
            'attackAngle' => 3.57,
            'clubFaceAngle' => 11.68,
            'spinRate' => 1298.35,
            'spinAxis' => -30,
            'smashFactor' => 1.18,
            'swingTempo' => 9.1,
            'lastModifiedTime' => "2023-02-11T14:40:45.000Z",
            'spinCalculationType' => "RATIO",
            'ballType' => "NORMAL",
            'temperature' => 5,
            'humidity' => 69,
            'airPressure' => 100.14,
        ];

        $gf = new GolfShot($testData);

        $this->assertEquals($testData->simShotClientKey, $gf->getSimShotClientKey());
        $this->assertEquals($testData->simSessionClientKey, $gf->getSimSessionClientKey());
        $this->assertEquals($testData->playerProfileId, $gf->getPlayerProfileId());

        $time = new DateTime($testData->shotTime);
        $this->assertEquals($time, $gf->getShotTime());

        $this->assertEquals($testData->shotOrder, $gf->getShotOrder());
        $this->assertEquals($testData->clubId, $gf->getClubId());
        $this->assertEquals($testData->ballSpeed, $gf->getBallSpeed());
        $this->assertEquals($testData->horizontalLaunchAngle, $gf->getHorizontalLaunchAngle());
        $this->assertEquals($testData->clubHeadSpeed, $gf->getClubHeadSpeed());
        $this->assertEquals($testData->clubPathAngle, $gf->getClubPathAngle());
        $this->assertEquals($testData->backSwingTime, $gf->getBackSwingTime());
        $this->assertEquals($testData->downSwingTime, $gf->getDownSwingTime());
        $this->assertEquals($testData->attackAngle, $gf->getAttackAngle());
        $this->assertEquals($testData->clubFaceAngle, $gf->getClubFaceAngle());
        $this->assertEquals($testData->spinRate, $gf->getSpinRate());
        $this->assertEquals($testData->spinAxis, $gf->getSpinAxis());
        $this->assertEquals($testData->smashFactor, $gf->getSmashFactor());
        $this->assertEquals($testData->swingTempo, $gf->getSwingTempo());

        $time = new DateTime($testData->lastModifiedTime);
        $this->assertEquals($time, $gf->getLastModifiedTime());

        $this->assertEquals($testData->spinCalculationType, $gf->getSpinCalculationType());
        $this->assertEquals($testData->ballType, $gf->getBallType());
        $this->assertEquals($testData->temperature, $gf->getTemperature());
        $this->assertEquals($testData->humidity, $gf->getHumidity());
        $this->assertEquals($testData->airPressure, $gf->getAirPressure());
    }
}