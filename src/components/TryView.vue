<template>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<div class="board">
    <a href="#" id="logout"><i class="fas fa-sign-out-alt"></i></a>
    <div class="container">
      <div class="lightbluebox">
          <div class="login-box">
            <h1>Sign in</h1>
            <div class="third-party-box">
              <button class="third-party-btn"><span><i class="fab fa-facebook-f"></i></span></button>
              <button class="third-party-btn"><span><i class="fab fa-google-plus-g"></i></span></button>
              <button class="third-party-btn"><span><i class="fab fa-github"></i></span></button>
            </div>
            <h4>or use your account</h4>
            <div class="input-group">
              <input id="loginEmail" type="text" placeholder="Email">
              <input id="loginPassword" type="password" placeholder="Password">
            </div>
            <button id="loginBtn" class="signin-btn">
              <span class="front">SIGN IN</span>
            </button>
          </div>
          <div class="signup-box">
            <h1>Ceate Account</h1>
            <div class="third-party-box">
              <button class="third-party-btn"><span><i class="fab fa-facebook-f"></i></span></button>
              <button class="third-party-btn"><span><i class="fab fa-google-plus-g"></i></span></button>
              <button class="third-party-btn"><span><i class="fab fa-github"></i></span></button>
            </div>
            <h4>or use your email for registration</h4>
            <div class="input-group">
              <input id="signUpName" type="text" placeholder="Name">
              <input id="signUpEmail" type="text" placeholder="Email">
              <input id="signUpPassword" type="password" placeholder="Password">
            </div>
            <button id="signUpBtn" class="signin-btn">
              <span class="front">SIGN UP</span>
            </button>
          </div>
      </div>
      <div class="yellowbox">
        <div class="hello">
          <div class="textcontent">
            <h1 class="sayHi">Hello, Friend !</h1>
            <span>Enter your personal details and start journey with us</span>
          </div>
          <button class="signup-btn">
            <span class="front">SIGN UP</span>
          </button>
        </div>
        <div class="welcome">
          <div class="textcontent">
            <h1>Welcome Back !</h1>
            <span>Too keep connected with us please login with your personal info</span>
          </div>
          <button class="signup-btn">
            <span class="front">SIGN IN</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
function firstRnder() {
  const sayHiElement = document.querySelector('.sayHi')
  const storageMemory = localStorage.getItem('MemoryAccount')
  let status = localStorage.getItem('status')
  !status && localStorage.setItem('status', 'login')
  if(storageMemory){
    sayHiElement.textContent = storageMemory
  }
  changePage()
}
//切換登入或是註冊
function changePage(e){
  const yellowBox = document.querySelector('.yellowbox')
  const lightblueBox = document.querySelector('.lightbluebox')
  const helloContent = document.querySelector('.hello')
  const wlecome = document.querySelector('.welcome')
  const loginBox = document.querySelector('.login-box')
  const singUpBox = document.querySelector('.signup-box')
  let status = localStorage.getItem('status')

  function addClass() {
    lightblueBox.classList.add('right')
    yellowBox.classList.add('left')
    helloContent.classList.add('InBoxRight')
    wlecome.classList.add('InBoxRight')
    loginBox.classList.add('InBoxRight')
    singUpBox.classList.add('InBoxRight')
  }

  function removeClass() {
    lightblueBox.classList.remove('right')
    yellowBox.classList.remove('left')
    helloContent.classList.remove('InBoxRight')
    wlecome.classList.remove('InBoxRight')
    loginBox.classList.remove('InBoxRight')
    singUpBox.classList.remove('InBoxRight')
  }

  if(!e && status === 'signup') {
    addClass()
  } else if (e && status === 'signup'){
    removeClass()
    localStorage.setItem('status', 'login')
  } else if(e) {
    addClass()
    localStorage.setItem('status', 'signup')
  }
}

