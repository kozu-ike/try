<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        // $genderMap = [
        //     1 => '男性',
        //     2 => '女性',
        //     3 => 'その他',
        // ];

        $contact = $request->all();
        return view('confirm', compact('contact'));
    }

    // private function convertDetail($detail)
    // {
    //     $details = [
    //         'delivery' => '商品のお届けについて',
    //         'exchanges' => '商品の交換について',
    //         'problems' => '商品トラブル',
    //         'inquiries' => 'ショップへのお問い合わせ',
    //         'other' => 'その他',
    //     ];

    //     return $details[$detail] ?? '選択されていません';
    // }

    public function thanks(ContactRequest $request)
    {
        // dd($request->all());
        $validated = $request->validated();
        // nameをそのまま使用
        $contactData = [
            'name' => $validated['name']['first_name'] . ' ' . $validated['name']['last_name'],
            'gender' => $validated['gender'],
            'email' => $validated['email'],
            'tel' =>
            $validated['tel']['part1'] . '-' . $validated['tel']['part2'] . '-' . $validated['tel']['part3'],
            'address' => $validated['address'],
            'building' => $validated['building'] ?? 'なし',
            'detail' => $validated['detail'],
            'content' => $validated['content'],
        ];

        // データをデータベースに保存
        Contact::create($contactData);
        // サンキューページの表示
        return view('thanks');
    }
}
