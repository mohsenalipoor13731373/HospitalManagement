@extends('layouts.admin')
@section('content')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="x_panel">


        <div class="x_title">
            <h2>تعریف تخصص
            </h2>
            <div class="clearfix"></div>
        </div>
        <div id="my_alert" class="alert" style="display: none">
            <div class="alert alert-success">اطلاعات با موفقیت ثبت شد.</div>
        </div>
        <div class="x_content">

            <div class="row">
                <form id="bime" method="post" action="javascript:void(0)">
                    @csrf
                    @if($id)
                        <input type="hidden" name="id" value="{{$id->id}}">
                    @endif
                    <div class="col-md-3 form-group">
                        <input type="text" name="name" placeholder="نام" class="form-control"
                               @if($id) value="{{$id->name}}" @endif>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" name="number" placeholder=" شماره" class="form-control"
                               @if($id) value="{{$id->number}}" @endif>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" name="price" placeholder="مبلغ" class="form-control"
                               @if($id) value="{{$id->price}}" @endif>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <div class="col-md-2 form-group">
                        <div class="form-group">
                            <button type="submit" id="send_form" class=" form-control btn btn-success">ارسال</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>



    <script>
        if ($("#bime").length > 0) {
            $("#bime").validate({

                rules: {
                    name: {
                        required: true,
                    },

                    number: {
                        required: true,
                        digits: true,
                    },
                    price: {
                        required: true,
                        digits: true,

                    },
                },
                messages: {

                    name: {
                        required: "لطفا نام را وارد کنید",
                    },
                    number: {
                        required: "لطفا شماره را وارد کنید",
                        digits: "شماره باید از نوع عددی باشد",
                    },
                    price: {
                        required: "لطفا مبلغ را وارد کنید",
                        digits: "مبلغ باید از نوع عددی باشد",

                    },

                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#send_form').html('در حال ارسال');

                    $.ajax({
                        url: '{{route('admin.module.specialties.store')}}',
                        type: "POST",
                        data: $('#bime').serialize(),
                        success: function (response) {
                            $('#send_form').html('ارسال');
                            $('#res_message').show();
                            $('#res_message').html(response.msg);
                            $('#msg_div').removeClass('d-none');

                            document.getElementById("bime").reset();
                            setTimeout(function () {
                                $('#res_message').hide();
                                $('#msg_div').hide();
                            }, 10000);
                        }
                    });
                    $('#my_alert').show();
                    $('#my_alert').hide(5000);
                    $('#bime').refresh();

                }
            })
        }
    </script>
@endsection
