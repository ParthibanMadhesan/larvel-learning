<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model{
    use HasFactory;
    protected $table='jobs';
   //protected $fillable=['employer_id','title','name','salary'];
     protected $guarded=[];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,foreignPivotKey: "jobs_id");
    }

    // public static function all():array
    // {
    //   return [
    //     [   
    //         'id'=>1,
    //         'title'=>'director',
    //         'name'=>'parthiban',
    //         'salary'=>'$59000'
    //     ],
    //     [    
    //         'id'=>2,
    //         'title'=>'programmer',
    //         'name'=>'vicky',
    //         'salary'=>'$69000'
    //     ]
    //     ];
    // }


    // public static function find(int $id)
    // {
    //    $job= Arr::first(static::all(),fn($job)=>$job['id']==$id );

    //    if(!$job){
    //        abort(404);
    //    }
    // }
    
}
