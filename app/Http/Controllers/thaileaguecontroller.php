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
        $teamtable = DB::table('clubinfo')->orderBy('point','DESC')->orderBy('goalpoint','DESC')->take(5)->get();
        return view('frontpage.front')
        ->with('allteam',$team)
        ->with('table',$teamtable);
    }
    
    public function clubinfo($club){
        $team = DB::table('clubinfo')->where('englishname',$club)->first();
        $clubcode=$team->shortname;

        $clubcodetable="member_".$clubcode;
        
        $member = DB::table($clubcodetable)->orderBy('number','ASC')->get();

        return view("frontpage.clubinfo")
        ->with('club',$team)
        ->with('player',$member);
    }

    public function clubranking(){
        $teamtable = DB::table('clubinfo')->orderBy('point','DESC')->orderBy('goalpoint','DESC')->get();
        return view('frontpage.table')
        ->with('table',$teamtable);
    }

    public function allclubshow(){
        $team = DB::table('clubinfo')->orderBy('id','ASC')->get();
        return view('frontpage.allclub')
        ->with('allclub',$team);
    }

//Backend Server
    public function adding(){
        return view("admin.teamupdate");
    }
    

    //ทุกทีมของไทยลีกในหน้าเว็บของ Admin
    public function adminteam(){
        $team = DB::table('clubinfo')->orderBy('id','ASC')->get();
        return view("admin.allteam")
        ->with('allteam',$team);
    }

    


    public function teamadd(Request $request){
        //recieve data in form
        $engname = $request->input('english-name');
        $thaname=$request->input('thai-name');
        $stadium=$request->input('homestadium');
        $website=$request->input('website');
        $facebook=$request->input('facebook');
        $websitename=$request->input('website-name');
        $facebookname=$request->input('facebook-name');
        $shortname=$request->input('short-name');
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
                'shortname'=>$shortname,
                'logo'=>$fileurl1,
                'homestadium'=>$stadium,
                'homestadiumphoto'=>$fileurl2,
                'website'=>$website,
                'point'=>$point,
                'goalpoint'=>$gd,
                'headcoach'=>$headcoach,
                'history'=>$info,
                'websitename'=>$websitename,
                'facebookname'=>$facebookname,
                'facebook'=>$facebook]
            );
            return Redirect::to('/admin/allteam');
          }

    public function viewplayer($clubcode){
        $team = DB::table('clubinfo')->where('shortname',$clubcode)->first();
        $clubcodetable="member_".$clubcode;
        $member = DB::table($clubcodetable)->orderBy('number','ASC')->get();
        return view("admin.allplayer")
        ->with('club',$team)
        ->with('player',$member);
    }

    public function  addplayer($clubcode){
        return view("admin.addplayer")->with('code',$clubcode);
    }

    public function playeradd(Request $request){
        //recieve data in form
        $clubcode = $request->input('club-code');
        $playername=$request->input('player-name');
        $number=$request->input('kit-number');
        $nationality=$request->input('nationality');
        $position=$request->input('position');
        $goal=$request->input('goal');

        $imagepath="public/player/".$clubcode;
       
            $path = $request->file('playerface')->store($imagepath);
            $visibility = Storage::getVisibility($path);
            Storage::setVisibility($path, 'public');
            $fileurl1 = Storage::url($path);

            $tablename="member_".$clubcode;


            DB::table($tablename)->insert(
                ['name'=>$playername,
                'number'=>$number,
                'nationality'=>$nationality,
                'goal'=>$goal,
                'position'=>$position,
                'photo'=>$fileurl1]
            );
            return Redirect::to('/admin/allteam');
          }

        public function adminallmatch(){
            $match = DB::table("matchset")->orderBy('matchweek','ASC')->get();
            return view("admin.allmatch")
            ->with('matchshow',$match);
        }

        public function matchmaker($matchweek){
            $team = DB::table('clubinfo')->orderBy('id','ASC')->get();
            return view("admin.matchmaker1")
            ->with('club',$team)
            ->with('matchweek',$matchweek);
        }
}