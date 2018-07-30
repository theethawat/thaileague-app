@extends("admin.template")
@section("content")
<div class="container">
    <br>
    @guest
    <p class="kanitlight"> คุณไม่มีสิทธิในส่วนนี้กรุณา <a href="{{url('login')}} "> ล็อกอิน </a></p>
    @else
    <h5 class="kanit"> เพิ่มข้อมูลตั๋วการแข่งขัน </h5><hr>

    <!-- Match Information -->
    <div class="row">
        <div class="col">
            <h5 class="kanit" style="text-align:center;"> {{$match->hometeam}} </h5>
        </div>

        <div class="col-1 rounded bg-danger align-self-center text-white" style="padding-left:0%;padding-right:0%;">
            <h5 class="kanit" style="text-align:center;">VS</h5>
        </div>

        <div class="col">
            <h5 class="kanit" style="text-align:center;"> {{$match->awayteam}} </h5>
        </div>

    </div>

    <hr>

    <h5 class="kanit">ตั๋วเข้าชมการแข่งขัน</h5><hr>
        <form action="{{url('admin/activeticket')}}" method="post">

            <div class="row">
                <div class="col">
                    <label class="kanit">Match ID </label>
                    <input type="text" name="matchid" class="form-control kanitlight" value="{{$match->id}}" readonly >
                </div>
                <div class="col">
                    <label class="kanit">Match Week </label>
                    <input type="text" name="matchweek" class="form-control kanitlight" value="{{$match->matchweek}}" readonly >
                </div>
            </div>
            <br>

            <div class="form-check ">
                <input class="form-check-input"  type="radio" name="ticketprovide" id="inlineradio0" value="" checked>
                <label class="form-check-label kanit" for="inlineradio0">ยังไม่ทราบรายละเอียด</label>
            </div>
            <div class="form-check ">
                <input class="form-check-input" type="radio" name="ticketprovide" id="inlineradio1" value="onarrival">
                <label class="form-check-label kanit" for="inlineradio1">ซื้อที่สนามและสโตร์ของสโมสรเท่านั้น</label>
            </div>
            <div class="form-check ">
                <input class="form-check-input" type="radio" name="ticketprovide"  id="inlineradio2" value="Ticketme">
                <label class="form-check-label kanit" for="inlineradio2">ซื้อที่ TicketMe</label>
                <br><p class="kanitlight">สำหรับตั๋วทีมเหย้าของสโมสร SCG Muengthong United <a href="https://www.ticketme.co/events" target="_blank">ดูรายละเอียด/หาลิงค์</a> </p>
            </div>
            <div class="form-check ">
                <input class="form-check-input" type="radio"  name="ticketprovide" id="inlineradio3" value="ThaiTicketMajor">
                <label class="form-check-label kanit" for="inlineradio3">ซื้อผ่าน Thai Ticket Major</label>
                <br><p class="kanitlight">สำหรับตั๋วทีมเหย้าของสโมสร Police Tero FC <a href="http://www.thaiticketmajor.com/sport/toyota-thai-league-2018-police-tero-th.html" target="_blank">ดูรายละเอียด/หาลิงค์</a> </p>
            </div>
            <div class="form-check ">
                <input class="form-check-input" type="radio"  name="ticketprovide" id="inlineradio4" value="All Ticket">
                <label class="form-check-label kanit" for="inlineradio4">ซื้อผ่าน Counter Service All ticket</label>
                <br><p class="kanitlight">สำหรับตั๋วทีมเหย้าของสโมสรสุพรรณบุรีเอฟซี,แบงค็อก ยูไนเต็ด,บุรีรัมย์ ยูไนเต็ด และ บีจีเอฟซี <a href="https://www.allticket.com/findex.html?d=1532896023045" target="_blank">ดูรายละเอียด/หาลิงค์</a> </p>
            </div>
            <div class="form-check ">
                <input class="form-check-input" type="radio" name="ticketprovide"  id="inlineradio5" value="Weloveticket">
                <label class="form-check-label kanit" for="inlineradio5">ซื้อผ่าน Weloveticket </label>
                <br><p class="kanitlight">สำหรับตั๋วเหย้าของชลบุรีเอฟซี <a href="http://chonburifc.weloveticket.com/" target="_blank">ดูรายละเอียด/หาลิงค์</a> </p>
            </div>
            <p class="kanitlight">ถ้าไม่มีตามนี้สามารถเลือก <b>ซื้อที่สนามและสโตร์ของสโมสรเท่านั้น</b> หรือถ้าไม่แน่ใจสามารถเลือกยังไม่ทราบข้อมูลก่อนได้</p>

            <hr>
            <label class="kanit">ลิงค์ซื้อตั๋วเข้าชม</label>
            <input class="form-control kanitlight" name="ticketurl" type="url" placeholder="ถ้าไม่ทราบ/ไม่มีระบบจองออนไลน์ให้เว้นว่างไว้">
        
            <hr>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4 style="text-align:center;"> <button type="submit" class="btn btn-success kanit">บันทึกข้อมูล / Save </button> </h4>
        
        </form>




    <br><br>
    @endguest
</div>




@endsection