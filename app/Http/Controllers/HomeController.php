<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        $data = Session::get('session_data');
        if (!$data) {
            $data = [];
        }
        return view('home', compact('data'));
    }

    public function store(Request $request)
    {
        $count = $request->session()->get('count');
        if (!$count) {
            $request->session()->put('count', 1);
            $session_data = [];
        } else {
            $request->session()->put('count', $count + 1);
            $session_data = $request->session()->get('session_data');
        }

        $input = [
            "name" => $request->input('name'),
            "email" => $request->input('email')
        ];

        array_push($session_data, $input);
        $request->session()->put('session_data', $session_data);

        return redirect('/');
    }

    public function edit(Request $request, $id)
    {
        $data = Session::get('session_data');
        if (!$data) {
            return redirect('/');
        }
        if ($data) {
            foreach ($data as $key => $item) {
                if ($key == $id) {
                    $edit = $item;
                }
            }
        }
        return view('edit', compact('edit', 'id'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $data = Session::get('session_data');
        if ($data) {
            $session_data = [];
            foreach ($data as $key => $item) {
                if ($key == $id) {
                    $input = [
                        "name" => $request->input('name'),
                        "email" => $request->input('email')
                    ];
                    array_push($session_data, $input);
                } else {
                    array_push($session_data, $item);
                }
                $request->session()->put('session_data', $session_data);
            }
        }
        return redirect('/');
    }

    public function destroy(Request $request, $id)
    {
        $data = Session::get('session_data');
        if ($data) {
            $session_data = [];
            foreach ($data as $key => $item) {
                if ($key != $id) {
                    array_push($session_data, $item);
                }
                $request->session()->put('session_data', $session_data);
            }
        }
        return redirect('/');
    }
}
