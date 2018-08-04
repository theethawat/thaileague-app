@extends("admin.template")
@section("content")
    <div class="container">
        <br>
        <h5 class="kanit">ระบบจัดการตัวสำรอง</h5>
        <p class="kanitlight">ถ้าไม่มีนักเตะอยู่ในระบบกรุณาไปเพิ่มนักเตะ <b class="text-info">แล้วคลิกที่เพิ่มไลน์อัพอีกครั้ง</b> ขอออัยในความไม่สะดวกครับ <a href="{{url('admin/addplayer/'.$teamcode)}} "><button class="btn btn-info kanitlight">เพิ่มนักเตะของสโมสรนี้</button></a></p>
        <hr>
                <label class="kanit">เลือกตัวสำรอง</label>
                <form action="{{url('admin/activebench')}}" method="post">

                    <div class="row">
                        <div class="col">
                            <label class="kanit">Match ID</label>
                            <input type="text" name="matchid" value="{{$matchid}}" class="form-control kanitlight" readonly>
                        </div>
                        <div class="col">
                            <label class="kanit">Team Code</label>
                            <input type="text" name="teamcode" value="{{$teamcode}}" class="form-control kanitlight" readonly>
                        </div>
                    </div>
                    <hr>
                    <p class="kanitlight" id="df-describe">เลือกได้สูงสุด 9 คน <b class="text-danger">ถ้าเจอปัญหากรุณากด Refresh 1 ครั้ง </b><b class="text-success"> ถ้ามีการเลือกอยู่แล้วในจำนวนที่ต้องการแต่ระบบไม่ดำเนินการต่อให้ติ๊กออกแล้วติ๊กใหม่</b></p>
                    <div class="flexdiv2">
                        @php
                         $j=1;
                        @endphp

                        @foreach($member as $mb)
                        
                            <div class="custom-control custom-checkbox lineup-playerinfo">
                                <img src="{{URL::asset($mb->photo)}}" class="lineup-photo"><br>
                                <input type="checkbox" id="mb{{$j}}" name="bench[]" value="{{$mb->name}}" class="custom-control-input functioncb1">
                                <p class="kanitlight" style="margin-bottom:0.25em;"><b style="font-size:20;">{{$mb->number}}</b> {{$mb->name}}</p>
                                <label class="custom-control-label acenter kanit" style="margin-left:1em;" for="mb{{$j}}">เลือก</label>
                            </div>

                            @php
                            $j++;
                            @endphp    
                        @endforeach
                    </div>
                    <script>
                    //Thank you code from https://stackoverflow.com/questions/19001844/how-to-limit-the-number-of-selected-checkboxes
                $(document).ready(function(){
                        $('.functioncb1').on('change', function (e) {
                            if ($('.functioncb1:checked').length > 9) {
                                    $(this).prop('checked', false);
                                    alert("ใส่ได้แค่ 9 คน เท่านั้น");
                                }
                        });
                });
                    </script>
                    <hr>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h3 class="acenter"><button type="submit" class="btn btn-success kanit">ยืนยันตัวสำรอง</button></h3>
            </form>
    </div>  


@endsection