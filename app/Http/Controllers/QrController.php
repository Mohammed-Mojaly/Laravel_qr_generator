<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Spatie\Color\Hex;

class QrController extends Controller
{
    public function index()
    {
        return view('qr_codes.qr_builder');
    }
    public function phone()
    {
        return view('qr_codes.qr_phone');
    }
    public function sms()
    {
        return view('qr_codes.qr_sms');
    }
    public function geo()
    {
        return view('qr_codes.qr_geo');
    }
    public function email()
    {
        return view('qr_codes.qr_email');
    }

    public function link()
    {
        return view('qr_codes.qr_link');
    }

    public function wifi()
    {
        return view('qr_codes.qr_wifi');
    }



    public function do_qr_bulider(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $qr_color = Hex::fromString($request->input('qr_color') ?? '#000000')->toRgb();
        $qr_encoding = $request->input('qr_encoding') ?? 'UTF-8';
        $qr_eye = $request->input('qr_eye') ?? 'square';
        $qr_margin = $request->input('qr_margin') ?? 0;
        $qr_style = $request->input('qr_style') ?? 'square';
        $qr_size = $request->input('qr_size') ?? '300';
        $qr_img_type = $request->input('qr_img_type') ?? 'png';
        $code = 'yourqrcode' . rand(4568, 874532242210) . '.' . $qr_img_type;
        $body = $request->input('body');
        $qr = QrCode::format($qr_img_type);
        $qr->size($qr_size);
        $qr->color($qr_color->red(), $qr_color->green(), $qr_color->blue());
        $qr->encoding($qr_encoding);
        $qr->eye($qr_eye);
        $qr->margin($qr_margin);
        $qr->style($qr_style);
        $qr->generate($body, '../public/qr_code/' . $code);

        return back()->with([
            'status' => 'QR Code generated successfully!',
            'code' => $code,
            'ext'  => $qr_img_type
        ]);
    }

    public function do_qr_email(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'to' => 'required|email',
            'subject' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        return redirect()->back()->with(

            [
                'status' => 'QR Code generated successfully!',
                'to' => $request->to,
                'subject'  => $request->subject,
                'body'  => $request->body,
            ]
        );

    }

    public function do_qr_phone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        return redirect()->back()->with(
            [
                'status' => 'QR Code generated successfully!',
                'phone' => $request->phone,

            ]
        );

    }

    public function do_qr_sms(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        return redirect()->back()->with(
            [
                'status' => 'QR Code generated successfully!',
                'phone' => $request->phone,
                'body'  => $request->body,
            ]
        );
    }

    public function do_qr_geo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        return redirect()->back()->with(
            [
                'status' => 'QR Code generated successfully!',
                'latitude' => $request->latitude,
                'longitude'  => $request->longitude,
            ]
        );
    }


    public function do_qr_link(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'link' => 'required|url',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        return redirect()->back()->with(
            [
                'status' => 'QR Code generated successfully!',
                'link' => $request->link,
            ]
        );

    }

    public function do_qr_wifi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        $encryption = $request->input('encryption') ?? '';
        $password = $request->input('password') ?? '';
        $visibility = $request->input('visibility') ?? 'false';


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        return redirect()->back()->with(
            [
                'status' => 'QR Code generated successfully!',
                'name' => $request->name,
                'encryption' => $encryption,
                'password' => $password,
                'visibility' =>$visibility,
            ]
        );

    }



}
