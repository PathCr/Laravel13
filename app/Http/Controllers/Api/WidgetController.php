<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ReviewResource;
use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function reviews(string $publicKey)
    {
        $site = Site::where('public_key', $publicKey)->where('is_active', true)->first();

        if (!$site) {
            return response()->json(['message' => 'Сайт не найден'], 404);
        }

        $reviews = $site->reviews()->where('status', 'approved')->get();

        return ReviewResource::collection($reviews);
    }

    public function store(Request $request, string $publicKey)
    {
        $site = Site::where('public_key', $publicKey)->where('is_active', true)->first();
        if (!$site) {
            return response()->json(['message' => 'Сайт не найден'], 404);
        }

        if ($request->filled('website')) {
            return response()->json(['message' => 'Отзыв отправлен на модерацию'], 201);
        }

        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'text' => 'required|string',
        ]);

        $validated['status'] = 'pending';
        $validated['ip'] = $request->ip();

        $review = $site->reviews()->create($validated);

        return response()->json(['message' => 'Отзыв отправлен на модерацию'], 201);
    }
}
