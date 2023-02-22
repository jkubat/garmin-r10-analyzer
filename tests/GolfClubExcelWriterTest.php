<?php declare(strict_types=1);
require_once realpath("vendor/autoload.php");

use PHPUnit\Framework\TestCase;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use R10Analyzer\GolfClubExcelWriter;
use R10Analyzer\GolfClub;
use R10Analyzer\GolfClubType;

class GolfClubExcelWriterTest extends TestCase
{
    public function testCreateWorkSheet()
    {

        $gf1 = (object) [
            'id' => 46585703,
            'clubTypeId' => 1,
            'shaftLength' => 45.5,
            'flexTypeId' => "REGULAR",
            'averageDistance' => 0,
            'adviceDistance' => 0,
            'retired' => false,
            'deleted' => false,
            'lastModifiedTime' => "2018-12-04T22:54:09.000Z"
        ];


        $gf2 = (object) [
            'id' => 46585704,
            'clubTypeId' => 2,
            'shaftLength' => 43,
            'flexTypeId' => "REGULAR",
            'averageDistance' => 0,
            'adviceDistance' => 0,
            'retired' => false,
            'deleted' => false,
            'lastModifiedTime' => "2018-12-04T22:54:09.000Z"
        ];


        // Create test data
        $golfClub1 = new GolfClub($gf1);
        $golfClub1->setType([
            new GolfClubType((object) [
                'value' => 1,
                'name' => 'Driver',
                'shaftLength' => 45.5,
                'loftAngle' => 10.5,
                'lieAngle' => 58.5,
                'displayRange' => "8°-12°",
                'valid' => true
            ])
        ]);

        $golfClub2 = new GolfClub($gf2);
        $golfClub2->setType([
            new GolfClubType((object) [
                'value' => 2,
                'name' => '3 Wood',
                'shaftLength' => 43,
                'loftAngle' => 15,
                'lieAngle' => 56.5,
                'displayRange' => "13°-17°",
                'valid' => true
            ])
        ]);

        $clubs = array($golfClub1, $golfClub2);

        // Create the GolfClubExcelWriter object and call the createWorkSheet() method
        $writer = new GolfClubExcelWriter($clubs);
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();
        $writer->createWorkSheet($worksheet);

        // Check that the worksheet has been populated correctly
        $this->assertEquals('Id', $worksheet->getCell('A1')->getValue());
        $this->assertEquals('Name', $worksheet->getCell('B1')->getValue());
        $this->assertEquals('Shaft Length', $worksheet->getCell('C1')->getValue());
        $this->assertEquals('Loft Angle', $worksheet->getCell('D1')->getValue());
        $this->assertEquals('Lie Angle', $worksheet->getCell('E1')->getValue());
        $this->assertEquals('Flex Type', $worksheet->getCell('F1')->getValue());
        $this->assertEquals('Average Distance', $worksheet->getCell('G1')->getValue());
        $this->assertEquals('Advice Distance', $worksheet->getCell('H1')->getValue());
        $this->assertEquals('Display Range', $worksheet->getCell('I1')->getValue());
        $this->assertEquals('Is Retired', $worksheet->getCell('J1')->getValue());
        $this->assertEquals('Is Deleted', $worksheet->getCell('K1')->getValue());
        $this->assertEquals('Is Valid', $worksheet->getCell('L1')->getValue());


        $this->assertEquals($golfClub1->getClubTypeId(), $worksheet->getCell('A2')->getValue());
        $this->assertEquals($golfClub1->getType()->getName(), $worksheet->getCell('B2')->getValue());
        $this->assertEquals($golfClub1->getShaftLength(), $worksheet->getCell('C2')->getValue());
        $this->assertEquals($golfClub1->getType()->getLoftAngle(), $worksheet->getCell('D2')->getValue());
        $this->assertEquals($golfClub1->getType()->getLieAngle(), $worksheet->getCell('E2')->getValue());
        $this->assertEquals($golfClub1->getFlexTypeId(), $worksheet->getCell('F2')->getValue());
        $this->assertEquals($golfClub1->getAverageDistance(), $worksheet->getCell('G2')->getValue());
        $this->assertEquals($golfClub1->getAdviceDistance(), $worksheet->getCell('H2')->getValue());
        $this->assertEquals($golfClub1->getType()->getDisplayRange(), $worksheet->getCell('I2')->getValue());
        $this->assertEquals($golfClub1->getRetired(), $worksheet->getCell('J2')->getValue());
        $this->assertEquals($golfClub1->getDeleted(), $worksheet->getCell('K2')->getValue());
        $this->assertEquals($golfClub1->getType()->getValid(), $worksheet->getCell('L2')->getValue());

        $this->assertEquals($golfClub2->getClubTypeId(), $worksheet->getCell('A3')->getValue());
        $this->assertEquals($golfClub2->getType()->getName(), $worksheet->getCell('B3')->getValue());
        $this->assertEquals($golfClub2->getShaftLength(), $worksheet->getCell('C3')->getValue());
        $this->assertEquals($golfClub2->getType()->getLoftAngle(), $worksheet->getCell('D3')->getValue());
        $this->assertEquals($golfClub2->getType()->getLieAngle(), $worksheet->getCell('E3')->getValue());
        $this->assertEquals($golfClub2->getFlexTypeId(), $worksheet->getCell('F3')->getValue());
        $this->assertEquals($golfClub2->getAverageDistance(), $worksheet->getCell('G3')->getValue());
        $this->assertEquals($golfClub2->getAdviceDistance(), $worksheet->getCell('H3')->getValue());
        $this->assertEquals($golfClub2->getType()->getDisplayRange(), $worksheet->getCell('I3')->getValue());
        $this->assertEquals($golfClub2->getRetired(), $worksheet->getCell('J3')->getValue());
        $this->assertEquals($golfClub2->getDeleted(), $worksheet->getCell('K3')->getValue());
        $this->assertEquals($golfClub2->getType()->getValid(), $worksheet->getCell('L3')->getValue());
    }
}