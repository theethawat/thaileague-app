@extends("admin.template")
@section("content")
    <div class="container">
    <br>
        <form action="{{('activeconfermlineup')}}" method="post">
            <h5 class="acenter kanit">คุณได้เพิ่มไลน์อัพของทีมนี้เรียบร้อยแล้ว</h5>
            <div class="row">
                <div class="col-sm">
                    <label class="kanit">Team Code</label>
                    <input type="text" class="form-control kanitlight" value="{{$teamcode}}" name="teamcode" readonly> 
                </div>
                <div class="col-sm">
                    <label class="kanit">Match ID</label>
                    <input type="text" class="form-control kanitlight" value="{{$matchid}}" name="matchid" readonly> 
                </div>
                <div class="col-sm">
                    <label class="kanit">Line Up ID</label>
                    <input type="text" class="form-control kanitlight" value="{{$lineupid}}" name="lineupid" readonly> 
                </div>
            </div>
            <br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h3 class="acenter"><button type="submit" class="btn btn-success kanit">ยืนยันตัวผู้เล่น</button></h3>
        </form>
    </div>

@endsection