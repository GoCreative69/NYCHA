<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display the gallery page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $galleryItems = GalleryItem::active()->ordered()->get();
        
        return view('pages.gallery', compact('galleryItems'));
    }

    /**
     * Fetch gallery items for the homepage slider.
     *
     * @return array
     */
    public function getHomeSliderItems()
    {
        return GalleryItem::active()->ordered()->get();
    }
}
