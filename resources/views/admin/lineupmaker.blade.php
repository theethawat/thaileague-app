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

        @if($team=="home")
            {{$match->hometeam}}
        @else
            {{$match->awayteam}}
        @endif 

        @php
        $teamcode=$team."code";
        @endphp

        </h6> 
        <p class="kanitlight">ถ้าไม่มีนักเตะอยู่ในระบบกรุณาไปเพิ่มนักเตะ <b class="text-info">แล้วคลิกที่เพิ่มไลน์อัพอีกครั้ง</b> แต่บางทีนักเตะอาจจะไม่ได้อยู่ตามตำแหน่ง เช่น DF แต่ไปอยู่ MF ขอออัยในความไม่สะดวกครับ <a href="{{url('admin/addplayer/'.$match->$teamcode)}} "><button class="btn btn-info kanitlight">เพิ่มนักเตะของสโมสรนี้</button></a></p>
        <hr>
        <form action="{{url('admin/activelineup')}}" method="post">
            <input type="text" class="form-control kanitlight" name="matchid" value="{{$match->id}}" hidden>
            <label class="kanit">Team Code</label>
            <input type="text" class="form-control kanitlight" name="team-code" value="{{$match->$teamcode}}" readonly>
            <input type="text" class="form-control kanitlight" name="home/away" value="{{$team}}" hidden>
            <h6 class="kanit">ใส่จำนวนนักเตะในแต่ละตำแหน่งในสนาม</h6>
            <small class="kanitlight">ข้อให้อ้างอิงข้อมูลจากและนับจำนวนตำแหน่ง <b class="text-danger">ตามใบประกบคู่ของไทยลีกเท่านั้น</b> เรายังไม่พร้อมสำหรับระบบระบุระบบการเล่นในแต่ละแมตซ์</small>
                
                 
                <div class="row">
                    <div class="col">
                        <label class="kanit">DF</label>
                        <input type="number"  id="maindf" class="form-control kanitlight" value="0" name="df-amount" min="0" max="10" required >
                    </div>
                    <div class="col">
                        <label class="kanit">MF</label>
                        <input type="number" id="mainmf"  class="form-control kanitlight" value="0" name="mf-amount" min="0" max="10" required >
                    </div>
                    <div class="col">
                        <label class="kanit">FW</label>
                        <input type="number" id="mainfw" class="form-control kanitlight" value="0" name="fw-amount" min="0" max="10" required >
                    </div>
                </div>
                <br>
            <p class="acenter"><button type="button" id="changesystem" onclick="countingplayer()" class="btn btn-success kanitlight"  data-toggle="tooltip" data-placement="bottom" title="ถ้ามีการเปลี่ยนแปลงจำนวนผู้เล่นในแต่ละตำแหน่งกรุณา Refresh หน้าใหม่">คำนวณตัวผู้เล่น</button> </p>
            <p id="total" class="kanitlight acenter"></p>
            <script>$('#changesystem').tooltip("show")</script>
            <script>
            function countingplayer(){
                
                var down = Number(document.getElementById("maindf").value);
                var mid = Number(document.getElementById("mainmf").value);
                var forw = Number(document.getElementById("mainfw").value);
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
                
                <label class="kanit">ผู้รักษาประตู</label> <small class="kanitlight">เลือกผู้เล่นตามใบประกบคู่ในเฟสบุ๊คของไทยลีก</small>
                <br>
                <div class="flexdiv2">
                    @php
                    $i=1;
                    @endphp
                    @foreach($goalkeeper as $gk)
                        
                        <div class="custom-control custom-checkbox lineup-playerinfo">
                            <img src="{{URL::asset($gk->photo)}}" class="lineup-photo"><br>
                            <input type="radio" id="gk{{$i}}" name="goalkeeper" value="{{$gk->name}}" class="custom-control-input">
                            <p class="kanitlight" style="margin-bottom:0.25em;"><b style="font-size:20;">{{$gk->number}}</b> {{$gk->name}}</p>
                            <label class="custom-control-label acenter kanit" style="margin-left:1em;" for="gk{{$i}}">เลือก</label>
                        </div>

                    @php
                    $i++;
                    @endphp    
                    @endforeach
                    
                   
                </div>
                <hr>
                <label class="kanit">กองหลัง</label>
                    <p class="kanitlight" id="df-describe">กรุณาเลือกตามจำนวนที่ท่านตั้งเอาไว้ <b class="text-danger">ถ้าเจอปัญหากรุณากด Refresh 1 ครั้ง </b><b class="text-success"> ถ้ามีการเลือกอยู่แล้วในจำนวนที่ต้องการแต่ระบบไม่ดำเนินการต่อให้ติ๊กออกแล้วติ๊กใหม่</b></p>
                    <div class="flexdiv2">
                        @php
                         $j=1;
                        @endphp

                        @foreach($defender as $df)
                        
                            <div class="custom-control custom-checkbox lineup-playerinfo">
                                <img src="{{URL::asset($df->photo)}}" class="lineup-photo"><br>
                                <input type="checkbox" id="df{{$j}}" name="defender[]" value="{{$df->name}}" class="custom-control-input functioncb1">
                                <p class="kanitlight" style="margin-bottom:0.25em;"><b style="font-size:20;">{{$df->number}}</b> {{$df->name}}</p>
                                <label class="custom-control-label acenter kanit" style="margin-left:1em;" for="df{{$j}}">เลือก</label>
                            </div>

                            @php
                            $j++;
                            @endphp    
                        @endforeach
                    </div>
                    <script>
                    //Thank you code from https://stackoverflow.com/questions/19001844/how-to-limit-the-number-of-selected-checkboxes
                $(document).ready(function(){
                     $("#df-describe").ready(function(){
                        var down =  Number(document.getElementById("maindf").value);
                        $('.functioncb1').on('change', function (e) {
                            if ($('.functioncb1:checked').length < down){
                                document.getElementById("df-describe").innerHTML="ใส่ยังไม่ครบ ต้องเลือกให้ครบก่อนถึงจะมีสิทธิทำขั้นถัดไป";
                                    $("#nextphase2").hide();
                            }
                            if ($('.functioncb1:checked').length > down) {
                                    $(this).prop('checked', false);
                                    alert("ใส่ได้แค่ "+down+" คน เท่านั้น ถ้าระบบมีปัญหากรุณา Refresh ใหม่ ขออภัยจริงๆ ครับ");
                                }
                            if ($('.functioncb1:checked').length == down){
                                document.getElementById("df-describe").innerHTML="ท่านใส่ครบแล้ว สามารถใส่ส่วนถัดไปได้";
                                $("#nextphase2").show();
                            }
                        });
                    });
                });
                    </script>
                    <hr>
            </div>
            <div id="nextphase2" style="display:none;">
            <label class="kanit">กองกลาง</label>
                    <p class="kanitlight" id="mf-describe">กรุณาเลือกตามจำนวนที่ท่านตั้งเอาไว้ <b class="text-danger">ถ้าเจอปัญหากรุณากด Refresh 1 ครั้ง </b><b class="text-success"> ถ้ามีการเลือกอยู่แล้วในจำนวนที่ต้องการแต่ระบบไม่ดำเนินการต่อให้ติ๊กออกแล้วติ๊กใหม่</b></p>
                    <div class="flexdiv2">
                        @php
                         $k=1;
                        @endphp

                        @foreach($midfielder as $mf)
                        
                            <div class="custom-control custom-checkbox lineup-playerinfo">
                                <img src="{{URL::asset($mf->photo)}}" class="lineup-photo"><br>
                                <input type="checkbox" id="mf{{$k}}" name="midfielder[]" value="{{$mf->name}}" class="custom-control-input functioncb2">
                                <p class="kanitlight" style="margin-bottom:0.25em;"><b style="font-size:20;">{{$mf->number}}</b> {{$mf->name}}</p>
                                <label class="custom-control-label acenter kanit" style="margin-left:1em;" for="mf{{$k}}">เลือก</label>
                            </div>

                            @php
                            $k++;
                            @endphp    
                        @endforeach
                    </div>
                    <script>
                    //Thank you code from https://stackoverflow.com/questions/19001844/how-to-limit-the-number-of-selected-checkboxes
                $(document).ready(function(){
                        $("#mf-describe").ready(function(){
                        var mid =  Number(document.getElementById("mainmf").value);
                        $('.functioncb2').on('change', function (e) {
                            if ($('.functioncb2:checked').length < mid){
                                document.getElementById("mf-describe").innerHTML="ใส่ยังไม่ครบ ต้องเลือกให้ครบก่อนถึงจะมีสิทธิทำขั้นถัดไป";
                                    $("#nextphase3").hide();
                            }
                            if ($('.functioncb2:checked').length > mid) {
                                    $(this).prop('checked', false);
                                    alert("ใส่ได้แค่ "+mid+" คน เท่านั้น ถ้าระบบมีปัญหากรุณา Refresh ใหม่ ขออภัยจริงๆ ครับ");
                                }
                            if ($('.functioncb2:checked').length == mid){
                                document.getElementById("mf-describe").innerHTML="ท่านใส่ครบแล้ว สามารถใส่ส่วนถัดไปได้";
                                $("#nextphase3").show();
                            }
                        });
                    });
                });
                    </script>
                    <hr>
            </div>


            <div id="nextphase3" style="display:none;">
            <label class="kanit">กองหน้า</label>
                    <p class="kanitlight" id="fw-describe">กรุณาเลือกตามจำนวนที่ท่านตั้งเอาไว้ <b class="text-danger">ถ้าเจอปัญหากรุณากด Refresh 1 ครั้ง </b><b class="text-success"> ถ้ามีการเลือกอยู่แล้วในจำนวนที่ต้องการแต่ระบบไม่ดำเนินการต่อให้ติ๊กออกแล้วติ๊กใหม่</b></p>
                    <div class="flexdiv2">
                        @php
                         $m=1;
                        @endphp

                        @foreach($forwarder as $fw)
                        
                            <div class="custom-control custom-checkbox lineup-playerinfo">
                                <img src="{{URL::asset($fw->photo)}}" class="lineup-photo"><br>
                                <input type="checkbox" id="fw{{$m}}" name="forwarder[]" value="{{$fw->name}}" class="custom-control-input functioncb3">
                                <p class="kanitlight" style="margin-bottom:0.25em;"><b style="font-size:20;">{{$fw->number}}</b> {{$fw->name}}</p>
                                <label class="custom-control-label acenter kanit" style="margin-left:1em;" for="fw{{$m}}">เลือก</label>
                            </div>

                            @php
                            $m++;
                            @endphp    
                        @endforeach
                    </div>
                    <script>
                    //Thank you code from https://stackoverflow.com/questions/19001844/how-to-limit-the-number-of-selected-checkboxes
                $(document).ready(function(){
                     $("#fw-describe").ready(function(){
                        var forw = Number(document.getElementById("mainfw").value);
                        $('.functioncb3').on('change', function (e) {
                            if ($('.functioncb3:checked').length < forw){
                                document.getElementById("fw-describe").innerHTML="ใส่ยังไม่ครบ ต้องเลือกให้ครบก่อนถึงจะมีสิทธิทำขั้นถัดไป";
                                    $("#nextbutton").hide();
                            }
                            if ($('.functioncb3:checked').length > forw) {
                                    $(this).prop('checked', false);
                                    alert("ใส่ได้แค่ "+forw+" คน เท่านั้น ถ้าระบบมีปัญหากรุณา Refresh ใหม่ ขออภัยจริงๆ ครับ");
                                }
                            if ($('.functioncb3:checked').length == forw){
                                document.getElementById("fw-describe").innerHTML="ท่านใส่ครบแล้ว สามารถใส่ส่วนถัดไปได้";
                                $("#nextbutton").show();
                            }
                        });
                    });
                });
                    </script>
                    <hr>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h3 class="acenter" id="nextbutton" style="display:none;"><button type="submit" class="btn btn-success kanit">บันทึก 11 ตัวจริง</button> </h3>


        </form>
        <br><br>
        @endguest
    </div>

@endsection