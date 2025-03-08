<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class GalleryItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the storage link is created
        if (!file_exists(public_path('storage'))) {
            $this->command->info('Creating storage link...');
            $this->command->call('storage:link');
        }
        
        // Ensure gallery directory exists
        if (!Storage::disk('public')->exists('gallery')) {
            Storage::disk('public')->makeDirectory('gallery');
        }
        
        // Copy images from public to storage
        $sourceDir = public_path('images/gallery');
        $destinationDir = storage_path('app/public/gallery');
        
        if (file_exists($sourceDir)) {
            // Copy each image
            $galleryImages = [
                'g-1.jpg' => ['title' => 'Stormwater Management', 'description' => 'Innovative drainage pathways directing stormwater away from buildings'],
                'g-2.jpg' => ['title' => 'Community Garden Plots', 'description' => 'Community garden plots designed for water absorption and food production'],
                'g-3.jpg' => ['title' => 'Waste Management Infrastructure', 'description' => 'Sustainable waste management infrastructure with water capture elements'],
                'g-4.jpg' => ['title' => 'Basketball Court', 'description' => 'Basketball court with permeable surfaces to reduce runoff'],
                'g-5.jpg' => ['title' => 'Drainage System', 'description' => 'Retrofitted drainage system with decorative blue elements'],
                'g-6.jpg' => ['title' => 'Public Seating Area', 'description' => 'Public seating area with integrated water management features'],
                'g-7.jpg' => ['title' => 'Stormwater Capture Basin', 'description' => 'Stormwater capture basin integrated into building entrance pathway'],
                'g-8.jpg' => ['title' => 'Urban Drainage Channel', 'description' => 'Urban drainage channel designed to handle overflow during severe storms'],
            ];
            
            $now = Carbon::now();
            $galleryData = [];
            $order = 0;
            
            foreach ($galleryImages as $filename => $details) {
                $sourcePath = $sourceDir . '/' . $filename;
                $destPath = 'gallery/' . $filename;
                
                if (file_exists($sourcePath)) {
                    // Copy file to storage
                    if (!file_exists($destinationDir)) {
                        mkdir($destinationDir, 0755, true);
                    }
                    
                    copy($sourcePath, $destinationDir . '/' . $filename);
                    
                    // Create database entry
                    $galleryData[] = [
                        'title' => $details['title'],
                        'description' => $details['description'],
                        'image_path' => $destPath,
                        'order' => $order,
                        'type' => $order < 3 ? 'featured' : 'regular',
                        'active' => true,
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                    
                    $order++;
                }
            }
            
            // Insert into database
            if (!empty($galleryData)) {
                DB::table('gallery_items')->insert($galleryData);
                $this->command->info(count($galleryData) . ' gallery items created successfully.');
            }
        } else {
            $this->command->error("Source directory not found: $sourceDir");
        }
    }
}
