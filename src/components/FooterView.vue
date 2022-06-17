<template>
    <div class="main-footer">
        <div class="container">
            <div class="footer-item">
                <h4>服務項目</h4>
                <nav class="col-6 d-none d-lg-flex">
                    <a href="#"><i class="fa-solid fa-angle-right"></i>常見問題</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>優惠活動</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>預訂服務</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>訂購須知</a>
                </nav>
            </div>
            <div class="footer-item">
                <h4>關於我們</h4>
                <nav class="col-6 d-none d-lg-flex">
                    <a href="#"><i class="fa-solid fa-angle-right"></i>企業徵才</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>品牌故事</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>店家評分</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>聯絡我們</a>
                </nav>
            </div>
            <div class="footer-item">
                <h4>品質把關</h4>
                <nav class="col-6 d-none d-lg-flex">
                    <a href="#"><i class="fa-solid fa-angle-right"></i>嚴格品管</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>細心製作</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>售後服務</a>
                    <a href="#"><i class="fa-solid fa-angle-right"></i>檢驗認證</a>
                </nav>
            </div>
            <div class="footer-item footer-sub d-none d-lg-flex">
                <h4>訂閱電子報</h4>
                <nav>
                    <p >獲得更多好康優惠資訊</p>
                    <form action="">
                        <input type="email" name="" placeholder="email" required>
                        <input type="submit" value="訂閱">
                    </form>
                </nav>
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
     background: linear-gradient(rgb(242, 233, 224), rgba(255, 205, 166, .5), );
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
    color: rgb(68, 54, 43);
    border-bottom: 1px dotted rgb(68, 54, 43);
    margin-bottom: .5rem;
    padding-bottom: .5rem;
}


.footer-item nav {
    margin: auto;
    display: flex;
    flex-direction: column;

}

.footer-item nav a {
    color: rgb(68, 54, 43);
    line-height: 1.4;
    text-decoration: none;
    padding: 5px 0;
}

.footer-item nav a:hover {
    color: rgb(68, 54, 43);
    font-weight: bolder;
    text-decoration: underline;
    text-decoration-color: rgb(68, 54, 43);

}

.footer-item nav p{
    color:rgb(68, 54, 43);
    
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
    color:rgb(242, 233, 224);
    background-color: rgb(68, 54, 43);
    margin: 0 10px 0 0 ;
}

.copyright {
    width: 100%;
    font-size: .5rem;
    text-align: center;
    margin-top: 10px;
    padding: 10px 0;
    color: rgb(68, 54, 43);
}

.main-header .main-nav2 {
    display: none;
}
</style>