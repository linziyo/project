<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Article;
use Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{

    public $createValidation = ['title' => 'required|max:100', 'content' => 'required|max:200', 'image' => 'image'];
    public $createColumns = ['title', 'content', 'image'];
    public $updateValidation = ['title' => 'required|max:100', 'content' => 'required|max:200'];
    public $updateColumns = ['title', 'content'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        if (empty($q)) {
            return view('tenant.article.index')->withList(Article::orderBy('updated_at','DESC')->paginate(20))->withInput($request->all());
        } else {
            return view('tenant.article.index')->withList(Article::where('title', 'like', "%$q%")->orderBy('updated_at','DESC')->paginate(20))
                                                     ->withInput($request->all());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Form::setValidation($this->createValidation);
        return view('tenant.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $imageUrl = $request->file('image')->store('images');

        $model = new Article();
        $model->fill($request->all());
        $model->image = $imageUrl;
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action('Tenant\ArticleController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('tenant.article.show')->withModel(Article::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Form::setValidation($this->updateValidation);
        return view('tenant.article.edit')->withModel(Article::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = Input::only($this->updateColumns);
        $rules = $this->updateValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $model = Article::findOrFail($id);
        $model->fill($request->all());
        if($request->file('image')){
            $model->image = $request->file('image')->store('images');
        }
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action('Tenant\ArticleController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Article::findOrFail($id);
        $model->destroy($id);
        return response()->json(['success' => true]);
    }
}
