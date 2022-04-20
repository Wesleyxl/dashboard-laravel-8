<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public static function create($request)
    {
        $company = new Category();
        $company['name'] = $request['name'];
        $company['description'] = $request['description'];

        if ($company->save()) {
            return $company;
        } else {
            return false;
        }
    }

    public static function edit($request, $id = 0)
    {
        if ($id) {
            $company = Category::find($id);
        } else {
            return false;
        }

        $company['name'] = $request['name'];
        $company['description'] = $request['description'];

        if ($company->save()) {
            return $company;
        } else {
            return false;
        }
    }
}
