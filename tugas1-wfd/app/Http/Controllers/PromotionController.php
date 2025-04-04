<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listPromotion = Promotion::orderBy('id','desc')->get();
        return view('promotion.index',[
            "listPromotion" => $listPromotion
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('promotion.form');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $description = $request->description;
        $image = $request->file('image');
        $path = null;
        if($image !== null) {
            $path = Storage::putFile('images', $image);
        }
        Promotion::create([
            'title' => $title,
            'description' => $description,
            "image_url" => $path
        ]);
        return redirect()->route('promotion.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promotion = Promotion::find($id);
        return view('promotion.edit', [
            'promotion' => $promotion
        ]);
    }

    public function detail(string $id)
    {
        $promotion = Promotion::find($id);
        return view('promotion.detail', [
            'promotion' => $promotion
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = $request->title;
        $description = $request->description;
        $image = $request->file('image');
        $path = null;
        if($image !== null) {
            $path = Storage::putFile('images', $image);
            Promotion::where('id', $id)->update([
                'image_url' => $path
            ]);
        }
        Promotion::where('id', $id)->update([
            'title' => $title,
            'description' => $description
        ]);
        return redirect()->route('promotion.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();
        return redirect()->route('promotion.index');
    }

}
