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
        $matchweek=DB::table('matchweek')->where('active','1')->first();
        $activematchweek=$matchweek->matchweek;
        $match=DB::table('matchset')->where('matchweek',$activematchweek)->orderBy('date','ASC')->orderBy('time','ASC')->get();
        return view('frontpage.front')
        ->with('allteam',$team)
        ->with('allmatch',$match)
        ->with('navtheme','')
        ->with('table',$teamtable);
    }
    
    public function clubinfo($club){
        $team = DB::table('clubinfo')->where('englishname',$club)->first();
        $clubcode=$team->shortname;

        $clubcodetable="member_".$clubcode;
        
        $member = DB::table($clubcodetable)->orderBy('number','ASC')->get();

        $thaiteamname=$team->thainame;

        $match = DB::table('matchset')
                    ->where('hometeam', $thaiteamname)
                    ->orWhere('awayteam', $thaiteamname)
                    ->orderBy('matchweek','ASC')
                    ->get();

        return view("frontpage.clubinfo")
        ->with('club',$team)
        ->with('player',$member)
        ->with('navtheme','')
        ->with('teammatch',$match);
    }

    public function clubranking(){
        $teamtable = DB::table('clubinfo')->orderBy('point','DESC')->orderBy('goalpoint','DESC')->get();
        return view('frontpage.table')
        ->with('table',$teamtable)
        ->with('navtheme','');
    }

    public function allclubshow(){
        $team = DB::table('clubinfo')->orderBy('id','ASC')->get();
        return view('frontpage.allclub')
        ->with('navtheme','')
        ->with('allclub',$team);
    }

    public function matchinfo($id){
        $match=DB::table('matchset')->where('id',$id)->first();

        $hometeam=$match->hometeam;
        $awayteam=$match->awayteam;
        $home = DB::table('clubinfo')->where('thainame',$hometeam)->first();
        $away = DB::table('clubinfo')->where('thainame',$awayteam)->first();
        
        if($match->homelineup==1)
        {
           $hometeamtable="member_".$match->homecode;
           $homelineup = DB::table('lineup')->where([
               ['matchid',$match->id],
               ['type',0]
           ])->first(); 
           $hometeamtable="member_".$match->homecode;

           for($i=1;$i<=11;$i++){
               $playerrun="player".$i;
                $homeinfo[$i]=DB::table($hometeamtable)->where('name',$homelineup->$playerrun)->first();
            }
            for($i=12;$i<=20;$i++){
                $j=$i-11;
                $benchrun="bench".$j;
                $homeinfo[$i]=DB::table($hometeamtable)->where('name',$homelineup->$benchrun)->first();
            }

        }
        else{
            $homelineup="";
            $homeinfo="";
        }
        
        if($match->awaylineup==1){
            $awaylineup = DB::table('lineup')->where([
                ['matchid',$match->id],
                ['type',1]
            ])->first(); 
            $awayteamtable="member_".$match->awaycode;
            for($i=1;$i<=11;$i++){
                $playerrun="player".$i;
                 $awayinfo[$i]=DB::table($awayteamtable)->where('name',$awaylineup->$playerrun)->first();
             }
             for($i=12;$i<=20;$i++){
                 $j=$i-11;
                 $benchrun="bench".$j;
                 $awayinfo[$i]=DB::table($awayteamtable)->where('name',$awaylineup->$benchrun)->first();
             }
 

        }
        else{
            $awaylineup="";
            $awayinfo="";
        }
        
        $navtheme=$match->navtheme;

        return view("frontpage.matchday")
        ->with('thismatch',$match)
        ->with('hometeam',$home)
        ->with('awayteam',$away)
        ->with('homelineup',$homelineup)
        ->with('awaylineup',$awaylineup)
        ->with('homeinfo',$homeinfo)
        ->with('awayinfo',$awayinfo)
        ->with('navtheme',$navtheme);
        
    }

}