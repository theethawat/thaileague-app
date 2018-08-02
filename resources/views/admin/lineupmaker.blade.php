@extends("admin.template")
@section("content")
    <div class="container">
        <br>
        @guest
        <p class="kanitlight">คุณไม่มีสิทธิในการเข้าถึงหน้านี้โปรด <a href="{{url('/login')}}">ล็อกอิน</a> </p>
        @else
        <h5 class="kanit"> Match Lineup Maker | MatchID {{$match->id}} | Matchweek {{$match->matchweek}}</h5> <hr>
        <h5 class="kanit acenter text-primary"> {{$match->hometeam}} VS {{$match->awayteam}} </h5>
        <h6 class="kanit acenter"> เลือกที่จะสร้าง LINEUP ทีม {{$team}} 

        @if($team="home")
            {{$match->hometeam}}
        @elseif($team="away")
            {{$match->awayteam}}
        @endif 

        @php
        $teamcode=$team."code";
        @endphp

        </h6> <hr>
        <form action="{{url('admin/activelineup')}}" method="post">
            <input type="text" class="form-control kanitlight" name="team-code" value="{{$match->$teamcode}}" hidden>
            <input type="text" class="form-control kanitlight" name="home/away" value="{{$team}}" hidden>
            <h6 class="kanit">ใส่จำนวนนักเตะในแต่ละตำแหน่งในสนาม</h6>
            <small class="kanitlight">สามารถหาข้อมูลจากใบประกบคู่ในเฟสบุ๋คของไทยลีก เรายังไม่พร้อมสำหรับระบบระบุระบบการเล่นในแต่ละแมตซ์</small>
                
                 
                <div class="row">
                    <div class="col">
                        <label class="kanit">DF</label>
                        <input type="number"  id="df" class="form-control kanitlight" value="0" name="df-amount" min="0" max="10" required >
                    </div>
                    <div class="col">
                        <label class="kanit">MF</label>
                        <input type="number" id="mf"  class="form-control kanitlight" value="0" name="mf-amount" min="0" max="10" required >
                    </div>
                    <div class="col">
                        <label class="kanit">FW</label>
                        <input type="number" id="fw" class="form-control kanitlight" value="0" name="fw-amount" min="0" max="10" required >
                    </div>
                </div>
                <br>
            <p class="acenter"><button type="button" onclick="countingplayer()" class="btn btn-success kanitlight">คำนวณตัวผู้เล่น</button> </p>
            <p id="total" class="kanitlight acenter"></p>
            <script>
            function countingplayer(){
                
                var down = Number(document.getElementById("df").value);
                var mid = Number(document.getElementById("mf").value);
                var forw = Number(document.getElementById("fw").value);
                console.log(typeof down);
                console.log(typeof mid);
                console.log(typeof forw);
                var sum;
                sum=1+down+mid+forw;
                if(sum==11){
                    document.getElementById("total").innerHTML="ผู้เล่นทั้งหมดรวมแล้ว "+sum+" คน ครบแล้ว";
                    $(document).ready(function(){
                        $(document).ready(function(){
                        $("#nextphase").show();
                        });
                    }); 
                }
                else{
                    document.getElementById("total").innerHTML="ผู้เล่นทั้งหมดรวมแล้ว "+sum+" คน คุณใส่ผู้เล่นเกินหรือไม่ครบจำนวน กรุณาตรวจสอบใหม่อีกครั้ง";
                    $(document).ready(function(){
                        $("#nextphase").hide();
                        });
                }
                
            }
            </script>
            <div id="nextphase" style="display:none;">
                <hr>
                <label class="kanit">เลือกผู้เล่นตามใบประกบคู่ในเฟสบุ๊คของไทยลีก</label>
                





            </div>
        </form>
        @endguest
    </div>

@endsection