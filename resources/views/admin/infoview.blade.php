@extends("admin.template")
@section("content")
<div class="container">
<br>
@guest
<p class="kanitlight"> คุณไม่มีสิทธิเข้าถึงหน้านี้ โปรด <a href="{{url('/login')}} ">ล็อกอิน</a></p>
@else
<h5 class="kanit"> รายละเอียดข้อมูลแมตซ์ | Matchweek{{$match->matchweek}} 
    <!-- Match Status Show -->
    @php 
            $matchstatus=$match->status;
         @endphp

        @if ($matchstatus=="prematch")
            <span class="badge badge-primary admin-badge kanitlight">Pre Match</span>
        @elseif ($matchstatus=="live match")
            <span class="badge badge-success admin-badge kanitlight">Live</span>
        @elseif ($matchstatus=="finished")
            <span class="badge badge-danger admin-badge kanitlight">Ended Match</span>
        @else
            <span class="badge badge-secondary admin-badge kanitlight">{{$matchstatus}} </span>
        @endif

</h5><hr>
    <!-- Team Battle -->
    <div class="row">

        <div class="col ">
            <div class="flexdiv2  justify-content-center team-select-flex">
                <img class="admin-teamlogo" src="{{URL::asset($home->logo)}}">
                <div class="clubname-info team-select">
                    <h6 class="kanit"> {{$home->thainame}}  </h6>
                </div>
            </div>
        </div>

        <div class="col-2 align-self-center bg-primary text-white rounded kanit" style="padding-left:0%;padding-right:0%;">
            <h5 style="text-align:center;">{{$match->homescore}}-{{$match->awayscore}} </h5>
        </div>

        <div class="col">
            <div class="flexdiv2 justify-content-center team-select-flex">
                <img class="admin-teamlogo" src="{{URL::asset($away->logo)}}">
                <div class="clubname-info team-select">
                    <h6 class="kanit"> {{$away->thainame}}  </h6>
                </div>
            </div>
        </div>

    </div>
    <h6 class="kanit acenter">สนามแข่งขัน<span class="kanitlight"> {{$match->stadium}} </span></h6>
    <h6 class="kanit acenter">วันที่ <span class="kanitlight">{{$match->date}} </span>
           เวลา <span class="kanitlight">{{$match->time}} </span></h6>
    <hr>
    <div class="row">
        <div class="col-sm">
            <h6 class="kanit">Match Headline</h6>
            <p class="kanitlight">{{$match->matchcomment}} </p>
        </div>
        <div class="col-sm">
            <h6 class="kanit">ตั๋วชมการแข่งขัน</h6>
            
            @if($match->ticketprovide=="onarrival")
            <p class="kanitlight">ซื้อที่หน้าสนาม หรือ สโตร์ของสโมสรเท่านั้น</p>
            @else
            <p class="kanitlight">ซื้อได้ที่หน้าสนาม สโตร์สโมสร และ {{$match->ticketprovide}}</p>
            @endif

            @if($match->ticketlink!=NULL)
            <h6 class="kanit">เว็บจองตั๋วการแข่งขัน</h6>
            <p class="kanitlight"><a href="{{$match->ticketlink}}" target="_blank" >{{$match->ticketlink}}</a></p>
            @endif

        </div>
        <div class="col-sm">
            <h6 class="kanit">การถ่ายทอดสด</h6>
            <div class="row acenter">
                <div class="col">
                    <h6 class="kanit">Free</h6>
                        @if($match->broadcastingfree!=NULL)
                            <p class="kanitlight"> {{$match->broadcastingfree}} </p>
                        @else
                            <p class="kanitlight">ไม่มีข้อมูล</p>
                        @endif
                </div>
                <div class="col">
                    <h6 class="kanit">SD</h6>
                        @if($match->broadcastingsd!=NULL)
                            <p class="kanitlight"> {{$match->broadcastingsd}} </p>
                        @else
                            <p class="kanitlight">ไม่มีข้อมูล</p>
                        @endif
                </div>
                <div class="col">
                    <h6 class="kanit">HD</h6>
                        @if($match->broadcastinghd!=NULL)
                            <p class="kanitlight"> {{$match->broadcastinghd}} </p>
                        @else
                            <p class="kanitlight">ไม่มีข้อมูล</p>
                        @endif
                </div>


            </div><!--for small row div -->
            
        </div><!--for col-sm div -->
    </div><!--for big row div -->
    <hr>

    <h6 class="kanit">ผู้ตัดสิน</h6>

    <div class="row">
        <div class="col-sm">
            <label class="kanit">ผู้ตัดสินที่ 1 </label>
            @if($match->referee1!=NULL)
                <p class="kanitlight"> {{$match->referee1}} </p>
            @else
                <p class="kanitlight">-</p>
            @endif
        </div>
        <div class="col-sm">
            <label class="kanit">ผู้ตัดสินที่ 2 </label>
            @if($match->referee2!=NULL)
                <p class="kanitlight"> {{$match->referee2}} </p>
            @else
                <p class="kanitlight">-</p>
            @endif
        </div>
        <div class="col-sm">
            <label class="kanit">ผู้ตัดสินที่ 3 </label>
            @if($match->referee3!=NULL)
                <p class="kanitlight"> {{$match->referee3}} </p>
            @else
                <p class="kanitlight">-</p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <label class="kanit">ผู้ตัดสินที่ 4 </label>
            @if($match->referee4!=NULL)
                <p class="kanitlight"> {{$match->referee4}} </p>
            @else
                <p class="kanitlight">-</p>
            @endif
        </div>
        <div class="col-sm">
            <label class="kanit">ผู้ตัดสินที่ 5 </label>
            @if($match->referee5!=NULL)
                <p class="kanitlight"> {{$match->referee5}} </p>
            @else
                <p class="kanitlight">-</p>
            @endif
        </div>
    </div>
    <hr>

<br><br>
@endguest
</div>
@endsection