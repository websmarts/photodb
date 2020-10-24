<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Photo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CardPhotoController extends Controller
{
    public function store(Request $request, $cardId)
    {
        
        
        $card = Card::findOrFail($cardId);

        $request->validate([
            'photo' => 'required|image|max:2048'
        ]);
        
        $photo = $request->file('photo');

        $image = Image::make($photo);

        $height = $image->height();
        $width= $image->width();


        $filename = time() . '.' . strtolower($photo->getClientOriginalExtension());
        $photo->storeAs('.', $filename,'photostore');

        // resize the image to a width of 300 and constrain aspect ratio (auto height)

        $image->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save(storage_path('app/public/photos/tn/' . $filename));

        // Insert photo table into db
        //
        $data = [
            'user_id'=> $request->user()->id,
            'title' => $request->input('title',''),
            'filepath' => $filename,
            'filesize' => $photo->getSize(),
            'width' => $width,
            'height' => $height,
        ];

        $newPhoto = Photo::create($data);

        $card->photos()->attach($newPhoto);


        // // $photo = Image::make($photo);

        // $photo = Photo::create(['photo'=>$photo]);

        // $card->attach($photo);

        return redirect('/dashboard');



        
    }
}
