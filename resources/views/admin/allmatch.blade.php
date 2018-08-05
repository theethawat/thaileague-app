@extends("admin.template")
@section("content")
<div class="container">
    <br>
    @guest
    <p class="kanitlight"> คุณไม่มีสิทธิในการเข้าถึง โปรดล็อกอิน <a href="{{url('admin')}}"> ล็อกอิน </a></p>
    @else
    <h5 class="kanit"> All Match <button type="button" class="btn btn-light kanitlight"data-toggle="modal" data-target="#signmeaning">
    <i class="fas fa-info-circle"></i> คู่มือ/สัญลักษณ์</button></h5>
    <hr>

        <h6 class="kanit acenter"> Matchweek ปัจจุบัน: <span class="badge badge-primary kanitlight" style="font-size:16px;">Matchweek {{$currentmatchweek->matchweek}} </span> </h6>
        <p class=" kanitlight acenter">
            <small class="kanit"> เริ่มแข่งขัน {{$currentmatchweek->start}} ถึง {{$currentmatchweek->end}}</small><br>
            <small class="kanitlight">ถ้าไม่มีแมตซ์กลางสัปดาห์ เราจะทำการอัพเดท Matchweek ทุกวันพุธหลังการแข่งขันนัดสุดสัปดาห์เสร็จสิ้น <br>
            Matchweek ที่ {{$currentmatchweek->matchweek}} จะเริ่มตั้งแต่ {{$currentmatchweek->preferin}} ถึง {{$currentmatchweek->preferout}} </small> <br>
            <a href="#MW{{$currentmatchweek->matchweek}}"><button class="btn btn-secondary kanitlight">ไปที่ Matchweek ปัจจุบัน</button></a>
        <p>
    
    <hr>
    <!-- Modal -->
<div class="modal fade" id="signmeaning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title kanit" id="exampleModalLabel">คำอธิบายสัญลักษณ์ต่างๆ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div> 
    <div class="modal-body">
        <ul class="kanitlight">
            <li><i class="fas fa-file-alt"></i> หมายถึง ดูข้อมูลทั้งหมด </li>
            <li><i class="fas fa-edit"></i> หมายถึง แก้ไขข้อมูล </li>
            <li> ปุ่ม Live Now หมายถึงเริ่มแมตซ์ ใช้กดเมื่อแมตซ์นั้นเริ่มขึ้น หรือ ก่อน Kick Off ประมาณ 30 นาที </li>
            <li> ปุ่ม Match War Room จะขึ้นมาเมื่อแมตซ์อยู่ในสถานะ Live Match แล้ว ใช้ในการเข้าไปอัพเดทความเคลื่อนไหวต่างๆตลอดแมตซ์การแข่งขัน เช่นการทำประตู การเปลี่ยนตัว และอื่นๆ </li>
        </ul>
      </div>
    </div>
  </div>
