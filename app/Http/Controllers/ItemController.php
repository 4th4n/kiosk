<?php


namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    // Method to show the form for creating a new item
    public function create()
    {
        return view('items.create');
    }
    
    // Method to store the newly created item
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate the image
        ]);
    
        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->quantity = $request->quantity;
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  // Generate a unique file name
            $request->image->move(public_path('images'), $imageName);  // Move image to public/images
            $item->image = $imageName;  // Save image file name in the database
        }
    
        $item->save();
    
        return redirect()->route('items.index')->with('success', 'Item created successfully');
    }
    
    public function show($id)
{
    $item = Item::find($id);

    if (!$item) {
        return redirect()->route('items.index')->with('error', 'Item not found.');
    }

    return view('items.show', compact('item'));
}
public function index()
{
    // Kunin ang lahat ng mga item mula sa database
    $items = Item::all();

    // I-render ang view kasama ang mga item
    return view('items.index', compact('items'));
}

public function destroy($id)
{
    // Hanapin ang item gamit ang ID
    $item = Item::findOrFail($id);

    // Tanggalin ang item
    $item->delete();

    // I-redirect pabalik sa item list na may success message
    return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
}



}


