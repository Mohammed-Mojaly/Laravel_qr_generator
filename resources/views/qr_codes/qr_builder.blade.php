@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">

                    <div class="col-lg-4 col-sm-12 text-center display_phone" style="display: none">

                        @if (session('code'))
                           <br>
                           @if (session('ext') != 'eps')
                            <img src="{{asset('qr_code/' . session('code'))}}" alt="{{session('code')}}" class="img-fluid">
                            @endif
                            <br><br>
                            <a href="{{asset('qr_code/' . session('code'))}}"  download  class="btn btn-success btn-lg btn-block" align="center"> Download</a>
                            <br><hr>
                         @endif

                    </div>


                    <div class="row">
                   <div class="col-lg-8 col-sm-12">
                    <form action="{{route('do_qr_bulider')}}" method="POST">
                        @csrf

                                    <div class="form-group">
                                        <label for="body">Content</label>
                                        <textarea name="body"  class="form-control" rows="3" required>{{ old('body') }}</textarea>
                                        @error('body')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="qr_size">QR Size</label>
                                                <select name="qr_size" class="form-control">
                                                    <option value="">Select size</option>
                                                    <option value="300">300x300</option>
                                                    <option value="600">600x600</option>
                                                    <option value="900">900x900</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="qr_img_type">Image Type</label>
                                                <select name="qr_img_type" class="form-control">
                                                    <option value="">Select Image type</option>
                                                    <option value="png">PNG</option>
                                                    <option value="svg">SVG</option>
                                                    <option value="eps">EPS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="qr_encoding">QR Encoding</label>
                                                <select name="qr_encoding" class="form-control">
                                                    <option value="">Select QR Encoding</option>
                                                    <option value="UTF-8">UTF-8</option>
                                                    <option value="ISO-8859-1">ISO-8859-1</option>
                                                    <option value="ISO-8859-2">ISO-8859-2</option>
                                                    <option value="ISO-8859-3">ISO-8859-3</option>
                                                    <option value="ISO-8859-4">ISO-8859-4</option>
                                                    <option value="ISO-8859-5">ISO-8859-5</option>
                                                    <option value="ISO-8859-6">ISO-8859-6</option>
                                                    <option value="ISO-8859-7">ISO-8859-7</option>
                                                    <option value="ISO-8859-8">ISO-8859-8</option>
                                                    <option value="ISO-8859-9">ISO-8859-9</option>
                                                    <option value="ISO-8859-10">ISO-8859-10</option>
                                                    <option value="ISO-8859-11">ISO-8859-11</option>
                                                    <option value="ISO-8859-12">ISO-8859-12</option>
                                                    <option value="ISO-8859-13">ISO-8859-13</option>
                                                    <option value="ISO-8859-14">ISO-8859-14</option>
                                                    <option value="ISO-8859-15">ISO-8859-15</option>
                                                    <option value="ISO-8859-16">ISO-8859-16</option>
                                                    <option value="SHIFT-JIS">SHIFT-JIS</option>
                                                    <option value="WINDOWS-1250">WINDOWS-1250</option>
                                                    <option value="WINDOWS-1251">WINDOWS-1251</option>
                                                    <option value="WINDOWS-1252">WINDOWS-1252</option>
                                                    <option value="WINDOWS-1256">WINDOWS-1256</option>
                                                    <option value="UTF-16BE">UTF-16BE</option>
                                                    <option value="ASCII">ASCII</option>
                                                    <option value="GBK">GBK</option>
                                                    <option value="EUC-KR">EUC-KR</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="qr_eye">QR Eye </label>
                                                <select name="qr_eye" class="form-control">
                                                    <option value="">Select Style</option>
                                                    <option value="square">Square</option>
                                                    <option value="circle">Circle</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="qr_margin">QR Margin</label>
                                                <input type="number" name="qr_margin" value="{{ old('qr_margin', 0) }}" min="0" max="100" step="1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="qr_style">QR Style</label>
                                                <select name="qr_style" class="form-control">
                                                    <option value="">Select QR Style</option>
                                                    <option value="square">Square</option>
                                                    <option value="dot">Dot</option>
                                                    <option value="round">Round</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="qr_color">QR Color</label>
                                                <input type="color" name="qr_color" value="{{ old('qr_color', '#000000') }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>


                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">
                                            Generate QR Code
                                        </button>
                                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 text-center largscreen">

                    @if (session('code'))
                       <br>
                       @if (session('ext') != 'eps')
                        <img src="{{asset('qr_code/' . session('code'))}}" alt="{{session('code')}}" class="img-fluid">
                        @endif
                        <br><br>
                        <a href="{{asset('qr_code/' . session('code'))}}"  download  class="btn btn-success btn-lg btn-block" align="center"> Download</a>
                @endif

                   </div>
               </div>
                </div>
            </div>
        </div>
</div>
@endsection