</div>


    
    @php
        $matchweekno=25;
    @endphp

   @while($matchweekno<=34)

 

    <div id="MW{{$matchweekno}}" class="matchweekdiv">
    <h5 class="kanit">Match Week {{$matchweekno}} <a href="./matchmaking/{{$matchweekno}}"><button class="btn btn-success kanitlight">เพิ่มแมตซ์</button> </a> </h5> 
    <br> 
        <table class="table table-hover table-responsive">
            <thead>
                <tr >
                    <th scope="col" class=" kanit">ID</th>
                    <th scope="col" class=" kanit">Date</th>
                    <th scope="col" class=" kanit">Time</th>
                    <th scope="col" class=" kanit">Status</th>
                    <th scope="col" class=" kanit">เหย้า</th>
                    <th scope="col" class=" kanit">เยือน</th>
                    <th scope="col" class=" kanit">ตั๋ว</th>
                    <th scope="col" class=" kanit">กรรมการ</th>
                    <th scope="col" class=" kanit">ทีวี</th>
                    <th scope="col" class=" kanit">LineUp</th>
                    <th scope="col" class=" kanit">ผล</th>
                    <th scope="col" class=" kanit">ข้อมูล</th>
                    <th scope="col" class=" kanit">LiveInfo</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($matchshow as $match) 
                @if($matchweekno == $match->matchweek)
                    <tr>
                        <th scope="row" class="kanitlight"> {{$match->id}} </th>
                        <td class="kanitlight"> {{$match->date}} </td>
                        <td class="kanitlight"> {{$match->time}} </td>
                        <td class="kanitlight"> 
                            @php 
                            $matchstatus=$match->status;
                            @endphp

                            @if ($matchstatus=="prematch")
                            <span class="badge badge-primary admin-badge kanitlight">Pre<br> Match</span>
                            @elseif ($matchstatus=="live match")
                            <span class="badge badge-success admin-badge kanitlight">Live</span>
                            @elseif ($matchstatus=="finished")
                            <span class="badge badge-danger admin-badge kanitlight">Ended<br>Match</span>
                            @else
                            <span class="badge badge-secondary admin-badge kanitlight">{{$matchstatus}} </span>
                            @endif

                        </td>
                        <td class="kanitlight admin-table-ovf"> {{$match->hometeam}} </td>
                        <td class="kanitlight admin-table-ovf"> {{$match->awayteam}} </td>
                        <td class="kanitlight"> 
                            @if($match->ticketprovide==NULL)
                               <a href="allmatch/ticket/{{$match->id}}">Add</a>
                            @elseif($match->ticketprovide!=NULL)
                            <i class="fas fa-check"></i>
                            @endif
                        </td>
                        <td class="kanitlight"> 
                            @if($match->referee1==NULL)
                               <a href="allmatch/referee/{{$match->id}}">Add</a>
                            @else
                                <i class="fas fa-check"></i>
                            @endif
                        </td>
                        <td class="kanitlight"> 
                            @if($match->broadcastingsd==NULL)
                               <a href="allmatch/broadcast/{{$match->id}}">Add</a>
                            @elseif($match->broadcastingsd!=NULL)
                            <i class="fas fa-check"></i>
                            @endif
                        </td>
                        <td class="kanitlight"> 
                            <div class="flexdiv">
                            @if($match->homelineup==0)
                            <a href="lineupmake/home/{{$match->id}} "><button class="btn btn-warning kanitlight" style="margin-right:0.25em;"><i class="fas fa-plus"></i> H</button></a>
                            @elseif($match->homelineup==1)
                            <button class="btn btn-success kanitlight"><i class="fas fa-check"></i> H</button>
                            @endif

                            @if($match->awaylineup==0)
                            <a href="lineupmake/away/{{$match->id}} "><button class="btn btn-warning kanitlight"><i class="fas fa-plus"></i> A</button></a>
                            @elseif($match->awaylineup==1)
                            <button class="btn btn-danger kanitlight " style="margin-right:0.25em;"><i class="fas fa-check"></i> A</button>
                            @endif

                            </div>
                        </td>
                        <td class="kanitlight">{{$match->homescore}}-{{$match->awayscore}}</td>
                        <td class="kanitlight">
                            <div class="flexdiv">
                            <a href="allmatch/information/{{$match->id}}"><button class="btn btn-light" title="ดูข้อมูล"><i class="fas fa-file-alt"></i></button></a>
                            <a href="allmatch/edit/{{$match->id}}"><button class="btn btn-light"  title="แก้ไขข้อมูล"><i class="fas fa-edit"></i></button></a>
                            </div>
                        </td>
                        <td class="kanitlight"> 

                            @if ($matchstatus=="prematch")
                            <a href="matchactive/{{$match->id}}"><button class="btn btn-success kanitlignt" id="livematchbtn"data-toggle="tooltip" data-placement="bottom" title="กดปุ่มนี้ก่อนเริ่มเกม เพื่อให้ระบบรายงาน Live Match ปรากฎขึ้นมา">LIVE NOW</button></a>
                            @elseif ($matchstatus=="live match")
                            <a href="warroom/{{$match->id}}"><button class="btn btn-danger kanitlignt">Match<br>WAR ROOM</button></a>
                            @elseif ($matchstatus=="finished")
                            Match is ended
                            @else
                            -
                            @endif

                        </td>
                    </tr>
                @endif
            @endforeach

            <script>
                $('#livematchbtn').tooltip("show")
            </script>

            </tbody>
        </table>       
        
    </div> <!-- for matchweek no navigator div -->
        @php
            $matchweekno++;
        
        @endphp

    @endwhile

    
@endguest
</div>
@endsection