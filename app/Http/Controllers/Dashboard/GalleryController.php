<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryItems = GalleryItem::orderBy('order')->paginate(10);
        return view('dashboard.gallery.index', compact('galleryItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'type' => 'required|in:regular,featured',
            'active' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');
            
            GalleryItem::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'image_path' => $imagePath,
                'order' => $validated['order'] ?? 0,
                'type' => $validated['type'],
                'active' => $request->has('active'),
            ]);
            
            return redirect()->route('dashboard.gallery.index')
                ->with('success', 'Gallery item created successfully.');
        }
        
        return back()->with('error', 'There was a problem uploading the image.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryItem $gallery)
    {
        return view('dashboard.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryItem $gallery)
    {
        return view('dashboard.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryItem $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'type' => 'required|in:regular,featured',
            'active' => 'sometimes|boolean',
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'order' => $validated['order'] ?? $gallery->order,
            'type' => $validated['type'],
            'active' => $request->has('active'),
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            
            // Store new image
            $data['image_path'] = $request->file('image')->store('gallery', 'public');
        }
        
        $gallery->update($data);
        
        return redirect()->route('dashboard.gallery.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryItem $gallery)
    {
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        
        $gallery->delete();
        
        return redirect()->route('dashboard.gallery.index')
            ->with('success', 'Gallery item deleted successfully.');
    }
    
    /**
     * Update the order of multiple gallery items.
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:gallery_items,id',
            'items.*.order' => 'required|integer',
        ]);
        
        foreach ($request->items as $item) {
            GalleryItem::find($item['id'])->update(['order' => $item['order']]);
        }
        
        return response()->json(['success' => true]);
    }
    
    /**
     * Toggle the active status of a gallery item.
     */
    public function toggleStatus(GalleryItem $gallery)
    {
        $gallery->update([
            'active' => !$gallery->active
        ]);
        
        return redirect()->route('dashboard.gallery.index')
            ->with('success', 'Gallery item status updated successfully.');
    }
}
