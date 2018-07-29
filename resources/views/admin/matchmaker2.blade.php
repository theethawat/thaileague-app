@extends("admin.template")
@section("content")
<div class="container">
    <br>
    <h5 class="kanit"> Match Creater | Matchweek{{$matchweek}} </h5><hr>

    <div class="row">

        <div class="col ">
            <div class="flexdiv2  justify-content-center team-select-flex">
                <img class="admin-teamlogo" src="{{URL::asset($hometeam->logo)}}">
                <div class="clubname-info team-select">
                    <h6 class="kanit"> {{$hometeam->thainame}}  </h6>
                </div>
            </div>
        </div>

        <div class="col-1 align-self-center bg-danger text-white rounded kanit" style="padding-left:0%;padding-right:0%;">
            <h5 style="text-align:center;">VS</h5>
        </div>

        <div class="col">
            <div class="flexdiv2 justify-content-center team-select-flex">
                <img class="admin-teamlogo" src="{{URL::asset($awayteam->logo)}}">
                <div class="clubname-info team-select">
                    <h6 class="kanit"> {{$awayteam->thainame}}  </h6>
                </div>
            </div>
        </div>

    </div>
    <hr>

    <from action="{{url('admin/matchmaking3')}} " method="post">
        <div class="row">
            <div class="col">
                <label class="kanit">ทีมเหย้า</label>
                <input type="text" name="hometeam" value="{{$hometeam->thainame}}" class="form-control kanitlight" readonly>
                <label class="kanit">โค้ดทีม</label>
                <input type="text" name="hometeam-code" value="{{$hometeam->shortname}}" class="form-control kanitlight" readonly>
            </div>
            <div class="col">
                <label class="kanit">ทีมเยือน</label>
                <input type="text" name="awayteam" value="{{$awayteam->thainame}}" class="form-control kanitlight" readonly>
                <label class="kanit">โค้ดทีม</label>
                <input type="text" name="awayteam-code" value="{{$awayteam->shortname}}" class="form-control kanitlight" readonly>
            </div>
        </div>
        <hr>
        <label class="kanit">สนามแข่งขัน <small class="kanitlight">สามารถเปลี่ยนได้หากมีการเปลี่ยนแปลงสนาม</small></label>
        <input type="text" name="stadium" class="form-control kanitlight" value="{{$hometeam->homestadium}}" required>
    
    </form>


</div>
@endsection