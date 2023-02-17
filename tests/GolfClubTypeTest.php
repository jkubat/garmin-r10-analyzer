<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use R10Analyzer\GolfCLub;
use R10Analyzer\GolfClubType;

final class GolfClubTypeTest extends TestCase
{
    public function testCorrectAssert(): void
    {
        $testData = (object) [
            'value' => 1,
            'name' => "Driver",
            'shaftLength' => 45.5,
            'loftAngle' => 10.5,
            'lieAngle' => 58.5,
            'displayRange' => "8°-12°",
            'valid' => true
        ];

        $gf = new GolfClubType($testData);

        $this->assertEquals($testData->value, $gf->getValue());
        $this->assertEquals($testData->name, $gf->getName());
        $this->assertEquals($testData->shaftLength, $gf->getShaftLength());
        $this->assertEquals($testData->loftAngle, $gf->getLoftAngle());
        $this->assertEquals($testData->lieAngle, $gf->getLieAngle());
        $this->assertEquals($testData->displayRange, $gf->getDisplayRange());
        $this->assertEquals($testData->valid, $gf->getValid());
    }
}