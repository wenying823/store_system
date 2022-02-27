題目: 店家系統
目的: 練習 資料關連概念,及前後台概念

管理後端:
有業務帳號,及登入介面
可發放 店家帳號,密碼 可供店家登入
各業務只可管理自已建立的店家帳號 啟用/停用/刪除/刪除回復
業務有銷售 list,可以看產品銷售數量,
並且換算銷售金額的 10%,為業務獎金
![image](https://github.com/wenying823/store_system/blob/master/%E5%BE%8C%E8%87%BA%E6%A5%AD%E5%8B%99%E7%AE%A1%E7%90%86.JPG)

店家後端:
登入介面
可自行設定店家名稱
店家產品,產品售價 CRUD
店家有銷售 list,可以看產品銷售數量,及訂購者資訊
![image](https://github.com/wenying823/store_system/blob/master/%E5%BA%97%E5%AE%B6%E7%AE%A1%E7%90%86%E7%95%AB%E9%9D%A2.JPG)

使用者前端:
可看見店家名稱,店家產品,產品售價
請跟之前的通訊錄連結,使通訊錄上人員可訂產品
![image](https://github.com/wenying823/store_system/blob/master/%E5%95%86%E5%BA%97%E8%A1%97%E7%95%AB%E9%9D%A2.JPG)

DB:
items table
items_no 商品編號
items_name 商品名稱
items_price 商品單價
items_store_no 商品屬於哪間商店編號

order_list table
order_no 訂單標號
order_customer_no 會員編號
order_date 購買日期
order_item_name 購買商品名稱
ordr_item_amount 購買數量
order_price 訂單金額
order_store_no 購買商品屬於哪間商店編號

sales table
sales_no 銷售員編號
sales_name 銷售員姓名
sales_acc 銷售員帳號
sales_pwd 銷售員密碼

store table
store_no 店鋪編號
store_name 店鋪名稱
store_acc 店鋪帳號
store_pwd 店鋪密碼
store_sales_no 店鋪屬於哪個銷售員名下
store_status 店鋪帳號狀態