window.addEventListener('DOMContentLoaded', function(){
  const buttons = document.querySelectorAll('.signup-btn')
  const signUpBtn = document.querySelector('#signUpBtn')
  const loginBtn = document.querySelector('#loginBtn')
  const logOutLink = document.querySelector('#logout')

  firstRnder()

  buttons.forEach((button) => {
    button.addEventListener('click', (e) => {
      changePage(e)
    })
  })

  // sign up button 
  signUpBtn.addEventListener('click', () => {
    const signUpName = document.querySelector('#signUpName')
    const signUpEmail = document.querySelector('#signUpEmail')
    const signUpPassword = document.querySelector('#signUpPassword')
    const storageKey = signUpEmail.value + signUpPassword.value
    const checkUser = Boolean(localStorage.getItem(storageKey))

    function successAction() {
      if(checkUser) {
        return alert('The email has already created it, please re-enter')
      }
      localStorage.setItem(storageKey, signUpName.value)
      signUpName.value = ''
      signUpEmail.value = ''
      signUpPassword.value = ''
      alert('Created successfully, please go to sign in page')
    }

    if(signUpEmail.value === '' || signUpPassword.value === ''){
      alert('The input box cannot be empty')
    } else {
      successAction()
    }
  })

  // login button
  loginBtn.addEventListener('click', () => {
    const loginEmail = document.querySelector('#loginEmail')
    const loginPassword = document.querySelector('#loginPassword')
    const sayHiElement = document.querySelector('.sayHi')
    const storageKey = loginEmail.value + loginPassword.value
    const userName = localStorage.getItem(storageKey)
    const checkUser = Boolean(userName)

    function loginAction() {
      if(!checkUser) { 
        return alert('Please create an account first')
      } 

      const confirmMemory = confirm('Do you want to save this password?') 
      loginEmail.value = ''
      loginPassword.value = ''
      alert('sign in suceesfully')
      sayHiElement.textContent = `Hi~ ${userName}`
      if(confirmMemory){
        localStorage.setItem('MemoryAccount', `Hi~ ${userName}`)
      }
    }

    if(!loginEmail.value || !loginPassword.value){
      alert('The input box cannot be empty')
    } else {
      loginAction()
    }
  })

  // logOut
  logOutLink.addEventListener('click', () => {
    const sayHiElement = document.querySelector('.sayHi')
    localStorage.clear()
    sayHiElement.textContent = 'Hello, Friend !'
  })
})
</script>
<style scoped>
.board {
  margin: auto;
  max-width: 700px;
  display: flex;
  justify-content: flex-end;
}

#logout {
  margin-right: 0;
  font-size: 25px;
  cursor: pointer;
  color: rgb(248, 188, 35);
}

.container {
  width: 700px;
  height: 500px;
  border-radius: 30px;
  display: flex;
  box-sizing: border-box;
  overflow: hidden;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  box-shadow:3px 3px 9px rgb(202, 202, 195);
}

.lightbluebox {
  width: 350px;
  height: 500px;
  background-color: rgb(233, 239, 245);
  transition: .5s;
  display: flex;
  align-items: center;
  overflow: hidden;
  position: relative;
}

.yellowbox {
  background-color: rgb(248, 188, 35);
  width: 350px;
  height: 500px;
  transition: .5s;
  z-index: 1;
  display: flex;
  align-items: center;
  overflow: hidden;
  position: relative;
}

.hello {
  width: 310px;
  text-align: center;
  color: white;
  padding: 20px;
  position: absolute;
  transition: .5s;
}

.welcome {
  width: 310px;
  text-align: center;
  color: white;
  padding: 20px;
  position: absolute;
  left: -350px;
  transition: .5s;
}

.signup-btn {
  margin-top: 20px;
  background: rgb(248, 188, 35);
  border-radius: 20px;
  border-top: rgb(247, 194, 61) solid 5px;
  border-left: rgb(247, 194, 61) solid 2px;
  border-right: none;
  border-bottom: none;
  padding: 0;
  cursor: pointer;
  outline-offset: 4px;
  box-shadow: 0 8px 2px rgb(248 188 35), 2px 8px 2px rgb(151, 119, 38);
}

.signup-btn .front {
  display: block;
  padding: 15px 42px 10px 42px;
  border-radius: 20px;
  font-size: 1.25rem;
  background: rgb(248, 188, 35);
  color: white;
  transform: translateY(-2px);
}

.signin-btn {
  margin-top: 20px;
  background: rgb(233, 239, 245);
  border-radius: 20px;
  border-top: rgb(208, 216, 224) solid 3px;
  border-left: none;
  border-right: none;
  border-bottom: none;
  padding: 0;
  cursor: pointer;
  outline-offset: 4px;
  box-shadow: 0 8px 2px rgb(233, 239, 245), 2px 9px 2px rgb(115, 119, 122);
}

.signin-btn .front {
  display: block;
  padding: 15px 42px 10px 42px;
  border-radius: 20px;
  font-size: 1.25rem;
  background: rgb(233, 239, 245);
  transform: translateY(-2px);
}

.login-box {
  width: 100%;
  margin: auto;
  text-align: center;
  position: absolute;
  transition: .5s;
}

.signup-box {
  width: 100%;
  margin: auto;
  text-align: center;
  position: absolute;
  left: -350px;
  transition: .5s;
}

.input-group {
  display: flex;
  flex-direction: column;
}

.input-group input {
  margin: auto;
  outline: none;
  border: solid 1px rgb(208, 216, 224);
  border-radius: 10px;
  margin-bottom: 10px;
  width: 80%;
  height: 30px;
  padding: 5px;
}

.signin-btn:active .front, .signup-btn:active .front {
  transform: translateY(-1px);
}

.right, .InBoxRight {
  transform:translate(350px,0)
}

.left {
  transform:translate(-350px,0)
}

.InBoxLeft {
  transform:translate(0px,0)
}

.third-party-btn {
  width: 50px;
  height: 50px;
  border-radius: 100%;
  font-size: 1.25rem;
  cursor: pointer;
  background: rgb(233, 239, 245);
  border: solid 1px rgb(208, 216, 224);
  transform: translateY(-4px);
}

.third-party-btn:active span i {
  transform: translateY(-2px);
}

</style>