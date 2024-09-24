<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;


class JobController extends Controller
{
    public function index()
    {
        $jobs=Job::with('employer')->latest()->simplePaginate(3);//get we use pageinate
            return view('Jobs.index',[
                'jobs'=>$jobs
            ]);
    }

    public function create()
    {
        return view('Jobs.create');
    }
    public function store()
    {
           //validation
    request()->validate([
        'title'=>['required','min:3'],
        'name'=>['required'],
        'salary'=>['required'],
    ]);

    $job= Job::create([
    'title'=>request('title'),
    'name'=>request('name'),
    'salary'=>request('salary'),
    'employer_id'=>1
   ]);
   
   Mail::to($job->employer->user)->queue(
        new JobPosted($job)
 );//send
    
   return redirect('/jobs');
    }

    public function show(Job $job)
    {
        //  Arr::first($jobs,function($job) use($id){
    //     return $job['id'] =$id;
   //  });
  //$job= Arr::first(Job::all(),fn($job)=>$job['id']==$id );
  
    // $job=Job::find($id);
    return view('Jobs.show',['job'=>$job]);
    }

    public function edit(Job $job)
    {
            //  Arr::first($jobs,function($job) use($id){
   //     return $job['id'] =$id;
  //  });
 //$job= Arr::first(Job::all(),fn($job)=>$job['id']==$id );
 
//    $job=Job::find($id);
     
        //   if(Auth::guest()){
        //      return redirect('/login');
        //   }
        //   Gate::authorize('edit-job',$job);//use route so no need
        //   if($job->employer->user->isNot(Auth::user())){
        //     abort(403);
        //   }

   return view('Jobs.edit',['job'=>$job]);
    }
    
    public function update(Job $job)
    {
        
        //Gate::authorize('edit-job',$job);
     //validate
     request()->validate([
        'title'=>['required','min:3'],
        'name'=>['required'],
        'salary'=>['required'],
    ]);
    //authorize
    //update
   // $job=Job::findOrFail($id);//null
   
 //persist
    $job->update([
     'title'=>request('title'),
      'name'=>request('name'),
      'salary'=>request('salary')
    ]);
   
    //redirect
    return redirect('/jobs/'. $job->id);
    }
    public function destroy( Job $job)
    {
        //Gate::authorize('edit-job',$job);
    //authorize
    //delete the job
     // Job::findOrFail($id)->delete();
     $job->delete();
  //redirect
     return redirect('/jobs');
        
    }

}
