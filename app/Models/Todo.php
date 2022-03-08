<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    //モデルから全てのTodoデータのID以外のカラムを取得する処理

    public static $rules = array(
        'content' => 'required|max:20',
    );
    //バリデーションの設定
}