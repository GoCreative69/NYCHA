<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryItem;

class DashboardController extends Controller
{
    /**
     * Display the dashboard homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get counts for dashboard statistics
        $galleryCount = GalleryItem::count();
        
        return view('dashboard.index', compact('galleryCount'));
    }
}
