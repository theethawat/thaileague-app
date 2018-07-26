<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input; //ใช้คำสั่ง Input
use Illuminate\Support\Facades\DB;  //ใช้คำสั่ง DB หรือ Database
use Illuminate\Support\Facades\Redirect; //ใช้คำสั่ง Redirect
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class thaileaguecontroller extends Controller {
    public function index(){
        $team = DB::table('clubinfo')->orderBy('id','ASC')->get();
        return view('frontpage.front')->with('allteam',$team);
    }
    
    
    public function clubinfo($club){
        $team = DB::table('clubinfo')->where('englishname',$club)->first();
        return view("frontpage.clubinfo")
        ->with('club',$team);
    }

//Backend Server
    public function adding(){
        return view("admin.teamupdate");
    }
    public function teamadd(Request $request){
          //recieve data in form
          $engname = $request->input('english-name');
          $thaname=$request->input('thai-name');
          $stadium=$request->input('homestadium');
          $website=$request->input('website');
          $facebook=$request->input('facebook');
          $headcoach=$request->input('headcoach');
          $point=$request->input('point');
          $gd=$request->input('gd');
          $info=$request->input('info');

          $logopath="public/teamlogo";
          $stadiumpath="public/homestadium";
         
              $path = $request->file('logo')->store($logopath);
              $visibility = Storage::getVisibility($path);
              Storage::setVisibility($path, 'public');
              $fileurl1 = Storage::url($path);

              $path2 = $request->file('homestadium-photo')->store($stadiumpath);
              $visibility = Storage::getVisibility($path2);
              Storage::setVisibility($path2, 'public');
              $fileurl2 = Storage::url($path2);

              DB::table("clubinfo")->insert(
                  ['englishname'=>$engname,
                  'thainame'=>$thaname,
                  'logo'=>$fileurl1,
                  'homestadium'=>$stadium,
                  'homestadiumphoto'=>$fileurl2,
                  'website'=>$website,
                  'point'=>$point,
                  'goalpoint'=>$gd,
                  'headcoach'=>$headcoach,
                  'history'=>$info,
                  'facebook'=>$facebook]
              );
              return Redirect::to('/admin/allteam');
            }

    //ทุกทีมของไทยลีกในหน้าเว็บของ Admin
    public function adminteam(){
        $team = DB::table('clubinfo')->orderBy('id','ASC')->get();
        return view("admin.allteam")
        ->with('allteam',$team);
    }

}