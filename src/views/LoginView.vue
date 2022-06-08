<template>
  <div class="container">
    <div
      id="form1"
      class="form form-login"
      :class="userName ? 'd-none' : 'd-show'"
    >
      <h2>LOGIN FORM</h2>
      <form
        class="input-container"
        name="myForm"
        method="post"
        target="hidefrime"
        action="http://localhost/connect/doLogin.php"
      >
        <div class="input-box">
          <i class="fa fa-solid fa-user"></i>
          <!-- <label for="account">帳號</label> -->
          <input
            type="text"
            class="input"
            name="account"
            placeholder="email"
            v-model="account"
          />
        </div>
        <div class="input-box">
          <!-- <label for="password">密碼</label> -->
          <i id="eyes" class="fa fa-solid fa-eye" @click="toggle_eye(eye)"></i>
          <input
            :type="eye ? 'text' : 'password'"
            name="password"
            id="user-password"
            placeholder="6~12英數字"
            v-model="password"
            class="input"
          />
        </div>
        <input
          class="submit"
          name="button"
          type="submit"
          value="CANCEL"
          @click="cancel"
        />
        <button class="submit i" @click="login">SIGNIN</button>
        <br />
        <br />
        <br />
        <div class="add">
          <p>還不是會員?</p>
          <a href="javascript:;" @click="add">加入會員</a>
        </div>

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

    <!-- LOGOUT FORM -->
    <div
      id="form2"
      class="form form-signup"
      :class="userName ? 'd-show' : 'd-none'"
    >
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
        <input
          class="submit"
          name="button"
          type="button"
          value="ORDER"
          @click="order"
        />
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
  created() {},
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
  margin-top: 10px;
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
  background-color: #ffd167;
  font-size: 28px;
  color: #00362e;
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
  color: #ffd167;
}
.form .input-box .input {
  width: 100%;
  height: 40px;
  padding: 5px 10px 5px 50px;
  font-size: 16px;
  border: none;
  background-color: transparent;
  border-bottom: 1px solid #ffd167;
}
.form .submit {
  width: 100%;
  padding: 8px 1rem;
  font-size: 16px;
  border: none;
  background-color: #ffd167;
  color: #00362e;
  margin-top: 20px;
  cursor: pointer;
}
.form .submit.i {
  border: 2px solid #ffd167;
  color: #ffd167;
  background: transparent;
}
.add {
  display: flex;
  justify-content: center;
  margin-bottom: 10px;
}
.add a {
  text-decoration: none;
  color: #ffd167;
  border: 1px solid #ffcc00;
  border-radius: 5px;
  padding: 2px;
  margin-left: 10px;
}
.form p {
  text-align: center;
  color: #ffd167;
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
  border: 2px solid #ffd167;
  color: #ffd167;
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