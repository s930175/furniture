<template>
  <div class="body">
    <div class="login">
      <form
        action=""
        class="form"
        name="myForm"
        method="post"
      >
        <h2>加入會員</h2>
        <div class="d-flex">
          <div class="add">
            <label for="user-name">會員名稱</label>
            <input type="text" id="user-name" v-model="userName" />
          </div>
          <div class="add2">
            <br /><br />
            <select>
              <option>請選擇你的性別</option>
              <option>男</option>
              <option>女</option>
              <option>其他</option>
            </select>
          </div>
        </div>
        <div class="group">
          <label for="user-id">帳號</label>
          <input
            type="text"
            name="email"
            id="user-id"
            placeholder="email"
            v-model="account"
          />
        </div>
        <div class="group">
          <label for="user-password">密碼</label>
          <input
            :type="eye ? 'text' : 'password'"
            name="user-password"
            id="user-password"
            placeholder="6~12英數字"
            v-model="password"
          />
          <i id="eyes" class="fa-solid fa-eye" @click="toggle_eye(eye)"></i>
        </div>
        <div class="checkbox">
          <input type="checkbox" />
          <p>訂閱電子報</p>
        </div>
        <div class="btn-group">
          <button class="btn" @click="login">加入</button>
          <button class="btn" @click="logout">取消</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      eye: false,
      account: "",
      password: "",
      userName:"Mark",
      success: false
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
    login() {
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
      } else if (valpassword.length < 6) {
        confirm("長度太短");
      } else if (valpassword.length > 12) {
        confirm("長度太長");
      } else if (newPpassword == false) {
        alert("密碼格式不符(需6~12英數字混合)");
      } else {
        // localStorage.setItem("token", "ImLogin");
        alert(`歡迎${userName}加入!!!`);
        localStorage.setItem("token", valaccount);
        this.$router.push("/login");
      }
    },
  },
  async created() {
    //用來塞入BS的JS
    (function () {});
    // 以下寫法PHP看不懂axios的請求
    // const { data:res } = await this.$axios.post(
    //   "http://localhost/connect/doSignup.php",{
    //     account:this.account,
    //     password:this.password
    //   }
    // );
    // console.log(res)
    // console.log('nmsl')

  // php用axios找資料一定愛配formData()
    let data = new FormData()
    // data.append('要POST出去的東西', 輸入值)
    data.append('account', this.account)
    data.append('password', this.password)
    data.append('userName', this.userName)
    let { data: result } = await this.$axios.post('./doSignup.php', data)
    if(result.status == 1){
      this.success = true
    }else{
      this.success = false
    }
  },
};
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
  height: 450px;
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
.add {
  padding: 10px;
}
.add2 {
  padding: 0 0 0 10px;
}
select {
  width: 120px;
  height: 30px;
  border: 2px solid #aaa;
  border-radius: 6px;
}
.form h2 {
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 1px solid #fff;
}

.form .group {
  margin-bottom: 5px;
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
.checkbox {
  display: flex;
}
.checkbox p {
  width: 100px;
}
.checkbox input {
  width: 15px;
  margin-top: 20px;
}

.form .btn-group {
  margin-top: 5px;
  margin-bottom: 10px;
  font-size: 0;
}

.form .btn {
  font-size: 20px;
  border-radius: 5px;
  border: none;
  background-color: rgb(153, 153, 220);
  width: 190px;
  padding: 10px 0;
}

.form .btn + .btn {
  margin-left: 20px;
}
</style>