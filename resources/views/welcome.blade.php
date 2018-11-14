@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row justify-content-center'>
        <div class='col-12 col-md-8'>
            <form>
                <div class="form-group">
                    <label for="provice">จังหวัด</label>
                    <select class="form-control" id="province">
                        <option value='0'>กรุณาเลือกจังหวัด</option>
                        @foreach ( $provinces as $province )
                            <option value='{{ $province->id }}'>{{ $province->name_th }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="amphoe">อำเภอ</label>
                    <select class="form-control" id="amphoe">
                        <option value='0'>กรุณาเลือกจังหวัดก่อน</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="district">ตำบล</label>
                    <select class="form-control" id="district">
                        <option>กรุณาเลือกอำเภอก่อน</option>
                    </select>
                </div>
            @csrf
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function(){
        $('#province').change(function(){
            var province_id = $(this).val()
            var _token = $('input[name="_token"]').val()
            //console.log(select)
            $.ajax({
                method: "POST",
                url: "{{ route('fetchAmphoe') }}",
                data: { province_id: province_id, _token: _token }
            })
            .done(function( msg ) {
                $('#amphoe').html(msg)
            });
            var val = '<option>กรุณาเลือกอำเภอก่อน</option>';
            $('#district').html(val)

        })

        $('#amphoe').change(function(){
            var amphoe_id = $(this).val()
            var _token = $('input[name="_token"]').val()
            $.ajax({
                method: "POST",
                url: "{{ route('fetchDistrict') }}",
                data: { amphoe_id: amphoe_id, _token: _token }
            })
            .done(function( msg ) {
                $('#district').html(msg)
            });
        })

    })
</script>
@endsection
