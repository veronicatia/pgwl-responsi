<?php

namespace App\Http\Controllers;

use App\Models\Points;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function __construct()
    {
        $this->point = new Points();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $points = $this->point->points();
        $feature = [];

        foreach ($points as $p) {
            $feature[] = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'image' => $p->image,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at
                ]
            ];
        }

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $feature,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate request
        $request->validate(
            [
                'name' => 'required',
                'geom' => 'required',
                'image' => 'mimes:jpeg,jpg,png, tiff, gif|max:10000' //10mb
            ],
            [
                'name.required' => 'Name is required',
                'geom.required' => 'required',
                'images.mimes' => 'Image must be a file of type: jpg, jpeg, png, tiff, gif',
                'images.max' => 'Image must nit excees 10MB'
            ]
        );


        // create folder images
        if (!is_dir('storage/images')) {
            mkdir('storage/image', 0777);
        }

        // upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time(). '_point.'. $image->getClientOriginalExtension();
            $image->move('storage/images', $filename);
        } else {
            $filename = null;
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'geom' => $request->geom,
            'image' => $filename
        ];

        // create point
        if (!$this->point->create($data)) {
            return redirect()->back()->with('error', 'Failed to create point');
        }

        // redirect to map
        return redirect()->back()->with('success', 'Point created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $point = $this->point->point($id);

        foreach ($point as $p) {
            $feature[] = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'image' => $p->image,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at
                ]
            ];
        }

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $feature,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $point = $this->point->find($id);

        $data = [
            'title' => 'Edit Point',
            'point' => $point,
            'id' => $id
        ];

        return view('edit-point', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate request
        $request->validate(
            [
                'name' => 'required',
                'geom' => 'required',
                'image' => 'mimes:jpeg,jpg,png,tiff,gif|max:10000' // 10MB
            ],
            [
                'name.required' => 'Name is required',
                'geom.required' => 'Geometry is required',
                'image.mimes' => 'Image must be a file of type: jpg, jpeg, png, tiff, gif',
                'image.max' => 'Image must not exceed 10MB'
            ]
        );

        // create folder images
        if (!is_dir('storage/images')) {
            mkdir('storage/images', 0777, true);
        }

        // upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_point.' . $image->getClientOriginalExtension();
            $image->move('storage/images', $filename);

            // delete old image
            $oldImage = $request->image_old;
            if ($oldImage != null) {
                if (file_exists('storage/images/' . $oldImage)) {
                    unlink('storage/images/' . $oldImage);
                }
            }
        } else {
            $filename = $request->image_old;
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'geom' => $request->geom,
            'image' => $filename
        ];

        // update point
        if (!$this->point->find($id)->update($data)) {
            return redirect()->back()->with('error', 'Failed to update point');
        }

        // redirect to map
        return redirect()->back()->with('success', 'Point updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Get image
        $image = $this->point->find($id)->image; // Get point

        // Delete point
        if (!$this->point->destroy($id)) {
            return redirect()->back()->with('error', 'Failed to delete point');
        }

        // Delete image
        if ($image!= null) {
            unlink('storage/images/'. $image); // Hapus gambar dari direktori
        }

        // Redirect to map
        return redirect()->back()->with('success', 'Point deleted successfully');
    }

    public function table()
    {
        $points = $this->point->points();

        $data = [
            'title'=>'Table Point',
            'points' => $points,

        ];

        return view('table-point', $data);
    }
}
