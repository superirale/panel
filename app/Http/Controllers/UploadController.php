<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BeauticianImage;
use App\Beautician;

use App\Helpers\Uploader;

class UploadController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function create()
	{
		$beauticians = Beautician::all();
		return view('upload.create', compact('beauticians'));
	}

    public function ImageUpload(Request $request)
    {
        $beautician = Beautician::findOrFail($request->beautician_id);
        $uploader = new Uploader();


        if($request->hasFile("file")){

            $main_dir = env("IMAGES_DIR");
            $upload_dir = $uploader->getUploadDir($beautician->email, $main_dir);

            $extension = $request->file->extension();
            $filename = uniqid().$beautician->id.'.'.$extension;
            $new_filename = $upload_dir.'/'. $filename;

            $upload = $uploader->upload($request->file, $new_filename, '');

            $beautician->images()->save(new BeauticianImage(['reference' => $filename]));
        }

        return redirect()->back();

    }

}
