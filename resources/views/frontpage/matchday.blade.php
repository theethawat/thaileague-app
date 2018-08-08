@extends("frontpage.template")
@section("content") 
    @php
    if ($navtheme==NULL)
        $navnewtheme= "red accent-4";
    else
        $navnewtheme=$navtheme;
    @endphp
<nav class="nav-extended clubinfo {{$navnewtheme}}">

    <div class=" {{$navnewtheme}} ">
    <div class="row center-align ">
        
        <div class="col s5 kanit ">
            <div class="flexdiv matchday-hteam"style="width:100%;">
                <img style="margin-right:0.5em;"class="matchday-logo"src="{{URL::asset($hometeam->logo)}}">
                <a href="{{url('clubinfo/'.$hometeam->englishname)}}"><h6 class="matchday-teamname">{{$hometeam->thainame}}</h6></a>
            </div>
        </div>
        
        <div class="col s2 kanit ">
                @if($thismatch->status=="prematch")
                   <h5> VS </h5>
                @else
                   <h5> {{$thismatch->homescore}}-{{$thismatch->awayscore}} </h5>
                @endif
        </div>

        <div class="col s5 kanit ">
            <div class="flexdiv matchday-ateam"style="width:100%;">
                <img style="margin-right:0.5em;"class="matchday-logo"src="{{URL::asset($awayteam->logo)}}">
                <a href="{{url('clubinfo/'.$awayteam->englishname)}}"><h6 class="matchday-teamname">{{$awayteam->thainame}}</h6></a>
            </div>
        </div>

    </div>
<div class="nav-content">
      <ul class="tabs tabs-transparent kanitlight club-tab">
        <li class="tab"><a href="#info">เกี่ยวกับแมตซ์</a></li>
        <li class="tab"><a href="#live">อัพเดทผลการแข่งขัน</a></li>
        <li class="tab"><a href="#lineuphome">Lineup ทีมเหย้า</a></li>
        <li class="tab"><a href="#lineupaway">Lineup ทีมเยือน</a></li>
        <li class="tab "><a href="#ticket">ตั๋วเข้าชม</a></li>
        @if($thismatch->broadcastingfree=="true4u")
        <li class="tab "><a href="#true4u">True4U</a></li>
        @endif
        <li class="tab"><a href="#highlight">ไฮไลต์</a></li>
      </ul>
</div>
</nav>


<script>
      $(document).ready(function(){
    $('.tabs').tabs();
  });
</script>


