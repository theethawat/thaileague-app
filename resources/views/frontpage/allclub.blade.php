@extends("frontpage.template")
@section("content")
<div class="container">
    <br>
    <h5 class="kanit fronttitle red-text text-accent-4" >ทีมทั้งหมดในลีก</h5><hr class="hr-front">
    <br>
    <div class="flexdiv2">
        @foreach($allclub as $club)
        <div class="frontpage-club">
            <a href="clubinfo/{{$club->englishname}}"><img class="admin-teamlogo" src="{{URL::asset($club->logo)}}"></a>
            <p class="kanitlight">{{$club->thainame}} </p>
        </div>
        @endforeach
    </div>
</div>
@endsection