@extends("admin.template")
@section("content")
<div class="container">
    <br>
    @guest
    <p class="kanitlight"> คุณไม่มีสิทธิในส่วนนี้กรุณา <a href="{{url('login')}} "> ล็อกอิน </a></p>
    @else
    <h5 class="kanit"> เพิ่มข้อมูลเกี่ยวกับการถ่ายทอดสด </h5>
    <small class="kanitlight">สามารถหาข้อมูลได้จากเว็บไทยลีก  หรือ เฟสบุ๊คของ Thaileague True Vision และ True Sport</small><hr>

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

    <h5 class="kanit">การถ่ายทอดสด</h5><hr>
        <form action="{{url('admin/activebroadcast')}}" method="post">

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

            <div class="row">
            
            <div class="col-sm">
                <label class="kanit">Free Broadcasting ออกอากาศฟรี</label>
                @if($match->broadcastingfree != NULL)
                   <input type="text" class="form-control kanitlight" value="{{$match->broadcastingfree}}" readonly>
                   <small class="kanitlight">เนื่องจากมีผู้ใส่ข้อมูลไว้แล้ว ถ้ามีการเปลี่ยนแปลงให้กลับไปหน้าเดิม แล้วแก้ไข</small>
                @else
                <select name="freebroadcast" class="form-control kanitlight">
                    <option value="">ยังไม่ประกาศ</option>
                    <option value="no" >ไม่มีการถ่ายทอดสดฟรี</option>
                    <option value="true4u">True 4U</option>
                </select>
                @endif
            </div>

            <div class="col-sm">
            <label class="kanit">SD Boardcasting ถ่ายทอดสดแบบ SD</label>
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
            @if($match->broadcastinghd != NULL)
                   <input type="text" class="form-control kanitlight" value="{{$match->broadcastinghd}}" readonly>
                   <small class="kanitlight">เนื่องจากมีผู้ใส่ข้อมูลไว้แล้ว ถ้ามีการเปลี่ยนแปลงให้กลับไปหน้าเดิม แล้วแก้ไข</small>
                @else
           
                <select name="hdbroadcast" class="form-control kanitlight">
                    <option value="">ยังไม่ประกาศ</option>
                    <option value="no">ไม่มีการถ่ายทอดสดแบบ HD</option>
                    <option value="truesporthd">True Sport HD </option>
                    <option value="truesporthd2">True Sport HD 2</option>
                    <option value="truesporthd3">True Sport HD 3</option>
                    <option value="truesporthd4">True Sport HD 4</option>
                </select>
             @endif
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