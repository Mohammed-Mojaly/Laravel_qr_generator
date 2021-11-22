@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">

                <div class="col-lg-4 col-sm-12 text-center display_phone" style="display: none">

            @if (session('status'))
                    <br>
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate(session('link'))) !!} ">
                    <br><br>
                    <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate(session('link'))) !!} "  download class="btn btn-success btn-lg btn-block" align="center"> Download</a>
                    <br><br>
             @endif

                </div>


                <div class="row">
               <div class="col-lg-8 col-sm-12">
                <form action="{{route('do_qr_link')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="to">URL:</label>
                        <input type="url" name="link" value="{{ old('link') }}" class="form-control" required  placeholder="http://www.example.com">
                        @error('link')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">
                        Generate QR Link
                    </button>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 text-center largscreen">

         @if (session('status'))
                   <br>
                   <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate(session('link'))) !!} ">
                    <br><br>
                    <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate(session('link'))) !!} "  download class="btn btn-success btn-lg btn-block" align="center"> Download</a>
            @endif

               </div>
           </div>
            </div>
        </div>
    </div>
</div>

@endsection
