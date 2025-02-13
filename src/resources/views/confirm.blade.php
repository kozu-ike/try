<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <header class="header">
        <h1 class="header__logo">FashionablyLate</h1>
    </header>

    <main class="confirm">
        <h2>Confirm</h2>
        <form class="form" action="{{ route('thanks') }}" method="post">
            @csrf
            <input type="hidden" name="name[first_name]"
                value="{{ $contact['name']['first_name'] }}">
            <input type="hidden" name="name[last_name]" value="{{ $contact['name']['last_name'] }}">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
            <input type="hidden" name="tel[part1]" value="{{ $contact['tel']['part1'] }}">
            <input type="hidden" name="tel[part2]" value="{{ $contact['tel']['part2'] }}">
            <input type="hidden" name="tel[part3]" value="{{ $contact['tel']['part3'] }}">
            <input type="hidden" name="address" value="{{ $contact['address'] }}">
            <input type="hidden" name="building" value="{{ $contact['building'] }}">
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            <input type="hidden" name="content" value="{{ $contact['content'] }}">

            <table class="confirm__table">
                <tr>
                    <th>お名前</th>
                    <td>
                        {{ old('name.first_name', $contact['name']['first_name']) }}
                        {{ old('name.last_name', $contact['name']['last_name']) }}
                    </td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        {{ old('gender', $contact['gender'] == 1 ? '男性' : ($contact['gender'] == 2 ? '女性' : 'その他')) }}
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>
                        {{old('email', $contact['email'])}}
                    </td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>
                        {{ old('tel.part1', $contact['tel']['part1']) }} -
                        {{ old('tel.part2', $contact['tel']['part2']) }} -
                        {{ old('tel.part3', $contact['tel']['part3']) }}
                    </td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>
                        {{ old('address', $contact['address']) }}
                    </td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>
                        {{ old('building', $contact['building'] ?? 'なし') }}
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>
                        {{ old('detail', $contact['detail']) }}
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>
                        {{ old('content', $contact['content']) }}
                    </td>
                </tr>
            </table>

            <div class="confirm__buttons">
                <button type="submit">送信</button>
                <!-- 修正ボタンをフォームに戻るように変更 -->
                <a href="{{ route('index') }}" class="btn">修正</a>
            </div>
        </form>
    </main>
</body>

</html>