@extends("admin.template")
@section("content")

<div class="container">
    <br>
    <h5 class="kanit"> Match Making | Matchweek {{$matchweek}} </h5><hr>

    @if($errormessage !=NULL)
    <div class="alert alert-primary kanitlight" role="alert">
        {{$errormessage}}
    </div>
    @endif

    <form action="{{url('admin/matchmaking2')}}" method="post">
        <input type="text" class="form-control kanitlight" hidden name="matchweek" value="{{$matchweek}}">
        <div class="row">
            <div class="col">
                <label class="kanit">เจ้าบ้าน Home</label>
                <select class="form-control kanitlight" name="hometeam" require>
                    @foreach ($club as $home)
                        <option value="{{$home->thainame}}">{{$home->thainame}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label class="kanit">ทีมเยือน Away</label>
                <select class="form-control kanitlight" name="awayteam" require>
                    @foreach ($club as $away)
                        <option value="{{$away->thainame}}">{{$away->thainame}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <p class="kanitlight" style="text-align:center;"> อย่าเลือกทีมที่ซ้ำกันมิเช่นนั้น ระบบจะนำท่านมาเลือกใหม่อีกครั้ง </p>
        <h3 class="kanit" style="text-align:center;"><button class="btn btn-primary" type="submit"><i class="fas fa-arrow-right"></i> ขั้นตอนต่อไป/Next </button></h3>
        
    </form>
</div>

@endsection