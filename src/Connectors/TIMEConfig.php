<?php

namespace SIVI\LaravelAFD\Connectors;

use Illuminate\Contracts\Config\Repository as ConfigRepository;

class TIMEConfig implements \SIVI\AFDConnectors\Config\Contracts\TIMEConfig
{

    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * Get the host of the service
     *
     * @return string
     */
    public function getHost()
    {
        return $this->configRepository->get('afd.connectors.time.host');
    }

    /**
     * The path where the WSDL for the service will be stored.
     *
     * This is because the WSDL is not public and needs to be requested with
     * a client certificate. The PHP SOAP extension does not support
     * this and that is why a local one must be created.
     *
     * @return string
     */
    public function getWSDLStoragePath()
    {
        return $this->configRepository->get('afd.connectors.time.wsdl_storage_path');
    }

    /**
     * The path where the Solera certificate is stored.
     * This needs to be a PEM file.
     *
     * @return string
     */
    public function getCertificatePath()
    {
        return $this->configRepository->get('afd.connectors.time.certificate_path');
    }

    /**
     * The passphrase of the Solera certificate.
     *
     * @return string
     */
    public function getCertificatePassphrase()
    {
        return $this->configRepository->get('afd.connectors.time.certificate_passphrase');
    }
}