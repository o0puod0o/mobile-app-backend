<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $limit = intval($request->query('limit', 10));

        $items = Announcement::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->limit(max(1, $limit))
            ->get(['id', 'title', 'message', 'tag', 'icon', 'published_at']);

        return response()->json($items);
    }
}
