<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\IOFactory;
use Storage;

class DocumentController extends Controller
{
    public function create()
    {
        return view('document.create');
    }

    public function show(Request $request, $id)
    {
        return Storage::disk('local')->get("document/" . $id);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        if ($file->isValid()) {
            $phpWord = IOFactory::load($file->getRealPath());
            $objWriter = IOFactory::createWriter($phpWord, "HTML");
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.html';
            Storage::disk('local')->put("document/" . $filename, $objWriter->getContent());
            return response()->json(['url' => $request->getUriForPath("/document/" . $filename)]);
        }
        return response()->json(['message' => '文件验证失败'], 500);
    }
}
