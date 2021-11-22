@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <div class="col-lg-4 col-sm-12 text-center display_phone" style="display: none">

            @if (session('status'))
                    <br>
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->wiFi(['encryption' => session('encryption'),'ssid' => session('name'), 'password' => session('password'), 'hidden' => session('visibility')])) !!} ">
                    <br><br>
                    <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->wiFi(['encryption' => session('encryption'),'ssid' => session('name'), 'password' => session('password'), 'hidden' => session('visibility')])) !!} "  download  class="btn btn-success btn-lg btn-block" align="center">Download</a>
                    <br><br>
             @endif

                </div>


                <div class="row">
               <div class="col-lg-8 col-sm-12">
                <form action="{{route('do_qr_wifi')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="to">SSID/Name:</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>



                        <div class="form-group">
                            <label for="encryption">Encryption:</label>
                            <select name="encryption" class="form-control">
                                <option value="">Select encryption</option>
                                <option value="WPA">WPA</option>
                                <option value="WEP">WEP</option>
                            </select>
                        </div>


                    <div class="form-group">
                        <label for="to">Password:</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>


                        <div class="form-group">
                            <label for="visibility">Visibility:</label>
                            <select name="visibility" class="form-control">
                                <option value="">Select visibility</option>
                                <option value="false">Visible</option>
                                <option value="true">Hidden</option>
                            </select>
                        </div>



                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">
                        Generate QR Wifi
                    </button>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 text-center largscreen">

                @if (session('status'))
                   <br>
                   <div class="specific">

                       <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->wiFi(['encryption' => session('encryption'),'ssid' => session('name'), 'password' => session('password'), 'hidden' => session('visibility')])) !!} ">

                    </div>
                    <br><br>
                    <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->wiFi(['encryption' => session('encryption'),'ssid' => session('name'), 'password' => session('password'), 'hidden' => session('visibility')])) !!} "  download  class="btn btn-success btn-lg btn-block" align="center">Download</a>
                    @endif
               </div>
           </div>
            </div>
        </div>
    </div>
</div>
@endsection

