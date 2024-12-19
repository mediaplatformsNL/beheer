<?php
namespace App\Services;

use Artisaninweb\SoapWrapper\SoapWrapper;

class EBoekhoudenSoapService {
    protected $soapWrapper;

    public function __construct(SoapWrapper $soapWrapper) {
        $this->soapWrapper = $soapWrapper;
        $this->soapWrapper->add('Eboekhouden', function ($service) {
            $service
                ->wsdl('https://soap.e-boekhouden.nl/soap.asmx?wsdl')
                ->trace(true); // Enable trace to inspect the request/response
        });
    }

    public function openSession() {
        $parameters = [
            'Username' => 'mediaplatforms',
            'SecurityCode1' => '19e7c0e38f71faf10626018b8b3f4fea',
            'SecurityCode2' => 'B1ECEEF5-7CBD-42B7-9CC1-032F128EBDF5'
        ];

        $response = $this->soapWrapper->call('Eboekhouden.OpenSession', [$parameters]);

        // Extract SessionID en verwijder de accolades
        $sessionId = $response->OpenSessionResult->SessionID;

        return str_replace(['{', '}'], '', $sessionId);
    }

    public function getFacturen($sessionId, $invoiceNumber) {
        $parameters = [
            'SessionID' => $sessionId,
            'SecurityCode2' => 'B1ECEEF5-7CBD-42B7-9CC1-032F128EBDF5',
            'cFilter' => [
                'Factuurnummer' => $invoiceNumber,
                'DatumVan' => '2021-01-01',
                'DatumTm' => '2023-12-31'
            ]
        ];

        return $this->soapWrapper->call('Eboekhouden.GetFacturen', [$parameters]);
    }

    public function getRelatieDetails($sessionId, $relatieCode) {
        $parameters = [
            'SessionID' => $sessionId,
            'SecurityCode2' => 'B1ECEEF5-7CBD-42B7-9CC1-032F128EBDF5',
            'cFilter' => [
                'Code' => $relatieCode,
                'ID' => 0
            ]
        ];

        return $this->soapWrapper->call('Eboekhouden.GetRelaties', [$parameters]);
    }

}