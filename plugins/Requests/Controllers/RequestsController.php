<?php

namespace Plugins\Requests\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Plugins\Requests\Models\Request as RequestModel;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;

class RequestsController extends Controller
{
    public function index() {
        $requests = RequestModel::all();
        return view('requests::index', compact('requests'));
    }

    public function manual() {
        return view('requests::manual');
    }

    public function store(Request $request) {
        Log::info('RequestsController@store aangeroepen');
        Log::info('Request data: ', $request->all());

        $request->validate([
            'gender' => 'required|string',
            'name' => 'required|string',
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'street' => 'nullable|string',
            'house_number' => 'nullable|string',
            'addition' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'city' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'custom_questions' => 'nullable|array',
        ]);

        // Stel name samen als deze niet is ingevuld
        if (empty($request->name)) {
            $request->merge(['name' => trim($request->first_name . ' ' . $request->last_name)]);
        }

        // Zet custom_questions om naar een JSON-string
        $request->merge(['custom_questions' => json_encode($request->custom_questions)]);

        // Haal het huidige request_number op
        $requestNumberSetting = Setting::where('name', 'request_number')->first();
        $requestNumber = $requestNumberSetting ? $requestNumberSetting->value : 1;

        // Voeg het request_number toe aan het verzoek
        $request->merge(['request_number' => $requestNumber]);

        // Sla het verzoek op
        $newRequest = RequestModel::create($request->all());

        // Verhoog het request_number als het verzoek succesvol is opgeslagen
        if ($newRequest) {
            $requestNumberSetting->update(['value' => $requestNumber + 1]);
        }

        return response()->json(['message' => 'Request ' . $newRequest->request_number . ' is succesvol opgeslagen']);
    }

    public function edit(RequestModel $requestModel) {
        return view('requests::edit', compact('requestModel'));
    }

    public function update(Request $request, RequestModel $requestModel) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'city' => 'nullable|string',
            // Voeg hier meer validatieregels toe indien nodig
        ]);

        $requestModel->update($request->all());
        return redirect()->route('requests.index')->with('success', 'Request ' . $requestModel->request_number . ' is succesvol bijgewerkt');
    }
}