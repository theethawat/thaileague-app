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
                <h6 class="matchday-teamname">{{$hometeam->thainame}}</h6>
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
                <h6 class="matchday-teamname">{{$awayteam->thainame}}</h6>
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
        <li class="tab"><a href="#mom">Man of The Match</a></li>
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
        </div>
    </div>


    <div id="live" class="col s12">
        <div class="container">
            @if($thismatch->status=="prematch")
            <p class="kanitlight acenter">แมตซ์ยังไม่เริ่มต้นขึ้น <br>ยังไม่มีข้อมูลตอนนี้<br>
            พบกันเวลา {{$thismatch->time}} วันที่ {{$thismatch->date}}
            </p>
            @else

            @endif
        </div>
    </div>


    <div id="lineuphome" class="col s12">
        <div class="container">
            @if($thismatch->lineup=='0')
            <p class="kanitlight acenter">ยังไม่มีข้อมูลตอนนี้<br>
            โปรดรอ LINEUP จะมาก่อน Match เริ่มต้นแน่นอน
            </p>
            @else

            @endif
        </div>
    </div>

    <div id="lineupaway" class="col s12">
        <div class="container">
            @if($thismatch->lineup=='0')
            <p class="kanitlight acenter">ยังไม่มีข้อมูลตอนนี้<br>
            โปรดรอ LINEUP จะมาก่อน Match เริ่มต้นแน่นอน
            </p>
            @else

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


    <div id="mom" class="col s12">
        <div class="container">
            @if($thismatch->manofthematch==NULL)
            <p class="kanitlight acenter">ยังไม่มีข้อมูลตอนนี้</p>
            @else

            @endif
        </div>
    </div>

     <div id="highlight" class="col s12">
        <div class="container">
            @if($thismatch->manofthematch==NULL)
            <p class="kanitlight acenter">ยังไม่มีข้อมูลตอนนี้</p>
            @else

            @endif
        </div>
    </div>



@endsection