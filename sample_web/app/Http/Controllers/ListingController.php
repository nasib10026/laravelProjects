<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Providers\AppServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class ListingController extends Controller
{
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Displays the form for creating a new listing
    public function create()
    {
        return view('listings.create');
    }
    
    //store listing data
    public function store(Request $request){
         
        $formFields=$request->validate([
            'title'=>'required',
            'company'=>'required',
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'price'=>'required',
            'description'=>'required',
            ]);
            if($request->hasFile('logo')) {
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }
        
            $formFields['user_id'] = auth()->id();
    
            Listing::create($formFields);
    
            return redirect('/')->with('message', 'Listing created successfully!');
    }
   


      // Show Edit Form
      public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

     // Update Listing Data
     public function update(Request $request, Listing $listing) { 
        //Make sure logged in user is owner
        if($listing->user_id!=auth()->id()){
            abort(403,'Unauthorized Action ');
        }
         $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'price'=>'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }
    //delete listing
    public function destroy(Listing $listing){
        if($listing->user_id!=auth()->id()){
            abort(403,'Unauthorized Action ');
        }
        $listing->delete();
        return redirect('/')->with('message','Listing Deleted Successfully');

    }
    // Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings]);
     }

}

