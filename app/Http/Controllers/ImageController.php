<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use App\Models\Comment;
use App\Models\Like;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request = null): Renderable
    {
        $images = Image::with("user")->withCount('likes')->withCount('comments')->latest()->paginate(8);
        
        return view("images.index", compact("images"));
    }
    public function imagen_detallada(Request $request): Renderable{
        $image = Image::where("id", $request->image_id)->with("user")->withCount("likes", "comments")->addSelect(['likes_usuario' => Like::select('id')
        ->where('user_id', auth()->id())
        ->whereColumn('image_id', 'images.id')])->first();
        $comments = Comment::with("user")->where("image_id", $request->image_id)->latest()->paginate();
        return view("images.imagen_detallada", compact("image","comments"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->storePublicly('user_images');
        Image::create([
            
            'user_id' => auth()->id(),
            'image_path' => $path,
            'description' => $request->description,
            'created_at' => now(),
        ]);

        session()->flash("success", __("Se ha creado correctamente"));
        return redirect(route("images.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($image_id)
    {
        $image = Image::where('id', $image_id)->first();
        $image->delete();
        return redirect()->back();
    }
}
