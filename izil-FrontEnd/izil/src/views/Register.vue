<template>
  <div class="Register">
    <form @submit.prevent="register" class="formContainer">
      <img class="logo" src="../assets/logo-.png" alt="" />
      <div class="formController">
        <label class="formLabel" for="name">Full name:</label>
        <input
          v-model="registerData.name"
          class="forminput"
          type="text"
          placeholder="Full name"
        />
      </div>
      <div class="formController">
        <label class="formLabel" for="email">Email :</label>
        <input
          v-model="registerData.email"
          class="forminput"
          type="email"
          placeholder="Email"
        />
      </div>

      <div class="formController">
        <label class="formLabel" for="password">Password:</label>
        <input
          v-model="registerData.password"
          class="forminput"
          type="password"
          placeholder="Password"
        />
      </div>
      <div class="formController">
        <label class="formLabel" for="name">Password Confirmation:</label>
        <input
          v-model="registerData.password_confirmation"
          class="forminput"
          type="password"
          placeholder="Password Confirmation"
        />
      </div>
      <button type="submit" class="formButton">Register</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Register",
  data() {
    return {
      registerData: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
      },
    };
  },

  methods: {
    register() {
      axios
        .post("http://localhost:8000/api/register", this.registerData)
        .then((response) => {
          // console.log(response.data);
          localStorage.setItem("userName", response.data.user.name);
          localStorage.setItem("userId", response.data.user.id);
          this.$router.go(0);
        });
    },
  },
};
</script>

<style scoped>
.Register {
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
  padding: 20px;
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