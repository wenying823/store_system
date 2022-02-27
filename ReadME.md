
程式名稱請用 train6,
如果拆解成很多支程式請用 train6-***

題目: 店家系統
目的: 練習 資料關連概念,及前後台概念

管理後端:

有業務帳號,及登入介面
可發放 店家帳號,密碼 可供店家登入
各業務只可管理自已建立的店家帳號 啟用/停用/刪除/刪除回復
業務有銷售 list,可以看產品銷售數量,
並且換算銷售金額的 10%,為業務獎金

店家後端:
登入介面
可自行設定店家名稱
店家產品,產品售價 CRUD
店家有銷售 list,可以看產品銷售數量,及訂購者資訊

使用者前端:
可看見店家名稱,店家產品,產品售價
請跟之前的通訊錄連結,使通訊錄上人員可訂產品

table 名稱
業務人員的 table 名用 sales
店家 table 名用 store 
產品品項 table 名用  items
訂購 table 名用 order

另外
請將上題的 通訊錄 table 改名為 customer
算是 訂購平台的個人會員

測試資料建立要求:
最少3名業務人員,
業務人員之下最少3個店家
訂購者最少5名
訂購資料最少40筆,
由上個月20日,至本月10日,每天1筆
每天最少2人訂購
