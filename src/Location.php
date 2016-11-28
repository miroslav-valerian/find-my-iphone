<?php

namespace Valerian\FindMyiPhone;

class Location
{
    protected $datetime;

    protected $positionType;

    protected $latitude;

    protected $horizontalAccuracy;

    protected $longitude;

    public function __construct($data)
    {
        if ($data->timeStamp) {
            $unixTimestamp = round($data->timeStamp/1000);
            $this->setDatetime((new \DateTime())->setTimestamp($unixTimestamp));
        }
        $this->setPositionType($data->positionType)
            ->setLatitude($data->latitude)
            ->setLongitude($data->longitude)
            ->setHorizontalAccuracy($data->horizontalAccuracy);
    }

    /**
     * @param $this $datetime
     */
    public function setDatetime(\DateTime $datetime)
    {
        $this->datetime = $datetime;
        return $this;
    }


    /**
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->datetime;
    }

    /**
     * @param string $positionType
     */
    public function setPositionType($positionType)
    {
        $this->positionType = (string) $positionType;
        return $this;
    }

    /**
     * @return string
     */
    public function getPositionType()
    {
        return $this->positionType;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = (float) $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param int $horizontalAccuracy
     */
    public function setHorizontalAccuracy($horizontalAccuracy)
    {
        $this->horizontalAccuracy = (int) $horizontalAccuracy;
        return $this;
    }

    /**
     * @return int
     */
    public function getHorizontalAccuracy()
    {
        return $this->horizontalAccuracy;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = (float) $longitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}