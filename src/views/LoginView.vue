<template>
<div class="container-fruid my-5">
  <div class="col-lg-8 col-md-12 mx-auto d-flex flex-nowrap">
    <div class="col-lg-6 col-md-10 col-sm-12 mx-auto">
      <div id="form1" class="form form-login " :class="userName ? 'd-none' : 'd-show'">
        <h2 class="text-nowrap">LOGIN FORM</h2>
        <form class="input-container" name="myForm" method="post" target="hidefrime"
          action="http://localhost/connect/doLogin.php">
          <div class="input-box">
            <i class="fa fa-solid fa-user"></i>
            <!-- <label for="account">帳號</label> -->
            <input type="text" class="input" name="account" placeholder="email" v-model="account" />
          </div>
          <div class="input-box">
            <!-- <label for="password">密碼</label> -->
            <i id="eyes" class="fa fa-solid fa-eye" @click="toggle_eye(eye)"></i>
            <input :type="eye ? 'text' : 'password'" name="password" id="user-password" placeholder="6~12英數字"
              v-model="password" class="input" />
          </div>

          <button class="submit i" @click="login">SIGNIN</button>
          <input class="submit" name="button" type="submit" value="CANCEL" @click="cancel" />

          <br />
          <br />
          <br />
          <div class="add">
            <p>還不是會員?</p>
            <a href="javascript:;" @click="add">加入會員</a>
          </div>

          <p class="mt-3">Login with social media.</p>
          <div class="social-btn">
            <i class="fa fa-brands fa-facebook"></i>
            <i class="fa fa-brands fa-google"></i>
            <i class="fa fa-brands fa-twitter"></i>
          </div>
        </form>
        <!-- 阻止跳頁 -->
        <iframe name="hidefrime" class="d-none"></iframe>
      </div>

      <!-- LOGOUT FORM -->
      <div id="form2" class="form form-signup" :class="userName ? 'd-show' : 'd-none'">
        <h2>LOGOUT FORM</h2>
        <form class="input-container" name="myForm" method="" target="hidefrime">
          <div class="input-box">
            <i class="fa fa-solid fa-user"></i>
            <!-- <label for="account">帳號</label> -->
            <h5 class="input">暱稱: {{ UuserName }}</h5>
          </div>
          <div class="input-box">
            <!-- <label for="password">密碼</label> -->
            <i class="fa fa-solid fa-envelope"></i>
            <h5 class="input">帳號: {{ INNaccount }}</h5>
          </div>
          <input class="submit" name="button" type="button" value="ORDER" @click="order" />
          <button class="submit i" @click="logout">LOGOUT</button>
          <br />
          <br />
          <br />
          <p>Login with social media.</p>
          <div class="social-btn">
            <i class="fa fa-brands fa-facebook"></i>
            <i class="fa fa-brands fa-google"></i>
            <i class="fa fa-brands fa-twitter"></i>
          </div>
        </form>
        <!-- 阻止跳頁 -->
        <iframe name="hidefrime" class="d-none"></iframe>
      </div>

    </div>

  <!-- 活動圖 -->
    <div class="activityImg col-6 d-none d-lg-block">
    </div>

  </div>
</div>
</template>

<script>
// import axios from 'axios'
// axios.defaults.baseURL = 'http://localhost:8080'
export default {
  data() {
    return {
      eye: false,
      account: "",
      password: "",
      success: false,
      userName: "",
      INaccount: "",
    };
  },
  computed: {
    INNaccount() {
      if (localStorage.getItem("user")) {
        let userList = JSON.parse(localStorage.getItem("user"));
        let objUserList = Object.keys(userList).map((key) => {
          return {
            [key]: userList[key],
          };
        });
        return (this.INaccount = objUserList[0].account);
      } else {
        return "";
      }
    },
    UuserName() {
      if (localStorage.getItem("user")) {
        let userList = JSON.parse(localStorage.getItem("user"));
        let objUserList = Object.keys(userList).map((key) => {
          return {
            [key]: userList[key],
          };
        });
        return (this.userName = objUserList[1].userName);
      } else {
        return "";
      }
    },
  },
  methods: {
    toggle_eye(eye) {
      this.eye = !this.eye;

      if (this.eye == true) {
        $("#eyes").removeClass("fa-eye");
        $("#eyes").addClass("fa-eye-slash");
      } else {
        $("#eyes").removeClass("fa-eye-slash");
        $("#eyes").addClass("fa-eye");
      }
    },
    cancel() {
      this.$router.push("/");
    },
    logout() {
      localStorage.removeItem("user");
      localStorage.removeItem("ProductCount");
      this.$router.push("/");
    },
    order() {
      this.$router.push("/cart");
    },
    add() {
      this.$router.push("/add");
    },
    async login() {
      // php用axios找資料一定愛配FormData()
      let data = new FormData();
      // data.append('要POST出去的東西', 輸入值)
      data.append("account", this.account);
      data.append("password", this.password);
      let { data: result } = await this.$axios.post(
        "http://localhost/connect/doLogin.php",
        data
      );
      console.log(result);
      if (result) {
        // this.success == true;
        localStorage.setItem("user", JSON.stringify(result));
        $("#form2").removeClass("hide");
        $("#form1").parent().parent().addClass("hide");
        this.$router.push("/");
      } else {
        // this.success == false;
        alert("帳號或密碼錯誤");
        return false;
      }
    },
  },
  created() { },
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

.form {
  width: 100%;
  background-color: rgb(242, 233, 224);
}

.form h2 {
  line-height: 60px;
  text-align: center;
  background-color: rgb(68, 54, 43);
  font-size: 1.5rem;
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
  font-size: 1rem;
  line-height: 40px;
  color: rgb(68, 54, 43);
}

.form .input-box .input {
  width: 100%;
  height: 40px;
  padding: 5px 10px 5px 50px;
  font-size: 16px;
  border: none;
  background-color: transparent;
  border-bottom: 1px solid rgb(68, 54, 43);
}

.form .submit {
  width: 100%;
  padding: 8px 1rem;
  font-size: 16px;
  border: none;
  background-color: rgb(68, 54, 43);
  color: rgb(242, 233, 224);
  margin-top: 20px;
  cursor: pointer;
}

.form .submit.i {
  border: 2px solid rgb(68, 54, 43);
  color: rgb(68, 54, 43);
  background: transparent;
}

.add {
  display: flex;
  justify-content: center;
  align-items: center;
}

.add a {
  text-decoration: none;
  color: rgb(68, 54, 43);
  border: 3px solid #ffffff;
  border-radius: 5px;
  padding: 2px;
  margin-left: 10px;
}

.form p {
  text-align: center;
  color: rgb(68, 54, 43);
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
  border: 2px solid rgb(68, 54, 43);
  color: rgb(68, 54, 43);
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

.activityImg{
  background-image: url("../assets/logo-bg.jpg");
  background-size:100% 100%
}
</style>