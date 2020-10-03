<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function addItem(request $request)
    {
        $request->validate(
                ['name' => 'required|string|max:255',
                'item_type' => 'required|string|max:255',
                'quantity' =>'required',

            ],
            ['name.required'=> "Fill out this field",
            'item_type.required'=> "Fill out this field",
            'quantity.required'=> "Fill out this field",

            ]
        );

        $item = new Item;
        $item->name=$request->name;
        $item->item_type=$request->item_type;
        $item->quantity =$request->quantity;
        $item->user_id = Auth::user()->id;
        $item->save();

        return redirect('/allitems');
    }

    public function allitems()
    {

        $id= Auth::user()->id;
        $data=DB::table('items')
                ->where('user_id','=',$id)
                ->select('id','quantity','item_type','name')
                ->get();

        return view('items',compact('data'));
    }

    public function editItem($id)
    {

        $data=DB::table('items')
                ->where('id','=',$id)
                ->select('id','quantity','item_type','name')
                ->get();

        return view('editItem',compact('data'));
    }

    public function updateItem(request $request, $id)
    {

        $request->validate(
            ['name' => 'required|string|max:255',
            'item_type' => 'required|string|max:255',
            'quantity' =>'required',

        ],
        ['name.required'=> "Fill out this field",
        'item_type.required'=> "Fill out this field",
        'quantity.required'=> "Fill out this field",

        ]
    );
        
        $item = Item::find($id); 
        $item->name=$request->name;
        $item->item_type=$request->item_type;
        $item->quantity =$request->quantity;
        $item->update();

        return redirect('/allitems');
    }

    public function deleteItem($id)
    {

        $item = Item::findOrFail($id)->delete();

        return redirect('/allitems');
    }
}
