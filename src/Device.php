<?php

namespace Valerian\FindMyiPhone;

class Device
{
    /** @var int */
    protected $id;

    /** @var bool */
    protected $lowPowerMode;

    /** @var bool */
    protected $isLocating;

    /** @var string */
    protected $modelDisplayName;

    /** @var bool */
    protected $batteryLevel;

    /** @var bool */
    protected $locationEnabled;

    /** @var string */
    protected $deviceDisplayName;

    /** @var float */
    protected $batteryStatus;

    /** @var string*/
    protected $name;

    /** @var string */
    protected $deviceClass;

    /** @var string */
    protected $deviceModel;

    /** @var int */
    protected $maxMsgChar;

    /** @var Location */
    protected $location;

    /**
     * Device constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->setId($data->id)
            ->setLowPowerMode($data->lowPowerMode)
            ->setIsLocating($data->isLocating)
            ->setModelDisplayName($data->modelDisplayName)
            ->setBatteryLevel($data->batteryLevel)
            ->setLocationEnabled($data->locationEnabled)
            ->setDeviceDisplayName($data->deviceDisplayName)
            ->setBatteryStatus($data->batteryStatus)
            ->setDeviceClass($data->deviceClass)
            ->setDeviceModel($data->deviceModel)
            ->setMaxMsgChar($data->maxMsgChar);
        if ($data->location)
            $this->setLocation(new Location($data->location));
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function getLowPowerMode()
    {
        return $this->lowPowerMode;
    }

    /**
     * @param boolean $lowPowerMode
     */
    public function setLowPowerMode($lowPowerMode)
    {
        $this->lowPowerMode = (bool) $lowPowerMode;
        return $this;
    }

    /**
     * @param bool $isLocating
     */
    public function setIsLocating($isLocating)
    {
        $this->isLocating = (bool) $isLocating;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsLocating()
    {
        return $this->isLocating;
    }

    /**
     * @param string $modelDisplayName
     */
    public function setModelDisplayName($modelDisplayName)
    {
        $this->modelDisplayName = (string) $modelDisplayName;
        return $this;
    }

    /**
     * @return string
     */
    public function getModelDisplayName()
    {
        return $this->modelDisplayName;
    }

    /**
     * @param boolean $batteryLevel
     */
    public function setBatteryLevel($batteryLevel)
    {
        $this->batteryLevel = (float) $batteryLevel;
        return $this;
    }

    /**
     * @return float
     */
    public function getBatteryLevel()
    {
        return $this->batteryLevel;
    }

    /**
     * @param bool $locationEnabled
     */
    public function setLocationEnabled($locationEnabled)
    {
        $this->locationEnabled = (bool) $locationEnabled;
        return $this;
    }

    /**
     * @return bool
     */
    public function getLocationEnabled()
    {
        return $this->locationEnabled;
    }

    /**
     * @param string $deviceDisplayName
     */
    public function setDeviceDisplayName($deviceDisplayName)
    {
        $this->deviceDisplayName = (string) $deviceDisplayName;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeviceDisplayName()
    {
        return $this->deviceDisplayName;
    }

    /**
     * @param float $batteryStatus
     */
    public function setBatteryStatus($batteryStatus)
    {
        $this->batteryStatus = (string) $batteryStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getBatteryStatus()
    {
        return $this->batteryStatus;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = (string) $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $deviceClass
     */
    public function setDeviceClass($deviceClass)
    {
        $this->deviceClass = (string) $deviceClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeviceClass()
    {
        return $this->deviceClass;
    }

    /**
     * @param string $deviceModel
     */
    public function setDeviceModel($deviceModel)
    {
        $this->deviceModel = (string) $deviceModel;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeviceModel()
    {
        return $this->deviceModel;
    }

    /**
     * @param int $maxMsgChar
     */
    public function setMaxMsgChar($maxMsgChar)
    {
        $this->maxMsgChar = (int) $maxMsgChar;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxMsgChar()
    {
        return $this->maxMsgChar;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }
}
