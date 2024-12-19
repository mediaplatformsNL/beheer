<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestModel; // Zorg ervoor dat je het juiste model importeert

class RequestsController extends Controller
{
    // Toon een lijst van de resources
    public function index()
    {
        $requests = RequestModel::all(); // Haal alle requests op
        return view('admin.requests.index', compact('requests'));
    }

    // Toon het formulier voor het aanmaken van een nieuwe resource
    public function create()
    {
        return view('admin.requests.create');
    }

    // Sla een nieuw aangemaakte resource op in de database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        RequestModel::create($request->all());

        return redirect()->route('requests.index')
                         ->with('success', 'Request succesvol aangemaakt.');
    }

    // Toon een specifieke resource
    public function show($id)
    {
        $request = RequestModel::findOrFail($id);
        return view('admin.requests.show', compact('request'));
    }

    // Toon het formulier voor het bewerken van een specifieke resource
    public function edit($id)
    {
        $request = RequestModel::findOrFail($id);
        return view('admin.requests.edit', compact('request'));
    }

    // Werk een specifieke resource bij in de database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $requestModel = RequestModel::findOrFail($id);
        $requestModel->update($request->all());

        return redirect()->route('requests.index')
                         ->with('success', 'Request succesvol bijgewerkt.');
    }

    // Verwijder een specifieke resource uit de database
    public function destroy($id)
    {
        $request = RequestModel::findOrFail($id);
        $request->delete();

        return redirect()->route('requests.index')
                         ->with('success', 'Request succesvol verwijderd.');
    }
}
