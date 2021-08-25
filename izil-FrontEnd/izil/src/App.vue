<template>
  <div class="container">
    <transition name="modalTransition">
      <RegisterLogin v-if="isRegisterLoginShown" @hide="toggleRegister" />
    </transition>
    <div :class="{ sideBare: true, collapsedSideBar: isCollapsed }">
      <img
        @click="toggleMenu"
        :class="{ navToggler: true, navTogglerOn: !isCollapsed }"
        src="../src/assets/doubleArrow.png"
        alt=""
      />
      <img
        v-if="!isCollapsed"
        class="logo"
        src="../src/assets/logo--.png"
        alt=""
      />

      <div
        :class="{ routsContainer: true, collapsedRoutContainer: isCollapsed }"
      >
        <div class="routContainer">
          <img
            @click="pushRoute('/')"
            class="navIcons"
            src="../src/assets/Home.png"
            alt=""
          />
          <router-link class="routText" v-if="!isCollapsed" to="/">
            HOME</router-link
          >
        </div>
        <div class="routContainer">
          <img
            @click="pushRoute('/Explore')"
            class="navIcons"
            src="../src/assets/explore.png"
            alt=""
          />
          <router-link class="routText" v-if="!isCollapsed" to="/explore"
            >EXPLORE</router-link
          >
        </div>

        <div v-if="isLogedIn" class="routContainer">
          <img
            @click="
              this.$router.push({ name: 'Bookings', params: { id: userId } })
            "
            class="navIcons"
            src="../src/assets/booking.png"
            alt=""
          />

          <router-link
            class="routText"
            v-if="!isCollapsed"
            :to="{ name: 'Bookings', params: { id: userId } }"
            >BOOKINGS</router-link
          >
        </div>
        <div class="routContainer">
          <img
            @click="pushRoute('/Contact')"
            class="navIcons"
            src="../src/assets/Contact.png"
            alt=""
          />

          <router-link class="routText" v-if="!isCollapsed" to="/Contact"
            >CONTACT&nbsp;US</router-link
          >
        </div>
        <!-- <div class="routContainer">
          <img
            @click="pushRoute('dashboard')"
            class="navIcons"
            src="../src/assets/dashboard.png"
            alt=""
          />
          <router-link class="routText" v-if="!isCollapsed" to="/Dashboard">
            DASHBOARD
          </router-link>
        </div> -->
        <div v-if="isLogedIn" class="routContainer">
          <img
            @click="logout"
            class="navIcons"
            src="../src/assets/logout.png"
            alt=""
          />
          <p class="routText" v-if="!isCollapsed">LOGOUT</p>
        </div>

        <div v-if="!isLogedIn" class="routContainer">
          <img
            @click="toggleRegister"
            class="navIcons login"
            src="../src/assets/logout.png"
            alt=""
          />
          <p class="routText" v-if="!isCollapsed">LOGIN</p>
        </div>
      </div>
      <div v-if="!isCollapsed" class="contact">
        <div class="socialIcons">
          <img class="socialIcon" src="../src/assets/facebook.png" alt="" />
          <img class="socialIcon" src="../src/assets/instagram.png" alt="" />
          <img class="socialIcon" src="../src/assets/twitter.png" alt="" />
        </div>
        <p class="copyright">&copy;&nbsp;Îzil.ma</p>
      </div>
      <img v-else class="polyIcon" src="../src/assets/mooor.png" alt="" />
    </div>
    <div class="view">
      <transition name="routerTransition">
        <router-view />
      </transition>
    </div>
  </div>
</template>


<script>
import RegisterLogin from "../src/components/RagisterLogin.vue";
export default {
  data() {
    return {
      isCollapsed: true,
      isRegisterLoginShown: false,
      isLogedIn: false,
      userId: null,
    };
  },
  components: {
    RegisterLogin,
  },
  methods: {
    toggleMenu() {
      this.isCollapsed = !this.isCollapsed;
    },
    toggleRegister() {
      this.isRegisterLoginShown = !this.isRegisterLoginShown;
    },
    logout() {
      window.localStorage.clear();
      this.$router.go(0);
    },

    pushRoute(route) {
      this.$router.push(route);
    },
  },

  mounted() {
    if (localStorage.getItem("userId")) {
      this.isLogedIn = true;
      this.userId = localStorage.getItem("userId");
    }
  },
};
</script>


<style lang="css">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  overflow-x: hidden;
}

html {
  scroll-behavior: smooth;
}

.modalTransition-enter-from {
  opacity: 0;
}

.modalTransition-enter-active,
.modalTransition-leave-active {
  transition: opacity 0.6s ease;
}

.modalTransition-leave-to {
  opacity: 0;
}

.routerTransition-enter-from {
  opacity: 0;
  transform: translateY(-10%);
}
.routerTransition-enter-to {
  opacity: 1;
  transform: translateY(0);
}
.routerTransition-enter-active {
  transition: all 0.4s ease;
}
.login {
  transform: rotate(180deg);
}
.logo {
  width: 150px;
  margin: 50px auto;
}
.polyIcon {
  width: 35px;
  margin: 0 auto;
  /* margin-top: 310px; */
}
.routText {
  text-decoration: none;
  color: #996515;
  font-size: 15px;
  font-family: Luxia;
  letter-spacing: 1px;
}

.navIcons {
  width: 26px;
  cursor: pointer;
}
.navToggler {
  width: 18px;
  margin: 20px auto;
  transition: all ease 0.7s;
  cursor: pointer;
}

.navTogglerOn {
  transform: rotate(180deg);
}

.routsContainer {
  display: flex;
  flex-direction: column;
  gap: 30px;
  height: 600px;
}

.collapsedRoutContainer {
  margin-top: 246px;
}

.routContainer {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: start;
  gap: 25px;
  margin: 0 0 0 10px;
}
.socialIcons {
  display: flex;
  flex-direction: row;
  gap: 7px;
  padding-bottom: 10px;
  border-bottom: 1px solid #996515;
  margin: 0 auto;
}

.copyright {
  font-family: Luxia;
  letter-spacing: 2px;
  margin: 0 auto;
  overflow-y: hidden;
}
.socialIcon {
  width: 15px;
}
.view {
  min-height: 100vh;
  overflow-y: scroll;
  width: 100%;
  background-color: rgb(29, 29, 29);
}

.contact {
  display: flex;
  flex-direction: column;
  gap: 10px;
  transition: all ease 0.3s;
}

.sideBare {
  color: #996515;
  width: 300px;
  padding: 10px 0;
  background-color: rgb(32, 32, 32);
  display: flex;
  flex-direction: column;
  transition: all ease 0.3s;
}

.collapsedSideBar {
  width: 52px;
}
.container {
  display: flex;
  flex-direction: row;
  max-height: 100vh !important;
}

::-webkit-scrollbar {
  width: 8px;
}
::-webkit-scrollbar-track {
  background: rgb(29, 29, 29);
}
::-webkit-scrollbar-thumb {
  background: #996515;
}
::-webkit-scrollbar-thumb:hover {
  background: #956825;
}

.sideBare a.router-link-exact-active {
  border-right: #996515 5px solid;
  padding-right: 10px;
}
</style>
