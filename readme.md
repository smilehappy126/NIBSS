# 注意事項

### 1.要用連結的時候(外部引入圖片、js、css) 請用

` {{asset('連結')}} `

### 不然放在系統上會故障

### 2.有用到資料庫的 在Model跟Controller中的Table名稱記得大小寫要相同

#### 因為在Windows中不分大小寫 但是Linux會區分 所以到時候放上去會出事


# 如何開始

`git clone https://chellechia@gitlab.com/chellechia/ncumisborrowsystem.git`

`cd ncumisborrowsystem`

`composer install`

`cp .env.example .env`

`php artisan key:generate`

開編輯器 更改.env 建資料庫

`php artisan migrate`    

`php artisan db:seed`  

`php artisan serve`   

`git checkout "YourBranch"`

開始寫程式吧~~~


# loader懶人包

- 在content裡面加入

`<?php
    include("loader/loader.php");
 ?>`
 
 - 在css裡面加入
 
 `<link rel="stylesheet" href="{{ asset('loader/loader.css') }}" media="screen">`
 
 - 在js裡面加入
 
 `setTimeout(function(){
    $('body').addClass('loaded');
  }, 1500);`


# slide in 懶人包

### css 跟 js 我已經import在layout裡了 所以只要在你想要的element中加入

`class = 'slideanim' `


# 程式碼準則
HTML:  
屬性永遠使用雙引號，永遠別用單引號。  
屬性應按照特定順序撰寫，確保程式碼的易讀性。
- class
- id, name
- data-*
- src, for, type, href
- title, alt
- aria-其他, role
- Class 是為了重用的元素而生，應該排第一位。ID 具體得多，應盡量少用（可用場景像是頁內書籤），所以排第二位。  

PHP:  
程式碼縮排是四個空格長  
Modal字首大寫、單數  
資料表字首小寫、複數  
Controller字首大寫  
View的檔案名稱及資料夾名稱應全小寫  
