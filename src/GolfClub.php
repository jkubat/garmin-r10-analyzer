<?php
namespace R10Analyzer;

class GolfCLub implements GolfData {

    private int $id = 0;
    private int $clubTypeId = 0;
    private float $shaftLength = 0.0;
    private string $flexTypeId = '';
    private int $averageDistance = 0;
    private int $adviceDistance = 0;
    private bool $retired = false;
    private bool $deleted = false;
    private \DateTime $lastModifiedTime;

    private GolfClubType $type;

    public function __construct(\stdClass $club) {
        $this->id = $club?->id;
        $this->clubTypeId = $club?->clubTypeId;
        $this->shaftLength = $club?->shaftLength;
        $this->flexTypeId = $club?->flexTypeId;
        $this->flexTypeId = $club?->flexTypeId;
        $this->shaftLength = $club?->shaftLength;
        $this->adviceDistance = $club?->adviceDistance;
        $this->averageDistance = $club?->averageDistance;
        $this->retired = $club?->retired;
        $this->deleted = $club?->deleted;


        if(isset($club?->lastModifiedTime)) {
            $this->lastModifiedTime = new \DateTime($club->lastModifiedTime); 
        }
    }

    public static function initialize(\stdClass $data) : GolfData {
        return new GolfCLub($data);
    }

   /** @var GolfCLubType[] An array of GolfCLubTypes objects. */
    public function setType(array $types) {   
        for ($i=0; $i<count($types);$i++) {
            if ($this->clubTypeId == $types[$i]->getValue()) {
                $this->type = $types[$i];
                break;
            }
        }
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of clubTypeId
     *
     * @return int
     */
    public function getClubTypeId(): int
    {
        return $this->clubTypeId;
    }

    /**
     * Get the value of shaftLength
     *
     * @return float
     */
    public function getShaftLength(): float
    {
        return $this->shaftLength;
    }

    /**
     * Get the value of flexTypeId
     *
     * @return string
     */
    public function getFlexTypeId(): string
    {
        return $this->flexTypeId;
    }

    /**
     * Get the value of averageDistance
     *
     * @return int
     */
    public function getAverageDistance(): int
    {
        return $this->averageDistance;
    }

    /**
     * Get the value of adviceDistance
     *
     * @return int
     */
    public function getAdviceDistance(): int
    {
        return $this->adviceDistance;
    }

    /**
     * Get the value of retired
     *
     * @return bool
     */
    public function getRetired(): bool
    {
        return $this->retired;
    }

    /**
     * Get the value of deleted
     *
     * @return bool
     */
    public function getDeleted(): bool
    {
        return $this->deleted;
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
     * Get the value of type
     *
     * @return GolfClubType
     */
    public function getType(): GolfClubType
    {
        return $this->type;
    }
}