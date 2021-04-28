<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ingredients\StoreIngredientRequest;
use App\Http\Requests\Ingredients\UpdateIngredientRequest;
use App\Http\Resources\Ingredient as IngredientResource;
use App\Http\Resources\IngredientCollection;
use App\Models\Ingredient;

class IngredientController extends Controller
{

    /**
     * @return \App\Http\Resources\IngredientCollection
     */
    public function index(): IngredientCollection
    {
        $ingredients = Ingredient::all();

        return new IngredientCollection($ingredients);
    }

    /**
     * @param \App\Http\Requests\Ingredients\StoreIngredientRequest $request
     *
     * @return \App\Http\Resources\Ingredient
     */
    public function store(StoreIngredientRequest $request): IngredientResource
    {
        $ingredient = new Ingredient;
        $ingredient->name = $request->name;
        $ingredient->description = $request->description;
        $ingredient->image = $request->image;
        $ingredient->magnitude()->associate($request->magnitude_id);
        $ingredient->save();

        return new IngredientResource($ingredient);
    }

    /**
     * @param \App\Http\Requests\Ingredients\UpdateIngredientRequest $request
     * @param \App\Models\Ingredient                                 $ingredient
     *
     * @return \App\Http\Resources\Ingredient
     */
    public function update(UpdateIngredientRequest $request, Ingredient $ingredient): IngredientResource
    {
        $ingredient->name = $request->get('name', $ingredient->name);
        $ingredient->description = $request->get('description', $ingredient->description);
        $ingredient->image = $request->get('image', $ingredient->image);
        $ingredient->magnitude()->associate($request->get('magnitude_id', $ingredient->magnitude_id));
        $ingredient->save();

        return new IngredientResource($ingredient);
    }

    /**
     * @param \App\Models\Ingredient $ingredient
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Ingredient $ingredient) {
        $ingredient->delete();

        return response(null, 204);
    }

}
