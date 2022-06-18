<template>
  <div class="container">
    <div class="form form-login">
      <h2>SIGNUP FORM</h2>
      <form
        class="input-container"
        name="myForm"
        method="post"
        target="hidefrime"
      >
        <div class="input-box">
          <i class="fa fa-user"></i>
          <!-- <label for="userName">會員名稱</label> -->
          <input
            type="text"
            id="user-name"
            v-model="userName"
            name="userName"
            class="input"
            placeholder="暱稱"
          />
        </div>
        <div class="input-box">
          <i class="fa fa-solid fa-envelope"></i>
          <!-- <label for="account">帳號</label> -->
          <input
            type="text"
            name="account"
            id="user-id"
            placeholder="email"
            v-model="account"
            class="input"
          />
        </div>
        <div class="input-box">
          <!-- <label for="password">密碼</label> -->
          <i class="fa fa-solid fa-lock"></i>
          <input
            type="password"
            name="password"
            id="user-password"
            placeholder="先數字在英文，合計6~12個字"
            v-model="password"
            class="input"
          />
        </div>
        <div class="input-box">
          <!-- <label for="password">密碼</label> -->
          <i class="fa fa-solid fa-lock"></i>
          <input
            type="password"
            id="user-password"
            placeholder="再次確認密碼"
            class="input"
            v-model="passsword"
          />
        </div>
        <input
          class="submit"
          name="button"
          type="submit"
          @click="singup"
          value="SIGNUP"
        />
        <button class="submit i" @click="logout">CANCEL</button>
      </form>
      <iframe name="hidefrime" class="d-none"></iframe>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      account: "",
      password: "",
      userName: "Mark",
      success: false,
      passsword:""
    };
  },
  methods: {
    logout() {
      //localStorage.removeItem("token");
      this.$router.push("/product");
    },
    async singup() {
      //驗證帳號
      let valaccount = this.account;
      let atpos = valaccount.indexOf("@");
      let dotpos = valaccount.lastIndexOf(".");
      //驗證密碼
      let valpassword = this.password;
      let reg = /\d[a-zA-Z]{1}/;
      let newPpassword = reg.test(valpassword);
      //輸入的數據必須包含@ 符號和點號(.)。 同時，@ 不可以是郵件地址的首字符，並且@ 之後需有至少一個點號
      if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= valaccount.length) {
        alert("請輸入有效email");
        return;
      } else if (valpassword.length < 6) {
        confirm("長度太短");
        return;
      } else if (valpassword.length > 12) {
        confirm("長度太長");
        return;
      } else if (newPpassword == false) {
        alert("密碼格式不符(需6~12英數字混合且數字在前)");
        return;
      }else if(this.password != this.passsword){
        alert("請再次檢查密碼")
        return;
      } 
      else {
        let data = new FormData();
        // data.append('要POST出去的東西', 輸入值)
        data.append("account", this.account);
        data.append("password", this.password);
        data.append("userName", this.userName);
        // 用doSignup.php去遍歷資料庫，找有無重複帳號
        let { data: result } = await this.$axios.post(
          "http://localhost/connect/doSignup.php",
          data
        );
        console.log(result);
        if (result.status == 1) {
          this.success == true;
          alert(`歡迎${this.userName}加入!!!`);
          this.$router.push("/login");
        } else {
          alert("已存在此帳號");
          return;
        }
      }
    },
  },
  created() {
    //用來塞入BS的JS
    (function () {});
    // 以下寫法PHP看不懂axios的請求
    // const { data:res } = await this.$axios.post(
    //   "./doSignup.php",{
    //     account:this.account,
    //     password:this.password
    //   }
    // );
    // console.log(res)
    // console.log('nmsl')
  },
};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  background: beige;
  font-family: Arial, Helvetica, sans-serif;
  width: 100%;
  height: 100%;
}
.container {
  position: relative;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 360px;
  height: 500px;
  /* box-shadow: 0 0 30px 0 #000; */
  perspective: 1000px;
  background: transparent;
}
.form {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  height: 100%;
  background-color: beige;
  transform-style: preserve-3d;
  border: 1px solid rgb(184, 183, 183);
  box-shadow: 0 0 30px 0 rgb(184, 183, 183);
}
.form h2 {
  line-height: 60px;
  text-align: center;
  background-color: #44362B;
  font-size: 28px;
  color: rgb(242, 233, 224);
}
.form .input-container {
  padding: 10px 1rem;
}
.form .input-box {
  position: relative;
  margin: 15px 0;
}
.form .input-box .fa {
  position: absolute;
  left: 5px;
  font-size: 26px;
  line-height: 40px;
  color: #44362B;
}
.form .input-box .input {
  width: 100%;
  height: 40px;
  padding: 5px 10px 5px 50px;
  font-size: 16px;
  border: none;
  background-color: transparent;
  border-bottom: 1px solid #44362B;
}
.form .submit {
  width: 100%;
  padding: 8px 1rem;
  font-size: 16px;
  border: none;
  background-color: #44362B;
  color: rgb(242, 233, 224);
  margin-top: 20px;
  cursor: pointer;
}
.form .submit.i {
  border: 2px solid #44362B;
  color: #44362B;
  background: transparent;
}
.add {
  display: flex;
  justify-content: center;
  margin-bottom: 10px;
}
.add a {
  text-decoration: none;
  color: #44362B;
  border: 1px solid #ffcc00;
  border-radius: 5px;
  padding: 2px;
  margin-left: 10px;
}
.form p {
  text-align: center;
  color: #44362B;
}
.form .social-btn {
  margin-top: 20px;
  text-align: center;
}
.form .social-btn i {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  text-align: center;
  line-height: calc(40px - 4px);
  border: 2px solid #44362B;
  color: #44362B;
  cursor: pointer;
}

/*  */
.form-login {
  z-index: 3;
  transition: z-index 1s step-end;
}
.form-signup {
  z-index: 2;
  transition: z-index 1s step-end;
}
.form-login.hide {
  animation: goBackRight 2s ease-in-out;
  z-index: 1;
}
.form-signup.hide {
  animation: goBackLeft 2s ease-in-out;
  z-index: 1;
}
@keyframes goBackRight {
  0% {
    transform: translateX(0px) rotateY(0deg);
  }
  50% {
    transform: translateX(280px) rotateY(-180deg);
  }
  100% {
    transform: translateX(0px) rotateY(0deg);
  }
}
@keyframes goBackLeft {
  0% {
    transform: translateX(0px) rotateY(0deg);
  }
  50% {
    transform: translateX(-280px) rotateY(180deg);
  }
  100% {
    transform: translateX(0px) rotateY(0deg);
  }
}
</style>