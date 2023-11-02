# アプリケーション名
Atte（アット）
ある企業の勤怠管理システム

◾️打刻ページ（/）
https://github.com/nishimuraysk/atte/assets/140567528/e95ad448-e01a-48a0-ac2c-2c51a7673383

◾️会員登録ページ（/register）
https://github.com/nishimuraysk/atte/assets/140567528/8b2aa29d-ab01-4914-8c24-035a46576826

◾️ログインページ（/login）
https://github.com/nishimuraysk/atte/assets/140567528/a0d52481-b3a2-4a7f-bead-911f68ec7666

◾️日付別勤怠ページ（/attendance）
https://github.com/nishimuraysk/atte/assets/140567528/c676571b-ff83-4c12-b70d-4e9050ced7f5

## 作成した目的
人事評価のため

## アプリケーションURL
デプロイURL：未定
http://localhost/
http://localhost:8080/index.php
テスト用のユーザーデータは以下のファイルにあるのでログイン時に活用ください。
UsersTableSeeder.php

## 他のリポジトリ
https://github.com/nishimuraysk/atte.git

## 機能一覧
- 会員登録
- ログイン
- ログアウト
- 勤務開始
- 勤務終了
- 休憩開始
- 休憩終了
- 日付別勤怠情報取得
- ページネーション

## 使用技術（実行環境）
- Laravel 10.25.2

## テーブル設計
https://github.com/nishimuraysk/atte/assets/140567528/ab2b1edc-99dc-41a8-8af7-8175f4126252

## ER図
https://github.com/nishimuraysk/atte/assets/140567528/eb585d3f-990a-4b13-a096-e1e9299f5e7a

# 環境構築
ターミナルでgit cloneして作成されたフォルダに移動して、下記の作業及びコマンドを実行してください。

・.env.exampleを.envにリネームして、DBの設定を行ってください
・DBはMySQLを使っているのでMySQLにDBを作ってください
・アプリケーションキーの初期化を行ってください

```
docker-compose up -d --build
./vendor/bin/sail up
./vendor/bin/sail artisan migrate
```

## 他に記載することがあれば記述する
色々試行錯誤しながら進めていたため全てのフローをしっかりとにログを残せておりませんでした。
そのため、環境構築に漏れがあったら申し訳ないです。その場合はご連絡ください。
READMEに何を書けば良いのか理解できたので、次回以降はログを残しながら進めます。