<template>
    <div class="main-footer">
        <div class="container">
            <div class="footer-item">
                <h4>服務項目</h4>
                <nav class="col-6">
                    <a href="#"><i class="fa-solid fa-angle-right"></i>常見問題</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>優惠活動</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>預訂服務</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>訂購須知</a>
                </nav>
            </div>
            <div class="footer-item">
                <h4>關於我們</h4>
                <nav class="col-6">
                    <a href="#"><i class="fa-solid fa-angle-right"></i>企業徵才</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>品牌故事</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>店家評分</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>聯絡我們</a>
                </nav>
            </div>
            <div class="footer-item">
                <h4>品質把關</h4>
                <nav class="col-6">
                    <a href="#"><i class="fa-solid fa-angle-right"></i>嚴格品管</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>細心製作</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>售後服務</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>檢驗認證</a>
                </nav>
            </div>
            <div class="footer-item footer-sub">
                <h4>訂閱電子報</h4>
                <p style="color: #000;">獲得更多好康優惠資訊</p>
                <form action="">
                    <input type="email" name="" placeholder="email" required>
                    <input type="submit" value="訂閱">
                </form>
            </div>
        </div>
        <div class="copyright">
            copyright &copy; 2022
            版權沒有，翻印不追究
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style scoped lang="less">
.main-footer {
    padding: 50px 0 0 0;
    background: linear-gradient(#fff,rgba(200,200,200,.5), #fff);
    // @media screen and (min-width:768px) {
    //     display:none;
    // }
}

.main-footer .container {
    display: flex;
    width: 80%;
    margin: auto;
}

.footer-item {
    width: 0;
    flex-grow: 1;
    margin: 0 20px;
}

.footer-item h4 {
    font-size: 24px;
    color: black;
    border-bottom: 1px dotted #aaa;
    margin-bottom: .5em;
    padding-bottom: .5em;
}

.footer-item nav {
    display: flex;
    flex-direction: column;

}

.footer-item nav a {
    color: black;
    line-height: 1.4;
    text-decoration: none;
    padding: 5px 0;
}

.footer-item nav a:hover {
    color:#aaa;
}

.footer-sub {
    display: flex;
    flex-direction: column;
}

.footer-sub form {
    display: flex;
    width: 100%;
    margin: auto 0px;
}

.footer-sub input[type="text"],
.footer-sub input[type="submit"] {
    border: none;
    padding: 5px 10px;
}

.footer-sub input[type="email"] {
    width: 0;
    flex-grow: 1;
    margin: 0 0 0 10px;
}

.footer-sub input[type="submit"] {
    color:#fff;
    background-color: black;
    margin: 0 10px 0 0 ;
}

.copyright {
    width: 100%;
    text-align: center;
    margin-top: 10px;
    padding: 10px 0;
    background-color: var(--main-color);
    color: black;
}

.main-header .main-nav2 {
    display: none;
}
</style>