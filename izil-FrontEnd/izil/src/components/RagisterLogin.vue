<template>
  <div class="AuthBackDrop" @click.self="hideModal">
    <div class="AuthModal">
      <p class="authModalText">
        Your first visit ?, Register now and book your&nbsp;Riad!
      </p>
      <router-link @click="hideModal" class="modalButton" to="/Register"
        >Register</router-link
      >
      <p class="authModalText">Already have an account&nbsp;? Log in now !</p>
      <router-link @click="hideModal" class="modalButton" to="/Login"
        >login</router-link
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "RagisterLogin",
  methods: {
    hideModal() {
      this.$emit("hide");
    },
  },
};
</script>

<style  scoped>
.AuthBackDrop {
  top: 0;
  left: 0;
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #996415ed;
  width: 100%;
  height: 100vh;
}

.AuthModal {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  text-align: center;
  align-items: center;
  width: 500px;
  min-height: 400px;
  padding: 40px;
  margin: auto;
  background: rgb(32, 32, 32);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.authModalText {
  font-family: luxia;
  font-size: 20px;
  color: #996515;
}
.modalButton {
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
  text-decoration: none;
}
</style>