<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->validate([
            'name' => ['required', 'unique:types'],
        ]);

        $form_data['slug'] = Helpers::generateSlug($form_data['name']);

        $type = Type::create($form_data);

        return redirect()->back()->with('message', "Nuova tipologia $type->name creata.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $form_data = $request->validate(
            [
                'name' => ['required', Rule::unique('types')->ignore('$type')]
            ]
        );
        $form_data['slug'] = Helpers::generateSlug($form_data['name']);

        $type->update($form_data);

        return redirect()->back()->with('message', "La tipologia $type->name è stata modificata.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->back()->with('message', "La tipologia $type->name è stata eliminata.");
    }
}
