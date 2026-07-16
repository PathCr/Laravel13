<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $sites = $request->user()->sites;
        return SiteResource::collection($sites);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiteRequest $request): SiteResource
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['public_key'] = 'pub_' . Str::random(16);

        $site = Site::create($data);

        return new SiteResource($site);
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site): SiteResource
    {
        $this->authorize('view', $site);
        return new SiteResource($site);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiteRequest $request, Site $site): SiteResource
    {
        $this->authorize('update', $site);
        $site->update($request->validated());
        return new SiteResource($site);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site): JsonResponse
    {
        $this->authorize('delete', $site);
        $site->delete();
        return response()->json(null, 204);
    }
}
