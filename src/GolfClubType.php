<?php
namespace R10Analyzer;


class GolfClubType implements GolfData {
    private int $value = 0;
    private string $name = '';
    private float $shaftLength = 0.0;
    private float  $loftAngle = 0.0;
    private float $lieAngle = 0.0;
    private string $displayRange = '';
    private bool $valid = false;

    public function __construct(\stdClass $obj) {
        $this->value = $obj?->value;
        $this->name = $obj?->name;
        $this->shaftLength = $obj?->shaftLength;
        $this->loftAngle = $obj?->loftAngle;
        $this->lieAngle = $obj?->lieAngle;

        if (isset($obj->displayRange)) {
            $this->displayRange = $obj->displayRange;
        }
        $this->valid = $obj?->valid;
    }

    public static function initialize(\stdClass $data) : GolfData {
        return new GolfClubType($data);
    }
    

    /**
     * Get the value of value
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
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
     * Get the value of shaftLength
     *
     * @return float
     */
    public function getShaftLength(): float
    {
        return $this->shaftLength;
    }

    /**
     * Get the value of loftAngle
     *
     * @return float
     */
    public function getLoftAngle(): float
    {
        return $this->loftAngle;
    }

    /**
     * Get the value of lieAngle
     *
     * @return float
     */
    public function getLieAngle(): float
    {
        return $this->lieAngle;
    }

    /**
     * Get the value of valid
     *
     * @return bool
     */
    public function getValid(): bool
    {
        return $this->valid;
    }

    /**
     * Get the value of displayRange
     *
     * @return string
     */
    public function getDisplayRange(): string
    {
        return $this->displayRange;
    }
}