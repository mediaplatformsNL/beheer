<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Toon een lijst van de profielen
    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('controlroom.categories.index');
    }

    // Toon het formulier voor het aanmaken van een nieuwe categorie
    public function create()
    {
        $categories = Category::all();
        return view('controlroom.categories.create', compact('categories'));
    }

    // Sla een nieuw aangemaakte categorie op in de database
    public function store(Request $request)
    {
        // Valideer het verzoek...
        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|max:255',
        ]);

        // Sla de nieuwe categorie op...
        $category = new Category;
        $category->fill($request->except('save'));
        $category->save();

        // Redirect to categories index
        return $this->redirectAfterSave($request, $category);
    }

    // Toon een specifieke categorie
    public function show(Category $category)
    {
        return view('controlroom.categories.show', compact('category'));
    }

    // Toon het formulier voor het bewerken van een bestaande categorie
    public function edit(Category $category)
    {
        return view('controlroom.categories.edit', compact('category'));
    }

    // Update een bestaande categorie in de database
    public function update(Request $request, Category $category)
    {
        // Valider het verzoek...
        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|max:255',
        ]);

        // Update de categorie...
        $category->fill($request->except('save'));
        $category->save();

        // Redirect to categories index
        return $this->redirectAfterSave($request, $category);
    }

    // Verwijder een specifieke categorie
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('controlroom.category.index');
    }

    private function redirectAfterSave(Request $request, Category $category)
    {
        $save = $request->input('save');

        if ($save == 'back') {
            return redirect()->route('controlroom.category.index')->with('success', 'De categorie is opgeslagen.');
        }

        return redirect()->route('controlroom.category.edit', $category->id)->with('success', 'De categorie is opgeslagen.');
    }
}