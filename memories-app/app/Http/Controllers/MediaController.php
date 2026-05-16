<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cloudinary\Cloudinary;
use App\Models\Media;

class MediaController extends Controller
{
    public function index(){
        $user = Auth::user();
        $memoryDates = $user->media()->select('memory_date')->distinct()->pluck('memory_date');
        return view('dashboard', compact('memoryDates'));
    }

    public function showMemoriesByDate($date){
        $user = Auth::user();
        $memories = $user->media()->where('memory_date', $date)->get();
        return view('gallery', compact('memories', 'date'));
    }

    public function store(Request $request, $date){
        $request->validate([
            'media_url' => 'required|url',
            'media_type' => 'required|string',
            'public_id' => 'required|string',
        ]);

        $request->user()->media()->create([
            'memory_date' => $date,
            'media_url' => $request->media_url,
            'media_type' => $request->media_type,
            'public_id' => $request->public_id,
        ]);

        return back()->with('success', 'Memory saved! 🏝️');

    }

    public function destroy($id){
        $media = Media::findOrFail($id);

        if($media->user_id != Auth::id()){
            abort(403, 'Unauthorized access!!');
        }
        
        $cloudinary = new Cloudinary();
        $cloudinary->uploadApi()->destroy($media->public_id, [
            'resource_type' => $media->media_type
        ]);

        $media->delete();

        return redirect()->route('memories.show', $media->memory_date);
    }

    public function download($id){
        $media = Media::findOrFail($id);

        if($media->user_id != Auth::id()){
            abort(403, 'Unauthorized Access!!');
        }

        $cloudinary = new Cloudinary();
        if($media->media_type == 'image'){
            $downloadUrl = $cloudinary->image($media->public_id)
            ->addFlag('attachment') 
            ->toUrl();
        }else{
            $downloadUrl = $cloudinary->video($media->public_id)
            ->addFlag('attachment') 
            ->toUrl();
        }

        return redirect($downloadUrl);
    }

    public function expandGallery($id){
        $media = Media::findOrFail($id);
        
        return view('expanded-gallery', compact('media'));
    }
}
