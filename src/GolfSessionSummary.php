<?php

namespace R10Analyzer;

class GolfSessionSummary implements GolfData
{

    private string $clientKey;
    private string $name;
    private \DateTime $startTime;
    private \DateTime $endTime;
    private int $numShots;
    private string $type;
    private int $drivingRangeId;

    public function __construct(\stdClass $data) {
        
        $this->clientKey = $data->clientKey;
        $this->name = $data->name;
        $this->startTime = new \DateTime($data->startTime);
        $this->endTime = new \DateTime($data->endTime);
        $this->numShots = $data->numShots;
        $this->type = $data->type;

        if(isset($data->drivingRangeId)) {
            $this->drivingRangeId = (int)$data->drivingRangeId;
        }
    } 

    public static function initialize(\stdClass $data) : GolfData {
        return new GolfSessionSummary($data);
    }

    /**
     * Get the value of clientKey
     *
     * @return string
     */
    public function getClientKey(): string
    {
        return $this->clientKey;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of startTime
     *
     * @return \DateTime
     */
    public function getStartTime(): \DateTime
    {
        return $this->startTime;
    }

    /**
     * Get the value of endTime
     *
     * @return \DateTime
     */
    public function getEndTime(): \DateTime
    {
        return $this->endTime;
    }

    /**
     * Get the value of numShots
     *
     * @return int
     */
    public function getNumShots(): int
    {
        return $this->numShots;
    }

    /**
     * Get the value of type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get the value of drivingRangeId
     *
     * @return int
     */
    public function getDrivingRangeId(): int
    {
        return $this->drivingRangeId;
    }
}