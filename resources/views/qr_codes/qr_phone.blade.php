@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">

                <div class="col-lg-4 col-sm-12 text-center display_phone" style="display: none">

            @if (session('status'))
                    <br>
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->phoneNumber(session('phone'))) !!} ">

                    <br><br>
                    <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->phoneNumber(session('phone'))) !!} " download class="btn btn-success btn-lg btn-block" align="center"> Download</a>
                    <br><br>
             @endif

                </div>


                <div class="row">
               <div class="col-lg-8 col-sm-12">
                <form action="{{route('do_qr_phone')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="to">Phone Number:</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" required  placeholder="ex:967777777777">
                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">
                        Generate QR Phone
                    </button>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 text-center largscreen">

             @if (session('status'))
                   <br>
                   <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->phoneNumber(session('phone'))) !!} ">

                    <br><br>
                    <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->phoneNumber(session('phone'))) !!} " download class="btn btn-success btn-lg btn-block" align="center"> Download</a>
            @endif

               </div>
           </div>
            </div>
        </div>
    </div>
</div>

@endsection
