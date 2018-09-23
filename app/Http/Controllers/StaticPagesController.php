<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home()
    {
        return $this->slidePhoto();
    }

    public function pic_one(Request $request)
    {
        $pci_selected = $request->pic;
        session()->flash('picNum', $pci_selected);
        return view('app' . '.' . $pci_selected)->with('currPic', $pci_selected);
    }

    public function slidePhoto($picNum = 0)
    {
        if (session()->has('picNum')) {
            $picNum = session()->get('picNum');
        }
        $adjustedPicNum = ($picNum == 0 ? 11 : $picNum - 1);
        error_log('Showcasing ' . $adjustedPicNum);
        // adjustedPicNum = ($request->picNum == 1 ? 11 : $request->picNum - 1);
        return view('app.home')->with(array('currPic' => $adjustedPicNum));
    }
}
