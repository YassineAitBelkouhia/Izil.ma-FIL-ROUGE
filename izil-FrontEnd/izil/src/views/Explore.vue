<template>
  <div class="Explore">
    <h1 class="exploreHeader">
      Explore <br />
      Vintage <br />
      Vibes.
    </h1>
    <p class="explorePar">
      The most memorable rest time starts here. <br />
      Stay once, <span class="goldenColor">carry memories forever.</span>
    </p>

    <div class="riadsContainer">
      <Loading v-if="isLoading" />
      <Riad
        v-else
        v-for="riad in riads"
        :key="riad.id"
        :riadId="riad.id"
        :title="riad.title"
        :description="riad.description"
        :city="riad.city"
        :nbRoom="riad.numberOfRooms"
        :nbBath="riad.numberOfBathrooms"
        :imagePath="riad.image_path"
        :price="riad.price_night"
        :rate="riad.rating"
      />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Riad from "../components/Riad";
import Loading from "../components/Loading";

export default {
  name: "Explore",
  components: {
    Riad,
    Loading,
  },
  data() {
    return {
      riads: [],
      isLoading: false,
    };
  },
  created() {
    this.isLoading = true;
    axios.get("http://localhost:8000/api/riads/").then((response) => {
      this.riads = response.data;
      this.riads.forEach((riad) => {
        axios
          .get(`http://localhost:8000/api/riads/${riad.id}/rating`)
          .then((response) => {
            riad.rating = response.data;
          });
      });
      this.isLoading = false;
    });
  },
};
</script>

<style  scoped>
.Explore {
  margin: 100px auto;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
}
.exploreHeader {
  font-family: voga;
  font-size: 60px;
  color: #996515;
  letter-spacing: 3px;
  font-weight: normal;
  padding-left: 20px;
  border-left: #996515 1px solid;
  height: fit-content;
}
.explorePar {
  font-family: luxia;
  color: gray;
  font-size: 25px;
  font-weight: normal;
  letter-spacing: 1px;
  margin-top: 100px;
  border-left: gray 1px solid;
  padding-left: 20px;
}

.goldenColor {
  color: #996515;
}

.riadsContainer {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  margin: 100px auto;
  width: 80%;
}

@media only screen and (max-width: 800px) {
  .explorePar {
    width: 80%;
    font-size: 20px;
  }
}
</style>