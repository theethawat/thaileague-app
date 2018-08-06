<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input; //ใช้คำสั่ง Input
use Illuminate\Support\Facades\DB;  //ใช้คำสั่ง DB หรือ Database
use Illuminate\Support\Facades\Redirect; //ใช้คำสั่ง Redirect
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ThaileagueAdminController extends Controller {
    //Backend Server
    public function adding(){
        return view("admin.teamupdate");
    }
    
    //All team Thaileague (Admin Front Page)
    public function adminteam(){
        $team = DB::table('clubinfo')->orderBy('id','ASC')->get();
        $matchweek = DB::table('matchweek')->where('active','1')->first();
        return view("admin.allteam")
        ->with('allteam',$team)
        ->with('currentmatchweek',$matchweek);
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
            return Redirect::to('/admin/player/'.$clubcode);
          }

        public function adminallmatch(){
            $match = DB::table("matchset")->orderBy('matchweek','ASC')->orderBy('date','ASC')->orderBy('time','ASC')->get();
            $matchweek = DB::table('matchweek')->where('active','1')->first();
            return view("admin.allmatch")
            ->with('matchshow',$match)
            ->with('currentmatchweek',$matchweek);
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
             $homelogo = $request->input('hometeam-logo');
             $awaylogo = $request->input('awayteam-logo');
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
                'hometeamlogo'=>$homelogo,
                'awayteamlogo'=>$awaylogo,
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
            if($object=="broadcast"){
                return view('admin.broadcastadd')
                ->with('match',$matchinfo);
            }
            if($object=="information"){
                $hometeam=$matchinfo->hometeam;
                $awayteam=$matchinfo->awayteam;
                $home = DB::table('clubinfo')->where('thainame',$hometeam)->first();
                $away = DB::table('clubinfo')->where('thainame',$awayteam)->first();
                return view('admin.infoview')
                ->with('match',$matchinfo)
                ->with('home',$home)
                ->with('away',$away);
            }

            if($object=="edit"){
                $hometeam=$matchinfo->hometeam;
                $awayteam=$matchinfo->awayteam;
                $home = DB::table('clubinfo')->where('thainame',$hometeam)->first();
                $away = DB::table('clubinfo')->where('thainame',$awayteam)->first();
                return view('admin.matcheditor')
                ->with('match',$matchinfo)
                ->with('home',$home)
                ->with('away',$away);
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

        public function activebroadcast(Request $request){
            //Find ID
            $matchid = $request->input('matchid');

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

        public function updatematchinfo(Request $request){
            //recieve data in form
            $matchid = $request->input('id');
            $homelogo = $request->input('hometeam-logo');
            $awaylogo = $request->input('awayteam-logo');
            $matchinfo = $request->input('matchinfo');
            $stadium = $request->input('stadium');
            $matchdate = $request->input('date');
            $matchtime = $request->input('time');
            $ticketprice = $request->input('lowestticket');
           

            if($matchinfo==NULL)
            {
                DB::table("matchset")->where('id',$matchid)->update(
               [
               'stadium'=>$stadium,
               'hometeamlogo'=>$homelogo,
               'awayteamlogo'=>$awaylogo,
               'ticketlessprice'=>$ticketprice,
               'time'=>$matchtime,
               'date'=>$matchdate]
           );
            }

            else
            {
                DB::table("matchset")->where('id',$matchid)->update(
                    [
                    'stadium'=>$stadium,
                    'hometeamlogo'=>$homelogo,
                    'awayteamlogo'=>$awaylogo,
                    'matchcomment'=>$matchinfo,
                    'ticketlessprice'=>$ticketprice,
                    'time'=>$matchtime,
                    'date'=>$matchdate]
           );
            }
       

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
        
           //Referee
           $ref1 = $request->input('referee1');
           $ref2 = $request->input('referee2');
           $ref3 = $request->input('referee3');
           $ref4 = $request->input('referee4');
           $ref5 = $request->input('referee5');

           if($ref1 !=NULL){
            DB::table('matchset')
            ->where('id', $matchid)
            ->update(['referee1' => $ref1]);
        }

        if($ref2 !=NULL){
            DB::table('matchset')
            ->where('id', $matchid)
            ->update(['referee2' => $ref2]);
        }

        if($ref3 !=NULL){
            DB::table('matchset')
            ->where('id', $matchid)
            ->update(['referee3' => $ref3]);
        }

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
        
        $highlight=$request->input('highlight');
        if($highlight!=NULL){
            DB::table('matchset')
               ->where('id', $matchid)
               ->update(['highlight' => $highlight]);
           
            $match=DB::table('matchset')->where('id',$matchid)->first();
            DB::table('videohighlight')->insert(
                ['matchid'=>$matchid,
                'hometeam'=>$match->hometeam,
                'awayteam'=>$match->awayteam,
                'link'=>$highlight]
            );
        }
           return Redirect::to('/admin/allmatch');
       }

       public function lineupmaker($team,$id){
           $match=DB::table("matchset")->where('id',$id)->first();
           if($team=="home"){
                $homecode=$match->homecode;
                $hometable="member_".$homecode;

                $goalkeeper=DB::table($hometable)->where('position','GK')->get();
                $defender=DB::table($hometable)->where('position','DF')->get();
                $midfielder=DB::table($hometable)->where('position','MF')->get();
                $forwarder=DB::table($hometable)->where('position','FW')->get();
                return view('admin.lineupmaker')
                ->with('match',$match)
                ->with('team',$team)
                ->with('goalkeeper',$goalkeeper)
                ->with('defender',$defender)
                ->with('midfielder',$midfielder)
                ->with('forwarder',$forwarder);
           }

           else if($team=="away")
           {
                $awaycode=$match->awaycode;
                $awaytable="member_".$awaycode;
                $goalkeeper=DB::table($awaytable)->where('position','GK')->get();
                $defender=DB::table($awaytable)->where('position','DF')->get();
                $midfielder=DB::table($awaytable)->where('position','MF')->get();
                $forwarder=DB::table($awaytable)->where('position','FW')->get();
                return view('admin.lineupmaker')
                ->with('match',$match)
                ->with('team',$team)
                ->with('goalkeeper',$goalkeeper)
                ->with('defender',$defender)
                ->with('midfielder',$midfielder)
                ->with('forwarder',$forwarder);
           }
           
       }

       public function lineupactive(Request $request){
           //recieve data in form
           $amoutdf=$request->input('df-amount');
           $amoutmf=$request->input('mf-amount');
           $amoutfw=$request->input('fw-amount');

           $defender = $request->input('defender');
           $midfielder = $request->input('midfielder');
           $forwarder = $request->input('forwarder');
           $goalkeeper = $request->input('goalkeeper');

           $teamcode = $request->input('team-code');
           $teamstatus = $request->input('home/away');
           $matchid = $request->input('matchid');

            if($teamstatus=="home"){
                $type=0;
            }
            if($teamstatus=="away"){
                $type=1;
            }
            $num=2;
            for($i=0;$i<$amoutdf;$i++){
                $player[$num]=$defender[$i];
                $num++;
            }
            for($i=0;$i<$amoutmf;$i++){
                $player[$num]=$midfielder[$i];
                $num++;
            }
            for($i=0;$i<$amoutfw;$i++){
                $player[$num]=$forwarder[$i];
                $num++;
            }

           DB::table("lineup")->insert(
            ['matchid'=>$matchid,
            'amoutdf'=>$amoutdf,
            'amoutmf'=>$amoutmf,
            'amoutfw'=>$amoutfw,
            'teamcode'=>$teamcode,
            'type'=>$type,
            'player1'=>$goalkeeper,
            'player2'=>$player[2],
            'player3'=>$player[3],
            'player4'=>$player[4],
            'player5'=>$player[5],
            'player6'=>$player[6],
            'player7'=>$player[7],
            'player8'=>$player[8],
            'player9'=>$player[9],
            'player10'=>$player[10],
            'player11'=>$player[11],
            ]       
        );
        
        $teamtable="member_".$teamcode;
        /*
        $bench = DB::table($teamtable)
                 ->whereNotIn('name', '',$goalkeeper)
                  ->orWhere('name', '',$player[2])
                  ->orWhere('name', '', $player[3])
                  ->orWhere('name', '', $player[4])
                  ->orWhere('name', '', $player[5])
                  ->orWhere('name', '', $player[6])
                  ->orWhere('name', '', $player[7])
                  ->orWhere('name', '', $player[8])
                  ->orWhere('name', '', $player[9])
                  ->orWhere('name', '', $player[10])
                  ->orWhere('name', '', $player[11])
        ->get();
        */
        $bench = DB::table($teamtable)
                 ->whereNotIn('name',[$goalkeeper
                 ,$player[2]
                 ,$player[3]
                 ,$player[4]
                 ,$player[5]
                 ,$player[6]
                 ,$player[7]
                 ,$player[8]
                 ,$player[9]
                 ,$player[10]
                 ,$player[11]])
        ->get();
        return view('admin.benchmaker')
       ->with('member',$bench)
       ->with('teamstatus',$teamstatus)
       ->with('teamcode',$teamcode)
       ->with('matchid',$matchid);
       }


       public function benchactive(Request $request){

        $teamcode = $request->input('teamcode');
        $matchid = $request->input('matchid');

        $lineup= DB::table('lineup')->where([
            ['matchid',$matchid],
            ['teamcode',$teamcode],
        ])->orderBy('id','DESC')->first();
        
        $bench=$request->input('bench');
        //$numofbench=count($bench);

        $lineupid=$lineup->id;
        $j=1;

        for($i=0;$i<9;$i++){
            if($bench[$i]){
                $benchlineup[$j]=$bench[$i];
            }
            
            else{
                $benchlineup[$j]="";
            }
          $j++;      
        }

        DB::table('lineup')
        ->where('id',$lineupid)
        ->update(['bench1' => $benchlineup[1],
                'bench2'=>$benchlineup[2],
                'bench3'=>$benchlineup[3],
                'bench4'=>$benchlineup[4],
                'bench5'=>$benchlineup[5],
                'bench6'=>$benchlineup[6],
                'bench7'=>$benchlineup[7],
                'bench8'=>$benchlineup[8],
                'bench9'=>$benchlineup[9],    
        ]);
        return view("admin.confermlineup")
        ->with('currentid',$lineupid)
        ->with('matchid',$matchid)
        ->with('lineupid',$lineupid)
        ->with('teamcode',$teamcode);
    }
    public function lineupconferm(Request $request){
        $teamcode = $request->input('teamcode');
        $matchid = $request->input('matchid');
        $lineupid = $request->input('lineupid');

        DB::table('lineup')->where([
            ['teamcode', $teamcode],
            ['matchid', $matchid],
            ['id','<',$lineupid]
        ])->delete();

        $maintable=DB::table('matchset')->where('id',$matchid)->first();
        if($maintable->homecode==$teamcode){
            DB::table('matchset')
               ->where('id', $matchid)
               ->update(['homelineup' => 1]);
        }
        if($maintable->awaycode==$teamcode){
            DB::table('matchset')
               ->where('id', $matchid)
               ->update(['awaylineup' => 1]);
        }
        return Redirect::to('/admin/allmatch');
    
    }

    public function matchliveactive($id){
        DB::table('matchset')
               ->where('id', $id)
               ->update(['status' => "live match"]);
        return Redirect::to('/admin/allmatch');
    }

    public function warroomset($id){
        $match=DB::table('matchset')->where('id',$id)->first();
        $matchid=$match->id;
        
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
                $allhomeinfo[$i]=DB::table($hometeamtable)->where('name',$homelineup->$playerrun)->OrderBy('id','ASC')->get();
            }
            for($i=12;$i<=20;$i++){
                $j=$i-11;
                $benchrun="bench".$j;
                $homeinfo[$i]=DB::table($hometeamtable)->where('name',$homelineup->$benchrun)->first();
                $allhomeinfo[$i]=DB::table($hometeamtable)->where('name',$homelineup->$playerrun)->OrderBy('id','ASC')->get();
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
        
        $action=DB::table('matchevent')->where('matchid',$match->id)->orderBy('id','DESC')->get();
        $kickoff=DB::table('matchevent')->where('matchid',$match->id)->orderBy('id','ASC')->first();
        return view('admin.matchwar')
        ->with('match',$match)
        ->with('homelineup',$homelineup)
        ->with('homeinfo',$homeinfo)
        ->with('awaylineup',$awaylineup)
        ->with('awayinfo',$awayinfo)
        ->with('action',$action)
        ->with('kickoff',$kickoff);
    }
    
    public function kickoff($id){
        DB::table("matchevent")->insert(
            ['matchid'=>$id,
            'min'=>'0',
            'type'=>'kickoff',
            'event'=>'kickoff']       
        );
        return Redirect::to('/admin/warroom/'.$id);
    }   

    public function comment(Request $request){
        $id=$request->input('matchid');
        $comment=$request->input('comment');
        $min=$request->input('num');
        if($min!=NULL){
            DB::table("matchevent")->insert(
                ['matchid'=>$id,
                'min'=>$min,
                'type'=>'comment',
                'event'=>$comment]       
            );
        }
        else{
            DB::table("matchevent")->insert(
                ['matchid'=>$id,
                'type'=>'comment',
                'event'=>$comment]       
            );
        }
        
        return Redirect::to('/admin/warroom/'.$id);
    }   

    public function substitution(Request $request){
            $matchid=$request->input('matchid');
            $lineupid=$request->input('lineupid');
            $subout=$request->input('subout');
            $subin=$request->input('subin');
            $team=$request->input('team');
            $min=$request->input('min');
            
            $lineup=DB::table("lineup")->where('id',$lineupid)->first();

            for($i=1;$i<=11;$i++){
                $columnname="player".$i;
                if($lineup->$columnname==$subout){
                    $thiscolumnin=$columnname;
                }
            }

            for($i=1;$i<=9;$i++){
                $columnname="bench".$i;
                if($lineup->$columnname==$subin){
                    $thiscolumnout=$columnname;
                }
            }

            if($lineup->sub1in==NULL){
                DB::table("lineup")->where('id',$lineupid)->update(
                [
                    'sub1in'=>$subin,
                    'sub1out'=>$subout,
                    $thiscolumnin=>$subin,
                    $thiscolumnout=>$subout]
                );

                DB::table("matchevent")->insert(
                    ['matchid'=>$matchid,
                    'min'=>$min,
                    'type'=>'sub',
                    'event'=>'ทีม '.$team.' ขอเปลี่ยนตัวผู้เล่น  นำ '.$subout.'ออก และนำ '.$subin.' ลงไปเล่นแทน']       
                );
            }
            elseif($lineup->sub2in==NULL){
                DB::table("lineup")->where('id',$lineupid)->update(
                    [
                        'sub2in'=>$subin,
                        'sub2out'=>$subout,
                        $thiscolumnin=>$subin,
                        $thiscolumnout=>$subout]
                    );
                 DB::table("matchevent")->insert(
                    ['matchid'=>$matchid,
                    'min'=>$min,
                    'type'=>'sub',
                    'event'=>'ทีม '.$team.' ขอเปลี่ยนตัวผู้เล่น  นำ '.$subout.'ออก และนำ '.$subin.' ลงไปเล่นแทน']       
                );
            }
            elseif($lineup->sub3in==NULL){
                DB::table("lineup")->where('id',$lineupid)->update(
                    [
                        'sub3in'=>$subin,
                        'sub3out'=>$subout,
                        $thiscolumnin=>$subin,
                        $thiscolumnout=>$subout]
                    );
                DB::table("matchevent")->insert(
                        ['matchid'=>$matchid,
                        'min'=>$min,
                        'type'=>'sub',
                        'event'=>'ทีม '.$team.' ขอเปลี่ยนตัวผู้เล่น  นำ '.$subout.'ออก และนำ '.$subin.' ลงไปเล่นแทน']       
                    );
                
            }
            else{
                print "
                <script>
                alert('คุณเปลี่ยนครบ 3 คนแล้ว');
                </script>
                ";
            }
            return Redirect::to('/admin/warroom/'.$matchid);
            
    }

    public function yellowcard($id,$team,$player){
        DB::table("matchevent")->insert(
            ['matchid'=>$id,
            'type'=>'yc',
            'event'=>'ทีม'.$team.' ได้รับใบเหลืองจาก '.$player]       
        );
        return Redirect::to('/admin/warroom/'.$id);
    }

    public function redcard($id,$team,$player){
        DB::table("matchevent")->insert(
            ['matchid'=>$id,
            'type'=>'rc',
            'event'=>'ทีม'.$team.' ได้รับใบแดงจาก '.$player]       
        );
        return Redirect::to('/admin/warroom/'.$id);
    }

    public function goal($id,$team,$player,$code){
        DB::table("matchevent")->insert(
            ['matchid'=>$id,
            'type'=>'goal',
            'event'=>'ทีม '.$team.' ได้ประตูจาก '.$player]       
        );
        $match=DB::table("matchset")->where('id',$id)->first();
            if($match->hometeam==$team){
                $originalscore=$match->homescore;
                $newscore=$originalscore+1;
                $addingcolumn="homescore";
            }
            if($match->awayteam==$team){
                $originalscore=$match->awayscore;
                $newscore=$originalscore+1;
                $addingcolumn="awayscore";
            }

        DB::table("matchset")->where('id',$id)->update(
            [
                $addingcolumn=>$newscore]
            );
        $membertable="member_".$code;

        $memberinfo=DB::table($membertable)->where('name',$player)->first();
            $originalmembergoal=$memberinfo->goal;
            $newmembergoal=$originalmembergoal+1;

        DB::table($membertable)->where('name',$player)->update(
            [
                'goal'=>$newmembergoal]
            );
        return Redirect::to('/admin/warroom/'.$id);
    }

    public function owngoal($id,$team,$player){
        DB::table("matchevent")->insert(
            ['matchid'=>$id,
            'type'=>'owngoal',
            'event'=>'ทีม '.$team.' ได้ประตูจากการทำเข้าประตูตัวเองของ '.$player]       
        );

        $match=DB::table("matchset")->where('id',$id)->first();
            if($match->hometeam==$team){
                $originalscore=$match->homescore;
                $newscore=$originalscore+1;
                $addingcolumn="homescore";
            }
            if($match->awayteam==$team){
                $originalscore=$match->awayscore;
                $newscore=$originalscore+1;
                $addingcolumn="awayscore";
            }

        DB::table("matchset")->where('id',$id)->update(
            [
                $addingcolumn=>$newscore]
            );
       
        return Redirect::to('/admin/warroom/'.$id);
    }

    public function finalscore(Request $request){
        $matchid=$request->input('matchid');
        $winnerteam=$request->input('winnerteam');
        $loserteam=$request->input('loserteam');
        $drawteam1=$request->input('drawteam1');
        $drawteam2=$request->input('drawteam2');
        $winnergd=$request->input('winnergd');
        $losergd=$request->input('losergd');

        //Show the Match is Ended
        DB::table("matchevent")->insert(
            ['matchid'=>$matchid,
            'type'=>'endmatch',
            'event'=>'หมดเวลาการแข่งขัน']       
        );

        //Set Match is Ended
        DB::table("matchset")->where('id',$matchid)->update(
            [
                'status'=>'finished']
            );

        //If have a Winner Team
        if($drawteam1==NULL && $drawteam2==NULL){
            $winnertable=DB::table("clubinfo")->where('thainame',$winnerteam)->first();
            $orignalwinnerteampoint=$winnertable->point;
            $newwinnerteampoint=$orignalwinnerteampoint+3;
            $originalwinnerteamgd=$winnertable->goalpoint;
            $newwinnerteamgd=$originalwinnerteamgd+$winnergd;
            DB::table("clubinfo")->where('thainame',$winnerteam)->update(
                [
                    'point'=>$newwinnerteampoint,
                    'goalpoint'=>$newwinnerteamgd]
                );
        $losertable=DB::table("clubinfo")->where('thainame',$loserteam)->first();
            $originalloserteamgd=$losertable->goalpoint;
            $newloserteamgd=$originalloserteamgd+$losergd;
            DB::table("clubinfo")->where('thainame',$loserteam)->update(
                [
                    'goalpoint'=>$newloserteamgd]
                );
        }
        else{
            //DRAW GAME
            $drawteam1table=DB::table("clubinfo")->where('thainame',$drawteam1)->first();
            $drawteam2table=DB::table("clubinfo")->where('thainame',$drawteam2)->first();
                $originaldrawteam1point=$drawteam1table->point;
                $newdrawteam1point=$originaldrawteam1point+1;

                $originaldrawteam2point=$drawteam2table->point;
                $newdrawteam2point=$originaldrawteam2point+1;

            DB::table("clubinfo")->where('thainame',$drawteam1)->update(
                    [
                        'point'=>$newdrawteam1point]
                    );
             DB::table("clubinfo")->where('thainame',$drawteam2)->update(
                    [
                        'point'=>$newdrawteam2point]
                    );
        }
        return Redirect::to('/admin/allmatch');
        
    }    
}