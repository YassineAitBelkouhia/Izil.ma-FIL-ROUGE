<template>
  <div class="Login">
    <form @submit.prevent="login" class="formContainer">
      <img class="logo" src="../assets/logo-.png" alt="" />
      <div class="formController">
        <label class="formLabel" for="email">Email:</label>
        <input
          v-model="loginData.email"
          class="forminput"
          type="email"
          placeholder="Email"
        />
      </div>
      <div class="formController">
        <label class="formLabel" for="password">Password:</label>
        <input
          v-model="loginData.password"
          class="forminput"
          type="password"
          placeholder="Password"
        />
      </div>
      <button type="submit" class="formButton">Login</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Login",
  data() {
    return {
      loginData: {
        email: null,
        password: null,
      },
    };
  },
  methods: {
    login() {
      axios
        .post("http://localhost:8000/api/login", this.loginData)
        .then((response) => {
          localStorage.setItem("userName", response.data.user.name);
          localStorage.setItem("userId", response.data.user.id);
          // this.$router.push("/Explore");
          this.$router.go(0);
        });
    },
  },
};
</script>

<style  scoped>
.Login {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
.formContainer {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: rgb(32, 32, 32);
  width: 400px;
  padding: 30px;
  /* height: 500px; */
}

.formController {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin: 30px auto;
  width: 100%;
}
.formLabel {
  font-family: luxia;
  font-size: 20px;
  color: #996515;
}

.forminput {
  background: transparent;
  padding: 10px;
  color: #996515;
  font-family: luxia;
  font-size: 20px;
  outline: none;
  border: none;
  border-bottom: 2px solid #996515;
  width: 100%;
}

.formButton {
  font-family: luxia;
  margin-top: 20px;
  color: #996515;
  cursor: pointer;
  width: 100%;
  background: rgb(29, 29, 29);
  border: 0;
  border-radius: 5px;
  font-size: 22px;
  padding: 10px 30px;
  text-align: center;
  text-decoration: none;
}
</style>