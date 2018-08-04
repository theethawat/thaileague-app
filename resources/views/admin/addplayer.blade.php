@extends("admin.template")
@section("content")
<div class="container">
    <br>
    <h4 class="kanit">เพิ่มนักเตะ </h4><hr>
    <form action="../playeradding " method="POST" enctype="multipart/form-data" >
        <label class="kanit">รหัสสโมสร</label>
        <input type="text" class="form-control kanitlight" name="club-code" value="{{$code}}" readonly required>
        <label class="kanit">ใส่ชื่อนักเตะ</label>
        <input type="text" class="form-control kanitlight" name="player-name" required>

        <div class="row">
            <div class="col-sm">
                <label class="kanit"> หมายเลขเสื้อ </label>
                <input type="number" class="form-control kanitlight" name="kit-number" required>
            </div>

    
            <div class="col-sm">
                <label class="kanit"> จำนวนประตูที่ยิงได้ <small class="kanitlight">ถ้ายังยิงไม่ได้ให้ใส่ 0</small> </label>
                <input type="number" class="form-control kanitlight" name="goal" value="0" required >
            </div>

             <div class="col-sm">
                <label class="kanit"> ตำแหน่ง </label>
                <select class="form-control" id="position" name="position" required>
                    <option value="GK">GK</option>
                    <option value="MF">MF</option>
                    <option value="DF">DF</option>
                    <option value="FW">FW</option>
                </select>
            </div>

            <div class="col-sm">
                <label class="kanit"> สัญชาติ <small class="kanitlight"> ใส่<a href="http://flag-icon-css.lip.is/">รหัสสัญชาติ</a> ตัวเล็ก 2 ตัว </small></label>
                <input type="text" class="form-control kanitlight" name="nationality" value="th" pattern="[a-z]{2}" required>
            </div>

        </div>

        <label class="kanit">รูปภาพนักเตะ</label><small class="kanitlight">ถ้าไม่มีภาพนักเตะกับสโมสรนี้ให้หาภาพนักเตะคนนี้จาก Google โดยจะเป็นภาพในชุดใดก็ได้ ถ้าไม่มีสามารถใช้โลโก้ลีกแทนได้</small>
        <br>
        <input type="file" id="playerface" name="playerface" require>
        <br><br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary kanit">บันทึกข้อมูล</button>
    </form>
</div>
@endsection