<!--info part -->
    <div id="info" class="col s12">
    <img class="stadium-photo" src="{{URL::asset($hometeam->homestadiumphoto)}}">
        <div class="container">
            <h5 class="kanit acenter"> {{$thismatch->hometeam}} VS {{$thismatch->awayteam}} </h5>
            <p class="acenter kanitlight">{{$thismatch->matchcomment}} </p>

            <h6 class="kanit a center"> สนามแข่งขัน <span class="kanitlight"> {{$thismatch->stadium}} </span></h6>
            <h6 class="kanit acenter">Matchweek <span class="kanitlight">{{$thismatch->matchweek}} </span>  วันที่ <span class="kanitlight">{{$thismatch->date}} </span> Kick-Off <span class="kanitlight">{{$thismatch->time}}</span> </h6>
            <h6 class="acenter kanit">ถ่ายทอดสด</h6>
            <div class="flexdiv" >
                @if($thismatch->broadcastingfree=="true4u")
                <img src="{{URL::asset('photo/truevision/true4u.png')}}" class="matchday-tvlong" alt="true4u">
                @endif
 

                @if($thismatch->broadcastingsd!=NULL && $thismatch->broadcastingsd!="no")
                <img src="{{URL::asset('photo/truevision/'.$thismatch->broadcastingsd.'.png')}}" class="matchday-tvshort" alt="{{$thismatch->broadcastingsd}}">
                @endif
 

                @if($thismatch->broadcastinghd!=NULL && $thismatch->broadcastinghd!="no")
                <img src="{{URL::asset('photo/truevision/'.$thismatch->broadcastinghd.'.png')}}" class="matchday-tvlong" alt="{{$thismatch->broadcastinghd}}">
                @endif
                
            </div>
            <h6 class="kanit acenter">ทีมงานผู้ตัดสิน</h6>
            <ul class="acenter">
                <li class="kanit">ผู้ตัดสินที่ 1 <span class="kanitlight">{{$thismatch->referee1}} </span> </li>
                <li class="kanit">ผู้ช่วยผู้ตัดสินที่ 1 <span class="kanitlight">{{$thismatch->referee2}} </span> </li>
                <li class="kanit">ผู้ช่วยผู้ตัดสินที่ 2 <span class="kanitlight">{{$thismatch->referee3}} </span> </li>
                <li class="kanit">ผู้ตัดสินที่ 4 <span class="kanitlight">{{$thismatch->referee4}} </span> </li>
            </ul>
        </div>
    </div>


    <div id="live" class="col s12">
        <div class="container">
            @if($thismatch->status=="prematch")
            <p class="kanitlight acenter">แมตซ์ยังไม่เริ่มต้นขึ้น <br>ยังไม่มีข้อมูลตอนนี้<br>
            พบกันเวลา {{$thismatch->time}} วันที่ {{$thismatch->date}}
            </p>
            @else
            <h6 class="kanit acenter">อัพเดทความเคลื่อนไหวล่าสุด</h6>
                    <table class="table table-hover">
                        <thead>
                            
                        </thead>
                        <tbody>
                            @foreach($action as $act)
                            <tr class="kanitlight">
                                <td scope="row">{{$act->min}} </td>
                                <td>
                                @if($act->type=="kickoff")
                                <i class="fab fa-telegram-plane"></i>
                                @elseif($act->type=="yc")
                                <i class="fas fa-portrait" style="color:orange;"></i>
                                @elseif($act->type=="rc")
                                <i class="fas fa-portrait" style="color:red;"></i>
                                @elseif($act->type=="goal")
                                <i class="fas fa-futbol"></i>
                                @elseif($act->type=="owngoal")
                                <i class="fas fa-futbol"></i>
                                @elseif($act->type=="sub")
                                <i class="fas fa-long-arrow-alt-up" style="color:green;"></i><i class="fas fa-long-arrow-alt-down" style="color:red;"></i>
                                @else
                                <i class="fas fa-comment"></i>
                                @endif
                                 </td>
                                <td>{{$act->event}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            @endif
        </div>
    </div>


    <div id="lineuphome" class="col s12">
        <div class="container">
            @if($thismatch->homelineup=='0')
            <p class="kanitlight acenter">ยังไม่มีข้อมูลตอนนี้<br>
            โปรดรอ LINEUP จะมาก่อน Match เริ่มต้นแน่นอน
            </p>
        @else
        <!--SYSTEM FOR SHOW LINEUP -->
                <h6 class="kanit acenter">ผู้รักษาประตู</h6>
                <div class="flexdiv2 lineup-setcenter">
                    <div class="matchday-lineup">
                        <img class="lineup-player picture-center" src="{{URL::asset($homeinfo[1]->photo)}} ">
                        <div class="flexdiv">
                            <h6 class="kanit acenter playernumber red accent-4 white-text"> {{$homeinfo[1]->number}}</h6>
                            <h6 class="kanitlight acenter lineup-playername">{{$homelineup->player1}}</h6>
                        </div>
                    </div>       
                </div>
                <hr class="hr-front">
                
                <h6 class="kanit acenter">กองหลัง</h6>
                <div class="flexdiv2 lineup-setcenter">
                @php
                    $homepart1amout=($homelineup->amoutdf)+1;
                    @endphp
                @for($i=2;$i<=$homepart1amout;$i++)
                    <div class="matchday-lineup">
                        <img class="lineup-player picture-center" src="{{URL::asset($homeinfo[$i]->photo)}} ">
                        <div class="flexdiv">
                            <h6 class="kanit acenter playernumber  red accent-4 white-text"> {{$homeinfo[$i]->number}}</h6>
                            <h6 class="kanitlight acenter lineup-playername">{{$homeinfo[$i]->name}}</h6> 
                        </div>
                    </div>     
                @endfor  
                </div>
                <hr class="hr-front">
                

                <h6 class="kanit acenter">กองกลาง</h6>
                <div class="flexdiv2 lineup-setcenter">
                    @php
                    $homepart2amout=($homelineup->amoutmf)+($homelineup->amoutdf)+1;
                    $homepart2start=($homelineup->amoutdf)+2;
                    @endphp
                @for($i=$homepart2start;$i<=$homepart2amout;$i++)
                    <div class="matchday-lineup">
                        <img class="lineup-player picture-center" src="{{URL::asset($homeinfo[$i]->photo)}} ">
                        <div class="flexdiv">
                            <h6 class="kanit acenter playernumber  red accent-4 white-text"> {{$homeinfo[$i]->number}}</h6>
                            <h6 class="kanitlight acenter lineup-playername">{{$homeinfo[$i]->name}}</h6> 
                        </div>
                    </div>     
                @endfor  
                </div>
                <hr class="hr-front">
                
                <h6 class="kanit acenter">กองหน้า</h6>
                <div class="flexdiv2 lineup-setcenter">
                    @php
                    $homepart3start=($homelineup->amoutdf)+($homelineup->amoutmf)+2;
                    @endphp
                @for($i=$homepart3start;$i<=11;$i++)
                    <div class="matchday-lineup">
                        <img class="lineup-player picture-center" src="{{URL::asset($homeinfo[$i]->photo)}} ">
                        <div class="flexdiv">
                            <h6 class="kanit acenter playernumber  red accent-4 white-text"> {{$homeinfo[$i]->number}}</h6>
                            <h6 class="kanitlight acenter lineup-playername">{{$homeinfo[$i]->name}}</h6> 
                        </div>
                    </div>     
                @endfor  
                
                </div>
                <p class="kanitlight acenter">จัดตามสถานะ GK DF MF FW ใน Line up เริ่มต้นเท่านั้นไม่ได้จัดตามระบบการเล่น ผู้เล่นจะเปลี่ยนไปตามการเปลี่ยนตัวผู้เล่น</p>
                <br><br>
                <hr class="hr-front">
                
                 <h6 class="kanit acenter">ตัวสำรอง</h6>
                <div class="flexdiv2 lineup-setcenter">
                @for($i=12;$i<=20;$i++)
                    <div class="matchday-lineup">
                        <img class="lineup-player picture-center" src="{{URL::asset($homeinfo[$i]->photo)}} ">
                        <div class="flexdiv">
                            <h6 class="kanit acenter playernumber orange darken-1 white-text"> {{$homeinfo[$i]->number}}</h6>
                            <h6 class="kanitlight acenter lineup-playername">{{$homeinfo[$i]->name}}</h6> 
                        </div>
                    </div>     
                @endfor  
                </div>
            <!--END OF SYSTEM TO SHOW LINEUP -->
            @endif
        </div>
    </div>

    <div id="lineupaway" class="col s12">
        <div class="container">
            @if($thismatch->awaylineup=='0')
            <p class="kanitlight acenter">ยังไม่มีข้อมูลตอนนี้<br>
            โปรดรอ LINEUP จะมาก่อน Match เริ่มต้นแน่นอน
            </p>
            @else
                    <!--SYSTEM FOR SHOW LINEUP -->
                <h6 class="kanit acenter">ผู้รักษาประตู</h6>
                <div class="flexdiv2 lineup-setcenter">
                    <div class="matchday-lineup">
                        <img class="lineup-player picture-center" src="{{URL::asset($awayinfo[1]->photo)}} ">
                        <div class="flexdiv">
                            <h6 class="kanit acenter playernumber red accent-4 white-text"> {{$awayinfo[1]->number}}</h6>
                            <h6 class="kanitlight acenter lineup-playername">{{$awaylineup->player1}}</h6>
                        </div>
                    </div>       
                </div>
                <hr class="hr-front">
                
                <h6 class="kanit acenter">กองหลัง</h6>
                <div class="flexdiv2 lineup-setcenter">
                @php
                    $awaypart1amout=($awaylineup->amoutdf)+1;
                    @endphp
                @for($i=2;$i<=$awaypart1amout;$i++)
                    <div class="matchday-lineup">
                        <img class="lineup-player picture-center" src="{{URL::asset($awayinfo[$i]->photo)}} ">
                        <div class="flexdiv">
                            <h6 class="kanit acenter playernumber  red accent-4 white-text"> {{$awayinfo[$i]->number}}</h6>
                            <h6 class="kanitlight acenter lineup-playername">{{$awayinfo[$i]->name}}</h6> 
                        </div>
                    </div>     
                @endfor  
                </div>
                <hr class="hr-front">
                

                <h6 class="kanit acenter">กองกลาง</h6>
                <div class="flexdiv2 lineup-setcenter">
                    @php
                    $awaypart2amout=($awaylineup->amoutmf)+($awaylineup->amoutdf)+1;
                    $awaypart2start=($awaylineup->amoutdf)+2;
                    @endphp
                @for($i=$awaypart2start;$i<=$awaypart2amout;$i++)
                    <div class="matchday-lineup">
                        <img class="lineup-player picture-center" src="{{URL::asset($awayinfo[$i]->photo)}} ">
                        <div class="flexdiv">
                            <h6 class="kanit acenter playernumber  red accent-4 white-text"> {{$awayinfo[$i]->number}}</h6>
                            <h6 class="kanitlight acenter lineup-playername">{{$awayinfo[$i]->name}}</h6> 
                        </div>
                    </div>     
                @endfor  
                </div>
                <hr class="hr-front">
                
                <h6 class="kanit acenter">กองหน้า</h6>
                <div class="flexdiv2 lineup-setcenter">
                    @php
                    $awaypart3start=($awaylineup->amoutdf)+($awaylineup->amoutmf)+2;
                    @endphp
                @for($i=$awaypart3start;$i<=11;$i++)
                    <div class="matchday-lineup">
                        <img class="lineup-player picture-center" src="{{URL::asset($awayinfo[$i]->photo)}} ">
                        <div class="flexdiv">
                            <h6 class="kanit acenter playernumber  red accent-4 white-text"> {{$awayinfo[$i]->number}}</h6>
                            <h6 class="kanitlight acenter lineup-playername">{{$awayinfo[$i]->name}}</h6> 
                        </div>
                    </div>     
                @endfor  
                
                </div>
                <p class="kanitlight acenter">จัดตามสถานะ GK DF MF FW เท่านั้นไม่ได้จัดตามระบบการเล่น</p>
                <br><br>
                <hr class="hr-front">
                
                 <h6 class="kanit acenter">ตัวสำรอง</h6>
                <div class="flexdiv2 lineup-setcenter">
                @for($i=12;$i<=20;$i++)
                    <div class="matchday-lineup">
                        <img class="lineup-player picture-center" src="{{URL::asset($awayinfo[$i]->photo)}} ">
                        <div class="flexdiv">
                            <h6 class="kanit acenter playernumber orange darken-1 white-text"> {{$awayinfo[$i]->number}}</h6>
                            <h6 class="kanitlight acenter lineup-playername">{{$awayinfo[$i]->name}}</h6> 
                        </div>
                    </div>     
                @endfor  
                </div>





            @endif
        </div>
    </div>

    <div id="ticket" class="col s12">
        <div class="container">
            @if($thismatch->ticketprovide==NULL)
            <p class="kanitlight acenter">ยังไม่มีข้อมูลตอนนี้</p>
            @else
                <h5 class="kanit acenter">สุดยอดฟุตบอลไทยลีก เร้าใจกว่าในจอ <br> ความมันรออยู่ที่สนาม </h5>
                <h6 class="kanit acenter">มาร่วมชมฟุตบอลไทยลีกแบบสุดมัน เชียร์ดังๆ ให้เราใจกันติดขอบสนาม</a>
                @if($thismatch->ticketprovide == "onarrival")
                <img class="ticketprovide-logo" src="{{URL::asset('photo/t1fulllogo.png')}}">
                <p class="kanitlight acenter">ตั๋วเข้าชมสามารถซื้อได้ที่สโตร์ของสโมสร และหน้าสนามแข่งขัน</p>
                @elseif($thismatch->ticketprovide == "All Ticket")
                <img class="ticketprovide-logo" src="{{URL::asset('photo/allticket.png')}}">
                <p class="kanitlight acenter">ตั๋วเข้าชมสามารถซื้อได้ที่สโตร์ของสโมสร หน้าสนามแข่งขัน และระบบออนไลน์ผ่าน All Ticket
                    ที่ 
                    @if($thismatch->ticketlink==NULL)
                    <a href="https://www.allticket.com/findex.html?d=1532896023045"> All Ticket Online </a>
                    @else
                    <a href="{{$thismatch->ticketlink}}"> All Ticket Online </a>
                    @endif
                    และซื้อได้ที่ 7-11 และ Counter Service All Ticket ทุกสาขา
                </p>
                @elseif($thismatch->ticketprovide == "ThaiTicketMajor")
                <img class="ticketprovide-logo" src="{{URL::asset('photo/ttmlogo.png')}}">
                <p class="kanitlight acenter">ตั๋วเข้าชมสามารถซื้อได้ที่สโตร์ของสโมสร หน้าสนามแข่งขัน และระบบออนไลน์ผ่าน ThaiTicketMajor
                    ที่ 
                    @if($thismatch->ticketlink==NULL)
                    <a href="http://www.thaiticketmajor.com/sport/toyota-thai-league-2018-police-tero-th.html"> Thai Ticket Major Online </a>
                    @else
                    <a href="{{$thismatch->ticketlink}}"> Thai Ticket Major Online </a>
                    @endif
                    และซื้อได้ที่ ThaiTicketMajor
                </p>
                @elseif($thismatch->ticketprovide == "Ticketme")
                <img class="ticketprovide-logo" src="{{URL::asset('photo/ticketme.png')}}">
                <p class="kanitlight acenter">ตั๋วเข้าชมสามารถซื้อได้ที่สโตร์ของสโมสร หน้าสนามแข่งขัน และระบบออนไลน์ผ่าน TicketMe
                    ที่ 
                    @if($thismatch->ticketlink==NULL)
                    <a href="https://www.ticketme.co/events"> Ticketme.co </a>
                    @else
                    <a href="{{$thismatch->ticketlink}}"> Ticketme.co </a>
                    @endif
                </p>
                @elseif($thismatch->ticketprovide == "Weloveticket")
                <img class="ticketprovide-logo" src="{{URL::asset('photo/weloveticket.png')}}">
                <p class="kanitlight acenter">ตั๋วเข้าชมสามารถซื้อได้ที่สโตร์ของสโมสร หน้าสนามแข่งขัน และระบบออนไลน์ผ่าน Weloveticket
                    ที่ 
                    @if($thismatch->ticketlink==NULL)
                    <a href="http://chonburifc.weloveticket.com/"> Weloveticket </a>
                    @else
                    <a href="{{$thismatch->ticketlink}}"> Weloveticket </a>
                    @endif
                </p>
                @endif
                <h5 class="kanit acenter"> ราคาตั๋วเริ่มต้นเพียง <span style="font-size:28px;">{{$thismatch->ticketlessprice}}</span> บาท เท่านั้น</h5>
                <p class="kanitlight acenter">อาจจะยังมีส่วนลดสำหรับสมาชิก และ เด็กๆ อีกด้วย
                <br><b>หมายเหตุ</b> ราคานี้เป็นราคาสำหรับที่นั่งฝั่งทีมเหย้า</p>
                <br><br>
                <p class="kanitlight acenter">การเชียร์ในสนามนอกจากจะได้รับความมัน และอารมณ์ร่วมในเกมแล้ว ยังได้เป็นการให้กำลังใจนักเตะ และสโมสรอีกด้วย </p>
            @endif
        </div>
    </div>


   

     <div id="highlight" class="col s12">
        <div class="container">
            @if($thismatch->highlight==NULL)
            <p class="kanitlight acenter">ยังไม่มีข้อมูลตอนนี้</p>
            @else
            <iframe width="100%" height="400px" src="{{$thismatch->highlight}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            @endif
        </div>
    </div>

     @if($thismatch->broadcastingfree=="true4u")
        <div id="true4u" >
            <script>
                $(document).ready(function(){
                    $("iframe").scroll(function(){
                        $("#textabovetrue4u").hide();
                    });
                });
            </script>
            <p class="kanit acenter" id="textabovetrue4u">กดที่ Logo True4U 1 ครั้งเพื่อจะให้ดูได้</p> 
            <iframe src="http://true4u.truelife.com/"  height="500px" width="100%"></iframe> 
        </div>
    @endif



@endsection