@extends("frontpage.template")
@section("content")
<nav class="nav-extended clubinfo red accent-4">
    <h5 class="kanit"> {{$club->thainame}} </h5>
<div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#test1">Test 1</a></li>
        <li class="tab"><a class="active" href="#test2">Test 2</a></li>
        <li class="tab disabled"><a href="#test3">Disabled Tab</a></li>
        <li class="tab"><a href="#test4">Test 4</a></li>
      </ul>
    </div>
</nav>




@endsection