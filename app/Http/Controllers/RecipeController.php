<?php

namespace App\Http\Controllers;

use App\Http\Requests\Recipes\StoreRecipeRequest;
use App\Http\Requests\Recipes\UpdateRecipeRequest;
use App\Http\Resources\Recipe as RecipeResource;
use App\Http\Resources\RecipeCollection;
use App\Models\Recipe;

class RecipeController extends Controller
{

    /**
     * @return \App\Http\Resources\RecipeCollection
     */
    public function index(): RecipeCollection
    {
        $recipes = Recipe::all();

        return new RecipeCollection($recipes);
    }

    /**
     * @param \App\Http\Requests\Recipes\StoreRecipeRequest $request
     */
    public function store(StoreRecipeRequest $request): RecipeResource
    {
        $recipe              = new Recipe;
        $recipe->name        = $request->name;
        $recipe->description = $request->description;
        $recipe->level       = $request->level;
        $recipe->time        = $request->time;
        $recipe->save();

        return new RecipeResource($recipe);
    }

    /**
     * @param \App\Http\Requests\Recipes\UpdateRecipeRequest $request
     * @param \App\Models\Recipe                             $recipe
     *
     * @return \App\Http\Resources\Recipe
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe): RecipeResource
    {
        $recipe->name        = $request->get('name', $recipe->name);
        $recipe->description = $request->get('description', $recipe->description);
        $recipe->level       = $request->get('level', $recipe->level);
        $recipe->time        = $request->get('time', $recipe->time);
        $recipe->save();

        return new RecipeResource($recipe);
    }

    /**
     * @param \App\Models\Recipe $recipe
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return response(null, 204);
    }

}
