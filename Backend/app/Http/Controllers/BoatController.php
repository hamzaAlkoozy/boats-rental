<?php

namespace App\Http\Controllers;

use App\Models\Boat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoatController extends Controller
{
    public function index()
    {
        $boats = Boat::select('id', 'photo1', 'photo2', 'brand', 'model', 'fuel_type', 'price', 'available')
            ->get();
        return response()->json(['success' => true, 'data' => $boats], 200);
    }

    public function show($id)
    {
        $boat = DB::table('boats')->where('id', $id)->get();
        return response()->json(['success' => true, 'data' => $boat], 200);
    }

    public function store(Request $request)
    {
        DB::table('boats')->insert([
            'photo1' => $request->photo1,
            'photo2' => $request->photo2,
            'brand' => $request->brand,
            'model' => $request->model,
            'fuel_type' => $request->fuel_type,
            'price' => $request->price,
            'available' => $request->available,
        ]);
        /*DB::table('boats')->insert([

            'photo1' => $request->photo1,
            'photo2' => $request->return_date,
            'brand' => $request->brand,
            'model' => $request->model,
            'fuel_type' => $request->fuel_type,
            'price' => $request->price,
            'available' => $request->available,
        ]);*/
        return response()->json(['success' => true, 'data' => 'okok'], 201);
    }

    public function update(Request $request, $id)
    {
        $boat = Boat::findOrFail($id);

        $validatedData = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'fuel_type' => 'required',
            'price' => 'required',
            'available' => 'required',
        ]);

        DB::table('boats')->where('id', $id)->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'fuel_type' => $request->fuel_type,
            'price' => $request->price,
            'available' => $request->available
        ]);

        return response()->json([
            'data' => $boat,
            'message' => 'Boat updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $boat = Boat::find($id);

        if (!$boat) {
            return response()->json(['success' => false, 'message' => 'Boat not found'], 404);
        }

        $boat->delete();

        return response()->json(['success' => true, 'message' => 'Boat deleted successfully']);
    }
}
