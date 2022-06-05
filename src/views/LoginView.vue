<template>
  <div class="body">
    <div class="login">
      <form class="form" name="myForm" method="post" target="hidefrime">
        <h2>會員登入</h2>
        <div class="group">
          <label for="account">帳號</label>
          <input
            type="text"
            name="account"
            id="user-id"
            placeholder="email"
            v-model="account"
          />
        </div>
        <div class="group">
          <label for="password">密碼</label>
          <input
            :type="eye ? 'text' : 'password'"
            name="password"
            id="user-password"
            placeholder="6~12英數字"
            v-model="password"
          />
          <i id="eyes" class="fa-solid fa-eye" @click="toggle_eye(eye)"></i>
        </div>
        <div class="btn-group">
          <input
            class="btn"
            name="button"
            type="submit"
            value="登入"
            @click="login"
          />
          <button class="btn" @click="logout">取消</button>
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
    };
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
    logout() {
      //localStorage.removeItem("token");
      this.$router.push("/product");
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
        console.log(result);
        // this.$emit('loginSuccess')
        this.$router.push("/");
        // console.log(this.success);
      } else {
        // this.success == false;
        alert("帳號或密碼錯誤");
      }
    },
  },
  created() {},
};
// TODO:登出畫面 登入畫面修改
</script>

<style scoped>
.body {
  margin: 0;
  padding: 0;
  list-style: none;
  height: 95vh;
  display: flex;
  background: url("https://picsum.photos/1440/1440?random1") no-repeat center
    center / cover;
  justify-content: center;
  align-items: center;
}

.login {
  width: 600px;
  height: 400px;
  background-color: rgba(0, 0, 0, 0.5);
  border-radius: 10px;
  border: 5px solid #fff;
  box-shadow: 0 0 50px #000;
  backdrop-filter: blur(3px);
  display: flex;
  justify-content: center;
  align-items: center;
}

.form {
  font-family: Arial, Helvetica, sans-serif;
  width: 400px;
  color: #fff;
}

.form h2 {
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 1px solid #fff;
}

.form .group {
  margin-bottom: 20px;
}

.form h2 label {
  line-height: 2;
}

.form input {
  width: 100%;
  border: 1px solid #aaa;
  line-height: 3;
  border-radius: 5px;
}

.form .btn-group {
  margin-top: 50px;
  font-size: 0;
}

.form .btn {
  font-size: 20px;
  border-radius: 5px;
  border: none;
  background-color: rgb(153, 153, 220);
  width: 190px;
  height: 50px;
  padding: 10px 0;
  line-height: 28px;
}

.form .btn + .btn {
  margin-left: 20px;
}
</style>