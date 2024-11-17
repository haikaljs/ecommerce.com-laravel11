<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';

    static public function getRecord(){
        return self::select('subcategories.*', 'users.name as created_by_name', 'categories.name as category_name')
                    ->join('categories', 'categories.id', '=', 'subcategories.category_id')
                    ->join('users', 'users.id', '=', 'subcategories.created_by')
                    ->where('subcategories.is_delete', '=', 0)
                    ->orderBy('subcategories.id', 'desc')
                    ->paginate(20);

    }

    static public function getSingle($id){
        return self::find($id);
    }
}
