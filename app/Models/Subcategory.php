<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description'
    ];

    public static function create($request)
    {
        $subcategory = new Subcategory();
        $subcategory['name'] = $request['name'];
        $subcategory['category_id'] = $request['category'];
        $subcategory['description'] = $request['description'];

        if ($subcategory->save()) {
            return $subcategory;
        } else {
            return false;
        }
    }

    public static function edit($request, $id = 0)
    {
        if ($id) {
            $subcategory = Subcategory::find($id);
        } else {
            return false;
        }

        $subcategory['name'] = $request['name'];
        $subcategory['category_id'] = $request['category_id'];
        $subcategory['description'] = $request['description'];

        if ($subcategory->save()) {
            return $subcategory;
        } else {
            return false;
        }
    }
}
