@extends("admin.template")
@section("content")
<div class="container">
<br>
    <h4 class="kanit">ข้อมูลนักเตะในทีม <a href="../addplayer/{{$club->shortname}}"><button class="btn btn-info kanitlight">เพิ่มนักเตะ</button></a> </h4>
    <hr>
    <div class="flexdiv">
        <img class="admin-teamlogo"src="{{URL::asset($club->logo)}}">
        <h5 class="kanit" style="margin-left:1em;"> {{$club->thainame}} <br> {{$club->englishname}} </h5>
    </div>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="kanit" scope="col">หมายเลข</th>
                <th class="kanit" scope="col">รูปถ่าย</th>
                <th class="kanit" scope="col">ชื่อ</th>
                <th class="kanit" scope="col">นักตำแหน่ง</th>
                <th class="kanit" scope="col">สัญชาติ</th>
                <th class="kanit" scope="col">ประตู</th>

            </tr>
        </thead>
        <tbody>
            @foreach($player as $play)
            <tr>
                <th scope="row" class="kanitlight">{{$play->number}} </th>
                <td ><img class="admin-teamlogo" src="{{URL::asset($play->photo)}}"> </td>
                <td class="kanitlight">{{$play->name}} </td>
                <td class="kanitlight">{{$play->position}} </td>
                <td class="kanitlight">{{$play->nationality}} </td>
                <td class="kanitlight">{{$play->goal}} </td>
            </tr>
            @endforeach
        </tbody>
</table> 
</div>
@endsection