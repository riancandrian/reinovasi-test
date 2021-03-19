<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function index(){
        $data_submission = Submission::all();
        return view('submission.index', ['submission_list' => $data_submission]);
    }

    public function create(Request $request){
        /**
         * Aktifkan Code dibawah ini jika ingin menggunakan validasi
         */
        // $request->validate([
        //     'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        // ]);

        $fileModel = new Submission;
        if($request->hasfile('file_path')){
            foreach($request->file('file_path') as $file){
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('files'), $name);  
                
                Submission::create(['file_path' => $name]);
            }
        }

        return back()->with('success', 'Data Your files has been successfully added');
    }

    public function view($id){
        $submission = Submission::find($id);
        return redirect(URL::to('/').$submission->file_path);
    }
}
