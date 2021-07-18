# Rase-lara (バックエンド)

<br>


## ※フロントエンド部分に大方のことは書いたのでこちらは基本情報とバックエンド部分のapiとシーディングデータについてのみ記載

<br>

> ### 使用言語

<br>

- Laravel

  - PHP

<br>

> ### サーバー

<br>

- heroku [Rase-lara](https://dashboard.heroku.com/apps/whispering-retreat-97645)

<br>

> ### API

<br>

- 会員登録
  - Post
  - api/v1/users/registration

<br>

- ログイン
  - Post
  - api/v1/users/login
- ログアウト
  - Post
  - api/v1/users/logout

<br>

- ユーザー取得
  - Get
  - api/v1/users

<br>

- お気に入り情報取得
  - Get
  - api/v1/{user_id}/favorites
- 予約情報取得
  - Get
  - api/v1/{user_id}/reservations

<br>

- ストア一覧取得
  - Get
  - api/v1/stores
- ストア詳細取得
  - Get
  - api/v1/{store_id}/stores

<br>

- お気に入り追加
  - Post
  - api/v1/{user_id}/favorites
- お気に入り削除
  - Delete
  - api/v1/{user_id}/favorites

<br>

- 評価
  - Post
  - api/v1/{store_id}/values
- 評価情報取得
  - Get
  - api/v1/{store_id}/values

<br>

---管理者権限---

<br>

- 全ユーザー情報取得
  - Get
  - api/v1/{email}/users
- 店舗代表者権限付与
  - Put
  - api/v1/storeAdminGrant/users
- 店舗代表者権限削除
  - Put
  - api/v1/storeAdminDelete/users

<br>

---店舗代表者権限---

<br>

- 店舗情報作成
  - Post
  - api/v1/storeAdmin/stores
- 店舗情報更新
  - Put
  - api/v1/{store_id}/storeAdmin/stores
- 店舗画像をS3に送りパスをDBに保存する
  - Post
  - api/v1/{store_id}/storeAdmin/stores/image
- 店舗の予約情報取得
  - Get
  - api/v1/{store_id}/storeAdmin/reservations

<br>

> ### シーディング

<br> 

- Store

  - 二十件分のストアデータのシーディング

<br> 

- User

  - 管理者権限と店舗代表者権限を持ったアカウントのシーディング








