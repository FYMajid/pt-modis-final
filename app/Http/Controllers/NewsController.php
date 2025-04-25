<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display the news management dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $hotNews = News::where('type', 'hot')->orderBy('created_at', 'desc')->get();
        $oldNews = News::where('type', 'old')->orderBy('created_at', 'desc')->get();
        
        return view('admin.news.index', compact('hotNews', 'oldNews'));
    }

    /**
     * Store a newly created news item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'deskripsi' => 'required|string',
            'link' => 'required|url',
            'type' => 'required|in:hot,old',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $imagePath = $request->file('image')->store('news_images', 'public');

        News::create([
            'judul' => $request->judul,
            'image' => $imagePath,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'type' => $request->type,
        ]);

        if($request-> type === "hot"){
            $this->checkAndMoveOldHotNews();
        }

        return response()->json(['message' => 'News uploaded successfully']);
    }

    /**
     * Update the specified news item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'deskripsi' => 'required|string',
            'link' => 'required|url',
            'type' => 'required|in:hot,old',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $news = News::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image if a new one is uploaded
            Storage::disk('public')->delete($news->image);
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }

        $news->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'type' => $request->type,
        ]);

        return response()->json(['message' => 'News updated successfully']);
    }

    /**
     * Remove the specified news item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        Storage::disk('public')->delete($news->image);
        $news->delete();

        return response()->json(['message' => 'News deleted successfully']);
    }

    /**
     * Move a news item to old news.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function moveToOld($id)
    {
        $news = News::findOrFail($id);
        $news->update(['type' => 'old']);
        return response()->json(['message' => 'News moved to old successfully']);
    }

    public function getNews($id)
{
    try {
        $news = News::findOrFail($id);
        return response()->json($news);
    } catch (\Exception $e) {
        return response()->json(['error' => 'News not found'], 404);
    }
}

private function checkAndMoveOldHotNews()
{
    // Get count of hot news
    $hotNewsCount = News::where('type', 'hot')->count();
    
    // If more than 2, move the oldest ones to old
    if ($hotNewsCount > 2) {
        // Get the oldest hot news items that exceed our limit of 2
        $oldestHotNews = News::where('type', 'hot')
            ->orderBy('created_at', 'asc')
            ->take($hotNewsCount - 2)
            ->get();
        
        // Update each one to be old news
        foreach ($oldestHotNews as $news) {
            $news->type = 'old';
            $news->save();
        }
    }
}

/**
 * Display the public news page.
 *
 * @return \Illuminate\View\View
 */
public function showNews()
{
    $hotNews = News::where('type', 'hot')
        ->orderBy('created_at', 'desc')
        ->get();
    
    $oldNews = News::where('type', 'old')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
    
        return view('news', [
            'title' => 'PT MODIS | News',
            'hotNews' => $hotNews,
            'oldNews' => $oldNews
        ]);
}
}