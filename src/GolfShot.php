<?php
namespace R10Analyzer;

class GolfShot {

    private string $simShotClientKey ='';
    private string $simSessionClientKey ='';
    private int $playerProfileId = 0;
    private \DateTime $shotTime;
    private int $shotOrder = 0;
    private int $clubId = 0;
    private float $ballSpeed = 0.0;
    private float $verticalLaunchAngle = 0.0;
    private float $horizontalLaunchAngle  = 0.0;
    private float $clubHeadSpeed  = 0.0;
    private float $clubPathAngle  = 0.0;
    private float $backSwingTime  = 0.0;
    private float $downSwingTime  = 0.0;
    private float $attackAngle  = 0.0;
    private float $clubFaceAngle  = 0.0;
    private float $spinRate  = 0.0;
    private float $spinAxis  = 0.0;
    private float $smashFactor  = 0.0;
    private float $carryDistance = 0.0;
    private float $totalDistance = 0.0;
    private float $targetDistance = 0.0;
    private float $swingTempo  = 0.0;
    private float $apexHeight = 0.0;
    private float $totalDeviationDistance = 0.0;
    private \DateTime $lastModifiedTime;
    private string $spinCalculationType = '';
    private string $ballType  = '';
    private float $temperature  = 0.0;
    private float $humidity  = 0.0;
    private float $airPressure  = 0.0;

    private bool $goodShot = true;

    public function __construct(\stdClass $club) {
        $this->simShotClientKey = $club->simShotClientKey;
        $this->simSessionClientKey = $club->simSessionClientKey;
        $this->playerProfileId = $club->playerProfileId;
        $this->shotTime = new \DateTime($club->shotTime);
        $this->shotOrder = (int)$club?->shotOrder;

        if(isset($club->ballSpeed)) {
            $this->ballSpeed = (float)$club?->ballSpeed;
        }
        $this->clubId = (int)$club?->clubId;

        if(isset($club->verticalLaunchAngle)) {
            $this->verticalLaunchAngle = (float)$club?->verticalLaunchAngle;
        }

        if(isset($club->horizontalLaunchAngle)) {
            $this->horizontalLaunchAngle = (float)$club?->horizontalLaunchAngle;
        }

        if(isset($club->clubHeadSpeed)) {
            $this->clubHeadSpeed = (float)$club?->clubHeadSpeed;
        }

        if(isset($club->clubPathAngle)) {
            $this->clubPathAngle = (float)$club?->clubPathAngle;
        }

        if(isset($club->backSwingTime)) {
            $this->backSwingTime = (float)$club?->backSwingTime;
        }

        if(isset($club->downSwingTime)) {
            $this->downSwingTime = (float)$club?->downSwingTime;
        }

        if(isset($club->attackAngle)) {
            $this->attackAngle = (float)$club?->attackAngle;
        }

        if(isset($club->apexHeight)) {
            $this->apexHeight = (float)$club?->apexHeight;
        }

        if(isset($club->totalDeviationDistance)) {
            $this->totalDeviationDistance = (float)$club?->totalDeviationDistance;
        }

        if(isset($club->clubFaceAngle)) {
            $this->clubFaceAngle = (float)$club?->clubFaceAngle;
        }

        if(isset($club->spinRate)) {
          $this->spinRate = (float)$club?->spinRate;
        }

        if(isset($club->spinCalculationType)) {
            $this->spinCalculationType = $club->spinCalculationType;
        }

        if(isset($club->spinAxis)) {
            $this->spinAxis = (float)$club?->spinAxis;
        }

        if(isset($club->carryDistance)) {
            $this->carryDistance = (float)$club?->carryDistance;
        }

        if(isset($club->totalDistance)) {
            $this->totalDistance = (float)$club?->totalDistance;
        }

        if(isset($club->targetDistance)) {
            $this->targetDistance = (float)$club?->targetDistance;
        }

        if(isset($club->smashFactor)) {
            $this->smashFactor = (float)$club?->smashFactor;
        }

        if(isset($club->swingTempo)) {
            $this->swingTempo = (float)$club?->swingTempo;
        }
        $this->lastModifiedTime = new \DateTime($club->lastModifiedTime);

        if(isset($club->ballType)) {
            $this->ballType = $club?->ballType;
        }

        if(isset($club->ballType)) {
            $this->ballType = $club?->ballType;
        }

        if(isset($club->temperature)) {
            $this->temperature = (float)$club?->temperature;
        }

        if(isset($club->humidity)) {
            $this->humidity = (float)$club?->humidity;
        }

        if(isset($club->airPressure)) {
            $this->airPressure = (float)$club?->airPressure;
        }
    }

    /**
     * Get the value of simShotClientKey
     *
     * @return string
     */
    public function getSimShotClientKey(): string
    {
        return $this->simShotClientKey;
    }

