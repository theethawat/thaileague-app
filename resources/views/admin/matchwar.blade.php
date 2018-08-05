@extends("admin.template")
@section("content")
    <div class="container">
        @guest
        <br>
            <p class="kanitlight">คุณไม่มีสิทธิเข้าถึงระบบนี้กรุณา<a href="{{url('/login')}}">ล็อกอิน</a></p>
        @else
        <br>
            <h5 class="kanit acenter">ระบบ Match WAR-ROOM</h5>
            <h6 class="kanit acenter">Matchweek {{$match->matchweek}} | Matchid {{$match->id}} </h6>
            <h6 class="kanit acenter">{{$match->hometeam}} <span class="badge badge-success kanitlight" style="font-size:18px">{{$match->homescore}} - {{$match->awayscore}} </span>{{$match->awayteam}} </h6>
            <p class="kanitlight acenter">แนะนำให้ทำผ่าน PC หรือ Table จอใหญ่จะได้อรรถรส และสะดวกกว่า แต่ก็สามารถใช้ผ่านมือถือได้เช่นกัน</p>
            <hr>
            @if($kickoff==NULL)
            <p class="acenter"><a href="kickoff/{{$match->id}}"><button class="btn btn-success kanit">KICKOFF</button></a></p>
            <hr>
            @endif
            <div class="row">
               
                <div class="col-sm">
                @if($kickoff!=NULL)
                <p class="acenter"><button id="activehomesub" class="btn btn-success kanitlight">ซ่อน/แสดง ระบบเปลี่ยนตัวทีมเหย้า</button></p>

                    <script>
                        $(document).ready(function(){
                            $("#activehomesub").click(function(){
                                $("#homesub").toggle();
                            });
                        });
                    </script>
                    <div class="card" id="homesub" style="display:none;">
                        <div class="card-body">
                            <h6 class="kanit">เปลี่ยนตัวทีมเหย้า</h6>
                            <form action="{{url('admin/warroom/sub')}}" method="post">  
                                <label class="kanit">ทีม {{$match->hometeam}}</label>
                                <input type="text" name="team" value="{{$match->hometeam}} " class="form-control kanitlight" hidden>
                                <div class="row">
                                    <div class="col">
                                        <label class="kanit">Lineup ID</label>
                                        <input type="text" name="lineupid" value="{{$homelineup->id}} " class="form-control kanitlight" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="kanit">Match ID</label>
                                        <input type="text" name="matchid" value="{{$match->id}} " class="form-control kanitlight" readonly>
                                    </div>
                                </div>
                                <label class="kanit">ตัวที่ต้องการเอาออก</label>
                                <select name="subout" class="form-control kanitlight" >
                                    @for($i=1;$i<=11;$i++)
                                    <option value="{{$homeinfo[$i]->name}}">{{$homeinfo[$i]->name}}</option>
                                    @endfor
                                </select>
                                <label class="kanit">ตัวที่ต้องการเอาเข้า</label>
                                <select name="subin" class="form-control kanitlight" >
                                    @for($i=12;$i<=20;$i++)
                                    <option value="{{$homeinfo[$i]->name}}">{{$homeinfo[$i]->name}}</option>
                                    @endfor
                                </select>
                                <label class="kanit">นาทีที่</label>
                                <input type="number" class="form-control kanitlight" name="min">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <br><button type="submit" class="btn btn-primary kanit">ยืนยัน</button>
                            </form>
                        </div>
                    </div>

                    <br>
                    <p class="acenter"><button id="activeawaysub" class="btn btn-success kanitlight">ซ่อน/แสดง ระบบเปลี่ยนตัวทีมเยือน</button></p>
                    
                    <script>
                        $(document).ready(function(){
                            $("#activeawaysub").click(function(){
                                $("#awaysub").toggle();
                            });
                        });
                    </script>
                    <div class="card" id="awaysub" style="display:none;">
                        <div class="card-body">
                            <h6 class="kanit">เปลี่ยนตัวทีมเยือน</h6>
                            <form action="{{url('admin/warroom/sub')}}" method="post">  
                                <label class="kanit">ทีม {{$match->awayteam}}</label>
                                <input type="text" name="team" value="{{$match->awayteam}} " class="form-control kanitlight" hidden>
                                <div class="row">
                                    <div class="col">
                                        <label class="kanit">Lineup ID</label>
                                        <input type="text" name="lineupid" value="{{$awaylineup->id}} " class="form-control kanitlight" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="kanit">Match ID</label>
                                        <input type="text" name="matchid" value="{{$match->id}} " class="form-control kanitlight" readonly>
                                    </div>
                                </div>
                                <label class="kanit">ตัวที่ต้องการเอาออก</label>
                                <select name="subout" class="form-control kanitlight" >
                                    @for($i=1;$i<=11;$i++)
                                    <option value="{{$awayinfo[$i]->name}}">{{$awayinfo[$i]->name}}</option>
                                    @endfor
                                </select>
                                <label class="kanit">ตัวที่ต้องการเอาเข้า</label>
                                <select name="subin" class="form-control kanitlight" >
                                    @for($i=12;$i<=20;$i++)
                                    <option value="{{$awayinfo[$i]->name}}">{{$awayinfo[$i]->name}}</option>
                                    @endfor
                                </select>
                                <label class="kanit">นาทีที่</label>
                                <input type="number" class="form-control kanitlight" name="min">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <br><button type="submit" class="btn btn-primary kanit">ยืนยัน</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <p class="acenter"><button id="endmatch" class="btn btn-danger kanitlight" data-toggle="modal" data-target="#finalscoremodal" >จบแมตซ์/หมดเวลาการแข่งขัน</button></p>
                <hr>
                <h6 class="kanit acenter">อัพเดทความเคลื่อนไหวล่าสุด</h6>
                    <table class="table table-hover">
                        <thead>
                            <tr class="kanit">
                                <th scope="col">#</th>
                                <th scope="col">type</th>
                                <th scope="col">Event</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($action as $act)
                            <tr class="kanitlight">
                                <th scope="row">{{$act->min}} </th>
                                <td>{{$act->type}} </td>
                                <td>{{$act->event}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                @endif
            </div>

                <div class="col-sm-4">
                    <h6 class="kanit acenter">{{$match->hometeam}} </h6>
                    @for($i=1;$i<20;$i++)
                        <div class="flexdiv admin-teamlineup">
                            <img class="admin-teamlogo" src="{{URL::asset($homeinfo[$i]->photo)}}">
                            <div class="admin-warroom-text">
                                <h6 class="kanitlight"> <span class="badge badge-secondary">{{$homeinfo[$i]->number}} </span>  {{$homeinfo[$i]->name}} </h6>
                                <p class="kanitlight">{{$homeinfo[$i]->position}} 
                                @if($i<=11)
                                <a href="./goal/{{$match->id}}/{{$match->hometeam}}/{{$homeinfo[$i]->name}}/{{$match->homecode}}"><button class="btn btn-success kanitlight warroom-btn">Goal</button></a>
                                <a href="./owngoal/{{$match->id}}/{{$match->awayteam}}/{{$awayinfo[$i]->name}}"><button class="btn btn-secondary kanitlight warroom-btn">OG</button> 
                                <a href="./yellowcard/{{$match->id}}/{{$match->hometeam}}/{{$homeinfo[$i]->name}}"><button class="btn btn-warning kanitlight warroom-btn">YC</button></a> 
                                <a href="./redcard/{{$match->id}}/{{$match->hometeam}}/{{$homeinfo[$i]->name}}"><button class="btn btn-danger kanitlight warroom-btn">RC</button></a>
                                @endif
                                </p>
                            </div>   
                        </div>
                        @if($i==11)
                            <hr>
                            <h6 class="kanit">ตัวสำรอง</h6>
                        @endif
                    @endfor
                </div>

                <div class="col-sm-4">
                <h6 class="kanit acenter">{{$match->awayteam}} </h6>
                    @for($i=1;$i<20;$i++)
                        <div class="flexdiv admin-teamlineup">
                            <img class="admin-teamlogo" src="{{URL::asset($awayinfo[$i]->photo)}}">
                            <div class="admin-warroom-text">
                                <h6 class="kanitlight"> <span class="badge badge-secondary">{{$awayinfo[$i]->number}} </span>  {{$awayinfo[$i]->name}} </h6>
                                <p class="kanitlight">{{$awayinfo[$i]->position}} 
                                @if($i<=11)
                                <a href="./goal/{{$match->id}}/{{$match->awayteam}}/{{$awayinfo[$i]->name}}/{{$match->awaycode}}"><button class="btn btn-success kanitlight warroom-btn">Goal</button></a> 
                                <a href="./owngoal/{{$match->id}}/{{$match->hometeam}}/{{$awayinfo[$i]->name}}"><button class="btn btn-secondary kanitlight warroom-btn">OG</button></a>
                                <a href="./yellowcard/{{$match->id}}/{{$match->awayteam}}/{{$awayinfo[$i]->name}}"><button class="btn btn-warning kanitlight warroom-btn">YC</button></a> 
                                <a href="./redcard/{{$match->id}}/{{$match->awayteam}}/{{$awayinfo[$i]->name}}"><button class="btn btn-danger kanitlight warroom-btn">RC</button></a>
                                @endif
                                </p>
                            </div>   
                        </div>
                        @if($i==11)
                            <hr>
                            <h6 class="kanit">ตัวสำรอง</h6>
                        @endif
                    @endfor
                </div>
            </div>

    <!--Final Score Modal -->
    <div class="modal fade" id="finalscoremodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title kanit" id="exampleModalLabel">สรุปผลการแข่งขัน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($match->homescore > $match->awayscore)
                    <h6 class="kanit acenter">{{$match->hometeam}} ชนะ {{$match->awayteam}} <br>ไปได้ด้วยสกอร์ {{$match->homescore}}-{{$match->awayscore}} </h6>
                        @php
                        $winover=($match->homescore)-($match->awayscore);
                        $lostover=($match->awayscore)-($match->homescore);
                        @endphp
                    <p class="kanitlight acenter">{{$match->hometeam}} ประตูได้เสียเพิ่มเป็น{{$winover}} </p>
                    <p class="kanitlight acenter"> {{$match->awayteam}} ประตูได้เสียเพิ่มเป็น {{$lostover}} </p>
                    <form action="{{url('admin/warroom/finalscore')}}" method="post">
                        <label class="kanit">บวก 3 แต้มให้กับทีม</label>
                            <input type="text" name="winnerteam" class="form-control kanitlight" value="{{$match->hometeam}}" readonly>
                        <label class="kanit">บวก 0 แต้มให้กับทีม</label>
                            <input type="text" name="loserteam" class="form-control kanitlight" value="{{$match->awayteam}}" readonly>
                        <label class="kanit">ทีมเหย้า(ชนะ) {{$match->hometeam}} ประตูได้เสียเพิ่มเป็น </label>
                            <input type="text" name="winnergd" class="form-control kanitlight" value="{{$winover}}" readonly>  
                        <label class="kanit">ทีมเยือน(แพ้) {{$match->awayteam}} ประตูได้เสียเพิ่มเป็น </label>
                            <input type="text" name="losergd" class="form-control kanitlight" value="{{$lostover}}" readonly>
                        <label class="kanit">แมตซ์ไอดี</label>
                            <input type="text" name="matchid" class="form-control kanitlight" value="{{$match->id}}" readonly> 
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <br><button type="submit" class="btn btn-danger kanit">ยืนยันผลสกอร์</button>
                    </form>

                    @elseif($match->homescore < $match->awayscore)
                    <h6 class="kanit acenter">{{$match->hometeam}} แพ้ {{$match->awayteam}} <br>ไปได้ด้วยสกอร์ {{$match->homescore}}-{{$match->awayscore}} </h6>
                        @php
                        $winover=($match->awayscore)-($match->homescore);
                        $lostover=($match->homescore)-($match->awayscore);
                        @endphp

                    <p class="kanitlight acenter"> {{$match->hometeam}} ประตูได้เสียเพิ่มเป็น {{$lostover}} </p>
                    <p class="kanitlight acenter"> {{$match->awayteam}} ประตูได้เสียเพิ่มเป็น {{$winover}} </p>

                    <form action="{{url('admin/warroom/finalscore')}}" method="post">
                        <label class="kanit">บวก 3 แต้มให้กับทีม</label>
                            <input type="text" name="winnerteam" class="form-control kanitlight" value="{{$match->awayteam}}" readonly>
                        <label class="kanit">บวก 0 แต้มให้กับทีม</label>
                            <input type="text" name="loserteam" class="form-control kanitlight" value="{{$match->hometeam}}" readonly>
                        <label class="kanit">ทีมเหย้า(แพ้) {{$match->hometeam}} ประตูได้เสียเพิ่มเป็น </label>
                            <input type="text" name="losergd" class="form-control kanitlight" value="{{$lostover}}" readonly>  
                        <label class="kanit">ทีมเยือน(ชนะ) {{$match->awayteam}} ประตูได้เสียเพิ่มเป็น </label>
                            <input type="text" name="winnergd" class="form-control kanitlight" value="{{$winover}}" readonly>
                        <label class="kanit">แมตซ์ไอดี</label>
                            <input type="text" name="matchid" class="form-control kanitlight" value="{{$match->id}}" readonly> 
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <br><button type="submit" class="btn btn-danger kanit">ยืนยันผลสกอร์</button>
                    </form>
                    
                    @elseif($match->homescore == $match->awayscore)
                    <h6 class="kanit acenter">{{$match->hometeam}} เสมอ {{$match->awayteam}} <br>ไปได้ด้วยสกอร์ {{$match->homescore}}-{{$match->awayscore}} </h6>
                        @php
                        $winover=0;
                        $lostover=0;
                        @endphp
                    <p class="kanitlight acenter"> {{$match->hometeam}} ประตูได้เสียเพิ่มเป็น {{$lostover}} </p>
                    <p class="kanitlight acenter"> {{$match->awayteam}} ประตูได้เสียเพิ่มเป็น {{$winover}} </p>
                    <form action="{{url('admin/warroom/finalscore')}}" method="post">
                        <label class="kanit">บวก 1 แต้มให้กับทีม</label>
                            <input type="text" name="drawteam1" class="form-control kanitlight" value="{{$match->hometeam}}" readonly>
                        <label class="kanit">บวก 1 แต้มให้กับทีม</label>
                            <input type="text" name="drawteam2" class="form-control kanitlight" value="{{$match->awayteam}}" readonly>
                        <label class="kanit">ทีมเหย้า {{$match->hometeam}} ประตูได้เสียเพิ่มเป็น </label>
                            <input type="text" name="homegd" class="form-control kanitlight" value="{{$winover}}" readonly>  
                        <label class="kanit">ทีมเยือน {{$match->awayteam}} ประตูได้เสียเพิ่มเป็น </label>
                            <input type="text" name="awaygd" class="form-control kanitlight" value="{{$lostover}}" readonly>
                        <label class="kanit">แมตซ์ไอดี</label>
                            <input type="text" name="matchid" class="form-control kanitlight" value="{{$match->id}}" readonly> 
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <br><button type="submit" class="btn btn-danger kanit">ยืนยันผลสกอร์</button>
                    </form>

                    @endif
                </div> 
             </div>
        </div>
    </div>                 







        @endguest
    </div>
@endsection