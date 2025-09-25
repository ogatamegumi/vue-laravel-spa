### 参考
https://qiita.com/minato-naka/items/2d2def4d66ec88dc3ca2

### サーバー起動
Laravel → `php artisan serve`

Vue → `npm run dev`

### テスト実行
unit → `php vendor/phpunit/phpunit/phpunit <相対パス>`
feature → 
`php artisan test <相対パス>`
`$response->dd(); // レスポンス全体をダンプしてテストを強制終了`

### DB
migration → `php artisan migrate`

seeder → `php artisan db:seed`