    /**
     * Get the value of simSessionClientKey
     *
     * @return string
     */
    public function getSimSessionClientKey(): string
    {
        return $this->simSessionClientKey;
    }

    /**
     * Get the value of playerProfileId
     *
     * @return int
     */
    public function getPlayerProfileId(): int
    {
        return $this->playerProfileId;
    }

    /**
     * Get the value of shotTime
     *
     * @return \DateTime
     */
    public function getShotTime(): \DateTime
    {
        return $this->shotTime;
    }

    /**
     * Get the value of shotOrder
     *
     * @return int
     */
    public function getShotOrder(): int
    {
        return $this->shotOrder;
    }

    /**
     * Get the value of clubId
     *
     * @return int
     */
    public function getClubId(): int
    {
        return $this->clubId;
    }

    /**
     * Get the value of ballSpeed
     *
     * @return float
     */
    public function getBallSpeed(): float
    {
        return $this->ballSpeed;
    }

    /**
     * Get the value of horizontalLaunchAngle
     *
     * @return float
     */
    public function getHorizontalLaunchAngle(): float
    {
        return $this->horizontalLaunchAngle;
    }

    /**
     * Get the value of clubHeadSpeed
     *
     * @return float
     */
    public function getClubHeadSpeed(): float
    {
        return $this->clubHeadSpeed;
    }

    /**
     * Get the value of clubPathAngle
     *
     * @return float
     */
    public function getClubPathAngle(): float
    {
        return $this->clubPathAngle;
    }

    /**
     * Get the value of backSwingTime
     *
     * @return float
     */
    public function getBackSwingTime(): float
    {
        return $this->backSwingTime;
    }

    /**
     * Get the value of downSwingTime
     *
     * @return float
     */
    public function getDownSwingTime(): float
    {
        return $this->downSwingTime;
    }

    /**
     * Get the value of attackAngle
     *
     * @return float
     */
    public function getAttackAngle(): float
    {
        return $this->attackAngle;
    }

    /**
     * Get the value of clubFaceAngle
     *
     * @return float
     */
    public function getClubFaceAngle(): float
    {
        return $this->clubFaceAngle;
    }

    /**
     * Get the value of spinRate
     *
     * @return float
     */
    public function getSpinRate(): float
    {
        return $this->spinRate;
    }

    /**
     * Get the value of spinAxis
     *
     * @return float
     */
    public function getSpinAxis(): float
    {
        return $this->spinAxis;
    }

    /**
     * Get the value of smashFactor
     *
     * @return float
     */
    public function getSmashFactor(): float
    {
        return $this->smashFactor;
    }

    /**
     * Get the value of swingTempo
     *
     * @return float
     */
    public function getSwingTempo(): float
    {
        return $this->swingTempo;
    }

    /**
     * Get the value of lastModifiedTime
     *
     * @return \DateTime
     */
    public function getLastModifiedTime(): \DateTime
    {
        return $this->lastModifiedTime;
    }

    /**
     * Get the value of spinCalculationType
     *
     * @return string
     */
    public function getSpinCalculationType(): string
    {
        return $this->spinCalculationType;
    }

    /**
     * Get the value of ballType
     *
     * @return string
     */
    public function getBallType(): string
    {
        return $this->ballType;
    }

    /**
     * Get the value of temperature
     *
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * Get the value of humidity
     *
     * @return float
     */
    public function getHumidity(): float
    {
        return $this->humidity;
    }

    /**
     * Get the value of airPressure
     *
     * @return float
     */
    public function getAirPressure(): float
    {
        return $this->airPressure;
    }

    /**
     * Get the value of verticalLaunchAngle
     *
     * @return float
     */
    public function getVerticalLaunchAngle(): float
    {
        return $this->verticalLaunchAngle;
    }

    /**
     * Get the value of carryDistance
     *
     * @return float
     */
    public function getCarryDistance(): float
    {
        return $this->carryDistance;
    }

    /**
     * Get the value of totalDistance
     *
     * @return float
     */
    public function getTotalDistance(): float
    {
        return $this->totalDistance;
    }

    /**
     * Get the value of apexHeight
     *
     * @return float
     */
    public function getApexHeight(): float
    {
        return $this->apexHeight;
    }

    /**
     * Get the value of targetDistance
     *
     * @return float
     */
    public function getTargetDistance(): float
    {
        return $this->targetDistance;
    }

    /**
     * Get the value of goodShot
     *
     * @return bool
     */
    public function getGoodShot(): bool
    {
        return $this->goodShot;
    }

    /**
     * Set the value of goodShot
     *
     * @param bool $goodShot
     *
     * @return self
     */
    public function setGoodShot(bool $goodShot): self
    {
        $this->goodShot = $goodShot;

        return $this;
    }

    /**
     * Get the value of totalDeviationDistance
     *
     * @return float
     */
    public function getTotalDeviationDistance(): float
    {
        return $this->totalDeviationDistance;
    }
}