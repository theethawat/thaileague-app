@extends("admin.template")
@section("content")
<div class="container">
    @guest
    <p class="kanitlight"> คุณไม่มีสิทธิในการเข้าถึง โปรดล็อกอิน <a href="{{url('admin')}}"> ล็อกอิน </a></p>
    @else
    <br>
    <h5 class="kanit"> Match Editor | Matchweek{{$match->matchweek}} </h5><hr>

    <div class="row">

        <div class="col ">
            <div class="flexdiv2  justify-content-center team-select-flex">
                <img class="admin-teamlogo" src="{{URL::asset($home->logo)}}">
                <div class="clubname-info team-select">
                    <h6 class="kanit"> {{$home->thainame}}  </h6>
                </div>
            </div>
        </div>

        <div class="col-1 align-self-center bg-danger text-white rounded kanit" style="padding-left:0%;padding-right:0%;">
            <h5 style="text-align:center;">VS</h5>
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
    <hr>

    <form action="{{url('admin/matchupdate')}}" method="post">
        <input class="form-control kanitlight" name="matchweek" value="{{$match->matchweek}}" required hidden>
        <label class="kanit">Match ID</label>
        <input class="form-control kanitlight" name="matchweek" value="{{$match->id}}" required readonly>
        <div class="row">
            <div class="col">
                <label class="kanit">ทีมเหย้า</label>
                <input type="text" name="hometeam" value="{{$home->thainame}}" class="form-control kanitlight" readonly>
                <label class="kanit">โค้ดทีม</label>
                <input type="text" name="hometeam-code" value="{{$home->shortname}}" class="form-control kanitlight" readonly>
                <input type="text" name="hometeam-logo" value="{{$home->logo}}" class="form-control kanitlight" hidden>
            </div>
            <div class="col">
                <label class="kanit">ทีมเยือน</label>
                <input type="text" name="awayteam" value="{{$away->thainame}}" class="form-control kanitlight" readonly>
                <label class="kanit">โค้ดทีม</label>
                <input type="text" name="awayteam-code" value="{{$away->shortname}}" class="form-control kanitlight" readonly>
                <input type="text" name="awayteam-logo" value="{{$away->logo}}" class="form-control kanitlight" hidden>
            </div>
        </div>
        <hr>
        <label class="kanit">สนามแข่งขัน <small class="kanitlight">สามารถเปลี่ยนได้หากมีการเปลี่ยนแปลงสนาม</small></label>
        <input type="text" name="stadium" class="form-control kanitlight" value="{{$match->stadium}}" required>
    
        <div class="row">
            <div class="col-sm">
                <label class="kanit">วันที่แข่งขัน/Date</label>
                <input type="date" class="form-control kanitlight" name="date" value="{{$match->date}}"required>
            </div>
            <div class="col-sm">
                <label class="kanit">เวลาที่ Kick Off/Kick Off Time </label>
                <input type="time" class="form-control kanitlight" value="{{$match->time}}" name="time" required>
            </div>
        </div>

        <hr>
        <label class="kanit">อธิบาย เชิญชวน หรือ เขียนหัวข้อข่าวเกี่ยวกับการแข่งขัน <small class="kanitlight">ถ้ายังไม่ทราบว่าจะเขียนอะไร สามารถเว้นว่างไว้ก่อนได้</small></label>
        @if($match->matchcomment!=NULL)
        <textarea class="form-control kanitlight" rows="4" name="matchinfo">{{$match->matchcomment}}</textarea>
        @else
        <textarea class="form-control kanitlight" rows="4" name="matchinfo"></textarea>
        @endif
        <small class="kanitlight"> เช่น ศึกแห่งศักดิ์ศรีระหว่างแชมป์เก่าไทยลีก บุรีรัมย์ ยูไนเต็ด เปิดบ้านพบกับคู่ปรับตลอดการ SCG เมืองทอง ยูไนเต็ด</small>
        
        <hr>
        <label class="kanit">ตั๋วเข้าชมการแข่งขัน</label>
        <br>
            <div class="form-check ">
                @if($match->ticketprovide==NULL)
                <input class="form-check-input"  type="radio" name="ticketprovide" id="inlineradio0" value="" checked>
                <label class="form-check-label kanit" for="inlineradio0">ยังไม่ทราบรายละเอียด</label>
                @else
                <input class="form-check-input"  type="radio" name="ticketprovide" id="inlineradio0" value="">
                <label class="form-check-label kanit" for="inlineradio0">ยังไม่ทราบรายละเอียด</label>
                @endif
            </div>
            <div class="form-check">
                @if($match->ticketprovide=="onarrival")
                <input class="form-check-input" type="radio" name="ticketprovide" id="inlineradio1" value="onarrival" checked>
                <label class="form-check-label kanit" for="inlineradio1">ซื้อที่สนามและสโตร์ของสโมสรเท่านั้น</label>
                @else
                <input class="form-check-input" type="radio" name="ticketprovide" id="inlineradio1" value="onarrival">
                <label class="form-check-label kanit" for="inlineradio1">ซื้อที่สนามและสโตร์ของสโมสรเท่านั้น</label>
                @endif
            </div>
            <div class="form-check ">
                @if($match->ticketprovide=="Ticketme")
                <input class="form-check-input" type="radio" name="ticketprovide"  id="inlineradio2" value="Ticketme" checked>
                <label class="form-check-label kanit" for="inlineradio2">ซื้อที่ TicketMe</label>
                @else
                <input class="form-check-input" type="radio" name="ticketprovide"  id="inlineradio2" value="Ticketme">
                <label class="form-check-label kanit" for="inlineradio2">ซื้อที่ TicketMe</label>
                @endif
                <br><p class="kanitlight">สำหรับตั๋วทีมเหย้าของสโมสร SCG Muengthong United <a href="https://www.ticketme.co/events" target="_blank">ดูรายละเอียด/หาลิงค์</a> </p>
            </div>
            <div class="form-check ">
                @if($match->ticketprovide=="ThaiTicketMajor")
                <input class="form-check-input" type="radio"  name="ticketprovide" id="inlineradio3" value="ThaiTicketMajor" checked>
                <label class="form-check-label kanit" for="inlineradio3">ซื้อผ่าน Thai Ticket Major</label>
                @else
                <input class="form-check-input" type="radio"  name="ticketprovide" id="inlineradio3" value="ThaiTicketMajor" >
                <label class="form-check-label kanit" for="inlineradio3">ซื้อผ่าน Thai Ticket Major</label>
                @endif
                <br><p class="kanitlight">สำหรับตั๋วทีมเหย้าของสโมสร Police Tero FC <a href="http://www.thaiticketmajor.com/sport/toyota-thai-league-2018-police-tero-th.html" target="_blank">ดูรายละเอียด/หาลิงค์</a> </p>
            </div>
            <div class="form-check ">
                @if($match->ticketprovide=="All Ticket")
                <input class="form-check-input" type="radio"  name="ticketprovide" id="inlineradio4" value="All Ticket" checked>
                <label class="form-check-label kanit" for="inlineradio4">ซื้อผ่าน Counter Service All ticket</label>
                @else
                <input class="form-check-input" type="radio"  name="ticketprovide" id="inlineradio4" value="All Ticket">
                <label class="form-check-label kanit" for="inlineradio4">ซื้อผ่าน Counter Service All ticket</label>
                @endif
                <br><p class="kanitlight">สำหรับตั๋วทีมเหย้าของสโมสรสุพรรณบุรีเอฟซี,แบงค็อก ยูไนเต็ด,บุรีรัมย์ ยูไนเต็ด และ บีจีเอฟซี <a href="https://www.allticket.com/findex.html?d=1532896023045" target="_blank">ดูรายละเอียด/หาลิงค์</a> </p>
            </div>
            <div class="form-check ">
                @if($match->ticketprovide=="Weloveticket")
                <input class="form-check-input" type="radio" name="ticketprovide"  id="inlineradio5" value="Weloveticket" checked>
                <label class="form-check-label kanit" for="inlineradio5">ซื้อผ่าน Weloveticket </label>
                @else
                <input class="form-check-input" type="radio" name="ticketprovide"  id="inlineradio5" value="Weloveticket" >
                <label class="form-check-label kanit" for="inlineradio5">ซื้อผ่าน Weloveticket </label>
                @endif
                <br><p class="kanitlight">สำหรับตั๋วเหย้าของชลบุรีเอฟซี <a href="http://chonburifc.weloveticket.com/" target="_blank">ดูรายละเอียด/หาลิงค์</a> </p>
            </div>
            <p class="kanitlight">ถ้าไม่มีตามนี้สามารถเลือก <b>ซื้อที่สนามและสโตร์ของสโมสรเท่านั้น</b> หรือถ้าไม่แน่ใจสามารถเลือกยังไม่ทราบข้อมูลก่อนได้</p>

            <hr>
            <div class="row">
                <div class="col-sm">
                    <label class="kanit">ลิงค์ซื้อตั๋วเข้าชม</label>
                    @if($match->ticketlink!=NULL)
                    <input class="form-control kanitlight" name="ticketurl" type="url" value="{{$match->ticketlink}}">
                    @else
                    <input class="form-control kanitlight" name="ticketurl" type="url" placeholder="ถ้าไม่ทราบ/ไม่มีระบบจองออนไลน์ให้เว้นว่างไว้">
                    @endif
                </div>
                <div class="col-sm">
                    <label class="kanit">ราคาตั๋วต่ำสุด<small>ราคาเริ่มต้นจะเป็นราคาจากตั๋วที่ถูกที่สุดของทีมเหย้า ท่านสามารถเปลี่ยนแปลงได้</small> </label>
                    <input type="text" class="form-control kanitlight" name="lowestticket" value="{{$match->ticketlessprice}}">
                </div>
            </div>

            <hr>
            <h6 class="kanit">การถ่ายทอดสด <span class="ถ้ายังไม่มีการระบุก็ใส่ว่าไม่ระบุ"</h6>
            <div class="row">
            
                <div class="col-sm">
                    <label class="kanit">Free Broadcasting ออกอากาศฟรี</label>
                    <select name="freebroadcast" class="form-control kanitlight">
                        @if($match->broadcastingfree==NULL)
                        <option value="" selected>ยังไม่ประกาศ</option>
                        @else
                        <option value="">ยังไม่ประกาศ</option>
                        @endif
                        @if($match->broadcastingfree=="no")
                        <option value="no" selected>ไม่มีการถ่ายทอดสดฟรี</option>
                        @else
                        <option value="no">ไม่มีการถ่ายทอดสดฟรี</option>
                        @endif
                        @if($match->broadcastingfree=="true4u")
                        <option value="true4u" selected >True 4U</option>
                        @else
                        <option value="true4u">True 4U</option>
                        @endif
                    </select>
                </div>

                <div class="col-sm">
                <label class="kanit">SD Boardcasting ถ่ายทอดสดแบบ SD</label>
                @if($match->broadcastingsd!=NULL)
                    @if($match->broadcastingsd=="no")
                    <label class="kanit text-danger">ค่าเดิมคือ ไม่มีการถ่ายทอดสด SD ถ้าไม่มีการเปลี่ยนแปลงโปรดระบุตามเดิมด้วย </label>
                    @else
                    <label class="kanit text-danger">ค่าเดิมคือ {{$match->broadcastingsd}} ถ้าไม่มีการเปลี่ยนแปลงโปรดระบุตามเดิมด้วย </label>
                    @endif
                @endif
                <select name="sdbroadcast" class="form-control kanitlight">
                        <option value="">ยังไม่ประกาศ</option>
                        <option value="no">ไม่มีการถ่ายทอดสดแบบ SD</option>
                        <option value="truesport1">True Sport 1</option>
                        <option value="truesport2">True Sport 2</option>
                        <option value="truesport3">True Sport 3</option>
                        <option value="truesport4">True Sport 4</option>
                        <option value="truesport5">True Sport 5</option>
                        <option value="truesport6">True Sport 6</option>
                        <option value="truesport7">True Sport 7</option>
                        <option value="truevision">True Vision ช่องอื่นๆ</option>
                    </select>
                </div>

                <div class="col-sm">
                <label class="kanit">HD Boardcasting ถ่ายทอดสดแบบ HD</label>
                @if($match->broadcastinghd!=NULL)
                    @if($match->broadcastinghd=="no")
                    <label class="kanit text-danger">ค่าเดิมคือ ไม่มีการถ่ายทอดสด HD ถ้าไม่มีการเปลี่ยนแปลงโปรดระบุตามเดิมด้วย </label>
                    @else
                    <label class="kanit text-danger">ค่าเดิมคือ {{$match->broadcastinghd}} ถ้าไม่มีการเปลี่ยนแปลงโปรดระบุตามเดิมด้วย </label>
                    @endif
                @endif
                    <select name="hdbroadcast" class="form-control kanitlight">
                        <option value="">ยังไม่ประกาศ</option>
                        <option value="no">ไม่มีการถ่ายทอดสดแบบ HD</option>
                        <option value="truesporthd">True Sport HD </option>
                        <option value="truesporthd2">True Sport HD 2</option>
                        <option value="truesporthd3">True Sport HD 3</option>
                        <option value="truesporthd4">True Sport HD 4</option>
                    </select>
                </div>
            </div>
            <hr>


            <label class="kanit"> ผู้ตัดสินที่ 1 </label>
            @if($match->referee1!=NULL)
            <input type="text" class="form-control kanitlight" name="referee1" value="{{$match->referee1}} " required>
            @else
            <input type="text" class="form-control kanitlight" name="referee1" >
            @endif
            <div class="row">
                <div class="col-sm">
                    <label class="kanit">ผู้ตัดสินที่ 2</label>
                    @if($match->referee2!=NULL)
                    <input type="text" class="form-control kanitlight" name="referee2" value="{{$match->referee2}} " required>
                    @else
                    <input type="text" class="form-control kanitlight" name="referee2" >
                    @endif
                </div>
                <div class="col-sm">
                    <label class="kanit">ผู้ตัดสินที่ 3</label>
                    @if($match->referee3!=NULL)
                    <input type="text" class="form-control kanitlight" name="referee3" value="{{$match->referee3}} " required>
                    @else
                    <input type="text" class="form-control kanitlight" name="referee3" >
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="kanit">ผู้ตัดสินที่ 4 (ถ้ามี)</label>
                    @if($match->referee4!=NULL)
                    <input type="text" class="form-control kanitlight" name="referee4" value="{{$match->referee4}} ">
                    @else
                    <input type="text" class="form-control kanitlight" name="referee4" >
                    @endif
                </div>
                <div class="col-sm">
                    <label class="kanit">ผู้ตัดสินที่ 5 (ถ้ามี)</label>
                    @if($match->referee5!=NULL)
                    <input type="text" class="form-control kanitlight" name="referee5" value="{{$match->referee5}} ">
                    @else
                    <input type="text" class="form-control kanitlight" name="referee5" >
                    @endif
                </div>
            </div>
            <hr>
            <br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4 style="text-align:center;"> <button type="submit" class="btn btn-warning kanit">อัพเดทข้อมูล / Update This Match</button> </h4>
    </form>

    @endguest
<br><br>
</div>
@endsection