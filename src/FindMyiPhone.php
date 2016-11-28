<?php

namespace Valerian\FindMyiPhone;

use GuzzleHttp\Client;

class FindMyiPhone
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $host;

    /** @var string */
    private $scope;


    /**
     * FindMyiPhone constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return Device[]
     * @throws FindMyiPhoneException
     */
    public function getDevices()
    {
        $this->authenticate();

        $url = 'https://'.$this->host.'/fmipservice/device/'.$this->scope.'/initClient';
        $response = $this->makeRequest('POST', $url);

        if ($response->getStatusCode() == 200) {
            $devices = [];
            $devicesData = json_decode($response->getBody()->getContents());
            foreach ($devicesData->content as $deviceData) {
                $devices[$deviceData->deviceDisplayName] = new Device($deviceData);
            }
            return $devices;
        }
    }

    /**
     * return device by display name
     * @param string $deviceDisplayName
     * @return Device
     * @throws FindMyiPhoneException
     */
    public function getDevice($deviceDisplayName)
    {
        return $this->getDevices()[$deviceDisplayName];
    }

    /**
     * @throws FindMyiPhoneException
     */
    private function authenticate()
    {
        $url = "https://fmipmobile.icloud.com/fmipservice/device/".$this->username."/initClient";

        $response = $this->makeRequest('POST', $url);

        if ($response->getStatusCode() == 330) {
            $this->host = $response->getHeader('X-Apple-MMe-Host')[0];
            $this->scope = $response->getHeader('X-Apple-MMe-Scope')[0];
        } else {
            throw new FindMyiPhoneException('Error while connection iCloud');
        }
    }
    
    /**
     * @param string $type
     * @param string $url
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function makeRequest($type = 'POST', $url)
    {
        $headers = array(
            "X-Apple-Realm-Support" => "1.0",
            "X-Apple-Find-API-Ver" => "3.0",
            "X-Apple-AuthScheme" => "UserIdGuest"
        );

        $headers['auth'] = [$this->username, $this->password];
        $client = new Client();
        $response = $client->request($type, $url, $headers);
        return $response;
    }
}
