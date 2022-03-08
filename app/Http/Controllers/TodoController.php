<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $items = Todo::all();
        //Todoクラスのallメソッドを利用して、todosテーブルから全件取得
        return view('index', ['items' => $items]);
        //$itemsへデータを格納する処理、$itemsを表示させる処理
    }

    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        //バリデーションの設定、Todoクラスの$rulesを指定
        $todo = new Todo();
        //新規のTodoモデルを作成
        $todo->content = $request->get('content');
        //contentをTodoモデルに設定
        $todo->save();
        //DBにデータを登録
        return redirect('/');
    }

    public function update(Request $request)
    {
        $this->validate($request, Todo::$rules);
        //バリデーションの設定、Todoクラスの$rulesを指定
        $todo = Todo::find($request->id);
        //IDに紐づくTodoモデルを取得
        $todo->content = $request->get('content');
        //contentをTodoモデルに設定
        $todo->save();
        //DBのデータを更新
        return redirect('/');
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        //IDに紐づくTodoモデルを取得
        $todo->delete();
        //DBから対象のレコードを削除
        return redirect('/');
    }
}
