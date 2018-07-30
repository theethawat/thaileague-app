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
    

    //All team Thaileague (Admin Front Page)
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
            ->with('matchweek',$matchweek)
            ->with('errormessage','');
            
        }

        public function matchmaker2(Request $request){
            //recieve data in form
            
            $matchweek = $request->input('matchweek');
            $hometeam=$request->input('hometeam');
            $awayteam=$request->input('awayteam');
            //If the Same Team
            if($hometeam == $awayteam ){
                $team = DB::table('clubinfo')->orderBy('id','ASC')->get();
                return view("admin.matchmaker1")
                ->with('club',$team)
                ->with('matchweek',$matchweek)
                ->with('errormessage','คุณใส่ทีมซ้ำกันมา กรุณาเลือกใส่ทีมใหม่');
            }
            //If Not the Same
            else{
                $home = DB::table('clubinfo')->where('thainame',$hometeam)->first();
                $away = DB::table('clubinfo')->where('thainame',$awayteam)->first();
                return view("admin.matchmaker2")
                ->with('hometeam',$home)
                ->with('awayteam',$away)
                ->with('matchweek',$matchweek);
            }

        }

        public function matchmaker3(Request $request){
             //recieve data in form
             $matchweek = $request->input('matchweek');
             $hometeam = $request->input('hometeam');
             $awayteam = $request->input('awayteam');
             $homecode = $request->input('hometeam-code');
             $awaycode = $request->input('awayteam-code');
             $matchinfo = $request->input('matchinfo');
             $stadium = $request->input('stadium');
             $matchdate = $request->input('date');
             $matchtime = $request->input('time');
             $ticketprice = $request->input('lowestticket');
            
             if($matchinfo==NULL)
             {
                 DB::table("matchset")->insert(
                ['matchweek'=>$matchweek,
                'hometeam'=>$hometeam,
                'awayteam'=>$awayteam,
                'homecode'=>$homecode,
                'awaycode'=>$awaycode,
                'stadium'=>$stadium,
                'status'=>'prematch',
                'ticketlessprice'=>$ticketprice,
                'time'=>$matchtime,
                'date'=>$matchdate]
            );
             }

             else
             {
                 DB::table("matchset")->insert(
                ['matchweek'=>$matchweek,
                'hometeam'=>$hometeam,
                'awayteam'=>$awayteam,
                'homecode'=>$homecode,
                'awaycode'=>$awaycode,
                'stadium'=>$stadium,
                'matchcomment'=>$matchinfo,
                'status'=>'prematch',
                'ticketlessprice'=>$ticketprice,
                'time'=>$matchtime,
                'date'=>$matchdate]
            );
             }
        
             //Find Match ID
             $thismatch = DB::table('matchset')->where([
                ['homecode', $homecode],
                ['awaycode', $awaycode]
            ])->first();

             $matchid=$thismatch->id;

             //Ticket
             $ticketprovide = $request->input('ticketprovide');
            if($ticketprovide!=NULL)
            {
                $ticketlink = $request->input('ticketurl');

                if($ticketlink!=NULL){
                    DB::table('matchset')
                    ->where('id', $matchid)
                    ->update(['ticketprovide' => $ticketprovide,
                    'ticketlink' => $ticketlink]);
                }

                else{
                    DB::table('matchset')
                    ->where('id', $matchid)
                    ->update(['ticketprovide' => $ticketprovide]);
                }
            }

            //Broadcast
            $free = $request->input('freebroadcast');
            $sd = $request->input('sdbroadcast');
            $hd = $request->input('hdbroadcast');
            if($free !=NULL)
            {
                DB::table('matchset')
                    ->where('id', $matchid)
                    ->update(['broadcastingfree' => $free]);
            }

            if($sd !=NULL)
            {
                DB::table('matchset')
                    ->where('id', $matchid)
                    ->update(['broadcastingsd' => $sd]);
            }

            if($hd !=NULL)
            {
                DB::table('matchset')
                    ->where('id', $matchid)
                    ->update(['broadcastinghd' => $hd]);
            }

            return Redirect::to('/admin/allmatch');
        }

        //Match Info Adding
        public function addobjectinfo($object,$id){
            $matchinfo = DB::table('matchset')->where('id',$id)->first();
            if($object=="ticket"){
                return view('admin.ticketadd')
                ->with('match',$matchinfo);
            }
            if($object=="referee"){
                return view('admin.refereeadd')
                ->with('match',$matchinfo);
            }
            
        }

        public function activeticket(Request $request){
            //Find ID
            $matchid = $request->input('matchid');
             //Ticket
            $ticketprovide = $request->input('ticketprovide');
            if($ticketprovide!=NULL)
            {
                $ticketlink = $request->input('ticketurl');

                if($ticketlink!=NULL){
                    DB::table('matchset')
                    ->where('id', $matchid)
                    ->update(['ticketprovide' => $ticketprovide,
                    'ticketlink' => $ticketlink]);
                }

                else{
                    DB::table('matchset')
                    ->where('id', $matchid)
                    ->update(['ticketprovide' => $ticketprovide]);
                }
            }
            return Redirect::to('/admin/allmatch');
        }

        public function activereferee(Request $request){
            //Find ID
            $matchid = $request->input('matchid');
             //Referee
            $ref1 = $request->input('referee1');
            $ref2 = $request->input('referee2');
            $ref3 = $request->input('referee3');
            $ref4 = $request->input('referee4');
            $ref5 = $request->input('referee5');

            DB::table('matchset')
            ->where('id', $matchid)
            ->update(['referee1' => $ref1,
            'referee2' => $ref2,
            'referee3' => $ref3]);

            if($ref4 !=NULL){
                DB::table('matchset')
                ->where('id', $matchid)
                ->update(['referee4' => $ref4]);
            }

            if($ref5 !=NULL){
                DB::table('matchset')
                ->where('id', $matchid)
                ->update(['referee5' => $ref5]);
            }

            return Redirect::to('/admin/allmatch');
        }
}