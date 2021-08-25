<template>
  <div class="riadContainer">
    <div
      @mouseover.self="toggleRiadDetails"
      @mouseleave.self="toggleRiadDetails"
      :style="{
        'background-image':
          'url(http://localhost:8000/images/' + imagePath + ')',
      }"
      class="Riad"
    >
      <transition name="detailsTransition">
        <div v-if="!isRiadDetailsCollapsed" class="riadDetails">
          <div class="header">
            <img src="../assets/location.png" alt="" class="detailsIcon" />
            <p class="city">{{ city }}.</p>
          </div>
          <h1 class="riadTitle">{{ title }}</h1>
          <div class="details">
            <img class="detailsIcon" src="../assets/bed.png" alt="" />
            <p class="detailsPar">{{ nbRoom }} Bedroom</p>
            <img class="detailsIcon" src="../assets/bathtub.png" alt="" />
            <p class="detailsPar">{{ nbBath }} Bath</p>
          </div>
          <p class="description">
            {{ description }}
          </p>
          <div class="rateAndPrice">
            <div class="oneOfTwo">
              <p class="detailsFooterPar">
                <Starrating :rating="rate" />
              </p>
              <p class="detailsFooterPar">
                {{ price }}&nbsp;DH<sub>/&nbsp;night</sub>
              </p>
            </div>
            <router-link
              class="readmore"
              :to="{ name: 'Riad', params: { id: riadId } }"
              >Read More</router-link
            >
          </div>
        </div>
      </transition>
    </div>
    <div class="lineContainer">
      <img class="line" src="../assets/Line.png" alt="" />
    </div>
  </div>
</template>

<script>
import Starrating from "../components/Starrating.vue";
export default {
  name: "Riad",
  props: {
    title: String,
    description: String,
    city: String,
    nbRoom: Number,
    nbBath: Number,
    imagePath: String,
    rate: Number,
    price: Number,
    riadId: Number,
  },

  components: {
    Starrating,
  },

  data() {
    return {
      isRiadDetailsCollapsed: true,
    };
  },
  methods: {
    toggleRiadDetails() {
      this.isRiadDetailsCollapsed = !this.isRiadDetailsCollapsed;
    },
  },
};
</script>

<style  scoped>
.detailsTransition-enter-from {
  opacity: 0;
  transform: translateX(-20%);
}

.detailsTransition-enter-active {
  transition: all ease 0.5s;
}

.riadContainer {
  width: 90%;
  font-family: luxia;
  color: #996515;
  margin: 50px 0;
  transition: all ease 0.3s;
}
.Riad {
  height: 80vh;
  background-size: cover;
  background-position: center;
  transition: all ease 0.3s;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.lineContainer {
  display: flex;
  justify-content: center;
}
.line {
  width: 350px;
  margin-top: 20px;
}

.riadDetails {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 40%;
  padding: 30px;
  height: 100%;
  background: rgb(32, 32, 32);
}

.header {
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  gap: l0px;
}

.city {
  letter-spacing: 1px;
  font-size: 18px;
}
.riadTitle {
  margin: 20px 0 20px 20px;
  width: 200px;
  font-family: Voga;
  font-weight: normal;
  font-size: 50px;
  padding-left: 10px;
  border-left: #996515 1px solid;
}
.detailsIcon {
  width: 35px;
}
.details {
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  gap: 10px;
}
.detailsPar {
  font-size: 20px;
}
.description {
  width: 100%;
  font-size: 20px;
  color: gray;
  width: 90%;
  padding-left: 10px;
}
.rateAndPrice {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: flex-end;
}
.oneOfTwo {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: 15px;
}

.detailsFooterPar {
  font-size: 30px;
}

.readmore {
  background: #996515;
  border: #996515 1px solid;
  font-family: luxia;
  color: rgb(29, 29, 29);
  padding: 10px;
  font-size: 18px;
  text-decoration: none;
}

@media only screen and (max-width: 1000px) {
  .riadDetails {
    width: 100%;
  }
}
</style>