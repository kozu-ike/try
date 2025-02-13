アプリケーション名
FashionablyLate

環境構築
1. リポジトリのクローン
$ cd coachtech/laravel
$ git clone git@github.com:kozu-ike/try.git

2. ディレクトリの名前変更
mv try FashionablyLate

3. 作成したリポジトリのURLを設定
$ cd FashionablyLate
$ git remote set-url origin git@github.com:<あなたのGitHubアカウント>/<リポジトリ名>.git

4. 変更をコミット
$ git add .
$ git commit -m "リモートリポジトリの変更"

5. 変更をリモートにプッシュ
$ git push origin main

6. ファイルのパーミッションを変更
$ sudo chmod -R 777 *

7. Docker Composeのビルドと起動
$ docker-compose up -d --build

8. VSCodeでプロジェクトを開く
$ code .

9. PHPコンテナに接続
$ docker-compose exec php bash

10. Composerのインストール
$ composer install

11. .env ファイルを作成
$ cp .env.example .env

12. マイグレーションとシーディング
$ docker-compose exec php bash
$ php artisan migrate --seed

使用技術(実行環境)
Laravel 8.x (PHPフレームワーク)
PHP 7.4.x
MySQL 8.x
Docker (コンテナ化された開発環境)
Composer (PHPパッケージマネージャ)

ER図
/home/kozupad/coachtech/laravel/try/er-diagram.drawio

URL
開発環境: http://localhost/
phpMyAdmin：http://localhost:8080/
