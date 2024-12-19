<?php
namespace App\Services;

use Picqer\Financials\Moneybird\Connection as MoneybirdConnection;
use Picqer\Financials\Moneybird\Moneybird;

class MoneybirdService {
    protected $moneybird;

    public function __construct() {
        $connection = new MoneybirdConnection();
        $connection->setAccessToken(env('MONEYBIRD_API_TOKEN'));
        $connection->setAdministrationId(env('MONEYBIRD_ADMINISTRATION_ID'));
        // Voeg eventuele andere configuratieopties toe

        $this->moneybird = new Moneybird($connection);
    }

    public function getContactByCompanyName($companyName) {
        // Haal alle contacten op
        $contacts = $this->moneybird->contact()->get(['query' => $companyName]);

        if (!empty($contacts)) {
            return $contacts[0];
        }

        // Geen contact gevonden met de opgegeven bedrijfsnaam
        return null;
    }

//    public function createInvoice($contactId, $invoiceData) {
//        $invoice = $this->moneybird->salesInvoice();
//
//        $invoice->contact_id = $contactId;
//        $invoice->invoice_date = date('Y-m-d', strtotime($invoiceData->Datum)); // Factuurdatum van e-Boekhouden
//
//        // Stel de vervaldatum in op 15 dagen na de factuurdatum
//        $invoice->due_date = date('Y-m-d', strtotime($invoice->invoice_date . ' + 15 days'));
//
//        $invoice->wokrflow_id = '409805760843744503';
//
//        $factuurregels = $invoiceData->Regels->cFactuurRegel;
//
//        // Zorg ervoor dat $factuurregels altijd een array is
//        if (!is_array($factuurregels)) {
//            $factuurregels = [$factuurregels];
//        }
//
//        $details = [];
//        foreach ($factuurregels as $regel) {
//            $detail = [
//                'description' => $regel->Omschrijving,
//                'amount' => $regel->Aantal,
//                'price' => $regel->PrijsPerEenheid,
//                'tax_rate_id' => '409805760793412849',
//                'ledger_account_id' => '409817375605524359'
//            ];
//
//            $details[] = $detail;
//        }
//
//        $invoice->details = $details;
//
//        return $invoice->save();
//    }

        public function createInvoice($contactId, $invoiceData) {
            $accessToken = env('MONEYBIRD_API_TOKEN'); // Vervang dit door je Moneybird Access Token
            $administrationId = env('MONEYBIRD_ADMINISTRATION_ID'); // Vervang dit door je Moneybird Administration ID

            $url = "https://moneybird.com/api/v2/{$administrationId}/external_sales_invoices.json";

            $factuurregels = $invoiceData->Regels->cFactuurRegel;

            // Zorg ervoor dat $factuurregels altijd een array is
            if (!is_array($factuurregels)) {
                $factuurregels = [$factuurregels];
            }

            $details = [];
            foreach ($factuurregels as $regel) {
                $detail = [
                    'description' => $regel->Omschrijving,
                    'amount' => $regel->Aantal,
                    'price' => $regel->PrijsPerEenheid,
                    'tax_rate_id' => '409805760793412849',
                    'ledger_account_id' => '409817375605524359'
                ];

                $details[] = $detail;
            }

            $invoiceData = [
                'external_sales_invoice' => [
                    'reference' => $invoiceData->Factuurnummer,
                    'contact_id' => $contactId, // Vervang dit door het juiste contact_id
                    'date' => date('Y-m-d', strtotime($invoiceData->Datum)),
                    'due_date' => date('Y-m-d', strtotime($invoiceData->Datum. ' + 15 days')),
                    'details_attributes' => $details
                ]
            ];

            $headers = [
                'Authorization: Bearer ' . $accessToken,
                'Content-Type: application/json'
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($invoiceData));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            } else {
                // Verwerk de respons
                var_dump(json_decode($response, true));
            }

            curl_close($ch);
        }

}
