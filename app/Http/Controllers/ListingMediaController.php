<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListingMedia;
use App\Models\Listing;

class ListingMediaController extends Controller
{
    /**
     * Display all media
     */
    public function index()
    {
        $medias = ListingMedia::with('listing')->get();
        return view('admin.listing_media.index', compact('medias'));
    }

    /**
     * Show form to upload new media
     */
    public function create()
    {
        $listings = Listing::all();
        return view('admin.listing_media.create', compact('listings'));
    }

    /**
     * Store new media
     */
    public function store(Request $request)
    {
        $request->validate([
            'listing_id' => 'required|exists:listings,id',
            'type' => 'required|in:image,video',
            'file_path' => 'required_if:type,image|file|mimes:jpg,jpeg,png|max:10240',
            'video_url' => 'required_if:type,video|string|nullable',
        ]);

        $data = [
            'listing_id' => $request->listing_id,
            'type' => $request->type,
        ];

        // Handle file upload for images
        if ($request->type === 'image' && $request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/listings'), $filename);
            $data['file_path'] = $filename;
            $data['video_url'] = null;
        } else if ($request->type === 'video') {
            $data['video_url'] = $request->video_url;
            $data['file_path'] = null;
        }

        ListingMedia::create($data);

        return redirect()->route('admin.listing_media.index')->with('success', 'Media added successfully.');
    }

    /**
     * Show form to edit media
     */
    public function edit(ListingMedia $listingMedia)
    {
        $listings = Listing::all();
        return view('admin.listing_media.edit', compact('listingMedia', 'listings'));
    }

    /**
     * Update media
     */
    public function update(Request $request, ListingMedia $listingMedia)
    {
        $request->validate([
            'listing_id' => 'required|exists:listings,id',
            'type' => 'required|in:image,video',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
            'video_url' => 'nullable|string',
        ]);

        $data = [
            'listing_id' => $request->listing_id,
            'type' => $request->type,
        ];

        if ($request->type === 'image' && $request->hasFile('file_path')) {
            // Delete old image if exists
            if ($listingMedia->file_path && file_exists(public_path('assets/images/listings/' . $listingMedia->file_path))) {
                unlink(public_path('assets/images/listings/' . $listingMedia->file_path));
            }
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/listings'), $filename);
            $data['file_path'] = $filename;
            $data['video_url'] = null;
        } else if ($request->type === 'video') {
            $data['video_url'] = $request->video_url;
            $data['file_path'] = null;
        }

        $listingMedia->update($data);

        return redirect()->route('admin.listing_media.index')->with('success', 'Media updated successfully.');
    }

    /**
     * Delete media
     */
    public function destroy(ListingMedia $listingMedia)
    {
        // Delete image file if exists
        if ($listingMedia->file_path && file_exists(public_path('assets/images/listings/' . $listingMedia->file_path))) {
            unlink(public_path('assets/images/listings/' . $listingMedia->file_path));
        }

        $listingMedia->delete();

        return redirect()->route('admin.listing_media.index')->with('success', 'Media deleted successfully.');
    }
}
