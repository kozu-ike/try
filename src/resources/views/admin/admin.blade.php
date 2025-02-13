<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <header>
        <h1 class="header__logo">FashionablyLate</h1>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="logout">Logout</button>
        </form>
    </header>

    <main>

        <main class="confirm">
            <h2>Admin</h2>
            <form action="/admin/search" method="POST">
                @csrf
                <div class="filter-container">
                    <input type="text" name="name_or_email" placeholder="名前またはメールアドレスで検索" value="{{ old('name_or_email') }}">
                    <select name="gender">
                        <option value="性別">性別</option>
                        <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>男性</option>
                        <option value="2" {{ old('gender') == '2' ? 'selected' : '' }}>女性</option>
                        <option value="3" {{ old('gender') == '3' ? 'selected' : '' }}>その他</option>
                    </select>
                    <select name="category_id">
                        <option value="">お問い合わせの種類を選択</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                        @endforeach
                        <!-- <select name="detail">
                        <option value="お問い合わせの種類">お問い合わせの種類</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->content }}" {{ old('detail') == $category->content ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                        @endforeach -->
                    </select>
                    <input type="date" name="date" value="{{ old('date') }}">
                    <button type="submit" class="search">検索</button>
                    <button type="reset" class="reset">リセット</button>
                    <script>
                        function resetForm() {
                            document.querySelector('form[action="/admin/search"]').reset();
                        }
                    </script>
                </div>
            </form>

            <form action="/admin/export" method="POST">
                @csrf
                <button type="submit" class="export">エクスポート</button>
            </form>

            <div class="pagination">
                {{ $contacts->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
            </div>

            <table>
                <thead>
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                    <tr>
                        <td>
                            {{ $contact->last_name }} {{ $contact->first_name }}
                        </td>
                        <td>
                            @if ($contact->gender == 1)
                            男性
                            @elseif ($contact->gender == 2)
                            女性
                            @else
                            その他
                            @endif
                        </td>
                        <td>
                            {{ $contact->email }}
                        </td>
                        <td>
                            {{ $contact->detail }}
                        </td>
                        <td>
                            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="detail">
                                詳細
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">該当するデータがありません。</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>


        </main>
</body>

</html>