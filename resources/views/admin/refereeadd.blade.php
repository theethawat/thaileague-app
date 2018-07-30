@extends("admin.template")
@section("content")
<div class="container">
    <br>
    @guest
    <p class="kanitlight"> คุณไม่มีสิทธิในส่วนนี้กรุณา <a href="{{url('login')}} "> ล็อกอิน </a></p>
    @else
    <h5 class="kanit"> เพิ่มข้อมูลกรรมการการแข่งขัน </h5>
    <small class="kanitlight">สามารถหาข้อมูลได้จากใบประกบคู่บน Facebook ของ Thaileague ซึ่งข้อมูลอาจจะมาใกล้ๆ กับเกมการแข่งขัน</small><hr>

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

    <h5 class="kanit">กรรมการผู้ตัดสิน</h5><hr>
        <form action="{{url('admin/activereferee')}}" method="post">

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

            <label class="kanit"> ผู้ตัดสินที่ 1 </label>
            <input type="text" class="form-control kanitlight" name="referee1" required>

            <div class="row">
                <div class="col-sm">
                    <label class="kanit">ผู้ตัดสินที่ 2</label>
                    <input type="text" class="form-control kanitlight" name="referee2" required>
                </div>
                <div class="col-sm">
                    <label class="kanit">ผู้ตัดสินที่ 3</label>
                    <input type="text" class="form-control kanitlight" name="referee3" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label class="kanit">ผู้ตัดสินที่ 4 (ถ้ามี)</label>
                    <input type="text" class="form-control kanitlight" name="referee4">
                </div>
                <div class="col-sm">
                    <label class="kanit">ผู้ตัดสินที่ 4 (ถ้ามี)</label>
                    <input type="text" class="form-control kanitlight" name="referee5" >
                </div>
            </div>



            <hr>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4 style="text-align:center;"> <button type="submit" class="btn btn-success kanit">บันทึกข้อมูล / Save </button> </h4>
        
        </form>




    <br><br>
    @endguest
</div>




@endsection